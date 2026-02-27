@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0">{{ __('Registration Documents') }}</h1>
                </div><!-- /.col -->

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

                        <div class="form-inline float-right">
                            <button type="button" id="submitRegistrationButton" onclick="showDocuSubmissionFormModal()" class="btn btn-success ">Attach</button>
                        </div>

                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="registrationDocumentsTable" class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th>Document Name</th>

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
                    <div class="div" id="documentPreview" hidden>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addRegistrationDocumentModal" tabindex="-1" role="dialog" aria-labelledby="addRegistrationDocumentModal" Label
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-yellow">
                    <h4 class="modal-title">Add New Registration Documents</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <!-- Step 1: Basic Information -->
                    <div class="container">
                        <form id="submitRegistrationDocumentForm" method="POST" action="{{ route('studentOrgSubmitRegistrationDocument') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="documentName">Document Name</label>
                                            <input type="text" class="form-control" id="documentName" name="documentName"
                                                placeholder="Enter Document Name" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fileUpload">Document File</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="fileUpload"
                                                        name="fileUpload" accept="application/pdf">

                                                    <label class="custom-file-label" for="fileUpload">Choose
                                                        PDF Document Only</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success next-page float-right" id="confirmationButton">Submit</button>
                                <button type="button" data-dismiss="modal"
                                    class="btn btn-default next-page mr-2 float-right">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModal(id)"
        Label aria-hidden="true">
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
                                        Confirm Submit?
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default btn-block btn-sm"
                                        data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-md-6">

                                    <button type="button" class="btn btn-success btn-block btn-sm"
                                        id="confirmSubmit">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function showDocuSubmissionFormModal() {
            $('#addRegistrationDocumentModal').modal('show');
            $('#confirmationButton').click(function(){
                $('#confirmationModal').modal('show');
                $('#confirmSubmit').click(function(){
                    $('#submitRegistrationDocumentForm').submit();
                });

            });
        }

        function showLoadingIndicator() {
            $('#loadingIndicator').show();
        }

        // Function to hide loading indicator
        function hideLoadingIndicator() {
            setTimeout(function() {
                $('#loadingIndicator').hide();
            }, 1000);
        }

        function refreshRegistrationDocumentsTable(semesterId) {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('studentOrgFetchRegistrationDocuments') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    semester_id: semesterId,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);
                    hideLoadingIndicator();
                    var table = $('#registrationDocumentsTable').DataTable();
                    $('#documentPreview').attr('hidden', 'hidden');
                    table.clear(); // Clear existing rows
                    data.forEach(function(registrationDocuments) {
                        table.row.add([
                            registrationDocuments.fileName,

                            '<button type="button" onclick="openDocumentInfoModal(' +
                            registrationDocuments.id + ", '" +
                            registrationDocuments.filePath +
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

        function openDocumentInfoModal(id, filePath) {
            showLoadingIndicator();
            var storagePath = 'storage/' + filePath;
            var assetPath = "{{ asset('') }}" + storagePath;
            var iframe = '<iframe src="' + assetPath + '" width="100%" height="100%"></iframe>';
            var body = `
            <div class="card">
                <div class="card-body">
                    <div style="width:100%; height:100vh;">
                        ${iframe}
                    </div>
                </div>
            </div>`;
            $('#documentPreview').html(body);
            $('#documentPreview').removeAttr('hidden');
            hideLoadingIndicator();
        }

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




            // Onchange event for semesterId select field
            $('#semesterId').change(function() {
                var semId = $(this).val();
                refreshRegistrationDocumentsTable(semId);
            });

            refreshRegistrationDocumentsTable($('#semesterId').val());

            $('#registrationDocumentsTable').DataTable({
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
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
