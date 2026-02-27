@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid ">
            <div class="row mb-2">
                <div class="col-md-12 mt-2">
                    <h1 class="m-0">Document Submissions for {{ $activity->activity_name }}</h1>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <strong>Documents List</strong>
                        @if (!$hasPendingAttachments)
                            <button class="btn btn-sm btn-success float-right" data-toggle="modal"
                                data-target="#documentSubmissionModal{{ $activity->id }}"><i
                                    class="fa fa-plus"></i></button>
                        @else
                            <button class="btn btn-sm btn-success float-right" disabled><i class="fa fa-plus"></i></button>
                        @endif
                    </div>
                    @include('student_org.student_org_modals.document_submission_modal')
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th>Document Type</th>

                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actAttachments as $attachment)
                                <tr>
                                    <td>{{ $attachment->document_name }}
                                    </td>
                                    <td>{{ $attachment->category->description }}</td>
                                    @if ($attachment->status == 0)
                                        <td style="color: orange; font-weight:bold">Pending</td>
                                    @elseif ($attachment->status == 1)
                                        <td style="color: #ffc600; font-weight:bold">For Revision</td>
                                    @elseif ($attachment->status == 2)
                                        <td style="color: #02681e; font-weight:bold">Approved</td>
                                    @else
                                        <td>

                                        </td>
                                    @endif
                                    {{-- <td><button class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#documentInformationModa{{ $attachment->id }}"
                                            onclick="displayDocuInformation({{ $attachment->id }})"><i
                                                class="fas fa-list"></i></button>
                                        @include('student_org.student_org_modals.activity_attachment_details_modal')</td> --}}
                                    <td>
                                        <button class="btn btn-success btn-sm"
                                            onclick="displayDocuInformation({{ $attachment->id }})"><i
                                                class="fas fa-list"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="docuInformation">

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


        function displayDocuInformation(id) {
            showLoadingIndicator();
            var attachmentId = id;
            console.log(attachmentId);
            $.ajax({
                url: "{{ route('studentOrgFetchDocuInformation') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    attachment_id: attachmentId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    hideLoadingIndicator();
                    document.getElementById('docuInformation').innerHTML = `
        <hr>
        <br>
        <div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h4>${ data.documentName } of ${ data.activityName }</h4>
        </div>
    </div>
</div>
        <br>

        <div class="row">
            <div class="col-md-6">
                ${data.status == '2' ? '' : `
                                                                <form action="{{ route('studentOrgAddNewDocuOnAttachment') }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-9">
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="addNewFile" name="addNewFile" onchange="checkFile()">
                                                                                        <label class="custom-file-label" for="addNewFile">Choose only a PDF File</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button type="submit" class="btn btn-success btn-block" id="submitButton" disabled>Submit</button>
                                                                            </div>
                                                                        </div>
                                                                        <input hidden name="attachmentId" id="attachmentId" value="${data.attachmentId}">
                                                                        <input hidden name="act_id" id="act_id" value="${data.activityId}">
                                                                        <input hidden name="documentName" id="documentName" value="${data.documentName}">
                                                                    </div>
                                                                </form>
                                                            `}
                
                
              ${data.documents.map((document, index) => `
        <div class="card ${document.status === 1 ? 'card-success' : document.status === 2 ? 'card-danger' : 'card-default'} 
            ${index !== 0 ? 'collapsed-card' : ''} card-sm">
            <div class="card-header">
                ${document.fileName} ${document.status}
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div style="width:100%; height:81vh;">
                    <iframe src="{{ asset('storage/') }}/${document.filePath}" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    `).join('')}


            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nameOfAct">Document Type</label>
                                    <input type="text" class="form-control" disabled value="${data.documentName}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nameOfAct">Category</label>
                                    <input type="text" class="form-control" disabled value="${data.documentCategory}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nameOfAct">Status</label>
                                    <input type="text" class="form-control" disabled value="${data.status == 0 ? 'Pending' : (data.status == 1 ? 'In Revision' : (data.status == 2 ? 'Approved' : ''))}" id="status" style="${data.status == 0 ? 'color: orange; font-weight:bold;' : (data.status == 1 ? 'color:#ffc600; font-weight:bold;' : (data.status == 2 ? 'color:green; font-weight:bold;' : ''))}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Comments</div>
                    <div class="card-body">
                        <div class="direct-chat-messages">
                            <div class="container-fluid">
                                ${data.comments.map(comment => `
                                                                                <div class="direct-chat-msg left">
                                                                                    <div class="direct-chat-infos clearfix">
                                                                                        <span class="direct-chat-name float-left">${comment.commentUserName}</span>
                                                                                        <span class="direct-chat-timestamp float-right">${comment.commentDate}</span>
                                                                                    </div>
                                                                                    <img class="direct-chat-img" src="{{ asset('images/osalogo.png') }}" alt="Message User Image">
                                                                                    <div class="direct-chat-text">${comment.commentDetails}</div>
                                                                                </div>
                                                                            `).join('')}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
                },


                error: function(xhr, status, error) {
                    hideLoadingIndicator();
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
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

    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
