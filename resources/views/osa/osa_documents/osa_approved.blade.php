@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mr-1 ml-1">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0"><i class="fa-solid fa-square-check mr-2"></i>{{ __('Approved Documents') }}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="approvedDocumentsTable" class="table table-hover text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th>Organization Name</th>
                                <th>Activity Name</th>
                                <th>Document Name</th>
                                <th>Category</th>
                                <th>Date|Time</th>
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
            $('#approvedDocumentsTable').DataTable({
                "paging": true,
                "pageLength": 5,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,
            }).buttons().container().appendTo('#approvedDocumentsTable_wrapper .col-md-6:eq(0)');
            // Call the function to fetch and populate data in the table
            refreshApprovedDocumentsTable();


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

        function refreshApprovedDocumentsTable() {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('osaFetchApprovedDocuments') }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    hideLoadingIndicator()
                    var table = $('#approvedDocumentsTable').DataTable();
                    table.clear();

                    data.forEach(function(approved) {
                        var category = '';
                        if (approved.documentCat == 1) {
                            category = 'Pre-Activity';
                        } else if (approved.documentCat == 2) {
                            category = 'Post-Activity';
                        } else if (approved.documentCat == 3) {
                            category = 'Term End Report'
                        } else {
                            category = '';
                        }

                        // Generate the route URL using Laravel's route helper
                        var detailsUrl = "{{ route('osaDocumentDetails', ':hashid') }}".replace(
                            ':hashid', approved.hashid);

                        table.row.add([
                            approved.orgName,
                            approved.actName,
                            approved.documentName,
                            category,
                            approved.dateUpdate,
                            '<a href="' + detailsUrl +
                            '"><button type="button" class="btn btn-sm btn-success"><i class="fas fa-list"></i></button></a>',

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
