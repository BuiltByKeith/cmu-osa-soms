<div class="modal fade" id="addNewMemberModal" tabindex="-1" role="dialog" aria-labelledby="addNewMemberModal" Label
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Add New Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="verifyStudentId">
                    <div class="container">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 mx-auto text-center">
                                    <!-- Added mx-auto and text-center classes -->
                                    <div class="form-group">
                                        <label for="searchStudentIdNumber">Verify Student</label>
                                        <div class="input-group">

                                            <input type="text" class="form-control" id="searchStudentIdNumber"
                                                name="searchStudentIdNumber"
                                                placeholder="Search student using Student ID" required>
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-success"
                                                    onclick="verifyStudent()">Verify</button>
                                            </span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="" id="registerNewStudentForm" hidden>
                    <div class="container">
                        <div class="container-fluid">
                            <form action="{{ route('studentOrgAddNewMember') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <h5>Member Information</h5>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="studentId">Student ID Number</label>
                                                    <input type="text" class="form-control" id="studentId"
                                                        name="studentId" placeholder="Enter ID Number" readonly
                                                        required>
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-default custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkOfficer">
                                                        <label class="custom-control-label"
                                                            for="checkOfficer">Officer?</label>
                                                    </div>

                                                    <input type="text" class="form-control mt-2" id="position"
                                                        name="position" placeholder="Enter Position"
                                                        style="display: none;">
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstName">Firstname</label>
                                                    <input type="text" class="form-control" id="firstName"
                                                        name="firstName" placeholder="Enter first name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="middleName">Middlename</label>
                                                    <input type="text" class="form-control" id="middleName"
                                                        name="middleName" placeholder="Enter middle name" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lastName">Lastname</label>
                                                    <input type="text" class="form-control" id="lastName"
                                                        name="lastName" placeholder="Enter last name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="extName">Ext. Name</label>
                                                    <input type="text" class="form-control" id="extName"
                                                        name="extName" placeholder="Enter extension name">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" style="width: 100%;" id="gender"
                                                        name="gender" required>
                                                        <option value="" selected>Select a gender</option>
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact">Contact No.</label>
                                                    <input type="text" class="form-control" id="contact"
                                                        name="contact" placeholder="Enter extension name" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="college">College</label>
                                                    <select class="form-control" style="width: 100%;" id="college"
                                                        name="college" required>
                                                        <option value="">Select a College</option>
                                                        @foreach ($colleges as $college)
                                                            <option value="{{ $college->id }}">
                                                                {{ $college->college_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="program">Program</label>
                                                    <select class="form-control" style="width: 100%;" id="program"
                                                        name="program" required>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-block btn-success btn-lg">Submit</button>
                                <button type="button" class="btn btn-block btn-default btn-lg"
                                    data-dismiss="modal">Cancel</button>
                            </form>
                        </div>


                    </div>
                </div>

                <div class="" id="assignNewStudent" hidden>
                    <div class="container">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <!-- Set max-width to ensure image can scale within its container -->
                                                    <img src="" alt="user-avatar"
                                                        class="img-circle img-fluid" id="memberProfilePicture"
                                                        style="max-width: 100%;">
                                                </div>
                                                <div class="col-md-9">
                                                    <!-- Use flexbox to ensure text content spreads alongside the image -->
                                                    <div class="d-flex flex-column justify-content-center h-100">
                                                        <h2 id="memberProfileFullName" class="mb-0">Pangalan Diri
                                                        </h2>
                                                        <h5 id="memberProfileStudentIdNumber" class="mb-0">ID Number
                                                            diri
                                                        </h5>

                                                        <p class="mb-1"><span class="mr-2"><i
                                                                    class="fa-solid fa-school"></i></span><span
                                                                id="memberProfileCollege">College</span>, <span
                                                                id="memberProfileCourse">Course</span></p>
                                                        <p class="mb-1"><span class="mr-2"><i
                                                                    class="fa-solid fa-venus-mars"></i></span><span
                                                                id="memberProfileSex">Gender here</span></p>
                                                        <p class="mb-1"><span class="mr-2"><i
                                                                    class="fa-solid fa-phone"></i></span>
                                                            <span id="memberProfileContact">Contact diri</span>
                                                        </p>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('studentOrgAssignStudentAsMember') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="container">
                                            <div class="container-fluid">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-default custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkIfOfficer">
                                                        <label class="custom-control-label"
                                                            for="checkIfOfficer">Officer?</label>
                                                    </div>

                                                    <input type="text" class="form-control mt-2"
                                                        id="assignStudentPosition" name="assignStudentPosition"
                                                        placeholder="Enter Position" style="display: none;">
                                                </div>

                                                <input type="text" hidden id="memberProfileStudentId"
                                                    name="memberProfileStudentId">

                                                <button type="submit"
                                                    class="btn btn-success btn-block">Assign</button>
                                                <button type="button" class="btn btn-default btn-block"
                                                    data-dismiss="modal">Cancel</button>
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
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const switchElement = document.getElementById("checkOfficer");
        const inputField = document.getElementById("position");

        // Add event listener to toggle input field visibility
        switchElement.addEventListener("change", function() {
            if (this.checked) {
                inputField.style.display = "block";
                // Display input field if switch is checked
            } else {
                inputField.style.display = "none"; // Hide input field if switch is unchecked
                inputField.value = "Member"; // Set empty value when the switch is unchecked
            }
        });

        const switchAssignElement = document.getElementById("checkIfOfficer");
        const inputAssignField = document.getElementById("assignStudentPosition");

        // Add event listener to toggle input field visibility
        switchAssignElement.addEventListener("change", function() {
            if (this.checked) {
                inputAssignField.style.display = "block";
                // Display input field if switch is checked
            } else {
                inputAssignField.style.display = "none"; // Hide input field if switch is unchecked
                // Set empty value when the switch is unchecked
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#college').change(function(event) {
            var collegeId = this.value;

            $('#program').html('');

            $.ajax({
                url: "{{ route('studentOrgFetchProgram') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    college_id: collegeId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#program').html('<option value=""> Select Program </option>');
                    $.each(response.programs, function(index, val) {
                        $('#program').append(
                            '<option value="' + val.id +
                            '"> ' +
                            val.program_name + ' </option>');
                    });
                }
            })
        });
    });
