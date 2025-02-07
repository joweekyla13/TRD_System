<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
$username = $_SESSION['username'];
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-12">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <div class="ms-2 col-md-4">
                                <select class="form-select" type="text" name="" id="training_approval" title="Select Training request Status to View">
                                    <!-- <option selected disabled value="0">Select Training request Status</option> -->
                                    <option value="4">All Training Request</option>
                                    <option value="1">Conformance</option>
                                    <option value="2">Receiving</option>
                                    <option value="3">QC Head</option>
                                </select>
                            </div>

                            <!-- VIEW ALL -->
                            <div class="card m-3" id="tbl_view_all">
                                <div class="card-header m-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title fw-bold fs-4 text-secondary">Training Request List</h5>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTraineeModal"><i class="fa fa-plus fa-md me-2"></i>Request Training</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tbl_request_list" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <!-- Edited 1-10-25 -->
                                                    <th>Action</th>
                                                    <th>Ctrl No. / Doc No.</th>
                                                    <th>Date Filed</th>
                                                    <th>Conformance</th>
                                                    <th>Receiving</th>
                                                    <th>QC Head Approval</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- CONFORMANCE -->
                            <div class="card m-3 d-none" id="tbl_conformance">
                                <div class="card-header m-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title fw-bold fs-4 text-secondary">Conformance List</h5>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTraineeModal"><i class="fa fa-plus fa-md me-2"></i>Request Training</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#c_for_approval" type="button" role="tab" aria-selected="true">For Conformance</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">

                                                                    <!-- Edited 1-20-25 -->
                                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#c_for_revision" type="button" role="tab" aria-selected="false">Disapproved</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#c_approved" type="button" role="tab" aria-selected="false">Conformed</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <!-- Edited 1-20-25 -->
                                                                    <!-- <button class="nav-link" data-bs-toggle="tab" data-bs-target="#c_disapproved" type="button" role="tab" aria-selected="false">Disapproved</button> -->
                                                                </li>
                                                            </ul>

                                                            <div class="tab-content" id="myTabContent">
                                                                <!-- For Approval Tab Content -->
                                                                <div class="tab-pane fade show active" id="c_for_approval" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="c_tbl_approval" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- For Revision Tab Content -->
                                                                <div class="tab-pane fade" id="c_for_revision" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="c_tbl_revision" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <!-- Approved Tab Content -->
                                                                <div class="tab-pane fade" id="c_approved" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="c_tbl_approved" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- For Disapprove Tab Content -->
                                                                <div class="tab-pane fade" id="c_disapproved" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="c_tbl_disapproved" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div> <!-- End of tab-content -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>

                            <!-- RECEIVING -->
                            <div class="card m-3 d-none" id="tbl_receiving">
                                <div class="card-header m-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title fw-bold fs-4 text-secondary">Receiving List</h5>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTraineeModal"><i class="fa fa-plus fa-md me-2"></i>Request Training</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#r_for_approval" type="button" role="tab" aria-selected="true">For Receiving</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <!-- Edited 1-20-25 -->
                                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#r_for_revision" type="button" role="tab" aria-selected="false">Disapproved</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#r_approved" type="button" role="tab" aria-selected="false">Received</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <!-- Edited 1-20-25 -->
                                                                    <!-- <button class="nav-link" data-bs-toggle="tab" data-bs-target="#r_disapproved" type="button" role="tab" aria-selected="false">Disapproved</button> -->
                                                                </li>
                                                            </ul>

                                                            <div class="tab-content" id="myTabContent">
                                                                <!-- For Approval Tab Content -->
                                                                <div class="tab-pane fade show active" id="r_for_approval" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="r_tbl_approval" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- For Revision Tab Content -->
                                                                <div class="tab-pane fade" id="r_for_revision" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="r_tbl_revision" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <!-- Approved Tab Content -->
                                                                <div class="tab-pane fade" id="r_approved" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="r_tbl_approved" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- For Disapprove Tab Content -->
                                                                <div class="tab-pane fade" id="r_disapproved" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="r_tbl_disapproved" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div> <!-- End of tab-content -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>

                            <!-- QC HEAD -->
                            <div class="card m-3 d-none" id="tbl_qc_head">
                                <div class="card-header m-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title fw-bold fs-4 text-secondary">QC Head List</h5>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTraineeModal"><i class="fa fa-plus fa-md me-2"></i>Request Training</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#q_for_approval" type="button" role="tab" aria-selected="true">For Approval</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <!-- Edited 1-20-25 -->
                                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#q_for_revision" type="button" role="tab" aria-selected="false">Disapproved</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#q_approved" type="button" role="tab" aria-selected="false">Approved</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <!-- Edited 1-20-25 -->
                                                                    <!-- <button class="nav-link" data-bs-toggle="tab" data-bs-target="#q_disapproved" type="button" role="tab" aria-selected="false">Disapproved</button> -->
                                                                </li>
                                                            </ul>

                                                            <div class="tab-content" id="myTabContent">
                                                                <!-- For Approval Tab Content -->
                                                                <div class="tab-pane fade show active" id="q_for_approval" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="q_tbl_approval" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- For Revision Tab Content -->
                                                                <div class="tab-pane fade" id="q_for_revision" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="q_tbl_revision" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <!-- Approved Tab Content -->
                                                                <div class="tab-pane fade" id="q_approved" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="q_tbl_approved" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- For Disapprove Tab Content -->
                                                                <div class="tab-pane fade" id="q_disapproved" role="tabpanel">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-body">
                                                                                <div class="table-responsive">
                                                                                    <table id="q_tbl_disapproved" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Status</th>
                                                                                                <th>Control No.</th>
                                                                                                <th>Date Filed</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                        </thead>

                                                                                        <tbody>
                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div> <!-- End of tab-content -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>

                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Request -->
        <div class="modal fade" id="newTraineeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Training Request Form</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formAddTrainingRequest" autocomplete="off">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 35%;">Control Number</span>
                                        <input class="form-control" type="text" name="conno" id="textconno" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Date Filed</span>
                                        <input class="form-control" type="date" name="current_date" id="current_date" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <p class="fw-bold">Request Details</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Department</span>
                                        <input class="form-select" type="text" name="department" id="textdepartment" list="list_department" placeholder="Select department" required>
                                        <datalist id="list_department">
                                            
                                        </datalist>
                                        <!-- <select class="form-select" type="text" name="department" id="textdepartment">
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="PPS">PPS</option>
                                            <option value="CN">CN</option>
                                            <option value="YF">YF</option>
                                            <option value="TS">TS</option>
                                        </select> -->
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Section</span>
                                        <input class="form-select" type="text" name="section" id="textsection" list="list_section" placeholder="Select section" required>
                                        <datalist id="list_section">

                                        </datalist>
                                        <!-- <select class="form-select" type="text" name="section" id="textsection">
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Production">Production</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="PPC">PPC</option>
                                            <option value="LQC">LQC</option>
                                        </select> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Job Function</span>
                                        <select class="form-select" type="text" name="job_function" id="textjob_function">
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Operator">Operator</option>
                                            <option value="Material Handler">Material Handler</option>
                                            <option value="Inspector">Inspector</option>
                                            <option value="Technician">Technician</option>
                                            <option value="Engineer">Engineer</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Clerk">Clerk</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Area/Line Allocation</span>
                                        <select class="form-select" type="text" name="area_line" id="textarea_line">
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Automotive Line">Automotive Line</option>
                                            <option value="Non-automotive Line">Non-automotive Line</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 17.2%;">Reason</span>
                                        <select class="form-select" type="text" name="reason" id="textreason" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Newly Hired">Newly Hired</option>
                                            <option value="Maternity Leave">Maternity Leave</option>
                                            <option value="Sick Leave">Sick Leave</option>
                                            <option value="Vacation Leave">Vacation Leave</option>
                                            <option value="Promoted">Promoted</option>
                                            <option value="Transferred">Transferred</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <hr>

                            <div class="d-flex justify-content-end mb-3">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#requestEmployee"><i class="fa-solid fa-user-plus me-2" style="color: white"></i>REQUEST EMPLOYEE</button>
                            </div>

                            <input type="hidden" id="hidden_docno" name="hidden_docno">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="tblSelectedTrainee" >
                                    <thead class="table-primary">
                                        <tr>
                                        <th>Action</th>
                                        <th>Date Hired</th>
                                        <!-- <th>Doc #</th> -->
                                        <th>Employee No.</th>
                                        <th>Name</th>
                                        <th>Position/Dept./Section</th>
                                        <th>Title</th>

                                        <!-- Edited 12-16-24 -->
                                        <th>Result</th>

                                        <th>Remarks</th>

                                        <!-- Edited 12-23-24 -->
                                        <!-- <th>Training Dates</th> -->

                                        <th>Venue</th>
                                        <th>From Station/Production</th>
                                        <th>To Station/Production</th>
                                        <th>Endorsement Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Requestor</span>
                                        <input type="hidden" class="form-control" id="textrequestor" name="requestor" value="<?php echo $username; ?>"readonly>
                                        <input type="text" class="form-control" id="textrequestorname" name="requestorname" readonly>

                                    </div>

                                    <!-- REQUESTOR EMAIL AND USERNAME -->
                                    <!-- <input type="text" id="text_requestor_username" name="requestor_username"> -->
                                    <input type="hidden" id="text_requestor_email" name="requestor_email">
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Section Head</span>
                                        <input class="form-select" name="approver" id="textapprover" list="approver" placeholder="Enter approver">
                                        <datalist id="approver">
                                        </datalist>
                                        <input type="hidden" class="form-control" id="textemail" name="email" placeholder="Enter email here">
                                    </div>

                                    <!-- Edited 1-20-25 -->
                                    <!-- <input type="hidden" name="staticEmails" id="staticEmails"  value="paulgabrielle28@gmail.com, paulbariring28@gmail.com, "> -->
                                    <input type="hidden" name="staticEmails" id="staticEmails"  value="cnpoblete@pricon.ph, ldatok@pricon.ph, jmporcare@pricon.ph, eldugos@pricon.ph, havasquez@pricon.ph, rdmorallos@pricon.ph, evalfelor@pricon.ph, jgsulit@pricon.ph, ">
                                    <!-- <input type="text" id="text_approver_name" name="approver_name"> -->
                                    <input type="text" id="text_approver_username" name="approver_username" hidden>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btnSubmitTrainingRequest"><i class="fa-solid fa-file-import me-2" style="color: white"></i>SUBMIT</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Request Employee -->
        <div class="modal fade" id="requestEmployee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Add Employee</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formAddTrainingEmp" autocomplete="off">
                            <div class="input-group mb-2">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 15%;">Memo Doc No.</span>
                                <input class="form-control" type="text" name="req_doc_no" id="text_req_doc_no" list="req_doc_no" placeholder="Choose document number">
                                    <datalist id="req_doc_no">

                                    </datalist>
                            </div>
                            <div class="form-check ms-2 mb-3">
                                <input class="form-check-input cbManual" type="checkbox" value="" id="cbManual" name="cbManual">
                                <label class="form-check-label" for="cbManual">
                                    Manual
                                </label>
                            </div>

                            <div class="con_empno_input mb-5 d-none" id="con_empno_input">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 30.2%;">Emp No.</span>
                                            <input class="form-control" id="text_empno" name="empno" list="list_empno" placeholder="Search Employee Number" style="text-transform: uppercase">
                                                <datalist id="list_empno">
                                                </datalist>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 30.2%;">Emp Name</span>
                                            <input class="form-control" name="manual_fullname" id="text_manual_fullname" placeholder="Employee Name">
                                        </div> 
                                    </div>
                                </div>

                                <!-- Edited 12-10-24 -->
                                <input type="hidden" name="manual_date_hired" id="text_manual_date_hired">
                                <input type="hidden" name="manual_pds" id="text_manual_pds">
                                <input type="hidden" name="manual_venue" id="text_manual_venue">

                                <!-- Endorsement Date Input -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="input-group mb-2">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 30.2%;">Endorsement Date</span>
                                            <input type="date" class="form-control" id="text_manual_endorsement_date" name="manual_endorsement_date">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <p class="fw-bold">Category</p>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group mt-2 mb-4">

                                    <!-- Edited 12-23-24 -->
                                    <!-- <input class="form-control" id="text_manual_title" name="manual_title" list="list_manual_title" placeholder="General Knowledge">
                                        <datalist id="list_manual_title">

                                        </datalist> -->

                                    <select class="form-select" id="text_manual_title" name="manual_title" list="list_manual_title" placeholder="General Knowledge">
                                        <option value="">Select One</option>
                                        <option value="General Knowledge 1">General Knowledge 1</option>
                                        <option value="General Knowledge 2">General Knowledge 2</option>
                                        <option value="General Knowledge 3">General Knowledge 3</option>
                                        <option value="BBS">8-Hour Safety Mandatory Training</option>
                                        <option value="Basic Job Knowledge">Basic Job Knowledge</option>
                                    </select>

                                    <!-- Edited 12-23-24 -->
                                    <select class="form-select" id="text_manual_result" name="manual_result">
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Passed">Passed</option>
                                        <option value="Complied">Complied</option>
                                        <option value="Hands-on">Hands-on</option>
                                        <option value="Failed">Failed</option>
                                    </select>

                                    <!-- Edited 12-23-24 -->
                                    <input class="form-control" id="text_manual_remarks" name="manual_remarks" placeholder="Training Remarks">

                                    <!-- Edited 12-23-24 -->
                                    <!-- <input class="form-control" id="textTitleFromTo" name="textTitleFromTo" placeholder="From - To" readonly> -->

                                    <button type="button" id="btnSelect" name="btnSelect" class="btn btn-primary">Add</button>
                                    </div>
                                </div>

                                <div class="table-responsive mb-3">
                                    <table class="table table-bordered table-hover"  id="tblManualGeneralKnowledge">

                                        <thead class="table-secondary">
                                            <tr>
                                            <th>Objective</th>
                                            <th>Result</th>

                                            <!-- Edited 12-16-24 -->
                                            <th>Remarks</th>

                                            <!-- Edited 12-23-24 -->
                                            <!-- <th>Training Dates</th> -->
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="mb-5">
                                    <button class="btn btn-primary float-end btnManualAddEmployee" id="btnManualAddEmployee" name="btnManualAddEmployee">Add Employee</button>
                                </div>
                                <br>
                            </div>

                            <div class="table-responsive mb-3">
                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="tbl_training_request" >
                                    <thead class="table-primary">
                                        <tr>
                                        <th>Action</th>
                                        <th>Employee No.</th>
                                        <th>Name</th>
                                        <th>Date Hired</th>
                                        <th>Position/Dept./Section</th>
                                        <th>Title</th>

                                        <!-- Edited 12-16-24 -->
                                        <th>Result</th>

                                        <th>Remarks</th>

                                        <!-- Edited 12-23-24 -->
                                        <!-- <th>Training Dates</th> -->

                                        <th>Venue</th>
                                        <th>Endorsement Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- Add more rows as needed -->
                                    </tbody>

                                </table>
                            </div>

                            <div class="mb-3">
                                <p class="fw-bold">From</p>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 15%;">Station</span>
                                <input type="input" class="form-control" id="text_from_station" name="from_station" placeholder="Enter station">
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 15%;">Product Name</span>
                                <input type="input" class="form-control" id="text_from_product" name="from_product" placeholder="Enter product name">
                            </div>

                            <div class="mb-3">
                                <p class="fw-bold">To</p>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 15%;">Station</span>
                                <input type="input" class="form-control" id="text_to_station" name="to_station" placeholder="Enter station">
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 15%;">Product Name</span>
                                <input type="input" class="form-control" id="text_to_product" name="to_product" placeholder="Enter product name">
                            </div>
                            <hr>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="btnAddTrainingEmp"><i class="fa-solid fa-check me-2" style="color: white"></i>ADD</button>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal View Training Request -->
        <div class="modal fade" id="viewRequestTrainee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">View Training Request Form</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <input type="hidden" id="text_TRpkid" name="TRpkid">
                        <ipnput type="hidden" id="text_hidden_fkEmpNo" name="hidden_fkEmpNo">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 35%;">Control Number</span>
                                    <p class="form-control" type="text" name="view_conno" id="view_text_conno"></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Date Filed</span>
                                    <p class="form-control" type="date" name="view_current_date" id="view_text_current_date"></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <p class="fw-bold">Request Details</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Department</span>
                                    <p class="form-control" type="text" name="view_department" id="view_text_department"></p>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Section</span>
                                    <p class="form-control" type="text" name="view_section" id="view_text_section"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Job Function</span>
                                    <p class="form-control" type="text" name="view_job_function" id="view_text_job_function"></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Area/Line Allocation</span>
                                    <p class="form-control" type="text" name="view_area_line" id="view_text_area_line"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 17.2%;">Reason</span>
                                    <p class="form-control" type="text" name="view_reason" id="view_text_reason"></p>
                                </div>
                            </div>
                        </div> <hr>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="view_tbl_training_request" >
                                <thead class="table-primary">
                                    <tr>
                                    <th>Date Hired</th>
                                    <th>Employee No.</th>
                                    <th>Name</th>
                                    <th>Position/Dept./Section</th>
                                    <th>From Station/Production</th>
                                    <th>To Station/Production</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Requestor</span>
                                    <p type="text" class="form-control" id="view_text_requestor" name="view_requestor"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Section Head</span>
                                    <p class="form-control" name="view_approver" id="view_text_approver"></p>
                                    <p class="form-control" style="display: none;" id="view_text_email" name="view_email"></p>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Training Request -->
        <div class="modal fade" id="editRequestTrainee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Edit Training Request Form</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formEditTrainingRequest" autocomplete="off">

                            <input type="hidden" id="text_edit_TRpkid" name="edit_TRpkid">
                            <input type="hidden" id="text_conform_hidden_status" name="conform_hidden_status">
                            <input type="hidden" id="text_receive_hidden_status" name="receive_hidden_status">
                            <input type="hidden" id="text_approve_hidden_status" name="approve_hidden_status">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 35%;">Control Number</span>
                                        <input class="form-control" type="text" name="edit_conno" id="edit_text_conno" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Current Date</span>
                                        <input class="form-control" type="date" name="edit_current_date" id="edit_text_current_date" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <p class="fw-bold">Request Details</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Department</span>
                                        <input class="form-select" type="text" name="edit_department" id="edit_text_department" list="list_department" placeholder="Select department" required>
                                        <datalist id="list_department">
                                            
                                        </datalist>
                                        <!-- <select class="form-select" type="text" name="edit_department" id="edit_text_department">
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="PPS">PPS</option>
                                            <option value="CN">CN</option>
                                            <option value="YF">YF</option>
                                            <option value="TS">TS</option>
                                        </select> -->
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Section</span>
                                        <input class="form-select" type="text" name="edit_section" id="edit_text_section" list="list_section" placeholder="Select section" required>
                                        <datalist id="list_section">

                                        </datalist>
                                        <!-- <select class="form-select" type="text" name="edit_section" id="edit_text_section">
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Production">Production</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="PPC">PPC</option>
                                            <option value="LQC">LQC</option>
                                        </select> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Job Function</span>
                                        <select class="form-select" type="text" name="edit_job_function" id="edit_text_job_function">
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Operator">Operator</option>
                                            <option value="Material Handler">Material Handler</option>
                                            <option value="Inspector">Inspector</option>
                                            <option value="Technician">Technician</option>
                                            <option value="Engineer">Engineer</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Clerk">Clerk</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Area/Line Allocation</span>
                                        <select class="form-select" type="text" name="edit_area_line" id="edit_text_area_line">
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Automotive Line">Automotive Line</option>
                                            <option value="Non-automotive Line">Non-automotive Line</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 17.2%;">Reason</span>
                                        <select class="form-select" type="text" name="edit_reason" id="edit_text_reason" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Newly Hired">Newly Hired</option>
                                            <option value="Maternity Leave">Maternity Leave</option>
                                            <option value="Sick Leave">Sick Leave</option>
                                            <option value="Vacation Leave">Vacation Leave</option>
                                            <option value="Promoted">Promoted</option>
                                            <option value="Transferred">Transferred</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <hr>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="edit_tbl_training_request" >
                                    <thead class="table-primary">
                                        <tr>
                                        <th>Action</th>
                                        <th>Date Hired</th>
                                        <th>Employee No.</th>
                                        <th>Name</th>
                                        <th>Position/Dept./Section</th>
                                        <th>From Station/Production</th>
                                        <th>To Station/Production</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Requestor</span>
                                        <input type="text" class="form-control" id="edit_text_requestor" name="edit_requestor" readonly>
                                        <input type="hidden" class="form-control" id="edit_text_requestor_email" name="edit_requestor_email" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Section Head</span>
                                        <input class="form-select" name="edit_approver" id="edit_text_approver" list="edit_approver">
                                            <datalist id="edit_approver">

                                            </datalist>
                                        <input type="hidden" class="form-control" id="edit_text_email" name="edit_email" value="email" readonly>
                                    </div>
                                </div>

                                <!-- Edited 1-14-25 -->
                                <input type="hidden" class="form-control" id="edit_hidden_docno" name="edit_hidden_docno" readonly placeholder="FKDocNo.">

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btnEditTrainingRequest"><i class="fa-solid fa-file-import me-2" style="color: white"></i>SUBMIT</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal View Revision Remarks -->
        <div class="modal fade" id="modalViewRevisionRemarks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Revision Remarks</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="view_revision_remarks" id="text_view_revision_remarks" readonly></textarea>
                            <label for="text_view_revision_remarks">Comments</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal View Disapprove Reason -->
        <div class="modal fade" id="modalViewDisapproveReason" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Reason for Disapproval</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="view_disapprove_reason" id="text_view_disapprove_reason" readonly></textarea>
                            <label for="text_view_disapprove_reason">Comments</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {

    $('#request').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active');
            $('#headerTitle').text('Training Request');
            $('#url_title').text('Training Request');
        }
        else {
            $(this).removeClass('active');
        }
    });

    // FUNCTION TO DISPLAY CARD BASED ON THE TRAINING REQUEST STATUS
    $('#training_approval').on('change', function () {
        let t_value = parseInt($(this).val());

        // Hide all cards
        $('#tbl_view_all, #tbl_conformance, #tbl_receiving, #tbl_qc_head').addClass('d-none');

        // Show the selected card based on the value
        if (t_value === 1) {
            $('#tbl_conformance').removeClass('d-none');
        } else if (t_value === 2) {
            $('#tbl_receiving').removeClass('d-none');
        } else if (t_value === 3) {
            $('#tbl_qc_head').removeClass('d-none');
        } else if (t_value === 4) {
            $('#tbl_view_all').removeClass('d-none');
        }
    });

    // DATATABLE TO VIEW ALL
    let dataTablesTrainingRequest = $('#tbl_request_list').DataTable({
        "aaSorting"	 : [],
        "bProcessing": true,
        "bServerSide": true,
        "destroy": true,
        "sAjaxSource": "./server_side_scripts/request.php",
        "drawCallback": function( settings ) {
            $('#tbl_request_list').attr('style','width:100%;');
        }
    });

    // Datatable for conformance
    function c_initializeDataTable(tableId, status) {
        return $(tableId).DataTable({
            "aaSorting": [],
            "bProcessing": true,
            "bServerSide": true,
            "destroy": true,
            "sAjaxSource": "./server_side_scripts/conformance_TU.php",
            "fnServerParams": function (aoData) {
                aoData.push({ "name": "status", "value": status });
            },
            "drawCallback": function (settings) {
                $(tableId).attr('style', 'width:100%;');
            }
        });
    }

    // Initialize DataTables for different statuses
    let c_tblApproval = c_initializeDataTable('#c_tbl_approval', 0); // For Approval
    let c_tblRevision = c_initializeDataTable('#c_tbl_revision', 2); // For Revision
    let c_tblApproved = c_initializeDataTable('#c_tbl_approved', 1); // Approved
    let c_tblDisapproved = c_initializeDataTable('#c_tbl_disapproved', 3); // Disapproved

    // datatable for receiving
    function r_initializeDataTable(tableId, status) {
        return $(tableId).DataTable({
            "aaSorting": [],
            "bProcessing": true,
            "bServerSide": true,
            "destroy": true,
            "sAjaxSource": "./server_side_scripts/receiving_TU.php",
            "fnServerParams": function (aoData) {
                aoData.push({ "name": "status", "value": status });
            },
            "drawCallback": function (settings) {
                $(tableId).attr('style', 'width:100%;');
            }
        });
    }

    // Initialize DataTables for different statuses
    let r_tblApproval = r_initializeDataTable('#r_tbl_approval', 0); // For Approval
    let r_tblRevision = r_initializeDataTable('#r_tbl_revision', 2); // For Revision
    let r_tblApproved = r_initializeDataTable('#r_tbl_approved', 1); // Approved
    let r_tblDisapproved = r_initializeDataTable('#r_tbl_disapproved', 3); // Disapproved

    // DATATABLE FOR QC HEAD
    function q_initializeDataTable(tableId, status) {
        return $(tableId).DataTable({
            "aaSorting": [],
            "bProcessing": true,
            "bServerSide": true,
            "destroy": true,
            "sAjaxSource": "./server_side_scripts/qc_head_TU.php",
            "fnServerParams": function (aoData) {
                aoData.push({ "name": "status", "value": status });
            },
            "drawCallback": function (settings) {
                $(tableId).attr('style', 'width:100%;');
            }
        });
    }

    // Initialize DataTables for different statuses
    let q_tblApproval = q_initializeDataTable('#q_tbl_approval', 0); // For Approval
    let q_tblRevision = q_initializeDataTable('#q_tbl_revision', 2); // For Revision
    let q_tblApproved = q_initializeDataTable('#q_tbl_approved', 1); // Approved
    let q_tblDisapproved = q_initializeDataTable('#q_tbl_disapproved', 3); // Disapproved

    let handler = "./handler/handler.php";

    let requestor = $('#textrequestor').val();

    function getRequestor(){
        let getTRDSUserInfo = {
            "action": "get_trds_user_info",
            "userUsername": requestor
        };
        $.ajax({
            type: "POST",
            url: handler,
            data: getTRDSUserInfo,
            dataType: "json",
            success: function (response) {
                $('#text_requestor_email').val(response.email);
                $('#edit_text_requestor_email').val(response.email);

                $('#textrequestorname').val(response.EmpName);

            }
        });
    }
    getRequestor();

    // GENERATE CONTROL NUMBER
    function generateControlNumber(counter) {
        let now = new Date();
        let month = (now.getMonth() + 1).toString().padStart(2, '0');
        let day = now.getDate().toString().padStart(2, '0');
        let year = now.getFullYear().toString().slice(-2);

        // Generate control number in YYMM-XXXX format
        let controlNumber = `${year}${month}-${counter.toString().padStart(4, '0')}`;

        // Update the control number field
        $('#textconno').val('TU-' + controlNumber);
    }

    // FETCH LAST CONTROL NUMBER FROM THE DATABASE
    function fetchLastConNumber() {
        $.ajax({
            url: handler,
            method: 'POST',
            data: {
                action: 'get_last_conno'
            },
            success: function(response) {
                // Try to parse the response to an integer
                let lastCounter = parseInt(response);

                // Check if the response is a valid number
                if (!isNaN(lastCounter)) {
                    let nextCounter = lastCounter + 1;

                    // Generate and set the next control number
                    generateControlNumber(nextCounter);
                } else {
                    console.error("Invalid response for control number:", response);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching document number:", error);
            }
        });
    }

    fetchLastConNumber();

    let today = new Date().toISOString().split('T')[0];
    $('#current_date').val(today);

    // *********************************************************************************************************************

    let tblTrainReqEmp = $('#tbl_training_request').DataTable();
    let tblSelectedTrainee = $('#tblSelectedTrainee').DataTable();
    // Initialize the DataTable with columnDefs to hide the "Action" column
    let tblEditTrainReq = $('#edit_tbl_training_request').DataTable({
        columnDefs: [
            {
                targets: 0,  // The index of the "Action" column
                visible: false  // Set visibility to false to hide this column
            }
        ],
        responsive: true,
        // Other DataTable options if you have any, like pagination, searching, etc.
    });
    let tblManGenKnow = $('#tblManualGeneralKnowledge').DataTable();

    // SHOW RECORDS FROM tbl_training_request
    // let dataTablesTrainingRequest = $('#tblRequestTraining').DataTable({
    //     "aaSorting"	 : [],
    //     "bProcessing": true,
    //     "bServerSide": true,
    //     "sAjaxSource": "./server_side_scripts/request.php",
    //     "drawCallback": function( settings ) {
    //         $('#tblRequestTraining').attr('style','width:100%;');
    //     }
    // });

    function checktblTrainingRequest(){
        // Check the number of rows in the DataTable instance
        if (tblTrainReqEmp.rows().count() === 0) {
            alert('The table cannot be empty. Please leave at least one trainee.');
            $('#text_req_doc_no').val('');  // Clear the text box

            // $('#text_from_station').val('');
            // $('#text_from_product').val(''); 
            // $('#text_to_station').val(''); 
            // $('#text_to_product').val(''); 

            return;
        }
    }

    // Removing a specific row from the table
    $('#tbl_training_request tbody').on('click', '.btn_remove_emp', function () {
        let row = $(this).closest('tr');

        if(confirm('Are you sure you want to remove this trainee?')){
            // Remove the row using DataTables' row().remove() method
            tblTrainReqEmp.row(row).remove().draw(false);  // Use draw(false) to keep the pagination state

            let empToRemove = row.find('td').eq(0).text();  // Get the employee number from the first column
            console.log('Employee removed: ' + empToRemove);  // Debugging, you can handle the removal here (e.g., server-side removal)
        }

        checktblTrainingRequest();

    });

    

    // Function to check if the DataTable is empty and clear hidden_docno
    function checkSelectedTraineeTable() {
        let rowCount = tblSelectedTrainee.rows().count();

        if (rowCount === 0) {
            $('#hidden_docno').val('');
            console.log('Table is empty. Hidden Document Number cleared.');
            return;
        }
    }

    // Event handler for removing a row
    $('#tblSelectedTrainee tbody').on('click', '.btnRemoveSelectedTrainee', function () {
        let row = $(this).closest('tr');

        if(confirm('Are you sure you want to remove this trainee?')){
            // Remove the row using DataTables' row().remove() method
            tblSelectedTrainee.row(row).remove().draw(false); // Use draw(false) to keep the pagination state

            let empToRemove = row.find('td').eq(0).text(); // Get the employee number from the first column
            console.log('Employee removed:', empToRemove); // Debugging

            // Check if the table is now empty
            checkSelectedTraineeTable();
        }
    });



    // DISPLAYS AVAILABLE DOCNO INSIDE DATALIST
    function getDataListDocNo(){
    // DITO DITO
        let doc_no = {
            "action": "display_doc_no",
        }
        doc_no = $.param(doc_no) + "&" + $('#req_doc_no').serialize();

        $.ajax({
            type: "POST",
            url: handler,
            data: doc_no,
            dataType: "json",
            success: function (response) {
                let dataList = $('#req_doc_no');
                dataList.empty();
                $.each(response, function(index, value) {
                    dataList.append('<option value="' + value + '"></option>');
                });
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
            }
        });
    }

    getDataListDocNo();

    // Fetch and display employees for the selected doc number
    $('#text_req_doc_no').on('change', function () {
        let req_docno = $(this).val();

        $.ajax({
            type: "POST",
            url: handler,
            data: {
                action: "get_req_emp",
                req_docno: req_docno
            },
            dataType: "json",
            success: function(response) {
                tblTrainReqEmp.clear().draw();  // Clear the table before adding new data

                $.each(response, function(index, value) {
                    // Add each row using DataTables' `row.add()` method
                    tblTrainReqEmp.row.add([
                        `<button value='${value.empNo}' class='btn_remove_emp btn btn-danger'>Remove</button>`,
                        value.empNo,
                        value.fullname,
                        value.date_hired,
                        value.pds,
                        value.title,

                        // Edited 12-16-24
                        value.result,

                        value.remarks,

                        // Edited 12-23-24
                        // value.fromto,
                        
                        value.venue,
                        value.endorsementDate

                    ]).draw(false);  // Use `draw(false)` to avoid resetting the pagination
                });
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' ' + error);
            }
        });
    });

    // CLEARS THE tblTrainReqEmp IF text_req_doc_no IS EMPTY
    $('#text_req_doc_no').on('input', function () {
        let check_docno = $(this).val();

        if(check_docno === ''){
            tblTrainReqEmp.clear().draw()
        }
    });

    // ADDING THE SELECTED TRAINEES TO tblSelectedTrainee
    $('#btnAddTrainingEmp').on('click', function () {

        let docno = $('#text_req_doc_no').val();
        let hiddenDocno = $('#hidden_docno').val();
        
        // Edited 12-10-24
        let manualEmpNo = $('#text_empno').val().trim();
        let manualFullName = $('#text_manual_fullname').val().trim();
        let manualVenue = $('#text_manual_venue').val().trim();
        let manualEndoDate = $('#text_manual_endorsement_date').val();

        let selected_trainee = tblTrainReqEmp.rows().data();
        let fromStation = $('#text_from_station').val().trim();
        let fromProduct = $('#text_from_product').val().trim();
        let toStation = $('#text_to_station').val().trim();
        let toProduct = $('#text_to_product').val().trim();

        let fromConcat = fromStation + ' / ' +  fromProduct;
        let toConcat = toStation + ' / ' +  toProduct;

        if(!fromStation || !fromProduct || !toStation || !toProduct){
            alert('Please fill up all the fields!');
            return;
        }

        if(tblTrainReqEmp.rows().data().length === 0){
            alert("You haven't add any trainees yet.");
            return;
        }

        if(docno === hiddenDocno){
            alert('This HR Memo is already added!');
            tblTrainReqEmp.clear().draw();
            
            $('#text_req_doc_no').val('');

            tblTrainReqEmp.clear().draw();
            $('#text_empno').val('');
            $('#text_manual_fullname').val('');
            $('#text_manual_date_hired').val('');
            $('#text_manual_pds').val('');

            // Edited 12-10-24
            $('#text_manual_venue').val('');
            $('#text_manual_endorsement_date').val('');

            $('#text_from_station').val('');
            $('#text_from_product').val('');
            $('#text_to_station').val('');
            $('#text_to_product').val('');
            return;
        }

        if (tblSelectedTrainee.rows().data().length > 0) {
            alert('You can not add 2 different HR Memo in one Training Request.');
            tblTrainReqEmp.clear().draw();
            $('#text_req_doc_no').val('');

            tblTrainReqEmp.clear().draw();
            $('#text_empno').val('');
            $('#text_manual_fullname').val('');
            $('#text_manual_date_hired').val('');
            $('#text_manual_pds').val('');

            // Edited 12-10-24
            $('#text_manual_venue').val('');
            $('#text_manual_endorsement_date').val('');

            $('#text_from_station').val('');
            $('#text_from_product').val('');
            $('#text_to_station').val('');
            $('#text_to_product').val('');
            return;
        }

        if(docno === $('#hidden_docno').val()){
            alert('This document number is already added!');

            tblTrainReqEmp.clear().draw();
            $('#text_req_doc_no').val('');

            tblTrainReqEmp.clear().draw();
            $('#text_empno').val('');
            $('#text_manual_fullname').val('');
            $('#text_manual_date_hired').val('');
            $('#text_manual_pds').val('');

            // Edited 12-10-24
            $('#text_manual_venue').val('');
            $('#text_manual_endorsement_date').val('');

            $('#text_from_station').val('');
            $('#text_from_product').val('');
            $('#text_to_station').val('');
            $('#text_to_product').val('');       

            return;
        }    

        if(docno){
            $.each(selected_trainee, function (index, rowData) {
                tblSelectedTrainee.row.add([
                    '<center><button type="button" class="btn btn-danger btnRemoveSelectedTrainee">Remove</button></center>',
                    rowData[3],
                    rowData[1],
                    rowData[2],
                    rowData[4],
                    rowData[5],
                    rowData[6],
                    rowData[7],

                    // Edited 12-16-24
                    rowData[8],

                    fromConcat,
                    toConcat,
                    rowData[9],
                    rowData[10]
                ]).draw(false);
            });
            toastr.success('Successfully Added!');
            $('#formAddTrainingEmp')[0].reset();
            $('#hidden_docno').val(docno);
            tblTrainReqEmp.clear().draw();
            $('#requestEmployee').modal('hide');
            $('#newTraineeModal').modal('show');
        }else{
            alert('Please fill up all the fields!');
        }
    });

    

    // OLD ADD TRAINING REQUEST
    // $('#formAddTrainingRequest').submit(function (e) {
    //     e.preventDefault();

    //     let TRData = [];

    //     let TRdepartment = $('#textdepartment').val();
    //     let TRsection = $('#textsection').val();
    //     let TRjobfunction = $('#textjob_function').val();
    //     let TRarealine = $('#textarea_line').val();
    //     let TRreason = $('#textreason').val();
    //     let TRapprover = $('#textapprover').val();
    //     let hiddenDocno = $('#hidden_docno').val();

    //     tblSelectedTrainee.rows().every(function () {
    //         let TRRowData = this.data();
    //         TRData.push({
    //             fkdate_hired: TRRowData[1].trim(),
    //             fkdocno: TRRowData[2].trim(),
    //             fkEmpNo: TRRowData[3].trim(),
    //             fkfullname: TRRowData[4].trim(),
    //             fkpds: TRRowData[5].trim(),
    //             fktitle: TRRowData[6].trim(),
    //             fkremarks: TRRowData[7].trim(),
    //             from_station_prod: TRRowData[8].trim(),
    //             to_station_prod: TRRowData[9].trim()
    //         });
    //     });

    //     if (!TRdepartment || !TRsection || !TRjobfunction || !TRarealine || !TRreason || !TRapprover || TRData.length === 0) {
    //         alert('Please fill up all required fields!');
    //     } else {

    //         // Data to send for adding training request
    //         let add_train_req = {
    //             "action": "add_training_request",
    //             "rows": TRData,
    //             "docno": hiddenDocno
    //         };

    //         add_train_req = $.param(add_train_req) + "&" + $('#formAddTrainingRequest').serialize();

    //         // First AJAX call for 'add_training_request'
    //         $.ajax({
    //             type: "POST",
    //             url: handler,  // Assuming this URL handles both requests
    //             data: add_train_req,
    //             dataType: "json",
    //             success: function (response) {
    //                 if (response.result) {

    //                     toastr.success('New Request Added!');

    //                     // Now call update_memo_status once the training request is successful
    //                     $.ajax({
    //                         type: "POST",
    //                         url: handler,  // Same handler, but with action 'update_memo_status'
    //                         data: {
    //                             action: "update_memo_status",
    //                             docno: hiddenDocno
    //                         },
    //                         dataType: "json",
    //                         success: function (memoResponse) {
    //                             if (memoResponse.result) {
    //                                 // alert('Memo status successfully updated!');
    //                             } else {
    //                                 alert('Failed to update memo status.');
    //                             }
    //                         },
    //                         error: function () {
    //                             alert('Error in updating memo status.');
    //                         }
    //                     });

    //                     // Reset the form and tables
    //                     $('#newTraineeModal').modal('hide');
    //                     $('#formAddTrainingRequest')[0].reset();
    //                     tblSelectedTrainee.clear().draw();
    //                     dataTablesTrainingRequest.draw();
    //                     fetchLastConNumber();
    //                 } else {
    //                     alert('Failed to add training request.');
    //                 }
    //             },
    //             error: function () {
    //                 alert('Error in adding training request.');
    //             }
    //         });
    //     }
    // });

    // NEW ADD TRAINING REQUEST
    $('#formAddTrainingRequest').submit(function (e) {
        e.preventDefault();

        let conno = $('#textconno').val().trim();
        let docno = $('#hidden_docno').val().trim();

        let tr_department = $('#textdepartment').val().trim();
        let tr_section = $('#textsection').val().trim();
        let tr_job_function = $('#textjob_function').val();
        let tr_area_line = $('#textarea_line').val();
        let tr_reason = $('#textreason').val();
        let tr_approver = $('#textapprover').val().trim();

        if(!tr_department || !tr_section || tr_job_function === "0" || tr_area_line === "0" || tr_reason === "0" || !tr_approver){
            alert('Please fill up all the fields!');
            return;
        }

        if (!conno) {
            alert('Control Number is required!');
            return false;
        }

        $.ajax({
            type: "POST",
            url: handler,
            data: { 
                action: "check_conno", 
                checkConNum: conno,
                checkDocNum: docno
            },
            dataType: "json",
            success: function (response) {
                if (response.conno && response.fkdocno) {
                    alert("Invalid Control Number and Document Number. Please reload the page."); 
                    return false;
                } 
                if (response.conno) {
                    alert("Invalid Control Number. Please reload the page."); 
                    return false;
                } 
                if (response.fkdocno) {
                    alert("Invalid Document Number. Please reload the page.");
                    return false;
                }

                // Proceed with form submission if no conflicts are found
                submitTrainingRequest();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error checking Control Number:", textStatus, errorThrown);
                alert("An error occurred while checking the Control Number.");
            }
        });
    });



    function submitTrainingRequest() {
        let TRData = [];

        let TRdepartment = $('#textdepartment').val();
        let TRsection = $('#textsection').val();
        let TRjobfunction = $('#textjob_function').val();
        let TRarealine = $('#textarea_line').val();
        let TRreason = $('#textreason').val();
        let TRapprover = $('#textapprover').val();
        let hiddenDocno = $('#hidden_docno').val();

        tblSelectedTrainee.rows().every(function () {
            let TRRowData = this.data();
            TRData.push({
                fkdate_hired: TRRowData[1].trim(),
                // fkdocno: TRRowData[2].trim(),
                fkEmpNo: TRRowData[2].trim(),
                fkfullname: TRRowData[3].trim(),
                fkpds: TRRowData[4].trim(),
                fktitle: TRRowData[5].trim(),

                // Edited 12-16-24
                fkresult: TRRowData[6].trim(),
                
                fkremarks: TRRowData[7].trim(),

                // Edited 12-23-24
                // training_dates: TRRowData[8].trim(),

                venue: TRRowData[8].trim(),
                from_station_prod: TRRowData[9].trim(),
                to_station_prod: TRRowData[10].trim(),
                endorsement_date: TRRowData[11].trim()

            });
        });

        if (!TRdepartment || !TRsection || !TRjobfunction || !TRarealine || !TRreason || !TRapprover || TRData.length === 0) {
            alert('Please fill up all required fields!');
        } else {

            // Data to send for adding training request
            let add_train_req = {
                "action": "add_training_request",
                "rows": TRData,
                "docno": hiddenDocno
            };

            add_train_req = $.param(add_train_req) + "&" + $('#formAddTrainingRequest').serialize();

            // First AJAX call for 'add_training_request'
            $.ajax({
                type: "POST",
                url: handler,  // Assuming this URL handles both requests
                data: add_train_req,
                dataType: "json",
                success: function (response) {
                    if (response.result) {
                        send_email();
                        getDataListDocNo();
                        getRequestor();
                        toastr.success('New Request Added!');

                        // Now call update_memo_status once the training request is successful
                        $.ajax({
                            type: "POST",
                            url: handler,  // Same handler, but with action 'update_memo_status'
                            data: {
                                action: "update_memo_status",
                                docno: hiddenDocno
                            },
                            dataType: "json",
                            success: function (memoResponse) {
                                if (memoResponse.result) {
                                    // alert('Memo status successfully updated!');
                                } else {
                                    alert('Failed to update memo status.');
                                }
                            },
                            error: function () {
                                alert('Error in updating memo status.');
                            }
                        });

                        // Reset the form and tables
                        $('#newTraineeModal').modal('hide');
                        $('#formAddTrainingRequest')[0].reset();
                        tblSelectedTrainee.clear().draw();
                        dataTablesTrainingRequest.draw();
                        
                        c_tblApproval.draw();
                        c_tblRevision.draw();
                        c_tblApproved.draw();
                        c_tblDisapproved.draw();

                        r_tblApproval.draw();
                        r_tblRevision.draw();
                        r_tblApproved.draw();
                        r_tblDisapproved.draw();

                        q_tblApproval.draw();
                        q_tblRevision.draw();
                        q_tblApproved.draw();
                        q_tblDisapproved.draw();
                        fetchLastConNumber();
                        $('#current_date').val(today);

                    } else {
                        alert('Failed to add training request.');
                    }
                },
                error: function () {
                    alert('Error in adding training request.');
                }
            });
        }
    }

    $(document).on('click', '.btn_view', function () {
        
        let view_pkid = $(this).data('pkid');
        let view_conno = $(this).data('conno');
        let view_date_filed = $(this).data('date_filed');
        let view_department = $(this).data('department');
        let view_section = $(this).data('section');
        let view_job_function = $(this).data('job_function');
        let view_area_line = $(this).data('area_line');
        let view_reason = $(this).data('reason');
        let view_fkEmpNo = $(this).data('fkEmpNo');
        let view_from_station_prod = $(this).data('from_station_prod');
        let view_to_station_prod = $(this).data('to_station_prod');
        let view_requestor = $(this).data('requestor');
        let view_approver = $(this).data('approver');
        let view_email = $(this).data('email');

        $('#text_TRpkid').val(view_pkid);
        $('#view_text_conno').text(view_conno);
        $('#view_text_current_date').text(view_date_filed);
        $('#view_text_department').text(view_department);
        $('#view_text_section').text(view_section);
        $('#view_text_job_function').text(view_job_function);
        $('#view_text_area_line').text(view_area_line);
        $('#view_text_reason').text(view_reason);
        $('#view_text_requestor').text(view_requestor);
        $('#view_text_approver').text(view_approver);
        $('#view_text_email').text(view_email);

        $.ajax({
            type: "POST",
            url: handler,
            data: {
                action: "get_trainee_req",
                TR_conno: view_conno,
                TR_fkEmpNo: view_fkEmpNo
            },
            dataType: "json",
            success: function (response) {
                let tableViewTrainReq = $('#view_tbl_training_request tbody');
                tableViewTrainReq.empty();

                $.each(response, function (index, value) { 
                    tableViewTrainReq.append(`
                        <tr>
                            <td>${value.fkdate_hired}</td>
                            <td>${value.fkEmpNo}</td>
                            <td>${value.fkfullname}</td>
                            <td>${value.fkpds}</td>
                            <td>${value.from_station_prod}</td>
                            <td>${value.to_station_prod}</td>
                        </tr>
                    `);
                });
            }
        });
    });

    // Event listener for edit button click
    $(document).on('click', '.btn_edit', function () {

        // Get data attributes
        let edit_pkid = $(this).data('pkid');
        let edit_conno = $(this).data('conno');
        let edit_date_filed = $(this).data('date_filed');
        let edit_department = $(this).data('department');
        let edit_section = $(this).data('section');
        let edit_job_function = $(this).data('job_function');
        let edit_area_line = $(this).data('area_line');
        let edit_reason = $(this).data('reason');
        let edit_fkEmpNo = $(this).data('fkEmpNo');
        let edit_from_station_prod = $(this).data('from_station_prod');
        let edit_to_station_prod = $(this).data('to_station_prod');
        let edit_requestor = $(this).data('requestor');
        let edit_approver = $(this).data('approver');
        let edit_email = $(this).data('email');
        let view_isConformed = $(this).data('conform_status');
        let view_isReceived = $(this).data('receive_status');
        let view_isHeadApproval = $(this).data('approve_status');

        // Edited 1-14-25
        let view_fkdocno = $(this).data('fkdocno');

        // alert(view_fkdocno);
        // console.log('view_fkdocno:', view_fkdocno);

        // Check conditions to show/hide "Action" column
        if (view_isConformed === 2 || view_isReceived === 2 || view_isHeadApproval === 2) {
            tblEditTrainReq.column(0).visible(true);
        } else {
            tblEditTrainReq.column(0).visible(false);
        }

        if (view_isConformed === 2 || view_isReceived === 2 || view_isHeadApproval === 2){
            $('#btnEditTrainingRequest').removeClass('d-none');
        } else {
            $('#btnEditTrainingRequest').addClass('d-none');
        }

        // Populate fields
        $('#text_edit_TRpkid').val(edit_pkid);
        $('#edit_text_conno').val(edit_conno);
        $('#edit_text_current_date').val(edit_date_filed);
        $('#edit_text_department').val(edit_department);
        $('#edit_text_section').val(edit_section);
        $('#edit_text_job_function').val(edit_job_function);
        $('#edit_text_area_line').val(edit_area_line);
        $('#edit_text_reason').val(edit_reason);
        $('#edit_text_requestor').val(edit_requestor);
        $('#edit_text_approver').val(edit_approver);
        $('#edit_text_email').val(edit_email);
        $('#text_conform_hidden_status').val(view_isConformed);
        $('#text_receive_hidden_status').val(view_isReceived);
        $('#text_approve_hidden_status').val(view_isHeadApproval);

        // Edited 1-14-25
        $('#edit_hidden_docno').val(view_fkdocno);

        // Fetch and populate the table data
        $.ajax({
            type: "POST",
            url: handler,
            data: {
                action: "get_trainee_req",
                TR_conno: edit_conno,
            },
            dataType: "json",
            success: function (response) {
                console.log(response); // Debug: Ensure correct structure
                tblEditTrainReq.clear();
                $.each(response, function (index, value) {
                    tblEditTrainReq.row.add([
                        `<button id="btn_edit_remove" class="btn btn-danger fa-solid fa-trash btn_edit_remove" style="color:white"></button>`,
                        value.fkdate_hired,    // Correct field name
                        value.fkEmpNo,         // Correct field name
                        value.fkfullname,      // Correct field name
                        value.fkpds,           // Correct field name
                        value.from_station_prod, // Correct field name
                        value.to_station_prod    // Correct field name
                    ]).draw(false);
                });
            }
        });
    });

    // $('#edit_tbl_training_request tbody').on('click', '.btn_edit_remove', function () {

    //     let row = $(this).closest('tr');

    //     if(confirm('Are asdasd you sure you want to remove this trainee?')){
    //         // Remove the row using DataTables' row().remove() method
    //         tblEditTrainReq.row(row).remove().draw(false);  // Use draw(false) to keep the pagination state

    //         let empToRemove = row.find('td').eq(0).text();  // Get the employee number from the first column
    //         console.log('Employee removed: ' + empToRemove);  // Debugging, you can handle the removal here (e.g., server-side removal)
    //     }
    // });

    $('#edit_tbl_training_request tbody').on('click', '.btn_edit_remove', function (e) { 
        e.stopPropagation(); // Prevent event propagation
        e.preventDefault();  // Prevent default action (if any)

        let row = $(this).closest('tr');
        let remove_conno = $('#edit_text_conno').val(); // Retrieve the contract number
        let empToRemove = row.find('td').eq(2).text();  // Get the employee number from the 3rd column

        let rowCount = tblEditTrainReq.rows().count();

        // Prevent removing the last row in the table
        if (rowCount <= 1) {
            alert('The table cannot be empty. Please leave at least one trainee.');
            return;
        }

        if (confirm('Are you sure you want to remove this trainee?')) {
            // AJAX request to update logdel status in the database
            let remove_emp_edit = {
                "action": "tr_remove_emp_edit",
                "remove_edit_conno": remove_conno,
                "remove_edit_emp": empToRemove
            };

            $.ajax({
                type: "POST",
                url: handler,
                data: remove_emp_edit,
                dataType: "json",
                success: function (response) {
                    if (response.result) {
                        // Successfully removed in the database
                        tblEditTrainReq.row(row).remove().draw(false); // Remove row from DataTable without resetting pagination
                        console.log('Employee removed: ' + empToRemove);
                        // alert('Employee Removed!');
                        toastr.success('Successfully Removed!');
                        // Show the modal again if needed
                        // $('#editRequestTrainee').modal('show');
                    } else {
                        console.error('Failed to remove employee');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                }
            });
        }
    });


    // EDIT TRAINING REQUEST
    $('#formEditTrainingRequest').submit(function (e) { 
        e.preventDefault();

        let TREData = [];

        let TREdepartment = $('#edit_text_department').val().trim();
        let TREsection = $('#edit_text_section').val().trim();
        let TREjobfunction = $('#edit_text_job_function').val();
        let TREarealine = $('#edit_text_area_line').val();
        let TREreason = $('#edit_text_reason').val();
        let TREapprover = $('#edit_text_approver').val().trim();

        tblSelectedTrainee.rows().every(function () {
            let TRRowData = this.data();
            TREData.push({
                fkEmpNo: TRRowData[1].trim(),
                from_station_prod: TRRowData[4].trim(),
                to_station_prod: TRRowData[5].trim()
            });
        });

        // Check if any required fields are empty
        if (!TREdepartment || !TREsection || TREjobfunction === "0" || TREarealine === "0" || TREreason === "0" || !TREapprover) {
            alert('Please fill up all required fields!');
            return;
        } else {
            // Proceed if all required fields are filled
            let edit_train_req = {
                "action" : "edit_training_request",
                "rows" : TREData
            }

            edit_train_req = $.param(edit_train_req) + "&" + $('#formEditTrainingRequest').serialize();

            $.ajax({
                type: "POST",
                url: handler,
                data: edit_train_req,
                dataType: "json",
                success: function (response) {
                    edit_send_email();
                    // alert('Successfully Edited!');
                    getRequestor();
                    toastr.success('Successfully Edited!');

                    $('#editRequestTrainee').modal('hide');
                    $('#formEditTrainingRequest')[0].reset();
                    dataTablesTrainingRequest.draw();

                    c_tblApproval.draw();
                    c_tblRevision.draw();
                    c_tblApproved.draw();
                    c_tblDisapproved.draw();

                    r_tblApproval.draw();
                    r_tblRevision.draw();
                    r_tblApproved.draw();
                    r_tblDisapproved.draw();

                    q_tblApproval.draw();
                    q_tblRevision.draw();
                    q_tblApproved.draw();
                    q_tblDisapproved.draw();
                }
            });
        }
    });

    // DELETE TRAINING REQUEST
    $(document).on('click', '.btn_delete', function () {
        let delete_TR = $(this).data('conno');

        if (confirm("Are you sure you want to delete this request?")) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "delete_TR",
                    "conno": delete_TR
                },
                dataType: "json",
                success: function (response) {
                    if (response.result) {
                        dataTablesTrainingRequest.draw();

                        c_tblApproval.draw();
                        c_tblRevision.draw();
                        c_tblApproved.draw();
                        c_tblDisapproved.draw();

                        r_tblApproval.draw();
                        r_tblRevision.draw();
                        r_tblApproved.draw();
                        r_tblDisapproved.draw();

                        q_tblApproval.draw();
                        q_tblRevision.draw();
                        q_tblApproved.draw();
                        q_tblDisapproved.draw();
                    } else {
                        alert("Error deleting the request.");
                    }
                },
                error: function () {
                    alert("An error occurred while deleting the request.");
                }
            });
        }
    });

    // GETTING APPROVER AND EMAIL
    // let requestor = $('#textrequestor').val();
    let approver = {
        "action"    : "get_approver",
        "requestor" : requestor
    };
    approver = $.param(approver) + "&" + $('#textapprover').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: approver,
        dataType: "json",
        success: function (response) {
            let dataList = $('#approver');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });

            // Event listener when user selects an approver from the input
            $('#textapprover').on('input', function () {
                let selectedApprover = $(this).val();

                $.ajax({
                    type: "POST",
                    url: handler,
                    data: {
                        "action": "get_approver_username",
                        "approverName": selectedApprover
                    },
                    dataType: "json",
                    success: function (response) {
                        $('#textemail').val(response[1]);
                        $('#text_approver_username').val(response[0]);
                    }
                });
                // let email = generateEmail(selectedApprover);
                // let trimmedApprover = removeMiddleName(selectedApprover);
                // $('#text_approver_name').val(trimmedApprover);
                // $('#textemail').val(email);
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    $('#textapprover').on('input', function () {
        let thisApprover = $(this).val();

        if(!thisApprover){
            $('#textemail').val('');
            return;
        }
    });

    // // Function to generate email based on approver's full name
    // function generateEmail(fullName) {
    //     let nameParts = fullName.split(' ');  // Split the name into parts
    //     let firstName = nameParts[0] || '';   // First name
    //     let middleName = nameParts[1] || '';  // Middle name (if exists)
    //     let lastName = nameParts[nameParts.length - 1] || '';  // Last name

    //     let email = firstName.charAt(0).toLowerCase(); // First letter of the first name
    //     if (middleName.length > 0) {
    //         email += middleName.charAt(0).toLowerCase(); // First letter of the middle name
    //     }
    //     email += lastName.toLowerCase();  // Full last name
    //     email += '@pricon.ph';  // Append the domain

    //     return email;
    // }

    // // Function to remove the middle initial or middle name from the value
    // function removeMiddleName(fullName) {
    //     let nameParts = fullName.split(' '); // Split the name into parts
    //     let firstName = nameParts[0] || '';  // First name
    //     let lastName = nameParts[nameParts.length - 1] || '';  // Last name (assumed last part)

    //     return `${firstName} ${lastName}`; // Return only first and last name
    // }

    // GETTING THE USERNAME EQUAL TO APPROVER NAME
    // $('#text_approver_name').on('change', function () {
    //     let approver = $(this).val();

    //     if(approver){
    //         $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             "action": "get_username",
    //             "textNotedBy": approver
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             console.log('Username: ', response);
    //             if(response.length > 0){
    //                 $('#text_approver_username').val(response);
    //             }else{
    //                 $('#text_approver_username').val('');
    //             }
    //             }
    //         });
    //     }
    // });

  $('#cbManual').change(function (e) { 
    e.preventDefault();

    if($(this).is(':checked')){
        $('#con_empno_input').removeClass('d-none');
        $('#text_req_doc_no').val('Manual');
        tblTrainReqEmp.clear().draw();
    }else{
        $('#con_empno_input').addClass('d-none');
        $('#text_req_doc_no').val('');
        $('#text_empno').val('');
        $('#text_manual_fullname').val('');
        $('#text_manual_pds').val('');
        $('#text_manual_date_hired').val('');
        $('#text_manual_title').val('');
        $('#text_manual_result').val('');

        // Edited 12-16-24
        $('#text_manual_remarks').val('');

        // Edited 12-23-24
        // $('#textTitleFromTo').val('');

        tblTrainReqEmp.clear().draw();

    }
    
  });

  // GETTING EMPLOYEE NO. FOR MANUAL ADDING
    let manual_empno = {
        "action": "display_empno",
    };
    manual_empno = $.param(manual_empno) + "&" + $('#text_empno').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: manual_empno,
        dataType: "json",
        success: function (response) {
            let dataList = $('#list_empno');
            dataList.empty();
            $.each(response, function(index, item) {
                // Use both EmpNo and FullName in the option value or label as needed
                dataList.append('<option value="' + item.EmpNo + '">' + item.FullName + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    // GETTING EMPLOYEE DETAILS BASE IN THE EMPLOYEE NUMBER
    $('#text_empno').on('change', function() {
        let empNo = $(this).val();

        if(empNo) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "get_employee",
                    "textEmpNo": empNo
                },
                dataType: "json",
                success: function(response) {
                    if(response.FullName) {
                        $('#text_manual_fullname').val(response.FullName);
                        $('#text_manual_pds').val(response.pds);
                        $('#text_manual_date_hired').val(response.DateHired);
                    } else {
                        $('#text_manual_fullname').val(''); 
                        $('#text_manual_pds').val('');
                        $('#text_manual_date_hired').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });

            $.ajax({
                type: "POST",
                url: "./handler/handler.php",
                data: {
                    "action": "display_general_knowledge",
                    "textEmpNo": empNo
                },
                dataType: "json",
                success: function(response) {
                    let dataList = $('#list_manual_title');
                    dataList.empty();
                    $.each(response, function(index, value) {
                        dataList.append('<option value="' + value + '"></option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        }
    });

    $('#text_empno').on('change', function() {
        let empNo = $(this).val();
        
        if(empNo) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "get_trainee",
                    "textEmpNo": empNo
                },
                dataType: "json",
                success: function(response) {
                    if(response.Remarks) {
                        $('#text_manual_venue').val(response.Venue);
                        // $('#textRemarks').val(response.Remarks);
                        // $('#textFromTo').val(response.fromto);
                    } else {
                        $('#text_manual_venue').val('');
                        // $('#textRemarks').val('');
                        // $('#textFromTo').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        }
    });

    // GETTING RESULT EQUAL TO GENERAL KNOWLEDGE
    $('#text_manual_title').on('change', function () {
        let generalKnow = $(this).val();
        let genKnowEmpNo = $('#text_empno').val();

        if (generalKnow && genKnowEmpNo) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "get_results",
                    "textTitle": generalKnow,
                    "textEmpNo": genKnowEmpNo,
                },
                dataType: "json",
                success: function (response) {
                    if (response.length > 0) {
                        $('#text_manual_result').val(response.join(', '));
                    } else {
                        $('#text_manual_result').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                }
            });
        }
    });
    
    // EDITED 12-3-24
    // GETTING TRAINING DATES EQUAL TO GENERAL KNOWLEDGE
    $('#text_manual_title').on('change', function () {
        let generalKnow = $(this).val();
        let genKnowEmpNo = $('#text_empno').val();

        if (generalKnow && genKnowEmpNo) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "get_training_dates",
                    "textTitle": generalKnow,
                    "textEmpNo": genKnowEmpNo,
                },
                dataType: "json",
                success: function (response) {
                    if (response.Result && response.fromto) {

                        // Edited 12-16-24
                        $('#text_manual_remarks').val(response.Remarks);

                        // Edited 12-23-24
                        // $('#textTitleFromTo').val(response.fromto);
                    } else {

                        // Edited 12-16-24
                        $('#text_manual_remarks').val('');

                        // Edited 12-23-24
                        // $('#textTitleFromTo').val('');

                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                }
            });
        }
    });

    // ADDING EMPLOYEE MANUALLY
    let manualEmpList = [];
    let knowledgeList = [];
    let resultList = [];

    // Edited 12-10-24
    $('#btnManualAddEmployee').click(function (e) { 
        e.preventDefault();

        let empNo = $('#text_empno').val();
        let fullname = $('#text_manual_fullname').val();
        let dateHired = $('#text_manual_date_hired').val();
        let pds = $('#text_manual_pds').val();
        let venue = $('#text_manual_venue').val();
        let endo_date = $('#text_manual_endorsement_date').val();

        // console.log("EmpNo:", empNo);
        // console.log("Fullname:", fullname);
        // console.log("Date Hired:", dateHired);
        // console.log("PDS:", pds);

        if(!endo_date){
            alert("Please add endorsement date.");
            return;
        }

        if(tblManGenKnow.rows().data().length === 0){
            alert("General Knowledge table is empty!");
            return;
        }

        // Check if required fields are filled (adjust as needed)
        if (empNo && fullname && dateHired) {

            // Check if employee number already exists in the table
            let empExists = false;
            $('#tbl_training_request tbody tr').each(function () {
                let existingEmpNo = $(this).find('td:eq(1)').text(); // Get empNo from the first column (index 0)
                if (existingEmpNo === empNo) {
                    empExists = true;
                    return false; // Exit the loop
                }
            });

            // If the employee number already exists, alert the user and prevent duplicate entry
            if (empExists) {
                alert('Employee with Employee Number "' + empNo + '" is already in the request table.');
                $('#text_empno').val('');
                $('#text_manual_fullname').val('');
                $('#text_manual_date_hired').val('');
                $('#text_manual_pds').val('');
                $('#text_manual_venue').val('');
                $('#text_manual_endorsement_date').val('');

                $('#text_manual_title').val('');
                $('#text_manual_result').val('');

                // Edited 12-16-24
                $('#text_manual_remarks').val('');

                // Edited 12-23-24
                // $('#textTitleFromTo').val('');

                knowledgeList.length = 0;

                tblManGenKnow.clear().draw();

                return;
            }

            // Create an object for this employee's details
            let employeeData = {
                empNo: empNo,
                fullname: fullname,
                dateHired: dateHired,
                pds: pds,
                venue: venue,
                endo_date: endo_date
            };

            // Store in an array of objects
            if (!window.employeeDataArray) {
                window.employeeDataArray = []; // Initialize if doesn't exist
            }

            // Add this employee's data to the global array
            window.employeeDataArray.push(employeeData);

            let formattedTitles = knowledgeList.map(item => item.gn_title).join(' | ');

            // Edited 12-23-24
            // let formattedFromTo = knowledgeList.map(item => item.gn_fromto).join(' | ');

            let formattedResults= knowledgeList.map(item => item.gn_result).join(' | ');

            // Edited 12-16-24
            let formattedRemarks= knowledgeList.map(item => item.gn_remarks).join(' | ');

            tblTrainReqEmp.row.add([
                '<center><button type="button" class="btn btn-danger btn_remove_manual_emp">Remove</button></center>',
                empNo,
                fullname,
                dateHired,
                pds,
                formattedTitles,
                formattedResults,

                // Edited 12-16-24
                formattedRemarks,

                // Edited 12-23-24
                // formattedFromTo,

                venue,
                endo_date

            ]).draw();

            toastr.success('Successfully Added!');

            // Clear input fields after adding
            $('#text_empno').val('');
            $('#text_manual_fullname').val('');
            $('#text_manual_date_hired').val('');
            $('#text_manual_pds').val('');
            $('#text_manual_title').val('');
            $('#text_manual_result').val('');

            // Edited 12-16-24
            $('#text_manual_remarks').val('');

            // Edited 12-23-24
            // $('#textTitleFromTo').val('');

            $('#text_manual_venue').val('');
            $('#text_manual_endorsement_date').val('');

            // Reset knowledge list
            knowledgeList.length = 0;

            tblManGenKnow.clear().draw();

            console.log('Stored employee data array:', window.employeeDataArray);
        } else {
            alert('Please fill out all required fields.');
        }
        
    });

    $('#btnSelect').click(function (e) { 
        e.preventDefault();

        let manual_title = $('#text_manual_title').val();
        let manual_result = $('#text_manual_result').val();

        // Edited 12-16-24
        let manual_remarks = $('#text_manual_remarks').val();

        // Edited 12-23-24
        // let manual_fromto = $('#textTitleFromTo').val();

        let manual_empNo = $('#text_empno').val();
        let manual_fullname = $('#text_manual_fullname').val();

        console.log('Title:', manual_title);
        console.log('Result:', manual_result);

        // Edited 12-16-24
        console.log('Remarks:', manual_remarks);

        // Edited 12-23-24
        // console.log('Training Dates:', manual_fromto);

        console.log('EmpNo:', manual_empNo);

        // Check if title or employee number is empty
        if (manual_empNo === '' || manual_fullname === '') {
            alert('Please enter an employee number first.');
            $('#text_manual_title').val('');
            $('#text_manual_result').val('');

            // Edited 12-16-24
            $('#text_manual_remarks').val('');

            // Edited 12-23-24
            // $('#textTitleFromTo').val('');
            return;
        }

        if (manual_title === '') {
            alert('Please select a title first.');
            return;
        }

        // Edited 12-23-24
        // if (manual_result === '' || manual_remarks === '' || manual_fromto === '') {
        //     alert('Loading data please wait.');
        //     return;
        // }

        if (manual_result === '' || manual_remarks === '') {
            alert('Loading data please wait.');
            return;
        }

        // Check if title already exists in the table
        let titleExists = false;
        $('#tblManualGeneralKnowledge tbody tr').each(function () {
            let existingTitle = $(this).find('td:eq(0)').text(); // Get the title from the first column (index 0)
            if (existingTitle === manual_title) {
                titleExists = true;
                return false; // Exit the loop
            }
        });

        // If the title already exists, alert the user
        if (titleExists) {
            alert('The title "' + manual_title + '" has already been added. Please select a different title.');
            $('#text_manual_title').val('');
            $('#text_manual_result').val('');

            // Edited 12-16-24
            $('#text_manual_remarks').val('');

            // Edited 12-23-24
            // $('#textTitleFromTo').val('');

            return;
        }

        // If title is new, add the entry
        let newEntry = {
            gn_title: manual_title,
            gn_result: manual_result,

            // Edited 12-16-24
            gn_remarks: manual_remarks,

            // Edited 12-23-24
            // gn_fromto: manual_fromto,

            gn_empNo: manual_empNo
        };

        knowledgeList.push(newEntry);

        tblManGenKnow.row.add([
            manual_title,
            manual_result,

            // Edited 12-16-24
            manual_remarks,

            // Edited 12-23-24
            // manual_fromto,

            '<center><button type="button" class="btn btn-warning btnRemoveGK">Remove</button></center>'
        ]).draw();

        // Clear input fields after adding
        $('#text_manual_title').val('');
        $('#text_manual_result').val('');

        // Edited 12-16-24
        $('#text_manual_remarks').val('');
        
        // Edited 12-23-24
        // $('#textTitleFromTo').val('');
        
    });

    // CLEARS FORM WHEN MODAL IS CLOSED
    $('#requestEmployee').on('hidden.bs.modal', function () {
        $('#con_empno_input').addClass('d-none');
        $('#text_req_doc_no').val(''); 
        
        // Edited 12-11-24
        $('#text_empno').val('');    
        $('#text_manual_fullname').val('');    
        $('#text_manual_date_hired').val('');    
        $('#text_manual_pds').val('');    
        $('#text_manual_venue').val('');    
        $('#text_manual_endorsement_date').val('');    
        $('#text_manual_title').val('');    
        $('#text_manual_result').val('');    

        // Edited 12-16-24
        $('#text_manual_remarks').val('');

        // Edited 12-23-24
        // $('#textTitleFromTo').val('');    

        tblManGenKnow.clear().draw();
        tblTrainReqEmp.clear().draw();

        $('#text_from_station').val('');    
        $('#text_from_product').val('');    
        $('#text_to_station').val('');    
        $('#text_to_product').val('');    

        $('#cbManual').prop('checked', false);
    });

    // CLEARING THE EMPLOYEE DETAILS IF THE EMPLOYEE NUMBER IS EMPTY
    $('#text_empno').on('input', function () {

        let check_empNo = $(this).val();

        if(check_empNo === ''){
            $('#text_empno').val('');
            $('#text_manual_fullname').val('');
            $('#text_manual_date_hired').val('');
            $('#text_manual_pds').val('');
            $('#text_manual_title').val('');
            $('#text_manual_result').val('');

            // Edited 12-16-24
            $('#text_manual_remarks').val('');

            // Edited 12-23-24
            // $('#textTitleFromTo').val('');

            tblManGenKnow.clear().draw();
        }
    });

    // CLEAR textResult WHEN textTitle IS EMPTY
    $('#text_manual_title').on('input', function () {
        let check_title = $(this).val();

        if(check_title === ''){
            $('#text_manual_result').val('');

            // Edited 12-16-24
            $('#text_manual_remarks').val('');

            // Edited 12-23-24
            // $('#textTitleFromTo').val('');
        }
    });

    // REMOVING ROW/S INSIDE tblGeneralKnowledge
    $('#tblManualGeneralKnowledge tbody').on('click', '.btnRemoveGK', function () {
        let row = $(this).closest('tr');

        if(confirm('Are you sure you want to remove this?')) {
            tblManGenKnow.row(row).remove().draw();

            // Get title to remove
            let titleToRemove = row.find('td').eq(0).text();

            // Remove the entry from knowledgeList based on the title
            knowledgeList = knowledgeList.filter(item => item.gn_title !== titleToRemove);
        }
    });

    // REMOVING ROW/S INSIDE tbl_request
    $('#tbl_training_request tbody').on('click', '.btn_remove_manual_emp', function () {
        let row = $(this).closest('tr');

        if(confirm('Are you sure you want to remove this trainee?')) {
            
            tblTrainReqEmp.row(row).remove().draw();
        
            let empNoManualToRemove = row.find('td').eq(0).text();
            window.employeeDataArray = window.employeeDataArray.filter(item => item.empNo !== empNoManualToRemove);
            
            console.log('Updated Employee Data Array:', window.employeeDataArray);
        }
    });

    $('#requestEmployee').on('hidden.bs.modal', function () {
        $('#newTraineeModal').modal('show');

    });

    // GETTING DEPARTMENT
    let get_department = {
        "action": "get_department",
    }
    get_department = $.param(get_department) + "&" + $('#textDepartment').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: get_department,
        dataType: "json",
        success: function (response) {
            let dataList = $('#list_department');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });
    // let get_department = {
    //     "action": "get_department",
    // };
    // get_department = $.param(get_department) + "&" + $('#textDepartment').serialize();

    // $.ajax({
    //     type: "POST",
    //     url: handler,
    //     data: get_department,
    //     dataType: "json",
    //     success: function (response) {
    //         let dataList = $('#list_department');
    //         dataList.empty();
    //         $.each(response, function(index, item) {
    //             // Append both Department and Section to the datalist option
    //             dataList.append('<option value="' + item.Department + '">' + '(' + item.Section + ')' + '</option>');
    //         });
    //     },
    //     error: function (xhr, status, error) {
    //         console.error('AJAX Error: ' + status + error);
    //     }
    // });

    // GETTING SECTION
    let get_section = {
        "action": "get_section",
    }
    get_section = $.param(get_section) + "&" + $('#textsection').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: get_section,
        dataType: "json",
        success: function (response) {
            let dataList = $('#list_section');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });


    // VIEW REVISION REMARKS AND DISAPPROVE REASON
    $(document).on('click', '.btnRevision', function () {
        let view_revision = $(this).data('revision_remarks');
        console.log(view_revision);
        $('#text_view_revision_remarks').val(view_revision);
    });

    $(document).on('click', '.btnReason', function () {
        let view_reason = $(this).data('disapprove_reason');
        console.log(view_reason);
        $('#text_view_disapprove_reason').val(view_reason);
    });

    // Function to send email
    // Edited 1-21-25
    function send_email(){

        let requestorEmail = $('#text_requestor_email').val();
        let emailTO = $('#textemail').val().split(',').map(email => email.trim()); // Split and trim emails
        // let emailCC = $('#staticEmails').val().split(',').map(email => email.trim()); // For Cc, split and trim
        let emailConno = $('#textconno').val();
        let emailFKDocno = $('#hidden_docno').val();
        let requestorName = $('#textrequestorname').val();

        $.ajax({
            url: handler,
            type: 'POST',
            data: {
                "action": "send_for_approval",
                "email_conno": emailConno,
                "email_fkdocno": emailFKDocno,
                "send_to": emailTO,
                // "cc_recipients": emailCC,
                "sent_from": requestorEmail,
                "user_fullname": requestorName
            },
            success: function (response) {
                console.log(`Email sent to all recipients:`, response);
                $('#result').append(`<div>Email sent to all recipients: ${response}</div>`);
            },
            error: function () {
                $('#result').append(`<div>Failed to send email to the recipients</div>`);
            }
        });
            
    }

    // Edited 1-21-25
    function edit_send_email(){

        let requestorEmail = $('#edit_text_requestor_email').val();
        let emailTO = $('#edit_text_email').val().split(',').map(email => email.trim()); // Split and trim emails
        // let emailCC = $('#staticEmails').val().split(',').map(email => email.trim()); // For Cc, split and trim
        let editTextConno = $('#edit_text_conno').val();
        let emailFKDocno = $('#edit_hidden_docno').val();

        $.ajax({
            url: handler,
            type: 'POST',
            data: {
                "action": "edit_send_for_approval",
                "email_conno": editTextConno,
                "email_fkdocno": emailFKDocno,
                "send_to": emailTO,
                // "cc_recipients": emailCC,
                "sent_from": requestorEmail
            },
            success: function (response) {
                console.log(`Email sent to all recipients:`, response);
                $('#result').append(`<div>Email sent to all recipients: ${response}</div>`);
            },
            error: function () {
                $('#result').append(`<div>Failed to send email to the recipients</div>`);
            }
        });
            
    }

// _______________________________________________________________________________________________________________________________________________

    // Prevent form submission on Enter key

    $('#formAddTrainingRequest').on('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
        }
    });

    $('#formEditTrainingRequest').on('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
        }
    });
  
});

</script>