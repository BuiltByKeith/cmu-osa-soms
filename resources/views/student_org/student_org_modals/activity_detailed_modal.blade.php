<div class="modal fade" id="moreInfoModal{{ $activity->id }}" tabindex="-1" role="dialog"
    aria-labelledby="moreInfoModal{{ $activity->id }}" Label aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Activity Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nameOfAct">Name of the Activity</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $activity->activity_name }}">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="typeOfAct">Type of Activity</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $activity->type->description }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reachOfAct">Reach of Activity</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $activity->reach->description }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="budgetAlloc">Budget Allocation</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $activity->budget_allocation }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $activity->semester->description }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="venue">Venue</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $activity->venue }}">
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
