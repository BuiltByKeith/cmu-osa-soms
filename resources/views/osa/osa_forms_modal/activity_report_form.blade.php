<div class="modal fade" id="activityReportModal" tabindex="-1" role="dialog" aria-labelledby="activityReportModal" Label
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Activity Report Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-section">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Activity Information</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="ar_title">Title of the Activity</label>
                                            <input type="text" class="form-control" id="ar_title" name="ar_title"
                                                placeholder="Enter title">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ar_nature">Nature/Type of Activity</label>
                                            <select class="form-control select2" style="width: 100%;" id="ar_nature"
                                                name="ar_nature">
                                                <option selected>Select Nature of Activity</option>
                                                @foreach ($natureOfActivity as $nature)
                                                    <option value="{{ $nature->id }}">{{ $nature->description }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ar_venue">Venue</label>
                                            <input type="text" class="form-control" id="ar_venue" name="ar_venue"
                                                placeholder="Enter Venue">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ar_time">Time</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="time" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" id="ar_time" name="ar_time"
                                                    placeholder="MM/DD/YYYY" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ar_date">Date</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="date" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" id="ar_date" name="ar_date"
                                                    placeholder="MM/DD/YYYY" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Project Leader</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="ar_firstname">First Name</label>
                                            <input type="text" class="form-control" id="ar_firstname"
                                                name="ar_firstname" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="ar_middlename">Middle Name</label>
                                            <input type="text" class="form-control" id="ar_middlename"
                                                name="ar_middlename" placeholder="Enter Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="ar_lastname">Last Name</label>
                                            <input type="text" class="form-control" id="ar_lastname"
                                                name="ar_lastname" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ar_ie">Institutional Email</label>
                                            <input type="text" class="form-control" id="ar_ie" name="ar_ie"
                                                placeholder="Enter IE">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ar_contact">Contact Number</label>
                                            <input type="text" class="form-control" id="ar_contact"
                                                name="ar_contact" placeholder="Enter Contact ">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Actual Date and Time Started</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ar_actualTime">Actual Time</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="time" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" id="ar_actualTime"
                                                    name="ar_actualTime" placeholder="MM/DD/YYYY" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ar_actualDate">Actual Date</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="date" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" id="ar_actualDate"
                                                    name="ar_actualDate" placeholder="MM/DD/YYYY" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-block btn-success btn-lg">Submit</button>
                                <button type="button" class="btn btn-block btn-default btn-lg"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
