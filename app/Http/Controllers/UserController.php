<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    //Edit Page
    public function edit(User $user)
    {
        $roles = Role::all(); // Retrieve all roles from the database

        return view('admin.pages.account-manager.user-edit', compact('user', 'roles'));
    }

    //update user
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string',
            'role' => 'required|exists:roles,id',
        ]);

        if (empty($validatedData['password'])) {
            unset($validatedData['password']); // Remove the password field if it is empty
        }

        $user->update($validatedData);

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
        $user = User::findOrFail($id);

        // Ensure the authenticated user can delete the user
        if ($user->id === Auth::id()) {
            // Prevent deleting the currently authenticated user
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        // Delete the user
        $user->delete();

        return redirect()->route('user.lists')->with('success', 'User deleted successfully.');
    }



}
