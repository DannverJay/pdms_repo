<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Activitylog\Models\Activity;

class UserController extends Controller
{
    public function showUser()
    {
        $userCount = User::count();

        $users = User::with('roles')

        ->orderBy('created_at', 'desc')
        ->get();

        $roles = Role::get();

        return view('admin.pages.account-manager.user-lists', compact('userCount', 'users', 'roles'));
    }



    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|exists:roles,id',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Assign the selected role to the user
        $role = Role::findById($request->input('role'));
        $user->assignRole($role);

        // Redirect or show success message
        return redirect()->back()->with('success', 'User created successfully.');
    }
   // Edit Page
    public function edit(User $user)
    {
        $roles = Role::all(); // Retrieve all roles from the database

        $adminCount = Role::where('name', 'admin')->first()->users->count();

        return view('admin.pages.account-manager.user-edit', compact('user', 'roles', 'adminCount'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string',
            'role' => 'required|exists:roles,id',
        ]);

        if (empty($validatedData['password'])) {
            unset($validatedData['password']); // Remove the password field if it is empty
        }

        // Check if the user has only the admin role
        $userRoles = $user->roles->pluck('name')->toArray();
        $adminCount = Role::where('name', 'admin')->first()->users->count();

        if (count($userRoles) === 1 && in_array('admin', $userRoles) && $adminCount === 1) {
            unset($validatedData['role']); // Remove the role field if the user has only the admin role and there is only one admin
        }

        $user->update($validatedData);

        if (isset($validatedData['role'])) {
            // Assign the selected role to the user
            $role = Role::findById($request->input('role'));
            $user->syncRoles([$role]);
        }

        // Perform any additional actions if needed
        $adminRole = Role::where('name', 'admin')->first();
        $adminUser = $adminRole->users()->first();

        // Save the activity log
        $activity = new Activity();
        $activity->log_name = $adminUser->name;
        $activity->description = 'Updated the account of ' . $user->name;
        $activity->causer_id = $adminUser->id;
        $activity->causer_type = 'App\Models\User';
        $activity->save();

        return redirect()->route('user.lists')->with('success', 'User updated successfully.');
    }

    //If user dont have an personnel profile it will redirect to the create page
    public function show(User $user)
    {
        $personnel = $user->personnel;

        if (!$personnel) {
            return redirect()->route('personnel.create');
        }

        return redirect()->route('view.profile', $personnel);

    }


    public function destroy(Request $request, $id)
{
    // Find the user by ID
    $user = User::withTrashed()->findOrFail($id);

    // Ensure the authenticated user can delete the user

    // Check if the user is the only admin
    $adminRole = Role::where('name', 'admin')->first();
    if ($user->hasRole($adminRole) && $adminRole->users()->count() === 1) {
        // Prevent deleting the only admin user
        return redirect()->back()->with('error', 'You cannot delete the only admin user.');
    }

    // Set the expiration time for soft delete
    $expiresAt = Carbon::now()->addYear();
    $user->expires_at = $expiresAt;
    $user->save();

    // Soft delete the user
    $user->delete();

    return redirect()->route('user.lists')->with('success', 'User has been archived.');
}
    public function restore($id)
    {
        // Find the soft deleted user by ID
        $user = User::onlyTrashed()->findOrFail($id);

        // Restore the user
        $user->restore();

        return redirect()->route('user.lists')->with('success', 'User restored successfully.');
    }

    public function archive()
    {
        $userCount = User::onlyTrashed()->count();

        $softDeletedUsers = User::onlyTrashed()
            ->with('roles')
            ->orderBy('created_at', 'desc')
            ->get();

        $roles = Role::get();

        return view('admin.pages.account-manager.archive-list', compact('userCount', 'softDeletedUsers', 'roles'));
    }
}
