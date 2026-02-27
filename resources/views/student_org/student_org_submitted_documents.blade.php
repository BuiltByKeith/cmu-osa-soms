@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid ">
            <div class="row mb-2">
                <div class="col-md-12 mt-2">
                    <h1 class="m-0">Submitted Documents</h1>
                </div>
                <input type="text" hidden id="orgId" name="orgId" value="{{ $organizationId }}">
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <strong>Documents List</strong>
                    </div>

                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover text-nowrap table-bordered" id="submittedDocumentsTable">
                        <thead>
                            <tr>
                                <th>Document Name</th>
                                <th>Activity Name</th>
                                <th>Category</th>
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
        <div class="modal fade" id="showDocumentFileModal" tabindex="-1" role="dialog"
            aria-labelledby="showDocumentFileModal" Label aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <div class="modal-body">
                        <div class="container">
                            <div class="container-fluid">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function showLoadingIndicator() {
                $('#loadingIndicator').show();
            }

            // Function to hide loading indicator
            function hideLoadingIndicator() {
                setTimeout(function() {
                    $('#loadingIndicator').hide();
                }, 1000);
            }

            function refreshSubmittedDocumentsTable(id) {
                orgId = id;

                showLoadingIndicator();
                $.ajax({
                    url: "{{ route('fetchStudentOrgSubmittedDocuments') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        organization_id: orgId,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        console.log(data);
                        hideLoadingIndicator();
                        var table = $('#submittedDocumentsTable').DataTable();
                        table.clear(); // Clear existing rows
                        data.forEach(function(documents) {
                            table.row.add([
                                documents.documentName,
                                documents.activityName,
                                documents.category,
                                documents.status,
                                '<a href="/student-org-document-submission-page/' + documents.id + '"><button type="button" class="btn btn-sm btn-success" title="More Info"><i class="fa-solid fa-file"></i></button></a>'
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
            $(document).ready(function() {
                var orgId = $('#orgId').val();

                refreshSubmittedDocumentsTable(orgId);

                $('#submittedDocumentsTable').DataTable({
                    "paging": true,
                    "pageLength": 5,
                    "searching": true,
                    "lengthChange": false,
                    "ordering": true,
                    "responsive": true,
                    "autoWidth": false,
                    "scrollCollapse": false,
                    "scrollX": false,
                });


            });
        </script>
    </div>
@endsection
