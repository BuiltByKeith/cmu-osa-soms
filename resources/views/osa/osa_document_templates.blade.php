@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0"><i class="fa-solid fa-file mr-2"></i>Document Templates</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <div class="form-inline float-right">
                        <button type="button" id="addNewDocumentTemplate" class="btn btn-success ">Add Template</button>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="documentTemplates" class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th>Document Name</th>
                                        <th>Document Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="div" id="documentPreview" hidden>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addTemplateModal" tabindex="-1" role="dialog" aria-labelledby="addTemplateModal" Label
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-yellow">
                    <h4 class="modal-title">Add New Document Template</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <!-- Step 1: Basic Information -->
                    <div class="container">
                        <form id="addNewTemplate" method="POST" action="{{ route('osaAddNewDocumentTemplate') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="documentName">Document Name</label>
                                            <input type="text" class="form-control" id="documentName" name="documentName"
                                                placeholder="Enter Document Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="documentCategory">Document Category</label>
                                            <select class="form-control" id="documentCategory" name="documentCategory"
                                                required>
                                                <option value="" selected='selected'>Select Category</option>
                                                @foreach ($documentCategories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->description }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                <button type="submit" class="btn btn-success next-page float-right">Submit</button>
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
                                        Are you sure you want to delete this?
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
                                        id="confirmDelete"><span class="submit-text">
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





    <script type="text/javascript">
        function refreshDocumentTemplatesTable() {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('fetchdocumentTemplates') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);
                    hideLoadingIndicator();
                    var table = $('#documentTemplates').DataTable();
                    table.clear(); // Clear existing rows
                    data.forEach(function(templates) {
                        table.row.add([
                            templates.documentName,
                            templates.category,
                            '<button type="button" onclick="openDocumentInfoModal(' + templates
                            .id + ", '" + templates.filePath + "', '" + templates.documentName +
                            "')" +
                            '" class="btn btn-sm btn-success" title="More Info"><i class="fa-solid fa-user"></i></button>' +
                            ' ' +
                            '<button type="button" onclick="deleteDocumentTemplate(' +
                            templates.id + ")" +
                            '" class="btn btn-sm btn-danger" title="Delete"><i class="fa-solid fa-trash"></i></button>'
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

        function deleteDocumentTemplate(id) {
            var templateId = id;

            $('#confirmationModal').modal('show');
            // Assuming you want to delete the document template with the given ID and filePath
            $('#confirmDelete').off('click').on('click', function() {
                // Disable submit button and show loading state
                const submitButton = $('#confirmDelete');
                submitButton.prop('disabled', true);
                submitButton.find('.submit-text').text('Deleting...');
                submitButton.find('.spinner-border').removeClass('d-none');
                // Perform AJAX request to delete the document template
                $.ajax({
                    url: "{{ route('osaDeleteDocumentTemplate') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        template_id: templateId, // Pass the template ID
                    },
                    success: function(response) {
                        if (response.success) {
                            // Reload the document templates table or perform any other actions
                            $('#confirmationModal').modal('hide');
                            $('#documentPreview').prop('hidden', true);

                            toastr.success('Documet template deleted successfully.');
                            refreshDocumentTemplatesTable();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("An error occurred while deleting the document template.");
                    }
                });
            });
        }
        $(document).ready(function() {
            $('#addNewDocumentTemplate').click(function() {
                $('#addTemplateModal').modal('show');
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

            refreshDocumentTemplatesTable();

            $('#documentTemplates').DataTable({
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
        function showLoadingIndicator() {
            $('#loadingIndicator').show();
        }

        // Function to hide loading indicator
        function hideLoadingIndicator() {
            setTimeout(function() {
                $('#loadingIndicator').hide();
            }, 1000);
        }

        function openDocumentInfoModal(id, filePath, documentName) {
            showLoadingIndicator();
            var storagePath = 'storage/' + filePath;
            var assetPath = "{{ asset('') }}" + storagePath;
            var iframe = '<iframe id="pdfViewer" src="' + assetPath + '" width="100%" height="100%"></iframe>';
            var body = `
                <div class="card">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="float-left">${documentName}</h4>
                            </div>
                            <div class="col-md-6">
                                <button id="fullscreenButton" class="btn btn-sm btn-success float-right"><i class="fas fa-expand"></i></button>
                            </div>
                        </div>
                        <div style="width:100%; height:100vh;">
                            ${iframe}
                        </div>
                    </div>
                </div>`;

            $('#documentPreview').html(body);
            $('#documentPreview').removeAttr('hidden');
            hideLoadingIndicator();
            // Get the PDF viewer iframe
            var pdfViewer = document.getElementById('pdfViewer');

            // Get the fullscreen button
            var fullscreenButton = document.getElementById('fullscreenButton');

            // Function to toggle fullscreen
            function toggleFullscreen() {
                if (!document.fullscreenElement) {
                    pdfViewer.requestFullscreen();
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    }
                }
            }

            // Add click event listener to fullscreen button
            fullscreenButton.addEventListener('click', toggleFullscreen);
        }
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
