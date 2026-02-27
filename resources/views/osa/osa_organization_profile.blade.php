@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-4 mt-2">
                    @if ($osaOrganizationProfile->registration_status == 1)
                        <h1 class="m-0">Student Organization Profile <i class="far fa-badge-check" style="color: #02681e;"
                                title="Active"></i></h1>
                    @else
                        <h1 class="m-0">Student Organization Profile <i class="far fa-seal-exclamation"
                                style="color: #ff0000;" title="Inactive"></i></h1>
                    @endif
                </div>

                <div class="col-sm-8 mt-2">
                    <ol class="breadcrumb float-sm-right">
                        <div class="input-group-prepend mr-2">
                            <button class="btn btn-success" id="updateStudentOrgStatus"><span
                                    class="fas fa-edit mr-2"></span>Update Status</button>
                        </div>

                    </ol>
                </div>
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>

    <div class="modal fade" id="updateOrganizationStatus" tabindex="-1" role="dialog"
        aria-labelledby="updateOrganizationStatus" Label aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="container">
                        <div class="container-fluid">
                            <div class="form-group d-flex align-items-center justify-content-center">
                                <h5>Update All Student Organization Status</h5>
                            </div>
                            <form action="{{ route('updateStudentOrgStatus') }}" method="POST"
                                enctype="multipart/form-data" id="updateStudentOrganizationStatus">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row justify-content-center">
                                                <div class="col-md-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="disable" value="0">
                                                        <label class="form-check-label">Disable</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" style="background-color:green"
                                                            type="radio" name="status" id="enable" value="1">
                                                        <label class="form-check-label">Enable</label>
                                                    </div>
                                                </div>

                                                <input type="text" hidden value="{{ $osaOrganizationProfile->id }}"
                                                    id="studentOrgId" name="studentOrgId">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-block btn-sm btn-success"
                                            id="openConfirmationModal">Update</button>
                                    </div>
                                    <div class="col-md-6">

                                        <button type="button" class="btn btn-block btn-sm btn-default"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModal" Label
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="container-fluid">
                            <div class="form-group d-flex align-items-center justify-content-center">
                                <h5>Confirmation</h5>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="modal-body">
                                        Are you sure you want to update the status?
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" id="cancelUpdate" class="btn btn-default btn-block btn-sm"
                                        data-dismiss="modal">Cancel</button>
                                </div>

                                <div class="col-md-6">

                                    <button type="button" class="btn btn-success btn-block btn-sm" id="confirmUpdate"><span
                                            class="submit-text">
                                            <i class="fas fa-check me-1"></i> Confirm
                                        </span>
                                        <span class="spinner-border spinner-border-sm d-none" role="status"
                                            aria-hidden="true"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body mt-2">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        @if ($osaOrganizationProfile->image_path)
                                            <div class="text-center">
                                                <img src="{{ asset('storage/' . $osaOrganizationProfile->image_path) }}"
                                                    class="img-fluid img-circle" alt="Organization Image">
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <img src="{{ asset('images/osaslogo.png') }}" class="img-fluid"
                                                    alt="Default Image">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex flex-column justify-content-center h-100">
                                        <div class="form-group">
                                            <input type="text" value="{{ $osaOrganizationProfile->id }}"
                                                id="orgId" name="orgId" hidden>
                                            <h1>{{ $osaOrganizationProfile->organization_name }} |
                                                {{ $osaOrganizationProfile->acronym }}</h1>
                                            <h4>{{ $osaOrganizationProfile->accreditation_no }}</h4>
                                            @if ($osaOrganizationProfile->type_of_org_id == 1)
                                                <h5>University Wide Organization</h5>
                                            @elseif($osaOrganizationProfile->type_of_org_id == 2)
                                                <h5>College Council Organization</h5>
                                            @elseif($osaOrganizationProfile->type_of_org_id == 3)
                                                <h5>Class Organization</h5>
                                            @elseif($osaOrganizationProfile->type_of_org_id == 4)
                                                <h5>Non-Class Organization</h5>
                                            @elseif($osaOrganizationProfile->type_of_org_id == 5)
                                                <h5>Greek Organization</h5>
                                            @else
                                                <p>Student Organization</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#orgProfileEditModal"><i class="fas fa-edit"> </i><span>
                                            Edit</span></button>




                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="content-header">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-sm-8 mt-2">

                                </div>

                                <div class="col-sm-4 mt-2">
                                    <ol class="breadcrumb float-sm-right">

                                        <div class="input-group-prepend">
                                            <select class="custom-select mr-2" id="semesterId" name="semesterId">
                                                <option value="{{ $currentSemester->id }}" selected>
                                                    {{ $currentSemester->description }}
                                                    {{ $currentSemester->acadYear->description }}
                                                </option>
                                                @foreach ($semesters as $semester)
                                                    <option value="{{ $semester->id }}">{{ $semester->description }}
                                                        {{ $semester->acadYear->description }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </ol>
                                </div>
                            </div><!-- /.row -->

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Calendar of Activities
                        </div>
                        <div class="card-body table-responsive">
                            <table id="calendarOfActsTable" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name of Activity</th>
                                        <th>Category</th>
                                        <th>Reach</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog"
                    aria-labelledby="updateStatusModal" Label aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">

                            <div class="modal-body">
                                <div class="container">
                                    <div class="container-fluid">
                                        <div class="form-group d-flex align-items-center justify-content-center">
                                            <h5 id="asd">Update Status</h5>
                                        </div>

                                        <div class="form-group">

                                            <select name="actStatus" id="actStatus" class="form-control form-control-sm">
                                                <option id="selectedOption" value="" selected></option>
                                                <option value="1">Pending</option>
                                                <option value="2">In Progress</option>
                                                <option value="3">Completed</option>
                                                <option value="4">Closed</option>
                                                <option value="5">Cleared</option>
                                            </select>
                                        </div>


                                        <button type="submit" id="confirmUpdateStatus"
                                            class="btn btn-block btn-sm btn-success">Update</button>
                                        <button type="button" class="btn btn-block btn-sm btn-default"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            Organization Members
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover text-nowrap table-bordered" id="membersTable">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Course</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            Documents Submitted
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="documentsTable" class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th>Activity Name</th>
                                        <th>Document Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <button class="btn btn-success btn-block"
                        onclick="showOrgRegistrationDocumentsModal('{{ $osaOrganizationProfile->id }}')">View
                        Registration Documents</button>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="memberInfoModal" tabindex="-1" role="dialog" aria-labelledby="memberInfoModal" Label
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-yellow">
                    <h4 class="modal-title">Activity Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <!-- Set max-width to ensure image can scale within its container -->
                                            <img src="" alt="user-avatar" class="img-circle img-fluid"
                                                id="memberPicture" style="max-width: 100%;">
                                        </div>
                                        <div class="col-md-9">
                                            <!-- Use flexbox to ensure text content spreads alongside the image -->
                                            <div class="d-flex flex-column justify-content-center h-100">
                                                <h2 id="memberName" class="mb-0">Pangalan Diri</h2>
                                                <h5 id="memberPosition" class="mb-1">Position</h5>
                                                <p class="mb-1"><span class="mr-2"><i
                                                            class="fa-solid fa-school"></i></span><span
                                                        id="memberCollege">College</span>, <span
                                                        id="memberProgram">Course</span></p>
                                                <p class="mb-1"><span class="mr-2"><i
                                                            class="fa-solid fa-venus-mars"></i></span><span
                                                        id="sex"></span></p>
                                                <p class="mb-1"><span class="mr-2"><i
                                                            class="fa-solid fa-phone"></i></span>
                                                    <span id="contactNo"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>

    <div class="modal fade" id="activityInfoModal" tabindex="-1" role="dialog" aria-labelledby="activityInfoModal"
        Label aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-yellow">
                    <h4 class="modal-title">Activity Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12  text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h2 id="title">TITLE OF ACT HERE
                                    </h2>
                                    <h5><span id="actVenue">venue ni diri </span> | <span id="dateTime"> Date time
                                            start
                                            here</span></h5>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>Type: <span id="typeOfActivity"></span></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Budget: <span id="budget"></span></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Reach: <span id="reachOfActivity"></span></h5>
                                        </div>
                                    </div>

                                </div>
                                <p>Status: <span id="activityStatus"></span></p>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="orgProfileEditModal" tabindex="-1" role="dialog"
        aria-labelledby="orgProfileEditModal" Label aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-yellow">
                    <h4 class="modal-title">Edit Organizataion Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form action="{{ route('osaUpdateOrganizationProfile') }}" method="POST">
                        @csrf
                        <input type="text" id="newOrganizationId" name="newOrganizationId"
                            value="{{ $osaOrganizationProfile->id }}" hidden>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="newOrganizationName">Organization Name</label>
                                    <input type="text" class="form-control" id="newOrganizationName"
                                        name="newOrganizationName" placeholder="Enter new organization name"
                                        value="{{ $osaOrganizationProfile->organization_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="newOrganizationAcronym">Organization Acronym</label>
                                    <input type="text" class="form-control" id="newOrganizationAcronym"
                                        name="newOrganizationAcronym" placeholder="Enter new organization acronym"
                                        value="{{ $osaOrganizationProfile->acronym }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="newOrgRegistrationNo">Registration Number</label>
                                    <input type="text" class="form-control" id="newOrgRegistrationNo"
                                        name="newOrgRegistrationNo" placeholder="Enter new registration number"
                                        value="{{ $osaOrganizationProfile->accreditation_no }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="organizationType">Organization Type</label>
                                    <select class="form-control" name="organizationType" id="organizationType">
                                        <option value="{{ $osaOrganizationProfile->type_of_org_id }}" selected>
                                            @if ($osaOrganizationProfile->type_of_org_id == 1)
                                                University Wide
                                            @elseif($osaOrganizationProfile->type_of_org_id == 2)
                                                College Council
                                            @elseif($osaOrganizationProfile->type_of_org_id == 3)
                                                Class
                                            @elseif($osaOrganizationProfile->type_of_org_id == 4)
                                                Non-Class
                                            @elseif($osaOrganizationProfile->type_of_org_id == 5)
                                                Greek
                                            @else
                                                Student Organization
                                            @endif
                                        </option>
                                        @foreach ($organizationTypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <button class="btn btn-success btn-block" type="submit">Update</button>
                        <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            // Function to show the loading indicator
            function showLoadingIndicator() {
                $('#loadingIndicator').show();
            }

            // Function to hide loading indicator
            function hideLoadingIndicator() {
                setTimeout(function() {
                    $('#loadingIndicator').hide();
                }, 1000);
            }
            // Function to refresh calendar table

            var semesterId = $('#semesterId').val();
            var orgId = $('#orgId').val();

            // Initial refresh
            refreshMemberTable(semesterId, orgId);
            refreshActivitiesTable(semesterId, orgId);
            refreshDocumentsTable(semesterId, orgId);

            // Onchange event for semesterId select field
            $('#semesterId').change(function() {
                var semId = $(this).val();
                refreshMemberTable(semId, orgId);
                refreshActivitiesTable(semId, orgId);
                refreshDocumentsTable(semId, orgId);
            });


            // DataTable initialization
            $('#membersTable').DataTable({
                "paging": true,
                "pageLength": 5,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,

            }).buttons().container().appendTo('#membersTable_wrapper .col-md-6:eq(0)');
            $('#calendarOfActsTable').DataTable({
                "paging": true,
                "pageLength": 5,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,

            }).buttons().container().appendTo('#calendarOfActsTable_wrapper .col-md-6:eq(0)');
            $('#documentsTable').DataTable({
                "paging": true,
                "pageLength": 5,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,

            }).buttons().container().appendTo('#documentsTable_wrapper .col-md-6:eq(0)');
        });


        document.getElementById('updateStudentOrgStatus').addEventListener('click', function() {
            $('#updateOrganizationStatus').modal('show');
        });

        // Open the confirmation modal when the "Update" button is clicked
        $('#openConfirmationModal').click(function() {
            $('#confirmationModal').modal('show');
        });



        // Submit the form if the confirmation is confirmed
        $('#confirmUpdate').click(function() {
            // Disable submit button and show loading state
            const submitButton = $('#confirmUpdate');
            const cancelUpdateButton = $('#cancelUpdate');
            cancelUpdateButton.prop('disabled', true);
            submitButton.prop('disabled', true);
            submitButton.find('.submit-text').text('Updating...');
            submitButton.find('.spinner-border').removeClass('d-none');
            $('#updateStudentOrganizationStatus').submit();
        });

        function showLoadingIndicator() {
            $('#loadingIndicator').show();
        }

        // Function to hide loading indicator
        function hideLoadingIndicator() {
            setTimeout(function() {
                $('#loadingIndicator').hide();
            }, 1000);
        }

        function refreshMemberTable(semesterId, orgId) {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('fetchStudentOrgMembers') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    semester_id: semesterId,
                    studentOrgId: orgId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    hideLoadingIndicator();
                    var table = $('#membersTable').DataTable();
                    var existingRows = table.rows().remove().draw(false);
                    data.forEach(function(members, index) {

                        var existingRows = table.row.add([
                            members.fullName,
                            members.program,
                            '<button type="button" onclick="openMemberInfoModal(' +
                            members.id + ", '" +
                            members.fullName + "', '" +
                            members.college + "', '" +
                            members.program + "', '" +
                            members.position + "', '" +
                            members.image_path + "', '" +
                            members.contact + "', '" +
                            members.sex +
                            "')" +
                            '" class="btn btn-sm btn-success" title="More Info"><i class="fa-solid fa-user"></i></button>',
                        ]).node();
                    });
                    table.draw();
                },
                error: function(xhr, status, error) {
                    hideLoadingIndicator();
                    console.error(xhr.responseText);
                }
            });
        }


        function refreshActivitiesTable(semesterId, orgId) {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('osaFetchStudentOrgActivities') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    semester_id: semesterId,
                    studentOrgId: orgId,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    hideLoadingIndicator();
                    var table = $('#calendarOfActsTable').DataTable();
                    var existingRows = table.rows().remove().draw(false);
                    data.forEach(function(activities, index) {

                        var status = '';
                        var existingRows = table.row.add([
                            activities.actName,
                            activities.category,
                            activities.actReach,
                            activities.status,


                            '<button type="button" onclick="openActivityInfoModal(' +
                            activities.id + ", '" +
                            activities.actName + "', '" +
                            activities.dateStartEnd + "', '" +
                            activities.venue + "', '" +
                            activities.status + "', '" +
                            activities.budget + "', '" +
                            activities.actType + "', '" +
                            activities.actReach +

                            "')" +
                            '" class="btn btn-sm btn-success" title="More Info"><i class="fa-solid fa-circle-info"></i></button>' +
                            '<button type="button" onclick="openEditActivityStatusModal(' +
                            activities.id + ", '" +
                            activities.status + "', '" +
                            activities.statusId +
                            "')" +
                            '" class="btn btn-sm btn-success ml-1" title="More Info"><i class="fa-solid fa-pen-to-square"></i></button>',
                        ]).node();
                    });
                    table.draw();
                },
                error: function(xhr, status, error) {
                    hideLoadingIndicator();
                    console.error(xhr.responseText);
                }
            });
        }

        function refreshDocumentsTable(semesterId, orgId) {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('fetchStudentOrgDocuments') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    semester_id: semesterId,
                    studentOrgId: orgId,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    hideLoadingIndicator();
                    var table = $('#documentsTable').DataTable();
                    var existingRows = table.rows().remove().draw(false);
                    data.forEach(function(documents, index) {

                        var status = '';
                        if (documents.status == 0) {
                            status = 'Pending';
                        } else if (documents.status == 1) {
                            status = 'In Progress';
                        } else if (documents.status == 2) {
                            status = 'Approved';
                        } else {
                            status = '';
                        }
                        var existingRows = table.row.add([
                            documents.activityName,
                            documents.documentName,

                            status,
                            '<a href="/osa-document-details/' + documents
                            .id +
                            '"><button type="button" class="btn btn-sm btn-success"><i class="fas fa-list"></i></button></a>',
                        ]).node();
                    });
                    table.draw();
                },
                error: function(xhr, status, error) {
                    hideLoadingIndicator();
                    console.error(xhr.responseText);
                }
            });
        }


        function openMemberInfoModal(memberId, fullName, college, program, position, image_path, contact, sex) {
            // Assuming you have the activity ID, you can use it to fetch additional information if needed
            $('#memberName').text(fullName).css('font-weight', 'bold');
            $('#memberPosition').text(position);
            $('#memberCollege').text(college);
            $('#memberProgram').text(program);
            $('#memberPicture').attr('src', '/storage/membersPic/' + image_path);
            $('#contactNo').text(contact);
            $('#sex').text(sex);



            // Show the activityInfoModal
            $('#memberInfoModal').modal('show');
        }

        function openEditActivityStatusModal(id, status, statusId) {
            $('#selectedOption').val(statusId).text(status);
            $('#updateStatusModal').modal('show');

            $('#confirmUpdateStatus').off('click').on('click', function() {
                var actId = id;
                var actStatus = $('#actStatus').val();
                // Perform AJAX request to delete the document template
                $.ajax({
                    url: "{{ route('osaUpdateActivityStatus') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        activity_id: actId,
                        status_id: actStatus, // Pass the template ID
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#updateStatusModal').modal('hide');
                            location.reload();
                            toastr.success('Activity status updated successfully.');

                        } else {
                            toastr.error('Activity status update failed.')
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("An error occurred while deleting the document template.");
                    }
                });
            });
        }

        function openActivityInfoModal(activityId, activityName, dateStartEnd, venue, status, budget, typeOfActivity,
            reachOfActivity) {
            // Assuming you have the activity ID, you can use it to fetch additional information if needed
            $('#title').text(activityName);
            $('#actVenue').text(venue);
            $('#dateTime').text(dateStartEnd);
            $('#typeOfActivity').text(typeOfActivity);
            $('#reachOfActivity').text(reachOfActivity);
            $('#budget').text(budget);

            $('#title, #typeOfActivity, #reachOfActivity, #budget, #activityStatus').css('font-weight', 'bold');

            if (status === 'Pending') {
                $('#activityStatus').text(status).css('color', '#ffc600');
            } else if (status === 'In Progress') {
                $('#activityStatus').text(status).css('color', 'orange');
            } else if (status === 'Completed') {
                $('#activityStatus').text(status).css('color', '#02681e');
            } else if (status === 'Closed') {
                $('#activityStatus').text(status).css('color', 'red');
            } else {
                $('#activityStatus').text(status).css('color', 'black');
            }


            // Show the activityInfoModal
            $('#activityInfoModal').modal('show');
        }
    </script>
@endsection
