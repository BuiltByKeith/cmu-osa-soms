@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <h1 class="m-0"><i class="fa-solid fa-bullhorn mr-2"></i>Announcements</h1>
                </div>
                <div class="col-sm-6 mt-2">
                    <div class="form-inline float-right">
                        <button type="button" id="addNewAnnouncement" class="btn btn-success">
                            <i class="fas fa-plus mr-2"></i>Add Announcement
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="loadingIndicator" class="text-center" style="display: none;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="announcementsTable" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 25%">Title</th>
                                            <th style="width: 45%">Content</th>
                                            <th style="width: 12%">Date Posted</th>
                                            <th style="width: 8%">Status</th>
                                            <th style="width: 10%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <style>
                                #announcementsTable {
                                    width: 100%;
                                    table-layout: fixed;
                                }

                                #announcementsTable td {
                                    white-space: normal;
                                    word-wrap: break-word;
                                    vertical-align: middle;
                                }

                                #announcementsTable th {
                                    vertical-align: middle;
                                }

                                .action-buttons {
                                    white-space: nowrap;
                                }

                                /* Modal loading spinner styles */
                                #modalLoadingSpinner {
                                    min-height: 200px;
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: center;
                                    align-items: center;
                                }

                                #modalLoadingSpinner .spinner-border {
                                    width: 3rem;
                                    height: 3rem;
                                }

                                #modalLoadingSpinner p {
                                    color: #666;
                                    margin-top: 1rem;
                                }

                                @media screen and (max-width: 768px) {

                                    #announcementsTable thead th:nth-child(3),
                                    #announcementsTable tbody td:nth-child(3) {
                                        display: none;
                                    }

                                    #announcementsTable th:first-child,
                                    #announcementsTable td:first-child {
                                        width: 35% !important;
                                    }

                                    #announcementsTable th:nth-child(2),
                                    #announcementsTable td:nth-child(2) {
                                        width: 40% !important;
                                    }
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Announcement Modal -->
    <div class="modal fade" id="addAnnouncementModal" tabindex="-1" role="dialog"
        aria-labelledby="addAnnouncementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Add New Announcement</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="announcementForm" method="POST" action="{{ route('osaAddNewAnnouncement') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter announcement title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" id="content" name="content" rows="4" placeholder="Enter announcement content"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_posted">Date Posted</label>
                                    <input type="date" class="form-control" id="date_posted" name="date_posted"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="submitAnnouncement">
                                <span class="submit-text"><i class="fas fa-save mr-1"></i>Save Announcement</span>
                                <span class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Announcement Modal -->
    <div class="modal fade" id="editAnnouncementModal" tabindex="-1" role="dialog"
        aria-labelledby="editAnnouncementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Edit Announcement</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="editAnnouncementForm" method="POST">
                        @csrf
                        <input type="hidden" id="edit_announcement_id" name="announcement_id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="edit_title">Title</label>
                                    <input type="text" class="form-control" id="edit_title" name="title"
                                        placeholder="Enter announcement title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="edit_content">Content</label>
                                    <textarea class="form-control" id="edit_content" name="content" rows="4"
                                        placeholder="Enter announcement content" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_date_posted">Date Posted</label>
                                    <input type="date" class="form-control" id="edit_date_posted" name="date_posted"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_status">Status</label>
                                    <select class="form-control" id="edit_status" name="status" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="updateAnnouncement">
                                <span class="submit-text"><i class="fas fa-save mr-1"></i>Update Announcement</span>
                                <span class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white">Confirm Delete</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-exclamation-triangle text-warning display-3"></i>
                    <h4 class="mt-2">Are you sure?</h4>
                    <p class="mb-0">Do you really want to delete this announcement? This process cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">
                        <span class="submit-text"><i class="fas fa-trash mr-1"></i>Delete</span>
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        // Loading indicator functions
        function showLoadingIndicator() {
            $('#loadingIndicator').show();
        }

        function hideLoadingIndicator() {
            $('#loadingIndicator').hide();
        }

        // Table refresh function
        function refreshAnnouncementsTable() {
            showLoadingIndicator();
            $.ajax({
                url: "{{ route('osaFetchAnnouncements') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    const table = $('#announcementsTable').DataTable();
                    table.clear();

                    data.forEach(function(announcement) {
                        const statusBadge = `<span class="badge badge-${announcement.status === 'active' ? 'success' : 'secondary'}">
                            ${announcement.status === 'active' ? 'Active' : 'Inactive'}
                        </span>`;

                        const actionButtons = `
                            <div class="action-buttons text-center">
                                <button type="button" class="btn btn-sm btn-primary mr-1" onclick="editAnnouncement(${announcement.id})" 
                                    title="Edit Announcement">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteAnnouncement(${announcement.id})" 
                                    title="Delete Announcement">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>`;

                        table.row.add([
                            announcement.title,
                            announcement.content,
                            announcement.date_posted,
                            statusBadge,
                            actionButtons
                        ]);
                    });

                    table.draw();
                    hideLoadingIndicator();
                },
                error: function(xhr) {
                    console.error('Error fetching announcements:', xhr.responseText);
                    toastr.error('Failed to load announcements. Please try again.');
                    hideLoadingIndicator();
                }
            });
        }

        // Delete announcement function
        function deleteAnnouncement(id) {
            $('#deleteConfirmationModal').modal('show');

            $('#confirmDelete').off('click').on('click', function() {
                const button = $(this);
                button.prop('disabled', true)
                    .find('.submit-text').addClass('d-none')
                    .end()
                    .find('.spinner-border').removeClass('d-none');

                $.ajax({
                    url: "{{ route('osaDeleteAnnouncement') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        announcement_id: id
                    },
                    success: function(response) {
                        $('#deleteConfirmationModal').modal('hide');
                        if (response.success) {
                            toastr.success('Announcement deleted successfully');
                            refreshAnnouncementsTable();
                        } else {
                            toastr.error(response.message || 'Failed to delete announcement');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error deleting announcement:', xhr.responseText);
                        toastr.error('Failed to delete announcement. Please try again.');
                    },
                    complete: function() {
                        button.prop('disabled', false)
                            .find('.submit-text').removeClass('d-none')
                            .end()
                            .find('.spinner-border').addClass('d-none');
                    }
                });
            });
        }

        // Edit announcement function
        function editAnnouncement(id) {
            // Show modal immediately with loading state
            const modal = $('#editAnnouncementModal');
            const form = modal.find('form');
            const submitBtn = form.find('#updateAnnouncement');

            // Clear form and show loading state
            form[0].reset();
            form.find('input, textarea, select').prop('disabled', true);
            submitBtn.prop('disabled', true);

            // Add loading spinner to modal body
            const loadingSpinner = `
                <div class="text-center my-4" id="modalLoadingSpinner">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p class="mt-2">Loading announcement details...</p>
                </div>`;

            form.hide();
            form.after(loadingSpinner);
            modal.modal('show');

            // Fetch announcement data
            $.ajax({
                url: "{{ route('osaFetchAnnouncement') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}",
                    announcement_id: id
                },
                success: function(response) {
                    if (response.success) {
                        const announcement = response.announcement;
                        $('#edit_announcement_id').val(announcement.id);
                        $('#edit_title').val(announcement.title);
                        $('#edit_content').val(announcement.content);
                        $('#edit_date_posted').val(announcement.date_posted);
                        $('#edit_status').val(announcement.status);

                        // Remove loading state
                        $('#modalLoadingSpinner').remove();
                        form.show();
                        form.find('input, textarea, select').prop('disabled', false);
                        submitBtn.prop('disabled', false);
                    } else {
                        modal.modal('hide');
                        toastr.error('Failed to fetch announcement details');
                    }
                },
                error: function(xhr) {
                    modal.modal('hide');
                    console.error('Error fetching announcement:', xhr.responseText);
                    toastr.error('Failed to fetch announcement details');
                }
            });
        }

        // Document ready handler
        $(document).ready(function() {
            // Initialize DataTable
            $('#announcementsTable').DataTable({
                pageLength: 10,
                ordering: true,
                responsive: true,
                autoWidth: false,
                language: {
                    search: "Search announcements:",
                    emptyTable: "No announcements available"
                },
                columnDefs: [{
                        targets: [0, 1],
                        render: function(data, type, row) {
                            if (type === 'display' && data.length > 100) {
                                return data.substr(0, 100) + '...';
                            }
                            return data;
                        }
                    },
                    {
                        targets: -1,
                        orderable: false
                    }
                ],
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                drawCallback: function() {
                    // Reinitialize tooltips after table redraw
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });

            // Initialize form handlers
            $('#announcementForm').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                const submitBtn = form.find('#submitAnnouncement');

                submitBtn.prop('disabled', true)
                    .find('.submit-text').addClass('d-none')
                    .end()
                    .find('.spinner-border').removeClass('d-none');

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#addAnnouncementModal').modal('hide');
                            form[0].reset();
                            toastr.success('Announcement added successfully');
                            refreshAnnouncementsTable();
                        } else {
                            toastr.error(response.message || 'Failed to add announcement');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error adding announcement:', xhr.responseText);
                        toastr.error('Failed to add announcement. Please try again.');
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false)
                            .find('.submit-text').removeClass('d-none')
                            .end()
                            .find('.spinner-border').addClass('d-none');
                    }
                });
            });

            // Edit announcement form handler
            $('#editAnnouncementForm').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                const submitBtn = form.find('#updateAnnouncement');

                submitBtn.prop('disabled', true)
                    .find('.submit-text').addClass('d-none')
                    .end()
                    .find('.spinner-border').removeClass('d-none');

                $.ajax({
                    url: "{{ route('osaUpdateAnnouncement') }}",
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#editAnnouncementModal').modal('hide');
                            toastr.success('Announcement updated successfully');
                            refreshAnnouncementsTable();
                        } else {
                            toastr.error(response.message || 'Failed to update announcement');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error updating announcement:', xhr.responseText);
                        toastr.error('Failed to update announcement. Please try again.');
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false)
                            .find('.submit-text').removeClass('d-none')
                            .end()
                            .find('.spinner-border').addClass('d-none');
                    }
                });
            });

            // Add announcement button handler
            $('#addNewAnnouncement').click(function() {
                $('#addAnnouncementModal').modal('show');
            });

            // Initial table load
            refreshAnnouncementsTable();
        });
    </script>
@endsection
