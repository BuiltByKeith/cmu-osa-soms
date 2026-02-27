<?php

namespace App\Http\Controllers;

use App\Models\OrgRegistration;
use App\Models\TemporaryImages;
use App\Models\TypeOfOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrgRegistrationController extends Controller
{
    //

    public function studentOrgPreRegistrationForm()
    {
        $typeOfOrgs = TypeOfOrganization::all();
        return view("auth.student_org_registration_page", compact('typeOfOrgs'));
    }

    public function studentOrgPreRegistration(Request $request)
    {

        $tmp_img = TemporaryImages::where('folder', $request->inputImage)->first();

        if ($tmp_img) {
            Storage::copy('public/orgsPic/tmp/' . $tmp_img->folder . '/' . $tmp_img->file, 'public/orgsPic/' . $tmp_img->folder . '/' . $tmp_img->file);

            $preReg = new OrgRegistration;

            $preReg->organization_name = $request->input('studentOrgName');
            $preReg->accreditation_no = $request->input('accreditationNo');
            $preReg->acronym = $request->input('acronym');
            $preReg->type_of_org_id = $request->input('orgType');
            $preReg->image_path = $tmp_img->folder . '/' . $tmp_img->file;

            Storage::deleteDirectory('public/orgsPic/tmp/' . $tmp_img->folder);
            $tmp_img->delete();

            $preReg->save();

            return redirect()->back()->with('success', 'Pre Registration Successfully Submitted');
        }
        return redirect()->back()->with('error', 'Adding Member Failed');
    }

    public function tmpAddOrgUpload(Request $request)
    {
        if ($request->hasFile('inputImage')) {
            $image = $request->file('inputImage');

            $file_name = $image->getClientOriginalName();
            $folder = uniqid('orgsPic', true);
            $image->storeAs('public/orgsPic/tmp/' . $folder, $file_name);
            TemporaryImages::create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;
        }
        return '';
    }

    public function tmpDeleteOrgUpload()
    {
        $tmp_img = TemporaryImages::where('folder', request()->getContent())->first();
        if ($tmp_img) {
            Storage::deleteDirectory('public/orgsPic/tmp/' . $tmp_img->folder);
            $tmp_img->delete();
            return response('');
        }
    }
}
