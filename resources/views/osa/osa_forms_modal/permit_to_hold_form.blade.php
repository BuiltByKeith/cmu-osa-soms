<div class="modal fade" id="permitToHoldModal" tabindex="-1" role="dialog" aria-labelledby="permitToHoldModal" Label
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Permit to Hold Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group d-flex align-items-center justify-content-center">
                            <h5>Activity Information</h5>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pth_title">Title of the Activity</label>
                                    <input type="text" class="form-control" id="pth_title" name="pth_title"
                                        placeholder="Enter title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pth_nature">Nature/Type of Activity</label>
                                    <select class="form-control select2" style="width: 100%;" id="pth_nature"
                                        name="pth_nature">
                                        <option selected>Select Nature of Activity</option>
                                        @foreach ($natureOfActivity as $nature)
                                            <option value="{{ $nature->id }}">{{ $nature->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pth_venue">Venue</label>
                                    <input type="text" class="form-control" id="pth_venue" name="pth_venue"
                                        placeholder="Enter Venue">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pth_reach">Reach of Activity</label>
                                    <select class="form-control select2" style="width: 100%;" id="pth_reach"
                                        name="pth_reach">
                                        <option selected>Select Reach of Activity</option>
                                        @foreach ($reachOfActivity as $reach)
                                            <option value="{{ $reach->id }}">{{ $reach->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="pth_time">Time</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="time" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" id="pth_time" name="pth_time"
                                            placeholder="MM/DD/YYYY" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="pth_date">Date</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" id="pth_date" name="pth_date"
                                            placeholder="MM/DD/YYYY" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-center">
                            <h5>Officer Requested</h5>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pth_reqfirstname">First Name</label>
                                    <input type="text" class="form-control" id="pth_reqfirstname"
                                        name="pth_reqfirstname" placeholder="Enter Venue">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pth_reqmiddlename">Middle Name</label>
                                    <input type="text" class="form-control" id="pth_reqmiddlename"
                                        name="pth_reqmiddlename" placeholder="Enter Venue">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pth_reqlastname">Last Name</label>
                                    <input type="text" class="form-control" id="pth_reqlastname"
                                        name="pth_reqlastname" placeholder="Enter Venue">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group d-flex align-items-center justify-content-center">
                            <h5>Noted By</h5>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pth_notefirstname">First Name</label>
                                    <input type="text" class="form-control" id="pth_notefirstname"
                                        name="pth_notefirstname" placeholder="Enter Venue">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pth_notemiddlename">Middle Name</label>
                                    <input type="text" class="form-control" id="pth_notemiddlename"
                                        name="pth_notemiddlename" placeholder="Enter Venue">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pth_notelastname">Last Name</label>
                                    <input type="text" class="form-control" id="pth_notelastname"
                                        name="pth_notelastname" placeholder="Enter Venue">
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->

                        <button type="submit" class="btn btn-block btn-success btn-lg">Submit</button>
                        <button type="button" class="btn btn-block btn-default btn-lg"
                            data-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
