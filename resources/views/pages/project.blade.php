@extends('layouts.master')
@section('content')
<div class="container">
                <div class="page-inner">
                    <div
                        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2">
                        <div>
                            <h3 class="fw-bold mb-3">Project</h3>
                            <h6 class="op-7 ">Project > Add > Detail</h6>
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
                                        <form id="validationform" data-parsley-validate="" novalidate=""
                                            class="w-75  m-auto p-4" action="" method=""
                                            enctype="multipart/form-data">
                                            <h2 class="text-center">Add Project Details</h2>
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
                                                                                    <div class="form-group">
                                                                                        <input type="hidden" id="id" name="id">
                                                                                        <label class="form-label fs-5">Project name</label>

                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon">
                                                                                                <i class="fa fa-user text-muted"></i>
                                                                                            </span>

                                                                                            <input
                                                                                                type="text"
                                                                                                class="form-control border border-1"

                                                                                                placeholder="Enter Email" name="project_name" id="project_name" />
                                                                                        </div>
                                                                                        <span class="text-danger" id="project_nameError"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 mb-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Status</label>
                                                                                        <div class="input-icon position-relative">
                                                                                            <span class="input-icon-addon position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%);">
                                                                                                <i class="fas fa-copy text-muted"></i>
                                                                                            </span>
                                                                                            <select
                                                                                                class="form-select ps-5 border border-1"
                                                                                                id="status" name="status">
                                                                                                <option value="">Choose Status...</option>
                                                                                                <option value="not_started">not_started</option>
                                                                                                <option value="in_progress">in_progress</option>
                                                                                                <option value="completed">completed</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <span class="text-danger" id="statusError"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Description</label>
                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon">
                                                                                                <i class="fas fa-copy text-muted"></i>
                                                                                            </span>
                                                                                            <textarea class="form-control border border-1" id="description" rows="3" placeholder="Enter your description here..." name="description"></textarea>
                                                                                        </div>
                                                                                        <span class="text-danger" id="descriptionError"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 mb-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Message</label>
                                                                                        <div class="input-icon">
                                                                                            <span class="input-icon-addon">
                                                                                                <i class="fas fa-copy text-muted"></i>
                                                                                            </span>
                                                                                            <textarea class="form-control border border-1" id="message" name="message" rows="3" placeholder="Enter your Message here..."></textarea>
                                                                                        </div>
                                                                                        <span class="text-danger" id="messageError"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Start Date</label>
                                                                                        <input
                                                                                            type="date"
                                                                                            class="form-control border border-1"
                                                                                            id="start_date"
                                                                                            placeholder="Enter Input" name="start_date" />
                                                                                    </div>
                                                                                    <span class="text-danger" id="start_dateError"></span>
                                                                                </div>
                                                                                <div class="col-md-6 mb-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">End Date</label>
                                                                                        <input
                                                                                            type="date"
                                                                                            class="form-control border border-1"
                                                                                            id="end_date"
                                                                                            placeholder="Enter Input" name="end_date" />
                                                                                    </div>
                                                                                    <span class="text-danger" id="end_dateError"></span>
                                                                                </div>
                                                                            </div>






                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-4">

                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Customer With Project</label>
                                                                                        <div class="input-icon position-relative">
                                                                                            <span class="input-icon-addon position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%);">
                                                                                                <i class="fas fa-copy text-muted"></i>
                                                                                            </span>
                                                                                            <select
                                                                                                class="form-select ps-5 border border-1"
                                                                                                id="customer_id" name="customer_id">
                                                                                                <option selected disabled>Select Customer</option>
                                                                                               
                                                                                              
                                                                                            </select>
                                                                                        </div>
                                                                                        <span class="text-danger" id="customer_idError"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 mb-4">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label fs-5">Staff</label>
                                                                                        <div class="input-icon position-relative">
                                                                                            <span class="input-icon-addon position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%);">
                                                                                                <i class="fas fa-id-badge text-muted"></i>
                                                                                            </span>
                                                                                            <select
                                                                                                class="form-select ps-5 border border-1"
                                                                                                id="user_id" name="user_id">
                                                                                                <option selected disabled>Select Staff</option>
                                                                                            
                                                                                            </select>
                                                                                        </div>
                                                                                        <span class="text-danger" id="user_idError"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6 mb-4">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label fs-5">Image</label>
                                                                                            <input type="file" id="image" name="image[]"
                                                                                                accept="application/pdf,image/*" multiple><br>
                                                                                        </div>
                                                                                        <input type="hidden" name="existing_profile_image" id="existing_profile_image" value="">
                                                                                        <div id="currentProfileImage"></div>
                                                                                        <span class="text-danger" id="imageError"></span>
                                                                                    </div>
                                                                                    <div class="col-md-6 mb-4">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label fs-5">Price</label>
                                                                                            <input
                                                                                                type="number"
                                                                                                class="form-control border border-1"
                                                                                                id="price"
                                                                                                placeholder="Enter Input" name="price" />
                                                                                        </div>
                                                                                        <span class="text-danger" id="priceError"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div id="responseMessage"></div>
                                                                        <div class="d-flex justify-content-end m-2">
                                                                            <button type="submit" data-mdb-button-init
                                                                                data-mdb-ripple-init class="btn text-uppercase"
                                                                                name="upload"
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
                                    <div id="responseMessage"></div>
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
            @endsection