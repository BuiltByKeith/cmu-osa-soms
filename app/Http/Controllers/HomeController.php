<?php

namespace App\Http\Controllers;

use App\Models\ActAttachment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();
        return view('home', compact('actAttachmentsInProgress', 'actAttachmentsPending'));
    }
}
