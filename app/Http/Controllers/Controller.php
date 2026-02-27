<?php

namespace App\Http\Controllers;

use App\Models\ActAttachment;
use App\Models\Activity;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function landingPage()
    {

        return view('layouts.landing_page', compact('announcements'));
    }



    public function studentOrgRegistrationForm()
    {
        return view('auth.student_org_registration_page');
    }

    public function asd()
    {
        return view('asd');
    }

    public function userProfile($id)
    {
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();
        $inProgress = ActAttachment::where('status', 1)->get();

        $user = User::find($id);


        return view('layouts.user_profile', compact('actAttachmentsPending', 'actAttachmentsInProgress', 'inProgress', 'user'));
    }

    public function errorUnauthorizedPage()
    {
        return view('error');
    }
}
