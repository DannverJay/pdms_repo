<?php

namespace App\Http\Controllers;

use App\Models\FamilyBackground;
use App\Models\Personnel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

class PersonnelProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function create()

    {
        return view('admin.pages.personnel.create');
    }

    public function store(Request $request)
    {
        // Validate the user's input
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'unit' => 'required',
            'sub_unit' => 'required',
            'designation' => 'required',
            'status' => 'required',
        ]);

        // Create the new personnel record
        $personnel = new Personnel;
        $personnel->first_name = $validatedData['first_name'];
        $personnel->middle_name = $request->input('middle_name');
        $personnel->last_name = $validatedData['last_name'];
        $personnel->birth_date = Carbon::createFromFormat('m/d/Y', $request->birth_date)->format('Y-m-d');
        $personnel->birth_place = $request->input('birth_place');
        $personnel->gender = $validatedData['gender'];
        $personnel->civil_status = $request->input('civil_status');
        $personnel->citizenship = $request->input('citizenship');
        $personnel->blood_type = $request->input('blood_type');
        $personnel->height = $request->input('height');
        $personnel->weight = $request->input('weight');
        $personnel->mobile_no = $request->input('mobile_no');
        $personnel->tel_no = $request->input('tel_no');
        $personnel->home_street = $request->input('home_street');
        $personnel->home_city = $request->input('home_city');
        $personnel->home_province = $request->input('home_province');
        $personnel->home_zip = $request->input('home_zip');
        $personnel->current_street = $request->input('current_street');
        $personnel->current_city = $request->input('current_city');
        $personnel->current_province = $request->input('current_province');
        $personnel->current_zip = $request->input('current_zip');
        $personnel->ranks = $request->input('ranks');
        $personnel->unit = $validatedData['unit'];
        $personnel->sub_unit = $validatedData['sub_unit'];
        $personnel->station = $request->input('station');
        $personnel->designation = $validatedData['designation'];
        $personnel->status = $validatedData['status'];
        $personnel->user_id = Auth::id();
        $personnel->save();

        // Redirect the user to the newly created personnel's profile
        return redirect()->route('view.profile', $personnel->id);
    }

    public function edit($personnel_id)
    {
        $personnel = Personnel::findOrFail($personnel_id);
        return view('admin.pages.personnel.edit-personnel', compact('personnel'));
    }


    public function update(Request $request, $personnel_id)
{
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        // Add validation rules for other fields
    ]);

    $personnel = Personnel::findOrFail($personnel_id);
    $user_id = $personnel->user_id;

    $personnel->fill($validatedData);
    $personnel->middle_name = $request->input('middle_name');
    $personnel->birth_date = Carbon::createFromFormat('m/d/Y', $request->birth_date)->format('Y-m-d');
    $personnel->birth_place = $request->input('birth_place');
    $personnel->civil_status = $request->input('civil_status');
    $personnel->citizenship = $request->input('citizenship');
    $personnel->blood_type = $request->input('blood_type');
    $personnel->height = $request->input('height');
    $personnel->weight = $request->input('weight');
    $personnel->mobile_no = $request->input('mobile_no');
    $personnel->tel_no = $request->input('tel_no');
    $personnel->home_street = $request->input('home_street');
    $personnel->home_city = $request->input('home_city');
    $personnel->home_province = $request->input('home_province');
    $personnel->home_zip = $request->input('home_zip');
    $personnel->current_street = $request->input('current_street');
    $personnel->current_city = $request->input('current_city');
    $personnel->current_province = $request->input('current_province');
    $personnel->current_zip = $request->input('current_zip');

    $personnel->save();

    $adminRole = Role::where('name', 'admin')->first();
    $adminUser = $adminRole->users()->first();

        // Save the activity log
        $activity = new Activity();
        $activity->log_name = $adminUser->name;
        $activity->description = 'Updated the profile of ' . $personnel->first_name;
        $activity->causer_id = $adminUser->id;
        $activity->causer_type = 'App\Models\User';
        $activity->save();

    return redirect()->route('view.profile', [$user_id, $personnel_id])
        ->with('success', 'Information has been successfully updated.');
}



    //View Profile
    public function showProfile(Personnel $personnel)
    {

    return view('admin.pages.personnel.personnel-profile' , compact('personnel'));

    }



   public function createFamilyMember(Request $request, Personnel $personnel)
   {
        $request->validate([
            'name' => 'required',
            'relationship' => 'required',
            'occupation' => 'required',
            'employer' => 'sometimes',
            'business_address' => 'sometimes'
        ]);

        $familyBackground = new FamilyBackground($request->all());
        $familyBackground->personnel_id = $personnel->id;
        $familyBackground->save();


        $adminRole = Role::where('name', 'admin')->first();
        $adminUser = $adminRole->users()->first();

        // Save the activity log
        $activity = new Activity();
        $activity->log_name = $adminUser->name;
        $activity->description = 'Added a Family Member to ' . $personnel->first_name;
        $activity->causer_id = $adminUser->id;
        $activity->causer_type = 'App\Models\User';
        $activity->save();

        return redirect()->route('view.profile', $personnel)
            ->with('success', 'Family background added successfully.');
   }


    //Update Method for familyBackground
   public function updateFamilyMember(Request $request, FamilyBackground $familyBackground)
    {
    $request->validate([
        'name' => 'required',
        'relationship' => 'required',
        'occupation' => 'required',
        'employer' => 'required',
        'business_address' => 'required'
    ]);

    $familyBackground->update($request->all());

    $adminRole = Role::where('name', 'admin')->first();
    $adminUser = $adminRole->users()->first();

    

    return redirect()->route('view.profile', $familyBackground->personnel)
        ->with('success', 'Family background updated successfully.');
    }


    //Delete method for familyBackground
   public function deleteFamilyMember($id)

    {
        $familyBackground = FamilyBackground::find($id);
        if ($familyBackground) {
            $familyBackground->delete();
            return redirect()->back()->with('success', 'Family Member has been deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Family Member not found.');
        }
    }




}
