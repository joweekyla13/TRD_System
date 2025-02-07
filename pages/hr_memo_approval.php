<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'USER';

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

        <!-- 11/27/2024 EDITED BY JOWEE -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#for_approval" type="button" role="tab" aria-selected="true">For Approval</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#for_revision" type="button" role="tab" aria-selected="false">Disapproved</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab" aria-selected="false">Approved</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <!-- <button class="nav-link" data-bs-toggle="tab" data-bs-target="#disapproved" type="button" role="tab" aria-selected="false">Disapproved</button> -->
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <!-- For Approval Tab Content -->
                                    <div class="tab-pane fade show active" id="for_approval" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <!-- <h4 class="fw-semibold text-secondary mb-3">Pending for TU Approval List</h4> -->
                                                        <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAddUser"><i class="fa fa-plus fa-md"></i> New User</button> -->
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table id="tbl_trainee" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Action</th>
                                                                    <th>Status</th>
                                                                    <th>Document Number</th>
                                                                    <th>Date Filed</th>
                                                                    <th>Reason</th>
                                                                    <th>Subject</th>
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
                                    <div class="tab-pane fade" id="for_revision" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <!-- <h4 class="fw-semibold text-secondary mb-3">For Revision List</h4> -->
                                                        <!-- <button type="button" id="btnGiveAccess" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalUserAccess"><i class="fa fa-plus fa-md"></i> Give Access</button> -->
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table id="tbl_revision" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Action</th>
                                                                    <th>Status</th>
                                                                    <th>Document Number</th>
                                                                    <th>Date Filed</th>
                                                                    <th>Reason</th>
                                                                    <th>Subject</th>
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
                                    <div class="tab-pane fade" id="approved" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <!-- <h4 class="fw-semibold text-secondary mb-3">Approved List</h4> -->
                                                        <!-- <button type="button" id="btnGiveAccess" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalUserAccess"><i class="fa fa-plus fa-md"></i> Give Access</button> -->
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table id="tbl_approved" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Action</th>
                                                                    <th>Status</th>
                                                                    <th>Document Number</th>
                                                                    <th>Date Filed</th>
                                                                    <th>Reason</th>
                                                                    <th>Subject</th>
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

                                    <!-- For Disapproved Tab Content -->
                                    <div class="tab-pane fade" id="disapproved" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <!-- <h4 class="fw-semibold text-secondary mb-3">For Revision List</h4> -->
                                                        <!-- <button type="button" id="btnGiveAccess" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalUserAccess"><i class="fa fa-plus fa-md"></i> Give Access</button> -->
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table id="tbl_disapproved" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Action</th>
                                                                    <th>Status</th>
                                                                    <th>Document Number</th>
                                                                    <th>Date Filed</th>
                                                                    <th>Reason</th>
                                                                    <th>Subject</th>
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

        <!-- Modal Add Memo -->
        <div class="modal fade" id="request_memo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Memorandum Form</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formAddMemo" autocomplete="off">

                            <div class="mb-3">
                                <p class="fw-bold">Memorandum Details</p>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 35%;">Document Number</span>
                                        <input class="form-control" type="text" name="docno" id="textDocNo" readonly required>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Classification</span>
                                        <select class="form-select" type="text" name="classification" id="textClassification" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Direct">Direct</option>
                                            <option value="Sub-Con">Sub-Con</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 35%;">Reason</span>
                                        <select class="form-select" type="text" name="reason" id="textReason" required>
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
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div id="selectedOptions" class="fs-5 mb-1"></div>
                                <div class="input-group mb-4">

                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">To</span>
                                        <input class="form-control" type="text" id="textTo" name="to" list="to" placeholder="To" multiple>
                                        <datalist id="to">
                                            <!-- options go here -->
                                        </datalist>
                                    
                                    <input type="hidden" name="selectedValues" id="selectedValues">
                                </div>   
                            </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">From</span>
                                        <input class="form-control" type="text" name="from" id="textFrom" value="HRS Training and Recruitment" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Subject</span>
                                        <input class="form-control" type="text" name="subject" id="textSubject" placeholder="Enter subject" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Date Filed</span>
                                        <input class="form-control" type="date" name="date_now" id="date_now" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Department</span>
                                        <input class="form-control" type="text" name="department" id="textDepartment" list="list_department" placeholder="Select department" required>
                                        <datalist id="list_department">
                                            
                                        </datalist>
                                        <!-- <select class="form-select" type="text" name="department" id="textDepartment" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="PPS">PPS</option>
                                            <option value="CN">CN</option>
                                            <option value="YF">YF</option>
                                            <option value="TS">TS</option>
                                        </select> -->
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Section</span>
                                        <input class="form-control" type="text" name="section" id="textSection" list="list_section" placeholder="Select section" required>
                                        <datalist id="list_section">

                                        </datalist>
                                        <!-- <select class="form-select" type="text" name="section" id="textSection" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Production">Production</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="PPC">PPC</option>
                                            <option value="LQC">LQC</option>
                                        </select> -->
                                    </div>
                                </div>
                            </div> 
                            <hr>

                            <div class="d-flex justify-content-end mb-3">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="fa-solid fa-user-plus me-2" style="color: white"></i>ADD TRAINEE</button>
                            </div>

                            <div class="mb-3">
                                <p class="fw-bold">Trainee Details</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="tbl_request" >
                                    <thead class="table-primary">
                                        <!-- EDITED -->
                                        <tr>
                                        <th>Action</th>
                                        <th>Employee No.</th>
                                        <th>Name</th>
                                        <th>Date Hired</th>
                                        <th>Position/Dept./Section</th>
                                        <th>General Knowledge</th>
                                        <th>Training Dates</th>
                                        <th>Training Venue</th>
                                        <th>Endorsement Date</th>
                                        <th>Exam Results</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <!-- Add more rows as needed -->
                                    </tbody>

                                </table>
                            </div> <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Prepared By</span>
                                        <input type="text" class="form-control" id="textPreparedBy" name="preparedby" value="ProjectBased" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Noted By</span>
                                        <input type="text" class="form-control" id="textNotedBy" name="notedby" list="notedby" placeholder="Noted by" required>
                                        <datalist id="notedby">
                                        
                                        </datalist>
                                        <input type="hidden" class="form-control" id="textUsername" name="username">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btnSubmitMemo"><i class="fa-solid fa-file-import me-2" style="color: white"></i>SUBMIT</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Add Employee -->
        <div class="modal fade" id="addEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Trainee Details</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mt-2 mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Employee Number</span>
                                            <input class="form-control" id="textEmpNo" name="empNo" list="EmpNo" placeholder="Enter employee number" style="text-transform: uppercase">
                                            <datalist id="EmpNo">
                                            
                                            </datalist>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Employee Name</span>
                                            <input type="text" class="form-control" id="textFullName" name="fullname" placeholder="Full name">
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Date Hired</span>
                                            <input type="date" class="form-control" id="textDateHired" name="date_hired">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Position/Dept./Section</span>
                                            <input type="text" class="form-control" id="textpds" name="pds" placeholder="Position/Department/Section">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Training Dates</span>
                                            <input type="text" class="form-control" id="textFromTo" name="fromto" placeholder="From - To">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                            <div class="input-group mb-4">
                                                <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Training Venue</span>
                                            <input type="text" class="form-control" id="textVenue" name="venue" placeholder="Training venue">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Endorsement Date</span>
                                            <input type="date" class="form-control" id="textEndorsementDate" name="endorsementDate">
                                        </div>
                                    </div>
                                </div> <hr>

                                <div class="mb-3">
                                    <p class="fw-bold">General Knowledge</p>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group mt-2 mb-4">
                                    <input class="form-control" id="textTitle" name="title" list="title" placeholder="Search General Knowledge">
                                        <datalist id="title">

                                        </datalist>
                                    <input class="form-control" id="textResult" name="result" placeholder="Training Result" readonly>
                                    <button type="button" id="btnSelect" name="btnSelect" class="btn btn-primary">Add to Table</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover"  id="tblGeneralKnowledge">

                                        <thead class="table-secondary">
                                            <tr>
                                            <th>Objective</th>
                                            <th>Result</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" id="btnAddEmployee"><i class="fa-solid fa-check me-2" style="color: white"></i>ADD</button>
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>

        <!-- Modal Approval Memo -->
        <div class="modal fade" id="view_memo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Memorandum Form</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formSubmitRevision">
                            <div class="mb-3">
                                <p class="fw-bold">Memorandum Details</p>
                            </div>

                            <!-- HIDDEN PKID INPUT -->
                            <input class="form-control" type="hidden" name="pkid" id="pkid" required>
                            <input class="form-control" type="hidden" name="memo_status" id="memo_status" required>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 35%;">Document Number</span>
                                        <input class="form-control" name="docno" id="textDocNo_view" readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Classification</span>
                                        <input class="form-control" type="text" name="classification_view" id="textClassification_view" required readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 35%;">Reason</span>
                                        <input class="form-control" type="text" name="reason_view" id="textReason_view" required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">To</span>
                                        <input class="form-control" type="text" id="selectedEditValues" name="selectedEditValues" list="to" placeholder="To" multiple readonly>
                                        <datalist id="to">
                                            <!-- options go here -->
                                        </datalist>
                                    </div>
                                </div>

                                <!-- Edited 1-14-25 -->
                                <!-- <input type="hidden" name="staticEmails" id="staticEmails"  value="paulgabrielle28@gmail.com, paulbariring28@gmail.com, "> -->
                                <input type="hidden" name="staticEmails" id="staticEmails"  value="cnpoblete@pricon.ph, ldatok@pricon.ph, jmporcare@pricon.ph, eldugos@pricon.ph, havasquez@pricon.ph, rdmorallos@pricon.ph, evalfelor@pricon.ph, jgsulit@pricon.ph, ">

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">From</span>
                                        <input class="form-control" name="from" id="textFrom_view" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Subject</span>
                                        <input class="form-control" name="subject_view" id="textSubject_view" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Date Filed</span>
                                        <input class="form-control" type="date" name="date_now_view" id="textdate_now_view" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Department</span>
                                        <!-- <select class="form-select" type="text" name="department_view" id="textDepartment_view" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="PPS">PPS</option>
                                            <option value="CN">CN</option>
                                            <option value="YF">YF</option>
                                            <option value="TS">TS</option>
                                        </select> -->
                                        <input class="form-control" type="text" name="department_view" id="textDepartment_view" list="list_department" placeholder="Select department" required readonly>
                                        <datalist id="list_department">
                                            
                                        </datalist>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Section</span>
                                        <!-- <select class="form-select" type="text" name="section_view" id="textSection_view" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Production">Production</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="PPC">PPC</option>
                                            <option value="LQC">LQC</option>
                                        </select> -->
                                        <input class="form-control" type="text" name="section_view" id="textSection_view" list="list_section" placeholder="Select section" required readonly>
                                        <datalist id="list_section">

                                        </datalist>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="mb-4">
                                <p class="fw-bold">Trainee Details</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="tbl_request_view">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Action</th>
                                            <th>Employee No.</th>
                                            <th>Name</th>
                                            <th>Date Hired</th>
                                            <th>Position/Dept./Section</th>

                                            <!-- Edited 12-23-24 -->
                                            <!-- <th>Training Dates</th> -->
                                            <th>Training Venue</th>
                                            <th>Endorsement Date</th>
                                            <th>Exam Results</th>
                                            <th>General Knowledge</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Rows populated dynamically -->
                                    </tbody>
                                </table>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Prepared By</span>
                                        <input class="form-control" id="textPreparedBy_view" name="preparedby" readonly>
                                        <input class="form-control" id="textPreparedBy_email_view" name="preparedby_email" readonly hidden>
                                    </div>

                                    <!-- Edited 1-14-25 -->
                                    <input class="form-control" id="txtApprover_name" name="Approver_name" readonly hidden>
                                    <input class="form-control" id="txtApprover_username" name="Approver_username" value="<?php echo $username?>" readonly hidden>
                                    <input class="form-control" id="txtApprover_email" name="Approver_email" readonly hidden>

                                    <input class="form-control" id="txtSend_to_email" name="txtSend_to_email" readonly hidden>

                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%;">Noted By</span>
                                            <input type="text" class="form-control" id="textNotedBy_view" name="notedby_view" list="notedby" placeholder="Noted by" required readonly>
                                                <datalist id="notedby">

                                                </datalist>
                                            <input type="hidden" class="form-control" id="textUsername_view" name="username_view">
                                    </div>
                                </div>
                                <!-- <div class="col-md-12 mb-2 d-none" id="reason_div"> -->
                                        <!-- <textarea class="form-control mb-2" id="disapprove_reason" name="disapprove_reason" placeholder="Reason" style="height: 100px"></textarea>
                                        <button type="button" class="btn btn-secondary btn-sm float-end ms-2" id="close_reason_div"><i class="fa-solid fa-xmark me-2" style="color: white"></i>Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm float-end" id="submit_reason"><i class="fa-solid fa-check me-2" style="color: white"></i>Submit</button> -->
                                    </form>
                                <!-- </div> -->
                            </div>
                            <div class="modal-footer" id="footer_btn">
                                <button type="button" class="btn btn-success approve_memo" id="approve_memo" name="approve_memo"><i class="fa-solid fa-check me-2" style="color: white"></i>APPROVE</button>
                               
                               
                                <!-- Edited 1-14-25 -->
                                <!-- <button type="button" id="btn_disapprove" name="btn_disapprove" class="btn btn-danger btn_disapprove" data-bs-toggle="modal" data-bs-target="#modalDisapproveReason"><i class="fa-solid fa-xmark me-2" style="color: white"></i>DISAPPROVE</button> -->
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalHRMemoAppRevisionRemarks" class="btn btn-danger revise_memo" id="revise_memo" name="revise_memo"><i class="fa-solid fa-rotate-left me-2" style="color: white"></i>DISAPPROVE</button>

                                <form method="POST" action="pdf_hr_memo_approval.php" id="formGeneratePDF" target="_blank">

                                    <!-- Generate PDF Button 12-12-24 -->
                                    <!-- HIDDEN DOCNO -->
                                    <input type="hidden" id="pdf_hidden_docno" name="pdf_hidden_docno">
                                    <input type="hidden" id="pdf_hidden_empno" name="pdf_hidden_empno">
                                    <!-- <input type="text" id="hidden_hr_memo" name="hidden_hr_memo"> -->

                                    <!-- Edited 1-13-25 -->
                                    <input type="hidden" id="pdf_hidden_preparedby_empno" name="pdf_hidden_preparedby_empno">
                                    <input type="hidden" id="pdf_hidden_notedby_empno" name="pdf_hidden_notedby_empno">

                                    <input type="submit" class="btn btn-warning btn_hr_memo_approval_pdf" id="btn_hr_memo_approval_pdf" name="btn_hr_memo_approval_pdf" value="Generate PDF" hidden>
                                </form>

                                <button type="button" class="btn btn-dark" id="close_memo" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DITO -->
        <!-- Modal Revision Remarks -->
        <div class="modal fade" id="modalHRMemoAppRevisionRemarks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Revision Remarks</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formSubmitRevisionRemarks" autocomplete="off">
                        <input type="hidden" id="hidden_revision_conno" name="hidden_revision_conno">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" name="text_revision_remarks" id="text_revision_remarks" maxlength="200"></textarea>
                                <label for="text_revision_remarks">Comments</label>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btnAddReceivingRemarks"><i class="fa-solid fa-file-import me-2" style="color: white"></i>Submit</button>
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

        <!-- EDITED -->
         <!-- Modal Disapprove Reason -->
        <div class="modal fade" id="modalDisapproveReason" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Reason for Disapproval</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formSubmitDisapproveReason" autocomplete="off">
                            <input type="hidden" id="hidden_disapprove_docno" name="hidden_disapprove_docno">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" name="memo_disapprove_reason" id="text_memo_disapprove_reason"></textarea>
                                <label for="text_memo_disapprove_reason">Comments</label>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btnAddReason"><i class="fa-solid fa-file-import me-2" style="color: white"></i>Submit</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        </form>
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

    $('#memo_approval').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active');
            $('#memo_section').removeClass('d-none');
            $('#headerTitle').text('HR Memorandum');
            $('#url_title').text('HR Memorandum');
        }
        else {
            $(this).removeClass('active');
        }
    });

    $('#addEmployeeModal').on('hidden.bs.modal', function () {
        $('#request_memo').modal('show');

    });

    let handler = "./handler/handler.php";
    let today = new Date().toISOString().split('T')[0];
    $('#date_now').val(today);

    // ADDING DATA IN GENERAL KNOWLEDGE TABLE
    let tblGenKnow = $('#tblGeneralKnowledge').DataTable();
    let titleList = [];
    let knowledgeList = [];
    let resultList = [];

    let dataTableRequestView = $('#tbl_request_view').DataTable({
        columnDefs: [
            {
                targets: 0,  // The index of the "Action" column
                visible: false  // Initial visibility is false (hidden)
            }
        ],
        responsive: true,
    });


    // SHOW MEMO RECORDS
    // let dataTablesMemo = $('#tbl_trainee').DataTable({
    //     "aaSorting"	 : [],
    //     "bProcessing": true,
    //     "bServerSide": true,
    //     "sAjaxSource": "./server_side_scripts/hr_memo_approval.php",
    //     "drawCallback": function( settings ) {
    //         $('#tbl_trainee').attr('style','width:100%;');
    //     }
    // });

    // 11/27/2024
    // Function to initialize DataTables with different status
    function initializeDataTable(tableId, status) {
        return $(tableId).DataTable({
            "aaSorting": [],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "./server_side_scripts/hr_memo_approval.php",
            "fnServerParams": function (aoData) {
                // If status is an array, convert it to a string
                if (Array.isArray(status)) {
                    aoData.push({ "name": "status", "value": status.join(',') });
                } else {
                    aoData.push({ "name": "status", "value": status });
                }
            },
            "drawCallback": function (settings) {
                $(tableId).attr('style', 'width:100%;');
            }
        });
    }

    // Initialize DataTables for different statuses
    let tblTrainee = initializeDataTable('#tbl_trainee', 0); // For Approval
    let tblRevision = initializeDataTable('#tbl_revision', 2); // For Revision
    let tblApproved = initializeDataTable('#tbl_approved', [1, 4]); // Approved
    let tblDisapproved = initializeDataTable('#tbl_disapproved', 3); // Approved

    // GENERATE DOCUMENT NUMBER
    function generateDocumentNumber(counter) {
        let now = new Date();
        let month = (now.getMonth() + 1).toString().padStart(2, '0');
        let day = now.getDate().toString().padStart(2, '0');
        let year = now.getFullYear().toString().slice(-2);

        let documentNumber = `${month}${year}-${day}_MR${year}-${counter.toString().padStart(3, '0')}`;

        $('#textDocNo').val('HRS Training - ' + documentNumber);
    }

    // FETCH LAST DOCUMENT NUMBER FROM THE DATABASE
    function fetchLastDocNumber() {
        $.ajax({
            url: handler,
            method: 'POST',
            data: {
                action: 'get_last_docno'
            },
            success: function(response) {
                let lastCounter = parseInt(response);

                let nextCounter = lastCounter + 1;

                console.log("Next counter: " + nextCounter);

                generateDocumentNumber(nextCounter);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching document number:", error);
            }
        });
    }

    fetchLastDocNumber();
    
    let data = {
        "action": "display_empno",
    };
    data = $.param(data) + "&" + $('#EmpNo').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: data,
        dataType: "json",
        success: function (response) {
            let dataList = $('#EmpNo');
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


    let title = {
            "action": "display_general_knowledge",
        }
        title = $.param(title) + "&" + $('#title').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        
        data: title,
        dataType: "json",
        success: function (response) {
            let dataList = $('#title');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    // CLEARS FORM WHEN MODAL IS CLOSED
    // $('#request_memo').on('hidden.bs.modal', function () {
    //     var formMemo = $('#formAddMemo');

    //     var preservedDocNo = formMemo.find('#textDocNo').val();
    //     var preservedDateNow = formMemo.find('#date_now').val();

    //     formMemo[0].reset();

    //     formMemo.find('#textDocNo').val(preservedDocNo);
    //     formMemo.find('#date_now').val(preservedDateNow);
    //     table.clear().draw();

    // });

    $('#btnSelect').on('click', function () {
        let add_title = $('#textTitle').val();
        let add_result = $('#textResult').val();
        let add_empNo = $('#textEmpNo').val();

        console.log('Title:', add_title);
        console.log('Result:', add_result);
        console.log('EmpNo:', add_empNo);

        // Check if title or employee number is empty
        if (add_title === '' || add_empNo === '') {
            alert('Please enter an employee number or title first.');
            return;
        }

        // Check if title already exists in the table
        let titleExists = false;
        $('#tblGeneralKnowledge tbody tr').each(function () {
            let existingTitle = $(this).find('td:eq(0)').text(); // Get the title from the first column (index 0)
            if (existingTitle === add_title) {
                titleExists = true;
                return false; // Exit the loop
            }
        });

        // If the title already exists, alert the user
        if (titleExists) {
            alert('The title "' + add_title + '" has already been added. Please select a different title.');
            $('#textTitle').val('');
            $('#textResult').val('');

            // titleList.length = 0;
            // resultList.length = 0;

            return;
        }

        // If title is new, add the entry
        // let newEntry = {
        //     gn_title: add_title,
        //     gn_empNo: add_empNo
        // };

        // If title is new, add the entry
        let newEntry = {
            gn_title: add_title,
            gn_result: add_result,
            gn_empNo: add_empNo
        };

        // let newResult = {
        //     gn_result: add_result,
        // }

        // titleList.push(newEntry);
        knowledgeList.push(newEntry);
        // resultList.push(newResult);

        tblGenKnow.row.add([
            add_title,
            add_result,
            '<center><button type="button" class="btn btn-warning btnRemoveGK">Remove</button></center>'
        ]).draw();

        // Clear input fields after adding
        $('#textTitle').val('');
        $('#textResult').val('');
    });

    // REMOVING ROW/S INSIDE tblGeneralKnowledge
    $('#tblGeneralKnowledge tbody').on('click', '.btnRemoveGK', function () {
        let row = $(this).closest('tr');

        if(confirm('Are you sure you wan to remove this?')){
            tblGenKnow.row(row).remove().draw();

            let titleToRemove = row.find('td').eq(0).text();
            knowledgeList = knowledgeList.filter(item => item.gn_title !== titleToRemove);
        }
    });

    // CLEARING THE EMPLOYEE DETAILS IF THE EMPLOYEE NUMBER IS EMPTY
    $('#textEmpNo').on('input', function () {

        let check_empNo = $(this).val();

        if(check_empNo === ''){
            $('#textEmpNo').val('');
            $('#textFullName').val('');
            $('#textDateHired').val('');
            $('#textpds').val('');
            $('#textFromTo').val('');
            $('#textVenue').val('');
            $('#textEndorsementDate').val('');
            $('#textTitle').val('');
            $('#textResult').val('');

            tblGenKnow.clear().draw();

        }
    });

    // CLEAR textResult WHEN textTitle IS EMPTY
    $('#textTitle').on('input', function () {
        let check_title = $(this).val();

        if(check_title === ''){
            $('#textResult').val('');
        }
    });

    // GETTING EMPLOYEE DETAILS BASE IN THE EMPLOYEE NUMBER
    $('#textEmpNo').on('change', function() {
        let empNo = $(this).val();

        if(empNo) {
            $.ajax({
                type: "POST",
                url: "./handler/handler.php",
                data: {
                    "action": "get_employee",
                    "textEmpNo": empNo
                },
                dataType: "json",
                success: function(response) {
                    if(response.FullName) {
                        $('#textFullName').val(response.FullName);
                        $('#textpds').val(response.pds);
                        $('#textDateHired').val(response.DateHired);
                    } else {
                        $('#textFullName').val(''); 
                        $('#textpds').val('');
                        $('#textDateHired').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });

            // Fetch training titles (general knowledge) based on EmpNo
            $.ajax({
                type: "POST",
                url: "./handler/handler.php",
                data: {
                    "action": "display_general_knowledge",
                    "textEmpNo": empNo
                },
                dataType: "json",
                success: function(response) {
                    let dataList = $('#title');
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

    // GETTING RESULT EQUAL TO GENERAL KNOWLEDGE
    $('#textTitle').on('change', function () {
        let generalKnow = $(this).val();
        let genKnowEmpNo = $('#textEmpNo').val();

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
                        $('#textResult').val(response.join(', '));
                    } else {
                        $('#textResult').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                }
            });
        }
    });
    
    // GETTING TRAINEE DETAILS BASE IN THE EMPLOYEE NUMBER
    $('#textEmpNo').on('change', function() {
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
                        $('#textVenue').val(response.Venue);
                        // $('#textRemarks').val(response.Remarks);
                        $('#textFromTo').val(response.fromto);
                    } else {
                        $('#textVenue').val('');
                        // $('#textRemarks').val('');
                        $('#textFromTo').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        }
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

    // GETTING SECTION
    let get_section = {
        "action": "get_section",
    }
    get_section = $.param(get_section) + "&" + $('#textSection').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: get_department,
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

    let selectedOptions = [];

    $('#textTo').on('input', function() {
        const value = $(this).val().trim();

        // Check if the value is non-empty
        if (value) {
            // Check if the value is already selected
            if (selectedOptions.includes(value)) {
                // If it's already selected, remove it from the array
                removeOption(value);
            } else {
                // If it's not selected, add it to the array
                selectedOptions.push(value);
            }

            // Clear the input field so the user can select another option
            $('#textTo').val('');

            // Update the hidden input field with the selected values
            $('#selectedValues').val(selectedOptions.join(', '));

            // Display the selected options as tags
            renderSelectedOptions();
        }
    });

    // Function to render the selected options as tags
    function renderSelectedOptions() {
        $('#selectedOptions').find('span').remove(); // Clear existing tags, but keep the input

        selectedOptions.forEach(function(option) {
            // Create a tag for each selected option
            const tag = $('<span>').addClass('badge bg-primary me-1').text(option);

            // Add a remove button to the tag
            const removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function() {
                removeOption(option);
            });

            // Append the remove button to the tag
            tag.append(removeBtn);

            // Append the tag to the selectedOptions container before the input field
            $('#selectedOptions').prepend(tag);
        });
    }

    // Function to remove a selected option
    function removeOption(option) {
        // Remove the option from the array
        selectedOptions = selectedOptions.filter(function(item) {
            return item !== option;
        });

        // Update the hidden input field
        $('#selectedValues').val(selectedOptions.join(', '));

        // Re-render the selected options
        renderSelectedOptions();
    }

    // GETTING "TO" FROM tbl_useraccnt
    let to = {
            "action": "get_to",
        }
        to = $.param(to) + "&" + $('#textTo').serialize();

        $.ajax({
        type: "POST",
        url: handler,
        
        data: to,
        dataType: "json",
        success: function (response) {
            let dataList = $('#to');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    // GETTING "NOTED BY" FROM vw_employee
    let notedby = {
            "action": "get_noted_by",
        }
        notedby = $.param(notedby) + "&" + $('#textNotedBy').serialize();

        $.ajax({
        type: "POST",
        url: handler,
        
        data: notedby,
        dataType: "json",
        success: function (response) {
            let dataList = $('#notedby');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    // GETTING THE USERNAME EQUAL TO NOTED BY
    $('#textNotedBy').on('change', function () {
        let noted_by = $(this).val();

        if(noted_by){
            $.ajax({
            type: "POST",
            url: handler,
            data: {
                "action": "get_username",
                "textNotedBy": noted_by
            },
            dataType: "json",
            success: function (response) {
                if(response.length > 0){
                    $('#textUsername').val(response);
                }else{
                    $('#textUsername').val('');
                }
                }
            });
        }
    });

    // GETTING RESULT EQUAL TO GENERAL KNOWLEDGE
    $('#textTitle').on('change', function () {
        let generalKnow = $(this).val();
        let genKnowEmpNo = $('#textEmpNo').val();

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
                        $('#textResult').val(response.join(', '));
                    } else {
                        $('#textResult').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                }
            });
        }
    });

    // ADDING DATA IN TABLE REQUEST (DYNAMICALLY)
    let table = $('#tbl_request').DataTable();

    $('#btnAddEmployee').on('click', function() {
        let docNo = $('#textDocNo').val();
        let classification = $('#textClassification').val();
        let reason = $('#textReason').val();
        let from = $('#textFrom').val();
        let to = $('#selectedValues').val();
        let subject = $('#textSubject').val();
        let dateNow = $('#date_now').val();
        let dept = $('#textDepartment').val();
        let section = $('#textSection').val();

        let empNo = $('#textEmpNo').val();
        let fullname = $('#textFullName').val();
        let dateHired = $('#textDateHired').val();
        let pds = $('#textpds').val();
        let fromTo = $('#textFromTo').val();
        let venue = $('#textVenue').val();
        let endorsementDate = $('#textEndorsementDate').val();

        console.log("DocNo:", docNo);
        console.log("Classification:", classification);
        console.log("Reason:", reason);
        console.log("To:", to);
        console.log("From:", from);
        console.log("Subject:", subject);
        console.log("DateNow:", dateNow);
        console.log("Dept:", dept);
        console.log("Section:", section);
        console.log("EmpNo:", empNo);
        console.log("Fullname:", fullname);
        console.log("Date Hired:", dateHired);
        console.log("PDS:", pds);
        console.log("FromTo:", fromTo);
        console.log("Venue:", venue);
        console.log("Endorsement Date:", endorsementDate);

        // Check if required fields are filled
        if (empNo && fullname && dateHired && endorsementDate) {

            // Check if employee number already exists in the table
            let empExists = false;
            $('#tbl_request tbody tr').each(function () {
                let existingEmpNo = $(this).find('td:eq(0)').text(); 
                if (existingEmpNo === empNo) {
                    empExists = true;
                    return false; // Exit the loop
                }
            });

            // Prevent duplicate entry if employee already exists
            if (empExists) {
                alert('Employee with Employee Number "' + empNo + '" is already in the request table.');
                $('#textEmpNo').val('');
                $('#textFullName').val('');
                $('#textDateHired').val('');
                $('#textpds').val('');
                $('#textFromTo').val('');
                $('#textVenue').val('');
                $('#textEndorsementDate').val('');
                $('#textTitle').val('');
                $('#textResult').val('');
                knowledgeList.length = 0;
                tblGenKnow.clear().draw();
                return;
            }

            // Create an object for this employee's details
            let employeeData = {
                docNo: docNo,
                classification: classification,
                reason: reason,
                to: to,
                from: from,
                subject: subject,
                dateNow: dateNow,
                dept: dept,
                section: section,
                empNo: empNo,
                fullname: fullname,
                dateHired: dateHired,
                pds: pds,
                fromTo: fromTo,
                venue: venue,
                endorsementDate: endorsementDate,
            };

            if (!window.employeeDataArray) {
                window.employeeDataArray = []; // Initialize if doesn't exist
            }

            // Add this employee's data to the global array
            window.employeeDataArray.push(employeeData);

            // Use knowledgeList to format titles and results for the table
            let formattedTitles = knowledgeList.map(item => item.gn_title).join('/ ');
            let formattedResults = knowledgeList.map(item => item.gn_result).join('/ ');

            // EDITED
            table.row.add([
                '<center><button type="button" class="btn btn-danger btnRemoveEmp">Remove</button></center>',
                empNo,
                fullname,
                dateHired,
                pds,
                formattedTitles,
                fromTo,
                venue,
                endorsementDate,
                formattedResults
            ]).draw();

            toastr.success('Successfully added!');

            // Clear input fields after adding
            $('#textEmpNo').val('');
            $('#textFullName').val('');
            $('#textDateHired').val('');
            $('#textpds').val('');
            $('#textFromTo').val('');
            $('#textVenue').val('');
            $('#textEndorsementDate').val('');
            $('#textTitle').val('');
            $('#textResult').val('');

            // Reset knowledge list
            knowledgeList.length = 0;
            tblGenKnow.clear().draw();

            $('#addEmployeeModal').modal('hide');
            $('#request_memo').modal('show');

            console.log('Stored employee data array:', window.employeeDataArray);
        } else {
            alert('Please fill out all required fields.');
        }
    });


    // REMOVING ROW/S INSIDE tbl_request
    $('#tbl_request tbody').on('click', '.btnRemoveEmp', function () {
        let row = $(this).closest('tr');

        if(confirm('Are you sure you wan to remove this trainee?')){
            table.row(row).remove().draw();
        
            let empNoToRemove = row.find('td').eq(0).text();
            window.employeeDataArray = window.employeeDataArray.filter(item => item.empNo !== empNoToRemove);
            
            console.log('Updated Employee Data Array:', window.employeeDataArray);
        }
    });

    // ADDING NEW MEMO
    $("#formAddMemo").submit(function (e) {
        e.preventDefault();

        let allData = [];

        // Check if the table contains any data
        if (!table.data().any()) {
            alert('Please add at least one trainee to the table!');
            return false;
        }

        // Check if there are any visible rows
        let visibleRows = table.rows({ filter: 'applied' }).data().length;
        if (visibleRows === 0) {
            alert('Please add at least one visible trainee to the table!');
            return false;
        }

        let memoClass = $('#textClassification').val();
        let memoReas = $('#textReason').val();
        
        let memoTo = $('#selectedValues').val();
    
        let memoSubj = $('#textSubject').val();
        let memoDept = $('#textDepartment').val();
        let memoSec = $('#textSection').val();
        let memoNote = $('#textNotedBy').val();
        let memoUser = $('#textUsername').val();


        // Collect data from visible rows
        table.rows({ filter: 'applied' }).every(function () {
            let rowData = this.data();
            // EDITED
            allData.push({
                empNo: rowData[1].trim(),
                fullname: rowData[2].trim(),
                date_hired: rowData[3].trim(),
                pds: rowData[4].trim(),
                title: rowData[5].trim(),
                fromto: rowData[6].trim(),
                venue: rowData[7].trim(),
                endorsementDate: rowData[8].trim(),
                remarks: rowData[9].trim()
            });
        });

        console.log('Collected Table Data:', allData);

        if (!memoClass || !memoReas || !memoTo.trim() || !memoSubj.trim() || !memoDept || !memoSec || !memoNote.trim()) {
            alert('Please fill up all required fields!');
            return false;
        }

        let data = {
            "action": "add_memo",
            "rows": allData
        };

        data = $.param(data) + "&" + $('#formAddMemo').serialize();

        $.ajax({
            type: "POST",
            url: handler,
            data: data,
            dataType: "json",
            success: function (response) {
                console.log('Response:', response);

                if (response.result.startsWith("Error")) {
                    alert(response.result);
                } else {
                    $('#textClassification').val('0');
                    $('#textReason').val('0');
                    $('#selectedValues').val('');
                    $('#textSubject').val('');
                    $('#textDepartment').val('0');
                    $('#textSection').val('0');
                    $('#textNotedBy').val('');
                    $('#textUsername').val('');
                    $('#selectedOptions').empty();

                    selectedOptions.length = 0;

                    $('#request_memo').modal('hide');

                    // dataTablesMemo.draw();
                    tblApproved.draw();
                    tblRevision.draw();
                    tblTrainee.draw();
                    tblDisapproved.draw();

                    table.clear().draw();

                    fetchLastDocNumber();

                    toastr.success('New Memo Added!');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("AJAX Error: " + textStatus);  // Show AJAX error
            }
        });
    });

    // $("#formAddMemo").submit(function (e) {
    //     e.preventDefault();

    //     let allData = [];

    //     let memoClass = $('#textClassification').val();
    //     let memoReas = $('#textReason').val();
    //     let memoTo = $('#textTo').val();
    //     let memoSubj = $('#textSubject').val();
    //     let memoDept = $('#textDepartment').val();
    //     let memoSec = $('#textSection').val();
    //     let memoNote = $('#textNotedBy').val();

    //     // Check if the table has any visible rows
    //     let tableRows = $('#tbl_request tbody tr:visible'); // Only count visible rows

    //     console.log('Number of visible rows:', tableRows.length); // Debugging

    //     // If there are no visible rows, alert and return
    //     if (tableRows.length === 0) {
    //         alert('Please add at least one entry to the table!');
    //         return;
    //     }

    //     // Collect data from the table
    //     tableRows.each(function() {
    //         let rowData = {
    //             empNo: $(this).find('td').eq(0).text().trim(),
    //             fullname: $(this).find('td').eq(1).text().trim(),
    //             date_hired: $(this).find('td').eq(2).text().trim(),
    //             pds: $(this).find('td').eq(3).text().trim(),
    //             title: $(this).find('td').eq(4).text().trim(),
    //             fromto: $(this).find('td').eq(5).text().trim(),
    //             venue: $(this).find('td').eq(6).text().trim(),
    //             endorsementDate: $(this).find('td').eq(7).text().trim(),
    //             remarks: $(this).find('td').eq(8).text().trim()
    //         };

    //         // Push rowData only if empNo is not empty (skip empty rows)
    //         if (rowData.empNo !== '') {
    //             allData.push(rowData);
    //         }
    //     });

    //     console.log(allData); // Debugging: Check collected table data

    //     // Check if required fields are filled and collected table data is not empty
    //     if (!memoClass || !memoReas || !memoTo.trim() || !memoSubj.trim() || !memoDept || !memoSec || !memoNote.trim()) {
    //         alert('Please fill up all required fields!');
    //         return;
    //     }

    //     // Prepare data for submission
    //     let data = {
    //         "action": "add_memo",
    //         "rows": allData
    //     };

    //     data = $.param(data) + "&" + $('#formAddMemo').serialize();

    //     // AJAX request
    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: data,
    //         dataType: "json",
    //         success: function (response) {
    //             console.log('Response:', response);

    //             if (response.result.startsWith("Error")) {
    //                 alert(response.result);
    //             } else {
    //                 // Reset form after successful submission
    //                 $('#textClassification').val('0');
    //                 $('#textReason').val('0');
    //                 $('#textTo').val('');
    //                 $('#textSubject').val('');
    //                 $('#textDepartment').val('0');
    //                 $('#textSection').val('0');
    //                 $('#textNotedBy').val('');
    //                 $('#request_memo').modal('hide');

    //                 dataTablesMemo.draw();
    //                 table.clear().draw();

    //                 fetchLastDocNumber();
    //             }
    //         },
    //         error: function (jqXHR, textStatus, errorThrown) {
    //             alert("AJAX Error: " + textStatus);
    //         }
    //     });
    // });

    // Reason  for Memo
    // $(document).on('click', '#revise_memo', function () {
        // $('#reason_div').removeClass('d-none');
        // $('#revise_memo').addClass('d-none');
        // $('#approve_memo').addClass('d-none');
        // $('#close_memo').addClass('d-none');
        // $('#disapprove_reason').val('');
    // });

    // $(document).on('click', '#close_reason_div', function () {
        // $('#reason_div').addClass('d-none');
        // $('#revise_memo').removeClass('d-none');
        // $('#approve_memo').removeClass('d-none');
        // $('#close_memo').removeClass('d-none');
    // });


    // DELETE MEMO
    $(document).on('click', '.btn_delete', function () {
        let delete_memo = $(this).data('docno');

        if (confirm("Are you sure you want to delete this memo?")) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "delete_memo",
                    "docno": delete_memo
                },
                dataType: "json",
                success: function (response) {
                    if (response.result) {
                        // dataTablesMemo.draw();
                        tblApproved.draw();
                        tblRevision.draw();
                        tblTrainee.draw();
                        tblDisapproved.draw();
                    } else {
                        alert("Error deleting the memo.");
                    }
                },
                error: function () {
                    alert("An error occurred while deleting the memo.");
                }
            });
        }
    });

    $(document).on('click', '.btn_view', function() {
        let view_status = $(this).data('status');

        // let showActionColumn = view_status === 2;  // Show if view_status is 2, hide otherwise

        // Toggle column visibility based on view_status
        // dataTableRequestView.column(0).visible(showActionColumn);

        // Retrieve and set values based on the button's data attributes
        let view_pkid = $(this).data('pkid');   
        let view_docno = $(this).data('docno');
        let view_classification = $(this).data('classification');
        let view_reason = $(this).data('reason');
        let view_memo_to = $(this).data('memo_to');
        let view_memo_from = $(this).data('memo_from');
        let view_subject = $(this).data('subject');
        let view_date_now = $(this).data('date_now');
        let dateOnly = view_date_now.split(' ')[0];
        let view_department = $(this).data('department');
        let view_section = $(this).data('section');
        let view_preparedby = $(this).data('preparedby');
        let view_notedby = $(this).data('notedby');
        let view_revision = $(this).data('revision');

        $('#pdf_hidden_docno').val(view_docno);

        $('#pkid').val(view_pkid);
        $('#memo_status').val(view_status);
        $('#textDocNo_view').val(view_docno);
        $('#textClassification_view').val(view_classification);
        $('#textReason_view').val(view_reason);
        $('#selectedEditValues').val(view_memo_to);
        $('#textFrom_view').val(view_memo_from);
        $('#textSubject_view').val(view_subject);
        $('#textdate_now_view').val(dateOnly);
        $('#textDepartment_view').val(view_department);
        $('#textSection_view').val(view_section);
        $('#textPreparedBy_view').val(view_preparedby);
        $('#textNotedBy_view').val(view_notedby);

        // Edited 1-14-25
        GetSendToEmails();

        // Adjust visibility for elements based on view_status
        if (view_status === 1 || view_status === 4 || view_status === 3) {
            $('#btnAddTrainee_view').addClass('d-none');
            $('#revise_memo, #approve_memo, #btn_disapprove').addClass('d-none');

            // $('#reason_div').addClass('d-none');
            // $('#disapprove_reason').text(view_revision);

        } else if (view_status === 2) {
            $('#btnAddTrainee_view').removeClass('d-none');
            $('#revise_memo, #approve_memo, #btn_disapprove').addClass('d-none');

            // $('#disapprove_reason').val(view_revision);
            // $('#approve_memo, #close_memo').removeClass('d-none');
            // $('#reason_div').removeClass('d-none');

        } else if (view_status === 0) {
            $('#btnAddTrainee_view').addClass('d-none');
            $('#revise_memo, #approve_memo, #close_memo, #btn_disapprove').removeClass('d-none');

            // $('#reason_div').addClass('d-none');
            // $('#disapprove_reason').val(view_revision);
        }

        // Showing and Hiding of Generate PDF button
        if(view_status === 1 || view_status === 4){
            $('#btn_pdf').removeClass('d-none');
            dataTableRequestView.column(0).visible(true);
        }else{
            $('#btn_pdf').addClass('d-none');
            dataTableRequestView.column(0).visible(false);
        }

        // AJAX to fetch employee details and populate the table
        $.ajax({
            type: "POST",
            url: "./handler/handler.php",
            data: {
                action: "get_emp_details",
                docno: view_docno
            },
            dataType: "json",
            success: function(response) {
                // Clear the existing rows in DataTable
                dataTableRequestView.clear();

                // Loop through response data and add each row to the DataTable
                // $.each(response, function(index, value) {
                //     dataTableRequestView.row.add([
                //         `<center><button class="btn btn-danger fa-solid fa-trash btn_edit_remove" style="color:white"></button></center>`,
                //         value.empNo,
                //         value.fullname,
                //         value.date_hired,
                //         value.pds,

                //         // Edited 12-23-24
                //         // value.fromto,
                        
                //         value.venue,
                //         value.endorsementDate,
                //         value.remarks,
                //         value.title
                //     ]);
                // });

                // Loop through response data and add each row to the DataTable
                response.forEach(function(value) {
                    let actionButton = '';
                    if (view_status === 2) {
                        actionButton = `<center><button class="btn btn-danger fa-solid fa-trash btn_edit_remove" style="color:white"></button></center>`;
                    } else if (view_status === 1 || view_status === 4) {
                        actionButton = `<center><button class="btn btn-primary fa-solid fa-file btn_pdf" style="color:white"></button></center>`;
                    }

                    dataTableRequestView.row.add([
                        actionButton,
                        value.empNo,
                        value.fullname,
                        value.date_hired,
                        value.pds,
                        // Uncomment if 'fromto' is required
                        // value.fromto,
                        value.venue,
                        value.endorsementDate,
                        value.remarks,
                        value.title
                    ]);
                });
                dataTableRequestView.draw();

                // Edited 1-13-25
                getPreparedByEmpNo();
                getNotedByEmpNo();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
            }
        });
    });

    // Generating pdf per trainee
    $(document).on('click', '.btn_pdf', function(e) {
        e.preventDefault(); // Prevent default action of the button, if any

        // Get the row containing the clicked button
        let row = $(this).closest('tr');

        // Retrieve the data from the row (assuming `empNo` is in the second column)
        let empNo = row.find('td').eq(1).text();

        $('#pdf_hidden_empno').val(empNo);
        // Alert the empNo value
        // alert(`Employee Number: ${empNo}`);

        // Programmatically trigger the button click
        $('#btn_hr_memo_approval_pdf').trigger('click');
        
    });

    $('#tbl_request_view tbody').on('click', '.btn_edit_remove', function () {
        let row = $(this).closest('tr');

        if(confirm('Are you sure you want to remove this trainee?')){
            // Remove the row using DataTables' row().remove() method
            dataTableRequestView.row(row).remove().draw(false);  // Use draw(false) to keep the pagination state

            let empToRemove = row.find('td').eq(1).text();  // Get the employee number from the first column
            console.log('Employee removed: ' + empToRemove);  // Debugging, you can handle the removal here (e.g., server-side removal)
        }
    });

    $('#tbl_request_view tbody').on('click', '.btn_edit_remove', function () {
        let row = $(this).closest('tr');
        let remove_docno = $('#textDocNo_view').val(); // Assuming the docno is stored in this input
        let empToRemove = row.find('td').eq(1).text();  // Employee number is in the second column

        let remove_emp_edit = {
            "action": "remove_emp_edit",
            "remove_edit_docno": remove_docno,
            "remove_edit_emp": empToRemove
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: remove_emp_edit,
            dataType: "json",
            success: function (response) {
                if (response.result) {
                    // Successfully removed
                    dataTableRequestView.draw();
                    console.log('Employee removed: ' + empToRemove);
                    // Remove the row using DataTables' row().remove() method
                    dataTableRequestView.row(row).remove().draw(false);
                    alert('Employee Removed!');
                    $('#view_memo').modal('show');
                    
                } else {
                    console.error('Failed to remove employee');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + status + ' ' + error);
            }
        });
    });


    $("#formSubmitRevision").submit(function (e) {
        e.preventDefault();

        let revise_memo = $('#textDocNo_view').val();
        let revise_memo_status = $('#memo_status').val();
        console.log(revise_memo);

        // Define the action based on revise_memo_status
        // let action = "";
        // if (revise_memo_status === "0") {
        //     action = "memo_revision";
        // } else if (revise_memo_status === "2") {
        //     action = "for_checking";
        // } else {
        //     // Handle unexpected status values if needed
        //     alert("Invalid memo status");
        //     return; // Exit the function if status is not valid
        // }

        if($('#disapprove_reason').val().trim() === '') {
            alert('Please enter a reason for revision');
            return;
        }

        let revision = {
            "action": "memo_revision",  // Use the determined action here
            "revise_docno": revise_memo
        };

        revision = $.param(revision) + "&" + $('#formSubmitRevision').serialize();

        $.ajax({
            type: "POST",
            url: handler,
            data: revision,
            dataType: "json",
            success: function (response) {
                toastr.success('Successfully submitted!');

                $('#view_memo').modal('hide');
                // dataTablesMemo.draw();
                tblApproved.draw();
                tblRevision.draw();
                tblTrainee.draw();
                tblDisapproved.draw();
            }
        });
    });

    // Edited 2-3-25
    $(document).on('click', '.approve_memo', function () {
        let approve_memo = $('#textDocNo_view').val();    
        let memo_approver = $('#txtApprover_name').val();         
        console.log(approve_memo);

        let approve = {
            "action": "approve_memo",
            "approve_docno": approve_memo,
            "memo_approver": memo_approver
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: approve,
            dataType: "json",
            success: function (response) {

                // Edited 1-14-25
                send_approved_email();
                send_email_to_requestor();

                $('#view_memo').modal('hide');
                // dataTablesMemo.draw();
                tblApproved.draw();
                tblRevision.draw();
                tblTrainee.draw();
                tblDisapproved.draw();
                toastr.success('Memo Approved!');

            }
        });
    });

    $(document).on('click', '.btn_disapprove', function () {
        let disapprove_memo = $('#textDocNo_view').val();
        $('#hidden_disapprove_docno').val(disapprove_memo);
    });

    $('#formSubmitDisapproveReason').submit(function (e) { 
        e.preventDefault();

        let hidden_disapprove_memo = $('#hidden_disapprove_docno').val();
        let hidden_disapprove_reason = $('#text_memo_disapprove_reason').val().trim();

        if (!hidden_disapprove_reason) {
            alert('Please provide a reason for disapproving this memo.');
            return;
        } else {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "disapprove_hr_memo",
                    "disapprove_conno": hidden_disapprove_memo,
                    "memo_disapprove_reason": hidden_disapprove_reason // Add this line
                },
                dataType: "json",
                success: function (response) {
                    console.log(hidden_disapprove_reason);
                    // alert('Successfully Disapproved!');
                    toastr.success('Successfully Disapproved!');
                    tblTrainee.draw();
                    tblRevision.draw();
                    tblApproved.draw();
                    tblDisapproved.draw();
                    $('#formSubmitDisapproveReason')[0].reset();
                    $('#modalDisapproveReason').modal('hide');
                }
            });
        }
    });


    $(document).on('click', '.revise_memo', function () {
        let revision_conno = $('#textDocNo_view').val();
        $('#hidden_revision_conno').val(revision_conno);
        // $('#modalReceivingRevisionRemarks').modal('show');
    });

    $('#formSubmitRevisionRemarks').submit(function (e) { 
        e.preventDefault();

        let HRMemoRevConno = $('#hidden_revision_conno').val();
        let HRMemoRevRem = $('#text_revision_remarks').val().trim();

        if(!HRMemoRevRem){
            alert('Please add remarks for revision');
            return;
        }else{
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "submit_memo_revision_remarks",
                    "HR_conno": HRMemoRevConno,
                    "HR_rev_rem": HRMemoRevRem
                },
                dataType: "json",
                success: function (response) {
                    // dataTablesMemo.draw();
                    // Edited 1-14-25
                    send_disapproved_email();
                    tblApproved.draw();
                    tblRevision.draw();
                    tblTrainee.draw();
                    tblDisapproved.draw();
                    $('#formSubmitRevisionRemarks')[0].reset();
                    $('#modalHRMemoAppRevisionRemarks').modal('hide');
                    // alert('Successfully Submitted!');
                    toastr.success('Successfully Submitted!');

                }
            });
        }
    });

    $(document).on('click', '.btnRevision', function () {
        let view_revision = $(this).data('revision_remarks');
        console.log(view_revision);
        $('#text_view_revision_remarks').val(view_revision);
    });

    $(document).on('click', '.btnReason', function () {
        let view_revision = $(this).data('disapprove_reason');
        console.log(view_revision);
        $('#text_view_disapprove_reason').val(view_revision);
    });

    // Edited 1-13-25
    function getPreparedByEmpNo(){

        let getEmpNo = {
            "action": "get_trds_user_email",
            "EmployeeName": $('#textPreparedBy_view').val()
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: getEmpNo,
            dataType: "json",
            success: function (response) {
                $('#pdf_hidden_preparedby_empno').val(response.EmpNo);
                $('#textPreparedBy_email_view').val(response.email);

            },
            error: function (error) {
                console.error("Error fetching email for:", option, error);
            }
        });
    }

    function getNotedByEmpNo(){

        let getEmpNo = {
            "action": "get_trds_user_email",
            "EmployeeName": $('#textNotedBy_view').val()
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: getEmpNo,
            dataType: "json",
            success: function (response) {
                $('#pdf_hidden_notedby_empno').val(response.EmpNo);
            },
            error: function (error) {
                console.error("Error fetching email for:", option, error);
            }
        });
    }

