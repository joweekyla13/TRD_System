<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">

        <section id="exams_tab" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <!-- Content for the row can go here -->
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="" role="tabpanel">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
                                            <h3 class="fw-bold text-secondary">Exam List</h3>
                                            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#create_exam" title="Click to create a new exam">
                                                <i class="fa fa-plus fa-md me-2" style="color: white"></i>New Exam
                                            </button>
                                        </div>
                                        <!-- <div class="table-responsive mt-3 mb-3">
                                            <table id="tbl_exams" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Revisions</th>
                                                        <th>Category</th>
                                                        <th>Exam Title</th>
                                                        <th>Purpose</th>
                                                        <th>Department</th>
                                                        <th>Position</th>
                                                        <th>Product Line</th>
                                                        <th>Passing Score</th>
                                                        <th>Instructions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> -->

                                        <!-- 1/22/25 start -->
                                        <!-- <div class="card shadow-sm border-0 p-3"> -->
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="newly-hired-tab" data-bs-toggle="tab" data-bs-target="#newly" type="button" role="tab" aria-selected="true">
                                                        Newly Hired List of Exams
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="recert-tab" data-bs-toggle="tab" data-bs-target="#recert" type="button" role="tab" aria-selected="false">
                                                        Re-Certification List of Exams
                                                    </button>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="myTabContent">
                                                <!-- For Newly Hired Tab -->
                                                <div class="tab-pane fade show active" id="newly" role="tabpanel" aria-labelledby="for-checking-tab">
                                                    <div class="card shadow-sm border-0">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                <h6 class="text-secondary" id="exam_label"></h6>
                                                                <!-- <button class="btn btn-primary"><i class="fa fa-plus me-2"></i> Add New</button> -->
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table id="tbl_newly" class="table table-striped table-hover table-bordered nowrap" style="width: 100%;">
                                                                    <thead class="table-primary">
                                                                        <tr>
                                                                        <th>Action</th>
                                                                        <th>Revisions</th>
                                                                        <!-- <th>Category</th> -->
                                                                        <th>Exam Title</th>
                                                                        <th>Purpose</th>
                                                                        <th>Department</th>
                                                                        <th>Position</th>
                                                                        <th>Product Line</th>
                                                                        <th>Passing Score</th>
                                                                        <th>Instructions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="7" class="text-center">No data available</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Recertification Tab -->
                                                <div class="tab-pane fade" id="recert" role="tabpanel" aria-labelledby="checked-tab">
                                                    <div class="card shadow-sm border-0">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                <h6 class="text-secondary" id="c_exam_label"></h6>
                                                                <!-- Add Button (Optional) -->
                                                                <!-- <button class="btn btn-primary"><i class="fa fa-plus me-2"></i> Add New</button> -->
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table id="tbl_recert" class="table table-striped table-hover table-bordered nowrap" style="width: 100%;">
                                                                    <thead class="table-primary">
                                                                        <tr>
                                                                        <th>Action</th>
                                                                        <th>Revisions</th>
                                                                        <!-- <th>Category</th> -->
                                                                        <th>Exam Title</th>
                                                                        <th>Purpose</th>
                                                                        <th>Department</th>
                                                                        <th>Position</th>
                                                                        <th>Product Line</th>
                                                                        <th>Passing Score</th>
                                                                        <th>Instructions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="7" class="text-center">No data available</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                        <!-- end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section id="revisions_tab" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white p-2 m-2">
                                <li class="breadcrumb-item"><a href="index.php?page=exams_list.php">Exam List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Revisions List</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="" role="tabpanel">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <h3 class="fw-bold text-secondary">Revisions List</h3>
                                        </div>
                                        <div class="table-responsive mt-3 mb-3">
                                            <table id="tbl_revisions" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Revision No.</th>
                                                        <th>Purpose</th>
                                                        <th>Position</th>
                                                        <th>Remarks</th>
                                                        <th>Passing Score</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
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
        </section> -->

    </div>
</div>

<!-- Modal Generate Exam -->
<div class="modal fade" id="create_exam" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-info">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Create New Exam</h1>
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="create_exam_form" autocomplete="off">

                    <!-- 1/22/2025 -->
                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 12%">Category</span>
                        <select class="form-select" type="text" id="text_category" name="category">
                            <option value="3" disabled selected>Select Category</option>
                            <option value="0">Newly Hired</option>
                            <option value="1">Re-Certification</option>
                        </select>
                    </div>

                    <!-- 1/13/2025 -->
                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 12%">Title</span>
                        <input class="form-control" type="text" id="text_title" name="title" placeholder="Enter Title">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%">Purpose</span>
                                <input class="form-select" type="text" id="text_purpose" name="purpose" list="purpose" placeholder="Select Purpose">
                                    <datalist id="purpose">
                                        <!-- options go here -->
                                    </datalist>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 30%">Department</span>
                                <input class="form-select" type="text" id="text_department" name="department" list="department" placeholder="Select Department">
                                    <datalist id="department">
                                        <!-- options go here -->
                                    </datalist>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%">Position</span>
                                <input class="form-select" type="text" id="text_position" name="position" list="position" placeholder="Select Position">
                                    <datalist id="position">
                                        <!-- options go here -->
                                    </datalist>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- 1/13/2025 -->
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 30%">Product Line</span>
                                <input class="form-control" type="text" id="text_prLine" name="prLine" placeholder="Enter Product Line">
                                <!-- <input class="form-select" type="text" id="text_prLine" name="prLine" list="prLine" placeholder="Select Product Line">
                                    <datalist id="prLine">
                                        options go here
                                    </datalist> -->
                            </div>
                        </div>
                    </div>

                    <!-- <div class="d-none" id="category_div">
                        <div class="input-group mb-4">
                            <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Category</span>
                            <input class="form-control" type="text" name="category" id="text_category" readonly>
                        </div>
                    </div>

                    <div class="d-none" id="revision_div">
                        <div class="input-group mb-4">
                            <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Revision No.</span>
                            <input class="form-control" type="text" name="revision_no" id="text_revision_no" readonly>
                        </div>
                    </div> -->

                    <div class="mb-1">
                        <label style="color: DodgerBlue">Exam Instructions: </label>
                    </div>
                    
                    <div class="mb-4">
                        <textarea class="form-control" placeholder="Enter exam instructions" title="Enter up to 350 characters only" maxlength="350" name="remarks" id="text_remarks" style="height: 100px"></textarea>
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 15%">Passing Score</span>
                        <input class="form-control" type="number" name="passing_score" id="text_passing_score" value="0" min="0" max="100">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" title="Submit New Exam" id="addNew"><i class="fa-solid fa-file-import me-2" style="color: white"></i>SUBMIT</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Viewing and Editing Exam -->
<div class="modal fade" id="modify_exam_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-info">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Modify Exam</h1>
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="modify_exam_form" autocomplete="off">

                    <input type="hidden" name="pkid" id="text_pkid">

                    <!-- 1/22/2025 -->
                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 12%">Category</span>
                        <select class="form-select" type="text" id="text_modify_category" name="modify_category">
                            <option value="3" disabled selected>Select Category</option>
                            <option value="0">Newly Hired</option>
                            <option value="1">Re-Certification</option>
                        </select>
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 12%">Title</span>
                        <input class="form-control" type="text" id="text_modify_title" name="modify_title" placeholder="Enter Title">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%">Purpose</span>
                                <input class="form-select" type="text" id="text_modify_purpose" name="modify_purpose" list="purpose" placeholder="Select Purpose">
                                    <datalist id="purpose">
                                        <!-- options go here -->
                                    </datalist>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 30%">Department</span>
                                <input class="form-select" type="text" id="text_modify_department" name="modify_department" list="department" placeholder="Select Department">
                                    <datalist id="department">
                                        <!-- options go here -->
                                    </datalist>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%">Position</span>
                                <input class="form-select" type="text" id="text_modify_position" name="modify_position" list="position" placeholder="Select Position">
                                    <datalist id="position">
                                        <!-- options go here -->
                                    </datalist>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- 1/13/2025 -->
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 30%">Product Line</span>
                                <!-- <input class="form-select" type="text" id="text_modify_prLine" name="modify_prLine" list="prLine" placeholder="Select Product Line"> -->
                                <input class="form-control" type="text" id="text_modify_prLine" name="modify_prLine" placeholder="Enter Product Line">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="" id="modify_category_div">
                        <div class="input-group mb-4">
                            <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Category</span>
                            <input class="form-control" type="text" name="modify_category" id="text_modify_category" readonly>
                        </div>
                    </div>

                    <div class="" id="modify_revision_div">
                        <div class="input-group mb-4">
                            <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Revision No.</span>
                            <input class="form-control" type="text" name="modify_revision_no" id="text_modify_revision_no" readonly>
                        </div>
                    </div> -->

                    <div class="mb-1">
                        <label style="color: DodgerBlue">Exam Instructions: </label>
                    </div>

                    <div class="mb-4">
                        <textarea class="form-control" placeholder="Enter exam instructions" title="Enter up to 350 characters only" maxlength="350" name="modify_exam_remarks" id="text_modify_exam_remarks" style="height: 100px"></textarea>

                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 15%">Passing Score</span>
                        <input class="form-control" type="number" name="modify_passing_score" id="text_modify_passing_score" value="0" min="0" max="100">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" ><i class="fa-solid fa-file-import me-2" style="color: white"></i>UPDATE</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

    // script when clicking a nav-link
    $('#exams_menu').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active');
            $('#theo_exam_menu').addClass('active');
            $('#theo_exam_menu').css({
                'background': '#494E53',
                'outline': 'none'
            });
            $('#exams_tab').removeClass('d-none');
            $('#headerTitle').text('Exam List');
            $('#url_title').text('Theoretical Examination');
        }
        else {
            $(this).removeClass('active');
        }
    });

    let handler = "./handler/handler.php";

    // datatables
    // let tbl_exam= $('#tbl_exams').DataTable({
    //     "aaSorting"	 : [],
    //     "bProcessing": true,
    //     "bServerSide": true,
    //     "sAjaxSource": "./server_side_scripts/exams_list.php",
    //     "drawCallback": function( settings ) {
    //         $('#tbl_exams').attr('style','width:100%;');
    //     },
    //     // Set the default number of entries to "All"
    //     "pageLength": -1,
    //     // Configure the length menu to include "All"
    //     "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
    // });

    // 1/22/2025
    function initializeDataTable(tableId, status) {
        return $(tableId).DataTable({
            "aaSorting": [],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "./server_side_scripts/exams_list.php",
            "fnServerParams": function (aoData) {
                aoData.push({ "name": "status", "value": status });
            },
            "drawCallback": function (settings) {
                $(tableId).attr('style', 'width:100%;');

                // Apply inline styles to the 4th column (Exam Title)
                $(tableId + ' tbody tr td:nth-child(4), ' + tableId + ' tbody tr td:nth-child(5), ' + tableId + ' tbody tr td:nth-child(10)').each(function () {
                    $(this).attr('style', 'max-width: 300px; word-wrap: break-word; white-space: normal; overflow-wrap: break-word;');
                });
            },
            // Set the default number of entries to "All"
            "pageLength": -1,
            // Configure the length menu to include "All"
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            "columnDefs": [
                { 
                    "width": "50px",  // Adjust width as needed
                    "targets": 8  // Fourth column (0-based index)
                }
            ]
        });
    }

    // Initialize DataTables for different statuses
    let tblNewly = initializeDataTable('#tbl_newly', 0);
    let tblRecert = initializeDataTable('#tbl_recert', 1);

    let tbl_revision= $('#tbl_revisions').DataTable({
        "aaSorting"	 : [],
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "./server_side_scripts/revisions_list.php",
        "drawCallback": function( settings ) {
            $('#tbl_exams').attr('style','width:100%;');
        },
        // Set the default number of entries to "All"
        "pageLength": -1,
        // Configure the length menu to include "All"
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
    });

    // GETTING "PURPOSE" FROM TypeOfTraining
    let purpose = {
            "action": "get_purpose",
        }
        purpose = $.param(purpose) + "&" + $('#text_purpose').serialize();

        $.ajax({
        type: "POST",
        url: handler,
        
        data: purpose,
        dataType: "json",
        success: function (response) {
            let dataList = $('#purpose');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    // GETTING "POSITION" FROM tbl_Position
    let position = {
            "action": "get_emp_position",
        }
        position = $.param(position) + "&" + $('#text_position').serialize();

        $.ajax({
        type: "POST",
        url: handler,
        
        data: position,
        dataType: "json",
        success: function (response) {
            let dataList = $('#position');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

        // GETTING "PRODUCT LINE" FROM tbl_Position
    let prLine = {
            "action": "get_productLine",
        }
        prLine = $.param(prLine) + "&" + $('#text_position').serialize();

        $.ajax({
        type: "POST",
        url: handler,
        
        data: prLine,
        dataType: "json",
        success: function (response) {
            let dataList = $('#prLine');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    // GETTING DEPARTMENT
    let get_department = {
        "action": "get_department",
    }
    get_department = $.param(get_department) + "&" + $('#text_department').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: get_department,
        dataType: "json",
        success: function (response) {
            let dataList = $('#department');
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
    $('#create_exam').on('hidden.bs.modal', function () {
        var examForm = $('#create_exam_form');

        // $('#revision_div').addClass('d-none');
        // $('#category_div').addClass('d-none');
        examForm[0].reset();

    });

    // original code (with revision number)
    // function for checking of purpose and position when creating new exam
    // function checkRevision() {
    //     let purpose = $('#text_purpose').val().trim();
    //     let position = $('#text_position').val().trim();

    //     if (purpose !== "" && position !== "") {
    //         // Perform the AJAX request only if both purpose and position are selected
    //         $.ajax({
    //             url: handler,
    //             type: 'POST',
    //             data: {
    //                 action: 'check_purpose',
    //                 purpose: purpose,
    //                 position: position
    //             },
    //             dataType: 'json',
    //             success: function(response) {
    //                 if (response.exists) {
    //                     // Purpose and position combination exists, set category to "REVISED" and show revision number
    //                     $('#category_div').removeClass('d-none');
    //                     $('#text_category').val("REVISED");
    //                     $('#revision_div').removeClass('d-none');
    //                     $('#text_revision_no').val(response.new_revision_number);
    //                 } else {
    //                     // New purpose-position combination
    //                     $('#category_div').removeClass('d-none');
    //                     $('#text_category').val("NEW");
    //                     $('#revision_div').addClass('d-none');
    //                     $('#text_revision_no').val("Rev.No.0.00");
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error("Error checking purpose and position:", error);
    //             }
    //         });
    //     }
    // }

    // // Event listeners for both fields when creating new exam
    // $('#text_purpose, #text_position').on('change', checkRevision);

    // function modify_checkRevision() {
    //     let purpose = $('#text_modify_purpose').val().trim();
    //     let position = $('#text_modify_position').val().trim();

    //     if (purpose !== "" && position !== "") {
    //         // Perform the AJAX request only if both purpose and position are selected
    //         $.ajax({
    //             url: handler,
    //             type: 'POST',
    //             data: {
    //                 action: 'check_purpose',
    //                 purpose: purpose,
    //                 position: position
    //             },
    //             dataType: 'json',
    //             success: function(response) {
    //                 if (response.exists) {
    //                     // Purpose and position combination exists, set category to "REVISED" and show revision number
    //                     $('#modify_category_div').removeClass('d-none');
    //                     $('#text_modify_category').val("REVISED");
    //                     $('#modify_revision_div').removeClass('d-none');
    //                     $('#text_modify_revision_no').val(response.new_revision_number);
    //                 } else {
    //                     // New purpose-position combination
    //                     $('#modify_category_div').removeClass('d-none');
    //                     $('#text_modify_category').val("NEW");
    //                     $('#modify_revision_div').addClass('d-none');
    //                     $('#text_modify_revision_no').val("Rev.No.0.00");
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error("Error checking purpose and position:", error);
    //             }
    //         });
    //     }
    // }

    // // Event listeners for both fields
    // $('#text_modify_purpose, #text_modify_position').on('input', modify_checkRevision);

    // 1/3/2025 (edited without rev number)
    function checkRevision() {
        let exam_title = $('#text_title').val().trim();
        let purpose = $('#text_purpose').val().trim();
        let department = $('#text_department').val().trim();
        let position = $('#text_position').val().trim();
        let productLine = $('#text_prLine').val().trim();

        if (exam_title !== "" && purpose !== "" && department !== "" && position !== "" && productLine !== "") {
            // Perform the AJAX request only if both purpose and position are selected
            $.ajax({
                url: handler,
                type: 'POST',
                data: {
                    action: 'check_purpose',
                    exam_title: exam_title,
                    purpose: purpose,
                    department: department,
                    position: position,
                    productLine: productLine
                },
                dataType: 'json',
                success: function(response) {
                    if (response.exists) {
                        // Purpose and position combination exists, show an alert
                        alert("Exam for the entered title and selected purpose, department, position and product line already exists. Please a different title and select a different purpose, department, position and product line.");
                        $('#text_title').val('');
                        $('#text_purpose').val('');
                        $('#text_department').val('');
                        $('#text_position').val('');
                        $('#text_prLine').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error checking purpose and position:", error);
                }
            });
        }
    }

    // Event listeners for both fields
    $('#text_title, #text_purpose, #text_department, #text_position').on('change', checkRevision);
    $('#text_prLine').on('change', checkRevision);

    function modify_checkRevision() {
        let exam_title = $('#text_modify_title').val().trim();
        let purpose = $('#text_modify_purpose').val().trim();
        let department = $('#text_modify_department').val().trim();
        let position = $('#text_modify_position').val().trim();
        let productLine = $('#text_modify_prLine').val().trim();

        if (exam_title !== "" && purpose !== "" && department !== "" && position !== "" && productLine !== "") {
            // Perform the AJAX request only if both purpose and position are selected
            $.ajax({
                url: handler,
                type: 'POST',
                data: {
                    action: 'check_purpose',
                    exam_title: exam_title,
                    purpose: purpose,
                    department: department,
                    position: position,
                    productLine: productLine
                },
                dataType: 'json',
                success: function(response) {
                    if (response.exists) {
                        // Purpose and position combination exists, show an alert
                        alert("Exam for the entered title and selected purpose, department, position and product line already exists. Please a different title and select a different purpose, department, position and product line.");
                        
                        window.location.href = 'index.php?page=exams_list.php';
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error checking purpose and position:", error);
                }
            });
        }
    }

    // Event listeners for both fields
    $('#text_modify_title, #text_modify_purpose, #text_modify_department, #text_modify_position').on('change', modify_checkRevision);
    $('#text_modify_prLine').on('change', modify_checkRevision);

    // Adding new Exam
    $('#create_exam_form').submit(function (e) { 
        e.preventDefault();

        let allData = [];

        let category  = $('#text_category').val();
        // let revision_no = $('#text_revision_no').val();

        let exam_title = $('#text_title').val();
        let purpose = $('#text_purpose').val();
        let department = $('#text_department').val();
        let position = $('#text_position').val();
        let productLine = $('#text_prLine').val();
        let remarks =  $('#text_remarks').val();
        let passing_score = $('#text_passing_score').val();

        // console.log('Collected Table Data:', allData);

        // validation for input fields
        // if (!category || !purpose || !remarks || passing_score == '0' || !position) {
        //     alert('Please fill up all required fields!');
        //     return false;
        // }

        if (category == null || !exam_title || !purpose || !department || !position || !productLine || !remarks || passing_score == '0') {
            alert('Please fill up all required fields!');
            return false;
        }

        // console.log(passing_score);

        // if (!revision_no) {
        //     alert('Please provide a revision number!');
        //     return false;
        // }

        // console.log('Inserting values:', {
        //     revision_no,
        //     purpose,
        //     position,
        //     remarks,
        //     passing_score,
        //     category
        // });

        let data = {
            "action": "add_exam",
            "rows": allData
        };

        data = $.param(data) + "&" + $('#create_exam_form').serialize();

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
                    alert('Exam Successfully Added!');
                    // toastr.success('Successfully Added!');

                    // $('#category_div').addClass('d-none');
                    $('#text_category').val(3);
                    // $('#revision_div').addClass('d-none');
                    // $('#text_revision_no').val('');
                    $('#text_title').val('');
                    $('#text_purpose').val('');
                    $('#text_department').val('');
                    $('#text_position').val('');
                    $('#text_prLine').val('');
                    $('#text_remarks').val('');
                    $('#text_passing_score').val('0');

                    $('#create_exam').modal('hide');

                    // tbl_exam.draw();
                    tblRecert.draw();
                    tblNewly.draw();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("AJAX Error: " + textStatus);
            }
        });
        
    });

    // Modifying of Exam (ORIGINAL CODE)
    $('#modify_exam_form').submit(function (e) { 
        e.preventDefault();
        let pkid = $('#text_pkid').val();

        let category  = $('#text_modify_category').val();
        // let revision_no = $('#text_modify_revision_no').val();

        let title = $('#text_modify_title').val();
        let purpose = $('#text_modify_purpose').val();
        let department = $('#text_modify_department').val();
        let position = $('#text_modify_position').val();
        let prLine = $('#text_modify_prLine').val();
        let remarks =  $('#text_modify_exam_remarks').val();
        let passing_score = $('#text_modify_passing_score').val();

        // validation for input fields
        if (category == null || !title || !purpose || !department || !position || !prLine || !remarks || passing_score == '0') {
            alert('Please fill up all required fields!');
            return false;
        }

        // if (!category || !purpose || !remarks || passing_score == '0' || !position) {
        //     alert('Please fill up all required fields!');
        //     return false;
        // }

        // if (!revision_no) {
        //     alert('Please provide a revision number!');
        //     return false;
        // }

        let modifyExam = {
            "action": "modify_exam",
            "exam_pkid": pkid
        };
        modifyExam = $.param(modifyExam) + "&" + $('#modify_exam_form').serialize();
        $.ajax({
            type: 'POST',
            url: handler,
            data: modifyExam,
            dataType: "json",
            success: function (response) {
                console.log('Response:', response);

                if (response.result.startsWith("Error")) {
                    alert(response.result); 
                } else {

                    let m_pkid = $('#text_pkid').val();
                    let passing_score = $('#text_modify_passing_score').val();
                    console.log(m_pkid);

                    $.ajax({
                        type: "POST",
                        url: handler,
                        data: {
                            "action": "update_passing_score",
                            "modify_pkid": m_pkid,
                            "m_passing_score": passing_score
                        },
                        dataType: "json",
                        success: function (response) {
                            
                        }
                    });

                    alert('Exam updated successfully!');

                    // // Clear form and hide modal
                    // $('#modify_category_div').addClass('d-none');
                    $('#text_modify_category').val(3);
                    // $('#modify_revision_div').addClass('d-none');
                    // $('#text_modify_revision_no').val('');
                    $('#text_modify_title').val('');
                    $('#text_modify_purpose').val('');
                    $('#text_modify_department').val('');
                    $('#text_modify_position').val('');
                    $('#text_modify_prLine').val('');
                    $('#text_modify_exam_remarks').val('');
                    $('#text_modify_passing_score').val('0');
                    $('#text_pkid').val('');

                    $('#modify_exam_modal').modal('hide');
                    // tbl_exam.draw();
                    tblRecert.draw();
                    tblNewly.draw();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("AJAX Error: " + textStatus);
            }
        });
    });

    // Viewing of Exam
    $(document).on('click', '.btn_exam_view', function () {

        let edit_pkid = $(this).data('pkid');

        // 1/22/2025
        let edit_category = $(this).data('category');
        console.log("category" + edit_category);
        // let edit_rev_no = $(this).data('rev_no');
        let edit_title = $(this).data('exam_title');
        let edit_purpose = $(this).data('purpose');
        let edit_department = $(this).data('department');
        let edit_position = $(this).data('position');
        let edit_prLine = $(this).data('product_line');
        let edit_remarks = $(this).data('remarks');
        let edit_passing_score = $(this).data('passing_score');
        
        console.log(edit_pkid);

        // Set the values in the modal or form
        $('#text_pkid').val(edit_pkid);
        $('#text_modify_category').val(edit_category);
        // $('#text_modify_revision_no').val(edit_rev_no);
        $('#text_modify_title').val(edit_title);
        $('#text_modify_purpose').val(edit_purpose);
        $('#text_modify_department').val(edit_department);
        $('#text_modify_position').val(edit_position);
        $('#text_modify_prLine').val(edit_prLine);
        $('#text_modify_exam_remarks').val(edit_remarks);
        $('#text_modify_passing_score').val(edit_passing_score);
        
    });

    // EDITED (12/11/2024)
    $(document).on('click', '.btn_revisions_list', function () {

        // $('#exams_tab').addClass('d-none');
        // $('#revisions_tab').removeClass('d-none');

        // alert('working yung eye');

        let edit_pkid = $(this).data('pkid');
        let edit_title = $(this).data('exam_title');
        // let edit_purpose = $(this).data('purpose');
        // let edit_position = $(this).data('position');
        
		// window.location = 'index.php?page=revisions_list.php&pkid=' + edit_pkid + '&purpose=' + edit_purpose + '&position=' + edit_position;
        window.location = 'index.php?page=revisions_list.php&pkid=' + edit_pkid + '&title=' + edit_title;


        // let edit_pkid = $(this).data('pkid');
        // let edit_category = $(this).data('category');
        // let edit_rev_no = $(this).data('rev_no');
        // let edit_purpose = $(this).data('purpose');
        // let edit_position = $(this).data('position');
        // let edit_remarks = $(this).data('remarks');
        // let edit_passing_score = $(this).data('passing_score');

        // console.log(edit_pkid);

        // // Set the values in the modal or form
        // $('#text_pkid').val(edit_pkid);
        // $('#text_modify_category').val(edit_category);
        // $('#text_modify_revision_no').val(edit_rev_no);
        // $('#text_modify_purpose').val(edit_purpose);
        // $('#text_modify_position').val(edit_position);
        // $('#text_modify_exam_remarks').val(edit_remarks);
        // $('#text_modify_passing_score').val(edit_passing_score);

    });

    // // Automatically reload the modal contents every time it's opened
    // $('#modify_exam_modal').on('hidden.bs.modal', function () {
    //     $('#modify_category_div').removeClass('d-none');
    //     $('#modify_revision_div').removeClass('d-none');
    // });

    // Deleting of Exam
    $(document).on('click', '.btn_exam_delete', function () {
        let delete_exam = $(this).data('pkid');

        if (confirm("Are you sure you want to delete this Exam?")) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "delete_exam",
                    "pkid": delete_exam
                },
                dataType: "json",
                success: function (response) {
                    if (response.result) {
                        // tbl_exam.draw();
                    tblRecert.draw();
                    tblNewly.draw();
                    } else {
                        alert("Error deleting the Exam.");
                    }
                },
                error: function () {
                    alert("An error occurred while deleting the Exam.");
                }
            });
        }
    });

    // Getting of pkid of Exam to another page
    $(document).on('click', '.btn_exam_list', function () {

        // let edit_pkid = $(this).data('pkid');
        // console.log(edit_pkid);
        // // let edit_rev_no = $(this).data('rev_no');
        // // let edit_description = $(this).data('description');
        // // let edit_remarks = $(this).data('remarks');
        // // let edit_passing_score = $(this).data('passing_score');

        // console.log(edit_pkid);

        // // Set the values in the modal or form
        // $('#text_question_pkid').val(edit_pkid);
        // // $('#text_modify_revision_no').val(edit_rev_no);
        // // $('#text_modify_description').val(edit_description);
        // // $('#text_modify_exam_remarks').val(edit_remarks);
        // // $('#text_modify_passing_score').val(edit_passing_score);

        // 12/17/2024
        let get_pkid = $(this).data('pkid');
        // alert('working');

        $.ajax({
            type: "POST",
            url: handler,
            data: {
                action: "display_questions",
                exam_pkid: get_pkid
            },
            dataType: "json",
            success: function (response) {
                if (response.length > 0) {
                    window.location = 'index.php?page=questions_list.php&pkid=' + get_pkid;
                } else {
                    window.location = 'index.php?page=modify_questions.php&pkid=' + get_pkid;
                }
            },
            error: function () {
                alert("An error occurred while fetching questions.");
            }
        });

        // window.location = 'index.php?page=questions_list.php&pkid=' + get_pkid;

    });
});

</script> 