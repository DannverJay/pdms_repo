<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Personnel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            $document = Document::create([
                'personnel_id' => $personnel_id,
                'file_name' => $file_name,
                'document_type' => $documentType, // Adjust the document type as needed
                'issued_date' => $previousYear, // Set the issued date as the previous year
                'file_path' => $file_path,
            ]);

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

        return Storage::download($document->file_path, $document->file_name, $downloadHeaders);
    }


    public function deleteDocument($id)
    {
        $document = Document::findOrFail($id);

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

        return view('admin.pages.personnel.view-documents', compact('personnel', 'documents', 'totalDocuments'));
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
        $customFileName = $personnelName . '_' . $issuedYear . '_' . $fileName ;
        $filePath = $file->storeAs('public/documents/' . $personnelName,  $file->getClientOriginalName());

        $document = Document::create([
            'personnel_id' => $request->input('personnel_id'),
            'file_name' => $customFileName,
            'document_type' => $request->input('document_type'),
            'issued_date' => $request->input('issued_date'),
            'file_path' => $filePath,
        ]);

        // Perform any additional actions if needed

        return redirect()->back()->with('success', 'Document added successfully.');

    }

    public function changePassForm($id)
    {
        $personnel = Personnel::findOrFail($id);

        return view('admin.pages.personnel.change-password', compact('personnel'));
    }

    public function changePass(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        // Check if the current password matches the user's actual password
        if (Hash::check($request->input('current_password'), $user->password)) {
            // Update the user's password
            $user->password = Hash::make($request->input('new_password'));
            $user->save();

            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->with('error', 'Incorrect current password.');
        }
    }


    public function accountSetting($id)
    {
        $personnel = Personnel::findOrFail($id);
        $email = $personnel->user->email; // Assuming the email is stored in the "email" column of the "users" table
        $password = $personnel->user->password;
        return view('admin.pages.personnel.account-setting', compact('personnel', 'email', 'password'));
    }


    public function updateEmail(Request $request, $id)
    {
        $personnel = User::findOrFail($id);
        $personnel->email = $request->input('email');
        $personnel->save();

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Email updated successfully.');
    }


    public function delete($id)
    {
        $personnel = Personnel::findOrFail($id);
        $personnel->delete();

        // You can add any additional logic or redirect to the desired page
        return redirect()->back()->with('success', 'Personnel deleted successfully.');
    }
}
