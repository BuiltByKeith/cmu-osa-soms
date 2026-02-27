@extends('layouts.app')

@section('content')
    {{-- HEADER PART --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-3">
                    <h1 class="m-0">{{ Auth::user()->organization->organization_name }} Members</h1>

                </div>
                <div class="col-sm-6 mt-3">
                    <ol class="breadcrumb float-sm-right">
                        <div class="input-group-prepend">
                            <select class="custom-select mr-2" id="semesterId" name="semesterId">
                                <option value="{{ $currentSemester->id }}" selected>{{ $currentSemester->description }}
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
            @if ($studentOrgStatus->registration_status == 0)
                <div class="alert alert-danger  mt-3">

                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                    Your account is currently disabled since your organization is unregistered. Please proceed to the Office
                    of Student Affairs and Services and settle your accountabilities. Thank you!
                </div>
            @endif

        </div><!-- /.container-fluid -->
    </div>

    <hr>
    <br>



    <div class="content">

        {{-- ADVISER TABLE LIST --}}
        <div class="container-fluid">
            <div class="col-12 ">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h3>Advisers</h3>
                    </div>
                    <div class="col-md-6 text-md-right">
                        @if ($studentOrgStatus->registration_status == 0)
                            <button data-toggle="modal" data-target="#addNewAdviserModal" data-toggle="modal" type="button"
                                class="btn btn-success" disabled>Add Adviser</button>
                        @else
                            <button data-toggle="modal" data-target="#addNewAdviserModal" data-toggle="modal" type="button"
                                class="btn btn-success">Add Adviser</button>
                        @endif

                    </div>
                </div>
                @include('student_org.student_org_modals.add_new_adviser_modal')
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-hover table-bordered" id="advisersTable">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Position</th>
                                    <th>Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <hr>
    <br>

    <div class="content">
        <div class="container-fluid">

            <div class="col-md-12">

                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-12">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h3>Officers</h3>
                            </div>
                            <div class="col-md-6 text-md-right">
                                @if ($studentOrgStatus->registration_status == 0)
                                    <button data-toggle="modal" data-target="#addNewMemberModal" data-toggle="modal"
                                        type="button" class="btn btn-success " disabled>Add Member</button>
                                @else
                                    <button data-toggle="modal" data-target="#addNewMemberModal" data-toggle="modal"
                                        type="button" class="btn btn-success ">Add Member</button>
                                @endif

                            </div>
                        </div>
                        @include('student_org.student_org_modals.add_new_member_modal')
                        <div class="card">
                            <div class="card-header">
                                <strong>Officers</strong>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table class="table table-hover table-bordered" id="officersTable">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Course</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3 id="numberOfNormalMembersCard" name="numberOfNormalMembersCard"></h3>

                                <p>Members</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <br>

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

    <div class="modal fade" id="adviserInfoModal" tabindex="-1" role="dialog" aria-labelledby="adviserInfoModal"
        Label aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-yellow">
                    <h4 class="modal-title">Adviser Profile</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <!-- Set max-width to ensure image can scale within its container -->
                                                <img src="" alt="user-avatar" class="img-circle img-fluid"
                                                    id="adviserPicture" style="max-width: 100%;">
                                            </div>
                                            <div class="col-md-9">
                                                <!-- Use flexbox to ensure text content spreads alongside the image -->
                                                <div class="d-flex flex-column justify-content-center h-100">
                                                    <h2 id="adviserName" class="mb-0">Pangalan Diri</h2>
                                                    <h5 id="adviserPosition" class="mb-1">Position</h5>
                                                    <p class="mb-1"><span class="mr-2"><i
                                                                class="fa-solid fa-phone"></i></span><span
                                                            id="adviserContact">College</span>
                                                </div>
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

    <script type="text/javascript">
        function refreshAdvisersTable(semId) {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('studentOrgFetchAdvisers') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    semester_id: semId,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);
                    hideLoadingIndicator();
                    var table = $('#advisersTable').DataTable();
                    table.clear(); // Clear existing rows
                    data.forEach(function(orgAdvisers) {
                        table.row.add([
                            orgAdvisers.fullName,
                            'Adviser',
                            orgAdvisers.contactNo,
                            '<button type="button" onclick="openAdviserInfoModal(' +
                            orgAdvisers.id + ", '" +
                            orgAdvisers.fullName + "', '" +

                            orgAdvisers.sex + "', '" +
                            orgAdvisers.contactNo +
                            "')" +
                            '" class="btn btn-sm btn-success" title="More Info"><i class="fa-solid fa-user"></i></button>'
                        ]);
                    });
                    table.draw(); // Redraw table
                },
                error: function(xhr, status, error) {
                    hideLoadingIndicator();
                    console.error(xhr.responseText);
                }
            });
        }

        function refreshOfficersTable(semId) {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('studentOrgFetchOfficers') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    semester_id: semId,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);
                    hideLoadingIndicator();
                    var table = $('#officersTable').DataTable();
                    table.clear(); // Clear existing rows
                    data.forEach(function(orgOfficers) {
                        table.row.add([
                            orgOfficers.fullName,

                            orgOfficers.program,
                            orgOfficers.position,
                            '<button type="button" onclick="openMemberInfoModal(' +
                            orgOfficers.id + ", '" +
                            orgOfficers.fullName + "', '" +
                            orgOfficers.college + "', '" +
                            orgOfficers.program + "', '" +
                            orgOfficers.position + "', '" +
                            orgOfficers.contact + "', '" +
                            orgOfficers.sex +
                            "')" +
                            '" class="btn btn-sm btn-success" title="More Info"><i class="fa-solid fa-user"></i></button>'

                        ]);
                    });
                    table.draw(); // Redraw table
                },
                error: function(xhr, status, error) {
                    hideLoadingIndicator();
                    console.error(xhr.responseText);
                }
            });
        }

        function countMembers(semId) {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('studentOrgCountMembers') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    semester_id: semId,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);
                    hideLoadingIndicator();
                    var card = $('#numberOfNormalMembersCard');
                    card.text(data);

                },
                error: function(xhr, status, error) {
                    hideLoadingIndicator();
                    console.error(xhr.responseText);
                }
            });
        }



        function openMemberInfoModal(memberId, fullName, college, program, position, contact, sex) {
            // Assuming you have the activity ID, you can use it to fetch additional information if needed
            $('#memberName').text(fullName).css('font-weight', 'bold');
            $('#memberPosition').text(position);
            $('#memberCollege').text(college);
            $('#memberProgram').text(program);
            if (sex == 'Female') {
                $('#memberPicture').attr('src', "{{ asset('images/femaleStudent.png') }}");
            } else if (sex == 'Male') {
                $('#memberPicture').attr('src', "{{ asset('images/maleStudent.png') }}");
            } else {
                $('#memberPicture').attr('src', "{{ asset('images/cmu.png') }}");
            }
            $('#contactNo').text(contact);
            $('#sex').text(sex);

            // Show the activityInfoModal
            $('#memberInfoModal').modal('show');
        }

        function openAdviserInfoModal(id, fullName, sex, contactNo) {
            $('#adviserName').text(fullName);
            $('#adviserPosition').text('Adviser');
            $('#adviserContact').text(contactNo);
            if (sex == 'Female') {
                $('#adviserPicture').attr('src', "{{ asset('images/femaleStudent.png') }}");
            } else if (sex == 'Male') {
                $('#adviserPicture').attr('src', "{{ asset('images/maleStudent.png') }}");
            } else {
                $('#adviserPicture').attr('src', "{{ asset('images/cmu.png') }}");
            }

            $('#adviserInfoModal').modal('show');
        }

        function showLoadingIndicator() {
            $('#loadingIndicator').show();
        }

        // Function to hide loading indicator
        function hideLoadingIndicator() {

            setTimeout(function() {
                $('#loadingIndicator').hide();
            }, 500);
        }

        $(document).ready(function() {

            // Initial refresh

            refreshOfficersTable($('#semesterId').val());
            refreshAdvisersTable($('#semesterId').val());
            countMembers($('#semesterId').val());


            // Onchange event for semesterId select field
            $('#semesterId').change(function() {
                var semId = $(this).val();

                refreshOfficersTable(semId);
                refreshAdvisersTable(semId);
                countMembers(semId);
            });

            $('#advisersTable').DataTable({
                "paging": true,
                "pageLength": 5,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,
                // Include buttons option here
            }).buttons().container().appendTo('#advisersTable_wrapper .col-md-6:eq(0)');


            $('#officersTable').DataTable({
                "paging": true,
                "pageLength": 5,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,
                // Include buttons option here
            }).buttons().container().appendTo('#officersTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
