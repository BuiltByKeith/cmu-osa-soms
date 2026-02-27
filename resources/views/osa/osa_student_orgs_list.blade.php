@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0"><i class="fa-solid fa-users mr-2"></i>Student Organizations</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 mt-2">
                    <ol class="breadcrumb float-right">
                        <div class="form-inline">
                            <select name="orgCategoryFilter" id="orgCategoryFilter" class="form-control">
                                <option value="0" selected>Filter by Organization Type</option>
                                @foreach ($typeOfOrgs as $type)
                                    <option value="{{ $type->id }}">{{ $type->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-inline ml-2">
                            <button data-toggle="modal" type="button" data-toggle="modal" id="disableAllOrgButton"
                                class="btn btn-block btn-success ">Update Status</button>
                        </div>
                        <div class="modal fade" id="disableAllOrgModal" tabindex="-1" role="dialog"
                            aria-labelledby="disableAllOrgModal" Label aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="container-fluid">
                                                <div class="form-group d-flex align-items-center justify-content-center">
                                                    <h5>Update All Student Organization Status</h5>
                                                </div>
                                                <form action="{{ route('updateAllStudentOrgStatus') }}" method="POST"
                                                    enctype="multipart/form-data" id="updateAllStudentOrg">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-md-auto">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="status" id="disable"
                                                                                value="0">
                                                                            <label class="form-check-label">Disable</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-auto">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                style="background-color:green"
                                                                                type="radio" name="status" id="enable"
                                                                                value="1">
                                                                            <label class="form-check-label">Enable</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button type="button" class="btn btn-block btn-sm btn-success"
                                                                id="openConfirmationModal">Update</button>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <button type="button" class="btn btn-block btn-sm btn-default"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                            aria-labelledby="confirmationModal" Label aria-hidden="true">
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
                                                            Are you sure you want to update the status?
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- Added id for easier targeting -->
                                                        <button type="button" class="btn btn-default btn-block btn-sm"
                                                            id="cancelConfirmButton" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <button type="button" class="btn btn-success btn-block btn-sm"
                                                            id="confirmUpdate">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-inline ml-2">
                            <button data-toggle="modal" type="button" data-toggle="modal" id="addOrganizationButton"
                                class="btn btn-block btn-success ">Register</button>
                        </div>
                        @include('osa.osa_forms_modal.add_organization_form')
                    </ol>
                </div>
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
                                <th>Accredition Number</th>
                                <th>Type Of Org</th>
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

    <script type="text/javascript">
        function refreshStudentOrgsTable(filter) {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('osaFetchAllStudentOrgs') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    filterByType: filter,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);
                    hideLoadingIndicator();
                    var table = $('#studentOrgListTable').DataTable();
                    table.clear();

                    data.forEach(function(studentOrgs) {
                        let status;
                        if (studentOrgs.status == 'Disabled') {
                            status =
                                `<div class="text-center"><i class="fas fa-seal-exclamation" style="color: #ff0000;" title="Inactive"></i></div>`;
                        } else if (studentOrgs.status == 'Enabled') {
                            status =
                                `<div class="text-center"><i class="fas fa-badge-check" style="color: #02681e;" title="Active"></i></div>`;
                        } else {
                            status = `<div class="text-center"><p></p></div>`;
                        }

                        var detailsUrl = "{{ route('osaOrganizationProfile', ':hashid') }}".replace(
                            ':hashid', studentOrgs.hashid);

                        table.row.add([
                            studentOrgs.orgName,
                            studentOrgs.orgAcronym,
                            studentOrgs.accredNo,
                            studentOrgs.orgType,
                            status,

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

        $(document).ready(function() {
            // Initialize the DataTable
            $('#studentOrgListTable').DataTable({
                "paging": true,
                "pageLength": 8,
                "searching": true,
                "lengthChange": false,
                "ordering": true,
                "responsive": true,
                "autoWidth": false,
                "scrollCollapse": false,
                "scrollX": false,

            }).buttons().container().appendTo('#studentOrgListTable_wrapper .col-md-6:eq(0)');

            // Trigger to open the Add Organization Modal
            document.getElementById('addOrganizationButton').addEventListener('click', function() {
                $('#addOrganizationModal').modal('show');
            });

            // Trigger to open the Update Status Modal
            $('#disableAllOrgButton').click(function() {
                $('#disableAllOrgModal').modal('show');
            });

            // Open the confirmation modal when the "Update" button is clicked
            $('#openConfirmationModal').click(function() {
                $('#confirmationModal').modal('show');
            });

            // ENHANCED CONFIRM BUTTON WITH LOADING STATE
            // This handles the confirm button click with loading animation and button disabling
            $('#confirmUpdate').click(function() {
                // Get references to both buttons in the confirmation modal
                const confirmButton = $(this);                    // The "Confirm" button
                const cancelButton = $('#cancelConfirmButton');   // The "Cancel" button
                
                // Store the original button text so we can restore it later
                const originalText = confirmButton.text();
                
                // STEP 1: Add loading state to the confirm button
                // Replace button text with spinner icon and "Processing..." text
                confirmButton.html('<i class="fas fa-spinner fa-spin mr-2"></i>Processing...');
                
                // STEP 2: Disable both buttons to prevent multiple clicks
                confirmButton.prop('disabled', true);   // Disable confirm button
                cancelButton.prop('disabled', true);    // Disable cancel button
                
                // STEP 3: Add visual feedback to show buttons are disabled
                cancelButton.addClass('disabled');      // Add CSS class for visual feedback
                
                // STEP 4: Submit the form
                $('#updateAllStudentOrg').submit();
                
                // STEP 5: Failsafe timeout to reset buttons after 10 seconds
                // This prevents buttons from being permanently disabled if something goes wrong
                setTimeout(function() {
                    resetConfirmationButtons();
                }, 10000);
            });

            // Initial table load
            refreshStudentOrgsTable($('#orgCategoryFilter').val());

            // Handle organization filter change
            $('#orgCategoryFilter').change(function() {
                var type = $(this).val();
                console.log(type);
                refreshStudentOrgsTable(type);
            });

        });

        // HELPER FUNCTION: Reset confirmation modal buttons to original state
        // This function restores both buttons to their normal, enabled state
        function resetConfirmationButtons() {
            const confirmButton = $('#confirmUpdate');
            const cancelButton = $('#cancelConfirmButton');
            
            // Restore original text and enable confirm button
            confirmButton.html('Confirm');
            confirmButton.prop('disabled', false);
            
            // Enable cancel button and remove disabled styling
            cancelButton.prop('disabled', false);
            cancelButton.removeClass('disabled');
        }

        // FORM SUBMISSION HANDLERS
        // These handle what happens after the form is submitted
        $('#updateAllStudentOrg').on('submit', function() {
            // Don't show loading indicator here - only show button animation
            // Loading indicator will be shown after page refresh when table reloads
        });

        // If your Laravel application returns success/error responses via AJAX or redirects,
        // you can add these handlers to properly reset the button states:
        
        // Handle successful form submission (customize based on your Laravel response)
        $(document).ajaxSuccess(function(event, xhr, settings) {
            if (settings.url.includes('updateAllStudentOrgStatus')) {
                resetConfirmationButtons();
                // Don't hide loading indicator here - let the table refresh handle it
                // Optionally close the modal on success
                $('#confirmationModal').modal('hide');
                $('#disableAllOrgModal').modal('hide');
                
                // Refresh the table after successful update - this will show the loading indicator
                refreshStudentOrgsTable($('#orgCategoryFilter').val());
            }
        });

        // Handle form submission errors (customize based on your Laravel response)
        $(document).ajaxError(function(event, xhr, settings) {
            if (settings.url.includes('updateAllStudentOrgStatus')) {
                resetConfirmationButtons();
                // Don't hide loading indicator here - only reset buttons on error
            }
        });

        
    </script>

    <!-- Optional: Add this CSS for better disabled button styling -->
    <style>
        .btn.disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .fas.fa-spinner.fa-spin {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endsection