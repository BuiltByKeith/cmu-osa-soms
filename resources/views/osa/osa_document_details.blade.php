@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid ml-3 mr-3">
            <div class="row mt-3">
                <div class="col-sm-8">
                    <h1 class="m-0">{{ $actAttachment->document_name }} of
                        {{ $actAttachment->activity->studentOrg->acronym }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nameOfAct">Activity Name</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $actAttachment->activity->activity_name }}">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="nameOfAct">Document Type</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $actAttachment->document_name }}">
                                    </div>
                                </div>
                                <input type="text" id="actAttachmentId" name="actAttachmentId"
                                    value="{{ $actAttachment->id }}" hidden>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nameOfAct">Category</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $actAttachment->category->description }}">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nameOfAct">Status</label>
                                        <div class="input-group">
                                            @if ($actAttachment->status == 0)
                                                <input type="text" name="comment" disabled value="Pending" id="status"
                                                    class="form-control" style="color: #ffc600">
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-warning btn-sm"
                                                        data-toggle="modal" data-target="#updateStatusModal">Update</button>
                                                </span>
                                            @elseif ($actAttachment->status == 1)
                                                <input type="text" name="comment" disabled value="In Process"
                                                    id="status" class="form-control" style="color: orange">
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-warning btn-sm"
                                                        data-toggle="modal" data-target="#updateStatusModal">Update</button>
                                                </span>
                                            @elseif ($actAttachment->status == 2)
                                                <input type="text" name="comment" disabled value="Approved"
                                                    id="status" class="form-control" style="color: #02681e">
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-success btn-sm"
                                                        data-toggle="modal" data-target="#updateStatusModal">Update</button>
                                                </span>
                                            @else
                                                <input type="text" name="comment" id="comment" class="form-control">
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-default">Edit</button>
                                                </span>
                                            @endif


                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog"
                                    aria-labelledby="updateStatusModal" Label aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="container-fluid">
                                                        <div
                                                            class="form-group d-flex align-items-center justify-content-center">
                                                            <h5>Update Status</h5>
                                                        </div>
                                                        <form action="{{ route('orgDocumentUpdateStatus') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <input type="text" hidden
                                                                    value="{{ $actAttachment->id }}" id="actAttachId"
                                                                    name="actAttachId">

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-md-auto">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="status"
                                                                                        id="pending" value="0"
                                                                                        {{ $actAttachment->status == 0 ? 'checked' : '' }}>
                                                                                    <label
                                                                                        class="form-check-label">Pending</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-auto">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="status"
                                                                                        id="inProcess" value="1"
                                                                                        {{ $actAttachment->status == 1 ? 'checked' : '' }}>
                                                                                    <label class="form-check-label">In
                                                                                        Process</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-auto">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        style="background-color:green"
                                                                                        type="radio" name="status"
                                                                                        id="approved" value="2"
                                                                                        {{ $actAttachment->status == 2 ? 'checked' : '' }}>
                                                                                    <label
                                                                                        class="form-check-label">Approved</label>
                                                                                </div>
                                                                            </div>
                                                                            <input hidden type="text"
                                                                                id="attachmentCategory"
                                                                                name="attachmentCategory"
                                                                                value="{{ $actAttachment->document_category_id }}">
                                                                            <input hidden type="text"
                                                                                id="attachmentName" name="attachmentName"
                                                                                value="{{ $actAttachment->document_name }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div hidden id="dateInputs">
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group text-center">
                                                                            <label>Date | Time Start</label>
                                                                            <div class="input-group">
                                                                                <input type="date" name="dateStart"
                                                                                    id="dateStart" class="form-control">
                                                                                <input type="time" name="timeStart"
                                                                                    id="timeStart" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group text-center">
                                                                            <label>Date | Time End</label>
                                                                            <div class="input-group">
                                                                                <input type="date" name="dateEnd"
                                                                                    id="dateEnd" class="form-control">
                                                                                <input type="time" name="timeEnd"
                                                                                    id="timeEnd" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>
                                                            <button type="submit"
                                                                class="btn btn-block btn-sm btn-success">Update</button>
                                                            <button type="button"
                                                                class="btn btn-block btn-sm btn-default"
                                                                data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- DIRECT CHAT SUCCESS -->
                    <div class="card card-success direct-chat direct-chat-success">
                        <div class="card-header">
                            <h3 class="card-title">Comments</h3>

                            <div class="card-tools">

                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->

                                <!-- Message to the right -->
                                <div class="container-fluid">
                                    @foreach ($actAttachmentComments as $comment)
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span
                                                    class="direct-chat-name float-right">{{ $comment->user->employee->firstname }}
                                                    {{ $comment->user->employee->lastname }}</span>
                                                <span
                                                    class="direct-chat-timestamp float-left">{{ $comment->updated_at->format('m/d/Y | h:i A') }}</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img" src="{{ asset('images/osalogo.png') }}"
                                                alt="Message User Image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                {{ $comment->comment_details }}
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.direct-chat-msg -->
                            </div>
                            <!--/.direct-chat-messages-->

                            <!-- Contacts are loaded here -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="{{ route('submitComment') }}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" hidden id="userId" name="userId"
                                        value="{{ Auth::user()->id }}">
                                    <input type="text" hidden id="actAttachId" name="actAttachId"
                                        value="{{ $actAttachment->id }}">

                                    <input type="text" name="comment" placeholder="Type Message ..." id="comment"
                                        class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-success">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!--/.direct-chat -->

                    <div class="form-group">
                        <label for="sampleInputMask">Sample</label>
                        <input type="text" class="form-control" id="sampleInputMask" name="sampleInputMask">
                    </div>
                </div>
                <div class="col-md-5">
                    <p class="text-center">Documents Submitted</p>
                    @php
                        $orderedAttachments = $actAttachment->attachments()->orderBy('created_at', 'desc')->get();
                    @endphp
                    @foreach ($orderedAttachments as $index => $item)
                        <div
                            class="card 
                            @if ($item->status == 1) card-success 
                            @elseif($item->status == 2) card-danger 
                            @else card-default @endif 
                            @if ($index !== 0) collapsed-card @endif card-sm">

                            <div class="card-header">
                                {{ $item->file_name }}
                                <div class="card-tools">
                                    <form action="{{ route('osaUpdateOrgAttachmentStatus') }}" method="POST"
                                        class="form-inline">
                                        @csrf
                                        <input type="hidden" name="attachment_id" value="{{ $item->id }}">
                                        <input type="hidden" name="status" value="{{ $item->status }}">
                                        <div class="form-group">
                                            <div
                                                class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitch{{ $item->id }}" name="statusToggle"
                                                    onchange="this.form.submit()"
                                                    {{ $item->status == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="customSwitch{{ $item->id }}"></label>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <button class="btn btn-sm btn-success fullscreenButton"><i
                                        class="fas fa-expand"></i></button>
                                <div style="width:100%; height:100vh;">
                                    <iframe class="pdfViewer" src="{{ asset('storage/' . $item->file_path) }}"
                                        width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </section>



    <script>
        function refreshAttachments(actAttachmentId) {
            $.ajax({
                url: "{{ route('osaFetchAttachmentsOfActivity') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    actAttachmentId: actAttachmentId,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    console.log(data);

                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);
                }
            });
        }


        $(document).ready(function() {

            var selector = document.getElementById("sampleInputMask");

            $(selector).inputmask("aa-9999"); //static mask
            $(selector).inputmask({
                mask: "aa-9999"
            });


            var actAttachId = $('#actAttachmentId').val();
            refreshAttachments(actAttachId);


            // Event listener for the "Approved" radio button
            $('#approved').click(function() {
                // Check if the "Approved" radio button is checked and attachment category is equal to 1
                if ($(this).is(':checked') && $('#attachmentCategory').val() == 1) {
                    // If both conditions are met, show the dateInputs div
                    $('#dateInputs').removeAttr('hidden');
                } else {
                    // Otherwise, hide the dateInputs div
                    $('#dateInputs').attr('hidden', 'hidden');
                }
            });

            // Optionally, you can add code to hide the dateInputs div when other radio buttons are clicked
            $('#pending, #inProcess').click(function() {
                // Hide the dateInputs div
                $('#dateInputs').attr('hidden', 'hidden');
            });
        });
    </script>
    <script>
        // Function to toggle fullscreen
        function toggleFullscreen(event) {
            var pdfViewer = event.target.parentElement.nextElementSibling.querySelector('.pdfViewer');

            if (!document.fullscreenElement) {
                pdfViewer.requestFullscreen();
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        }

        // Add click event listener to fullscreen buttons
        var fullscreenButtons = document.querySelectorAll('.fullscreenButton');
        fullscreenButtons.forEach(function(button) {
            button.addEventListener('click', toggleFullscreen);
        });
    </script>
@endsection
