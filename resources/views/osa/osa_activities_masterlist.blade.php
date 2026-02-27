@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0"><i class="fa-solid fa-home mr-2"></i>Activities Masterlist</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-sm-right">

                        <div class="input-group-prepend">
                            <select class="custom-select mr-2" id="semesterId" name="semesterId">
                                <option value="{{ $currentSemester->id }}" selected>{{ $currentSemester->description }}  {{ $currentSemester->acadYear->description }}
                                </option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->description }} {{ $semester->acadYear->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="activitiesTable" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Activity</th>
                                        <th>Organization Name</th>

                                        <th>Date</th>
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
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize the DataTable
            $('#activitiesTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "scrollCollapse": false,
                "pageLength": 8,
                buttons: ['copy', 'print', 'pdf', 'colvis'],
            }).buttons().container().appendTo('#studentOrgListTable_wrapper .col-md-6:eq(0)');

            var semId = $('#semesterId').val();

            // Call the function to fetch and populate data in the table
            refreshActivitiesTable(semId);

            $('#semesterId').change(function() {
                var semId = $(this).val();
                refreshActivitiesTable(semId);
            });


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

        function refreshActivitiesTable(semId) {
            showLoadingIndicator()
            console.log(semId);
            $.ajax({
                url: "{{ route('osaFetchActivities') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    semester_id: semId,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    hideLoadingIndicator();
                    var table = $('#activitiesTable').DataTable();
                    table.clear(); // Clear existing rows
                    data.forEach(function(activities) {
                        table.row.add([

                            activities.activityName,
                            activities.orgName,
                            activities.dateStartEnd,
                            activities.status,
                            `<a href="/osa-organization-profile/` + activities.orgId +
                            `"><button title="View Organization Profile" class="btn btn-sm btn-success"><i class="fas fa-user"></i></button></a>`
                        ]);
                    });

                    table.draw();
                },
                error: function(xhr, status, error) {
                    hideLoadingIndicator();
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
