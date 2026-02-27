<style>
    .nav-pills .nav-link.active {
        background-color: green;
        color: white;
        /* Change text color to white for better contrast */
    }

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


<div class="modal fade" id="addOrganizationModal" tabindex="-1" role="dialog" aria-labelledby="addOrganizationModal" Label
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <h4 class="modal-title">Register Organization</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Navigation Panel -->
            <ul class="nav nav-pills justify-content-center mt-3" id="pageNav">
                <li class="nav-item">
                    <a class="nav-link active" href="#page1">Student Organization Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#page2">User Account Information</a>
                </li>
            </ul>

            <div class="modal-body mr-3 ml-3">

                <!-- Step 1: Basic Information -->
                <form id="addNewOrg" method="POST" action="{{ route('osaAddNewOrganization') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="page" id="page1">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-4 text-center">
                                        <div class="image-picker-container">
                                            <img id="chosenImage" class="img img-fluid"
                                                style="width: 250px; height:auto">
                                            <figcaption id="file-name"></figcaption>
                                            <button type="button" class="btn btn-success mt-3">
                                                <input type="file" id="osaAddOrgImagePickerInput"
                                                    name="osaAddOrgImagePickerInput" accept="image/*"
                                                    style="display: none;">
                                                <label for="osaAddOrgImagePickerInput">
                                                    <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                                                </label>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">



                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="orgName">Student Organization Name</label>
                                                <input type="text" class="form-control" id="orgName" name="orgName"
                                                    required>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acronym">Acronym</label>
                                                <input type="text" class="form-control" id="acronym" name="acronym"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="orgType">Organization Type</label>
                                                <select name="orgType" id="orgType" class="form-control" required>
                                                    <option value="" selected>Select Type</option>
                                                    @foreach ($typeOfOrgs as $type)
                                                        <option value="{{ $type->id }}">{{ $type->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-default next-page float-right">Next</button>
                    </div>
                    <div class="page" id="page2" style="display: none;">
                        <!-- Step 2: Additional Details -->
                        <br>
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="emailAdd">Email Address</label>
                                            <input type="email" class="form-control" id="emailAdd" name="emailAdd"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success float-right ml-2" id="submitForm">Submit</button>
                        <button type="button" class="btn btn-default prev-page float-right ">Previous</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('addNewOrg');
        const pages = document.querySelectorAll('.page');
        const nextPageButtons = document.querySelectorAll('.next-page');
        const prevPageButtons = document.querySelectorAll('.prev-page');

        nextPageButtons.forEach(button => {
            button.addEventListener('click', function() {
                if (validatePage(this.closest('.page'))) {
                    nextPage(this.closest('.page'));
                }
            });
        });

        prevPageButtons.forEach(button => {
            button.addEventListener('click', function() {
                prevPage(this.closest('.page'));
            });
        });

        function nextPage(currentPage) {
            const nextPage = currentPage.nextElementSibling;
            currentPage.style.display = 'none';
            nextPage.style.display = 'block';
            updatePageNav(nextPage.id);
        }

        function prevPage(currentPage) {
            const prevPage = currentPage.previousElementSibling;
            currentPage.style.display = 'none';
            prevPage.style.display = 'block';
            updatePageNav(prevPage.id);
        }

        // Update navigation panel to indicate current page
        function updatePageNav(pageId) {
            const pageNavLinks = document.querySelectorAll('#pageNav .nav-link');
            pageNavLinks.forEach(link => {
                if (link.getAttribute('href').slice(1) === pageId) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

        function validatePage(page) {
            const inputs = page.querySelectorAll('input[required]');
            const selects = page.querySelectorAll('select[required]');
            let isValid = true;
            inputs.forEach(input => {
                const errorMessageId = input.id + '-error';
                let errorMessage = document.getElementById(errorMessageId);
                if (!input.validity.valid) {
                    if (!errorMessage) {
                        errorMessage = document.createElement('div');
                        errorMessage.id = errorMessageId;
                        errorMessage.className = 'text-danger';
                        if (input.validity.valueMissing) {
                            errorMessage.textContent = 'Please fill out this field.';
                        } else if (input.validity.typeMismatch && input.type === 'email') {
                            errorMessage.textContent = 'Please enter a valid email address.';
                        } else {
                            errorMessage.textContent = 'Please enter a valid value.';
                        }
                        input.parentNode.appendChild(errorMessage);
                    }
                    isValid = false;
                } else {
                    if (errorMessage) {
                        errorMessage.parentNode.removeChild(errorMessage);
                    }
                }
            });
            selects.forEach(select => {
                const errorMessageId = select.id + '-error';
                let errorMessage = document.getElementById(errorMessageId);
                if (!select.validity.valid) {
                    if (!errorMessage) {
                        errorMessage = document.createElement('div');
                        errorMessage.id = errorMessageId;
                        errorMessage.className = 'text-danger';
                        if (select.validity.valueMissing) {
                            errorMessage.textContent = 'Please fill out this field.';
                        } else if (select.validity.typeMismatch && select.type === 'email') {
                            errorMessage.textContent = 'Please enter a valid email address.';
                        } else {
                            errorMessage.textContent = 'Please enter a valid value.';
                        }
                        select.parentNode.appendChild(errorMessage);
                    }
                    isValid = false;
                } else {
                    if (errorMessage) {
                        errorMessage.parentNode.removeChild(errorMessage);
                    }
                }

            });
            return isValid;
        }

        form.addEventListener('submit', function(event) {
            $('#addNewOrg').submit();
        });
    });
</script>
<script>
    let uploadButton = document.getElementById("osaAddOrgImagePickerInput");
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
