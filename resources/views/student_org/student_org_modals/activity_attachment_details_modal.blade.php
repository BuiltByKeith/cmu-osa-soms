<div class="modal fade" id="documentInformationModa{{ $attachment->id }}" tabindex="-1" role="dialog"
    aria-labelledby="documentInformationModa{{ $attachment->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Attachment Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        @if ($attachment->status == '2')
                        @else
                            <form action="{{ route('studentOrgAddNewDocuOnAttachment') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="addNewFile"
                                                        name="addNewFile" onchange="checkFile()">
                                                    <label class="custom-file-label" for="addNewFile">Choose
                                                        only a
                                                        PDF File</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-success btn-block" id="submitButton"
                                                disabled>Submit</button>
                                        </div>
                                    </div>

                                    <input hidden name="attachmentId" id="attachmentId" value="{{ $attachment->id }}">
                                    <input hidden name="act_id" id="act_id" value="{{ $attachment->activity->id }}">
                                    <input hidden name="documentName" id="documentName"
                                        value="{{ $attachment->document_name }}">
                                </div>
                            </form>
                        @endif

                        @php
                            // Reverse the array of attachments to display in descending order
                            $reversedAttachments = array_reverse($attachment->attachments->toArray());
                        @endphp

                        @foreach ($reversedAttachments as $item)
                            <div class="card card-success collapsed-card card-sm">
                                <div class="card-header">
                                    {{ $item['file_name'] }}
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body ">
                                    <div style="width:100%; height:81vh;">
                                        <iframe src="{{ asset('storage/' . $item['file_path']) }}" width="100%"
                                            height="100%" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nameOfAct">Document Type</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $attachment->document_name }}">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameOfAct">Category</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $attachment->category->description }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameOfAct">Status</label>
                                            @if ($attachment->status == 0)
                                                <input type="text" class="form-control" disabled value="Pending"
                                                    id="status" style="color: orange; font-weight:bold;">
                                            @elseif($attachment->status == 1)
                                                <input type="text" class="form-control" disabled value="In Revision"
                                                    style="color:#ffc600; font-weight:bold;" id="status">
                                            @elseif($attachment->status == 2)
                                                <input type="text" class="form-control" disabled value="Approved"
                                                    id="status" style="color:green; font-weight:bold;">
                                            @else
                                                <input type="text" class="form-control" disabled value="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                Comments
                            </div>
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
            
                                    <!-- Message to the right -->
                                    <div class="container-fluid">
                                        @foreach ($attachment->comments->sortByDesc('updated_at') as $comment)
                                            <div class="direct-chat-msg left">
                                                <div class="direct-chat-infos clearfix">
                                                    <span
                                                        class="direct-chat-name float-left">{{ $comment->user->employee->firstname }}
                                                        {{ $comment->user->employee->lastname }}</span>
                                                    <span
                                                        class="direct-chat-timestamp float-right">{{ $comment->updated_at->format('m/d/Y | h:i A') }}</span>
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
                        </div>
                        
                    </div>
                </div>





                <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function checkFile() {
        var fileInput = document.getElementById('addNewFile');
        var submitButton = document.getElementById('submitButton');

        if (fileInput.files.length > 0) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }
</script>
