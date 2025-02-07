<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">
        <!-- Header content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="margin-bottom: 80px;">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-top: 8px;">User</h3>
                                <button class="btn float-right reload"><i class="fas fa-sync-alt"></i></button>
                            </div>
                            <div class="card-body">
                                <!-- Sample Tabs -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-selected="true">User</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-selected="false">Profile</button>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card" style="margin-bottom: 80px">
                                                    <div class="card-body">
                                                        <div class="text-right mt-4">                   
                                                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#newTraineeModal"><i class="fa fa-plus fa-md"></i> Create Request</button>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table id="tableTrainee" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Control No.</th>
                                                                        <th>Date Filed</th>
                                                                        <th>Conformance</th>
                                                                        <th>Receiving</th>
                                                                        <th>QC Head Approval</th>
                                                                        <th class="text-center">Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                    
                                                                <tbody>
                                                                    <tr class="text-center">
                                                                        <td><span class="badge bg-success">TBA</span></td>
                                                                        <td>September 13, 2024</td>
                                                                        <td><span class="badge bg-info">ON-GOING</span></td>
                                                                        <td><span class="badge bg-secondary">QUEUED</span></td>
                                                                        <td><span class="badge bg-secondary">QUEUED</span></td>
                                                                        <td>
                                                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewTraineeModal"><i class="fa-solid fa-eye" style="color: white"></i></button>
                                                                            <button class="btn btn-danger"><i class="fa-solid fa-trash" style="color: white"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="profile" role="tabpanel">
                                        Profile content
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    

    <!-- Modal Add Memo -->
    <div class="modal fade" id="newTraineeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-info">
                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Training Request Form</h1>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="formAddMemo" autocomplete="off">

                        <div class="mb-3">
                            <p class="fw-bold">Request Details</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: #999999">Document Number</span>
                                    <input class="form-control" type="text" name="docno" id="textDocNo" readonly required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: #999999">Classification</span>
                                    <select class="form-select" type="text" name="classification" id="textClassification" required>
                                        <option value="0" selected disabled>Select One</option>
                                        <option value="">Direct</option>
                                        <option value="">Sub-Con</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: #999999">Reason</span>
                                    <select class="form-select" type="text" name="reason" id="textReason" required>
                                        <option value="0" selected disabled>Select One</option>
                                        <option value="">Newly Hired</option>
                                        <option value="">Maternity Leave</option>
                                        <option value="">Sick Leave</option>
                                        <option value="">Vacation Leave</option>
                                        <option value="">Promoted</option>
                                        <option value="">Transferred</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">To</span>
                                    <select class="form-select" type="text" name="to" id="textTo" required>
                                        <option value="0" selected disabled>Select One</option>
                                        <option value="">PPS</option>
                                        <option value="">CN</option>
                                        <option value="">YF</option>
                                        <option value="">TS</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">From</span>
                                    <input class="form-control" type="text" name="from" id="textFrom" value="HRS Training and Recruitment" readonly required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Subject</span>
                                    <input class="form-control" type="text" name="subject" id="textSubject" placeholder="Enter subject" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Current Date</span>
                                    <input class="form-control" type="date" name="date_now" id="date_now" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Department</span>
                                    <select class="form-select" type="text" name="department" id="textDepartment" required>
                                        <option value="0" selected disabled>Select One</option>
                                        <option value="">PPS</option>
                                        <option value="">CN</option>
                                        <option value="">YF</option>
                                        <option value="">TS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Section</span>
                                    <select class="form-select" type="text" name="section" id="textSection" required>
                                        <option value="0" selected disabled>Select One</option>
                                        <option value="">Production</option>
                                        <option value="">Engineering</option>
                                        <option value="">PPC</option>
                                        <option value="">LQC</option>
                                    </select>
                                </div>
                            </div>
                        </div> <hr>

                        <div class="mb-3">
                            <p class="fw-bold">Employee Details</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mt-2 mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Employee Number</span>
                                    <input class="form-control" id="textEmpNo" name="empNo" list="empNo" required>
                                    <datalist id="empNo">
                                    
                                    </datalist>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Employee Name</span>
                                    <input type="text" class="form-control" id="textFullName" name="fullname" required>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Date Hired</span>
                                    <input type="date" class="form-control" id="textDateHired" name="date_hired" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Position/Dept./Section</span>
                                    <input type="text" class="form-control" id="textpds" name="pds" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Training Dates</span>
                                    <input type="text" class="form-control" id="textFromTo" name="fromto" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: #999999">Training Venue</span>
                                    <input type="text" class="form-control" id="textVenue" name="venue" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Endorsement Date</span>
                                    <input type="date" class="form-control" id="textEndorsementDate" name="endorsementDate" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                <span class="input-group-text text-light" style="background-color: #999999">Theoretical Exam Results</span>
                                    <input type="text" class="form-control" id="textRemarks" name="remarks" required>
                                </div>
                            </div>
                        </div> <hr>

                        <div class="mb-3">
                            <p class="fw-bold">General Knowledge</p>
                        </div>

                        <div class="mb-3">
                            <table class="table table-bordered table-hover">
                                <thead class="table-secondary">
                                    <tr>
                                    <th>Topic</th>
                                    <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">Basic Job Knowledge</p>
                        </div>

                        <div class="mb-3">
                            <table class="table table-bordered table-hover">
                                <thead class="table-secondary">
                                    <tr>
                                    <th>Skills</th>
                                    <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        <hr>

                        <div class="d-flex justify-content-end mb-3">
                            <button type="submit" class="btn btn-info" id="btnAddEmployee"><i class="fa-solid fa-user-plus me-2" style="color: white"></i>ADD EMPLOYEE</button>
                        </div>
                        <div class="mb-3">
                            <table class="table table-bordered table-hover" id="tbl_request">
                                <thead class="table-secondary">
                                    <tr>
                                    <th>Date Hired</th>
                                    <th>Employee No.</th>
                                    <th>Name</th>
                                    <th>From (Station/Product Name)</th>
                                    <th>To (Station/Product Name)</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div> <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <!-- <span class="input-group-text text-light" style="background-color: #999999">Prepared By</span> -->
                                    <span class="input-group-text text-light" style="background-color: #999999">Requestor</span>
                                    <input type="text" class="form-control" id="textRequestor" name="requestor" value="automatic sino user" readonly required>
                                    <!-- <select class="form-select" name="preparedBy" id="preparedBy">
                                        <option value="0" selected disabled>Select One</option>
                                        <option value="">Joseph Cartagenas</option>
                                        <option value="">Patrick Ogalesco</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                <span class="input-group-text text-light" style="background-color: #999999">Approver</span>
                                    <!-- <span class="input-group-text text-light" style="background-color: #999999">Noted By</span> -->
                                    <select class="form-select" name="notedBy" id="notedBy" required>
                                        <option value="0" selected disabled>Select One</option>
                                        <option value="">Joseph Cartagenas</option>
                                        <option value="">Patrick Ogalesco</option>
                                    </select>
                                    <input type="text" class="form-control" id="textEmail" name="email" value="email" readonly required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="addNew"><i class="fa-solid fa-file-import me-2" style="color: white"></i>SUBMIT</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</div>
