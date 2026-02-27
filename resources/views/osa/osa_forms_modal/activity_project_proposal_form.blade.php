<style>
    .form-section {
        display: none;
    }

    .form-section.current {
        display: inline;
    }

    .parsley-errors-list {
        color: red;
    }
</style>

<div class="modal fade" id="activityProjectProposalModal" tabindex="-1" role="dialog"
    aria-labelledby="activityProjectProposalModal" Label aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Activity Project Proposal Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="activity-form">
                    @csrf
                    <div class="form-section">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Activity Details</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="arp_title">Title of the Activity</label>
                                            <input type="text" class="form-control" id="arp_title" name="arp_title"
                                                placeholder="Enter title">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="arp_nature">Nature of Activity</label>
                                            <select class="form-control select2" style="width: 100%;" id="arp_nature"
                                                name="arp_nature">
                                                <option selected>Select Nature of Activity</option>
                                                @foreach ($natureOfActivity as $nature)
                                                    <option value="{{ $nature->id }}">{{ $nature->description }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="arp_type">Type of Activity</label>
                                            <select class="form-control select2" style="width: 100%;" id="arp_type"
                                                name="arp_type">
                                                <option selected>Select Nature of Activity</option>
                                                @foreach ($typeOfActivity as $type)
                                                    <option value="{{ $type->id }}">{{ $type->description }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="arp_venue">Venue</label>
                                            <input type="text" class="form-control" id="arp_venue" name="arp_venue"
                                                placeholder="Enter Venue">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="arp_participants">No. or Participants</label>
                                            <input type="text" class="form-control" id="arp_participants"
                                                name="arp_participants" placeholder="Enter number of participants">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="arp_time">Time</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="time" class="form-control datetimepicker-input"
                                                    data-target="#arp_reservationtime" id="arp_time" name="arp_time"
                                                    placeholder="MM/DD/YYYY" />
                                                <div class="input-group-append" data-target="#arp_reservationtime"
                                                    data-toggle="datetimepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="arp_date">Date</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="date" class="form-control datetimepicker-input"
                                                    data-target="#arp_reservationdate" id="arp_date" name="arp_date"
                                                    placeholder="MM/DD/YYYY" />
                                                <div class="input-group-append" data-target="#arp_reservationdate"
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
                                            <label for="PLfirstname">First Name</label>
                                            <input type="text" class="form-control" id="PLfirstname"
                                                name="PLfirstname" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="PLminddlename">Middle Name</label>
                                            <input type="text" class="form-control" id="PLminddlename"
                                                name="PLminddlename" placeholder="Enter Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="PLlastname">Last Name</label>
                                            <input type="text" class="form-control" id="PLlastname"
                                                name="PLlastname" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="PLie">Institutional Email</label>
                                            <input type="text" class="form-control" id="PLie" name="PLie"
                                                placeholder="Enter IE">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="PLcontact">Contact Number</label>
                                            <input type="text" class="form-control" id="PLcontact"
                                                name="PLcontact" placeholder="Enter Contact ">
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
                                            <label for="actualTime">Time</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="time" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" id="actualTime" name="actualTime"
                                                    placeholder="MM/DD/YYYY" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="actualDate">Date</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="date" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" id="actualDate" name="actualDate"
                                                    placeholder="MM/DD/YYYY" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Brief Context | Summary of the Activity</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Objectives</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Comprehensive Program Design</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Breakdown of Expenses</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Source of Funds</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Projected Income</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-navigation mt-3">
                        <button type="button" class="previous btn btn-default float-left">Previous</button>
                        <button type="submit" class="btn btn-success float-right submit-button">Submit</button>
                        <button type="button" class="next btn btn-default float-right">Next</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var currentSection = 0;
        var formSections = $('.form-section');
        var navLinks = $('.nav-link');
        var submitButton = $('.submit-button'); // Select the submit button by its new class
        var nextButton = $('.next');
        var previousButton = $('.previous');
        var totalSections = formSections.length;

        // Hide all form sections except the first one
        formSections.hide();
        formSections.eq(currentSection).show();
        navLinks.eq(currentSection).addClass('active');

        // Function to update button visibility
        function updateButtonVisibility() {
            if (currentSection === 0) {
                previousButton.hide();
            } else {
                previousButton.show();
            }

            if (currentSection === totalSections - 1) {
                nextButton.hide();
                submitButton.show();
            } else {
                nextButton.show();
                submitButton.hide();
            }
        }

        // Initial visibility setup
        updateButtonVisibility();

        // Handle next button click
        nextButton.click(function() {
            if (currentSection < totalSections - 1) {
                formSections.eq(currentSection).hide();
                navLinks.eq(currentSection).removeClass('active');
                currentSection++;
                formSections.eq(currentSection).show();
                navLinks.eq(currentSection).addClass('active');

                // Update button visibility
                updateButtonVisibility();
            }
        });

        // Handle previous button click
        previousButton.click(function() {
            if (currentSection > 0) {
                formSections.eq(currentSection).hide();
                navLinks.eq(currentSection).removeClass('active');
                currentSection--;
                formSections.eq(currentSection).show();
                navLinks.eq(currentSection).addClass('active');

                // Update button visibility
                updateButtonVisibility();
            }
        });

        // Handle form submission
        $('.activity-form').submit(function(e) {
            // Validate form or perform additional actions if needed

            // Submit the form
            alert('Form submitted successfully!');
            // Uncomment the line below to actually submit the form
            // $(this).submit();
        });
    });
</script>
