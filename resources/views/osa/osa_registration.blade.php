@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0">Pending Request for Defense</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="studentOrgListTable" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Organization Name</th>
                                <th>Acronym</th>
                                <th>Accreditation Number</th>
                                <th>Type Of Organization</th>
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

    <div class="modal fade" id="registrationInformation" tabindex="-1" role="dialog"
        aria-labelledby="registrationInformationLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-yellow">
                    <h4 class="modal-title">Register Organization</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ml-3 mr-3">
                    <div class="row">

                        <div class="col-md-4 text-center">
                            <img src="" alt="" id="imageView" class="img-circle img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="orgName">Organization Name</label>
                                        <input type="text" disabled class="form-control" id="orgName" name="orgName">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="acronym">Acronym</label>
                                        <input type="text" disabled class="form-control" id="acronym" name="acronym">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="orgType">Organization Type</label>
                                        <input type="text" disabled id="orgType" name="orgType" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="accredNo">Accreditation Number</label>
                                        <input type="text" id="accredNo" name="accredNo" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <input type="text" hidden id="image_path" name="image_path">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize the DataTable
            $('#studentOrgListTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "scrollCollapse": false,

                "pageLength": 8
            }).buttons().container().appendTo('#studentOrgListTable_wrapper .col-md-6:eq(0)');
            // Call the function to fetch and populate data in the table
            refreshParticularTable();


        });

        function refreshParticularTable() {
            $.ajax({
                url: "{{ route('osaPendingRegistration') }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var table = $('#studentOrgListTable').DataTable();
                    var existingRows = table.rows().remove().draw(false);

                    data.forEach(function(pendingOrgs, index) {
                        var type = '';
                        if (pendingOrgs.type_of_org_id == 1) {
                            type = 'University Wide'
                        } else if (pendingOrgs.type_of_org_id == 2) {
                            type = 'College Council'
                        } else if (pendingOrgs.type_of_org_id == 3) {
                            type = 'Class'
                        } else if (pendingOrgs.type_of_org_id == 4) {
                            type = 'Non-Class'
                        } else if (pendingOrgs.type_of_org_id == 5) {
                            type = 'Greek'
                        } else {
                            type = ''
                        }

                        var newRow = table.row.add([
                            pendingOrgs.organization_name,
                            pendingOrgs.acronym,
                            pendingOrgs.accreditation_no,
                            type,


                            `<button type="button" id="registerButton" class="btn btn-sm btn-success" data-id="${pendingOrgs.id}" onclick="openRegisterOrganizationModal(${pendingOrgs.id}, '${pendingOrgs.organization_name}', '${pendingOrgs.acronym}', '${pendingOrgs.accreditation_no}', '${pendingOrgs.type_of_org_id}', '${type}', '${pendingOrgs.image_path}')"><i class="fas fa-user"></i></button>`

                        ]).node();
                    });
                    table.draw();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function openRegisterOrganizationModal(id, organization_name, acronym, accreditation_no, type_of_org_id,
            type, image_path) {
            console.log(id);
            // Populate modal fields with passed values
            $('#orgName').val(organization_name);
            $('#acronym').val(acronym);
            $('#accredNo').val(accreditation_no);
            $('#orgType').val(accreditation_no);
            $('#image_path').val(image_path);
            // Set the src attribute of the img tag to display the image using the asset() function
            $('#imageView').attr('src', "{{ asset('storage/orgsPic/') }}/" + image_path);

            // Show the modal
            $('#registrationInformation').modal('show');
        }
    </script>
@endsection
