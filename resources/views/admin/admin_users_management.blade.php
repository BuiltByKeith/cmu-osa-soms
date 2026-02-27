@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0"><i class="nav-icon fas fa-users mr-3"></i> {{ __('User Management') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm">

                            <button data-toggle="modal" data-target="#addNewActivityModal" type="button"
                                class="btn btn-block btn-success ml-2 mr-2" disabled>Add New User</button>


                        </div>
                    </div>
                </div>


                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered" id="userTable">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            function showLoadingIndicator() {
                $('#loadingIndicator').show();
            }

            // Function to hide loading indicator
            function hideLoadingIndicator() {
                setTimeout(function() {
                    $('#loadingIndicator').hide();
                }, 1000);
            }


            function refreshUsersTable() {
                showLoadingIndicator();
                $.ajax({
                    url: "{{ route('adminFetchUsers') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        console.log(data);
                        hideLoadingIndicator();
                        var table = $('#userTable').DataTable();
                        table.clear(); // Clear existing rows
                        data.forEach(function(users) {
                            table.row.add([
                                users.name,
                                users.email,
                                users.role['role_name'],
                                `<button class="btn btn-success btn-sm">View</button>`,
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

            refreshUsersTable();
        });


        $('#userTable').DataTable({
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
    </script>
@endsection
