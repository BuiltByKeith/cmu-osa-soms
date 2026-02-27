@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mr-1 ml-1">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0"><i class="fa-solid fa-clipboard-list mr-2"></i>{{ __('Pending Documents') }}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="pendingDocumentsTable" class="table table-hover text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th>Organization Name</th>
                                <th>Activity Name</th>
                                <th>Document Name</th>
                                <th>Category</th>
                                <th>Date & Time</th>
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

    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize the DataTable
            $('#pendingDocumentsTable').DataTable({
                "paging": true,
                "pageLength": 5,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,
            }).buttons().container().appendTo('#pendingDocumentsTable_wrapper .col-md-6:eq(0)');
            // Call the function to fetch and populate data in the table
            refreshParticularTable();


        });

        function refreshParticularTable() {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('osaFetchPendingDocuments') }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    hideLoadingIndicator();
                    var table = $('#pendingDocumentsTable').DataTable();
                    table.clear();

                    data.forEach(function(pendings) {
                        var category = '';
                        if (pendings.documentCat == 1) {
                            category = 'Pre-Activity';
                        } else if (pendings.documentCat == 2) {
                            category = 'Post-Activity';
                        } else if (pendings.documentCat == 3) {
                            category = 'Term End Report'
                        } else {
                            category = '';
                        }

                        // Generate the route URL using Laravel's route helper
                        var detailsUrl = "{{ route('osaDocumentDetails', ':hashid') }}".replace(
                            ':hashid', pendings.hashid);

                        var newRow = table.row.add([
                            pendings.orgName,
                            pendings.actName,
                            pendings.documentName,
                            category,
                            pendings.dateUpdate,
                            '<a href="' + detailsUrl +
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

        
    </script>
@endsection
