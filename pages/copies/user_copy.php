<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<body class="hold-transition sidebar-mini">
    <!-- Main content -->
    <section class="content-wrapper" id="requestTab">
      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <!-- <div class="d-flex justify-content-end align-items-center"> -->
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title fw-bold text-dark mb-0">Request Panel</h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTraineeModal">Create Request</button>
                </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body p-3">
                    <div class="table-responsive">
                        <table id="tableTrainee" class="table table-bordered table-hover" style="width: 100%;">
                            <thead class="table-secondary">
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
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            
            <div class="d-flex justify-content-end mb-3">
                <button type="submit" class="btn btn-info" id="" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="fa-solid fa-clock-rotate-left me-2" style="color: white"></i>Show Request History</button>
            </div>
        </div>
    </section>

    <section class="content-wrapper d-none" id="receivingTab">
      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title fw-bold text-secondary mb-0">For Receiving</h3>
                    <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTraineeModal">Receiving Page</button> -->
                </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body p-3">
                    <div class="table-responsive">
                        <table id="tableTrainee" class="table table-bordered table-hover" style="width: 100%;">
                            <thead class="table-secondary">
                                <tr class="text-center">
                                    <th>Control No.</th>
                                    <th>Date Filed</th>
                                    <th>Conformance</th>
                                    <th>Receiving</th>
                                    <th>QC Head Approval</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                
                            <tbody>
                                <tr class="text-center">
                                    <td><span class="badge bg-success">PMI-0987</span></td>
                                    <td>09/13/2024</td>
                                    <td><span class="badge bg-success">Conformed</span></td>
                                    <td><span class="badge bg-warning">For Conformance</span></td>
                                    <td><span class="badge bg-secondary">Queued</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#receivingModal"><i class="fa-solid fa-clipboard-check" style="color: white"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
        </div>
    </section>

    <section class="content-wrapper d-none" id="requestListTab">
      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title fw-bold text-secondary mb-0">List of Received Request</h3>
                    <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTraineeModal">List of Received Request</button> -->
                </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body p-3">
                    <div class="table-responsive">
                        <table id="tableTrainee" class="table table-bordered table-hover" style="width: 100%;">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Control No.</th>
                                    <th>Date Filed</th>
                                    <th>Requested By</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                                
                            <tbody>
                                <tr class="text-center">
                                    <td>PMI-0123</td>
                                    <td>9/13/24</td>
                                    <td>@joweemaramag</td>
                                    <td>Received</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
        </div>
    </section>

    <section class="content-wrapper d-none" id="traineeListTab">
      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title fw-bold text-secondary mb-0">List of Requested Trainees</h3>
                    <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTraineeModal"></button> -->
                </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body p-3">
                    <div class="table-responsive">
                        <table id="tableTrainee" class="table table-bordered table-hover" style="width: 100%;">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Name</th>
                                    <th>Date Hired</th>
                                    <th>Position/Department/Section</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                                
                            <tbody>
                                <tr class="text-center">
                                    <td>Jowee Maramag</td>
                                    <td>9/04/24</td>
                                    <td>Trainee / ISS</td>
                                    <td>Started</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
        </div>
    </section>

    <section class="content-wrapper d-none" id="settingsTab">
      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end align-items-center">
                    <!-- <h3 class="card-title fw-bold text-secondary mb-0">List of Trainees</h3> -->
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newUserModal">Add User</button>
                </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body p-3">
                    <div class="table-responsive">
                        <table id="tableTrainee" class="table table-bordered table-hover" style="width: 100%;">
                            <thead class="table-secondary">
                                <tr>
                                    <th>ID No.</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Welcome Page</th>
                                    <th>Request Page</th>
                                    <th>Conformance Page</th>
                                    <th>Receiving Page</th>
                                    <th>Approval</th>
                                </tr>
                            </thead>
                                
                            <tbody>
                                <tr class="text-center">
                                    <td>2002613</td>
                                    <td>Jowee Maramag</td>
                                    <td>jowee@gmail.com</td>
                                    <td>&#10003</td>
                                    <td>&#10003</td>
                                    <td>&#10003</td>
                                    <td>&#10003</td>
                                    <td>&#10003</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
        </div>
    </section>

