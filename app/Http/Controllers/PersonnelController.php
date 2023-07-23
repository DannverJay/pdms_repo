<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Personnel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

class PersonnelController extends Controller
{
    //personnel lists
    public function index(Request $request)
    {
        $totalUsers = User::count();
        $personnelCount = Personnel::count();
        $personnels = Personnel::with('user')->get();
        $personnelID = $request->input('personnel_id');

        $mobile_nos = [];
        if($personnelID != null) {
            foreach($personnelID as $index => $personnel) {
                $mobile_no = DB::table('personnels')->where('id', '=', $personnel)->pluck('mobile_no')->first();
                if ($mobile_no) {
                    $mobile_nos[] = $mobile_no;
                }
            }
        }

        $collectionOfMobileNos = implode(', ', $mobile_nos);

        return view('admin.pages.personnel.personnel-list', compact('totalUsers','personnelCount','personnels', 'personnelID', 'collectionOfMobileNos'));
    }

    public function getActive()
    {
        $totalUsers = User::count();
        $personnelCount = Personnel::where('status', 'Active')->count();
        $personnels = Personnel::with('user')->where('status', 'Active')->get();

        return view('admin.pages.personnel.status.active', compact('totalUsers', 'personnelCount', 'personnels'));
    }

    public function getInactive()
    {
        $totalUsers = User::count();
        $personnelCount = Personnel::where('status', 'Inactive')->count();
        $personnels = Personnel::with('user')->where('status', 'Inactive')->get();

        return view('admin.pages.personnel.status.inactive', compact('totalUsers', 'personnelCount', 'personnels'));
    }


      //personnel profile overview
      public function view($id)
      {

          $currentYear = date('Y');
          $previousYear = $currentYear - 1;
          $personnel = Personnel::with('user')->findOrFail($id);
          $latestIssuedDocuments = $personnel->documents()->whereYear('issued_date', $previousYear)->get();
          $totalDocuments = $personnel->documents->count();
          $totalLatestDocuments = $latestIssuedDocuments->count();


          return view('admin.pages.personnel.view-profile', compact('personnel', 'latestIssuedDocuments','previousYear', 'totalDocuments', 'totalLatestDocuments'));
      }


    //requirements upload
    public function upload(Request $request, $personnel_id)
    {
        $request->validate([
            'document_file' => 'required|mimes:pdf,jpeg,jpg,png|max:2048', // Adjust the file types and size limit as needed
        ]);

        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $file_name = $file->getClientOriginalName();
            $file_path = $file->store('documents');

            $documentType = $request->input('document_type');
            $previousYear = Carbon::now()->subYear();

            // Encrypt the file content
            $encryptedContent = Crypt::encrypt(file_get_contents($file->path()));

            // Store the encrypted content instead of the file itself
            $document = Document::create([
                'personnel_id' => $personnel_id,
                'file_name' => $file_name,
                'document_type' => $documentType,
                'issued_date' => $previousYear,
                'file_content' => $encryptedContent, // Store the encrypted content in the database
            ]);

            $personnel = $document->personnel;
            // Perform any additional actions if needed
            $adminRole = Role::where('name', 'admin')->first();
            $adminUser = $adminRole->users()->first();

            // Save the activity log
            $activity = new Activity();
            $activity->log_name = $adminUser->name;
            $activity->description = 'Downloaded a document of ' . $personnel->first_name . ' ' . $personnel->last_name;
            $activity->causer_id = $adminUser->id;
            $activity->causer_type = 'App\Models\User';
            $activity->save();

            return redirect()->back()->with('success', 'Document uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Failed to upload document.');
    }

    public function previewDocument($id)
    {
        $document = Document::findOrFail($id);

        $document = Document::findOrFail($id);
        $path = storage_path('app/' . $document->file_path);
        return response()->file($path);

    }

    public function downloadDocument($id)

    {
        $document = Document::findOrFail($id);

        // Set the download headers
        $downloadHeaders = [
            'Content-Type' => 'application/octet-stream',
        ];

        $personnel = $document->personnel;
        // Perform any additional actions if needed
        $adminRole = Role::where('name', 'admin')->first();
        $adminUser = $adminRole->users()->first();

        // Save the activity log
        $activity = new Activity();
        $activity->log_name = $adminUser->name;
        $activity->description = 'Downloaded a document of ' . $personnel->first_name . ' ' . $personnel->last_name;
        $activity->causer_id = $adminUser->id;
        $activity->causer_type = 'App\Models\User';
        $activity->save();

        return Storage::download($document->file_path, $document->file_name, $downloadHeaders);
    }


