<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
