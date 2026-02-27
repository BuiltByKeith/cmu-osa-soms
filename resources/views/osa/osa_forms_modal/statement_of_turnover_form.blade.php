<div class="modal fade" id="statementOfTurnoverModal" tabindex="-1" role="dialog"
    aria-labelledby="statementOfTurnoverModal" Label aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Statement of Turnover Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <h5>Activity Information</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="sot_title">Title of the Activity</label>
                                    <input type="text" class="form-control" id="sot_title" name="sot_title"
                                        placeholder="Enter title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sot_nature">Nature/Type of Activity</label>
                                    <select class="form-control select2" style="width: 100%;" id="sot_nature"
                                        name="sot_nature">
                                        <option selected></option>
                                        <option value="0">Female</option>
                                        <option value="1">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sot_venue">Venue</label>
                                    <input type="text" class="form-control" id="sot_venue" name="sot_venue"
                                        placeholder="Enter Venue">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sot_reach">Reach of Activity</label>
                                    <select class="form-control select2" style="width: 100%;" id="sot_reach"
                                        name="sot_reach">
                                        <option selected></option>
                                        <option value="1">University Wide</option>
                                        <option value="2">College Wide</option>
                                        <option value="3">Organization Wide</option>
                                        <option value="4">Batch Wide</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sot_time">Time</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="time" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" id="sot_time" name="sot_time"
                                            placeholder="MM/DD/YYYY" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sot_date">Date</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" id="sot_date" name="sot_date"
                                            placeholder="MM/DD/YYYY" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <h5>Officer Requested</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sot_officerFirstName">First Name</label>
                                    <input type="text" class="form-control" id="sot_officerFirstName"
                                        name="sot_officerFirstName" placeholder="Enter Venue">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sot_officeMiddleName">Middle Name</label>
                                    <input type="text" class="form-control" id="sot_officeMiddleName"
                                        name="sot_officeMiddleName" placeholder="Enter Venue">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sot_officeLastName">Last Name</label>
                                    <input type="text" class="form-control" id="sot_officeLastName"
                                        name="sot_officeLastName" placeholder="Enter Venue">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Noted By</h5>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="sot_noteFirstname">First Name</label>
                                    <input type="text" class="form-control" id="sot_noteFirstname"
                                        name="sot_noteFirstname" placeholder="Enter Venue">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sot_noteMiddlename">Middle Name</label>
                                    <input type="text" class="form-control" id="sot_noteMiddlename"
                                        name="sot_noteMiddlename" placeholder="Enter Venue">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sot_noteLastname">Last Name</label>
                                    <input type="text" class="form-control" id="sot_noteLastname"
                                        name="sot_noteLastname" placeholder="Enter Venue">
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