    public function deleteDocument($id)
    {
        $document = Document::findOrFail($id);

        $personnel = $document->personnel;
         // Perform any additional actions if needed
         $adminRole = Role::where('name', 'admin')->first();
         $adminUser = $adminRole->users()->first();

         // Save the activity log
         $activity = new Activity();
         $activity->log_name = $adminUser->name;
         $activity->description = 'Deleted a document of ' . $personnel->first_name . ' ' . $personnel->last_name;
         $activity->causer_id = $adminUser->id;
         $activity->causer_type = 'App\Models\User';
         $activity->save();

        // Delete the document file from storage
        Storage::delete($document->file_path);

        // Delete the document record from the database
        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }

    public function changeStatus($id, $status)
    {


        // Retrieve the personnel record
        $personnel = Personnel::findOrFail($id);

        // Retrieve the admin user based on their role
        $adminRole = Role::where('name', 'admin')->first();
        $adminUser = $adminRole->users()->first();

        // Save the activity log
        $activity = new Activity();
        $activity->log_name = $adminUser->name;
        $activity->description = 'Changed status of ' . $personnel->first_name . ' to ' . $status;
        $activity->causer_id = $adminUser->id;
        $activity->causer_type = 'App\Models\User';
        $activity->save();
        // Update the status
        $personnel->status = $status;
        $personnel->save();

        // Redirect back to the personnel list or any other desired page
        return redirect()->route('personnel-list')->with('success', 'Personnel status changed successfully.');
    }

    public function viewDocuments($id)
{
    $personnel = Personnel::findOrFail($id);
    $documents = $personnel->documents;
    $totalDocuments = $documents->count();

    $canEdit = ($totalDocuments > 0);
    $showModal = $canEdit; // Set $showModal to $canEdit value

    return view('admin.pages.personnel.view-documents', compact('personnel', 'documents', 'totalDocuments', 'canEdit', 'showModal'));
}

    public function edit(Request $request, $id)
{
    $request->validate([
        'file_name' => 'required',
        'document_type' => 'required',
    ]);

    $document = Document::findOrFail($id);
    $document->file_name = $request->input('file_name');
    $document->document_type = $request->input('document_type');



    // Update issued_year if provided
    if ($request->has('issued_date')) {
        $document->issued_date = $request->input('issued_date');
    }

    $document->save();

    $personnel = $document->personnel;
    // Perform any additional actions if needed
    $adminRole = Role::where('name', 'admin')->first();
    $adminUser = $adminRole->users()->first();

    // Save the activity log
    $activity = new Activity();
    $activity->log_name = $adminUser->name;
    $activity->description = 'Edited a document of ' . $personnel->first_name . ' ' . $personnel->last_name;
    $activity->causer_id = $adminUser->id;
    $activity->causer_type = 'App\Models\User';
    $activity->save();


    return redirect()->back()->with('success', 'Document updated successfully.');
}


    public function storeDocuments(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,jpeg,jpg,png|max:2048',
            'document_type' => 'required',
            'issued_date' => 'required|date',
        ]);

        $personnel = Personnel::findOrFail($request->input('personnel_id'));
        $issuedYear = Carbon::parse($request->input('issued_date'))->format('Y');
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

        $personnelName = $personnel->first_name . ' ' . $personnel->last_name;
        $customFileName = $personnelName . '_' . $issuedYear . '_' . $fileName;
        $filePath = $file->storeAs('public/documents/' . $personnelName, $file->getClientOriginalName());

        // Encrypt the file content
        $encryptedContent = Crypt::encrypt(file_get_contents($file->path()));

        $document = Document::create([
            'personnel_id' => $request->input('personnel_id'),
            'file_name' => $customFileName,
            'document_type' => $request->input('document_type'),
            'issued_date' => $request->input('issued_date'),
            'file_path' => $filePath,
          
        ]);

        // Perform any additional actions if needed

        $adminRole = Role::where('name', 'admin')->first();
        $adminUser = $adminRole->users()->first();

        // Save the activity log
        $activity = new Activity();
        $activity->log_name = $adminUser->name;
        $activity->description = 'Added a document to ' . $personnel->first_name . 'documents list';
        $activity->causer_id = $adminUser->id;
        $activity->causer_type = 'App\Models\User';
        $activity->save();

        return redirect()->back()->with('success', 'Document added successfully.');
    }

}
