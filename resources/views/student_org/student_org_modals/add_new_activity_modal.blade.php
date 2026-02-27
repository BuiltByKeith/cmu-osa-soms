<div class="modal fade" id="addNewActivityModal" tabindex="-1" role="dialog" aria-labelledby="addNewActivityModal" Label
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Add New Activity</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('studentOrgAddNewActivity') }}" method="POST" enctype="multipart/form-data"
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
                                <div class="col-md-4">
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
                                <div class="col-md-4">
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
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label for="budgetAlloc">Budget Allocation</label>
                                        <input type="text" class="form-control" id="budgetAlloc" name="budgetAlloc"
                                            placeholder="Enter Budget Allocation">
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


                        {{-- <div class="form-section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center justify-content-center">
                                        <h5>Budgetary Breakdown</h5>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <button type="button" name="addField" id="addField"
                                                class="btn btn-sm btn-success float-right"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap" id="table">
                                                <thead class="text-align text-center">
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th>Cost</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="inputs[0][item]"
                                                                placeholder="Enter item name" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="inputs[0][quantity]"
                                                                placeholder="Enter quantity" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="inputs[0][cost]"
                                                                placeholder="Enter cost" class="form-control">
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                        {{-- <div class="form-navigation mt-3">
                            <button type="button" class="previous btn btn-default float-left"><i
                                    class="fas fa-angle-left"></i>
                                Previous</button>
                            <button type="submit" class="btn btn-success float-right submit-button">Submit</button>
                            <button type="button" class="next btn btn-default float-right  mr-2">Next <i
                                    class="fas fa-angle-right"></i></button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
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
    });
</script>

<script>
    var i = 0;

    $('#addField').click(function() {
        ++i;
        $('#table').append(
            `<tr>
                <td>
                    <input type="text" name="inputs[` + i + `][item]" placeholder="Enter item nane" class="form-control" />
                </td>
                <td>
                    <input type="text" name="inputs[` + i + `][quantity]" placeholder="Enter quantity" class="form-control" />
                </td>
                <td>
                    <input type="text" name="inputs[` + i + `][cost]" placeholder="Enter cost" class="form-control" />
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger remove-table-row"><i class="fa fa-minus"></i></button>
                </td>
            </tr>`
        );
    });

    // Handle removal of dynamically added rows
    $('#table').on('click', '.remove-table-row', function() {
        $(this).closest('tr').remove();
    });
</script> --}}
