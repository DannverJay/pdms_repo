<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class SupportController extends Controller
{
    public function faq()
    {
        return view('support.faqs');
    }

    public function userGuide()
    {
        return view('support.user-guide');
    }
    public function intro()
    {
        return view('support.guide.introduction');
    }

    public function personnelList()
    {
        return view('support.guide.personnel-list');
    }

    public function userManager()
    {
        return view('support.guide.user-manager');
    }

    public function roles()
    {
        return view('support.guide.roles-permissions');
    }

    public function documentation()
    {
        return view('support.guide.documentation');
    }

    public function faqsGuide()
    {
        return view('support.guide.faqs');
    }

    public function regularUsers()
    {
        return view('support.user-guide.regular-users');
    }

    public function userIntro()
    {
        return view('support.user-guide.intro');
    }

    public function myProfile()
    {
        return view('support.user-guide.my-profile');
    }

    public function myDocuments()
    {
        return view('support.user-guide.documents');
    }
    public function changeDetails()
    {
        return view('support.user-guide.change-account');
    }

    public function activityLogs()
    {
        $logs = DB::table('activity_log')
        ->orderBy('created_at', 'desc')
        ->limit(15) // Add this line to limit the number of records
        ->get();

        return view('support.activity-logs', compact('logs'));
    }

    public function userLogs()
    {
        $user = auth()->user();

        $logs = Activity::where('causer_id', $user->id)
            ->where('causer_type', get_class($user))
            ->orderBy('created_at', 'desc')
            ->limit(15)
            ->get();

        return view('support.activity-logs', compact('logs'));
    }
}