</body>



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
    
    <!-- Modal Add Employee -->
    <!-- <div class="modal fade" id="addEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-info">
                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Add Employee</h1>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="formAddEmployee" autocomplete="off">

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

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="requestEmployee"><i class="fa-solid fa-user-plus me-2" style="color: white"></i>REQUEST EMPLOYEE</button>
                            <button type="button" class="btn btn-secondary" id="requestEmployeeClose" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Modal View Memo -->
    <div class="modal fade" id="viewTraineeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-info">
                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">View Training Request Form</h1>
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
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: #999999">Classification</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: #999999">Reason</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">To</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">From</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Subject</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Current Date</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Department</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Section</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
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
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Employee Name</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Date Hired</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Position/Dept./Section</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Training Dates</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: #999999">Training Venue</span>
                                        <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Endorsement Date</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                <span class="input-group-text text-light" style="background-color: #999999">Theoretical Exam Results</span>
                                <input class="form-control" type="text" name="" id="" readonly>
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
                        </div> <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Prepared By</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Noted By</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Receiving -->
    <div class="modal fade" id="receivingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: #999999">Classification</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: #999999">Reason</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">To</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">From</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Subject</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: #999999">Current Date</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Department</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Section</span>
                                    <input class="form-control" type="text" name="" id="" readonly>
                                </div>
                            </div>
                        </div> <hr>

                        <div class="mb-3">
                            <table class="table table-bordered table-hover">
                                <thead class="table-secondary">
                                    <tr>
                                    <th>Date Hired</th>
                                    <th>Employee No.</th>
                                    <th>Name</th>
                                    <th>From (Station/Product Name)</th>
                                    <th>To (Station/Product Name)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <span class="d-block text-center input-group-text w-16.7 text-light mb-4 w-100" style="background-color: #999999">Approval Details</span>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Conformance :</span>
                                    <input class="form-control" type="text" name="" id="" value="jowee@gmail.com" readonly>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <span class="badge bg-success">Conformed</span>
                                <label> / </label>
                                <span class="badge bg-secondary">No Status</span>
                            </div>

                            <div class="col-md-5">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Remarks</span>
                                    <input class="form-control" type="text" name="" id="" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Receiving :</span>
                                    <input class="form-control" type="text" name="" id="" value="jowee@gmail.com" readonly>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <span class="badge bg-success">Conformed</span>
                                <label> / </label>
                                <span class="badge bg-secondary">No Status</span>
                            </div>

                            <div class="col-md-5">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Remarks</span>
                                    <input class="form-control" type="text" name="" id="" value="None" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">QC Head Approval :</span>
                                    <input class="form-control" type="text" name="" id="" value="jowee@gmail.com" readonly>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <span class="badge bg-success">Conformed</span>
                                <label> / </label>
                                <span class="badge bg-secondary">No Status</span>
                            </div>

                            <div class="col-md-5">
                                <div class="input-group mb-2">
                                    <span class="input-group-text text-light" style="background-color: #999999">Remarks</span>
                                    <input class="form-control" type="text" name="" id="" required>
                                </div>
                            </div>
                        </div>

                        <span class="d-block text-center input-group-text w-16.7 text-light mt-4 w-100" style="background-color: #999999">Receiving Remarks</span>
                        <textarea id="receivingRemarks" class="form-control" rows="4" placeholder="Enter your remarks here..."></textarea>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-arrow-rotate-left me-2" style="color: white"></i>FOR REVISION</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-xmark me-2" style="color: white"></i>DISAPPROVE</button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-check me-2" style="color: white"></i>CONFORM</button>
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add User -->
    <div class="modal fade" id="newUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-info">
                    <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Add to Access List</h1>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="formAddUser" autocomplete="off">

                        <div class="input-group mb-4">
                            <span class="input-group-text w-16.7 text-light" style="background-color: #999999">Name</span>
                            <input class="form-control" type="text" name="" id="" required>
                        </div>

                        <div class="input-group mb-4">
                            <span class="input-group-text w-16.7 text-light" style="background-color: #999999">Email</span>
                            <input class="form-control" type="text" name="" id="" required>
                        </div>

                        <!-- <div class="d-flex justify-content-center align-items-center"> -->
                            <span class="d-block text-center input-group-text w-16.7 text-light mb-4 w-100" style="background-color: #999999">Access Points</span>
                        <!-- </div> -->

                        <div class="ml-5">
                            <label>
                                <input type="checkbox" name="accessPoints" value="welcome">
                                Welcome Page
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" name="accessPoints" value="request">
                                Request Page
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" name="accessPoints" value="conformance">
                                Conformance Page
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" name="accessPoints" value="receiving">
                                Receiving Page
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" name="accessPoints" value="approval">
                                Approval Page
                            </label>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="addNew"><i class="fa-solid fa-file-import me-2" style="color: white"></i>APPLY</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="css/styles.css" language="css"></script> -->

    <script type="text/javascript">
    $(document).ready(function () {

    let now = new Date();

    // Format the date
    let month = (now.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-based
    let day = now.getDate().toString().padStart(3, '0'); // Pad day to 3 digits
    let year = now.getFullYear().toString().slice(-2); // Get last two digits of year

    // Construct the document number
    let documentNumber = `${month}${year}-${day}_MR${year}-001`;

    // Set the value of the input field
    $('#textDocNo').val('HRS Training - ' + documentNumber);

    let today = new Date().toISOString().split('T')[0];
    $('#date_now').val(today);

    let handler = "./handler/handler.php";
    let data = {
            "action": "display_empno",
        }
        data = $.param(data) + "&" + $('#EmpNo').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        
        data: data,  // Sending the action to identify the function
        dataType: "json",
        success: function (response) {
            // Populate the datalist
            let dataList = $('#EmpNo');
            dataList.empty();  // Clear any existing options
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    /**
     * Clear Form Values when modal is closed
     */
    $('#modalUser').on('hidden.bs.modal', function () {
        $('#formUser')[0].reset(); // Reset input values
    });

    /**
     * Show Users
     */
    let dataTablesUsers = $("#tableUser").DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "ajax": {
            "url": "./server_side_scripts/user.php",
            "type": "GET",
            "data": function (param) {
                param.action = "get_user";
            },
        },
        "columns": [
            { "data": "pkid" },
            { "data": "lastupdate" },
            { "data": "fkTraining" },
            { "data": "fkEmployee" },
            { "data": "Result" },
            { "data": "Remarks" },
            { "data": "logdel" }

        ]
    });

    // Fetch and populate employee numbers in the datalist
    $.ajax({
        type: "POST",
        url: handler,
        data: { action: "display_empno" },
        dataType: "json",
        success: function (response) {
            let dataList = $('#empNo');
            dataList.empty();  // Clear any existing options
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

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
                        $('#textFullName').val(''); // Clear the full name if no match is found
                        $('#textpds').val('');
                        $('#textDateHired').val('');

                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        }
    });
    

    $('#textEmpNo').on('change', function() {
        let empNo = $(this).val();
        
        if(empNo) {
            $.ajax({
                type: "POST",
                url: "./handler/handler.php",
                data: {
                    "action": "get_trainee",
                    "textEmpNo": empNo
                },
                dataType: "json",
                success: function(response) {
                    if(response.Remarks) {
                        $('#textVenue').val(response.Venue);
                        $('#textRemarks').val(response.Remarks);
                        $('#textFromTo').val(response.fromto);
                    } else {
                        $('#textVenue').val('');
                        $('#textRemarks').val('');
                        $('#textFromTo').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        }
    });

    /**
     * Add User
     */
    $("#formUser").submit(function (e) {
        e.preventDefault(); // Prevent page reload

        let data = {
            "action": "add_user",
        }
        data = $.param(data) + "&" + $('#formUser').serialize();
        $.ajax({
            type: "POST",
            url: handler,
            data: data,
            dataType: "json",
            success: function (response) {
                toastr.success(response['result']);
                dataTablesUsers.draw();
                $('#modalUser').modal('hide');
            }
        });
    });

    /**
     * Edit User
     */
    $(document).on('click', '.actionEdit', function () {
        let id = $(this).val();
        $("input[name='user_id']").val(id);

        let data = {
            "action": "edit_user",
        }
        data = $.param(data) + "&" + $('#formUser').serialize();

        $.ajax({
            type: "POST",
            url: handler,
            data: data,
            dataType: "json",
            success: function (response) {
                console.log('response ', response['result']);
                if (response['result'].length > 0) {
                    $('#textFullname').val(response['result'][0].fullname);
                    $('#textSection').val(response['result'][0].section);
                    $('#textUsername').val(response['result'][0].username);
                    $('#textEmail').val(response['result'][0].email);
                    $('#selectUserLevel').val(response['result'][0].user_level).trigger('change');
                }
            }
        });
    });


    let table = $('#tbl_request').DataTable();

        $('#btnAddEmployee').on('click', function() {
            let datehired = $('#textDateHired').val();
            let empno = $('#textEmpNo').val();
            let fullname = $('#textFullName').val();
            let from = $('#textFrom').val();
            let to = $('#textTo').val();

            // Check if any field is empty
            if (datehired === '' || empno === '' || fullname === '' || from === '' || to === '') {
                // Notify user to fill all fields
                alert('Please fill in all fields.');
            } else {
                // Add new row to DataTable
                table.row.add([datehired, empno, fullname, from, to]).draw(false);

                // Clear input fields after adding row
                $('#textDateHired').val('');
                $('#textEmpNo').val('');
                $('#textFullName').val('');
                $('#textFrom').val('');
                $('#textTo').val('');
            }
        });

});

$('#requestNav').on('click', function () {
            $('#requestTab').removeClass('d-none');
            $('#receivingTab').addClass('d-none');
            $('#requestListTab').addClass('d-none');
            $('#traineeListTab').addClass('d-none');
            $('#settingsTab').addClass('d-none');

            $('#headerTitle').text('Request Trainee Page')
        });

        $('#receivingNav').on('click', function (e) {
            e.preventDefault();

            $('#receivingTab').removeClass('d-none');
            $('#requestTab').addClass('d-none');
            $('#requestListTab').addClass('d-none');
            $('#traineeListTab').addClass('d-none');
            $('#settingsTab').addClass('d-none');

            $('#headerTitle').text('Receiving Page')
        });

        $('#requestListNav').on('click', function () {
            $('#requestListTab').removeClass('d-none');
            $('#requestTab').addClass('d-none');
            $('#receivingTab').addClass('d-none');
            $('#traineeListTab').addClass('d-none');
            $('#settingsTab').addClass('d-none');
            
            $('#headerTitle').text('List of Requests Page')
        });

        $('#traineeListNav').on('click', function () {
            $('#traineeListTab').removeClass('d-none');
            $('#requestTab').addClass('d-none');
            $('#receivingTab').addClass('d-none');
            $('#requestListTab').addClass('d-none');
            $('#settingsTab').addClass('d-none');
            
            $('#headerTitle').text('List of Trainees Page')
        });

        $('#settingsNav').on('click', function () {
            $('#settingsTab').removeClass('d-none');
            $('#requestTab').addClass('d-none');
            $('#receivingTab').addClass('d-none');
            $('#requestListTab').addClass('d-none');
            $('#traineeListTab').addClass('d-none');
            
            $('#headerTitle').text('User Access List')
        });
        
        // $('#requestEmployee').on('click', function () {
        //     $('#addEmployeeModal').modal('hide');
        //     $('#newTraineeModal').modal('show');
        // });
        
        // $('#requestEmployeeClose').on('click', function () {
        //     $('#addEmployeeModal').modal('hide');
        //     $('#newTraineeModal').modal('show');
        // });

</script>