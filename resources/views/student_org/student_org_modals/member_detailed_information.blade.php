<div class="modal fade" id="showMemberInformationModal{{ $member->id }}" tabindex="-1" role="dialog"
    aria-labelledby="showMemberInformationModal{{ $member->id }}" Label aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Member Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="studentId">Student ID Number</label>
                                    <input type="text" class="form-control"
                                        value="{{ $member->student->student_id }}" disabled>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control"
                                        value="{{ $member->position->description }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName">Firstname</label>
                                    <input type="text" class="form-control" value="{{ $member->student->firstname }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="middleName">Middlename</label>
                                    <input type="text" class="form-control"
                                        value="{{ $member->student->middlename }}" disabled>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName">Lastname</label>
                                    <input type="text" class="form-control" value="{{ $member->student->lastname }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="extName">Ext. Name</label>
                                    <input type="text" class="form-control" value="{{ $member->student->extname }}"
                                        disabled>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName">Gender</label>


                                    @if ($member->student->sex == 1)
                                        <input type="text" class="form-control" value="Male" disabled>
                                    @elseif($member->student->sex == 0)
                                        <input type="text" class="form-control" value="Female" disabled>
                                    @else
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="extName">Contact No.</label>
                                    <input type="text" class="form-control"
                                        value="{{ $member->student->contact_no }}" disabled>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="college">College</label>
                                    <input type="text" class="form-control"
                                        value="{{ $member->student->program->college->college_name }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="program">Program</label>
                                    <input type="text" class="form-control"
                                        value="{{ $member->student->program->program_name }}" disabled>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
