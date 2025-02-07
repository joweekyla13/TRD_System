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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header m-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title fw-bold fs-4 text-secondary">HR Memo List</h5>
                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#request_memo"><i class="fa fa-plus fa-md"></i> New Memo</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#for_approval" type="button" role="tab" aria-selected="true">For Approval</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <!-- Edited 1-15-25 -->
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#for_revision" type="button" role="tab" aria-selected="false">Disapproved</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab" aria-selected="false">Approved</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <!-- Edited 1-15-25 -->
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
                                                                <tr class="text-center">
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
                                                                <tr class="text-center">
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
                                                                <tr class="text-center">
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
                                                                <tr class="text-center">
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
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 35%">Document Number</span>
                                        <input class="form-control" type="text" name="docno" id="textDocNo" readonly required>                     
                                        <!-- <input type="hidden" name="hidden_docno" id="hidden_textDocNo">                                                    -->
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Classification</span>
                                        <select required class="form-select" type="text" name="classification" id="textClassification">
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Direct">Direct</option>
                                            <option value="Sub-Con">Sub-Con</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Reason</span>
                                        <select required class="form-select" type="text" name="reason" id="textReason">
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Newly Hired">Newly Hired</option>
                                            <option value="Maternity Leave">Maternity Leave</option>
                                            <option value="Sick Leave">Sick Leave</option>
                                            <option value="Vacation Leave">Vacation Leave</option>
                                            <option value="Promoted">Promoted</option>
                                            <option value="Transferred">Transferred</option>
                                            <option value="Regularization">Regularization</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div id="selectedOptions" class="fs-5 mb-1"></div>
                                <div class="input-group mb-4">

                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">To</span>
                                        <input class="form-select" type="text" id="textTo" name="to" list="to" placeholder="To">
                                        <datalist id="to">
                                            <!-- options go here -->
                                        </datalist>
                                    
                                    <input type="hidden" name="selectedValues" id="selectedValues">
                                    <input type="hidden" name="selectedOptionsEmail" id="selectedOptionsEmail">
                                    <!-- <input type="hidden" name="staticEmails" id="staticEmails"  value="paulgabrielle28@gmail.com, paulbariring28@gmail.com, "> -->

                                    <input type="hidden" name="staticEmails" id="staticEmails"  value="cnpoblete@pricon.ph, ldatok@pricon.ph, jmporcare@pricon.ph, eldugos@pricon.ph, havasquez@pricon.ph, rdmorallos@pricon.ph, evalfelor@pricon.ph, jgsulit@pricon.ph, ">
                                </div>
                            </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">From</span>
                                        <input class="form-control" type="text" name="from" id="textFrom" value="HRS Training and Recruitment" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Subject</span>
                                        <input class="form-control" type="text" name="subject" id="textSubject" placeholder="Enter subject" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Date Filed</span>
                                        <input class="form-control" type="date" name="date_now" id="date_now" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Department/Section</span>
                                        <input class="form-select" type="text" name="department" id="textDepartment" list="list_department" placeholder="Select department" required>
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
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Product Allocation</span>
                                        <input class="form-select" type="text" name="section" id="textSection" list="list_section" placeholder="Select Product Allocation" required>
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

                                        <!-- Edited 12-23-24 -->
                                        <!-- <th>Training Dates</th> -->

                                        <th>Training Venue</th>
                                        <th>Endorsement Date</th>
                                        <th>Exam Results</th>

                                        <!-- Edited 12-16-24 -->
                                        <th>Exam Remarks</th>

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
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Prepared By</span>
                                        <input type="hidden" class="form-control" id="textPreparedBy" name="preparedby" value="<?php echo $username; ?>" readonly>

                                        <input type="text" class="form-control" id="textPreparedByName" name="preparedbyName" readonly>

                                        <input type="hidden" id="hidden_prepared_by_email" name="hidden_prepared_by_email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Noted By</span>
                                        <input type="text" class="form-select" id="textNotedBy" name="notedby" list="notedby" placeholder="Noted by" value="Emma Alfelor" required>
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
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Employee Number</span>
                                            <input class="form-control" id="textEmpNo" name="empNo" list="EmpNo" placeholder="Enter employee number" style="text-transform: uppercase">
                                            <datalist id="EmpNo">
                                                <option value="Hello">Hello</option>
                                            </datalist>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Employee Name</span>
                                            <input type="text" class="form-control" id="textFullName" name="fullname" placeholder="Full name" readonly>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Date Hired</span>
                                            <input type="date" class="form-control" id="textDateHired" name="date_hired" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Position/Dept./Section</span>
                                            <input type="text" class="form-control" id="textpds" name="pds" placeholder="Position/Department/Section" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- <div class="col-md-4">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Training Dates</span>
                                            <input type="text" class="form-control" id="textFromTo" name="fromto" placeholder="From - To">
                                        </div>
                                    </div> -->

                                    <div class="col-md-6">
                                            <div class="input-group mb-4">
                                                <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Training Venue</span>
                                            <input type="text" class="form-control" id="textVenue" name="venue" placeholder="Training venue">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Endorsement Date</span>
                                            <input type="date" class="form-control" id="textEndorsementDate" name="endorsementDate">
                                        </div>
                                    </div>
                                </div> <hr>

                                <div class="mb-3">
                                    <p class="fw-bold">Category</p>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group mt-2 mb-4">

                                    <!-- Edited 12-23-24 -->
                                    <!-- <input class="form-control" id="textTitle" name="title" list="title" placeholder="Search General Knowledge">
                                        <datalist id="title"></datalist> -->


                                    <select class="form-select" id="textTitle" name="title" list="title" placeholder="Search General Knowledge">
                                        <option value="">Select One</option>
                                        <option value="General Knowledge 1">General Knowledge 1</option>
                                        <option value="General Knowledge 2">General Knowledge 2</option>
                                        <option value="General Knowledge 3">General Knowledge 3</option>
                                        <option value="8-Hour Safety Mandatory Training">8-Hour Safety Mandatory Training</option>
                                        <option value="Basic Job Knowledge">Basic Job Knowledge</option>
                                    </select>
                                        

                                    <!-- Edited 12-23-24 -->
                                    <select class="form-select" id="textResult" name="result">
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Passed">Passed</option>
                                        <option value="Complied">Complied</option>
                                        <option value="Hands-on">Hands-on</option>
                                        <option value="Failed">Failed</option>
                                    </select>

                                    <!-- Edited 12-23-24 -->
                                    <input class="form-control" id="textTitleRemarks" name="title_remarks" placeholder="Training Remarks">

                                    <!-- Edited 12-23-24 -->
                                    <!-- <input class="form-control" id="textTitleFromTo" name="textTitleFromTo" placeholder="From - To" readonly> -->
                                    
                                    <button type="button" id="btnSelect" name="btnSelect" class="btn btn-primary">Add to Table</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover"  id="tblGeneralKnowledge">

                                        <thead class="table-secondary">
                                            <tr>
                                            <th>Title</th>
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

        <!-- Edited 1-15-25 -->
        <!-- Modal Edit Add Employee -->
        <div class="modal fade" id="editAddEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Edit Trainee Details</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <form id="formSubmitEditAddEmployee">

                                <input class="form-control" id="textDocNo_edit" name="DocNo_edit" hidden>
                                <input class="form-control" id="textClassification_edit" name="Classification_edit" hidden>
                                <input class="form-control" id="textReason_edit" name="Reason_edit" hidden>
                                <input class="form-control" id="textFrom_edit" name="From_edit" hidden>
                                <input class="form-control" id="selectedEditValues_edit" name="selectedEditValues_edit" hidden>
                                <input class="form-control" id="selectedEditEmails_edit" name="selectedEditEmails_edit" hidden>
                                <input class="form-control" id="subject_edit" name="subject_edit" hidden>
                                <input class="form-control" id="textdate_now_edit" name="date_now_edit" hidden>
                                <input class="form-control" id="textDepartment_edit" name="Department_edit" hidden>
                                <input class="form-control" id="textSection_edit" name="Section_edit" hidden>
                                <input class="form-control" id="textPreparedBy_edit" name="PreparedBy_edit" hidden>
                                <input class="form-control" id="textNotedBy_edit" name="NotedBy_edit" hidden>
                                <input class="form-control" id="textUsername_edit" name="username_edit" hidden>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mt-2 mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Employee Number</span>
                                            <input class="form-control" id="textEmpNo_edit" name="empNo_edit" list="EmpNo" placeholder="Enter employee number" style="text-transform: uppercase">
                                            <datalist id="EmpNo">
                                            
                                            </datalist>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Employee Name</span>
                                            <input type="text" class="form-control" id="textFullName_edit" name="fullname_edit" placeholder="Full name">
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Date Hired</span>
                                            <input type="date" class="form-control" id="textDateHired_edit" name="date_hired_edit">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Position/Dept./Section</span>
                                            <input type="text" class="form-control" id="textpds_edit" name="pds_edit" placeholder="Position/Department/Section">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- <div class="col-md-4">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Training Dates</span>
                                            <input type="text" class="form-control" id="textFromTo" name="fromto" placeholder="From - To">
                                        </div>
                                    </div> -->

                                    <div class="col-md-6">
                                            <div class="input-group mb-4">
                                                <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Training Venue</span>
                                            <input type="text" class="form-control" id="textVenue_edit" name="venue_edit" placeholder="Training venue">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Endorsement Date</span>
                                            <input type="date" class="form-control" id="textEndorsementDate_edit" name="endorsementDate_edit">
                                        </div>
                                    </div>
                                </div> <hr>

                                <div class="mb-3">
                                    <p class="fw-bold">General Knowledge</p>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group mt-2 mb-4">

                                    <select class="form-select" id="textTitle_edit" name="title_edit" list="title" placeholder="Search General Knowledge">
                                        <option value="">Select One</option>
                                        <option value="General Knowledge 1">General Knowledge 1</option>
                                        <option value="General Knowledge 2">General Knowledge 2</option>
                                        <option value="General Knowledge 3">General Knowledge 3</option>
                                        <option value="8-Hour Safety Mandatory Training">8-Hour Safety Mandatory Training</option>
                                        <option value="Basic Job Knowledge">Basic Job Knowledge</option>
                                    </select>
                                        
                                    <select class="form-select" id="textResult_edit" name="result_edit">
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Passed">Passed</option>
                                        <option value="Complied">Complied</option>
                                        <option value="Hands-on">Hands-on</option>
                                        <option value="Failed">Failed</option>
                                    </select>

                                    <!-- Edited 1-15-25 -->
                                    <input class="form-control" id="textTitleRemarks_edit" name="title_remarks_edit" placeholder="Training Remarks">

                                    <!-- Edited 1-15-25 -->
                                    <!-- <input class="form-control" id="textTitleFromTo" name="textTitleFromTo" placeholder="From - To" readonly> -->
                                    
                                    <button type="button" id="btnSelect_edit" name="btnSelect_edit" class="btn btn-primary">Add to Table</button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover"  id="tblGeneralKnowledge_edit">

                                        <thead class="table-secondary">
                                            <tr>
                                            <th>Title</th>
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
                                <hr>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" id="btnAddEmployee_edit"><i class="fa-solid fa-check me-2" style="color: white"></i>ADD</button>
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

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
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
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 35%">Document Number</span>
                                        <input class="form-control" name="docno" id="textDocNo_view" readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Classification</span>
                                        <select class="form-select" type="text" name="classification_view" id="textClassification_view" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Direct">Direct</option>
                                            <option value="Sub-Con">Sub-Con</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Reason</span>
                                        <select class="form-select" type="text" name="reason_view" id="textReason_view" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Newly Hired">Newly Hired</option>
                                            <option value="Maternity Leave">Maternity Leave</option>
                                            <option value="Sick Leave">Sick Leave</option>
                                            <option value="Vacation Leave">Vacation Leave</option>
                                            <option value="Promoted">Promoted</option>
                                            <option value="Transferred">Transferred</option>
                                            <option value="Regularization">Regularization</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div id="selectedEditOptions" class="fs-5 mb-1"></div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">To</span>
                                        <input class="form-select" type="text" id="textTo_view" name="to_view" list="to" placeholder="To" multiple>
                                        <datalist id="to">
                                        </datalist>

                                        <input type="hidden" name="selectedEditValues" id="selectedEditValues">
                                        <input type="hidden" name="selectedEditEmails" id="selectedEditEmails">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">From</span>
                                        <input class="form-control" name="from" id="textFrom_view" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Subject</span>
                                        <input class="form-control" name="subject_view" id="textSubject_view">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Date Filed</span>
                                        <input class="form-control" type="date" name="date_now_view" id="textdate_now_view" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Department/Section</span>
                                        <!-- <select class="form-select" type="text" name="department_view" id="textDepartment_view" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="PPS">PPS</option>
                                            <option value="CN">CN</option>
                                            <option value="YF">YF</option>
                                            <option value="TS">TS</option>
                                        </select> -->
                                        <input class="form-select" type="text" name="department_view" id="textDepartment_view" list="list_department" placeholder="Select department" required>
                                        <datalist id="list_department">
                                            
                                        </datalist>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Product Allocation</span>
                                        <!-- <select class="form-select" type="text" name="section_view" id="textSection_view" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Production">Production</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="PPC">PPC</option>
                                            <option value="LQC">LQC</option>
                                        </select> -->
                                        <input class="form-select" type="text" name="section_view" id="textSection_view" list="list_section" placeholder="Select Product Allocation" required>
                                        <datalist id="list_section">

                                        </datalist>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Edited 1-15-25 -->
                            <div class="d-flex justify-content-end mb-3">
                                <button type="button" id="btn_editAddEmployeeModal" class="btn btn-info d-none" data-bs-toggle="modal" data-bs-target="#editAddEmployeeModal"><i class="fa-solid fa-user-plus me-2" style="color: white"></i>ADD TRAINEE</button>
                            </div>

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
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Prepared By</span>
                                        <input class="form-control" id="textPreparedBy_view" name="preparedby" readonly>
                                        <input type="hidden" id="textPreparedBy_email_view" name="PreparedBy_email_view" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 35%">Noted By</span>
                                            <input type="text" class="form-select" id="textNotedBy_view" name="notedby_view" list="notedby" placeholder="Noted by" required>
                                                <datalist id="notedby">

                                                </datalist>
                                            <input type="hidden" class="form-control" id="textUsername_view" name="username_view">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 d-none" id="reason_div">
                                        <!-- <textarea class="form-control mb-2" id="disapprove_reason" name="disapprove_reason" placeholder="Reason" style="height: 100px"></textarea> -->
                                        <!-- <button type="button" class="btn btn-secondary btn-sm float-end ms-2" id="close_reason_div"><i class="fa-solid fa-xmark me-2" style="color: white"></i>Close</button> -->
                                    
                                </div>
                            </div>
                            <div class="modal-footer" id="footer_btn">
                                <!-- <button type="button" class="btn btn-success approve_memo" id="approve_memo" name="approve_memo"><i class="fa-solid fa-check me-2" style="color: white"></i>APPROVE</button>
                                <button type="button" class="btn btn-warning revise_memo" id="revise_memo" name="revise_memo"><i class="fa-solid fa-rotate-left me-2" style="color: white"></i>FOR REVISION</button> -->
                                <button type="submit" class="btn btn-primary float-end" id="submit_reason"><i class="fa-solid fa-check me-2" style="color: white"></i>Submit</button>
                            </form>

                                <form method="POST" action="pdf_hr_memo.php" id="formGeneratePDF" target="_blank">

                                    <!-- Generate PDF Button 12-12-24 -->
                                    <!-- HIDDEN DOCNO -->
                                    <input type="hidden" id="pdf_hidden_docno" name="pdf_hidden_docno">
                                    <input type="hidden" id="pdf_hidden_empno" name="pdf_hidden_empno">
                                    <!-- <input type="text" id="hidden_hr_memo" name="hidden_hr_memo"> -->

                                    <!-- Edited 1-13-25 -->
                                    <input type="hidden" id="pdf_hidden_preparedby_empno" name="pdf_hidden_preparedby_empno">
                                    <input type="hidden" id="pdf_hidden_notedby_empno" name="pdf_hidden_notedby_empno">

                                    <input type="submit" class="btn btn-warning btn_hr_memo_pdf" id="btn_hr_memo_pdf" name="btn_hr_memo_pdf" value="Generate PDF" hidden>
                                </form>
                                <button type="button" class="btn btn-dark" id="close_memo" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                                
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

        <!-- EDITED 12-3-24 -->
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

    $('#memo').each(function() {
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

    // Edited 1-16-25
    $('#addEmployeeModal').on('hidden.bs.modal', function () {
        $('#request_memo').modal('show');

    });

    // Edited 1-16-25
    $('#editAddEmployeeModal').on('hidden.bs.modal', function () {
        $('#view_memo').modal('show');

    });

    let handler = "./handler/handler.php";
    let today = new Date().toISOString().split('T')[0];
    $('#date_now').val(today);

    // ADDING DATA IN GENERAL KNOWLEDGE TABLE
    let tblGenKnow = $('#tblGeneralKnowledge').DataTable();

    let tblGenKnowEdit = $('#tblGeneralKnowledge_edit').DataTable();

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
    //     "sAjaxSource": "./server_side_scripts/user.php",
    //     "drawCallback": function( settings ) {
    //         $('#tbl_trainee').attr('style','width:100%;');
    //     }
    // });

    // 12/02/2024
    function initializeDataTable(tableId, status) {
        return $(tableId).DataTable({
            "aaSorting": [],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "./server_side_scripts/user.php",
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
    // function generateDocumentNumber(counter) {
    //     let now = new Date();
    //     let month = (now.getMonth() + 1).toString().padStart(2, '0');
    //     let day = now.getDate().toString().padStart(2, '0');
    //     let year = now.getFullYear().toString().slice(-2);

    //     let documentNumber = `${month}${year}-${day}_MR${year}-${counter.toString().padStart(3, '0')}`;

    //     $('#textDocNo').val('HRS Training - ' + documentNumber);
    //     $('#hidden_textDocNo').val('HRS Training - ' + documentNumber);
    // }

    function generateDocumentNumber(counter) {
        let now = new Date(); // Ensure we get the current date each time the function is called
        let month = (now.getMonth() + 1).toString().padStart(2, '0');
        let year = now.getFullYear().toString().slice(-2);

        let documentNumber = `${month}${year}-${counter.toString().padStart(3, '0')}`;
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
                // Parse the server response
                let data = JSON.parse(response);
                let lastMonth = data.lastMonth;   // e.g., "01" for January
                let lastYear = data.lastYear;     // e.g., "25" for 2025
                let lastCounter = data.lastCounter; // e.g., 1 for counter

                let now = new Date();
                let currentMonth = (now.getMonth() + 1).toString().padStart(2, '0');
                let currentYear = now.getFullYear().toString().slice(-2); // last 2 digits of the year

                let nextCounter;
                // If the current month matches the last month's, increment the counter
                if (currentMonth === lastMonth && currentYear === lastYear) {
                    nextCounter = lastCounter + 1;
                } else {
                    // If the month or year has changed, reset the counter
                    nextCounter = 1; // Start from 001
                }

                // Log the fetched values and next counter
                console.log("Fetched Last Month: " + lastMonth);
                console.log("Fetched Last Year: " + lastYear);
                console.log("Fetched Last Counter: " + lastCounter);
                console.log("Next Counter: " + nextCounter);

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

    // Edited 12-16-24
    $('#btnSelect').on('click', function () {
        let add_title = $('#textTitle').val();

        let add_result = $('#textResult').val();

        // Edited 12-23-24
        let add_remarks = $('#textTitleRemarks').val();

        // Edited 12-23-24
        // let add_fromto = $('#textTitleFromTo').val();

        let add_empNo = $('#textEmpNo').val();
        let add_fullname = $('#textFullName').val();

        console.log('Title:', add_title);
        console.log('Result:', add_result);

        // Edited 12-23-24
        console.log('Remarks:', add_remarks);

        // Edited 12-23-24
        // console.log('FromTo:', add_fromto);

        console.log('EmpNo:', add_empNo);

        // Check if title or employee number is empty
        if (add_empNo === '' || add_fullname === '') {
            alert('Please enter an employee number first.');
            return;
        }

        if (add_title === '') {
            alert('Please select a title first.');
            return;
        }

        // Edited 12-23-24
        // if (add_result === '' || add_remarks === '' || add_fromto === '') {
        //     alert('Loading data please wait.');
        //     return;
        // }

        if (add_result === '' || add_remarks === '') {
            alert('Loading data please wait.');
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

            // Edited 12-23-24
            $('#textResult').val('');

            // Edited 12-23-24
            // $('#textTitleFromTo').val('');

            // Edited 12-23-24
            $('#textTitleRemarks').val('');

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

            // Edited 12-16-24
            gn_remarks: add_remarks,

            // Edited 12-23-24
            // gn_fromto: add_fromto,
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

            // Edited 12-16-24
            add_remarks,

            // Edited 12-23-24
            // add_fromto,
            '<center><button type="button" class="btn btn-warning btnRemoveGK">Remove</button></center>'
        ]).draw();

        // Clear input fields after adding
        $('#textTitle').val('');

        // Edited 12-23-24
        $('#textResult').val('');

        // Edited 12-23-24
        $('#textTitleRemarks').val('');

        // Edited 12-23-24
        // $('#textTitleFromTo').val('');
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
            // $('#textFromTo').val('');
            $('#textVenue').val('');
            $('#textEndorsementDate').val('');
            $('#textTitle').val('');
            $('#textResult').val('');

            // Edited 12-23-24
            // $('#textTitleRemarks').val('');

            // Edited 12-23-24
            // $('#textTitleFromTo').val('');

            tblGenKnow.clear().draw();

        }
    });

    // CLEAR textResult WHEN textTitle IS EMPTY
    $('#textTitle').on('input', function () {
        let check_title = $(this).val();

        if(check_title === ''){
            $('#textResult').val('');

            // Edited 12-23-24
            // $('#textTitleRemarks').val('');

            // Edited 12-23-24
            // $('#textTitleFromTo').val('');
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
    //Original

    // Edited 12-23-24
    // $('#textTitle').on('change', function () {
    //     let generalKnow = $(this).val();
    //     let genKnowEmpNo = $('#textEmpNo').val();

    //     if (generalKnow && genKnowEmpNo) {
    //         $.ajax({
    //             type: "POST",
    //             url: handler,
    //             data: {
    //                 "action": "get_results",
    //                 "textTitle": generalKnow,
    //                 "textEmpNo": genKnowEmpNo,
    //             },
    //             dataType: "json",
    //             success: function (response) {
    //                 if (response.length > 0) {

    //                     // Edited 12-23-24
    //                     // $('#textResult').val(response.join(', '));
    //                 } else {

    //                     // Edited 12-23-24
    //                     // $('#textResult').val('');
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('AJAX Error: ' + status + ' ' + error);
    //             }
    //         });
    //     }
    // });

    // EDITED 12-23-24
    // GETTING TRAINING DATES EQUAL TO GENERAL KNOWLEDGE
    // $('#textTitle').on('change', function () {
    //     let generalKnow = $(this).val();
    //     let genKnowEmpNo = $('#textEmpNo').val();

    //     if (generalKnow && genKnowEmpNo) {
    //         $.ajax({
    //             type: "POST",
    //             url: handler,
    //             data: {
    //                 "action": "get_training_dates",
    //                 "textTitle": generalKnow,
    //                 "textEmpNo": genKnowEmpNo,
    //             },
    //             dataType: "json",
    //             success: function (response) {
    //                 if (response.Result && response.fromto) {

    //                     // Edited 12-23-24
    //                     // $('#textTitleFromTo').val(response.fromto);

    //                     // Edited 12-23-24
    //                     // $('#textTitleRemarks').val(response.Remarks);
    //                 } else {

    //                     // Edited 12-23-24
    //                     // $('#textTitleFromTo').val('');

    //                     // Edited 12-23-24
    //                     // $('#textTitleRemarks').val('');
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('AJAX Error: ' + status + ' ' + error);
    //             }
    //         });
    //     }
    // });
    
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
                        // $('#textFromTo').val(response.fromto);
                    } else {
                        $('#textVenue').val('');
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

    // Edited 1-22-25
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

    // get_department with parenthesis section
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
    get_section = $.param(get_section) + "&" + $('#textSection').serialize();

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

    // GETTING "TO" FROM tbl_useraccnt
    let to = {
        "action": "get_to",
    };
    to = $.param(to) + "&" + $('#textTo').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: to,
        dataType: "json",
        success: function (response) {
            let dataList = $('#to');
            dataList.empty();
            $.each(response, function (index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    let selectedOptions = [];
    let selectedEmails = {};

    // Listen to the change event for option selection
    $('#textTo').on('change', function () {
        let value = $(this).val().trim();

        if (value) {
            // Validate input against the datalist options
            let isValid = false;
            $('#to option').each(function () {
                if ($(this).val() === value) {
                    isValid = true;
                    return false; // Exit the loop early
                }
            });

            if (isValid) {
                if (selectedOptions.includes(value)) {
                    // If it is already in the list, remove it
                    removeOption(value);
                } else {
                    // Add the value to the list
                    selectedOptions.push(value);

                    // Fetch and add the email for the new value
                    fetchEmailForOption(value);
                }
            } else {
                alert('This name is not in the list of choices. Please select another one.');
            }

            // Clear the input field so the user can select another option
            $('#textTo').val('');
        }
    });

    // Function to render the selected options as tags
    function renderSelectedOptions() {
        $('#selectedOptions').find('span').remove(); // Clear existing tags, but keep the input

        selectedOptions.forEach(function (option) {
            // Create a tag for each selected option
            let tag = $('<span>').addClass('badge bg-primary me-1').text(option);

            // Add a remove button to the tag
            let removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function () {
                removeOption(option);
            });

            // Append the remove button to the tag
            tag.append(removeBtn);

            // Append the tag to the selectedOptions container before the input field
            $('#selectedOptions').prepend(tag);
        });

        // Update the hidden input fields
        $('#selectedValues').val(selectedOptions.join(', '));
        $('#selectedOptionsEmail').val(Object.values(selectedEmails).join(', '));
    }

    // Function to remove a selected option
    function removeOption(option) {
        // Remove the option from the array
        selectedOptions = selectedOptions.filter(function (item) {
            return item !== option;
        });

        // Remove the corresponding email from the mapping
        delete selectedEmails[option];

        // Re-render the selected options
        renderSelectedOptions();
    }

    // Function to fetch the email for a selected option
    function fetchEmailForOption(option) {
        let getEmailTo = {
            "action": "get_trds_user_email",
            "EmployeeName": option
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: getEmailTo,
            dataType: "json",
            success: function (response) {
                if (response.email) {
                    selectedEmails[option] = response.email;
                } else {
                    console.error("No email found in response:", response);
                }

                // Re-render after fetching the email
                renderSelectedOptions();
            },
            error: function (error) {
                console.error("Error fetching email for:", option, error);
            }
        });
    }




    // EDIT TO
    // let selectedEditOptions = [];

    // // Listen to the change event for option selection
    // $('#textTo_view').on('change', function() {
    //     let value = $(this).val().trim();

    //     if (value) {
    //         // Check if the value is already in selectedEditOptions
    //         if (selectedEditOptions.includes(value)) {
    //             // If it is, remove it
    //             removeEditOption(value);
    //         } else {
    //             // If it's not, add it
    //             selectedEditOptions.push(value);
    //         }

    //         // Clear the input field so the user can select another option
    //         $('#textTo_view').val('');

    //         // Update the hidden input field with the selected values
    //         $('#selectedEditValues').val(selectedEditOptions.join(', '));

    //         // Display the selected options as tags
    //         renderEditSelectedOptions();
    //     }
    // });

    // // Function to render the selected options as tags
    // function renderEditSelectedOptions() {
    //     $('#selectedEditOptions').find('span').remove(); // Clear existing tags, but keep the input

    //     selectedEditOptions.forEach(function(option) {
    //         // Create a tag for each selected option
    //         let tag = $('<span>').addClass('badge bg-primary me-1').text(option);

    //         // Add a remove button to the tag
    //         let removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function() {
    //             removeEditOption(option);
    //         });

    //         // Append the remove button to the tag
    //         tag.append(removeBtn);

    //         // Append the tag to the selectedEditOptions container
    //         $('#selectedEditOptions').prepend(tag);
    //     });
    // }

    // // Function to remove a selected option
    // function removeEditOption(option) {
    //     // Remove the option from the array
    //     selectedEditOptions = selectedEditOptions.filter(function(item) {
    //         return item !== option;
    //     });

    //     // Update the hidden input field
    //     $('#selectedEditValues').val(selectedEditOptions.join(', '));

    //     // Re-render the selected options
    //     renderEditSelectedOptions();
    // }

    // Original
    let selectedEditOptions = [];
    let selectedEditEmails = {};

    // Listen to the change event for option selection
    $('#textTo_view').on('change', function () {
        let value = $(this).val().trim();

        if (value) {
            // Validate input against the datalist options
            let isValid = false;
            $('#to option').each(function () {
                if ($(this).val() === value) {
                    isValid = true;
                    return false; // Exit the loop early
                }
            });

            if (isValid) {
                if (selectedEditOptions.includes(value)) {
                    // If it is already in the list, remove it
                    removeEditOption(value);
                } else {
                    // Add the value to the list
                    selectedEditOptions.push(value);

                    // Fetch and add the email for the new value
                    fetchEmailForEditOption(value);
                }
            } else {
                alert('This name is not in the list of choices. Please select another one.');
            }

            // Clear the input field so the user can select another option
            $('#textTo_view').val('');
        }
    });

    // Function to render the selected options as tags
    function renderEditSelectedOptions() {
        // Clear existing tags
        $('#selectedEditOptions').find('span').remove();

        // Render new tags for each selected option
        selectedEditOptions.forEach(function (option) {
            // Create a tag for the selected option
            let tag = $('<span>').addClass('badge bg-primary me-1').text(option);

            // Add a remove button to the tag
            let removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function () {
                removeEditOption(option);
            });

            // Append the remove button to the tag
            tag.append(removeBtn);

            // Append the tag to the selectedEditOptions container
            $('#selectedEditOptions').prepend(tag);
        });

        // Update hidden inputs
        $('#selectedEditValues').val(selectedEditOptions.join(', '));
        $('#selectedEditEmails').val(Object.values(selectedEditEmails).join(', '));
    }

    // Function to remove a selected option
    function removeEditOption(option) {
        // Remove the option from the array
        selectedEditOptions = selectedEditOptions.filter(function (item) {
            return item !== option;
        });

        // Remove the corresponding email from the mapping
        delete selectedEditEmails[option];

        // Update hidden inputs and re-render the tags
        renderEditSelectedOptions();
    }

    // Function to fetch the email for a selected option
    function fetchEmailForEditOption(option) {
        let getEmailTo = {
            "action": "get_trds_user_email",
            "EmployeeName": option
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: getEmailTo,
            dataType: "json",
            success: function (response) {
                if (response.email) {
                    selectedEditEmails[option] = response.email;
                } else {
                    console.error("No email found in response:", response);
                }

                // Re-render the selected options after fetching the email
                renderEditSelectedOptions();
            },
            error: function (error) {
                console.error("Error fetching email for:", option, error);
            }
        });
    }

    // Edited 12-10-24
    // let selectedEditOptions = [];
    // let selectedEditEmails = {};

    // // Listen to the change event for option selection
    // $('#textTo_view').on('change', function () {
    //     let value = $(this).val().trim();

    //     if (value) {
    //         // Validate input against the datalist options
    //         let isValid = false;

    //         // Compare input value with options, case-insensitively
    //         $('#to_view option').each(function () {
    //             if ($(this).val().trim().toLowerCase() === value.toLowerCase()) {
    //                 isValid = true;
    //                 return false; // Exit the loop early
    //             }
    //         });

    //         if (isValid) {
    //             if (selectedEditOptions.includes(value)) {
    //                 // If it is already in the list, remove it
    //                 removeEditOption(value);
    //             } else {
    //                 // Add the value to the list
    //                 selectedEditOptions.push(value);

    //                 // Fetch and add the email for the new value
    //                 fetchEmailForEditOption(value);
    //             }
    //         } else {
    //             alert('This name is not in the list of choices. Please select another one.');
    //         }

    //         // Clear the input field so the user can select another option
    //         $('#textTo_view').val('');
    //     }
    // });

    // // Function to render the selected options as tags
    // function renderEditSelectedOptions() {
    //     // Clear existing tags
    //     $('#selectedEditOptions').find('span').remove();

    //     // Render new tags for each selected option
    //     selectedEditOptions.forEach(function (option) {
    //         // Create a tag for the selected option
    //         let tag = $('<span>').addClass('badge bg-primary me-1').text(option);

    //         // Add a remove button to the tag
    //         let removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function () {
    //             removeEditOption(option);
    //         });

    //         // Append the remove button to the tag
    //         tag.append(removeBtn);

    //         // Append the tag to the selectedEditOptions container
    //         $('#selectedEditOptions').prepend(tag);
    //     });

    //     // Update hidden inputs
    //     $('#selectedEditValues').val(selectedEditOptions.join(', '));
    //     $('#selectedEditEmails').val(Object.values(selectedEditEmails).join(', '));
    // }

    // // Function to remove a selected option
    // function removeEditOption(option) {
    //     // Remove the option from the array
    //     selectedEditOptions = selectedEditOptions.filter(function (item) {
    //         return item !== option;
    //     });

    //     // Remove the corresponding email from the mapping
    //     delete selectedEditEmails[option];

    //     // Update hidden inputs and re-render the tags
    //     renderEditSelectedOptions();
    // }

    // // Function to fetch the email for a selected option
    // function fetchEmailForEditOption(option) {
    //     let getEmailTo = {
    //         "action": "get_trds_user_email",
    //         "EmployeeName": option
    //     };

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: getEmailTo,
    //         dataType: "json",
    //         success: function (response) {
    //             if (response.email) {
    //                 selectedEditEmails[option] = response.email;
    //             } else {
    //                 console.error("No email found in response:", response);
    //             }

    //             // Re-render the selected options after fetching the email
    //             renderEditSelectedOptions();
    //         },
    //         error: function (error) {
    //             console.error("Error fetching email for:", option, error);
    //         }
    //     });
    // }


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
                console.log('Username: ', response);
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
    // ???

    // Edited 12-23-24
    // $('#textTitle').on('change', function () {
    //     let generalKnow = $(this).val();
    //     let genKnowEmpNo = $('#textEmpNo').val();

    //     if (generalKnow && genKnowEmpNo) {
    //         $.ajax({
    //             type: "POST",
    //             url: handler,
    //             data: {
    //                 "action": "get_results",
    //                 "textTitle": generalKnow,
    //                 "textEmpNo": genKnowEmpNo,
    //             },
    //             dataType: "json",
    //             success: function (response) {
    //                 if (response.length > 0) {

    //                     // Edited 12-23-24
    //                     // $('#textResult').val(response.join(', '));

    //                 } else {

    //                     // Edited 12-23-24
    //                     // $('#textResult').val('');
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('AJAX Error: ' + status + ' ' + error);
    //             }
    //         });
    //     }
    // });

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

        let empNo = $('#textEmpNo').val().trim();
        let fullname = $('#textFullName').val().trim();
        let dateHired = $('#textDateHired').val().trim();
        let pds = $('#textpds').val().trim();
        let venue = $('#textVenue').val().trim();
        let endorsementDate = $('#textEndorsementDate').val().trim();

        if (!empNo || !fullname || !dateHired || !pds || !endorsementDate) {
            alert('Please fill up all the fields!');
            return;
        }

        if(tblGenKnow.rows().data().length === 0){
            alert("General Knowledge table is empty!");
            return;
        }

        // Check if required fields are filled
        if (empNo && fullname && dateHired && endorsementDate) {

            // Check if employee number already exists in the table
            let empExists = false;
            $('#tbl_request tbody tr').each(function () {
                let existingEmpNo = $(this).find('td:eq(1)').text().trim();
                console.log('Row Employee No:', existingEmpNo); // Log every row's Employee Number
                if (existingEmpNo === empNo) {
                    empExists = true;
                    return false; // Exit the loop
                }
            });

            if (empExists) {
                alert('Employee with Employee Number "' + empNo + '" is already in the request table.');
                $('#textEmpNo').val('');
                $('#textFullName').val('');
                $('#textDateHired').val('');
                $('#textpds').val('');
                $('#textVenue').val('');
                $('#textEndorsementDate').val('');
                $('#textTitle').val('');
                $('#textResult').val('');

                // Edited 12-23-24
                // $('#textTitleRemarks').val('');

                // Edited 12-23-24
                // $('#textTitleFromTo').val('');

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
                // fromTo: fromTo,
                venue: venue,
                endorsementDate: endorsementDate,
            };

            if (!window.employeeDataArray) {
                window.employeeDataArray = []; // Initialize if doesn't exist
            }

            // Add this employee's data to the global array
            window.employeeDataArray.push(employeeData);

            // Use knowledgeList to format titles and results for the table
            let formattedTitles = knowledgeList.map(item => item.gn_title).join(' | ');

            // Edited 12-23-24
            // let formattedFromTo = knowledgeList.map(item => item.gn_fromto).join(' | ');

            let formattedResults = knowledgeList.map(item => item.gn_result).join(' | ');

            // Edited 12-16-24
            let formattedRemarks = knowledgeList.map(item => item.gn_remarks).join(' | ');

            table.row.add([
                '<center><button type="button" class="btn btn-danger btnRemoveEmp">Remove</button></center>',
                empNo,
                fullname,
                dateHired,
                pds,
                formattedTitles,

                // Edited 12-23-24
                // formattedFromTo,
                // fromTo,

                venue,
                endorsementDate,
                formattedResults,

                // Edited 12-16-24
                formattedRemarks
            ]).draw();

            toastr.success('Successfully Added!');

            // Clear input fields after adding
            $('#textEmpNo').val('');
            $('#textFullName').val('');
            $('#textDateHired').val('');
            $('#textpds').val('');
            $('#textVenue').val('');
            $('#textEndorsementDate').val('');
            $('#textTitle').val('');
            $('#textResult').val('');

            // Edited 12-23-24
            // $('#textTitleRemarks').val('');

            // Edited 12-23-24
            // $('#textTitleFromTo').val('');

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

    // OLD ADD NEW MEMO
    // $("#formAddMemo").submit(function (e) {
    //     e.preventDefault();

    //     let allData = [];

    //     // Check if the table contains any data
    //     if (!table.data().any()) {
    //         alert('Please add at least one trainee to the table!');
    //         return false;
    //     }

    //     // Check if there are any visible rows
    //     let visibleRows = table.rows({ filter: 'applied' }).data().length;
    //     if (visibleRows === 0) {
    //         alert('Please add at least one visible trainee to the table!');
    //         return false;
    //     }

    //     let memoClass = $('#textClassification').val();
    //     let memoReas = $('#textReason').val();
        
    //     let memoTo = $('#selectedValues').val();
    
    //     let memoSubj = $('#textSubject').val();
    //     let memoDept = $('#textDepartment').val();
    //     let memoSec = $('#textSection').val();
    //     let memoNote = $('#textNotedBy').val();
    //     let memoUser = $('#textUsername').val();


    //     // Collect data from visible rows
    //     table.rows({ filter: 'applied' }).every(function () {
    //         let rowData = this.data();
    //         // EDITED
    //         allData.push({
    //             empNo: rowData[1].trim(),
    //             fullname: rowData[2].trim(),
    //             date_hired: rowData[3].trim(),
    //             pds: rowData[4].trim(),
    //             title: rowData[5].trim(),
    //             fromto: rowData[6].trim(),
    //             venue: rowData[7].trim(),
    //             endorsementDate: rowData[8].trim(),
    //             remarks: rowData[9].trim()
    //         });
    //     });

    //     console.log('Collected Table Data:', allData);

    //     if (!memoClass || !memoReas || !memoTo.trim() || !memoSubj.trim() || !memoDept || !memoSec || !memoNote.trim()) {
    //         alert('Please fill up all required fields!');
    //         return false;
    //     }

    //     let data = {
    //         "action": "add_memo",
    //         "rows": allData
    //     };

    //     data = $.param(data) + "&" + $('#formAddMemo').serialize();

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
    //                 $('#textClassification').val('0');
    //                 $('#textReason').val('0');
    //                 $('#selectedValues').val('');
    //                 $('#textSubject').val('');
    //                 $('#textDepartment').val('0');
    //                 $('#textSection').val('0');
    //                 $('#textNotedBy').val('');
    //                 $('#textUsername').val('');
    //                 $('#selectedOptions').empty();

    //                 selectedOptions.length = 0;

    //                 $('#request_memo').modal('hide');

    //                 dataTablesMemo.draw();
    //                 table.clear().draw();

    //                 fetchLastDocNumber();

    //                 toastr.success('New Memo Added!');
    //             }
    //         },
    //         error: function (jqXHR, textStatus, errorThrown) {
    //             alert("AJAX Error: " + textStatus);  // Show AJAX error
    //         }
    //     });
    // });

    // NEW ADD MEMO
    $("#formAddMemo").submit(function (e) {
        e.preventDefault();

        // Collect the form values and trim whitespace
        let memo_docno = $('#textDocNo').val().trim();
        let memo_classification = $('#textClassification').val();
        let memo_reason = $('#textReason').val();
        let memo_to = $('#selectedValues').val().trim();
        let memo_subject = $('#textSubject').val().trim();
        let memo_department = $('#textDepartment').val().trim();
        let memo_section = $('#textSection').val().trim();
        let memo_noted_by = $('#textNotedBy').val().trim();

        // Validate that none of the fields are empty or just whitespace
        if (!memo_docno || !memo_classification || !memo_reason || !memo_to || !memo_subject || !memo_department || !memo_section || !memo_noted_by) {
            alert('Please fill up all the fields!');
            return;
        }

        // AJAX call to check if the document number exists
        $.ajax({
            type: "POST",
            url: handler,
            data: { action: "check_docno", checkDocNum: memo_docno },
            dataType: "json",
            success: function (response) {
                if (response.docno) {
                    alert("Invalid Document Number. Please reload the page.");
                    fetchLastDocNumber();
                } else {
                    // Proceed with form submission if document number is valid
                    submitMemoForm();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error checking Document Number:", textStatus, errorThrown);
                alert("An error occurred while checking the Document Number.");
            }
        });
    });

    function submitMemoForm() {
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

        // Collect table data
        table.rows({ filter: 'applied' }).every(function () {
            let rowData = this.data();
            allData.push({
                empNo: rowData[1].trim(),
                fullname: rowData[2].trim(),
                date_hired: rowData[3].trim(),
                pds: rowData[4].trim(),
                title: rowData[5].trim(),

                // Edited 12-23-24
                // fromto: rowData[6].trim(),

                venue: rowData[6].trim(),
                endorsementDate: rowData[7].trim(),

                // Edited 12-16-24
                result: rowData[8].trim(),

                remarks: rowData[9].trim()
            });
        });

        let memoData = {
            action: "add_memo",
            rows: allData
        };

        memoData = $.param(memoData) + "&" + $('#formAddMemo').serialize();

        // Submit the form data
        $.ajax({
            type: "POST",
            url: handler,
            data: memoData,
            dataType: "json",
            success: function (response) {
                console.log('Response:', response);
                if (response.result.startsWith("Error")) {
                    alert(response.result);
                } else {
                    send_email();
                    resetForm();
                    // dataTablesMemo.draw();
                    tblTrainee.draw();
                    tblRevision.draw();
                    tblApproved.draw();
                    tblDisapproved.draw();
                    toastr.success('New Memo Added!');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("AJAX Error: " + textStatus);
            }
        });
    }

    function resetForm() {
        $('#textClassification').val('0');
        $('#textReason').val('0');
        $('#selectedValues').val('');
        $('#textSubject').val('');
        $('#textDepartment').val('');
        $('#textSection').val('');
        $('#textNotedBy').val('Emma Alfelor');
        $('#textUsername').val('');
        $('#selectedOptions').empty();
        selectedOptions.length = 0;
        $('#selectedOptionsEmail').val('');
        $('#request_memo').modal('hide');
        // dataTablesMemo.draw();
        tblTrainee.draw();
        tblRevision.draw();
        tblApproved.draw();
        tblDisapproved.draw();
        table.clear().draw();
        fetchLastDocNumber();
    }


    // CHECK DOCNO
    // $('#textDocNo').on('input', function () {
    //     let docnoToCheck = $(this).val();
    //     let checkDocNo = {
    //         "action": "check_docno",
    //         "checkDocNum": docnoToCheck
    //     };

    //     $.ajax({
    //         type: "POST",
    //         url: handler, // Ensure 'handler' is a valid variable holding your PHP handler's URL.
    //         data: checkDocNo, // Send the full object.
    //         dataType: "json",
    //         success: function (response) {
    //             if (response.docno) { // Assuming your PHP returns { exists: true } for matches.
    //                 alert(response.docno + ' already exists!');
    //             } else {
    //                 console.log('Doc# does not exist.');
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('Error:', status, error);
    //         }
    //     });
    // });   

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
    $(document).on('click', '#revise_memo', function () {
        $('#reason_div').removeClass('d-none');
        $('#revise_memo').addClass('d-none');
        $('#approve_memo').addClass('d-none');
        $('#close_memo').addClass('d-none');
        // $('#disapprove_reason').val('');
    });

    $(document).on('click', '#close_reason_div', function () {
        $('#reason_div').addClass('d-none');
        $('#revise_memo').removeClass('d-none');
        $('#approve_memo').removeClass('d-none');
        $('#close_memo').removeClass('d-none');
    });


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
                        tblTrainee.draw();
                        tblRevision.draw();
                        tblApproved.draw();
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
        // e.preventDefault();

        // Fetch selected values and update display
        let view_memo_to = $(this).data('memo_to');
        let view_memo_email_to = $(this).data('memo_email_to');

        // Clear the existing selectedEditOptions and selectedEditEmails
        selectedEditOptions = [];
        selectedEditEmails = {};

        // Split the memo_to values by comma and add each to selectedEditOptions array
        if (view_memo_to) {
            selectedEditOptions = view_memo_to.split(',').map(value => value.trim());
        }

        // Split memo_email_to values by comma and populate selectedEditEmails
        if (view_memo_email_to) {
            let emailArray = view_memo_email_to.split(',').map(email => email.trim());
            selectedEditOptions.forEach((option, index) => {
                if (emailArray[index]) {
                    selectedEditEmails[option] = emailArray[index];
                }
            });
        }

        // Set the hidden input fields
        $('#selectedEditValues').val(selectedEditOptions.join(', '));
        $('#selectedEditEmails').val(Object.values(selectedEditEmails).join(', '));

        // Render the selected options as tags
        renderEditSelectedOptions();

        // Populate the rest of the fields as before
        let view_status = $(this).data('status');
        let view_pkid = $(this).data('pkid');
        let view_docno = $(this).data('docno');
        let view_classification = $(this).data('classification');
        let view_reason = $(this).data('reason');
        let view_memo_from = $(this).data('memo_from');
        let view_subject = $(this).data('subject');
        let view_date_now = $(this).data('date_now');
        let dateOnly = view_date_now.split(' ')[0];
        let view_department = $(this).data('department');
        let view_section = $(this).data('section');
        let view_preparedby = $(this).data('preparedby');
        let view_notedby = $(this).data('notedby');
        let view_revision = $(this).data('revision');

        let view_username = $(this).data('username');

        $('#pdf_hidden_docno').val(view_docno);

        $('#pkid').val(view_pkid);
        $('#memo_status').val(view_status);
        $('#textDocNo_view').val(view_docno);
        $('#textClassification_view').val(view_classification);
        $('#textReason_view').val(view_reason);
        $('#textFrom_view').val(view_memo_from);
        $('#textSubject_view').val(view_subject);
        $('#textdate_now_view').val(dateOnly);
        $('#textDepartment_view').val(view_department);
        $('#textSection_view').val(view_section);
        $('#textPreparedBy_view').val(view_preparedby);
        $('#textNotedBy_view').val(view_notedby);
        $('#textUsername_view').val(view_username);


        // Edited 1-16-25
        $('#textDocNo_edit').val(view_docno);
        $('#textClassification_edit').val(view_classification);
        $('#textReason_edit').val(view_reason);
        $('#textFrom_edit').val(view_memo_from);
        $('#selectedEditValues_edit').val($('#selectedEditValues').val());
        $('#selectedEditEmails_edit').val($('#selectedEditEmails').val());
        $('#subject_edit').val(view_subject);
        $('#textdate_now_edit').val(dateOnly);
        $('#textDepartment_edit').val(view_department);
        $('#textSection_edit').val(view_section);
        $('#textPreparedBy_edit').val(view_preparedby);
        $('#textNotedBy_edit').val(view_notedby);
        $('#textUsername_edit').val(view_username);

        // Update visibility logic as needed
        if (view_status === 1 || view_status === 4) {
            $('#reason_div').addClass('d-none');
            $('#btnAddTrainee_view').addClass('d-none');
            $('#disapprove_reason').text(view_revision);
            $('#revise_memo, #approve_memo').addClass('d-none');
            dataTableRequestView.column(0).visible(true);
            $('#submit_reason').addClass('d-none');

            // Edited 1-16-25
            $('#btn_editAddEmployeeModal').addClass('d-none');

        } else if (view_status === 3) {
            $('#reason_div').addClass('d-none');
            $('#btnAddTrainee_view').addClass('d-none');
            $('#disapprove_reason').text(view_revision);
            $('#revise_memo, #approve_memo').addClass('d-none');
            dataTableRequestView.column(0).visible(false);
            $('#submit_reason').addClass('d-none');

            // Edited 1-16-25
            $('#btn_editAddEmployeeModal').addClass('d-none');

        } else if (view_status === 2) {
            $('#reason_div').removeClass('d-none');
            $('#disapprove_reason').val(view_revision);
            $('#btnAddTrainee_view').removeClass('d-none');
            $('#approve_memo, #close_memo').removeClass('d-none');
            $('#submit_reason').removeClass('d-none');
            dataTableRequestView.column(0).visible(true);

            // Edited 1-16-25
            $('#btn_editAddEmployeeModal').removeClass('d-none');

        } else if (view_status === 0) {
            $('#reason_div').addClass('d-none');
            $('#disapprove_reason').val(view_revision);
            $('#btnAddTrainee_view').addClass('d-none');
            $('#revise_memo, #approve_memo, #close_memo').removeClass('d-none');

            // Edited 1-30-25
            dataTableRequestView.column(0).visible(true);
            $('#submit_reason').addClass('d-none');

            // Edited 1-16-25
            $('#btn_editAddEmployeeModal').addClass('d-none');

        }

        // Showing and Hiding of Generate PDF button
        if(view_status === 1 || view_status === 4){
            $('#btn_pdf').removeClass('d-none');
        }else{
            $('#btn_pdf').addClass('d-none');
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
                // Edited 1-30-25
                response.forEach(function(value) {
                    let actionButton = '';
                    if (view_status === 2 || view_status === 0) {
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
                console.error('AJAX Error:', { status, error, xhr });
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
        $('#btn_hr_memo_pdf').trigger('click');
        
    });


    // $(document).on('click', '.btn_edit_remove', function () {
    //     // Find the row containing the clicked button
    //     event.preventDefault();

    //     let row = $(this).closest('tr');

    //     // Confirm with the user before deleting the row
    //     if (confirm('Are you sure you want to remove this row?')) {
    //         // Remove the row from the DataTable
    //         dataTableRequestView.row(row).remove().draw(false);

    //         // Optional: Display a success message
    //         // toastr.success('Row successfully removed!');
    //     }
    // });



    // ORIGINAL
    // $('#tbl_request_view tbody').on('click', '.btn_edit_remove', function () {
    //     let row = $(this).closest('tr');

    //     if(confirm('Are you sure you want to remove this trainee?')){
    //         // Remove the row using DataTables' row().remove() method
    //         dataTableRequestView.row(row).remove().draw(false);  // Use draw(false) to keep the pagination state

    //         let empToRemove = row.find('td').eq(1).text();  // Get the employee number from the first column
    //         console.log('Employee removed: ' + empToRemove);  // Debugging, you can handle the removal here (e.g., server-side removal)
    //     }
    // });

    // $('#tbl_request_view tbody').on('click', '.btn_edit_remove', function () {
    //     let row = $(this).closest('tr');
    //     let remove_docno = $('#textDocNo_view').val(); // Assuming the docno is stored in this input
    //     let empToRemove = row.find('td').eq(1).text();  // Employee number is in the second column

    //     let remove_emp_edit = {
    //         "action": "remove_emp_edit",
    //         "remove_edit_docno": remove_docno,
    //         "remove_edit_emp": empToRemove
    //     };

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: remove_emp_edit,
    //         dataType: "json",
    //         success: function (response) {
    //             if (response.result) {
    //                 // Successfully removed
    //                 dataTableRequestView.draw();
    //                 console.log('Employee removed: ' + empToRemove);
    //                 // Remove the row using DataTables' row().remove() method
    //                 dataTableRequestView.row(row).remove().draw(false);
    //                 toastr.success('Successfully Deleted!');
    //                 // alert('Employee Removed!');
    //                 $('#view_memo').modal('show');
                    
    //             } else {
    //                 console.error('Failed to remove employee');
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('AJAX Error: ' + status + ' ' + error);
    //         }
    //     });
    // });

    // $('#tbl_request_view tbody').on('click', '.btn_edit_remove', function () {
    //     let row = $(this).closest('tr');
        
    //     // Validation: Prevent removing the last row
    //     // if ($('#tbl_request_view tbody tr').length <= 1) {
    //     //     alert('The table cannot be empty. Please leave at least one trainee.');
    //     //     return; // Stop execution if it's the last row
    //     // }

    //     if(confirm('Are you sure you want to remove this trainee?')){

    //         // Remove the row using DataTables' row().remove() method
    //         dataTableRequestView.row(row).remove().draw(false);  // Use draw(false) to keep the pagination state

    //         let empToRemove = row.find('td').eq(1).text();  // Get the employee number from the first column
    //         console.log('Employee removed: ' + empToRemove);  // Debugging, you can handle the removal here (e.g., server-side removal)
    //     }
    // });

    // EDITED 12-3-24
    $('#tbl_request_view tbody').on('click', '.btn_edit_remove', function () {
        event.preventDefault();

        let row = $(this).closest('tr');
        
        if ($('#tbl_request_view tbody tr').length <= 1) {
            alert('The table cannot be empty. Please leave at least one trainee.');
            return;
        }
        
        if(confirm('Are you sure you want to remove this trainee?')){
            let remove_docno = $('#textDocNo_view').val();
            let empToRemove = row.find('td').eq(1).text();

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
                        toastr.success('Successfully Deleted!');
                        // alert('Employee Removed!');
                        $('#view_memo').modal('show');
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

    // 12-3-24
    $("#formSubmitRevision").submit(function (e) {
        e.preventDefault();

        let revise_memo = $('#textDocNo_view').val();
        let revise_memo_status = $('#memo_status').val();

        let revise_memo_classification = $('#textClassification_view').val();  
        let revise_memo_reason = $('#textReason_view').val(); 
        let revise_memo_to = $('#selectedEditValues').val().trim(); 
        let revise_memo_subject = $('#textSubject_view').val().trim(); 
        let revise_memo_department = $('#textDepartment_view').val().trim(); 
        let revise_memo_section = $('#textSection_view').val().trim();
        let revise_memo_noted_by = $('#textNotedBy_view').val().trim();

        if(!revise_memo || revise_memo_classification === 0 || revise_memo_reason === 0 || !revise_memo_to || !revise_memo_subject || !revise_memo_department || !revise_memo_section || !revise_memo_noted_by){
            alert('Please fill up all the fields!');
            return;
        }

        if (dataTableRequestView.data().count() === 0) {
            alert('The table cannot be empty. Please leave at least one trainee.');
            return false;
        }

        let revision = {
            "action": "for_checking",  // Use the determined action here
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
                edit_send_email();
                selectedEditOptions.length = 0;
                $('#view_memo').modal('hide');
                // dataTablesMemo.draw();
                tblTrainee.draw();
                tblRevision.draw();
                tblApproved.draw();
                tblDisapproved.draw();
            }
        });
    });

    $(document).on('click', '.approve_memo', function () {
        let approve_memo = $('#textDocNo_view').val();        
        console.log(approve_memo);

        let approve = {
            "action": "approve_memo",
            "approve_docno": approve_memo
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: approve,
            dataType: "json",
            success: function (response) {
                $('#view_memo').modal('hide');
                // dataTablesMemo.draw();
                tblTrainee.draw();
                tblRevision.draw();
                tblApproved.draw();
                tblDisapproved.draw();
                toastr.success('Memo Approved!');

            }
        });
    });

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
         
    let preparedBy = $('#textPreparedBy').val();

    if(!preparedBy){
        alert('Session expired please login your rapid account again.');
        return;
    }
    let getTRDSUserInfo = {
        "action": "get_trds_user_info",
        "userUsername": preparedBy
    };
    $.ajax({
        type: "POST",
        url: handler,
        data: getTRDSUserInfo,
        dataType: "json",
        success: function (response) {
            $('#hidden_prepared_by_email').val(response.email);
            $('#textPreparedBy_email_view').val(response.email);

            $('#textPreparedByName').val(response.EmpName);

        }
    });

    // let getPreparedByEmail = {
    //     "action": "get_preparedby_email",
    //     "prepared_by": preparedBy
    // };

    // $.ajax({
    //     type: "POST",
    //     url: handler,
    //     data: getPreparedByEmail,
    //     dataType: "json",
    //     success: function (response) {
    //         console.log(preparedBy);
    //         console.log(response);
    //         $('#hidden_prepared_by_email').val(response);
    //     }
    // });

    // Function to send email
    // function send_email(){

    //     let preparedByEmail = $('#hidden_prepared_by_email').val();
    //     let emailTO = $('#selectedOptionsEmail').val();

    //     $.ajax({
    //         url: handler,
    //         type: 'POST',
    //         data: {
    //             "action": "send_for_approval",
    //             "send_to": emailTO,
    //             "sent_from": preparedByEmail
    //         },
    //         success: function(response) {
    //             console.log(response);
    //             $('#result').text(response);
    //         },
    //         error: function() {
    //             $('#result').text("Request failed. Unable to send email.");
    //         }
    //     });
    // }

    // Function to send email
    // Edited 1-21-25
    function send_email() {
        let preparedByEmail = $('#hidden_prepared_by_email').val();
        let emailTO = $('#selectedOptionsEmail').val().split(',').map(email => email.trim()); // Split and trim emails
        let emailCC = $('#staticEmails').val().split(',').map(email => email.trim()); // For Cc, split and trim
        let emailSubject = $('#textSubject').val();
        let emailDocno = $('#textDocNo').val();
        let preparedByName = $('#textPreparedByName').val();

        // Send one email with both TO and CC recipients
        $.ajax({
            url: handler,
            type: 'POST',
            data: {
                "action": "send_multiple_emails",
                "email_subject": emailSubject,
                "email_docno": emailDocno,
                "send_to": emailTO,  // Send the TO array
                "cc_recipients": emailCC,  // Send the CC array
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

    // JOWEE 1
    // function send_email() {
    //     let preparedByEmail = $('#hidden_prepared_by_email').val();
    //     let emailTO = $('#selectedOptionsEmail').val().split(',').map(email => email.trim());
    //     let staticEmails = ['joweekylamaramag@gmail.com', 'paulgabrielle28@gmail.com']; //$('#staticEmails').val().split(',').map(email => email.trim()); // Add your static CC emails here
    //     let emailSubject = $('#textSubject').val();
    //     let emailDocno = $('#textDocNo').val();
    //     let preparedByName = $('#textPreparedByName').val();

    //     emailTO.forEach(function (email) {
    //         if (email) {
    //             $.ajax({
    //                 url: handler,
    //                 type: 'POST',
    //                 data: {
    //                     "action": "send_multiple_emails",
    //                     "email_subject": emailSubject,
    //                     "email_docno": emailDocno,
    //                     "send_to": email,
    //                     "cc_to": staticEmails, // Include CC emails here
    //                     "sent_from": preparedByEmail,
    //                     "user_fullname": preparedByName
    //                 },
    //                 success: function (response) {
    //                     console.log(emailSubject);
    //                     console.log(`Email sent to ${email}:`, response);
    //                     $('#result').append(`<div>Email sent to ${email}: ${response}</div>`);
    //                 },
    //                 error: function () {
    //                     $('#result').append(`<div>Failed to send email to ${email}</div>`);
    //                 }
    //             });
    //         }
    //     });
    // }

    // jowee 2
    // function send_email() {
    //     let preparedByEmail = $('#hidden_prepared_by_email').val();
    //     let emailTO = $('#selectedOptionsEmail').val().split(',').map(email => email.trim());
    //     let staticEmails = $('#staticEmails').val().split(',').map(email => email.trim()); // Dynamic input from the field
    //     let emailSubject = $('#textSubject').val();
    //     let emailDocno = $('#textDocNo').val();
    //     let preparedByName = $('#textPreparedByName').val();

    //     emailTO.forEach(function (email) {
    //         if (email) {
    //             $.ajax({
    //                 url: handler,
    //                 type: 'POST',
    //                 data: {
    //                     "action": "send_multiple_emails",
    //                     "email_subject": emailSubject,
    //                     "email_docno": emailDocno,
    //                     "send_to": email,
    //                     "cc_to": JSON.stringify(staticEmails), // Encode CC emails as JSON
    //                     "sent_from": preparedByEmail,
    //                     "user_fullname": preparedByName
    //                 },
    //                 success: function (response) {
    //                     console.log(emailSubject);
    //                     console.log(`Email sent to ${email}:`, response);
    //                     $('#result').append(`<div>Email sent to ${email}: ${response}</div>`);
    //                 },
    //                 error: function () {
    //                     $('#result').append(`<div>Failed to send email to ${email}</div>`);
    //                 }
    //             });
    //         }
    //     });
    // }


    // function send_email() {
    //     let preparedByEmail = $('#hidden_prepared_by_email').val();

    //     let staticEmails = $('#staticEmails').val();
    //     let sendTo = $('#selectedOptionsEmail').val();
    //     let allEmails = staticEmails + sendTo;

    //     let emailTO = allEmails.split(',').map(email => email.trim()); // Split and trim emails
    //     let emailSubject = $('#textSubject').val();
    //     let emailDocno = $('#textDocNo').val();
    //     let preparedByName = $('#textPreparedByName').val();

    //     // Iterate over each email and send individually
    //     emailTO.forEach(function (email) {
    //         if (email) { // Ensure no empty strings
    //             $.ajax({
    //                 url: handler,
    //                 type: 'POST',
    //                 data: {
    //                     "action": "send_multiple_emails",
    //                     "email_subject": emailSubject,
    //                     "email_docno": emailDocno,
    //                     "send_to": email,
    //                     "sent_from": preparedByEmail,
    //                     "user_fullname": preparedByName
    //                 },
    //                 success: function (response) {
    //                     console.log(emailSubject);
    //                     console.log(`Email sent to ${email}:`, response);
    //                     $('#result').append(`<div>Email sent to ${email}: ${response}</div>`);
    //                 },
    //                 error: function () {
    //                     $('#result').append(`<div>Failed to send email to ${email}</div>`);
    //                 }
    //             });
    //         }
    //     });
    // }

    // Edited 1-21-25
    function edit_send_email() {
        let preparedByEmail = $('#textPreparedBy_email_view').val();
        let emailTO = $('#selectedEditEmails').val().split(',').map(email => email.trim()); // Split and trim emails
        let emailCC = $('#staticEmails').val().split(',').map(email => email.trim()); // For Cc, split and trim
        let emailSubject = $('#textSubject_view').val();
        let emailDocno = $('#textDocNo_view').val();

        $.ajax({
            url: handler,
            type: 'POST',
            data: {
                "action": "edit_send_multiple_emails",
                "email_subject": emailSubject,
                "email_docno": emailDocno,
                "send_to": emailTO,
                "cc_recipients": emailCC,
                "sent_from": preparedByEmail
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

// __________________________________________________________________Edited 1-16-25_________________________________________________________________________________________________________

$('#btnSelect_edit').on('click', function () {
        let add_title = $('#textTitle_edit').val();

        let add_result = $('#textResult_edit').val();

        // Edited 1-10-25
        let add_remarks = $('#textTitleRemarks_edit').val();

        // Edited 12-23-24
        // let add_fromto = $('#textTitleFromTo').val();

        let add_empNo = $('#textEmpNo_edit').val();
        let add_fullname = $('#textFullName_edit').val();

        console.log('Title:', add_title);
        console.log('Result:', add_result);

        // Edited 12-23-24
        console.log('Remarks:', add_remarks);

        // Edited 12-23-24
        // console.log('FromTo:', add_fromto);

        console.log('EmpNo:', add_empNo);

        // Check if title or employee number is empty
        if (add_empNo === '' || add_fullname === '') {
            alert('Please enter an employee number first.');
            return;
        }

        if (add_title === '') {
            alert('Please select a title first.');
            return;
        }

        // Edited 12-23-24
        // if (add_result === '' || add_remarks === '' || add_fromto === '') {
        //     alert('Loading data please wait.');
        //     return;
        // }

        if (add_result === '' || add_remarks === '') {
            alert('Loading data please wait.');
            return;
        }

        // Check if title already exists in the table
        let titleExists = false;
        $('#tblGeneralKnowledge_edit tbody tr').each(function () {
            let existingTitle = $(this).find('td:eq(0)').text(); // Get the title from the first column (index 0)
            if (existingTitle === add_title) {
                titleExists = true;
                return false; // Exit the loop
            }
        });

        // If the title already exists, alert the user
        if (titleExists) {
            alert('The title "' + add_title + '" has already been added. Please select a different title.');

            // Clear input fields after adding
            $('#textTitle_edit').val('');
            $('#textResult_edit').val('');
            $('#textTitleRemarks_edit').val('');

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

            // Edited 12-16-24
            gn_remarks: add_remarks,

            // Edited 12-23-24
            // gn_fromto: add_fromto,
            gn_empNo: add_empNo
        };

        // let newResult = {
        //     gn_result: add_result,
        // }

        // titleList.push(newEntry);
        knowledgeList.push(newEntry);
        // resultList.push(newResult);

        tblGenKnowEdit.row.add([
            add_title,
            add_result,

            // Edited 12-16-24
            add_remarks,

            // Edited 12-23-24
            // add_fromto,
            '<center><button type="button" class="btn btn-warning btnRemoveGK_edit">Remove</button></center>'
        ]).draw();

        // Clear input fields after adding
        $('#textTitle_edit').val('');
        $('#textResult_edit').val('');
        $('#textTitleRemarks_edit').val('');

        // Edited 12-23-24
        // $('#textTitleFromTo').val('');
    });

    $('#textEmpNo_edit').on('input', function () {

        let check_empNo = $(this).val();

        if(check_empNo === ''){
            $('#textEmpNo_edit').val('');
            $('#textFullName_edit').val('');
            $('#textDateHired_edit').val('');
            $('#textpds_edit').val('');
            // $('#textFromTo').val('');
            $('#textVenue_edit').val('');
            $('#textEndorsementDate_edit').val('');

            // Edited 12-23-24
            // $('#textTitleRemarks').val('');

            // Edited 12-23-24
            // $('#textTitleFromTo').val('');

            tblGenKnowEdit.clear().draw();

        }
    });

    $('#textEmpNo_edit').on('change', function() {
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
                        $('#textFullName_edit').val(response.FullName);
                        $('#textpds_edit').val(response.pds);
                        $('#textDateHired_edit').val(response.DateHired);
                    } else {
                        $('#textFullName_edit').val(''); 
                        $('#textpds_edit').val('');
                        $('#textDateHired_edit').val('');
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

    $('#textEmpNo_edit').on('change', function() {
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
                        $('#textVenue_edit').val(response.Venue);
                        // $('#textRemarks').val(response.Remarks);
                        // $('#textFromTo').val(response.fromto);
                    } else {
                        $('#textVenue_edit').val('');
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

    // REMOVING ROW/S INSIDE tblGeneralKnowledge
    $('#tblGeneralKnowledge_edit tbody').on('click', '.btnRemoveGK_edit', function () {
        let row = $(this).closest('tr');

        if(confirm('Are you sure you wan to remove this?')){
            tblGenKnow.row(row).remove().draw();

            let titleToRemove = row.find('td').eq(0).text();
            knowledgeList = knowledgeList.filter(item => item.gn_title !== titleToRemove);
        }
    });

    $('#formSubmitEditAddEmployee').submit(function (e) { 
        e.preventDefault();

        let DocNo = $('#textDocNo_edit').val();
        let Classification = $('#textClassification_edit').val();
        let Reason = $('#textReason_edit').val();
        let MemoFrom = $('#textFrom_edit').val();
        let MemoTo = $('#selectedEditValues_edit').val();
        let MemoToEmail = $('#selectedEditEmails_edit').val();
        let Subject = $('#subject_edit').val();
        let DateNow = $('#textdate_now_edit').val();
        let Department = $('#textDepartment_edit').val();
        let Section = $('#textSection_edit').val();
        let PreparedBy = $('#textPreparedBy_edit').val();
        let NotedBy = $('#textNotedBy_edit').val();
        let Username = $('#textUsername_edit').val();
        let EmpNo = $('#textEmpNo_edit').val();
        let FullName = $('#textFullName_edit').val();
        let DateHired = $('#textDateHired_edit').val();
        let Pds = $('#textpds_edit').val();
        let Venue = $('#textVenue_edit').val();
        let EndoDate = $('#textEndorsementDate_edit').val();

        let editAllData = [];

        // Collect table data
        tblGenKnowEdit.rows({ filter: 'applied' }).every(function () {
            let rowData = this.data();
            editAllData.push({
                title: rowData[0].trim(),
                result: rowData[1].trim(),
                remarks: rowData[2].trim()
            });
        });

        $.ajax({
            type: "POST",
            url: handler,
            data: {
                "action": "check_edit_add_employee",
                "empNo": $('#textEmpNo_edit').val(),
                "docNo": $('#textDocNo_edit').val()
            },
            dataType: "json",
            success: function (response) {
                if (response.empNo) {
                    alert("This employee is already added. Select another one.");
                    return;
                } else {
                    $.ajax({
                        type: "POST",
                        url: handler,
                        data: {
                            "action": "submit_edit_add_employee",
                            "DocNo": DocNo,
                            "Classification": Classification,
                            "Reason": Reason,
                            "MemoFrom": MemoFrom,
                            "MemoTo": MemoTo,
                            "MemoToEmail": MemoToEmail,
                            "Subject": Subject,
                            "DateNow": DateNow,
                            "Department": Department,
                            "Section": Section,
                            "PreparedBy": PreparedBy,
                            "NotedBy": NotedBy,
                            "Username": Username,
                            "EmpNo": EmpNo,
                            "FullName": FullName,
                            "DateHired": DateHired,
                            "Pds": Pds,
                            "Venue": Venue,
                            "EndoDate": EndoDate,
                            "rows": editAllData
                        },
                        dataType: "json",
                        success: function (response) {
                            // Example: Trigger the function for a specific button
                            // Example: Target a button with a specific data-docno value
                            $(`.btn_view[data-docno="${DocNo}"]`).trigger('click');

                            // dataTableRequestView.draw();
                            $('#editAddEmployeeModal').modal('hide');
                            toastr.success('Successfully Added!');
                        }
                    });
                }
            }
        });
    });

// _______________________________________________________________________________________________________________________________________________

// Prevent form submission on Enter key

    $('#formSubmitRevision').on('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent form submission
        }
    });
    $('#formAddMemo').on('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent form submission
        }
    });
    
});

</script>   