// ____________________________________________________________________Edited 1-14-25____________________________________________________________________________________________________


    let getUserInfo = {
        "action": "get_trds_user_info",
        "userUsername": $('#txtApprover_username').val()
    };
    $.ajax({
        type: "POST",
        url: handler,
        data: getUserInfo,
        dataType: "json",
        success: function (response) {
            $('#txtApprover_email').val(response.email);
            $('#txtApprover_name').val(response.EmpName);
        },
        error: function (error) {
            console.error("Error fetching email for:", option, error);
        }
    });


    function GetSendToEmails() {
        let names_to = $('#selectedEditValues').val().split(',').map(name => name.trim());
        let emailList = []; // Array to store the fetched emails

        names_to.forEach(function (name) {
            if (name) {
                $.ajax({
                    type: "POST",
                    url: handler,
                    data: {
                        "action": "get_trds_user_email",
                        "EmployeeName": name
                    },
                    dataType: "json",
                    success: function (response) {
                        emailList.push(response.email); // Add the email to the list
                        $('#txtSend_to_email').val(emailList.join(','));
                    },
                    error: function (error) {
                        console.error("Error fetching email for:", name, error);
                    }
                });
            }
        });
    }

    // Edited 1-21-25
    function send_email_to_requestor() {
        let preparedByEmail = $('#txtApprover_email').val();
        let emailTO = $('#txtSend_to_email').val().split(',').map(email => email.trim()); // Split and trim emails
        // let emailCC = $('#staticEmails').val().split(',').map(email => email.trim()); // For Cc, split and trim
        let emailSubject = $('#textSubject_view').val();
        let emailDocno = $('#textDocNo_view').val();
        let preparedByName = $('#txtApprover_name').val();

        $.ajax({
            url: handler,
            type: 'POST',
            data: {
                "action": "send_email_to_requestor",
                "email_subject": emailSubject,
                "email_docno": emailDocno,
                "send_to": emailTO,
                // "cc_recipients": emailCC,
                "sent_from": preparedByEmail,
                "user_fullname": preparedByName
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
    function send_approved_email() {
        let preparedByEmail = $('#txtApprover_email').val();
        let emailTO = $('#textPreparedBy_email_view').val().split(',').map(email => email.trim()); // Split and trim emails
        // let emailCC = $('#staticEmails').val().split(',').map(email => email.trim()); // For Cc, split and trim
        let emailSubject = $('#textSubject_view').val();
        let emailDocno = $('#textDocNo_view').val();
        let preparedByName = $('#txtApprover_name').val();

        $.ajax({
            url: handler,
            type: 'POST',
            data: {
                "action": "approved_hr_memo_email",
                "email_subject": emailSubject,
                "email_docno": emailDocno,
                "send_to": emailTO,
                // "cc_recipients": emailCC,
                "sent_from": preparedByEmail,
                "user_fullname": preparedByName
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
    function send_disapproved_email() {
        let preparedByEmail = $('#txtApprover_email').val();
        let emailTO = $('#textPreparedBy_email_view').val().split(',').map(email => email.trim()); // Split and trim emails
        // let emailCC = $('#staticEmails').val().split(',').map(email => email.trim()); // For Cc, split and trim
        let emailSubject = $('#textSubject_view').val();
        let emailDocno = $('#textDocNo_view').val();
        let preparedByName = $('#txtApprover_name').val();

        $.ajax({
            url: handler,
            type: 'POST',
            data: {
                "action": "disapproved_hr_memo_email",
                "email_subject": emailSubject,
                "email_docno": emailDocno,
                "send_to": emailTO,
                // "cc_recipients": emailCC,
                "sent_from": preparedByEmail,
                "user_fullname": preparedByName
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

    // let getPreparedByEmail = {
    //     "action": "get_trds_user_email",
    //     "EmployeeName": $('#textPreparedBy_view').val()
    // };

    // $.ajax({
    //     type: "POST",
    //     url: handler,
    //     data: getPreparedByEmail,
    //     dataType: "json",
    //     success: function (response) {
    //         $('#textPreparedBy_email_view').val(response.email);
    //     },
    //     error: function (error) {
    //         console.error("Error fetching email for:", option, error);
    //     }
    // });




    // EDIT MEMO
//     $(document).on('click', '.actionEdit', function () {
//         let id = $(this).val();
//         $("input[name='user_id']").val(id);

//         let data = {
//             "action": "edit_user",
//         }
//         data = $.param(data) + "&" + $('#formUser').serialize();

//         $.ajax({
//             type: "POST",
//             url: handler,
//             data: data,
//             dataType: "json",
//             success: function (response) {
//                 console.log('response ', response['result']);
//                 if (response['result'].length > 0) {
//                     $('#textFullname').val(response['result'][0].fullname);
//                     $('#textSection').val(response['result'][0].section);
//                     $('#textUsername').val(response['result'][0].username);
//                     $('#textEmail').val(response['result'][0].email);
//                     $('#selectUserLevel').val(response['result'][0].user_level).trigger('change');
//                 }
//             }
//         });
//     });
});

</script>   