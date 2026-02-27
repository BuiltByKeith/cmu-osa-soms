<div class="modal fade" id="addNewUnincludedActivityModal" tabindex="-1" role="dialog" aria-labelledby="addNewUnincludedActivityModal" Label
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Add New Unincluded Activity</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('studentOrgAddNewUnincludedActivity') }}" method="POST" enctype="multipart/form-data"
                        class="activityForm">
                        @csrf
                        <div class="form-section">
                            <div class="form-group d-flex align-items-center justify-content-center">
                                <h5>Activity Information</h5>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nameOfAct">Name of the Activity</label>
                                        <input type="text" class="form-control" id="nameOfAct" name="nameOfAct"
                                            placeholder="Enter Event Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="typeOfAct">Type of Activity</label>
                                        <select class="form-control" name="typeOfAct" name="typeOfAct" required>
                                            <option value="" selected='selected'>Select type</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reachOfAct">Reach of Activity</label>
                                        <select class="form-control" name="reachOfAct" id="reachOfAct" required>
                                            <option value="" selected>Select reach</option>
                                            @foreach ($reaches as $reach)
                                                <option value="{{ $reach->id }}">{{ $reach->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="budgetAlloc">Budget Allocation</label>
                                        <input type="text" class="form-control" id="budgetAlloc" name="budgetAlloc"
                                            placeholder="Enter Budget Allocation" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select class="form-control" id="semester" name="semester" required>
                                            <option value="" selected>Select semester</option>
                                            @foreach ($semesters as $semester)
                                                <option value="{{ $semester->id }}">{{ $semester->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="venue">Venue</label>
                                        <input type="text" class="form-control" id="venue" name="venue"
                                            placeholder="Enter Venue" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right ml-2">
                                <span class="submit-text">Submit</span>
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                            
                            <script>
                                $(document).ready(function() {
                                    $('.activityForm').on('submit', function() {
                                        const submitBtn = $(this).find('button[type="submit"]');
                                        const submitText = submitBtn.find('.submit-text');
                                        const spinner = submitBtn.find('.spinner-border');
                                        
                                        submitText.addClass('d-none');
                                        spinner.removeClass('d-none');
                                        submitBtn.prop('disabled', true);
                                    });
                                });
                            </script>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
