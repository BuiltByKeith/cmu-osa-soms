@section('styles')
    <link rel="stylesheet" href="{{ asset('filepond/dist/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css') }}">
@endsection



<div class="modal fade" id="addNewAdviserModal" tabindex="-1" role="dialog" aria-labelledby="addNewAdviserModal" Label
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Add New Adviser</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="container-fluid">

                        <div id="verifyEmployeeAdviser">
                            <div class="row">
                                <div class="col-md-6 mx-auto text-center">
                                    <!-- Added mx-auto and text-center classes -->
                                    <div class="form-group">
                                        <label for="employeeId">Verify Employee</label>
                                        <div class="input-group">

                                            <input type="text" class="form-control" id="employeeId" name="employeeId"
                                                placeholder="Search Adviser using Employee ID" required>
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-success"
                                                    onclick="verifyEmployee()">Verify</button>
                                            </span>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="float-right">
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        <div id="addNewAdviserForm" hidden>


                            <form action="{{ route('studentOrgAddNewAdviser') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Adviser Information</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mx-auto text-center">
                                        <!-- Added mx-auto and text-center classes -->
                                        <div class="form-group">
                                            <label for="employeeId">Employee ID</label>
                                            @error('employeeId')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input type="text" class="form-control" id="employeeId" name="employeeId"
                                                placeholder="Enter Employee ID" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="empFirstname">Firstname</label>
                                                    <input type="text" class="form-control" id="empFirstname"
                                                        name="empFirstname" placeholder="Enter first name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="empMiddlename">Middlename</label>
                                                    <input type="text" class="form-control" id="empMiddlename"
                                                        name="empMiddlename" placeholder="Enter middle name" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="empLastname">Lastname</label>
                                                    <input type="text" class="form-control" id="empLastname"
                                                        name="empLastname" placeholder="Enter last name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="empExtname">Ext. Name</label>
                                                    <input type="text" class="form-control" id="empExtname"
                                                        name="empExtname" placeholder="Enter extension name">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="empGender">Gender</label>
                                                    <select class="form-control" style="width: 100%;" id="empGender"
                                                        name="empGender" required>
                                                        <option value="" selected>Select a gender</option>
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="empContactNo">Contact No.</label>
                                                    <input type="text" class="form-control" id="empContactNo"
                                                        name="empContactNo" placeholder="Enter extension name"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="float-right">
                                    <button type="button" class="btn  btn-default"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>

                                </div>
                            </form>
                        </div>

                        <div id="showEmployeeProfile" hidden>
                            <form action="{{ route('studentOrgAssignEmployeeAsAdviser') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <div class="form-group d-flex align-items-center justify-content-center">
                                                <h5>Adviser Information</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mx-auto text-center">
                                                    <!-- Added mx-auto and text-center classes -->
                                                    <div class="form-group">
                                                        <label for="employeeProfileId">Employee ID</label>
                                                        <input type="text" class="form-control"
                                                            id="employeeProfileId" name="employeeProfileId" disabled>
                                                    </div>
                                                    <div class="form-group" hidden>
                                                        <label for="employeeProfileIdId">Employee ID</label>
                                                        <input type="text" class="form-control"
                                                            id="employeeProfileIdId" name="employeeProfileIdId">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="empProfileFname">Firstname</label>
                                                                <input type="text" class="form-control"
                                                                    id="empProfileFname" name="empProfileFname"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="empProfileMname">Middlename</label>
                                                                <input type="text" class="form-control"
                                                                    id="empProfileMname" name="empProfileMname"
                                                                    disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="empProfileLname">Lastname</label>
                                                                <input type="text" class="form-control"
                                                                    id="empProfileLname" name="empProfileLname"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="empProfileXname">Ext. Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="empProfileXname" name="empProfileXname"
                                                                    disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="empProfileSex">Gender</label>
                                                                <input type="text" class="form-control"
                                                                    id="empProfileSex" name="empProfileSex" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="empProfileContact">Contact No.</label>
                                                                <input type="text" class="form-control"
                                                                    id="empProfileContact" name="empProfileContact"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-success btn-block">Register</button>
                                                    <button class="btn btn-default btn-block" type="button"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function verifyEmployee() {
        showLoadingIndicator();
        var employeeId = $('#employeeId').val();

        $.ajax({
            url: "{{ route('studentOrgFetchAddEmployeeDetails') }}",
            type: "POST",
            data: {
                employee_id: employeeId,
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                hideLoadingIndicator()
                if (response.status == 'Not Found') {
                    hideLoadingIndicator();
                    console.log('Not Found');
                    $('#addNewAdviserForm').removeAttr('hidden'); // Show the form
                    $('#verifyEmployeeAdviser').attr('hidden', 'hidden'); // Hide the search input
                } else {
                    hideLoadingIndicator();
                    console.log(response.empFirstname);
                    $('#employeeProfileIdId').val(response.id);
                    $('#employeeProfileId').val(response.empId);
                    $('#empProfileFname').val(response.empFirstname);
                    $('#empProfileMname').val(response.empMiddlename);
                    $('#empProfileLname').val(response.empLastname);
                    $('#empProfileXname').val(response.empExtname);
                    $('#empProfileContact').val(response.empContactNo);
                    $('#empProfileSex').val(response.empSex);
                    $('#showEmployeeProfile').removeAttr('hidden');
                    $('#verifyEmployeeAdviser').attr('hidden', 'hidden');
                }
            },
            error: function(xhr, status, error) {

                // Handle errors
                hideLoadingIndicator();
            }
        });
    }

    function showLoadingIndicator() {
        $('#loadingIndicator').show();
    }

    // Function to hide loading indicator
    function hideLoadingIndicator() {

        setTimeout(function() {
            $('#loadingIndicator').hide();
        }, 500);
    }
</script>
