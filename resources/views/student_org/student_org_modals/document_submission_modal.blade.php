<div class="modal fade" id="documentSubmissionModal{{ $activity->id }}" tabindex="-1" role="dialog"
    aria-labelledby="documentSubmissionModal{{ $activity->id }}" Label aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Submit Document Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('studentOrgDocumentSubmit') }}" method="POST" enctype="multipart/form-data"
                        class="activityForm">
                        @csrf
                        <div class="form-section">
                            <div class="form-group d-flex align-items-center justify-content-center">
                                <h5>Activity Information</h5>
                            </div>

                            <div class="row">
                                <input type="text" value="{{ $activity->id }}" hidden id="act_id" name="act_id">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Document Category</label>
                                        <select class="form-control" name="category" id="category">
                                            <option selected="selected">Select document Category</option>
                                            @foreach ($docuCategory as $category)
                                                <option value="{{ $category->id }}">{{ $category->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="documentName">Name of document</label>
                                        <select name="documentName" id="documentName" class="form-control">


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Input PDF document</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="attachedFile"
                                                    name="attachedFile">
                                                <label class="custom-file-label" for="attachedFile">Choose only a PDF
                                                    File</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success float-right  ml-2">Submit</button>
                            <button type="button" class="btn btn-default float-right" aria-label="Close"
                                data-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        
        $('#category').change(function(event) {
            let actId = $('#act_id').val();
            var categoryId = this.value;

            $('#documentName').html('');

            $.ajax({
                url: "{{ route('studentOrgFetchDocuments') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    category_id: categoryId,
                    act_id: actId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#documentName').html(
                        '<option value="" selected> Select Document </option>');
                    $.each(response.documents, function(index, val) {
                        var disabled = checkIfDocumentExists(val.document_name);
                        $('#documentName').append(
                            '<option value="' + val.document_name + '" ' +
                            disabled +
                            '> ' +
                            val.document_name + ' </option>');
                    });

                }
            })
        });

        function checkIfDocumentExists(documentName) {
            // Assuming actAttachments is a JavaScript array containing document names
            var documentExists = {!! json_encode($actAttachments->pluck('document_name')->toArray()) !!};

            if (documentExists.includes(documentName)) {
                return 'hidden';
            } else {
                return '';
            }
        }
    });
</script>

<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
