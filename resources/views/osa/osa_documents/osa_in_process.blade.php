@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mr-1 ml-1">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0"><i class="fa-solid fa-spinner mr-2"></i>{{ __('In Process Documents') }}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="inProcessDocumentsTable" class="table table-hover text-nowrap table-bordered">
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
            $('#inProcessDocumentsTable').DataTable({
                "paging": true,
                "pageLength": 8,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,

            }).buttons().container().appendTo('#inProcessDocumentsTable_wrapper .col-md-6:eq(0)');
            // Call the function to fetch and populate data in the table
            refreshParticularTable();


        });

        function refreshParticularTable() {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('osaFetchInProcessDocuments') }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    hideLoadingIndicator();
                    console.log(data);
                    var table = $('#inProcessDocumentsTable').DataTable();
                    table.clear();

                    data.forEach(function(inProcess) {
                        var category = '';
                        if (inProcess.documentCat == 1) {
                            category = 'Pre-Activity';
                        } else if (inProcess.documentCat == 2) {
                            category = 'Post-Activity';
                        } else if (inProcess.documentCat == 3) {
                            category = 'Term End Report'
                        } else {
                            category = '';
                        }

                        var detailsUrl = "{{ route('osaDocumentDetails', ':hashid') }}".replace(
                            ':hashid', inProcess.hashid);

                        var newRow = table.row.add([
                            inProcess.orgName,
                            inProcess.actName,
                            inProcess.documentName,
                            category,
                            inProcess.dateUpdate,

                            '<a href="' + detailsUrl +
                            '"><button type="button" class="btn btn-sm btn-success"><i class="fas fa-list"></i></button></a>',

                        ]).node();
                        if (inProcess.isSeen == 0) {
                            $(newRow).css('background', 'rgba(255, 198, 0, .3)');
                        } else {

                        }
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
