<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">

        <section id="examinees_records_tab" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <?php

                        session_start();

                        if (isset($_GET['pkid'])) {
                            $_SESSION['question_pkid'] = $_GET['pkid'];
                        } else {
                            $_SESSION['question_pkid'] = '';
                        }
                        ?>

                        <input type="hidden" name="question_pkid" id="text_question_pkid" value="<?php echo htmlspecialchars($_SESSION['question_pkid']); ?>">
                    </div>

                    <div class="col-md-10 d-flex justify-content-end mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white p-2 m-2">
                                <li class="breadcrumb-item"><a href="index.php?page=exam_records.php">Exam Records</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Examinees List</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card shadow-sm border-0 p-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="for-checking-tab" data-bs-toggle="tab" data-bs-target="#for_checking" type="button" role="tab" aria-selected="true">
                                For Checking Exams
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="checked-tab" data-bs-toggle="tab" data-bs-target="#checked" type="button" role="tab" aria-selected="false">
                                Checked Exams
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content p-3" id="myTabContent">
                        <!-- For Checking Exams Tab -->
                        <div class="tab-pane fade show active" id="for_checking" role="tabpanel" aria-labelledby="for-checking-tab">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="text-secondary" id="exam_label"></h6>
                                        <!-- <button class="btn btn-primary"><i class="fa fa-plus me-2"></i> Add New</button> -->
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tbl_checking" class="table table-striped table-hover table-bordered nowrap" style="width: 100%;">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Exam Take #</th>
                                                    <th>Date of Exam Take</th>
                                                    <th>Employee Number</th>
                                                    <th>Employee Name</th>
                                                    <th>Employee Score</th>
                                                    <th>Total Points</th>
                                                    <th>Percentage</th>
                                                    <th>Passing Score</th>
                                                    <th>Status</th>
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

                        <!-- Checked Exams Tab -->
                        <div class="tab-pane fade" id="checked" role="tabpanel" aria-labelledby="checked-tab">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="text-secondary" id="c_exam_label"></h6>
                                        <!-- Add Button (Optional) -->
                                        <!-- <button class="btn btn-primary"><i class="fa fa-plus me-2"></i> Add New</button> -->
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tbl_checked" class="table table-striped table-hover table-bordered nowrap" style="width: 100%;">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Exam Take #</th>
                                                    <th>Date of Exam Take</th>
                                                    <th>Employee Number</th>
                                                    <th>Employee Name</th>
                                                    <th>Employee Score</th>
                                                    <th>Total Points</th>
                                                    <th>Percentage</th>
                                                    <th>Passing Score</th>
                                                    <th>Status</th>
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
                </div>


            </div>
        </section>

        <!-- Section View Exam -->
        <section id="view_examinees_records_tab" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <?php

                        session_start();

                        if (isset($_GET['pkid'])) {
                            $_SESSION['question_pkid'] = $_GET['pkid'];
                        } else {
                            $_SESSION['question_pkid'] = '';
                        }
                        ?>

                        <input type="hidden" name="question_pkid" id="text_question_pkid" value="<?php echo htmlspecialchars($_SESSION['question_pkid']); ?>">
                    </div>

                    <div class="col-md-10 d-flex justify-content-end mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white p-2 m-2">
                                <li class="breadcrumb-item"><a href="#" id="examinees_list">Examinees List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Result</li>
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
                                            <h6 class="text-secondary" id="exam_label"></h6>
                                            <!-- <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#create_question"><i class="fa fa-plus fa-md me-2" style="color: white"></i>ADD NEW</button> -->
                                        </div>

                                        <form id="examinee_exam_form">
                                            <!-- <input type="hidden" name="result_score" id="text_result_score">
                                            <input type="hidden" name="result_total" id="text_result_total">
                                            <input type="hidden" name="result_exam_purpose" id="text_exam_result_purpose">
                                            <input type="hidden" name="result_exam_position" id="text_exam_result_position">
                                            <input type="hidden" name="result_exam_passing_score" id="text_result_exam_passing_score"> -->

                                            <input type="hidden" name="" id="r_exam_no">
                                            <input type="hidden" name="" id="r_points_earned">
                                            <input type="hidden" name="" id="r_total_points">
                                            <input type="hidden" name="" id="r_exam_total">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Exam Name:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="r_exam_name" readonly>
                                                        <input class="form-control" type="hidden" name="" id="r_exam_passing_score" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Percentage:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="rt_percent" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Tentative Score:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="rt_score" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Status:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="r_status" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Employee Number:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="r_emp_no" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Employee Name:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="r_emp_name" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Date Hired:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="date" name="" id="r_date_hired" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Position:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="r_position" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Date of Examination:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="date" name="" id="r_exam_date" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Examination Take:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="r_exam_takes" readonly>
                                                        <input class="form-control" type="hidden" name="" id="r_exam_take" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="tbl_result">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Question Type</th>
                                                            <th class="text-center">Image</th>
                                                            <th class="text-center">Description</th>
                                                            <th class="text-center">Question</th>
                                                            <th class="text-center">Choices</th>
                                                            <th class="text-center">Points</th>
                                                            <th class="text-center">Correct Answer</th>
                                                            <th class="text-center text-primary">User Answer</th>
                                                            <th class="text-center text-primary">Points Earned</th>
                                                            <th class="text-center text-primary" id="mod_score_col">Modify Score</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="modalTableBody">
                                                        <!-- Dynamic content will be inserted here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" id="submit_result">SUBMIT</button>
                                                <button class="d-none btn btn-secondary" id="submit_back"><a class="text-light" href="index.php?page=examinees_list.php">CLOSE</a></button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section View Exam -->
        <section id="view_examinees_records_result" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <?php

                        session_start();

                        if (isset($_GET['pkid'])) {
                            $_SESSION['question_pkid'] = $_GET['pkid'];
                        } else {
                            $_SESSION['question_pkid'] = '';
                        }
                        ?>

                        <input type="hidden" name="question_pkid" id="s_text_question_pkid" value="<?php echo htmlspecialchars($_SESSION['question_pkid']); ?>">
                    </div>

                    <div class="col-md-10 d-flex justify-content-end mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white p-2 m-2">
                                <li class="breadcrumb-item"><a href="#" id="s_examinees_list">Examinees List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Result</li>
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
                                            <h6 class="text-secondary" id="s_exam_label"></h6>
                                            <!-- <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#create_question"><i class="fa fa-plus fa-md me-2" style="color: white"></i>ADD NEW</button> -->
                                        </div>

                                        <form id="examinee_exam_forms">
                                            <!-- <input type="hidden" name="" id="s_text_status"> -->
                                            <input type="hidden" name="" id="s_exam_no">
                                            <input type="hidden" name="" id="s_points_earned">
                                            <input type="hidden" name="" id="s_total_points">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Exam Name:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="s_exam_name" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Percentage:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="st_percent" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Score:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="st_score" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Status:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="s_status" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Employee Number:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="s_emp_no" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Employee Name:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="s_emp_name" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Date Hired:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="date" name="" id="s_date_hired" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Position:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="s_position" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Date of Examination:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="date" name="" id="s_exam_date" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label style="color: Black">Examination Take:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="" id="s_exam_take" readonly>
                                                        <input class="form-control" type="hidden" name="" id="s_passing_score" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="s_tbl_result">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Question Type</th>
                                                            <th class="text-center">Image</th>
                                                            <th class="text-center">Description</th>
                                                            <th class="text-center">Question</th>
                                                            <th class="text-center">Choices</th>
                                                            <th class="text-center">Points</th>
                                                            <th class="text-center">Correct Answer</th>
                                                            <th class="text-center text-primary">User Answer</th>
                                                            <th class="text-center text-primary">Points Earned</th>
                                                            <!-- <th class="text-center text-primary" id="mod_score_col">Modify Score</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="modalTableBody">
                                                        <!-- Dynamic content will be inserted here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                            <div class="modal-footer">
                                                <!-- <button type="submit" class="btn btn-success" id="submit_result">SUBMIT</button> -->
                                                <form method="POST" action="pdf_theoretical.php" id="formGeneratePDF" target="_blank">

                                                    <input type="hidden" name="pdf_exam_name" id="text_pdf_exam_name">
                                                    <input type="hidden" name="pdf_exam_no" id="text_pdf_exam_no">
                                                    <input type="hidden" name="pdf_exam_purpose" id="text_pdf_exam_purpose">
                                                    <input type="hidden" name="pdf_exam_position" id="text_pdf_exam_position">
                                                    <input type="hidden" name="pdf_score" id="text_pdf_score">
                                                    <input type="hidden" name="pdf_rating" id="text_pdf_rating">
                                                    <input type="hidden" name="pdf_emp_no" id="text_pdf_emp_no">
                                                    <input type="hidden" name="pdf_emp_name" id="text_pdf_emp_name">
                                                    <input type="hidden" name="pdf_date_hired" id="text_pdf_date_hired">
                                                    <input type="hidden" name="pdf_position" id="text_pdf_position">
                                                    <input type="hidden" name="pdf_exam_date" id="text_pdf_exam_date">
                                                    <input type="hidden" name="pdf_exam_take" id="text_pdf_exam_take">

                                                    <input type="submit" class="btn btn-warning float-start pdf" id="pdf" name="pdf" value="Generate PDF">
                                                </form>
                                                <button class="btn btn-secondary" id="submit_back"><a class="text-light" href="index.php?page=examinees_list.php">CLOSE</a></button>
                                            </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        if (window.location.href.indexOf('examinees_list.php') > -1) {
            $('#check_exam').addClass('active');
            $('#theo_exam_menu').addClass('active');
            $('#theo_exam_menu').css({
                'background': '#494E53',
                'outline': 'none'
            });
            
            $('#examinees_records_tab').removeClass('d-none');
            $('#headerTitle').text('Examinees List');
            $('#url_title').text('Theoretical Examination');
        }

        $('#examinees_list').on('click', function (e) { 
            e.preventDefault();

            $('#check_exam').addClass('active');
            $('#toggleTheoretical').addClass('active');
            
            $('#examinees_records_tab').removeClass('d-none');
            $('#view_examinees_records_tab').addClass('d-none');

            $('#headerTitle').text('Examinees List');
            $('#url_title').text('Theoretical Examination');
            
        });

        $('#s_examinees_list').on('click', function (e) { 
            e.preventDefault();

            $('#check_exam').addClass('active');
            $('#toggleTheoretical').addClass('active');
            
            $('#examinees_records_tab').removeClass('d-none');
            $('#view_examinees_records_result').addClass('d-none');

            $('#headerTitle').text('Examinees List');
            $('#url_title').text('Theoretical Examination');
            
        });

        let handler = "./handler/handler.php";

        // datatables
        let datatable_result = $('#tbl_result').DataTable({
            columnDefs: [
                {
                    targets: 10,
                    visible: false
                },
            ],
            responsive: true,
            // Set the default number of entries to "All"
            pageLength: -1,
            // Configure the length menu to include the "All" option
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
        });

        let s_datatable_result = $('#s_tbl_result').DataTable({
            // Set the default number of entries to "All"
            "pageLength": -1,
            // Configure the length menu to include "All"
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
        });

        function initializeDataTable(tableId, status) {
            return $(tableId).DataTable({
                "aaSorting": [],
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "./server_side_scripts/examinees_list.php",
                "fnServerParams": function (aoData) {
                    aoData.push({ "name": "status", "value": status });
                },
                "drawCallback": function (settings) {
                    $(tableId).attr('style', 'width:100%;');
                },
                // Set the default number of entries to "All"
                "pageLength": -1,
                // Configure the length menu to include "All"
                "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
            });
        }

        // Initialize DataTables for different statuses
        let tblChecking = initializeDataTable('#tbl_checking', 0);
        let tblchecked = initializeDataTable('#tbl_checked', 1);

        let exam_number = $('#text_question_pkid').val();

        // To display Purpose and Position from tbl_exam_records
        // if (exam_number) {
        //     $.ajax({
        //         type: "POST",
        //         url: handler,
        //         data: {
        //             action: "display_result_position",
        //             text_exam_pkid: exam_number
        //         },
        //         dataType: "json",
        //         success: function(response) {
        //             // console.log(response);
                    
        //              // Check if the response contains data
        //             if (response && response.length > 0) {
        //                 $('#exam_label').text(response[0].exam_purpose + ' for ' + response[0].exam_position + ' Examinees List');
        //             } else {
        //                 $('#exam_label').text("No purpose and position found");
        //             }
                    
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('AJAX Error: ' + status + error);
        //         }
        //     });
        // }

        // 12/02/2024
        if (exam_number) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    action: "display_position",
                    text_exam_pkid: exam_number
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    
                     // Check if the response contains data
                    if (response && response.length > 0) {
                        $('#exam_label').text(response[0].exam_title + ' for ' + response[0].exam_position + ' (' + response[0].exam_rev_no + ')' + '  Examinees List');
                        $('#c_exam_label').text(response[0].exam_title + ' for ' + response[0].exam_position + ' (' + response[0].exam_rev_no + ')' + '  Examinees List');
                    } else {
                        $('#exam_label').text("No title and position found");
                        $('#c_exam_label').text("No title and position found");
                    }
                    
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        }

        // *********************************** MODIFY QUESTION*********************

        // Automatically reload the modal contents every time it's opened
        $('#modify_questions_form').on('hidden.bs.modal', function () {
            $('#modify_single_multiple').addClass('d-none');
            $('#modify_text_answer').addClass('d-none');
            $('#modify_grid_choices').addClass('d-none');

            $('#modify_sm_choices_container').empty();
            $('#modify_answerContainer').empty();
            $('#modify_keywordList').empty();
            $('#modify_multipleChoiceGrid thead tr').empty();
            $('#modify_gridQuestions').empty();
        });

        // Viewing of Questions
        $(document).on('click', '.btn_examinee_record_view', function () {

            $('#submit_back').addClass('d-none');
            $('#submit_result').removeClass('d-none');

            $('#check_exam').addClass('active');
            $('#toggleTheoretical').addClass('active');
            
            $('#view_examinees_records_tab').removeClass('d-none');

            $('#examinees_records_tab').addClass('d-none');

            $('#headerTitle').text('Examinee Record');
            $('#url_title').text('Theoretical Examination');

            let checked_Status = $(this).data('result_isChecked');
            let emp_no = $(this).data('emp_no');
            let exam_no = $(this).data('exam_pkid');
            // 1/13/2025
            let exam_name = $(this).data('exam_name');
            // commented on 1/13/2025
            let exam_purpose = $(this).data('exam_purpose');
            let exam_position = $(this).data('exam_position');
            // end

            // let exam_name = 

            let passing_score = $(this).data('passing_score');
            let emp_name = $(this).data('emp_name');
            let date_hired = $(this).data('date_hired');
            let position = $(this).data('position');
            let exam_date = $(this).data('exam_date');
            let exam_take = $(this).data('exam_take');
            let take = '';

            if (exam_take == 1) {
                take = '1st Take';
            } else if (exam_take == 2) {
                take = '2nd Take';
            } else {
                take = '3rd Take';
            }

            let q_num = $(this).data('q_num');
            let q_type = $(this).data('q_type');
            let q_image = $(this).data('q_image');
            let q_desc = $(this).data('q_desc');
            let q_question = $(this).data('q_question');
            let q_choices = $(this).data('q_choices');
            let q_points = $(this).data('q_points');
            let q_answer = $(this).data('q_answer');

            let qc_answer = $(this).data('qc_answer');
            let qc_points = $(this).data('qc_points');
            let qc_score = $(this).data('qc_score');
            let qc_total = $(this).data('qc_total');

            // 2/3/2025
            let percentage = (qc_score / qc_total) * 100;
            percentage = Math.round(percentage);
            let percent = percentage + '%';

            let status = '';

            // if(qc_score >= passing_score) {
            //     status = 'PASSED';
            // } else if (qc_score < passing_score) {
            //     status = 'FAILED';
            // }

            if (exam_take == 1) {
                if (percentage == 100) {
                    status = 'PASSED';
                } else if (percentage >= 70 && percentage <= 99) {
                    status = 'CONDITIONAL';
                } else {
                    status = 'FAILED / DISQUALIFIED';
                }
            } else if (exam_take == 2) {
                if (percentage == 100) {
                    status = 'PASSED';
                } else if (percentage >= 90 && percentage <= 99) {
                    status = 'CONDITIONAL';
                } else {
                    status = 'FAILED / DISQUALIFIED';
                }
            } else if (exam_take == 3) {
                if (percentage == 100) {
                    status = 'PASSED';
                } else {
                    status = 'FAILED / DISQUALIFIED';
                }
            }

            // if(checked_Status === 1){
            //     $('#submit_result').addClass('d-none');
            //     $('#submit_back').removeClass('d-none');

            //     datatable_result.column(10).visible(false);
            // }
            
            // console.log(edit_pkid);

            // Set the values in the form
            $('#r_emp_no').val(emp_no);
            $('#r_exam_no').val(exam_no);
            // 1/13/2025
            $('#r_exam_name').val(exam_name);
            // commented on 1/13/2025
            // $('#r_exam_name').val(exam_purpose + ' for ' + exam_position + ' Examination');
            //  end

            // 2/3/2025
            $('#rt_percent').val(percent);

            $('#r_exam_passing_score').val(passing_score);

            $('#r_emp_name').val(emp_name);
            $('#r_date_hired').val(date_hired);
            $('#r_position').val(position);
            $('#r_exam_date').val(exam_date);
            $('#r_exam_take').val(exam_take);
            $('#r_exam_takes').val(take);

            
            $('#r_points_earned').val(qc_score);
            $('#r_total_points').val(qc_score);
            $('#r_exam_total').val(qc_total);
            
            $('#rt_score').val(qc_score + ' / ' + qc_total);
            $('#r_status').val(status);

            // Load questions for DataTable
            $.ajax({
                url: handler,
                type: 'POST',
                data: {
                    action: 'fetch_record',
                    emp_no: emp_no,
                    exam_no: exam_no,
                    exam_date: exam_date,
                    exam_take: exam_take
                },
                dataType: 'json',
                success: function (response) {
                    
                    datatable_result.clear();

                    let totalPointsEarned = 0;
                    let totalPoints = 0;

                    datatable_result.column(10).visible(true);

                    // Populate DataTable with response
                    response.forEach(function (item, index) {
                        let earnedPoints = item.qc_points || 0;
                        totalPointsEarned += parseFloat(earnedPoints);
                        totalPoints += parseFloat(item.q_points);

                        // Split the values and join them with <br>
                        let formattedQuestions = item.q_question.split(',').join('<br>');
                        let formattedChoices = item.q_choices.split(',').join('<br>');
                        let formattedAnswers = item.q_answer.split(',').join('<br>');
                        let formattedCorrectAnswers = item.qc_answer.split(',').join('<br>');

                        // Generate dropdown options dynamically
                        let scoreDropdown = `<select class="form-select modify-score" id="m_${q_num}" data-index="${index}">`;
                        for (let i = 0; i <= item.q_points; i++) {
                            scoreDropdown += `<option value="${i}" ${i == earnedPoints ? 'selected' : ''}>${i}</option>`;
                        }
                        scoreDropdown += `</select>`;

                        // Add row to DataTable
                        datatable_result.row.add([
                            index + 1,
                            item.q_type,
                            item.q_image ? `<img src="${item.q_image}" width="50">` : 'N/A',
                            item.q_desc,
                            formattedQuestions,
                            formattedChoices,
                            item.q_points,
                            formattedAnswers,
                            formattedCorrectAnswers,
                            earnedPoints,
                            scoreDropdown // Replace input with dropdown
                        ]);
                    });

                    // Draw the table
                    datatable_result.draw();
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching questions:", error);
                }
            });
        });

        // $(document).on('click', '.pdf', function () {
        //     let employee = $('#text_pdf_emp_no').val();
        //     alert(employee);
        // });

        // Viewing of Questions
        $(document).on('click', '.btn_examinee_record_views', function () {

            $('#check_exam').addClass('active');
            $('#toggleTheoretical').addClass('active');

            $('#view_examinees_records_result').removeClass('d-none');

            $('#examinees_records_tab').addClass('d-none');

            $('#headerTitle').text('Examinee Record');
            $('#url_title').text('Theoretical Examination');

            let checked_Status = $(this).data('isChecked');
            let emp_no = $(this).data('emp_no');
            let exam_no = $(this).data('exam_pkid');
            // 1/13/2025
            let exam_name = $(this).data('exam_name');
            //  commented on 1/13/2025
            let exam_purpose = $(this).data('exam_purpose');
            let exam_position = $(this).data('exam_position');
            // end

            let passing_score = $(this).data('passing_score');
            let emp_name = $(this).data('emp_name');
            let date_hired = $(this).data('date_hired');
            let position = $(this).data('position');
            let exam_date = $(this).data('exam_date');
            let exam_take = $(this).data('exam_take');
            let take = '';

            if (exam_take == 1) {
                take = '1st Take';
            } else if (exam_take == 2) {
                take = '2nd Take';
            } else {
                take = '3rd Take';
            }

            let q_num = $(this).data('q_num');
            let q_type = $(this).data('q_type');
            let q_image = $(this).data('q_image');
            let q_desc = $(this).data('q_desc');
            let q_question = $(this).data('q_question');
            let q_choices = $(this).data('q_choices');
            let q_points = $(this).data('q_points');
            let q_answer = $(this).data('q_answer');

            let qc_answer = $(this).data('qc_answer');
            let qc_points = $(this).data('qc_points');
            let qc_score = $(this).data('qc_score');
            let qc_total = $(this).data('qc_total');

            // 2/3/2025
            let percentage = (qc_score / qc_total) * 100;
            percentage = Math.round(percentage);
            let percent = percentage + '%';
            
            let status = '';

            // if(qc_score >= passing_score) {
            //     status = 'PASSED';
            // } else if (qc_score < passing_score) {
            //     status = 'FAILED';
            // }

            if (exam_take == 1) {
                if (percentage == 100) {
                    status = 'PASSED';
                } else if (percentage >= 70 && percentage <= 99) {
                    status = 'CONDITIONAL';
                } else {
                    status = 'FAILED / DISQUALIFIED';
                }
            } else if (exam_take == 2) {
                if (percentage == 100) {
                    status = 'PASSED';
                } else if (percentage >= 90 && percentage <= 99) {
                    status = 'CONDITIONAL';
                } else {
                    status = 'FAILED / DISQUALIFIED';
                }
            } else if (exam_take == 3) {
                if (percentage == 100) {
                    status = 'PASSED';
                } else {
                    status = 'FAILED / DISQUALIFIED';
                }
            }

            // Set the values in the form
            $('#s_text_status').val(checked_Status);
            $('#s_emp_no').val(emp_no);
            $('#s_exam_no').val(exam_no);
            // 1/13/2025
            $('#s_exam_name').val(exam_name);
            // commented on 1/13/2025
            // $('#s_exam_name').val(exam_purpose + ' for ' + exam_position + ' Examination');
            // end
            // 2/3/2025
            $('#st_percent').val(percent);
            $('#s_emp_name').val(emp_name);
            $('#s_date_hired').val(date_hired);
            $('#s_position').val(position);
            $('#s_exam_date').val(exam_date);
            $('#s_exam_take').val(take);

            // 1/6/2025
            $('#s_passing_score').val(passing_score);


            $('#s_points_earned').val(qc_score);
            $('#s_total_points').val(qc_score);

            $('#st_score').val(qc_score + ' / ' + qc_total);
            $('#s_status').val(status);

            // FOR THE GENERATION OF PDF
            $('#text_pdf_emp_no').val(emp_no);
            // $('#s_exam_no').val(exam_no);
            // 1/13/2025
            $('#text_pdf_exam_name').val(exam_name);
            // commented on 1/13/2025
            // $('#text_pdf_exam_name').val(exam_purpose + ' for ' + exam_position + ' Examination');
            // end
            $('#text_pdf_exam_no').val(exam_no);
            $('#text_pdf_exam_purpose').val(exam_purpose);
            $('#text_pdf_exam_position').val(exam_position);
            $('#text_pdf_emp_name').val(emp_name);
            $('#text_pdf_date_hired').val(date_hired);
            $('#text_pdf_position').val(position);
            $('#text_pdf_exam_date').val(exam_date);
            $('#text_pdf_exam_take').val(exam_take);
            $('#text_pdf_score').val(qc_score + ' / ' + qc_total);
            $('#text_pdf_rating').val(status);

            // Load questions for DataTable
            $.ajax({
                url: handler,
                type: 'POST',
                data: {
                    action: 'view_fetch_record',
                    emp_no: emp_no,
                    exam_no: exam_no,
                    exam_date: exam_date,
                    exam_take: exam_take
                    // s_status: checked_Status
                },
                dataType: 'json',
                success: function (response) {
                    
                    s_datatable_result.clear();

                    let totalPointsEarned = 0;
                    let totalPoints = 0;

                    // s_datatable_result.column(10).visible(true);

                    // Populate DataTable with response
                    response.forEach(function (item, index) {
                        let earnedPoints = item.qc_points || 0;
                        totalPointsEarned += parseFloat(earnedPoints);
                        totalPoints += parseFloat(item.q_points);

                        // Split the values and join them with <br>
                        let formattedQuestions = item.q_question.split(',').join('<br>');
                        let formattedChoices = item.q_choices.split(',').join('<br>');
                        let formattedAnswers = item.q_answer.split(',').join('<br>');
                        let formattedCorrectAnswers = item.qc_answer.split(',').join('<br>');

                        // Add row to DataTable
                        s_datatable_result.row.add([
                            index + 1,
                            item.q_type,
                            item.q_image ? `<img src="${item.q_image}" width="50">` : 'N/A',
                            item.q_desc,
                            formattedQuestions,
                            formattedChoices,
                            item.q_points,
                            formattedAnswers,
                            formattedCorrectAnswers,
                            earnedPoints,
                        ]);
                    });

                    // Draw the table
                    s_datatable_result.draw();
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching questions:", error);
                }
            });
        });

        // 12/26/2024 ()
        $('#examinee_exam_form').submit(function (e) {
            e.preventDefault();

            let m_total = 0;

            // Collect exam details
            let modified_examDetails = [];
            $('#tbl_result tbody tr').each(function () {
                let row = $(this);
                let question_number = row.find('td:eq(0)').text().trim();
                let modified_score = parseFloat(row.find('.modify-score').val()) || 0;

                m_total += modified_score;

                modified_examDetails.push({
                    question_number: question_number,
                    modified_score: modified_score
                });

                // console.log(modified_examDetails);
            });

            console.log(m_total);

            let formData = {
                action: 'modify_exam_record',
                result_exam_no: $('#r_exam_no').val(),
                result_empNo: $('#r_emp_no').val(),
                result_exam_date: $('#r_exam_date').val(),
                result_exam_take: $('#r_exam_take').val(),

                // 1/6/2025
                result_exam_name: $('#r_exam_name').val(),
                result_passing_score: $('#r_exam_passing_score').val(),
                result_emp_name: $('#r_emp_name').val(),
                result_emp_position: $('#r_position').val(),
                result_total: $('#r_exam_total').val(),

                modified_examDetails: JSON.stringify(modified_examDetails),
                m_total: m_total
            };

            console.log(formData.result_passing_score);
            console.log(JSON.stringify(formData));

            // AJAX request
            $.ajax({
                url: handler,
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.trim() === "success") {
                        alert("New score added successfully!");

                        let s_emp_no = $('#r_emp_no').val();
                        let s_exam_no = $('#r_exam_no').val();
                        let s_exam_date = $('#r_exam_date').val();
                        let s_exam_take = $('#r_exam_take').val();

                        console.log(s_emp_no + " " + s_exam_no + " " + s_exam_date + " " + s_exam_take);

                        $.ajax({
                            type: "POST",
                            url: handler,
                            data: {
                                action: 'fetch_record',
                                emp_no: s_emp_no,
                                exam_no: s_exam_no,
                                exam_date: s_exam_date,
                                exam_take: s_exam_take
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response.length > 0) {
                                    // Update form fields
                                    let record = response[0];
                                    $('#r_emp_no').val(record.emp_no);
                                    $('#r_exam_no').val(record.exam_pkid);
                                    $('#r_exam_name').val(record.exam_name);
                                    $('#r_emp_name').val(record.emp_name);
                                    $('#r_date_hired').val(record.date_hired);
                                    $('#r_position').val(record.position);
                                    $('#r_exam_date').val(record.exam_date);
                                    $('#r_exam_take').val(record.exam_take);
                                    $('#r_points_earned').val(record.qc_score);
                                    $('#r_total_points').val(record.qc_total);
                                    $('#rt_score').val(record.qc_score + ' / ' + record.qc_total);

                                    // 1/6/2025
                                    $('#r_exam_passing_score').val(record.exam_passing_score);
                                    // alert(record.exam_passing_score);

                                    // console.log(record.qc_score + ' / ' + record.qc_total);

                                    if (record.qc_score >= record.exam_passing_score) {
                                        $('#r_status').val('PASSED');
                                    } else {
                                        $('#r_status').val('FAILED');
                                    }
                                } else {
                                    console.error("No records found.");
                                }

                                // Clear the DataTable and hide the 11th column
                                datatable_result.clear();
                                datatable_result.column(10).visible(false);

                                // Populate DataTable with new data
                                response.forEach(function (item, index) {
                                    let earnedPoints = item.qc_points || 0;
                                    let s_scoreDropdown = '<select class="modify-score"><option>0</option><option>1</option></select>'; // Example dropdown

                                    datatable_result.row.add([
                                        index + 1,
                                        item.q_type,
                                        item.q_image ? `<img src="${item.q_image}" width="50">` : 'N/A',
                                        item.q_desc,
                                        item.q_question.split(',').join('<br>'),
                                        item.q_choices.split(',').join('<br>'),
                                        item.q_points,
                                        item.q_answer.split(',').join('<br>'),
                                        item.qc_answer.split(',').join('<br>'),
                                        earnedPoints,
                                        s_scoreDropdown
                                    ]);
                                });

                                // Redraw the DataTable
                                datatable_result.draw();

                                // Show/hide buttons
                                $('#submit_result').addClass('d-none');
                                $('#submit_back').removeClass('d-none');
                            },
                            error: function (xhr, status, error) {
                                console.error("Error fetching questions:", error);
                            }
                        });

                        tblChecking.draw();
                        tblchecked.draw();

                        // Reload the parent table
                        let tbl_exam = window.parent.$('#tbl_exams').DataTable();
                        tbl_exam.ajax.reload();
                    } else {
                        alert("An error occurred while updating the record.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    alert("An error occurred. Please try again.");
                }
            });
        });


        $(document).on('click', '#submit_back', function (e) {
            e.preventDefault();
            let tbl_exam = window.parent.$('#tbl_exams').DataTable();
            tbl_exam.ajax.reload();

            tblChecking.draw();
            tblchecked.draw();

            $('#examinees_records_tab').removeClass('d-none');
            $('#view_examinees_records_tab').addClass('d-none');
            $('#view_examinees_records_result').addClass('d-none');
        });

        // DELETING OF EXAM RECORDS
        $(document).on('click', '.btn_examinee_delete', function () {
            let d_emp_no = $(this).data('emp_no');
            let d_exam_no = $(this).data('exam_no');
            let d_date_hired = $(this).data('exam_date');

            if (confirm("Are you sure you want to delete this Examinee record?")) {
                $.ajax({
                    type: "POST",
                    url: handler,
                    data: {
                        "action": "delete_examinee_record",
                        emp_no: d_emp_no,
                        exam_no: d_exam_no,
                        exam_date: d_date_hired
                    },
                    dataType: "json",
                    success: function (response) {

                        tblChecking.draw();
                        tblchecked.draw();

                    },
                    error: function () {
                        alert("An error occurred while deleting the Examinee record.");
                    }
                });
            }
        });


    });

</script> 