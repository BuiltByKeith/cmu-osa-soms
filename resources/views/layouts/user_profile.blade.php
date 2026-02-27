@extends('layouts.app')
@section('styles')
    <style>
        .image-container {
            width: 250px;
            margin: 0 auto 30px auto;
        }

        .image-container img {
            display: block;
            position: relative;
            max-width: 100%;
            max-height: auto;
            margin: auto;
        }

        figcaption {
            margin: 20px 0 30px 0;
            text-align: center;
            color: #2a292a;
        }

        input[type="file"] {
            display: none;
        }
    </style>
@endsection
@section('content')
    @php
        $userRole = '';
        foreach ($user->roles as $role) {
            if ($role->id == 1) {
                $userRole = 'osa';
            } elseif ($role->id == 2) {
                $userRole = 'organization';
            }
        }
    @endphp

    @if ($userRole == 'osa')
        <div class="content-header">
            <div class="container-fluid ml-3 mr-3">
                <div class="row mb-2">
                    <div class="col-sm-6 mt-2">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex flex-column ">
                                            <div class="form-group">
                                                <h1><i class="fa fa-user mr-2"></i>{{ $user->employee->firstname }}
                                                    {{ $user->employee->middlename }}
                                                    {{ $user->employee->lastname }}</h1>
                                                <h5><i class="fa fa-id-card mr-2"></i> {{ $user->employee->employee_id }}
                                                </h5>
                                                @if ($user->employee->sex == 0)
                                                    <h5>Female</h5>
                                                @elseif($user->employee->sex == 1)
                                                    <h5><i class="fa fa-venus-mars mr-2"></i> Male</h5>
                                                @endif

                                                <h5><i class="fa fa-phone mr-2"></i> {{ $user->employee->contact_no }}</h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="float-right">
                                    <button class="btn btn-sm btn-success" id="editOsaProfile"
                                        onclick="editOsaProfile()">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="" id="editOsaProfileForm" hidden>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('osaUpdateUserProfile') }}" method="post"
                                        enctype="multipart/form-data" id="updateOsaUserProfile">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h5>Edit</h5>
                                            </div>
                                            <div class="row">
                                                <input type="text" hidden value="{{ $user->employee->id }}"
                                                    id="employeeId" name="employeeId">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="firstname">First Name</label>
                                                        <input type="text" class="form-control" id="firstname"
                                                            name="firstname" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="middlename">Middle Name</label>
                                                        <input type="text" class="form-control" id="middlename"
                                                            name="middlename" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lastname">Last Name</label>
                                                        <input type="text" class="form-control" id="lastname"
                                                            name="lastname" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="extname">Ext. Name</label>
                                                        <input type="text" class="form-control" id="extname"
                                                            name="extname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option value="" selected id="selectGender"></option>
                                                            <option value="0">Female</option>
                                                            <option value="1">Male</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contactNo">Contact Number</label>
                                                        <input type="text" class="form-control" id="contactNo"
                                                            name="contactNo" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="editOsaEmail">Email</label>
                                                        <input type="email" class="form-control" id="editOsaEmail"
                                                            name="editOsaEmail" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="editOsaPassword">Password</label>
                                                        <input type="password" class="form-control" id="editOsaPassword"
                                                            name="editOsaPassword" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-block btn-success"
                                                onclick="showEditOsaConfirmModal() ">Update</button>
                                            <button type="button" class="btn btn-block btn-default"
                                                id="cancelButton">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editOsaConfirmationModal" tabindex="-1" role="dialog"
                aria-labelledby="editOsaConfirmationModal" Label aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container">
                                <div class="container-fluid">
                                    <div class="form-group d-flex align-items-center justify-content-center">
                                        <h5>Confirmation</h5>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="modal-body">
                                                Are you sure you want to update your profile?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default btn-block btn-sm"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="col-md-6">

                                            <button type="button" class="btn btn-success btn-block btn-sm"
                                                id="confirmUpdate">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                function showEditOsaConfirmModal() {
                    $('#editOsaConfirmationModal').modal('show');
                    $('#confirmUpdate').click(function() {
                        $('#updateOsaUserProfile').submit();
                    });
                }

                function showLoadingIndicator() {
                    $('#loadingIndicator').show();
                }

                // Function to hide loading indicator
                function hideLoadingIndicator() {
                    setTimeout(function() {
                        $('#loadingIndicator').hide();
                    }, 1000);
                }



                function editOsaProfile() {

                    showLoadingIndicator();
                    $('#editOsaProfileForm').removeAttr('hidden');
                    $('#firstname').val('{{ $user->employee->firstname }}');
                    $('#middlename').val('{{ $user->employee->middlename }}');
                    $('#lastname').val('{{ $user->employee->lastname }}');
                    $('#extname').val('{{ $user->employee->extname }}');
                    if ({{ $user->employee->sex == 0 }}) {
                        $('#selectGender').text('Female').val('{{ $user->employee->sex }}');
                    } else {
                        $('#selectGender').text('Male').val('{{ $user->employee->sex }}');
                    }
                    $('#contactNo').val('{{ $user->employee->contact_no }}');
                    $('#editOsaEmail').val('{{ $user->email }}');


                    hideLoadingIndicator();

                }
            </script>
        </section>
    @elseif($userRole == 'organization')
        <div class="content-header">
            <div class="container-fluid ml-3 mr-3">
                <div class="row mb-2">
                    <div class="col-sm-6 mt-2">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body mt-2">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if ($user->organization->image_path)
                                                <div class="text-center">
                                                    <img src="{{ asset('storage/' . $user->organization->image_path) }}"
                                                        class="img-fluid img-circle" alt="Organization Image">
                                                </div>
                                            @else
                                                <div class="text-center">
                                                    <img src="{{ asset('images/osaslogo.png') }}" class="img-fluid"
                                                        alt="Default Image">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="d-flex flex-column justify-content-center h-100">
                                            <div class="form-group">
                                                <input type="text" value="{{ $user->organization->id }}"
                                                    id="orgId" name="orgId" hidden>
                                                <h1>{{ $user->organization->organization_name }} |
                                                    {{ $user->organization->acronym }}</h1>
                                                <h4>{{ $user->organization->accreditation_no }}</h4>
                                                @if ($user->organization->type_of_org_id == 1)
                                                    <h5>University Wide Organization</h5>
                                                @elseif($user->organization->type_of_org_id == 2)
                                                    <h5>College Council Organization</h5>
                                                @elseif($user->organization->type_of_org_id == 3)
                                                    <h5>Class Organization</h5>
                                                @elseif($user->organization->type_of_org_id == 4)
                                                    <h5>Non-Class Organization</h5>
                                                @elseif($user->organization->type_of_org_id == 5)
                                                    <h5>Greek Organization</h5>
                                                @else
                                                    <p>Student Organization</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button class="btn btn-sm btn-success" id="editOrgProfile"
                                        onclick="editOrganizationProfile()">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="" id="editOrgProfileForm" hidden>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('studentOrgUpdateUserProfile') }}" method="post"
                                        enctype="multipart/form-data" id="updateStudentOrgUserProfile">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h5>Edit</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="container">

                                                        <div class="text-center">
                                                            @if ($user->organization->image_path != null)
                                                                <img id="chosenImage" class="img img-fluid"
                                                                    style="width: 250px; height:auto"
                                                                    src="{{ asset('storage/' . $user->organization->image_path) }}">
                                                                <figcaption>
                                                                    {{ basename('storage/' . $user->organization->image_path) }}
                                                                </figcaption>
                                                            @else
                                                                <img id="chosenImage" class="img img-fluid"
                                                                    style="width: 250px; height:auto"
                                                                    src="{{ asset('images/osaslogo.png') }}">
                                                                <figcaption>
                                                                    {{ basename('images/osaslogo.png') }}
                                                                </figcaption>
                                                            @endif

                                                            <figcaption id="file-name"></figcaption>
                                                            <button type="button" class="btn  btn-success">
                                                                <input type="file" id="studentOrgImagePickerInput"
                                                                    name="studentOrgImagePickerInput" accept="image/*">
                                                                <label for="studentOrgImagePickerInput">
                                                                    <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                                                                </label>
                                                            </button>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <input type="text" hidden id="editStudentOrg"
                                                            name="editStudentOrg" value="{{ $user->organization->id }}">
                                                        <input type="text" hidden id="editStudentOrgId"
                                                            name="editStudentOrgId" value="{{ $user->id }}">
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label for="editStudentOrgName">Organization Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="editStudentOrgName" name="editStudentOrgName"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="editStudentOrgAcronym">Acronym</label>
                                                                <input type="text" class="form-control"
                                                                    id="editStudentOrgAcronym"
                                                                    name="editStudentOrgAcronym" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="editStudentOrgEmail">Email Address</label>
                                                                <input type="email" class="form-control"
                                                                    id="editStudentOrgEmail" name="editStudentOrgEmail">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="currentPassword">Input Current Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="currentPassword"
                                                                    name="currentPassword">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="newPassword">New Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="newPassword"
                                                                    name="newPassword">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="retypeNewPassword">Re-type New Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="retypeNewPassword"
                                                                    name="retypeNewPassword">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="button" class="btn btn-block btn-success"
                                                        onclick="showEditStudentOrgConfirmModal()">Update</button>
                                                    <button type="button" class="btn btn-block btn-default"
                                                        id="cancelButton">Cancel</button>
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
            <div class="modal fade" id="editStudentOrgConfirmationModal" tabindex="-1" role="dialog"
                aria-labelledby="editStudentOrgConfirmationModal" Label aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container">
                                <div class="container-fluid">
                                    <div class="form-group d-flex align-items-center justify-content-center">
                                        <h5>Confirmation</h5>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="modal-body">
                                                Are you sure you want to update your profile?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default btn-block btn-sm"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="col-md-6">

                                            <button type="button" class="btn btn-success btn-block btn-sm"
                                                id="confirmUpdate">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                let uploadButton = document.getElementById("studentOrgImagePickerInput");
                let chosenImage = document.getElementById("chosenImage");
                let fileName = document.getElementById("file-name");

                uploadButton.onchange = () => {
                    let reader = new FileReader();
                    reader.readAsDataURL(uploadButton.files[0]);
                    reader.onload = () => {
                        chosenImage.setAttribute("src", reader.result);
                    }
                    fileName.textContent = uploadButton.files[0].name;
                }
            </script>

            <script>
                const selectImage = document.querySelector('.select-image');
                const inputFile = document.querySelector('#file');
                const imgArea = document.querySelector('.img-area');

                selectImage.addEventListener('click', function() {
                    inputFile.click();
                })

                inputFile.addEventListener('change', function() {
                    const image = this.files[0]
                    if (image.size < 2000000) {
                        const reader = new FileReader();
                        reader.onload = () => {
                            const allImg = imgArea.querySelectorAll('img');
                            allImg.forEach(item => item.remove());
                            const imgUrl = reader.result;
                            const img = document.createElement('img');
                            img.src = imgUrl;
                            imgArea.appendChild(img);
                            imgArea.classList.add('active');
                            imgArea.dataset.img = image.name;
                        }
                        reader.readAsDataURL(image);
                    } else {
                        alert("Image size more than 2MB");
                    }
                })
            </script>

            <script>
                function showEditStudentOrgConfirmModal() {
                    $('#editStudentOrgConfirmationModal').modal('show');
                    $('#confirmUpdate').click(function() {
                        $('#updateStudentOrgUserProfile').submit();
                    });
                }

                function showLoadingIndicator() {
                    $('#loadingIndicator').show();
                }

                // Function to hide loading indicator
                function hideLoadingIndicator() {
                    setTimeout(function() {
                        $('#loadingIndicator').hide();
                    }, 1000);
                }

                function editOrganizationProfile() {
                    showLoadingIndicator();


                    $('#editStudentOrgName').val('{{ $user->organization->organization_name }}');
                    $('#editStudentOrgAcronym').val('{{ $user->organization->acronym }}');
                    $('#editStudentOrgEmail').val('{{ $user->email }}');

                    $('#editOrgProfileForm').removeAttr('hidden');
                    hideLoadingIndicator();
                }
            </script>
        </section>
    @endif



@endsection