</script>

<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js">
    $(function() {
        bsCustomFileInput.init();
    });
</script>




<script>
    function verifyStudent() {
        showLoadingIndicator();
        var studentId = $('#searchStudentIdNumber').val();

        $.ajax({
            url: "{{ route('studentOrgFetchAddStudentDetails') }}",
            type: "POST",
            data: {
                student_id: studentId,
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                hideLoadingIndicator();
                if (response.status == 'Not Found') {
                    console.log('Not Found');
                    $('#studentId').val(studentId);
                    $('#registerNewStudentForm').removeAttr('hidden'); // Show the form
                    $('#verifyStudentId').attr('hidden', 'hidden'); // Hide the search input
                } else {
                    hideLoadingIndicator();
                    console.log(response);
                    if (response.studentSex == 'Female') {
                        $('#memberProfilePicture').attr('src', "{{ asset('images/femaleStudent.png') }}");
                    } else if (response.studentSex == 'Male') {
                        $('#memberProfilePicture').attr('src', "{{ asset('images/maleStudent.png') }}");
                    } else {
                        $('#memberProfilePicture').attr('src', "{{ asset('images/cmu.png') }}");
                    }

                    $('#memberProfileFullName').text(response.studentFullname);
                    $('#memberProfileStudentIdNumber').text(response.studentId);
                    $('#memberProfileCollege').text(response.studentCollege);
                    $('#memberProfileCourse').text(response.studentProgram);
                    $('#memberProfileSex').text(response.studentSex);
                    $('#memberProfileContact').text(response.studentContactNo);

                    $('#memberProfileStudentId').val(response.id);

                    $('#assignNewStudent').removeAttr('hidden');
                    $('#verifyStudentId').attr('hidden', 'hidden');

                }
            },
            error: function(xhr, status, error) {
                hideLoadingIndicator();
                // Handle errors
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
