<?php

namespace App\Http\Controllers;

use App\Exports\OsaActivityReportDataExport;
use App\Models\AcadYear;
use App\Models\ActAttachment;
use App\Models\Activity;
use App\Models\Announcement;
use App\Models\Attachment;
use App\Models\AttachmentComment;
use App\Models\AySemester;
use App\Models\DocumentCategory;
use App\Models\DocumentTemplates;
use App\Models\Employee;
use App\Models\NatureOfActivity;
use App\Models\OrgRegistration;
use App\Models\ReachOfActivity;
use App\Models\StudentOrg;
use App\Models\StudentOrganization;
use App\Models\StudentOrgMember;
use App\Models\StudentOrgRegistrationDocument;
use App\Models\TemporaryImage;
use App\Models\TemporaryImages;
use App\Models\TypeOfActivity;
use App\Models\TypeOfOrganization;
use App\Models\User;
use App\Models\UserRole;
use Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Maatwebsite\Excel\Facades\Excel;
use Vinkla\Hashids\Facades\Hashids;

class OSAController extends Controller
{
    //

    public function osaDashboard()
    {

        $semesters = AySemester::orderBy("created_at", "desc")->get();

        $currentSemester = null;
        $closestDateDiff = PHP_INT_MAX;
        $currentDate = now();

        foreach ($semesters as $semester) {
            $updatedAt = $semester->updated_at;

            // Calculate the difference in days between current date and updated_at of the semester
            $dateDiff = $currentDate->diffInDays($updatedAt);

            // Check if this semester's updated_at is closer to the current date
            if ($dateDiff < $closestDateDiff) {
                $closestDateDiff = $dateDiff;
                $currentSemester = $semester;
            }
        }
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();
        $inProgress = ActAttachment::where('status', 1)->get();
        $activities = Activity::where('ay_semester_id', $currentSemester->id)->get();
        $studentOrgs = StudentOrganization::all();

        return view("osa.osa_dashboard", compact('actAttachmentsPending', 'actAttachmentsInProgress', 'studentOrgs', 'inProgress', 'activities'));
    }

    public function osaActivitiesMasterList()
    {

        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();
        $inProgress = ActAttachment::where('status', 1)->get();
        $semesters = AySemester::orderBy("created_at", "desc")->get();

        $currentSemester = null;
        $closestDateDiff = PHP_INT_MAX;
        $currentDate = now();

        foreach ($semesters as $semester) {
            $updatedAt = $semester->updated_at;

            // Calculate the difference in days between current date and updated_at of the semester
            $dateDiff = $currentDate->diffInDays($updatedAt);

            // Check if this semester's updated_at is closer to the current date
            if ($dateDiff < $closestDateDiff) {
                $closestDateDiff = $dateDiff;
                $currentSemester = $semester;
            }
        }
        $activities = Activity::all();
        return view('osa.osa_activities_masterlist', compact('actAttachmentsPending', 'actAttachmentsInProgress', 'inProgress', 'semesters', 'currentSemester'));
    }

    public function osaMonitoring()
    {
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();
        $inProgress = ActAttachment::where('status', 1)->get();

        $acadYears = AcadYear::all();

        $semesters = AySemester::orderBy("created_at", "desc")->get();

        $currentSemester = null;
        $closestDateDiff = PHP_INT_MAX;
        $currentDate = now();

        foreach ($semesters as $semester) {
            $updatedAt = $semester->updated_at;

            // Calculate the difference in days between current date and updated_at of the semester
            $dateDiff = $currentDate->diffInDays($updatedAt);

            // Check if this semester's updated_at is closer to the current date
            if ($dateDiff < $closestDateDiff) {
                $closestDateDiff = $dateDiff;
                $currentSemester = $semester;
            }
        }

        $currentAcadYear = null;

        foreach ($acadYears as $acadYear) {
            if ($currentDate->between($acadYear->date_start, $acadYear->date_end)) {
                $currentAcadYear = $acadYear;
                break; // No need to continue looping once found
            }
        }

        $studentOrganizations = StudentOrganization::all();
        $activities = Activity::all();
        return view('osa.osa_monitoring', compact('actAttachmentsPending', 'actAttachmentsInProgress', 'inProgress', 'studentOrganizations', 'activities', 'currentSemester', 'semesters', 'currentAcadYear', 'acadYears'));
    }

