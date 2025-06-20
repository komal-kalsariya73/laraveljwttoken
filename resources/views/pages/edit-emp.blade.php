@extends('layouts.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <div class="page-inner">
        <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Staff Information </h3>
                <h6 class="op-7 mb-2">Staff collection of details</h6>
            </div>

        </div>

        <div class="container-fluid dashboard-content  ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="">
                        <!-- <h5 class="card-header">Add Customer Details</h5> -->
                        <div class="card-body">
                            <form id="employeeForm" data-parsley-validate="" novalidate=""
                                class=" w-75  m-auto p-4" action="" method=""
                                enctype="multipart/form-data">
                                <h2 class="text-center">Add Staff Details</h2>
                                    <input type="hidden" name="id" value="{{ $employee->id }}">
                                <section class="">
                                    <div class="container">
                                        <div class="row d-flex justify-content-center align-items-center">
                                            <div class="col">
                                                <div class="card card-registration">
                                                    <div class="row g-0">
                                                        <div class="col-xl-12">
                                                            <div class="card-body  text-black">
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-4">
                                                                        <input type="hidden" name="role" value="2">
                                                                       <input type="hidden" id="employee_id" value="{{ $employee->id }}">

                                                                       
                                                                        <div class="form-group">
                                                                            <label class="form-label fs-5">First name</label>

                                                                            <div class="input-icon">
                                                                                <span class="input-icon-addon">
                                                                                    <i class="fa fa-user text-muted"></i>
                                                                                </span>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control border border-1"
                                                                                    placeholder="Enter Your Firstname" name="fname" id="fname"  value="{{ old('fname', $employee->fname) }}"/>
                                                                            </div>
                                                                            <div class="error text-danger" id="nameError"></div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="col-md-6 mb-4">

                                                                        <div class="form-group">
                                                                            <label class="form-label fs-5">Phone</label>

                                                                            <div class="input-icon">
                                                                                <span class="input-icon-addon">
                                                                                    <i class="fas fa-phone text-muted"></i>
                                                                                </span>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control border border-1"
                                                                                    placeholder="Enter Pnone Number" name="phone" id="phone"  value="{{ old('phone', $employee->phone) }}" />
                                                                            </div>
                                                                            <div class="error text-danger" id="phoneError"></div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label fs-5">Email</label>

                                                                            <div class="input-icon">
                                                                                <span class="input-icon-addon">
                                                                                    <i class="fas fa-tablet-alt text-muted"></i>
                                                                                </span>
                                                                                <input
                                                                                    type="text"
                                                                                    class="form-control border border-1"
                                                                                    placeholder="Enter Your Email" name="email" id="email" value="{{ old('email', $employee->email) }}"/>
                                                                            </div>
                                                                            <div class="error text-danger" id="emailError"></div>
                                                                        </div>


                                                                    </div>

                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label fs-5">Password</label>

                                                                            <div class="input-icon">
                                                                                <span class="input-icon-addon">
                                                                                    <i class="fas fa-key text-muted"></i>
                                                                                </span>
                                                                                <input
                                                                                    type="password"
                                                                                    class="form-control border border-1"
                                                                                    placeholder="Enter Your Password" name="password" id="password" />
                                                                            </div>
                                                                            <div class="error text-danger" id="passwordError"></div>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                                <!-- <span id="demo8" style="color: red;" class="mt=0">Please enter your Number</span> -->
                                                                <div class="d-md-flex justify-content-start align-items-center m-3">
                                                                    <label class="form-label fs-5">Gender</label>

                                                                    <input type="radio" name="gender" id="gender" value="male" class="m-3 fs-4 text-light" {{ old('gender', $employee->gender) == 'male' ? 'checked' : '' }}/> Male

                                                                     <input type="radio" name="gender" id="gender" value="female" class="m-3" {{ old('gender', $employee->gender) == 'female' ? 'checked' : '' }}/> Female

                                                                </div>
                                                                <div class="error text-danger" id="genderError"></div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="form-group">
                                                                            <label class="form-label fs-5">City</label>

                                                                            <div class="input-icon">
                                                                                <span class="input-icon-addon">
                                                                                    <i class="fas fa-home text-muted"></i>
                                                                                </span>
                                                                                <select class="form-control pl-3 border border-1" id="city"
                                                                                    name="city">
                                                                                    <option selected disabled> Choose city...</option>
                                                                                    <option value="Surat" {{ old('city', $employee->city) == 'Surat' ? 'selected' : '' }}>Surat</option>
                                                                                    <option value="Mumbai" {{ old('city', $employee->city) == 'Mumbai' ? 'selected' : '' }}>Mumbai</option>
                                                                                    <option value="London" {{ old('city', $employee->city) == 'London' ? 'selected' : '' }}>London</option>
                                                                                    <option value="Rajkot" {{ old('city', $employee->city) == 'Rajkot' ? 'selected' : '' }}>Rajkot</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="error text-danger" id="cityError"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label fs-5">Address</label>

                                                                            <div class="input-icon">
                                                                                <span class="input-icon-addon">
                                                                                    <i class="fas fa-qrcode text-muted"></i>
                                                                                </span>
                                                                                <textarea
                                                                                    type="text"
                                                                                    class="form-control border border-1"
                                                                                    placeholder="Enter Your Address" name="address" id="address">{{ old('address', $employee->address) }}</textarea>
                                                                            </div>
                                                                            <div class="error text-danger" id="addressError"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ms-4">
                                                                <label class="form-label fs-5 me-2">Profime Image</label>
                                                                <input type="file" id="image" name="image"
                                                                    accept="image/*"><br>
                                                                <div class="error text-danger" id="imageError"></div>
                                                                <input type="hidden" name="existing_profile_image" id="existing_profile_image" value="">
                                                               @if($employee->image)
    <div id="currentProfileImage">
        <img src="{{ asset('' . $employee->image) }}" alt="Profile Image" width="100">
    </div>
    <input type="hidden" name="existing_profile_image" value="{{ $employee->image }}">
@endif

                                                                <div id="responseMessage"></div>
                                                            </div>

                                                            <div class="d-flex justify-content-end m-2">
                                                                <button type="submit" data-mdb-button-init
                                                                    data-mdb-ripple-init class="btn text-uppercase"
                                                                    name=""
                                                                    style="background:#07193e;color:white">Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        </section>

                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end valifation types -->
            <!-- ============================================================== -->
        </div>



    </div>
</div>
<script>
 
    $('#employeeForm').on('submit', function(e) {
    e.preventDefault();
    let token = localStorage.getItem('auth_token');
    var formData = new FormData(this);

    $.ajax({
       url: '/employees/update/' + $('#employee_id').val(), // Use plain URL with ID
         method: 'POST',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
           'Authorization': "Bearer " + token,  // ✅ Correct header name and space
        },
        data: formData,
        contentType: false,
        processData: false,
        success: function(res) {
            alert(res.success);
            // Optionally reload or redirect
        },
        error: function(xhr) {
            console.log(xhr.responseJSON.errors);
        }
    });
});

</script>

@endsection