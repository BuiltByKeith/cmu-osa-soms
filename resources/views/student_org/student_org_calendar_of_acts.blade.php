@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-6 mt-3">
                    <h1 class="m-0">Activities</h1>
                </div>

                <div class="col-sm-6 mt-3">
                    <ol class="breadcrumb float-sm-right">
                        <div class="input-group-prepend">
                            <select class="custom-select mr-2" id="semesterId" name="semesterId">
                                <option value="{{ $currentSemester->id }}" selected>{{ $currentSemester->description }}
                                    {{ $currentSemester->acadYear->description }}</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->description }}
                                        {{ $semester->acadYear->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </ol>
                </div>

            </div><!-- /.row -->
            <div class="alert alert-warning alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                Please comply all your post-activity submissions on or before the set deadline.
            </div>

            @if ($studentOrgStatus->registration_status == 0)
                <div class="alert alert-danger">

                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                    Your account is currently disabled since your organization is unregistered. Please proceed to the Office
                    of Student Affairs and Services and settle your accountabilities. Thank you!
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>

    <hr>
    <br>


    <div class="">

        <div class="container-fluid">

            <div class="col-12 ">
                <h3 class="text-center">Calendar of Activities</h3>
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                @if ($studentOrgStatus->registration_status == 0)
                                    <button data-toggle="modal" data-target="#addNewActivityModal" type="button"
                                        class="btn btn-block btn-success" disabled>Add New Activity</button>
                                @else
                                    <button data-toggle="modal" data-target="#addNewActivityModal" type="button"
                                        class="btn btn-block btn-success">Add New Activity</button>
                                @endif
                                @include('student_org.student_org_modals.add_new_activity_modal')
                            </div>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-hover table-bordered" id="calendarTable">
                            <thead>
                                <tr>
                                    <th>Name of Activity</th>
                                    <th>Date-Time Start | Date-Time End</th>
                                    <th>Venue</th>
                                    <th>Status</th>
                                    <th>Document Submission Deadline</th>
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

    <div class="container-fluid">
        <div class="col-12 ">
            <h3 class="text-center">Unincluded Activities</h3>
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            @if ($studentOrgStatus->registration_status == 0)
                                <button data-toggle="modal" data-target="#addNewUnincludedActivityModal" type="button"
                                    class="btn btn-block btn-success" disabled>Add New Activity</button>
                            @else
                                <button data-toggle="modal" data-target="#addNewUnincludedActivityModal" type="button"
                                    class="btn btn-block btn-success">Add New Activity</button>
                            @endif

                            @include('student_org.student_org_modals.add_new_unincluded_activity_modal')
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered" id="unincludedTable">
                        <thead>
                            <tr>
                                <th>Name of Activity</th>
                                <th>Date-Time Start | Date-Time End</th>
                                <th>Venue</th>
                                <th>Status</th>
                                <th>Document Submission Deadline</th>
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

    <br>
    <hr>
    <br>

    <div class="container-fluid">
        <div class="col-12 ">
            <h3 class="text-center">Operational Expenses</h3>
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            @if ($studentOrgStatus->registration_status == 0)
                                <button data-toggle="modal" data-target="#addNewOperationalExpensesModal" type="button"
                                    class="btn btn-block btn-success" disabled>Add New Activity</button>
                            @else
                                <button data-toggle="modal" data-target="#addNewOperationalExpensesModal" type="button"
                                    class="btn btn-block btn-success">Add New Activity</button>
                            @endif

                            @include('student_org.student_org_modals.add_new_operational_expenses_modal')
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered" id="operationalTable">
                        <thead>
                            <tr>
                                <th>Name of Activity</th>
                                <th>Date-Time Start | Date-Time End</th>
                                <th>Venue</th>
                                <th>Status</th>
                                <th>Document Submission Deadline</th>
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

    <div class="modal fade" id="activityInfoModal" tabindex="-1" role="dialog" aria-labelledby="activityInfoModal" Label
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
                                <p>Status: <span id="actStatus"></span></p>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            function showLoadingIndicator() {
                $('#loadingIndicator').show();
            }

            // Function to hide loading indicator
            function hideLoadingIndicator() {
                $('#loadingIndicator').hide();
            }
            // Function to refresh calendar table
            function refreshCalendarTable(semId) {
                showLoadingIndicator();
                $.ajax({
                    url: "{{ route('fetchStudentOrgCalendarOfActs') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        semester_id: semId,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        console.log(data);
                        hideLoadingIndicator();
                        var table = $('#calendarTable').DataTable();
                        table.clear(); // Clear existing rows
                        data.forEach(function(calendars) {
                            table.row.add([
                                calendars.activityName,
                                calendars.dateStartEnd,
                                calendars.venue,
                                calendars.status,
                                calendars.deadline,
                                '<button type="button" onclick="openActivityInfoModal(' +
                                calendars.id + ", '" +
                                calendars.activityName + "', '" +
                                calendars.dateStartEnd + "', '" +
                                calendars.venue + "', '" +
                                calendars.status + "', '" +
                                calendars.budget + "', '" +
                                calendars.typeOfAct + "', '" +
                                calendars.reachOfAct +
                                "')" +
                                '" class="btn btn-sm btn-success info-btn" title="More Info"><i class="fas fa-list"></i><span class="spinner-border spinner-border-sm d-none" role="status"></span></button>' +
                                '<a href="/osa/student-org-document-submission-page/' +
                                calendars.id +
                                '" class="doc-submit-btn"><button type="button" class="btn btn-sm btn-success ml-1" title="Document Submission"><i class="fas fa-file"></i><span class="spinner-border spinner-border-sm d-none ml-1" role="status"></span></button></a>',
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

            function refreshUnincludedTable(semId) {
                showLoadingIndicator();
                $.ajax({
                    url: "{{ route('fetchStudentOrgUnincludedActs') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        semester_id: semId,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        hideLoadingIndicator();
                        var table = $('#unincludedTable').DataTable();
                        table.clear(); // Clear existing rows
                        data.forEach(function(unincluded) {
                            table.row.add([
                                unincluded.activityName,
                                unincluded.dateStartEnd,
                                unincluded.venue,
                                unincluded.status,
                                unincluded.deadline,
                                '<button type="button" onclick="openActivityInfoModal(' +
                                unincluded.id + ", '" +
                                unincluded.activityName + "', '" +
                                unincluded.dateStartEnd + "', '" +
                                unincluded.venue + "', '" +
                                unincluded.status + "', '" +
                                unincluded.budget + "', '" +
                                unincluded.typeOfAct + "', '" +
                                unincluded.reachOfAct +
                                "')" +
                                '" class="btn btn-sm btn-success info-btn" title="More Info"><i class="fas fa-list"></i><span class="spinner-border spinner-border-sm d-none" role="status"></span></button>' +
                                '<a href="/osa/student-org-document-submission-page/' +
                                unincluded.id +
                                '" class="doc-submit-btn"><button type="button" class="btn btn-sm btn-success ml-1" title="Document Submission"><i class="fas fa-file"></i><span class="spinner-border spinner-border-sm d-none ml-1" role="status"></span></button></a>',
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

            function refreshExpensesTable(semId) {
                showLoadingIndicator();
                $.ajax({
                    url: "{{ route('fetchStudentOrgOperationalExpenses') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        semester_id: semId,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        hideLoadingIndicator();
                        var table = $('#operationalTable').DataTable();
                        table.clear(); // Clear existing rows
                        data.forEach(function(expenses) {
                            table.row.add([
                                expenses.activityName,
                                expenses.dateStartEnd,
                                expenses.venue,
                                expenses.status,
                                expenses.deadline,
                                '<button type="button" onclick="openActivityInfoModal(' +
                                expenses.id + ", '" +
                                expenses.activityName + "', '" +
                                expenses.dateStartEnd + "', '" +
                                expenses.venue + "', '" +
                                expenses.status + "', '" +
                                expenses.budget + "', '" +
                                expenses.typeOfAct + "', '" +
                                expenses.reachOfAct +
                                "')" +
                                '" class="btn btn-sm btn-success info-btn" title="More Info"><i class="fas fa-list"></i><span class="spinner-border spinner-border-sm d-none" role="status"></span></button>' +
                                '<a href="/osa/student-org-document-submission-page/' +
                                expenses.id +
                                '" class="doc-submit-btn"><button type="button" class="btn btn-sm btn-success ml-1" title="Document Submission"><i class="fas fa-file"></i><span class="spinner-border spinner-border-sm d-none ml-1" role="status"></span></button></a>',
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

            // Initial refresh
            refreshCalendarTable($('#semesterId').val());
            refreshUnincludedTable($('#semesterId').val());
            refreshExpensesTable($('#semesterId').val());

            // Onchange event for semesterId select field
            $('#semesterId').change(function() {
                var semId = $(this).val();
                refreshCalendarTable(semId);
                refreshUnincludedTable(semId);
                refreshExpensesTable(semId);
            });


            // DataTable initialization
            $('#calendarTable').DataTable({
                buttons: ['excel', 'pdf', 'print', 'colvis'], // Include buttons option here
                "paging": true,
                "pageLength": 5,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,
            }).buttons().container().appendTo('#calendarTable_wrapper .col-md-6:eq(0)');
            $('#unincludedTable').DataTable({
                buttons: ['excel', 'pdf', 'print', 'colvis'], // Include buttons option here
                "paging": true,
                "pageLength": 5,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,

            }).buttons().container().appendTo('#unincludedTable_wrapper .col-md-6:eq(0)');
            $('#operationalTable').DataTable({
                buttons: ['excel', 'pdf', 'print', 'colvis'], // Include buttons option here
                "paging": true,
                "pageLength": 5,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,

            }).buttons().container().appendTo('#operationalTable_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script type="text/javascript">
        function showButtonLoading(button) {
            const icon = button.find('i');
            const spinner = button.find('.spinner-border');
            icon.addClass('d-none');
            spinner.removeClass('d-none');
            button.prop('disabled', true);
        }

        function hideButtonLoading(button) {
            const icon = button.find('i');
            const spinner = button.find('.spinner-border');
            spinner.addClass('d-none');
            icon.removeClass('d-none');
            button.prop('disabled', false);
        }

        function openActivityInfoModal(activityId, activityName, dateStartEnd, venue, status, budget, typeOfActivity,
            reachOfActivity) {
            const button = $(event.currentTarget);
            showButtonLoading(button);
            
            // Assuming you have the activity ID, you can use it to fetch additional information if needed
            $('#title').text(activityName);
            $('#actVenue').text(venue);
            $('#dateTime').text(dateStartEnd);
            $('#typeOfActivity').text(typeOfActivity);
            $('#reachOfActivity').text(reachOfActivity);
            $('#budget').text(budget);

            $('#title, #typeOfActivity, #reachOfActivity, #budget, #actStatus').css('font-weight', 'bold');

            if (status === 'Pending') {
                $('#actStatus').text(status).css('color', '#ffc600');
            } else if (status === 'In Progress') {
                $('#actStatus').text(status).css('color', 'orange');
            } else if (status === 'Completed') {
                $('#actStatus').text(status).css('color', '#02681e');
            } else if (status === 'Closed') {
                $('#actStatus').text(status).css('color', 'red');
            } else {
                $('#actStatus').text(status).css('color', 'black');
            }

            // Show the activityInfoModal
            $('#activityInfoModal').modal('show');
            
            // Hide loading after modal is shown
            $('#activityInfoModal').on('shown.bs.modal', function () {
                hideButtonLoading(button);
            });
        }

        // Add loading state to document submission links
        $(document).ready(function() {
            $('.doc-submit-btn').on('click', function(e) {
                const button = $(this).find('button');
                showButtonLoading(button);
            });
        });
    </script>
@endsection
