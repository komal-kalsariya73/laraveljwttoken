@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2">
            <div>
                <h3 class="fw-bold mb-3">Profile</h3>
                <h6 class="op-7">Admin-Profile-information</h6>
            </div>

        </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body p-0">
                        <!-- Profile 1 - Bootstrap Brain Component -->
                        <section class="bg-light py-3 py-md-5 py-xl-8">
                            <div class="">
                                <div class="row justify-content-md-center">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                                        <h2 class=" display-5 text-center"></h2>

                                        <hr class="w-50 mx-auto  mb-xl-9 border-dark-subtle">
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="row gy-4 gy-lg-0">
                                    <div class="col-12 col-lg-4 col-xl-3">
                                        <div class="row gy-4">
                                            <div class="col-12">
                                                <div class="card widget-card border-light shadow-sm">
                                                    <div class="card-header " style="background:#07193e;color:white">Welcome,</div>
                                                    <div class="card-body">
                                                        <div class="text-center mb-3" id="profileimage">
<img src="assets/img/profile.jpg" alt="">
                                                        </div>
                                                        <h5 class="text-center mb-1"></h5>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="card widget-card border-light shadow-sm">
                                                    <div class="card-header" style="background:#07193e;color:white">About Me</div>
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush mb-0">
                                                            <li class="list-group-item">
                                                                <h6 class="mb-1">
                                                                    <span class="bii bi-mortarboard-fill me-2"></span>
                                                                    Education
                                                                </h6>
                                                                <span>M.S Computer Science</span>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <h6 class="mb-1">
                                                                    <span class="bii bi-geo-alt-fill me-2"></span>
                                                                    Location
                                                                </h6>
                                                                <span>Mountain View, California</span>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <h6 class="mb-1">
                                                                    <span class="bii bi-building-fill-gear me-2"></span>
                                                                    Company
                                                                </h6>
                                                                <span>GitHub Inc</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-8 col-xl-9">
                                        <div class="card widget-card border-light shadow-sm">
                                            <div class="card-body p-4">
                                                <ul class="nav nav-tabs" id="profileTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Overview</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="editProfileBtn" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
                                                    </li>

                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="password-tab-pane" aria-selected="false">Password</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content pt-4" id="profileTabContent">
                                                    <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                                        <h5 class="mb-3">About</h5>
                                                        <p class="lead mb-3">Ethan Leo is a seasoned and results-driven Project Manager who brings experience and expertise to project management. With a proven track record of successfully delivering complex projects on time and within budget, Ethan Leo is the go-to professional for organizations seeking efficient and effective project leadership.</p>
                                                        <h5 class="mb-3">Profile</h5>
                                                        <div id="profileInfo">
                                                            <!-- <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">First Name</div>

                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>

                                                                        </div>
                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">Last Name</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div>
                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">Gender</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div>


                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">Address</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div>
                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">City</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div>

                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">Phone</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div>
                                                                        <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                                                                            <div class="p-2">Email</div>
                                                                        </div>
                                                                        <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                                                                            <div class="p-2"></div>
                                                                        </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                                        <form action="" class="row gy-3 gy-xxl-4" id="updateProfile" method="POST" data-action="">
                                                            <div class="col-12">
                                                                <div class="row gy-2">
                                                                    <input type="hidden" name="id" value="" />
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                <label for="inputFirstName" class="form-label">First Name</label>
                                                                <input type="text" class="form-control" id="name" name="name" value="<?= $userInfo['name'] ?? '' ?>"> <!-- Use $userInfo -->
                                                                <span id="demo1" class="error-message" style="color:red"></span>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                <label for="inputPhone" class="form-label">Phone</label>
                                                                <input type="number" class="form-control" id="phone" name="phone" value="<?= $userInfo['phone'] ?? '' ?>"> <!-- Use $userInfo -->
                                                                <span id="demo3" class="error-message" style="color:red"></span>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                <label for="inputEmail" class="form-label">Email</label>
                                                                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?? '' ?>"> <!-- Use $user -->
                                                                <span id="demo4" class="error-message" style="color:red"></span>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                <label for="inputAddress" class="form-label">Address</label>
                                                                <input type="text" class="form-control" id="address" name="address" value="<?= $userInfo['address'] ?? '' ?>"> <!-- Use $userInfo -->
                                                                <span id="demo5" class="error-message" style="color:red"></span>
                                                            </div>





                                                            <div class="col-12 col-md-6">
                                                                <label for="inputProfileImage" class="form-label">Profile Image</label>
                                                                <input type="file" class="form-control" id="image" name="profile_image" />
                                                                <!-- <small>Current Image:</small><br> -->
                                                             
                                                                <span id="demo8" class="error-message" style="color:red"></span>
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="submit" class="btn" style="background:#07193e;color:white" id="submitProfile">Save Changes</button>
                                                                <div id="responseMessage"></div>
                                                            </div>
                                                        </form>

                                                    </div>

                                                    <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                                                    <form id="changePasswordForm">
        <div class="form-group">
            <label for="currentPassword">Current Password</label>
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
        </div>
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <div id="responseMessages"></div>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection