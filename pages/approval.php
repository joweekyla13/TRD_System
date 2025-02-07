<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<style>
/* Custom CSS to change radio button's checked color */
input[type="radio"].attendance-day1:checked:not(.absent) {
    accent-color: green; /* "Present" radio button (P) */
}

input[type="radio"].attendance-day1.absent:checked {
    accent-color: red; /* "Absent" radio button (A) */
}

input[type="radio"].attendance-day2:checked:not(.absent) {
    accent-color: green; /* "Present" radio button (P) */
}

input[type="radio"].attendance-day2.absent:checked {
    accent-color: red; /* "Absent" radio button (A) */
}

input[type="radio"].attendance-day3:checked:not(.absent) {
    accent-color: green; /* "Present" radio button (P) */
}

input[type="radio"].attendance-day3.absent:checked {
    accent-color: red; /* "Absent" radio button (A) */
}

</style>

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
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#conformanceTab" type="button" role="tab" aria-selected="true">Conformance</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#receiveTab" type="button" role="tab" aria-selected="false">Receiving</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#qcHeadTab" type="button" role="tab" aria-selected="false">QC Head</button>
                                    </li>
                                </ul>

                                 <div class="tab-content" id="myTabContent">
                                    <!-- Conformance Tab Content -->
                                    <div class="tab-pane fade show active" id="conformanceTab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="tblConformance" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Control No.</th>
                                                                        <th>Date Filed</th>
                                                                        <th>Conformance</th>
                                                                        <th>Receiving</th>
                                                                        <th>QC Head Approval</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <!-- <tr class="text-center">
                                                                        <td><span class="badge bg-success">PMI-0987</span></td>
                                                                        <td>09/13/2024</td>
                                                                        <td><span class="badge bg-success">Conformed</span></td>
                                                                        <td><span class="badge bg-secondary">Pending</span></td>
                                                                        <td><span class="badge bg-secondary">Pending</span></td>
                                                                        <td class="text-center">
                                                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewTraineeModal"><i class="fa-solid fa-file" style="color: white"></i></button>
                                                                        </td>
                                                                    </tr> -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Receive Tab Content -->
                                     <div class="tab-pane fade" id="receiveTab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="tblReceiving" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
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
                                                                        <td><span class="badge bg-secondary">Pending</span></td>
                                                                        <td><span class="badge bg-secondary">Pending</span></td>
                                                                        <td class="text-center">
                                                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#receivingModal"><i class="fa-solid fa-file" style="color: white"></i></button>
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

                                     <!-- QC Head Tab Content -->
                                     <div class="tab-pane fade" id="qcHeadTab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="tblApproval" class="table table-bordered table-hover" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
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
                                                                        <td><span class="badge bg-secondary">Pending</span></td>
                                                                        <td><span class="badge bg-secondary">Pending</span></td>
                                                                        <td class="text-center">
                                                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#qcHeadModal"><i class="fa-solid fa-file" style="color: white"></i></button>
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

                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal View Memo -->
        <div class="modal fade" id="viewTraineeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Training Request Form Approval</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="" autocomplete="off">

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Control Number</span>
                                        <p class="form-control" name="view_conno" id="view_text_conno"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Current Date</span>
                                        <p class="form-control" name="view_current_date" id="view_text_current_date"></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <p class="fw-bold">Request Details</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Department</span>
                                        <p class="form-control" name="view_department" id="view_text_department"></p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Section</span>
                                        <p class="form-control" name="view_section" id="view_text_section" ></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Job Function</span>
                                        <p class="form-control" name="view_job_function" id="view_text_job_function"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Area/Line Allocation</span>
                                        <p class="form-control" name="view_area_line" id="view_text_area_line"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Reason</span>
                                        <p class="form-control" name="view_reason" id="view_text_reason"></p>
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
                                        <th>From Station/Production</th>
                                        <th>To Station/Production</th>
                                        <th>Action</th>
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
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Requestor</span>
                                        <p class="form-control" id="view_text_requestor" name="view_requestor"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue">Approver</span>
                                        <p class="form-control" name="view_approver" id="view_text_approver"></p>
                                        <p class="form-control" id="view_text_email" name="view_email"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <!-- <button type="button" id="btn_revision" name="btn_revision" class="btn btn-warning btn_revision" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-arrow-rotate-left me-2" style="color: white"></i>FOR REVISION</button>
                                <button type="button" id="btn_disapprove" name="btn_disapprove" class="btn btn-danger btn_disapprove" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-xmark me-2" style="color: white"></i>DISAPPROVE</button>
                                <button type="button" id="btn_conform" name="btn_conform" class="btn btn-success btn_conform" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-check me-2" style="color: white"></i>CONFORM</button>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button> -->

                                <button type="button" id="btn_conform" name="btn_conform" class="btn btn-success btn_conform" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-check me-2" style="color: white"></i>CONFORM</button>
                                <button type="button" id="btn_disapprove" name="btn_disapprove" class="btn btn-danger btn_disapprove" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-xmark me-2" style="color: white"></i>DISAPPROVE</button>
                                <button type="button" id="btn_revision" name="btn_revision" class="btn btn-warning btn_revision" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-arrow-rotate-left me-2" style="color: white"></i>FOR REVISION</button>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Receiving Memo -->
        <div class="modal fade" id="viewReceivingTraineeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Training Request Form Approval</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="" autocomplete="off">

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Control Number</span>
                                        <p class="form-control" name="rec_conno" id="rec_text_conno"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Current Date</span>
                                        <p class="form-control" name="rec_current_date" id="rec_text_current_date"></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <p class="fw-bold">Request Details</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Department</span>
                                        <p class="form-control" name="rec_department" id="rec_text_department"></p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Section</span>
                                        <p class="form-control" name="rec_section" id="rec_text_section" ></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Job Function</span>
                                        <p class="form-control" name="rec_job_function" id="rec_text_job_function"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Area/Line Allocation</span>
                                        <p class="form-control" name="rec_area_line" id="rec_text_area_line"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Reason</span>
                                        <p class="form-control" name="rec_reason" id="rec_text_reason"></p>
                                    </div>
                                </div>
                            </div> <hr>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="rec_tbl_training_request" >
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
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Requestor</span>
                                        <p class="form-control" id="rec_text_requestor" name="rec_requestor"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue">Approver</span>
                                        <p class="form-control" name="rec_approver" id="rec_text_approver"></p>
                                        <p class="form-control" id="rec_text_email" name="rec_email"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <!-- <button type="button" id="btn_revision" name="btn_revision" class="btn btn-warning btn_revision" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-arrow-rotate-left me-2" style="color: white"></i>FOR REVISION</button>
                                <button type="button" id="btn_disapprove" name="btn_disapprove" class="btn btn-danger btn_disapprove" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-xmark me-2" style="color: white"></i>DISAPPROVE</button>
                                <button type="button" id="btn_received" name="btn_received" class="btn btn-success btn_received" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-check me-2" style="color: white"></i>RECEIVED</button>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button> -->

                                <button type="button" id="btn_conform" name="btn_conform" class="btn btn-success btn_conform" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-check me-2" style="color: white"></i>CONFORM</button>
                                <button type="button" id="btn_disapprove" name="btn_disapprove" class="btn btn-danger btn_disapprove" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-xmark me-2" style="color: white"></i>DISAPPROVE</button>
                                <button type="button" id="btn_revision" name="btn_revision" class="btn btn-warning btn_revision" data-bs-toggle="modal" data-bs-target=""><i class="fa-solid fa-arrow-rotate-left me-2" style="color: white"></i>FOR REVISION</button>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Day 1 'Absent' confirmation -->
        <div class="modal" tabindex="-1" id="modal_day1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reason for Absence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formDay1">
                <input type="hidden" id="text_day1_status" name="day1_status">
                <input type="hidden" id="text_fkEmpNo_absent" name="fkEmpNo_absent">
                <textarea class="form-control" placeholder="Leave a comment here" id="Textarea_absent_comment" name="absent_comment"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal for Day 2 'Absent' confirmation -->
        <div class="modal" tabindex="-1" id="modal_day2">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reason 2 for Absence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formDay2">
                <input type="hidden" id="text_day2_status" name="day2_status">
                <input type="hidden" id="text_fkEmpNo_absent2" name="fkEmpNo_absent2">
                <textarea class="form-control" placeholder="Leave a comment here" id="Textarea_absent_comment2" name="absent_comment2"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal for Day 3 'Absent' confirmation -->
        <div class="modal" tabindex="-1" id="modal_day3">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reason 3 for Absence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formDay3">
                <input type="hidden" id="text_day3_status" name="day3_status">
                <input type="hidden" id="text_fkEmpNo_absent3" name="fkEmpNo_absent3">
                <textarea class="form-control" placeholder="Leave a comment here" id="Textarea_absent_comment3" name="absent_comment3"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
        </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

    $('#approval').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active');
            $('#headerTitle').text('Training Approval');
            $('#url_title').text('Training Approval');
        }
        else {
            $(this).removeClass('active');
        }
    });

        let now = new Date();
    
    let counter = 1;

    function generateDocumentNumber() {
        let month = (now.getMonth() + 1).toString().padStart(2, '0');
        let day = now.getDate().toString().padStart(2, '0');
        let year = now.getFullYear().toString().slice(-2);

        let documentNumber = `${month}${year}-${day}_MR${year}-${counter.toString().padStart(3, '0')}`;

        $('#textDocNo').val('HRS Training - ' + documentNumber);
    }

    // Generate the document number when the page loads
    generateDocumentNumber();

    // Handle the click event for adding new data and increment the counter
    $('#btnSubmitMemo').on('click', function () {
        // Increase the counter

        // Regenerate the document number with the new counter value
        generateDocumentNumber();
    });

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

    // Dynamically adding data in Table Request
    let table = $('#tbl_request').DataTable();

    $('#btnAddEmployee').on('click', function() {
        let docNo = $('#textDocNo').val();
        let classification = $('#textClassification').val();
        let reason = $('#textReason').val();
        let from = $('#textFrom').val();
        let to = $('#textTo').val();
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
        let remarks = $('#textRemarks').val();

        // Debugging logs to check if the inputs are filled correctly
        console.log("DocNo:", docNo);
        console.log("EmpNo:", empNo);
        console.log("Fullname:", fullname);
        console.log("Date Hired:", dateHired);
        console.log("PDS:", pds);
        console.log("FromTo:", fromTo);
        console.log("Venue:", venue);
        console.log("Endorsement Date:", endorsementDate);
        console.log("Remarks:", remarks);

        // Check if required fields are filled (adjust as needed)
        if (empNo && fullname && dateHired && endorsementDate) {
            // Create an object for this employee's details
            let employeeData = {
                docNo: docNo,
                classification: classification,
                reason: reason,
                from: from,
                to: to,
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
                remarks: remarks
            };

            // Store in an array of objects
            if (!window.employeeDataArray) {
                window.employeeDataArray = []; // Initialize if doesn't exist
            }

            // Add this employee's data to the global array
            window.employeeDataArray.push(employeeData);

            // Add row to the DataTable (tbl_request)
            table.row.add([
                dateHired,
                empNo,
                fullname,
                '<center><button type="button" class="btn btn-warning btnCancel">Cancel</button></center>'
            ]).draw();

            // Clear form fields after submission
            $('#textEmpNo').val('');
            $('#textFullName').val('');
            $('#textDateHired').val('');
            $('#textpds').val('');
            $('#textFromTo').val('');
            $('#textVenue').val('');
            $('#textEndorsementDate').val('');
            $('#textRemarks').val('');

            alert('Successfully added!');
            console.log('Stored employee data array:', window.employeeDataArray);
        } else {
            alert('Please fill out all required fields.');
        }
    });

    let traineeTable = $('#tbl_trainee').DataTable();
    let requestTable = $('#tbl_request').DataTable();

    $('#btnSubmitMemo').on('click', function() {
        if (window.employeeDataArray && window.employeeDataArray.length > 0) {
            // Check if the specified fields are empty
            let classification = $('#textClassification').val();
            let reason = $('#textReason').val();
            let to = $('#textTo').val();
            let subject = $('#textSubject').val();
            let dept = $('#textDepartment').val();
            let section = $('#textSection').val();

            let canAddRow = classification || reason || to || subject || dept || section;
            
            if (!canAddRow) {
                alert('Please fill up all the fields!');
                return;
            }

            window.employeeDataArray.forEach(function(employee) {
                if (employee.empNo && employee.fullname && employee.dateHired) {
                    traineeTable.row.add([
                        employee.dateHired,
                        employee.empNo,
                        employee.fullname,
                        employee.dept,
                        employee.section,
                        employee.from,
                        employee.to,
                        employee.reason,
                        employee.subject
                    ]).draw();
                } else {
                    console.error("Incomplete data for employee:", employee);
                }
            });

            requestTable.clear().draw();

            window.employeeDataArray = [];

            alert('Trainees successfully added and request table cleared!');

            $('#newTraineeModal').modal('hide');

            $('#textClassification').val(0);
            $('#textReason').val(0);
            $('#textTo').val(0);
            $('#textSubject').val('');
            $('#textDepartment').val(0);
            $('#textSection').val(0);

            counter++;

        } else {
            alert('No employee data available to add.');
        }
    });


    // Fetch and populate employee numbers in the datalist
    $.ajax({
        type: "POST",
        url: handler,
        data: { action: "display_empno" },
        dataType: "json",
        success: function (response) {
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

    // Get employee details base on the EmpNo

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
    
    // Get employee details base on the EmpNo

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

// *******************************************************************************************************************************************

let dataTablesConformance = $('#tblConformance').DataTable({
    "aaSorting"	 : [],
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": "./server_side_scripts/conformance.php",
    "drawCallback": function( settings ) {
        $('#tblConformance').attr('style','width:100%;');
    }
});

let dataTablesReceiving = $('#tblReceiving').DataTable({
    "aaSorting"	 : [],
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": "./server_side_scripts/receiving.php",
    "drawCallback": function( settings ) {
        $('#tblReceiving').attr('style','width:100%;');
    }
});

let dataTablesApproval = $('#tblApproval').DataTable({
    "aaSorting"	 : [],
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": "./server_side_scripts/approval.php",
    "drawCallback": function( settings ) {
        $('#tblApproval').attr('style','width:100%;');
    }
});

$(document).on('click', '.btn_view', function () {
        
        let view_pkid = $(this).data('pkid');
        let view_conno = $(this).data('conno');
        let view_fkdocno = $(this).data('fkdocno');
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

    $(document).on('click', '.btn_Rview', function () {
        
        let rec_pkid = $(this).data('pkid');
        let rec_conno = $(this).data('conno');
        let rec_date_filed = $(this).data('date_filed');
        let rec_department = $(this).data('department');
        let rec_section = $(this).data('section');
        let rec_job_function = $(this).data('job_function');
        let rec_area_line = $(this).data('area_line');
        let rec_reason = $(this).data('reason');
        let rec_fkEmpNo = $(this).data('fkEmpNo');
        let rec_from_station_prod = $(this).data('from_station_prod');
        let rec_to_station_prod = $(this).data('to_station_prod');
        let rec_requestor = $(this).data('requestor');
        let rec_approver = $(this).data('approver');
        let rec_email = $(this).data('email');

        $('#rec_text_conno').text(rec_conno);
        $('#rec_text_current_date').text(rec_date_filed);
        $('#rec_text_department').text(rec_department);
        $('#rec_text_section').text(rec_section);
        $('#rec_text_job_function').text(rec_job_function);
        $('#rec_text_area_line').text(rec_area_line);
        $('#rec_text_reason').text(rec_reason);
        $('#rec_text_requestor').text(rec_requestor);
        $('#rec_text_approver').text(rec_approver);
        $('#rec_text_email').text(rec_email);

        $.ajax({
            type: "POST",
            url: handler,
            data: {
                action: "get_trainee_req",
                TR_conno: rec_conno,
                TR_fkEmpNo: rec_fkEmpNo
            },
            dataType: "json",
            success: function (response) {
                let tablerecTrainReq = $('#rec_tbl_training_request tbody');
                tablerecTrainReq.empty();

                $.each(response, function (index, value) { 
                    tablerecTrainReq.append(`
                        <tr>
                            <td>${value.date_hired}</td>
                            <td>${value.fkEmpNo}</td>
                            <td>${value.fullname}</td>
                            <td>${value.pds}</td>
                            <td>${value.from_station_prod}</td>
                            <td>${value.to_station_prod}</td> 
                        </tr>
                    `);
                });
            }
        });
    });

    $(document).on('click', '.btn_conform', function () {
        let conform_conno = $('#view_text_conno').text();
        console.log(conform_conno);

        let conform = {
            "action": "conform_req",
            "conform_conno": conform_conno
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: conform,
            dataType: "json",
            success: function (response) {
                alert('Successfully conformed!');
                $('#viewTraineeModal').modal('hide');
                dataTablesConformance.draw();
                dataTablesReceiving.draw();
                dataTablesApproval.draw();

            }
        });
    });

    $(document).on('click', '.btn_received', function () {
        let receive_conno = $('#rec_text_conno').text();
        console.log(receive_conno);

        let receive = {
            "action": "receive_req",
            "receive_conno": receive_conno
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: receive,
            dataType: "json",
            success: function (response) {
                alert('Successfully received!');
                $('#viewReceivingTraineeModal').modal('hide');
                dataTablesConformance.draw();
                dataTablesReceiving.draw();
                dataTablesApproval.draw();

            }
        });
    });


});

</script>