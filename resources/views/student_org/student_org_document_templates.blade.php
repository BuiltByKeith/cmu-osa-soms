@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0"><i class="fa-solid fa-file mr-2"></i>Document Templates</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="div" id="documentPreview" hidden>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function refreshDocumentTemplatesTable() {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('studentOrgFetchDocumentTemplates') }}",
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
                            '<button type="button" onclick="openDocumentInfoModal(' +
                            templates.id + ", '" +
                            templates.filePath +
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
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
