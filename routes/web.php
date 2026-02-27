<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrgRegistrationController;
use App\Http\Controllers\OSAController;
use App\Http\Controllers\StudentOrgController;
use App\Models\Announcement;
use App\Models\OrgRegistration;
use App\Models\StudentOrganization;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $announcements = Announcement::where('status', 'active')
        ->orderBy('date_posted', 'desc')
        ->get();
    return view('welcome', compact('announcements'));
})->name('/');

Route::get('sampleFetchApi', function () {
    $studentOrganizations = StudentOrganization::all();
    return response()->json($studentOrganizations, 200);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Landing Page
Route::get('landing-page', [Controller::class, 'landingPage'])->name('landingPage');
Route::get('announcements-page', [Controller::class, 'announcementsPage'])->name('announcementsPage');
Route::get('user-profile/{id}', [Controller::class, 'userProfile'])->name('userProfile');

Route::get('error-unauthorized-page', [Controller::class, 'errorUnauthorizedPage'])->name('errorUnauthorizedPage');

Route::middleware('auth', 'role:2')->group(function () {

    // Student Org Pre-registration Form
    Route::get('student-org-pre-registration-form', [OrgRegistrationController::class, 'studentOrgPreRegistrationForm'])->name('studentOrgPreRegistrationForm');
    Route::post('student-org-submit-pre-reg-form', [OrgRegistrationController::class, 'studentOrgPreRegistration'])->name('studentOrgPreRegistration');

    // STUDENT ORG NAVIGATIONS
    Route::get('student-org-dashboard', [StudentOrgController::class, 'studentOrgDashboard'])->name('studentOrgDashboard');
    Route::get('student-org-calendar-of-activities', [StudentOrgController::class, 'studentOrgCalOfActs'])->name('studentOrgCalOfActs');
    Route::get('student-org-members-list', [StudentOrgController::class, 'studentOrgMembersList'])->name('studentOrgMembersList');
    Route::get('student-org-document-submission-page/{id}', [StudentOrgController::class, 'studentOrgDocuSubmissionPage'])->name('studentOrgDocuSubmissionPage');
    Route::get('student-org-document-templates', [StudentOrgController::class, 'studentOrgDocumentTemplates'])->name('studentOrgDocumentTemplates');
    Route::get('student-org-submitted-documents', [StudentOrgController::class, 'studentOrgSubmittedDocuments'])->name('studentOrgSubmittedDocuments');
    Route::get('student-org-registration-documents', [StudentOrgController::class, 'studentOrgRegistrationDocuments'])->name('studentOrgRegistrationDocuments');

    // STUDENT ORG POST ACTIONS
    Route::post('student-org-add-new-member', [StudentOrgController::class, 'studentOrgAddNewMember'])->name('studentOrgAddNewMember');
    Route::post('student-org-add-new-adviser', [StudentOrgController::class, 'studentOrgAddNewAdviser'])->name('studentOrgAddNewAdviser');
    Route::post('student-org-add-new-activity', [StudentOrgController::class, 'studentOrgAddNewActivity'])->name('studentOrgAddNewActivity');
    Route::post('student-org-submit-document', [StudentOrgController::class, 'studentOrgDocumentSubmit'])->name('studentOrgDocumentSubmit');
    Route::post('student-org-add-new-docu-on-attachment', [StudentOrgController::class, 'studentOrgAddNewDocuOnAttachment'])->name('studentOrgAddNewDocuOnAttachment');
    Route::post('student-org-add-new-unincluded-activity', [StudentOrgController::class, 'studentOrgAddNewUnincludedActivity'])->name('studentOrgAddNewUnincludedActivity');
    Route::post('student-org-add-new-operational-expenses', [StudentOrgController::class, 'studentOrgAddNewOperationalExpenses'])->name('studentOrgAddNewOperationalExpenses');
    Route::post('student-org-assign-employee-as-adviser', [StudentOrgController::class, 'studentOrgAssignEmployeeAsAdviser'])->name('studentOrgAssignEmployeeAsAdviser');
    Route::post('student-org-assign-student-as-member', [StudentOrgController::class, 'studentOrgAssignStudentAsMember'])->name('studentOrgAssignStudentAsMember');
    Route::post('student-org-update-user-profile', [StudentOrgController::class, 'studentOrgUpdateUserProfile'])->name('studentOrgUpdateUserProfile');
    Route::post('student-org-submit-registration-document', [StudentOrgController::class, 'studentOrgSubmitRegistrationDocument'])->name('studentOrgSubmitRegistrationDocument');

    // STUDENT ORG API FETCHING POST ROUTES

    Route::post('student-org-api-fetch-document-details', [StudentOrgController::class, 'studentOrgFetchDocuInformation'])->name('studentOrgFetchDocuInformation');
    Route::post('student-org-api-fetch-documents', [StudentOrgController::class, 'studentOrgFetchDocuments'])->name('studentOrgFetchDocuments');
    Route::post('student-org-fetch-calendar-of-acts', [StudentOrgController::class, 'fetchStudentOrgCalendarOfActs'])->name('fetchStudentOrgCalendarOfActs');
    Route::post('student-org-fetch-unincluded-acts', [StudentOrgController::class, 'fetchStudentOrgUnincludedActs'])->name('fetchStudentOrgUnincludedActs');
    Route::post('student-org-fetch-operational-expenses', [StudentOrgController::class, 'fetchStudentOrgOperationalExpenses'])->name('fetchStudentOrgOperationalExpenses');
    Route::post('student-org-fetch-programs', [StudentOrgController::class, 'studentOrgFetchProgram'])->name('studentOrgFetchProgram');
    Route::post('student-org-fetch-submitted-documents', [StudentOrgController::class, 'fetchStudentOrgSubmittedDocuments'])->name('fetchStudentOrgSubmittedDocuments');
    Route::post('student-org-fetch-registration-documents', [StudentOrgController::class, 'studentOrgFetchRegistrationDocuments'])->name('studentOrgFetchRegistrationDocuments');

    Route::post('student-org-fetch-members', [StudentOrgController::class, 'studentOrgCountMembers'])->name('studentOrgCountMembers');
    Route::post('student-org-fetch-add-employee-details', [StudentOrgController::class, 'studentOrgFetchAddEmployeeDetails'])->name('studentOrgFetchAddEmployeeDetails');
    Route::post('student-org-fetch-add-member-details', [StudentOrgController::class, 'studentOrgFetchAddStudentDetails'])->name('studentOrgFetchAddStudentDetails');

    Route::post('student-org-fetch-student-org-advisers', [StudentOrgController::class, 'studentOrgFetchAdvisers'])->name('studentOrgFetchAdvisers');
    Route::post('student-org-fetch-student-org-officers', [StudentOrgController::class, 'studentOrgFetchOfficers'])->name('studentOrgFetchOfficers');
    Route::post('student-org-fetch-document-templates', [StudentOrgController::class, 'studentOrgFetchDocumentTemplates'])->name('studentOrgFetchDocumentTemplates');
});

Route::middleware('auth', 'role:1')->group(function () {

    // OSAS NAVIGATIONS
    Route::get('osa-dashboard', [OSAController::class, 'osaDashboard'])->name('osaDashboard');
    Route::get('osa-student-org-list', [OSAController::class, 'osaStudentOrgsList'])->name('osaStudentOrgsList');
    Route::get('osa-pending-documents', [OSAController::class, 'osaPendingDocuments'])->name('osaPendingDocuments');
    Route::get('osa-in-process-documents', [OSAController::class, 'osaInProcessDocuments'])->name('osaInProcessDocuments');
    Route::get('osa-approved-documents', [OSAController::class, 'osaApprovedDocuments'])->name('osaApprovedDocuments');
    Route::get('osa-document-templates', [OSAController::class, 'osaDocumentTemplates'])->name('osaDocumentTemplates');
    Route::get('osa-organization-profile/{hashid}', [OSAController::class, 'osaOrganizationProfile'])->name('osaOrganizationProfile');
    Route::get('osa-pending-registration', [OSAController::class, 'osaPendingRegistration'])->name('osaPendingRegistration');
    Route::get('osa-document-details/{hashid}', [OSAController::class, 'osaDocumentDetails'])->name('osaDocumentDetails');
    Route::get('osa-activities-masterlist', [OSAController::class, 'osaActivitiesMasterList'])->name('osaActivitiesMasterList');
    Route::get('osa-monitoring', [OSAController::class, 'osaMonitoring'])->name('osaMonitoring');

    Route::get('osa-activities-report/{id}', [OSAController::class, 'osaOrgActivitiesReport'])->name('osaOrgActivitiesReport');
    Route::get('osa-officers-report/{id}', [OSAController::class, 'osaOrgOfficersReport'])->name('osaOrgOfficersReport');

    // OSA POST ROUTES
    Route::post('osa-submit-comment-on-attachment', [OSAController::class, 'submitComment'])->name('submitComment');
    Route::post('osa-update-org-docu-status', [OSAController::class, 'orgDocumentUpdateStatus'])->name('orgDocumentUpdateStatus');
    Route::post('osa-update-all-student-org-status', [OSAController::class, 'updateAllStudentOrgStatus'])->name('updateAllStudentOrgStatus');
    Route::post('osa-add-new-organization', [OSAController::class, 'osaAddNewOrganization'])->name('osaAddNewOrganization');
    Route::post('osa-update-student-org-status', [OSAController::class, 'updateStudentOrgStatus'])->name('updateStudentOrgStatus');
    Route::post('osa-add-new-document-template', [OSAController::class, 'osaAddNewDocumentTemplate'])->name('osaAddNewDocumentTemplate');
    Route::post('osa-api-delete-document-template', [OSAController::class, 'osaDeleteDocumentTemplate'])->name('osaDeleteDocumentTemplate');
    Route::post('osa-update-user-profile', [OSAController::class, 'osaUpdateUserProfile'])->name('osaUpdateUserProfile');
    Route::post('osa-update-organization-profile', [OSAController::class, 'osaUpdateOrganizationProfile'])->name('osaUpdateOrganizationProfile');
    Route::post('osa-update-org-attachment-status', [OSAController::class, 'osaUpdateOrgAttachmentStatus'])->name('osaUpdateOrgAttachmentStatus');

    // OSA POST API ROUTES
    Route::post('osa-api-fetch-student-org-members', [OSAController::class, 'fetchStudentOrgMembers'])->name('fetchStudentOrgMembers');

    Route::post('osa-api-fetch-student-org-activities', [OSAController::class, 'osafetchStudentOrgActivities'])->name('osaFetchStudentOrgActivities');
    Route::post('osa-api-fetch-student-org-documents', [OSAController::class, 'fetchStudentOrgDocuments'])->name('fetchStudentOrgDocuments');
    Route::post('osa-api-fetch-attachments-of-activity', [OSAController::class, 'osaFetchAttachmentsOfActivity'])->name('osaFetchAttachmentsOfActivity');
    Route::post('osa-update-student-org-act-status', [OSAController::class, 'osaUpdateActivityStatus'])->name('osaUpdateActivityStatus');
    Route::post('osa-api-fetch-activities', [OSAController::class, 'osaFetchActivities'])->name('osaFetchActivities');
    Route::post('osa-fetch-all-student-orgs', [OSAController::class, 'osaFetchAllStudentOrgs'])->name('osaFetchAllStudentOrgs');
    Route::get('osa-fetch-pending-documents', [OSAController::class, 'osaFetchPendingDocuments'])->name('osaFetchPendingDocuments');
    Route::get('osa-fetch-in-process-documents', [OSAController::class, 'osaFetchInProcessDocuments'])->name('osaFetchInProcessDocuments');
    Route::get('osa-fetch-approved-documents', [OSAController::class, 'osaFetchApprovedDocuments'])->name('osaFetchApprovedDocuments');
    Route::post('osa-fetch-student-org-registration-documents', [OSAController::class, 'osaFetchStudentOrgRegistrationDocuments'])->name('osaFetchStudentOrgRegistrationDocuments');

    Route::get('osa-announcements-page', [OSAController::class, 'osaAnnouncementsPage'])->name('osaAnnouncementsPage');
    Route::post('osa-fetch-announcements', [OSAController::class, 'osaFetchAnnouncements'])->name('osaFetchAnnouncements');
    Route::post('osa-add-new-announcement', [OSAController::class, 'osaAddNewAnnouncement'])->name('osaAddNewAnnouncement');
    Route::post('osa-delete-announcement', [OSAController::class, 'osaDeleteAnnouncement'])->name('osaDeleteAnnouncement');
    Route::post('osa-fetch-announcement', [OSAController::class, 'osaFetchAnnouncement'])->name('osaFetchAnnouncement');
    Route::post('osa-update-announcement', [OSAController::class, 'osaUpdateAnnouncement'])->name('osaUpdateAnnouncement');

    // DOCUMENT TEMPLATE MANAGEMENT
    Route::post('fetch-document-templates', [OSAController::class, 'fetchdocumentTemplates'])->name('fetchdocumentTemplates');
});

Route::middleware('auth', 'role:3')->group(function () {
    Route::get('admin-dashboard', [AdminController::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('admin-user-management', [AdminController::class, 'adminUserManagement'])->name('adminUserManagement');
    Route::post('admin-fetch-users', [AdminController::class, 'fetchUsers'])->name('adminFetchUsers');
});


//FilePond Temporary Add Organization Post Routes
Route::post('tmp-add-org-upload', [OSAController::class, 'tmpAddOrgUpload'])->name('tmpAddOrgUpload');
Route::delete('tmp-delete-org-upload', [OSAController::class, 'tmpDeleteOrgUpload'])->name('tmpDeleteOrgUpload');


Route::get('asd', [Controller::class, 'asd'])->name('asd');
