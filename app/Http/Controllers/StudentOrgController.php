<?php

namespace App\Http\Controllers;

use App\Models\AcadYear;
use App\Models\ActAttachment;
use App\Models\Activity;
use App\Models\ActivityBudgetBreakdown;
use App\Models\Attachment;
use App\Models\AttachmentComment;
use App\Models\AySemester;
use App\Models\College;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\DocumentTemplates;
use App\Models\Employee;

use App\Models\Program;
use App\Models\ReachOfActivity;
use App\Models\Student;
use App\Models\StudentOrgAdviser;
use App\Models\StudentOrganization;
use App\Models\StudentOrgMember;
use App\Models\StudentOrgRegistrationDocument;
use App\Models\TemporaryImage;
use App\Models\TemporaryImages;
use App\Models\TypeOfActivity;
use App\Models\UnincludedActivity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Number;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class StudentOrgController extends Controller
{
    //

    public function studentOrgDashboard()
    {
        $loggedInOrgUserId = auth()->user()->organization->id;
        $semesters = AySemester::orderBy("created_at", "desc")->get();

        $currentSemester = null;
        $closestDateDiff = PHP_INT_MAX;
        $currentDate = now();
        $studentOrgStatus = StudentOrganization::find($loggedInOrgUserId);

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

        $members = StudentOrgMember::where('student_organization_id', $loggedInOrgUserId)->get();

        $activities = Activity::where('student_organization_id', $loggedInOrgUserId)->get();
        $documents = [];
        foreach ($activities as $activity) {
            foreach ($activity->actAttachments as $attachments) {
                $documents[] = $attachments;
            }
        }
        return view("student_org.student_org_dashboard", compact('activities', 'documents', 'studentOrgStatus', 'members'));
    }


    public function studentOrgCalOfActs()
    {
        $loggedInOrgUserId = auth()->user()->organization->id;
        $types = TypeOfActivity::all();
        $reaches = ReachOfActivity::all();
        $semesters = AySemester::orderBy("created_at", "desc")->get();
        $studentOrgStatus = StudentOrganization::find($loggedInOrgUserId);
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

        $calendarOfActivities = Activity::where('student_organization_id', $loggedInOrgUserId)->where('activity_category_id', '1')->orderBy('updated_at', 'desc')->get();
        $unincludedActivities = Activity::where('student_organization_id', $loggedInOrgUserId)->where('activity_category_id', '2')->orderBy('updated_at', 'desc')->get();
        $operationalExpenses = Activity::where('student_organization_id', $loggedInOrgUserId)->where('activity_category_id', '3')->orderBy('updated_at', 'desc')->get();
        return view("student_org.student_org_calendar_of_acts", compact("types", "reaches", "semesters", 'calendarOfActivities', 'unincludedActivities', 'operationalExpenses', 'currentSemester', 'studentOrgStatus'));
    }

    public function fetchStudentOrgCalendarOfActs(Request $request)
    {
        $organizationId = auth()->user()->organization->id;
        $calendarOfActs = Activity::where('student_organization_id', $organizationId)->where('ay_semester_id', $request->semester_id)->where('activity_category_id', 1)->orderBy('updated_at', 'desc')->get();
        $activities = [];
        foreach ($calendarOfActs as $activity) {
            $dateTimeStart = $activity->date_time_start
                ? Carbon::parse($activity->date_time_start)->format('F j, Y H:i A')
                : '';
            $dateTimeEnd = $activity->date_time_end
                ? Carbon::parse($activity->date_time_end)->format('F j, Y H:i A')
                : '';

            $dateStartEnd = $dateTimeStart ? $dateTimeStart . ' - ' . $dateTimeEnd : '';
            $createdAt = $activity->created_at ?  $activity->created_at->format('F Y') : ' ';
            $activities[] = [

                'id' => $activity->id,
                'activityName' => $activity->activity_name,
                'typeOfAct' => $activity->type->description,
                'dateStartEnd' => $dateStartEnd ? $dateStartEnd : $createdAt,
                'createdAt' => $createdAt,
                'reachOfAct' => $activity->reach->description,
                'venue' => $activity->venue,
                'budget' => $activity->budget_allocation ? Number::currency($activity->budget_allocation, 'PHP') : 'No Budget Allocated',
                'status' => $activity->activityStatus->description,
                'deadline' => $activity->deadline ? Carbon::parse($activity->deadline)->format('F j, Y H:i A') : '',
            ];
        }
        return response()->json($activities);
    }


    public function fetchStudentOrgUnincludedActs(Request $request)
    {
        $organizationId = auth()->user()->organization->id;
        $unincludedActs = Activity::where('student_organization_id', $organizationId)->where('ay_semester_id', $request->semester_id)->where('activity_category_id', 2)->orderBy('updated_at', 'desc')->get();
        $unincluded = [];
        foreach ($unincludedActs as $activity) {
            $dateTimeStart = $activity->date_time_start
                ? Carbon::parse($activity->date_time_start)->format('F j, Y H:i A')
                : null;
            $dateTimeEnd = $activity->date_time_end
                ? Carbon::parse($activity->date_time_end)->format('F j, Y H:i A')
                : null;

            $dateStartEnd = $dateTimeStart ? $dateTimeStart . ' - ' . $dateTimeEnd : '';
            $createdAt = $activity->created_at->format('F Y');
            $unincluded[] = [
                'id' => $activity->id,
                'activityName' => $activity->activity_name,
                'typeOfAct' => $activity->type->description,
                'dateStartEnd' => $dateStartEnd ? $dateStartEnd : $createdAt,
                'reachOfAct' => $activity->reach->description,
                'venue' => $activity->venue,
                'budget' =>  $activity->budget_allocation ? Number::currency($activity->budget_allocation, 'PHP') : 'No Budget Allocated',
                'status' => $activity->activityStatus->description,
                'deadline' => $activity->deadline ? Carbon::parse($activity->deadline)->format('F j, Y H:i A') : '',

            ];
        }
        return response()->json($unincluded);
    }

    public function fetchStudentOrgOperationalExpenses(Request $request)
    {
        $organizationId = auth()->user()->organization->id;
        $operationalExpenses = Activity::where('student_organization_id', $organizationId)->where('ay_semester_id', $request->semester_id)->where('activity_category_id', 3)->orderBy('updated_at', 'desc')->get();
        $expenses = [];
        foreach ($operationalExpenses as $activity) {
            $dateTimeStart = $activity->date_time_start
                ? Carbon::parse($activity->date_time_start)->format('F j, Y H:i A')
                : null;
            $dateTimeEnd = $activity->date_time_end
                ? Carbon::parse($activity->date_time_end)->format('F j, Y H:i A')
                : null;

            $dateStartEnd = $dateTimeStart ? $dateTimeStart . ' - ' . $dateTimeEnd : '';
            $createdAt = $activity->created_at->format('F Y');
            $expenses[] = [
                'id' => $activity->id,
                'activityName' => $activity->activity_name,
                'typeOfAct' => $activity->type->description,
                'dateStartEnd' => $dateStartEnd ? $dateStartEnd : $createdAt,
                'reachOfAct' => $activity->reach->description,
                'venue' => $activity->venue,
                'budget' =>  $activity->budget_allocation ? Number::currency($activity->budget_allocation, 'PHP') : 'No Budget Allocated',
                'status' => $activity->activityStatus->description,
                'deadline' => $activity->deadline ? Carbon::parse($activity->deadline)->format('F j, Y H:i A') : '',

            ];
        }
        return response()->json($expenses);
    }

    public function studentOrgFetchAdvisers(Request $request)
    {
        $organizationId = auth()->user()->organization->id;
        $studentOrgAdvisers = StudentOrgAdviser::where('student_organization_id', $organizationId)->where('ay_semester_id', $request->semester_id)->get();
        $orgAdvisers = [];

        foreach ($studentOrgAdvisers as $adviser) {
            if ($adviser->employee->sex == 0) {
                $sex = 'Female';
            } else if ($adviser->employee->sex == 1) {
                $sex = 'Male';
            } else {
                $sex = '';
            }
            $orgAdvisers[] = [
                'id' => $adviser->id,
                'fullName' => $adviser->employee->firstname . ' ' . $adviser->employee->middlename . ' ' . $adviser->employee->lastname,
                'firstName' => $adviser->employee->firstname,
                'middleName' => $adviser->employee->middlename,
                'lastName' => $adviser->employee->lastname,
                'extName' => $adviser->employee->extname,
                'employeeId' => $adviser->employee->employee_id,
                'sex' => $sex,
                'contactNo' => $adviser->employee->contact_no,
            ];
        }

        return response()->json($orgAdvisers);
    }


    public function studentOrgFetchOfficers(Request $request)
    {
        $organizationId = auth()->user()->organization->id;
        $studentOrgofficers = StudentOrgMember::where('student_organization_id', $organizationId)->where('ay_semester_id', $request->semester_id)->where('position', '!=', 'Member')->get();

        $orgOfficers = [];

        foreach ($studentOrgofficers as $officer) {
            if ($officer->student->sex == 0) {
                $sex = 'Female';
            } else if ($officer->student->sex == 1) {
                $sex = 'Male';
            } else {
                $sex = '';
            }

            $orgOfficers[] = [
                'id' => $officer->student->student_id,
                'fullName' => $officer->student->firstname . ' ' . $officer->student->middlename . ' ' . $officer->student->lastname,
                'firstName' => $officer->student->firstname,
                'middleName' => $officer->student->middlename,
                'lastName' => $officer->student->lastname,
                'extName' => $officer->student->extname,
                'position' => $officer->position,
                'sex' => $sex,
                'contact' => $officer->student->contact_no,
                'program' => $officer->student->program->program_name,
                'college' => $officer->student->program->college->college_name,
            ];
        }

        return response()->json($orgOfficers);
    }

    public function studentOrgAddNewMember(Request $request)
    {
        $validatedData = $request->validate([
            'studentId' => 'required|numeric|digits:10',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'extName' => 'nullable|string|max:255',
            'gender' => 'required|in:0,1',
            'contact' => 'required|numeric|digits:11',
            'college' => 'required|exists:colleges,id',
            'program' => 'required|exists:programs,id',
            'position' => 'nullable|string|max:255',
        ]);

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


        $loggedInOrgUserId = auth()->user()->organization->id;


        $student = new Student;
        $student->student_id = $request->studentId;
        $student->firstname = $request->firstName;
        $student->middlename = $request->middleName;
        $student->lastname = $request->lastName;
        $student->extname = $request->extName;
        $student->sex = $request->gender;
        $student->contact_no = $request->contact;
        $student->program_id = $request->program;
        $student->save();


        $studentId = $student->id;


        $studentOrgMember = new StudentOrgMember;
        $studentOrgMember->student_id = $studentId;
        $studentOrgMember->student_organization_id = $loggedInOrgUserId;
        $studentOrgMember->position = $request->position ? $request->position : 'Member';
        $studentOrgMember->ay_semester_id = $currentSemester->id;
        $studentOrgMember->acad_year_id = $currentSemester->acadYear->id;
        $studentOrgMember->save();


        return redirect()->back()->with('success', 'Successfully added a new adviser');
    }

    public function studentOrgDocumentTemplates()
    {
        return view('student_org.student_org_document_templates');
    }

    public function studentOrgSubmittedDocuments()
    {
        $organizationId = auth()->user()->organization->id;
        return view('student_org.student_org_submitted_documents', compact('organizationId'));
    }

    public function fetchStudentOrgSubmittedDocuments(Request $request)
    {
        $activities = Activity::where('student_organization_id', $request->organization_id)->get();
        $documents = [];

        foreach ($activities as $activity) {
            foreach ($activity->actAttachments as $attachment) {
                $status = '';
                if ($attachment->status == '0') {
                    $status = 'Pending';
                } else if ($attachment->status == '1') {
                    $status = 'In Progress';
                } else if ($attachment->status == '2') {
                    $status = 'Approved';
                } else {
                    $status = '';
                }
                $documents[] = [
                    'id' => $attachment->activity->id,
                    'activityName' => $attachment->activity->activity_name,
                    'documentName' => $attachment->document_name,
                    'category' => $attachment->category->description,
                    'status' => $status,
                ];
            }
        }

        return response()->json($documents);
    }

    public function studentOrgRegistrationDocuments()
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
        return view('student_org.student_org_registration_documents', compact('currentSemester', 'semesters'));
    }

    public function studentOrgFetchRegistrationDocuments(Request $request)
    {
        $loggedInOrgUserId = auth()->user()->organization->id;
        $registrationDocuments = StudentOrgRegistrationDocument::where('student_org_id', $loggedInOrgUserId)->where('ay_semester_id', $request->semester_id)->get();

        $documents = [];

        foreach ($registrationDocuments as $document) {
            $documents[] = [
                'id' => $document->id,
                'filePath' => $document->file_path,
                'fileName' => $document->file_name,
                'semester' => $document->semester->description,
                'acadYear' => $document->acadYear->description,
            ];
        }

        return response()->json($documents);
    }

    public function studentOrgMembersList()
    {
        $loggedInOrgUserId = auth()->user()->organization->id;
        $semesters = AySemester::orderBy("created_at", "desc")->get();

        $currentSemester = null;
        $closestDateDiff = PHP_INT_MAX;
        $currentDate = now();

        $studentOrgStatus = StudentOrganization::find($loggedInOrgUserId);
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
        $colleges = College::all();



        return view("student_org.student_org_members_list", compact("colleges", 'semesters', 'currentSemester', 'studentOrgStatus'));
    }

    public function studentOrgCountMembers(Request $request)
    {
        $loggedInOrgUserId = auth()->user()->organization->id;

        $studentOrgMembers = StudentOrgMember::where('student_organization_id', $loggedInOrgUserId)->where('ay_semester_id', $request->semester_id)->where('position', 'Member')->count();

        return response()->json($studentOrgMembers);
    }



    public function studentOrgDocuSubmissionPage($id)
    {
        $activity = Activity::find($id);
        $docuCategory = DocumentCategory::all();
        $documents = Document::all();
        $hasPendingAttachments = ActAttachment::where('activity_id', $id)->whereIn('status', [0, 1])->exists();
        $actAttachments = ActAttachment::where('activity_id', $id)->orderBy('created_at', 'desc')->get();


        return view('student_org.student_org_document_submission_page', compact('activity', 'documents', 'docuCategory', 'actAttachments', 'hasPendingAttachments'));
    }

    public function studentOrgDocumentSubmit(Request $request)
    {

        // Validate the file that was upload if it is a PDF or not
        $request->validate([
            'attachedFile' => 'required|file|mimes:pdf'
        ]);
        // If the request is not empty and has a file uploaded
        if ($request->hasFile('attachedFile')) {

            // Take the value of the attached file
            $file = $request->file('attachedFile');

            // Get the extension of the file that was uploaded
            $extension = $file->getClientOriginalExtension();

            // Get the original name of the file that was uploaded
            $origFileName = $file->getClientOriginalName();

            // Create a string that will take the current date and time so that we can make a unique name for every files that was uploaded
            $formattedDate = Carbon::now()->format('m-d-Y');
            $formattedTime = Carbon::now()->format('H-i-s');
            $formattedName = $formattedTime . '_' . $formattedDate . '_' . $origFileName;


            // If the uploaded file is a pdf or not
            if ($extension == 'pdf') {
                $actAttachment = new ActAttachment;
                $actAttachment->activity_id = $request->act_id;
                $actAttachment->document_name = $request->documentName;
                $actAttachment->document_category_id = $request->category;
                // Default status for every document must be 0 = Pending
                $actAttachment->status = 0;
                $actAttachment->isSeen = 0;
                $actAttachment->save();
                $actAttachmentId = $actAttachment->id;

                $attachment = new Attachment;

                $attachment->act_attachment_id = $actAttachmentId;
                $attachment->file_name = $formattedName;

                // Concatinate values to build up the structure of the file path of the uploaded file
                $destination_path = 'activity_no_' . $request->act_id . '/documents' . '/' . $request->documentName . '/';

                // Creating new directory in the storage/app/public folder
                Storage::disk('public')->makeDirectory($destination_path);

                // Insert the final value of the file in the directory and get that value and put in the file_path field in the database
                Storage::disk('public')->put($destination_path . $formattedName, file_get_contents($file->getRealPath()));
                $attachment->file_path = $destination_path . $formattedName;
                $attachment->status = 3;

                // Save
                $attachment->save();

                return redirect()->back()->with('success', 'File Uploaded Successfully');
            } else {
                return redirect()->back()->with('error', 'Wrong file format attached');
            }
        } else {
            return redirect()->back()->withErrors(['attachedFile' => 'Invalid file format. Please upload a PDF file.']);
        }
    }

    // Submit new Docu on the same activity attachments
    public function studentOrgAddNewDocuOnAttachment(Request $request)
    {
        $request->validate([
            'addNewFile' => 'required',
            'file',
            'mimes:pdf',
        ]);
        // If the request is not empty and has a file uploaded
        if ($request->hasFile('addNewFile')) {

            // Take the value of the attached file
            $file = $request->file('addNewFile');

            // Get the extension of the file that was uploaded
            $extension = $file->getClientOriginalExtension();

            // Get the original name of the file that was uploaded
            $origFileName = $file->getClientOriginalName();

            // Create a string that will take the current date and time so that we can make a unique name for every files that was uploaded
            $formattedDate = Carbon::now()->format('m-d-Y');
            $formattedTime = Carbon::now()->format('H-i-s');
            $formattedName = $formattedTime . '_' . $formattedDate . '_' . $origFileName;


            // If the uploaded file is a pdf or not
            if ($extension == 'pdf') {
                $attachment = new Attachment;
                $attachment->act_attachment_id = $request->attachmentId;
                $attachment->file_name = $formattedName;

                // Concatinate values to build up the structure of the file path of the uploaded file
                $destination_path = 'activity_no_' . $request->act_id . '/documents' . '/' . $request->documentName . '/';

                // Insert the final value of the file in the directory and get that value and put in the file_path field in the database
                Storage::disk('public')->put($destination_path . $formattedName, file_get_contents($file->getRealPath()));
                $attachment->file_path = $destination_path . $formattedName;
                $attachment->status = 3;

                // Save
                $attachment->save();

                $actAttachment = ActAttachment::find($request->attachmentId);
                if ($actAttachment) {
                    // Update the isSeen field
                    $actAttachment->isSeen = 0;

                    // Save the changes to the ActAttachment instance
                    $actAttachment->save();
                }


                return redirect()->back()->with('success', 'File Uploaded Successfully');
            } else {
                return redirect()->back()->with('error', 'Wrong file format attached');
            }
        } else {
            return redirect()->back()->withErrors(['attachedFile' => 'Invalid file format. Please upload a PDF file.']);
        }
    }

    public function studentOrgFetchProgram(Request $request)
    {
        $data['programs'] = Program::where('college_id', $request->college_id)->get();
        return response()->json($data);
    }

    public function studentOrgFetchDocuments(Request $request)
    {
        $data['documents'] = Document::where('document_category_id', $request->category_id)->get();
        return response()->json($data);
    }

    public function studentOrgFetchDocuInformation(Request $request)
    {
        $attachment = ActAttachment::find($request->attachment_id);
        $comments = [];
        $documents = [];

        foreach ($attachment->comments as $comment) {
            $comments[] = [
                'commentId' => $comment->id,
                'commentUserId' => $comment->user_id,
                'commentUserName' => $comment->user->name,
                'commentDetails' => $comment->comment_details,
                'commentDate' => $comment->updated_at->format('M/d/y | H:i:s'),
            ];
        }

        $orderedAttachments = $attachment->attachments()->orderBy('created_at', 'desc')->get();

        foreach ($orderedAttachments as $document) {
            $documents[] = [
                'id' => $document->id,
                'filePath' => $document->file_path,
                'fileName' => $document->file_name,
                'status' => $document->status,
            ];
        }

        $attachments = [
            'attachmentId' => $attachment->id,
            'activityName' => $attachment->activity->activity_name,
            'activityId' => $attachment->activity->id,
            'documentId' => $attachment->id,
            'documentName' => $attachment->document_name,
            'documentCategory' => $attachment->category->description,
            'status' => $attachment->status,
            'comments' => $comments,
            'documents' => $documents,
        ];
        return response()->json($attachments);
    }


    public function fetchDocument(Request $request)
    {
        $data['documents'] = Document::where('document_category_id', $request->category_id)->get();
        return response()->json($data);
    }

    public function studentOrgFetchAddStudentDetails(Request $request)
    {
        $studentProfile = Student::where('student_id', $request->student_id)->first();

        if ($studentProfile == null) {
            return response()->json(['status' => 'Not Found']);
        }

        if ($studentProfile->sex == 0) {
            $sex = 'Female';
        } else if ($studentProfile->sex == 1) {
            $sex = 'Male';
        } else {
            $sex = '';
        }
        $studentInfo = [
            'id' => $studentProfile->id,
            'studentId' => $studentProfile->student_id,
            'studentFullname' => $studentProfile->firstname . ' ' . substr($studentProfile->middlename, 0, 1) . ' ' . $studentProfile->lastname,
            'studentFirstname' => $studentProfile->firstname,
            'studentMiddlename' => $studentProfile->middlename,
            'studentLastname' => $studentProfile->lastname,
            'studentExtname' => $studentProfile->extname,
            'studentSex' => $sex,
            'studentContactNo' => $studentProfile->contact_no,
            'studentProgram' => $studentProfile->program->program_name,
            'studentCollege' => $studentProfile->program->college->college_name,
        ];

        return response()->json($studentInfo);
    }

    public function studentOrgAssignStudentAsMember(Request $request)
    {

        $studentOrgId = auth()->user()->organization->id;


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


        $studentOrgMember = new StudentOrgMember;
        $studentOrgMember->student_id = $request->memberProfileStudentId;
        $studentOrgMember->student_organization_id = $studentOrgId;
        $studentOrgMember->position = $request->assignStudentPosition ? $request->assignStudentPosition : 'Member';
        $studentOrgMember->ay_semester_id = $currentSemester->id;
        $studentOrgMember->acad_year_id = $currentSemester->acadYear->id;
        $studentOrgMember->save();

        return redirect()->back()->with('success', 'Successfully assigned a new officer');
    }





    public function studentOrgFetchAddEmployeeDetails(Request $request)
    {
        $employeeProfile = Employee::where('employee_id', $request->employee_id)->first();

        if ($employeeProfile == null) {
            return response()->json(['status' => 'Not Found']);
        }

        if ($employeeProfile->sex == 0) {
            $sex = 'Female';
        } else if ($employeeProfile->sex == 1) {
            $sex = 'Male';
        } else {
            $sex = '';
        }
        $employeeInfo = [
            'id' => $employeeProfile->id,
            'empId' => $employeeProfile->employee_id,
            'empFullname' => $employeeProfile->firstname . ' ' . substr($employeeProfile->middlename, 0, 1) . ' ' . $employeeProfile->lastname,
            'empFirstname' => $employeeProfile->firstname,
            'empMiddlename' => $employeeProfile->middlename,
            'empLastname' => $employeeProfile->lastname,
            'empExtname' => $employeeProfile->extname,
            'empSex' => $sex,
            'empContactNo' => $employeeProfile->contact_no,
        ];

        return response()->json($employeeInfo);
    }

    public function studentOrgAddNewAdviser(Request $request)
    {

        $validatedData = $request->validate([
            'employeeId' => 'required|string',
            'empFirstname' => 'required|string|max:255',
            'empMiddlename' => 'nullable|string|max:255',
            'empLastname' => 'required|string|max:255',
            'empExtname' => 'nullable|string|max:255',
            'empGender' => 'required|string|max:10',
            'empContactNo' => 'required|numeric|digits:11',
        ]);

        $semesters = AySemester::orderBy("created_at", "desc")->get();

        $currentSemester = null;
        $closestDateDiff = PHP_INT_MAX;
        $currentDate = now();

        foreach ($semesters as $semester) {
            $updatedAt = $semester->updated_at;

            // Calculate the difference in days between current date and updated_at of the semester
            $dateDiff = $currentDate->diffInDays($updatedAt);

            // Check if this semester's updated_at is closer to` the current date
            if ($dateDiff < $closestDateDiff) {
                $closestDateDiff = $dateDiff;
                $currentSemester = $semester;
            }
        }


        $loggedInOrgUserId = auth()->user()->organization->id;


        $employee = new Employee;
        $employee->employee_id = $request->employeeId;
        $employee->firstname = $request->empFirstname;
        $employee->middlename = $request->empMiddlename;
        $employee->lastname = $request->empLastname;
        $employee->extname = $request->empExtname;
        $employee->sex = $request->empGender;
        $employee->contact_no = $request->empContactNo;
        $employee->save();


        $employeeId = $employee->id;


        $studentOrgAdviser = new StudentOrgAdviser;
        $studentOrgAdviser->employee_id = $employeeId;
        $studentOrgAdviser->student_organization_id = $loggedInOrgUserId;
        $studentOrgAdviser->ay_semester_id = $currentSemester->id;
        $studentOrgAdviser->acad_year_id = $currentSemester->acadYear->id;
        $studentOrgAdviser->save();


        return redirect()->back()->with('success', 'Successfully added a new adviser');
    }

    public function studentOrgAssignEmployeeAsAdviser(Request $request)
    {
        // Define validation rules


        // Validation passed, proceed with the logic
        $semesters = AySemester::orderBy("created_at", "desc")->get();
        $currentSemester = null;
        $closestDateDiff = PHP_INT_MAX;
        $currentDate = now();

        foreach ($semesters as $semester) {
            $updatedAt = $semester->updated_at;
            $dateDiff = $currentDate->diffInDays($updatedAt);

            if ($dateDiff < $closestDateDiff) {
                $closestDateDiff = $dateDiff;
                $currentSemester = $semester;
            }
        }

        $loggedInOrgUserId = auth()->user()->organization->id;
        $adviser = new StudentOrgAdviser;
        $adviser->employee_id = $request->employeeProfileIdId;
        $adviser->student_organization_id = $loggedInOrgUserId;
        $adviser->ay_semester_id = $currentSemester->id;
        $adviser->acad_year_id = $currentSemester->acadYear->id;
        $adviser->save();

        return redirect()->back()->with('success', 'Successfully added a new adviser');
    }






    public function studentOrgAddNewActivity(Request $request)
    {
        $loggedInOrgUserId = auth()->user()->organization->id;
        $loggedInOrgRegStatus = auth()->user()->organization->registration_status;
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

        if ($loggedInOrgRegStatus == 0) {
            return redirect()->back()->with('error', 'Activity adding failed because your organization is currently unregistered. Please proceed to the Office of Student Affairs and Services to settle your accountabilities.');
        }

        $validatedData = $request->validate([
            'nameOfAct' => 'required|string|max:255',
            'budgetAlloc' => 'required|numeric',
            'typeOfAct' => 'required|integer|between:1,6',
            'reachOfAct' => 'required|integer|between:1,4',
            'venue' => 'required|string|max:255',
        ]);

        $activity = new Activity;

        $activity->activity_category_id = 1;
        $activity->student_organization_id = $loggedInOrgUserId;
        $activity->activity_name = $request->nameOfAct;
        $activity->budget_allocation = $request->budgetAlloc;
        $activity->type_of_activity_id = $request->typeOfAct;
        $activity->reach_of_activity_id = $request->reachOfAct;
        $activity->venue = $request->venue;
        $activity->ay_semester_id = $currentSemester->id;
        $activity->acad_year_id = $currentSemester->acadYear->id;
        $activity->activity_status_id = 1;
        $activity->save();

        return redirect()->back()->with('success', 'Activity Successfully Added!');
    }

    public function studentOrgAddNewOperationalExpenses(Request $request)
    {
        $loggedInOrgUserId = auth()->user()->organization->id;
        $loggedInOrgRegStatus = auth()->user()->organization->registration_status;
        if ($loggedInOrgRegStatus == 0) {
            return redirect()->back()->with('error', 'Activity adding failed because your organization is currently unregistered. Please proceed to the Office of Student Affairs and Services to settle your accountabilities.');
        }

        $validatedData = $request->validate([
            'nameOfAct' => 'required|string|max:255',
            'budgetAlloc' => 'required|numeric',
            'typeOfAct' => 'required|integer|between:1,6',
            'reachOfAct' => 'required|integer|between:1,4',
            'venue' => 'required|string|max:255',
        ]);


        $activity = new Activity;
        $aySemester = AySemester::find($request->semester);
        $acadYearId = $aySemester->acadYear->id;

        $activity->activity_category_id = 3;
        $activity->student_organization_id = $loggedInOrgUserId;
        $activity->activity_name = $request->nameOfAct;
        $activity->budget_allocation = $request->budgetAlloc;
        $activity->type_of_activity_id = $request->typeOfAct;
        $activity->reach_of_activity_id = $request->reachOfAct;
        $activity->venue = $request->venue;
        $activity->ay_semester_id = $request->semester;
        $activity->acad_year_id = $acadYearId;
        $activity->activity_status_id = 1;
        $activity->save();

        return redirect()->back()->with('success', 'Activity Successfully Added');
    }

    public function studentOrgAddNewUnincludedActivity(Request $request)
    {
        $loggedInOrgUserId = auth()->user()->organization->id;
        $loggedInOrgRegStatus = auth()->user()->organization->registration_status;
        if ($loggedInOrgRegStatus == 0) {
            return redirect()->back()->with('error', 'Activity adding failed because your organization is currently unregistered. Please proceed to the Office of Student Affairs and Services to settle your accountabilities.');
        }

        $validatedData = $request->validate([
            'nameOfAct' => 'required|string|max:255',
            'budgetAlloc' => 'required|numeric',
            'typeOfAct' => 'required|integer|between:1,6',
            'reachOfAct' => 'required|integer|between:1,4',
            'venue' => 'required|string|max:255',
        ]);

        $activity = new Activity;

        $aySemester = AySemester::find($request->semester);
        $acadYearId = $aySemester->acadYear->id;

        $activity->activity_category_id = 2;
        $activity->student_organization_id = $loggedInOrgUserId;
        $activity->activity_name = $request->nameOfAct;
        $activity->budget_allocation = $request->budgetAlloc;
        $activity->type_of_activity_id = $request->typeOfAct;
        $activity->reach_of_activity_id = $request->reachOfAct;
        $activity->venue = $request->venue;
        $activity->ay_semester_id = $request->semester;
        $activity->acad_year_id = $acadYearId;
        $activity->activity_status_id = 1;
        $activity->save();

        return redirect()->back()->with('success', 'Activity Successfully Added');
    }

    public function studentOrgSubmitRegistrationDocument(Request $request)
    {
        $loggedInOrgUserId = auth()->user()->organization->id;
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

        $acadYears = AcadYear::all();
        $currentAcadYear = null;

        foreach ($acadYears as $acadYear) {
            if ($currentDate->between($acadYear->date_start, $acadYear->date_end)) {
                $currentAcadYear = $acadYear;
                break; // No need to continue looping once found
            }
        }
        $validator = Validator::make($request->all(), [
            'documentName' => 'required|string|max:255',

            'fileUpload' => 'required|mimes:pdf|max:10000', // Maximum file size is 10MB
        ]);

        // If validation fails, return back with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
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

            if ($extension == 'pdf') {
                $registrationDocument = new StudentOrgRegistrationDocument;
                $registrationDocument->student_org_id = $loggedInOrgUserId;
                $registrationDocument->file_name = $request->documentName;
                $registrationDocument->ay_semester_id = $currentSemester->id;
                $registrationDocument->acad_year_id = $currentAcadYear->id;

                $destination_path = 'studentOrgRegistrationDocuments/';
                Storage::disk('public')->makeDirectory($destination_path);
                Storage::disk('public')->put($destination_path . $formattedName, file_get_contents($file->getRealPath()));


                $registrationDocument->file_path = $destination_path . $formattedName;
                $registrationDocument->save();

                return redirect()->back()->with('success', 'File Uploaded Successfully');
            } else {
                return redirect()->back()->with('error', 'Wrong file format attached');
            }
        } else {
            return redirect()->back()->withErrors(['attachedFile' => 'Invalid file format. Please upload a PDF file.']);
        }
    }


    public function studentOrgUpdateUserProfile(Request $request)
    {



        $validatedData = $request->validate([
            'editStudentOrg' => 'required|numeric',
            'editStudentOrgId' => 'required|numeric',
            'editStudentOrgName' => 'required|string|max:255',
            'editStudentOrgAcronym' => 'required|string|max:255',
            'editStudentOrgEmail' => 'email:rfc,dns',
            'currentPassword' => 'nullable|string|max:255',
            'newPassword' => 'nullable|string|max:255',
            'retypeNewPassword' => 'nullable|string|max:255',
        ]);


        $user = auth()->user();
        $organization = $user->organization;
        $loggedInOrgUserId = $organization->id;
        $loggedInUserId = $user->id;

        // Handle organization image update
        if ($request->hasFile('studentOrgImagePickerInput')) {
            $imageInput = $request->file('studentOrgImagePickerInput');
            $imageName = $imageInput->getClientOriginalName();
            $imagePath = 'studentOrgProfilePics/' . $loggedInOrgUserId . '/';

            // Delete old image if it exists
            if ($organization->image_path) {
                $oldImagePath = 'public/' . $organization->image_path;
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
            }

            // Store the new image
            $imageInput->storeAs('public/' . $imagePath, $imageName);

            // Update organization profile with new image
            $organization->organization_name = $request->editStudentOrgName;
            $organization->acronym = $request->editStudentOrgAcronym;
            $organization->image_path = $imagePath . $imageName;
            $organization->save();
        } else {
            // Update organization profile without changing the image
            $organization->organization_name = $request->editStudentOrgName;
            $organization->acronym = $request->editStudentOrgAcronym;
            $organization->save();
        }

        // Update user profile
        $userProfile = User::find($loggedInUserId);
        $userProfile->email = $request->editStudentOrgEmail;

        // Check if current password is provided for password update
        if ($request->currentPassword != null) {
            $currentPassword = $request->currentPassword;
            $newPassword = $request->newPassword;
            $retypeNewPassword = $request->retypeNewPassword;

            // Verify current password
            if (Hash::check($currentPassword, $user->password)) {
                // Check if new password and retype password match
                if ($newPassword === $retypeNewPassword) {
                    // Update password
                    $userProfile->password = Hash::make($newPassword);
                } else {
                    return redirect()->back()->with('error', 'New password and Re-type password do not match.');
                }
            } else {
                return redirect()->back()->with('error', 'Current password is incorrect.');
            }
        }

        // Save the updated user profile
        $userProfile->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function studentOrgFetchDocumentTemplates(Request $request)
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
}