    public function osaOrgActivitiesReport($id)
    {

        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();
        $inProgress = ActAttachment::where('status', 1)->get();



        $studentOrganizations = StudentOrganization::all();
        $acadYear = AcadYear::find($id);

        return view('osa.osa_org_activities_report', compact('actAttachmentsPending', 'actAttachmentsInProgress', 'inProgress', 'studentOrganizations', 'acadYear'));
    }

    public function osaOrgOfficersReport($id)
    {
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();
        $inProgress = ActAttachment::where('status', 1)->get();

        $studentOrganizations = StudentOrganization::all();
        $acadYear = AcadYear::find($id);

        return view('osa.osa_org_officers_report', compact('actAttachmentsPending', 'actAttachmentsInProgress', 'inProgress', 'studentOrganizations', 'acadYear'));
    }




    public function osaStudentOrgsList()
    {
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();

        $typeOfOrgs = TypeOfOrganization::all();

        $studentOrgs = StudentOrganization::all();

        return view('osa.osa_student_orgs_list', compact('actAttachmentsPending', 'actAttachmentsInProgress', 'studentOrgs', 'typeOfOrgs'));
    }


    public function osaAddNewOrganization(Request $request)
    {



        $validateData = $request->validate([
            'orgName' => 'required|string|max:255',
            'acronym' => 'required|string|max:50',
            'orgType' => 'required|numeric|between:1,6',
            'emailAdd' => 'required|email:rfc,dns',
            'password' => 'required|string|max:255',
            'osaAddOrgImagePickerInput' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);


        if ($request->hasFile('osaAddOrgImagePickerInput')) {
            $imageInput = $request->file('osaAddOrgImagePickerInput');
            $imageName = $imageInput->getClientOriginalName();

            $employee = new Employee;
            $employee->employee_id = '0000000000';
            $employee->firstname = 'Employee';
            $employee->middlename = 'of';
            $employee->lastname = 'CMU';
            $employee->extname = '';
            $employee->sex = '1';
            $employee->contact_no = '00000000000';
            $employee->save();

            $employeeId = $employee->id;

            $user = new User;
            $user->employee_id = $employeeId;
            $user->name = $request->acronym;
            $user->email = $request->emailAdd;
            $user->password = Hash::make($request->password);
            $user->save();
            $userId = $user->id;

            $userRole = new UserRole;
            $userRole->user_id = $userId;
            $userRole->role_id = 2;
            $userRole->save();

            $studentOrganization = new StudentOrganization;
            $studentOrganization->user_id = $userId;
            $studentOrganization->accreditation_no = $request->accredNo;
            $studentOrganization->organization_name = $request->orgName;
            $studentOrganization->acronym = $request->acronym;
            $studentOrganization->type_of_org_id = $request->orgType;
            $studentOrganization->registration_status = 1;
            $studentOrganization->clearance_status = 1;


            $studentOrganization->save();
            $studentOrgId = $studentOrganization->id;

            $imagePath = 'studentOrgProfilePics/' . $studentOrgId . '/';
            // Store the new image
            $imageInput->storeAs('public/' . $imagePath, $imageName);

            $updateImagePath = StudentOrganization::find($studentOrgId);
            $updateImagePath->update([
                'image_path' => $imagePath . $imageName
            ]);

            return redirect()->back()->with('success', 'Successfully Registered New Organization');
        } else {
            $employee = new Employee;
            $employee->employee_id = '0000000000';
            $employee->firstname = 'Employee';
            $employee->middlename = 'of';
            $employee->lastname = 'CMU';
            $employee->extname = '';
            $employee->sex = '1';
            $employee->contact_no = '00000000000';
            $employee->save();

            $employeeId = $employee->id;

            $user = new User;
            $user->employee_id = $employeeId;
            $user->name = $request->acronym;
            $user->email = $request->emailAdd;
            $user->password = Hash::make($request->password);
            $user->save();
            $userId = $user->id;

            $userRole = new UserRole;
            $userRole->user_id = $userId;
            $userRole->role_id = 2;
            $userRole->save();

            $studentOrganization = new StudentOrganization;
            $studentOrganization->user_id = $userId;
            $studentOrganization->accreditation_no = $request->accredNo;
            $studentOrganization->organization_name = $request->orgName;
            $studentOrganization->acronym = $request->acronym;
            $studentOrganization->type_of_org_id = $request->orgType;
            $studentOrganization->registration_status = 1;
            $studentOrganization->clearance_status = 1;
            $studentOrganization->save();
            return redirect()->back()->with('success', 'Successfully Registered New Organization');
        }
    }

    public function tmpAddOrgUpload(Request $request)
    {
        if ($request->hasFile('inputImage')) {
            $image = $request->file('inputImage');

            $file_name = $image->getClientOriginalName();
            $folder = uniqid('orgsPics', true);
            $image->storeAs('public/orgsPics/tmp/' . $folder, $file_name);
            TemporaryImage::create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;
        }
        return '';
    }

    public function tmpDeleteOrgUpload()
    {
        $tmp_img = TemporaryImage::where('folder', request()->getContent())->first();
        if ($tmp_img) {
            Storage::deleteDirectory('public/orgsPics/tmp/' . $tmp_img->folder);
            $tmp_img->delete();
            return response('');
        }
    }

    public function fetchdocumentTemplates()
    {
        $documentTemplates = DocumentTemplates::all();
        $templates = [];

        foreach ($documentTemplates as $template) {
            $templates[] = [
                'id' => $template->id,
                'documentName' => $template->document_name,
                'filePath' => $template->file_path,
                'category' => $template->category->description,
            ];
        }

        return response()->json($templates);
    }

    public function osaAddNewDocumentTemplate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'documentName' => 'required|string|max:255',

            'fileUpload' => 'required|mimes:pdf|max:10000', // Maximum file size is 10MB
        ]);

        // If validation fails, return back with errors
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Wrong file format attached');
        }

        if ($request->hasFile('fileUpload')) {
            $file = $request->file('fileUpload');

            // Get the file extension
            $extension = $file->getClientOriginalExtension();

            // Get the original name of the file that was uploaded
            $origFileName = $file->getClientOriginalName();

            $formattedDate = Carbon::now()->format('m-d-Y');
            $formattedTime = Carbon::now()->format('H-i-s');
            $formattedName = $formattedTime . '_' . $formattedDate . '_' . $origFileName;

            $docuCategory = '';

            if ($request->documentCategory == 1) {
                $docuCategory = 'Pre-Activity';
            } else if ($request->documentCategory == 2) {
                $docuCategory = 'Post-Activity';
            } else if ($request->documentCategory == 3) {
                $docuCategory = 'Term End Report';
            } else {
                $docuCategory = '';
            }

            if ($extension == 'pdf') {
                $documentTemplate = new DocumentTemplates;
                $documentTemplate->document_name = $request->documentName;
                $documentTemplate->document_category_id = $request->documentCategory;
                $destination_path = 'documentTemplates/' . $docuCategory . '/';

                Storage::disk('public')->makeDirectory($destination_path);
                Storage::disk('public')->put($destination_path . $formattedName, file_get_contents($file->getRealPath()));


                $documentTemplate->file_path = $destination_path . $formattedName;
                $documentTemplate->save();

                return redirect()->back()->with('success', 'File Uploaded Successfully');
            } else {
                return redirect()->back()->with('error', 'Wrong file format attached');
            }
        } else {
            return redirect()->back()->withErrors(['attachedFile' => 'Invalid file format. Please upload a PDF file.']);
        }
    }

    public function osaDeleteDocumentTemplate(Request $request)
    {
        $documentTemplate = DocumentTemplates::find($request->template_id);

        if ($documentTemplate) {
            // Extract the directory path from the file path
            $filePath = $documentTemplate->file_path;
            $directoryPath = dirname($filePath);

            // Delete the directory and its contents from storage
            Storage::deleteDirectory('public/' . $directoryPath);

            // Delete the document template from the database
            $documentTemplate->delete();

            return response()->json(['success' => true, 'message' => 'Document template deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Document template not found']);
        }
    }


    public function osaDocumentTemplates()
    {
        $natureOfActivity = TypeOfActivity::all();
        $typeOfActivity = TypeOfActivity::all();
        $reachOfActivity = ReachOfActivity::all();
        $documentCategories = DocumentCategory::all();

        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();

        return view("osa.osa_document_templates", compact("natureOfActivity", "typeOfActivity", "reachOfActivity", 'actAttachmentsPending', 'actAttachmentsInProgress', 'documentCategories'));
    }

    public function osaOrganizationProfile($hashid)
    {

        $decoded = Hashids::decode($hashid);

        if (empty($decoded)) {
            abort(404); // hash is invalid or not decodable
        }

        $id = $decoded[0];

        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();

        $semesters = AySemester::orderBy("created_at", "desc")->get();

        $currentSemester = null;
        $closestDateDiff = PHP_INT_MAX;
        $currentDate = now();

        foreach ($semesters as $semester) {
            $updatedAt = $semester->updated_at;

            // Calculate the difference in days between current date and updated_at of the semester
            $dateDiff = $currentDate->diffInDays($updatedAt);

            // Check if this semester's updated_at is closer to the current date
            if ($dateDiff < $closestDateDiff) {
                $closestDateDiff = $dateDiff;
                $currentSemester = $semester;
            }
        }

        $osaOrganizationProfile = StudentOrganization::findOrFail($id);
        $organizationTypes = TypeOfOrganization::all();

        return view("osa.osa_organization_profile", compact("osaOrganizationProfile", 'actAttachmentsPending', 'actAttachmentsInProgress', 'semesters', 'currentSemester', 'organizationTypes'));
    }

    public function osaUpdateUserProfile(Request $request)
    {
        $employeeProfile = Employee::find($request->input('employeeId'));
        $loggedInUserId = auth()->user()->id;
        $employeeProfile->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'extname' => $request->extname,
            'contact_no' => $request->contactNo,
            'sex' => $request->gender,
        ]);

        $userProfile = User::find($loggedInUserId);
        if ($request->editOsaPassword == null) {
            $userProfile->email = $request->editOsaEmail;
            $userProfile->save();
        } else if ($request->editOsaPassword != null) {
            $userProfile->email = $request->editOsaEmail;
            $userProfile->password = Hash::make($request->editOsaPassword);
            $userProfile->save();
        }

        return redirect()->back()->with('success', 'Profile Successfully Updated');
    }

    public function osaUpdateActivityStatus(Request $request)
    {
        $activity = Activity::find($request->activity_id);
        if ($activity) {
            $activity->update(['activity_status_id' => $request->status_id]);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function osaFetchActivities(Request $request)
    {
        $studentOrgActivities = Activity::where('ay_semester_id', $request->semester_id)->orderBy('created_at', 'desc')->get();
        $activities = [];


        foreach ($studentOrgActivities as $activity) {
            $dateTimeStart = $activity->date_time_start
                ? Carbon::parse($activity->date_time_start)->format('F j, Y H:i A')
                : null;
            $dateTimeEnd = $activity->date_time_end
                ? Carbon::parse($activity->date_time_end)->format('F j, Y H:i A')
                : null;

            $dateStartEnd = $dateTimeStart ? $dateTimeStart . ' - ' . $dateTimeEnd : '';
            $createdAt = $activity->created_at->format('F Y');
            $activities[] = [
                'id' => $activity->id,
                'orgId' => $activity->studentOrg->id,
                'activityName' => $activity->activity_name,
                'orgName' => $activity->studentOrg->organization_name,
                'dateStartEnd' => $dateStartEnd ? $dateStartEnd : $createdAt,
                'status' => $activity->activityStatus->description,
            ];
        }
        return response()->json($activities);
    }

    public function osaFetchAllStudentOrgs(Request $request)
    {
        if ($request->filterByType != 0) {
            $orgs = StudentOrganization::where('type_of_org_id', $request->filterByType)->get();

            $studentOrgs = [];

            foreach ($orgs as $org) {
                $status = '';
                if ($org->registration_status == 0) {
                    $status = 'Disabled';
                } else if ($org->registration_status == 1) {
                    $status = 'Enabled';
                } else {
                    $status = '';
                }
                $studentOrgs[] = [
                    'id' => $org->id,
                    'hashid' => Hashids::encode($org->id),
                    'orgName' => $org->organization_name,
                    'orgAcronym' => $org->acronym,
                    'accredNo' => $org->accreditation_no,
                    'orgType' => $org->typeOfOrg->description,
                    'status' => $status,
                ];
            }

            return response()->json($studentOrgs);
        } else {
            $orgs = StudentOrganization::all();

            $studentOrgs = [];

            foreach ($orgs as $org) {
                $status = '';
                if ($org->registration_status == 0) {
                    $status = 'Disabled';
                } else if ($org->registration_status == 1) {
                    $status = 'Enabled';
                } else {
                    $status = '';
                }
                $studentOrgs[] = [
                    'id' => $org->id,
                    'hashid' => Hashids::encode($org->id),
                    'orgName' => $org->organization_name,
                    'orgAcronym' => $org->acronym,
                    'accredNo' => $org->accreditation_no,
                    'orgType' => $org->typeOfOrg->description,
                    'status' => $status,
                ];
            }

            return response()->json($studentOrgs);
        }
    }

    public function fetchStudentOrgMembers(Request $request)
    {
        $data = StudentOrgMember::where('student_organization_id', $request->studentOrgId)->where('ay_semester_id', $request->semester_id)->get();
        $members = [];
        foreach ($data as $member) {
            if ($member->student->sex == 0) {
                $sex = 'Female';
            } elseif ($member->student->sex == 1) {
                $sex = 'Male';
            } else {
                $sex = '';
            }
            $members[] = [
                'id' => $member->id,
                'studentId' => $member->student->id,
                'fullName' => $member->student->firstname . ' ' . substr($member->student->middlename, 0, 1) . ' ' . $member->student->lastname,
                'college' => $member->student->program->college->college_name,
                'program' => $member->student->program->program_name,
                'position' => $member->position,
                'image_path' => $member->student->image_path,
                'contact' => $member->student->contact_no,
                'sex' => $sex,
            ];
        }
        return response()->json($members);
    }

    public function osafetchStudentOrgActivities(Request $request)
    {
        $activities = Activity::where('student_organization_id', $request->studentOrgId)->where('ay_semester_id', $request->semester_id)->get();
        $studentOrgActs = [];
        foreach ($activities as $activity) {
            $dateTimeStart = $activity->date_time_start
                ? Carbon::parse($activity->date_time_start)->format('F j, Y H:i A')
                : null;
            $dateTimeEnd = $activity->date_time_end
                ? Carbon::parse($activity->date_time_end)->format('F j, Y H:i A')
                : null;

            $createdAt = $activity->created_at->format('F Y');
            $dateStartEnd = $dateTimeStart ? $dateTimeStart . ' - ' . $dateTimeEnd : $createdAt;

            $studentOrgActs[] = [
                'id' => $activity->id,
                'actName' => $activity->activity_name,
                'actType' => $activity->type->description,
                'actReach' => $activity->reach->description,
                'venue' => $activity->venue,
                'statusId' => $activity->activity_status_id,
                'status' => $activity->activityStatus->description,
                'category' => $activity->category->description,
                'budget' => $activity->budget_allocation,
                'dateStartEnd' => $dateStartEnd ? $dateStartEnd : $createdAt,
            ];
        }

        return response()->json($studentOrgActs);
    }

    public function fetchStudentOrgDocuments(Request $request)
    {
        $activities = Activity::where('student_organization_id', $request->studentOrgId)->where('ay_semester_id', $request->semester_id)->get();

        $actAttachments = [];

        foreach ($activities as $activity) {
            foreach ($activity->actAttachments as $attachment) {
                $actAttachments[] = [
                    'id' => $attachment->id,
                    'activityName' => $attachment->activity->activity_name,
                    'documentName' => $attachment->document_name,
                    'status' => $attachment->status,
                ];
            }
        }
        return response()->json($actAttachments);
    }

    public function osaPendingDocuments()
    {
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();
        $pendingAttachments = ActAttachment::where('status', 0)->orderBy('created_at', 'desc')->get();

        return view('osa.osa_documents.osa_pending', compact('actAttachmentsPending', 'actAttachmentsInProgress'));
    }

    public function osaFetchPendingDocuments()
    {
        $pendingAttachments = ActAttachment::where('status', 0)->orderBy('created_at', 'desc')->get();

        $pendings = [];

        foreach ($pendingAttachments as $pending) {
            $pendings[] = [
                'id' => $pending->id,
                'hashid' => Hashids::encode($pending->id),
                'orgName' => $pending->activity->studentOrg->organization_name,
                'actName' => $pending->activity->activity_name,
                'documentName' => $pending->document_name,
                'documentCat' => $pending->document_category_id,
                'dateUpdate' => $pending->updated_at->format('m/d/Y | h:i A'),
                'isSeen' => $pending->isSeen,
            ];
        }

        return response()->json($pendings);
    }

    public function osaInProcessDocuments()
    {
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();
        $inProcessAttachments = ActAttachment::where('status', 1)->orderBy('created_at', 'desc')->get();

        return view('osa.osa_documents.osa_in_process', compact('actAttachmentsPending', 'actAttachmentsInProgress'));
    }

    public function osaFetchInProcessDocuments()
    {
        $inProcessAttachments = ActAttachment::where('status', 1)->orderBy('created_at', 'desc')->get();

        $inProcess = [];

        foreach ($inProcessAttachments as $process) {
            $inProcess[] = [
                'id' => $process->id,
                'hashid' => Hashids::encode($process->id),
                'orgName' => $process->activity->studentOrg->organization_name,
                'actName' => $process->activity->activity_name,
                'documentName' => $process->document_name,
                'documentCat' => $process->document_category_id,
                'dateUpdate' => $process->updated_at->format('m/d/Y | h:i A'),
                'isSeen' => $process->isSeen,
            ];
        }

        return response()->json($inProcess);
    }

    public function osaApprovedDocuments()
    {
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();

        return view('osa.osa_documents.osa_approved', compact('actAttachmentsPending', 'actAttachmentsInProgress'));
    }

    public function osaFetchApprovedDocuments()
    {
        $approvedAttachments = ActAttachment::where('status', 2)->orderBy('created_at', 'desc')->get();

        $approved = [];

        foreach ($approvedAttachments as $approve) {
            $approved[] = [
                'id' => $approve->id,
                'orgName' => $approve->activity->studentOrg->organization_name,
                'actName' => $approve->activity->activity_name,
                'documentName' => $approve->document_name,
                'documentCat' => $approve->document_category_id,
                'dateUpdate' => $approve->updated_at->format('m/d/Y | h:i A'),

            ];
        }

        return response()->json($approved);
    }

    public function osaDocumentDetails($hashid)
    {

        $decoded = Hashids::decode($hashid);

        if (empty($decoded)) {
            abort(404); // hash is invalid or not decodable
        }

        $id = $decoded[0];

        $actAttachment = ActAttachment::findOrFail($id);
        $actAttachmentComments = $actAttachment->comments;
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();
        return view('osa.osa_document_details', compact('actAttachmentsPending', 'actAttachmentsInProgress', 'actAttachment', 'actAttachmentComments'));
    }


    public function osaFetchAttachmentsOfActivity(Request $request)
    {
        $attachments = Attachment::where('act_attachment_id', $request->actAttachmentId)->orderBy('created_at', 'desc')->get();
        $attachmentInfos = [];

        foreach ($attachments as $attachment) {
            $attachmentInfos[] = [
                'attachmentId' => $attachment->id,
                'attachmentName' => $attachment->file_name,
                'attachmentPath' => $attachment->file_path,
                'attachmentStatus' => $attachment->status,
                'attachmentPosted' => $attachment->created_at,
            ];
        }

        return response()->json($attachmentInfos);
    }

    public function submitComment(Request $request)
    {
        $actAttachComment = new AttachmentComment;

        $actAttachComment->act_attachment_id = $request->actAttachId;
        $actAttachComment->user_id = $request->userId;
        $actAttachComment->comment_details = $request->comment;
        $actAttachComment->save();

        $actAttachment = ActAttachment::find($request->actAttachId);
        if ($actAttachment) {
            // Update the isSeen field
            $actAttachment->isSeen = 1;
            $actAttachment->status = 1;

            // Save the changes to the ActAttachment instance
            $actAttachment->save();
        }

        return redirect()->back()->with('success', 'Comment Successfully Sent!');
    }

    public function orgDocumentUpdateStatus(Request $request)
    {
        $actAttachment = ActAttachment::find($request->actAttachId);

        if ($actAttachment) {
            $actAttachment->status = $request->status;
            $actAttachment->save();

            if ($request->status == 2) {
                // Date and Time Start
                // Concatenate date and time into a single string
                $dateTimeStartString = $request->dateStart . ' ' . $request->timeStart;
                // Convert the concatenated string to datetime format
                $dateTimeStart = date('Y-m-d H:i:s', strtotime($dateTimeStartString));

                // Date and Time End
                $dateTimeEndString = $request->dateEnd . ' ' . $request->timeEnd;
                // Convert the concatenated string to datetime format
                $dateTimeEnd = date('Y-m-d H:i:s', strtotime($dateTimeEndString));

                // Assign the datetime value to the activity's date_time_start property
                $actAttachment->activity->date_time_start = $dateTimeStart;
                $actAttachment->activity->date_time_end = $dateTimeEnd;
                $actAttachment->activity->activity_status_id = 2;
                $actAttachment->activity->deadline = Carbon::parse($dateTimeEnd)->addDays(10);

                // Check if the attachment is an activity report
                if ($request->attachmentCategory == 2 && $request->attachmentName == 'Activity Report') {
                    // Set the status approved date to current date
                    $actAttachment->status_approved_date = now();
                    $actAttachment->save();
                }
                if ($request->attachmentCategory == 2 && $request->attachmentName == 'Narrative Report') {
                    // Set the status approved date to current date
                    $actAttachment->status_approved_date = now();
                    $actAttachment->save();
                }



                $actAttachment->activity->save();
            }

            if ($request->attachmentCategory == 2 && $request->status == 2) {
                $actAttachment->activity->activity_status_id = 3;
            }

            if ($request->attachmentCategory == 3 && $request->status == 2) {
                $actAttachment->activity->activity_status_id = 5;
            }

            $actAttachment->activity->save();

            return redirect()->back()->with('success', 'Document Successfully Updated!');
        }

        return redirect()->back()->with('error', 'Error Updating Document!');
    }



    public function osaPendingRegistration()
    {
        $pendingOrgs = OrgRegistration::all();
        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();

        if (request()->ajax()) {
            return response()->json($pendingOrgs);
        } else {
            return view('osa.osa_registration', compact("actAttachmentsPending", "actAttachmentsInProgress"));
        }
    }

    public function updateAllStudentOrgStatus(Request $request)
    {
        if ($request->status == null) {
            return redirect()->back()->with("error", "Please specify the status.");
        } else {
            $studentOrganizations = StudentOrganization::all();
            foreach ($studentOrganizations as $studentOrg) {
                $studentOrg->registration_status = $request->status;
                $studentOrg->save();
            }
            return redirect()->back()->with("success", "Successfully Updated All Student Organization Statuses");
        }
    }

    public function updateStudentOrgStatus(Request $request)
    {
        $studentOrganization = StudentOrganization::find($request->studentOrgId);
        $studentOrganization->registration_status = $request->status;
        $studentOrganization->save();
        return redirect()->back()->with("success", "Successfully updated the status.");
    }

    public function osaFetchStudentOrgRegistrationDocuments(Request $request)
    {
        $studentOrgRegDocu = StudentOrgRegistrationDocument::where('student_org_id', $request->org_id)->get();
    }

    public function osaUpdateOrganizationProfile(Request $request)
    {

        $validateData = $request->validate([
            'newOrganizationName' => 'required|string|max:255',
            'newOrganizationAcronym' => 'required|string|max:255',
            'newOrgRegistrationNo' => 'required|string|max:255',
            'organizationType' => 'required|numeric|max:6',
        ]);

        $organizationProfile = StudentOrganization::find($request->newOrganizationId);


        $organizationProfile->update([
            'organization_name' => $request->newOrganizationName,
            'acronym' => $request->newOrganizationAcronym,
            'accreditation_no' => $request->newOrgRegistrationNo,
            'type_of_org_id' => $request->organizationType,
        ]);

        return redirect()->back()->with('success', 'Student Organization Information Successfully Updated!');
    }

    public function osaUpdateOrgAttachmentStatus(Request $request)
    {

        $attachment = Attachment::find($request->attachment_id);
        if ($attachment) {
            // Update the status based on the checkbox
            $attachment->status = $request->input('status') === '1' ? 2 : 1; // Toggle logic
            $attachment->save();
        }

        // Return a redirect or response as necessary
        return redirect()->back()->with('success', 'Attachment status updated successfully!');
    }

    public function osaAnnouncementsPage()
    {

        $actAttachmentsPending = ActAttachment::where('status', 0)->get();
        $actAttachmentsInProgress = ActAttachment::where('status', 1)->where('isSeen', 0)->get();

        return view('osa.announcements_page', compact('actAttachmentsPending', 'actAttachmentsInProgress'));
    }

    public function osaFetchAnnouncements()
    {
        $announcements = Announcement::all();
        $announcementArray = [];
        foreach ($announcements as $announcement) {
            $announcementArray[] = [
                'id' => $announcement->id,
                'title' => $announcement->title,
                'content' => $announcement->content,
                'date_posted' => $announcement->date_posted->format('M d, Y'),
                'status' => $announcement->status,
            ];
        }
        return response()->json($announcementArray);
    }

    public function osaAddNewAnnouncement(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date_posted' => 'required|date',
        ]);

        $announcement = new Announcement;
        $announcement->create([
            'title' => $validateData['title'],
            'content' => $validateData['content'],
            'date_posted' => $validateData['date_posted'],
        ]);

        return response()->json(['success' => true, 'message' => 'Announcement added successfully']);
    }

    public function osaDeleteAnnouncement(Request $request)
    {
        $announcement = Announcement::find($request->announcement_id);
        $announcement->delete();
        return response()->json(['success' => true, 'message' => 'Announcement deleted successfully']);
    }

    public function osaFetchAnnouncement(Request $request)
    {
        $announcement = Announcement::find($request->announcement_id);
        if ($announcement) {
            return response()->json([
                'success' => true,
                'announcement' => $announcement
            ]);
        }
        return response()->json(['success' => false, 'message' => 'Announcement not found']);
    }

    public function osaUpdateAnnouncement(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date_posted' => 'required|date',
            'status' => 'required|in:active,inactive'
        ]);

        $announcement = Announcement::find($request->announcement_id);
        if ($announcement) {
            $announcement->update([
                'title' => $validateData['title'],
                'content' => $validateData['content'],
                'date_posted' => $validateData['date_posted'],
                'status' => $validateData['status']
            ]);
            return response()->json(['success' => true, 'message' => 'Announcement updated successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Announcement not found']);
    }
}
