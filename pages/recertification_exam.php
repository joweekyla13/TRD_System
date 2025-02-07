<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section id="examination_tab" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end mt-2 mb-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-white p-2 m-2">
                                    <li class="breadcrumb-item"><a href="index.php?page=choose_exam.php">Choose Exam</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Information</li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Examination</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="" role="tabpanel">
                                <div class="row">
                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                    <!-- <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; height: 100vh;"> -->
                                    <!-- <div class="" style="display: flex; justify-content: center; align-items: center; height: 100vh;"></div> -->
                                        <div class="card elevation-4 p-4" style="width: 1000px;">
                                            <div class="card-body mb-3">
                                                <!-- <h3 class="fw-bold text-secondary text-center">Theoretical Examination</h3> -->
                                                    <?php
                                                        session_start();
                                                        // Check if pkid is present in the URL
                                                        if (isset($_GET['purpose']) && isset($_GET['pkid'])) {

                                                            $_SESSION['exam_pkid'] = $_GET['pkid'];
                                                            // $_SESSION['exam_purpose'] = $_GET['purpose'];
                                                            // $_SESSION['exam_position'] = $_GET['position'];
                                                            // $_SESSION['exam_passing_score'] = $_GET['passing_score'];
                                                        }
                                                    ?>
                                                    <input type="hidden" id="text_get_exam_pkid" value="<?php echo htmlspecialchars($_SESSION['exam_pkid']); ?>">
                                                    <h5 class="fw-bold text-dark text-center" id="text_get_exam_name"></h5>

                                                    <hr>

                                                    <div class="mb-1">
                                                        <label style="color: DodgerBlue">Employee No.</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="get_emp_no" id="text_get_emp_no" list="EmpNo" placeholder="Select Employee Number" style="text-transform: uppercase">
                                                        <datalist id="EmpNo">
                                                        
                                                        </datalist>
                                                    </div>

                                                    <div class="mb-1">
                                                        <label style="color: DodgerBlue">Name:</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="get_name" id="text_get_name" placeholder="Employee Name" readonly>
                                                    </div>

                                                    <div class="mb-1">
                                                        <label style="color: DodgerBlue">Date Hired</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="date" name="get_date_hired" id="text_get_date_hired" readonly>
                                                    </div>

                                                    <div class="mb-1">
                                                        <label style="color: DodgerBlue">Date Examination</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="date" name="get_date_exam" id="text_get_date_exam" readonly>
                                                    </div>

                                                    <div class="mb-1">
                                                        <label style="color: DodgerBlue">Position</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <input class="form-control" type="text" name="position" id="text_position" placeholder="Employee Position" readonly>
                                                        <!-- <datalist id="list_position">
                                                            
                                                        </datalist> -->
                                                    </div>

                                                    <div class="mb-1">
                                                        <label style="color: DodgerBlue">Examination Take</label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <!-- <select class="form-select" name="get_exam_take" id="text_get_exam_take">
                                                            <option selected disabled value="0">Select Examination Take</option>
                                                            <option value="1">Take 1</option>
                                                            <option value="2">Take 2</option>
                                                            <option value="3">Take 3</option>
                                                        </select> -->
                                                        <input class="form-control" type="text" name="get_exam_take" id="text_get_exam_take" placeholder="Examination Take" readonly>
                                                    </div>

                                                    <hr>
                                                    <div class="mt-3">
                                                        <button class="float-end btn btn-sm btn-primary" id="information_btn">Next<i class="fa-solid fa-angles-right ms-3" style="color: white"></i></button>
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

        <section id="selected_exam_tab" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end mt-2 mb-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-white p-2 m-2">
                                    <li class="breadcrumb-item"><a href="index.php?page=choose_exam.php">Choose Exam</a></li>
                                    <!-- <li class="breadcrumb-item"><a href="index.php?page=examination.php">Information</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Examination</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="" role="tabpanel">
                                <div class="row">
                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                        <div class="card elevation-4 p-4" style="width: 1000px;">
                                            <div class="card-body mb-3">

                                                <form id="submit_exam">

                                                    <input type="hidden" id="text_get_exam_pkid" value="<?php echo htmlspecialchars($_SESSION['exam_pkid']); ?>">
                                                    <h5 class="fw-bold text-dark text-center" id="text_get_exam_title"></h5>
                                                    
                                                    <span class="fs-6" style="display: none" id="exam_category_id"></span>
                                                    <span class="fs-6" style="display: none" id="exam_purpose_id"></span>
                                                    <span class="fs-6" style="display: none" id="exam_department_id"></span>
                                                    <span class="fs-6" style="display: none" id="exam_position_id"></span>
                                                    <span class="fs-6" style="display: none" id="exam_prLine_id"></span>
                                                    <span class="fs-6" style="display: none" id="exam_passing_score_id"></span>

                                                    <hr>

                                                    <div class="mb-3" id="remarks_container">

                                                    </div>

                                                    <hr>

                                                    <div class="" id="question_container">
                                                        
                                                    </div>

                                                    <hr>
                                                    <div class="mt-3 d-flex justify-content-end gap-2">
                                                        <button class="btn btn-sm btn-secondary" id="information_back_btn">BACK</button>
                                                        <button type="submit" class="btn btn-sm btn-success" id="exam_submit_btn"><i class="fa-solid fa-file-import me-2" style="color: white"></i>SUBMIT</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </section>

        <!-- 11/20/2024 modal for result -->
        <div class="modal fade" id="resultModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-info d-flex justify-content-between align-items-center">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Exam Results</h1>
                        <div class="d-flex align-items-center">
                            <h4 class="fs-5 fw-semibold me-3" style="display: none;">Tentative Score: <span id="result_score"></span>/<span id="result_total"></span></h4>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                    </div>
                    <div class="modal-body p-3">
                        <form id="submit_result_form">
                            <input type="hidden" name="result_score" id="text_result_score">
                            <input type="hidden" name="result_total" id="text_result_total">
                            <input type="hidden" name="result_rev_no" id="textrevNo">

                            <!-- 1/13/2025-->
                             <input type="hidden" name="result_exam_cat" id="text_result_exam_cat">
                            <input type="hidden" name="result_exam_department" id="text_result_exam_department">
                            <input type="hidden" name="result_exam_prLine" id="text_result_exam_prLine">
                            <!-- end -->

                            <input type="hidden" name="result_exam_purpose" id="text_exam_result_purpose">
                            <input type="hidden" name="result_exam_position" id="text_exam_result_position">
                            <input type="hidden" name="result_exam_passing_score" id="text_result_exam_passing_score">

                            <div class="row" style="display: none;">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Exam Number:</span>
                                        <input class="form-control" type="text" name="result_exam_no" id="text_result_exam_no" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Exam Name:</span>
                                        <input class="form-control" type="text" id="result_exam_name" name="exam_name" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="display: none;">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Employee Number</span>
                                        <input class="form-control" type="text" name="result_empNo" id="text_result_empNo" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Employee Name</span>
                                        <input class="form-control" type="text" name="result_name" id="text_result_name" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="display: none;">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Date Hired</span>
                                        <input class="form-control" type="date" name="result_date_hired" id="text_result_date_hired" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Position</span>
                                        <input class="form-control" type="text" name="result_position" id="text_result_position" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="display: none;">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Date of Examination</span>
                                        <input class="form-control" type="date" name="result_exam_date" id="text_result_exam_date" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Examination Take</span>
                                        <input class="form-control" type="text" name="result_exam_take" id="text_result_exam_take" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive" style="display: none;">
                                <table class="table table-bordered" style="width: 100%;" id="tbl_result">
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
                                        </tr>
                                    </thead>
                                    <tbody id="modalTableBody">
                                        <!-- Dynamic content will be inserted here -->
                                    </tbody>
                                </table>
                            </div>

                            <br><br>
                            <h3 class="text-center">You have successfully submitted your answers.</h3> <br><br>
                            <h3 class="text-center">Your tentative score is <span id="min_result_score"></span>/<span id="min_result_total"></span> </h3> <br><br>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" id="submit_result">DONE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        if (window.location.href.indexOf('recertification_exam.php') > -1) {
            $('#choose_exam').addClass('active');
            $('#theo_exam_menu').addClass('active');
            $('#theo_exam_menu').css({
                'background': '#494E53',
                'outline': 'none'
            });
            
            $('#examination_tab').removeClass('d-none');
            $('#headerTitle').text('Examination');
            $('#url_title').text('Theoretical Examination');
        }

        let handler = "./handler/handler.php";

        // 12/10/2024
        let details = {
            "action": "display_empno",
        };
        // details = $.param(details) + "&" + $('#EmpNo').serialize();

        $.ajax({
            type: "POST",
            url: handler,
            data: details,
            dataType: "json",
            success: function (response) {
                // console.log(response);
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

    // // GETTING EMPLOYEE DETAILS BASE IN THE EMPLOYEE NUMBER
    // $('#text_get_emp_no').on('change', function() {
    //     let empNo = $(this).val();

    //     // start ng dinagdag
    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             action: "check_employee",
    //             empNo: empNo
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             let emp_No = response.EmpNo;

    //             alert(emp_No);

    //             // og code start
    //             if(empNo) {
    //                 $.ajax({
    //                     type: "POST",
    //                     url: handler,
    //                     data: {
    //                         "action": "get_emp",
    //                         "textEmpNo": empNo
    //                     },
    //                     dataType: "json",
    //                     success: function(response) {
    //                         // console.log(response.Position);
    //                         if(response.FullName) {
    //                             $('#text_get_name').val(response.FullName);
    //                             $('#text_position').val(response.Position);
    //                             $('#text_get_date_hired').val(response.DateHired);
    //                         } else {
    //                             $('#text_get_name').val(''); 
    //                             $('#text_position').val('');
    //                             $('#text_get_date_hired').val('');
    //                         }
    //                     },
    //                     error: function(xhr, status, error) {
    //                         console.error('AJAX Error: ' + status + error);
    //                     }
    //                 });
    //             } // og code end
    //             else {
    //                 alert(wala);
    //                 return false;
    //             }
    //         }
    //     }); // end ng dinagdag
    // });

    let exam_pkid = $('#text_get_exam_pkid').val();

    // 12/20/2024
    $('#text_get_emp_no').on('change', function () {
        let empNo = $(this).val();

        if (!empNo) {
            alert("Please enter an employee number.");
            return;
        }

        $.ajax({
            type: "POST",
            url: handler,
            data: {
                action: "get_emp",
                textEmpNo: empNo
            },
            dataType: "json",
            success: function (response) {
                if (response.FullName) {
                    $('#text_get_name').val(response.FullName);
                    $('#text_position').val(response.Position);
                    $('#text_get_date_hired').val(response.DateHired);

                    $.ajax({
                        type: "POST",
                        url: handler,
                        data: {
                            action: "get_take_no",
                            empNo: empNo,
                            exam: exam_pkid
                        },
                        dataType: "json",
                        success: function (response) {
                            // Ensure the response is processed correctly
                            let attempts = response.map(item => Number(item.result_exam_take)); // Extract result_exam_take as numbers

                            // Check if all three attempts (1, 2, 3) exist
                            if (attempts.includes(1) && attempts.includes(2) && attempts.includes(3)) {
                                alert("You already took the exam 3 times and cannot take it anymore.");
                                window.location = 'index.php?page=choose_exam.php';
                            } else {
                                // Determine the next attempt
                                let nextAttempt = Math.max(...attempts, 0) + 1; // Find the max and increment it
                                $('#text_get_exam_take').val(nextAttempt); // Set the next attempt in the dropdown
                                // console.log("Next Exam Take:", nextAttempt);
                                console.log("Exam No:", exam_pkid);
                                // alert("You can now take the exam.");
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                        }
                    });

                } else {
                    // Clear fields if no data found
                    $('#text_get_name').val('');
                    $('#text_position').val('');
                    $('#text_get_date_hired').val('');
                    alert(response.error || "No employee details found.");
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });

        // // Check if employee exists in tbl_training_request
        // $.ajax({
        //     type: "POST",
        //     url: handler,
        //     data: {
        //         action: "check_employee",
        //         empNo: empNo
        //     },
        //     dataType: "json",
        //     success: function (response) {
        //         if (response.length > 0) {
        //             // Employee exists in tbl_training_request
        //             let emp_No = response[0].EmpNo;
        //             // alert(`Employee ${emp_No} exists in the training request table.`);

        //             // Fetch employee details regardless
        //             $.ajax({
        //                 type: "POST",
        //                 url: handler,
        //                 data: {
        //                     action: "get_emp",
        //                     textEmpNo: emp_No
        //                 },
        //                 dataType: "json",
        //                 success: function (response) {
        //                     if (response.FullName) {
        //                         $('#text_get_name').val(response.FullName);
        //                         $('#text_position').val(response.Position);
        //                         $('#text_get_date_hired').val(response.DateHired);

        //                         $.ajax({
        //                             type: "POST",
        //                             url: handler,
        //                             data: {
        //                                 action: "get_take_no",
        //                                 empNo: empNo,
        //                                 exam: exam_pkid
        //                             },
        //                             dataType: "json",
        //                             success: function (response) {
        //                                 // Ensure the response is processed correctly
        //                                 let attempts = response.map(item => Number(item.result_exam_take)); // Extract result_exam_take as numbers

        //                                 // Check if all three attempts (1, 2, 3) exist
        //                                 if (attempts.includes(1) && attempts.includes(2) && attempts.includes(3)) {
        //                                     alert("You already took the exam 3 times and cannot take it anymore.");
        //                                     window.location = 'index.php?page=choose_exam.php';
        //                                 } else {
        //                                     // Determine the next attempt
        //                                     let nextAttempt = Math.max(...attempts, 0) + 1; // Find the max and increment it
        //                                     $('#text_get_exam_take').val(nextAttempt); // Set the next attempt in the dropdown
        //                                     // console.log("Next Exam Take:", nextAttempt);
        //                                     console.log("Exam No:", exam_pkid);
        //                                     // alert("You can now take the exam.");
        //                                 }
        //                             },
        //                             error: function (xhr, status, error) {
        //                                 console.error('AJAX Error:', status, error);
        //                             }
        //                         });

        //                     } else {
        //                         // Clear fields if no data found
        //                         $('#text_get_name').val('');
        //                         $('#text_position').val('');
        //                         $('#text_get_date_hired').val('');
        //                         alert(response.error || "No employee details found.");
        //                     }
        //                 },
        //                 error: function (xhr, status, error) {
        //                     console.error('AJAX Error:', status, error);
        //                 }
        //             });
        //         } else {
        //             alert("Sorry. You are not allowed to take an exam as of now.");
        //             window.location = 'index.php?page=choose_exam.php';
        //         }
        //     },
        //     error: function (xhr, status, error) {
        //         console.error('AJAX Error:', status, error);
        //     }
        // });
    });

    // ADDING DATA IN TABLE REQUEST (DYNAMICALLY)
    let result_table = $('#tbl_result').DataTable({
        // Set the default number of entries to "All"
        "pageLength": -1,
        // Configure the length menu to include "All"
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
    });  

    let today = new Date().toISOString().split('T')[0];
    $('#text_get_date_exam').val(today);

    // CLEARING THE EMPLOYEE DETAILS IF THE EMPLOYEE NUMBER IS EMPTY
    $('#text_get_emp_no').on('input', function () {

    let check_empNo = $(this).val();

        if(check_empNo === ''){
            $('#text_get_emp_no').val('');
            $('#text_get_name').val('');
            $('#text_get_date_hired').val('');
            $('#text_position').val('');
            $('#text_get_exam_take').val('');
        }
    });

    // let exam_pkid = $('#text_get_exam_pkid').val();

    $(document).on('click', '#information_btn', function (e) {
        e.preventDefault();

        // 11/21/2024 commented the values
        let name = $('#text_get_name').val().trim();
        let emp_no = $('#text_get_emp_no').val().trim();
        let date_hired = $('#text_get_date_hired').val();
        let date_exam = $('#text_get_date_exam').val();
        let position = $('#text_position').val();
        let exam_take = $('#text_get_exam_take').val();
        // console.log(exam_take);

        if (name == '' || emp_no == '' || date_hired == '' || position == '' || exam_take == null) {
            alert('Please fill up the required fields.');
        } else {
            $('#examination_tab').addClass('d-none');

            $('#choose_exam').addClass('active');
            $('#toggleTheoretical').addClass('active');
            $('#selected_exam_tab').removeClass('d-none');
            $('#headerTitle').text('Examination');
            $('#url_title').text('Theoretical Examination');
        }
    });

    $(document).on('click', '#information_back_btn', function (e) {
        e.preventDefault();

        $('#choose_exam').addClass('active');

        $('#examination_tab').removeClass('d-none');
        $('#toggleTheoretical').addClass('active');
        $('#selected_exam_tab').addClass('d-none');
        $('#headerTitle').text('Examination');
        $('#url_title').text('Theoretical Examination');
    });

    // To display Remarks from tbl_exams
    if (exam_pkid) {
        $.ajax({
            type: "POST",
            url: handler,
            data: {
                action: "display_remarks",
                text_exam_pkid: exam_pkid
            },
            dataType: "json",
            success: function(response) {
                // console.log(response);

                if (response && response.length > 0) {
                    response.forEach((question) => {
                        let remarksHtml = `
                            <div class="mt-1">
                                <p class="text-dark" style="text-align: justify;">
                                    <span style="font-weight: bold;">Instructions: </span>${question.exam_remarks}
                                </p>
                            </div>
                        `;

                        // Append the final HTML structure to the container
                        $('#remarks_container').append(remarksHtml);
                    });
                } else {
                    $('#remarks_container').append('<p>No remarks available.</p>');
                }

            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
            }
        });
    }

    // To display questions from tbl_questions
    let data = {
        action: "display_questions",
        exam_pkid: exam_pkid
    }
    $.ajax({
        type: 'POST',
        url: handler,
        data: data,
        dataType: "json",
        success: function(response) {
            if (response && response.length > 0) {
                response.forEach((question) => {
                    let questionHtml = '';

                    // For CHOICES type questions
                    if (question.question_type === 'CHOICES') {
                        let choices = question.question_choices.split(', <br>');
                        let answers = question.question_answer.split(', <br>');

                        questionHtml += `
                            <div class="mt-1">
                                <p class="text-secondary float-end">${question.question_points} Point/s*</p>
                                <p><strong>${question.question_number}.</strong> ${question.question}</p>
                        `;

                        if (question.question_image_path !== 'uploads/no_image.png') {
                            questionHtml += `
                                <div class="d-flex justify-content-center">
                                    <img src="${question.question_image_path}" class="img-fluid mb-2" style="width: 600px; height: 600px;">
                                </div>
                            `;
                        }

                        // Add choices as radio buttons or checkboxes
                        if (answers.length > 1) {
                            // Multiple answers (checkboxes)
                            choices.forEach((choice, index) => {
                                questionHtml += `
                                    <div class="ms-4">
                                        <input type="checkbox" name="${question.question_number}" value="${choice}" id="checkbox_${question.question_number}_${index}">
                                        <label for="checkbox_${question.question_number}_${index}" class="ms-2" style="font-weight: normal; display: inline-block; max-width: 80%; vertical-align: top;">
                                            ${choice}
                                        </label>
                                    </div>
                                `;
                            });
                        } else {
                            // Single answer (radio buttons)
                            choices.forEach((choice, index) => {
                                questionHtml += `
                                    <div class="ms-4">
                                        <input type="radio" name="${question.question_number}" value="${choice}" id="radio_${question.question_number}_${index}">
                                        <label for="radio_${question.question_number}_${index}" class="ms-2" style="font-weight: normal; display: inline-block; max-width: 80%; vertical-align: top;">
                                            ${choice}
                                        </label>
                                    </div>
                                `;
                            });
                        }

                        questionHtml += `</div>`;
                    }

                    // For TEXT type questions
                    else if (question.question_type === 'TEXT') {
                        questionHtml += `
                            <div class="mt-1">
                                <p class="text-secondary float-end">${question.question_points} Point/s*</p>
                                <p><strong>${question.question_number}.</strong> ${question.question}</p>
                                `;

                                if (question.question_image_path !== 'uploads/no_image.png') {
                                    questionHtml += `
                                        <div class="d-flex justify-content-center">
                                            <img src="${question.question_image_path}" class="img-fluid mb-2" style="width: 600px; height: 600px;">
                                        </div>
                                    `;
                                }
                                questionHtml += `
                                <input class="form-control mb-3" type="textarea" name="${question.question_number}" placeholder="Enter answer" style="height: 100px; width: 100%;">
                            </div>
                        `;
                    }

                    // For GRID type questions
                    else if (question.question_type === 'GRID') {
                        let rowArray = question.question.split(', <br>');
                        let columnArray = question.question_choices.split(', <br>');

                        questionHtml += `
                            <div class="mt-1 grid-question">
                                <p class="text-secondary float-end">${question.question_points} Point/s*</p>
                                <p><strong>${question.question_number}.</strong> ${question.question_desc}</p>
                                `;

                                if (question.question_image_path !== 'uploads/no_image.png') {
                                    questionHtml += `
                                        <div class="d-flex justify-content-center">
                                            <img src="${question.question_image_path}" class="img-fluid mb-2" style="width: 600px; height: 600px;">
                                        </div>
                                    `;
                                }
                                questionHtml += `
                                <table class="table table-bordered" style="width: 100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="text-secondary">Question</th>
                        `;

                        columnArray.forEach(choice => {
                            questionHtml += `<th style="font-weight: normal">${choice}</th>`;
                        });

                        questionHtml += `</tr></thead><tbody>`;

                        rowArray.forEach((rowQuestion) => {
                            questionHtml += `<tr><td>${rowQuestion}</td>`;

                            // Generate radio buttons for each column
                            columnArray.forEach(choice=> {
                                let sanitizedRowQuestion = rowQuestion.replace(/[^a-zA-Z0-9]/g, '_');
                                questionHtml += `
                                    <td class="text-center">
                                        <input type="radio" 
                                            name="${question.question_number}_${sanitizedRowQuestion}" 
                                            value="${choice}">
                                    </td>
                                `;
                            });

                            questionHtml += `</tr>`;
                        });

                        questionHtml += `</tbody></table></div>`;
                    }

                    $('#question_container').append(questionHtml);
                });
            } else {
                $('#question_container').append('<p>No questions available.</p>');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });

        // 1/13/2025
        // let examPKID = $('#text_get_exam_pkid').val();

        if(exam_pkid) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    action: "display_position",
                    text_exam_pkid: exam_pkid
                },
                dataType: "json",
                success: function (response) {
                    // alert(response[0].exam_cat);
                    $('#text_get_exam_name').text(response[0].exam_title);
                    $('#text_get_exam_title').text(response[0].exam_title);
                    
                    $('#exam_category_id').text(response[0].exam_cat);
                    $('#exam_purpose_id').text(response[0].exam_purpose);
                    $('#exam_department_id').text(response[0].exam_department);
                    $('#exam_position_id').text(response[0].exam_position);
                    $('#exam_prLine_id').text(response[0].exam_productLine);
                    $('#exam_passing_score_id').text(response[0].exam_passing_score);
                }
            });
        }

        // 12/26/2024
        $('#submit_exam').submit(function (e) {
            e.preventDefault();

            let allQuestionsAnswered = true;

            // Validate radio button questions
            $('input[type=radio]').each(function () {
                let questionName = $(this).attr('name');
                if ($(`input[name='${questionName}']:checked`).length === 0) {
                    allQuestionsAnswered = false;
                    alert("Please select answer for all questions before submitting the exam.");
                    return false; // Break out of the loop
                }
            });

            if (!allQuestionsAnswered) return;

            // Validate checkbox questions
            $('input[type=checkbox]').each(function () {
                let questionName = $(this).attr('name');
                if ($(`input[name='${questionName}']:checked`).length === 0) {
                    allQuestionsAnswered = false;
                    alert("Please select answer for all questions before submitting the exam.");
                    return false; // Break out of the loop
                }
            });

            if (!allQuestionsAnswered) return;

            // Validate grid questions
            let isValid = true; // For grid questions validation
            $('.grid-question').each(function () {
                $(this).find('tbody tr').each(function () {
                    let rowHasSelectedAnswer = $(this).find('input[type="radio"]:checked').length > 0;
                    if (!rowHasSelectedAnswer) {
                        isValid = false;
                        alert('Please select an answer for all rows in the grid question.');
                        return false; // Break out of the loop
                    }
                });
                if (!isValid) return false; // Break out of the outer loop
            });

            if (!isValid) return;

            // Validate text inputs
            $('textarea, input[type=textarea]').each(function () {
                if ($(this).val().trim() === "") {
                    allQuestionsAnswered = false;
                    alert("Please fill in all questions before submitting the exam.");
                    return false; // Break out of the loop
                }
            });

            if (!allQuestionsAnswered) return;

            // If all validations pass, proceed with form submission logic
            let exam_pkid = $('#text_get_exam_pkid').val();
            let exam_name = $('#text_get_exam_title').text();
            let exam_cat = $('#exam_category_id').text();
            let exam_purpose = $('#exam_purpose_id').text();
            let exam_department = $('#exam_department_id').text();
            let exam_position = $('#exam_position_id').text();
            let exam_product_line = $('#exam_prLine_id').text();
            let exam_passing_score = $('#exam_passing_score_id').text();

            let name = $('#text_get_name').val();
            let emp_no = $('#text_get_emp_no').val();
            let date_hired = $('#text_get_date_hired').val();
            let date_exam = $('#text_get_date_exam').val();
            let position = $('#text_position').val();
            let exam_take = $('#text_get_exam_take').val();

            let answers = {};
            let originalAnswers = {};

            // Process radio buttons
            $('input[type=radio]:checked').each(function () {
                let question_input = $(this).attr('name');
                let answer_input = $(this).val();
                let originalAnswer = $(this).data('raw-answer') || answer_input;

                let question_number = question_input.split('_')[0];
                if (!answers[question_number]) answers[question_number] = [];
                if (!originalAnswers[question_number]) originalAnswers[question_number] = [];
                answers[question_number].push(answer_input);
                originalAnswers[question_number].push(originalAnswer);
            });

            // Process checkboxes
            $('input[type=checkbox]:checked').each(function () {
                let question_input = $(this).attr('name');
                let originalAnswer = $(this).data('raw-answer') || $(this).val();
                if (!answers[question_input]) answers[question_input] = [];
                answers[question_input].push($(this).val());
                if (!originalAnswers[question_input]) originalAnswers[question_input] = [];
                originalAnswers[question_input].push(originalAnswer);
            });

            // Process text inputs
            $('textarea, input[type=textarea]').each(function () {
                let question_input = $(this).attr('name');
                let answer_input = $(this).val().trim();
                let originalAnswer = answer_input;
                if (answer_input) {
                    if (!answers[question_input]) answers[question_input] = [];
                    answers[question_input].push(answer_input);
                    if (!originalAnswers[question_input]) originalAnswers[question_input] = [];
                    originalAnswers[question_input].push(originalAnswer);
                }
            });

            // alert("All validations passed. Submitting form data...");

            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    action: "getRevNo",
                    examPKID: exam_pkid
                },
                dataType: "json",
                success: function (response) {
                    if (response && response.rev_no) {
                        // alert(response.rev_no);
                        // console.log(response.rev_no);

                        $('#textrevNo').val(response.rev_no);

                        $.ajax({
                            type: 'POST',
                            url: handler,
                            data: {
                                action: 'check_exam_answers',
                                examPKID: exam_pkid
                            },
                            dataType: 'json',
                            success: function (response) {
                                if (response && response.length > 0) {
                                    let totalPoints = 0;
                                    let modalContent = "";
                                    let totalQuestionPoints = 0;

                                    response.forEach((data) => {
                                        let questionNumber = data.question_number;
                                        let questionType = data.question_type;
                                        let questionImage = data.question_image_path;
                                        let questionDesc = data.question_desc
                                        let question = data.question;
                                        let questionChoices = data.question_choices;
                                        let correctAnswerRaw = data.question_answer;
                                        let questionPoints = parseFloat(data.question_points);

                                        // Add question points to total possible points
                                        totalQuestionPoints += questionPoints;

                                        // Normalize correct answers
                                        let correctAnswers = correctAnswerRaw.split(', <br>').map(answer => answer.trim().toLowerCase());

                                        // Normalize user answers
                                        let userAnswer = answers[questionNumber] || "No Answer";
                                        let userAnswers = Array.isArray(userAnswer) ? userAnswer.map(a => a.trim().toLowerCase()) : [userAnswer.toLowerCase()];

                                        let pointsEarned = 0;

                                        if (questionType === 'GRID') {
                                            // GRID type question: Check row-by-row
                                            let pointsPerRow = questionPoints / correctAnswers.length; // Divide points by number of rows
                                            correctAnswers.forEach((correctAnswer, rowIndex) => {
                                                let userRowAnswer = userAnswers[rowIndex] || "No Answer"; // Default if row answer is missing
                                                if (userRowAnswer === correctAnswer) {
                                                    pointsEarned += pointsPerRow;
                                                }
                                            });

                                            pointsEarned = Math.round(pointsEarned); // can remmove this so that there is a point on a score

                                        } else if (questionType === 'CHOICES') {
                                            // CHOICES type question: Award points for correct answers selected
                                            let pointsPerCorrectAnswer = questionPoints / correctAnswers.length;

                                            userAnswers.forEach((answer) => {
                                                if (correctAnswers.includes(answer)) {
                                                    pointsEarned += pointsPerCorrectAnswer; // Add points for correct answers
                                                }
                                            });

                                            // Cap points to the total question points
                                            pointsEarned = Math.min(pointsEarned, questionPoints);
                                            pointsEarned = Math.round(pointsEarned); // can remmove this so that there is a point on a score
                                        } else if (questionType === 'TEXT') {
                                            // TEXT type question: Always give 0 points
                                            pointsEarned = 0;
                                        }

                                        totalPoints += pointsEarned;

                                        // Get the original user answer for display
                                        let originalUserAnswer = originalAnswers[questionNumber] || 'No Answer';
                                        let displayUserAnswer = Array.isArray(originalUserAnswer) ? originalUserAnswer.join(', <br>') : originalUserAnswer;

                                        // View user information to results modal
                                        $('#text_result_score').val(totalPoints);
                                        $('#text_result_total').val(totalQuestionPoints);
                                        $('#text_result_exam_no').val(exam_pkid);
                                        $('#result_exam_name').val(exam_name);
                                        $('#text_result_exam_cat').val(exam_cat);
                                        $('#text_exam_result_purpose').val(exam_purpose);
                                        $('#text_result_exam_department').val(exam_department);
                                        $('#text_exam_result_position').val(exam_position);
                                        $('#text_result_exam_prLine').val(exam_product_line);
                                        $('#text_result_exam_passing_score').val(exam_passing_score);
                                        $('#result_score').text(totalPoints);
                                        $('#result_total').text(totalQuestionPoints);
                                        $('#text_result_empNo').val(emp_no);
                                        $('#text_result_name').val(name);
                                        $('#text_result_date_hired').val(date_hired);
                                        $('#text_result_position').val(position);
                                        $('#text_result_exam_date').val(date_exam);
                                        $('#text_result_exam_take').val(exam_take);
                                        
                                        $('#min_result_score').text(totalPoints);
                                        $('#min_result_total').text(totalQuestionPoints);

                                        // Append data to modal content
                                        modalContent += `
                                            <tr>
                                                <td>${questionNumber}</td>
                                                <td>${questionType}</td>
                                                <td><img src="${questionImage}" style="width: 100px; height: auto;"></td>
                                                <td>${questionDesc}</td>
                                                <td>${question}</td>
                                                <td>${questionChoices}</td>
                                                <td>${questionPoints}</td>
                                                <td>${correctAnswerRaw}</td>
                                                <td class="text-primary">${displayUserAnswer || 'No Answer'}</td>
                                                <td class="text-primary">${pointsEarned}</td>
                                            </tr>
                                        `;
                                    });

                                    // Append total score row to modal
                                    modalContent += `
                                        <tr>
                                            <td colspan="9" style="text-align: right;" class="text-primary"><strong>Tentative Score</strong></td>
                                            <td class="text-primary"><strong>${totalPoints}</strong></td>
                                        </tr>

                                        <tr style="display: none;">
                                            <td colspan="9" style="text-align: right;" class="text-primary"><strong>Total Question Points</strong></td>
                                            <td class="text-primary"><strong>${totalQuestionPoints}</strong></td>
                                        </tr>
                                    `;

                                    // Insert content into modal
                                    $('#modalTableBody').html(modalContent);

                                    // Show the modal
                                    $('#resultModal').modal('show');
                                } else {
                                    alert('No questions found for the given Exam PKID.');
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                            },
                        });
                    } else {
                        console.error('No revision number found.');
                    }
                }
            });
        });

        // 11/28/2024
        // $('#submit_result_form').submit(function (e) {
        //     e.preventDefault();

        //     // Collect exam details
        //     let examDetails = [];
        //     $('#tbl_result tbody tr').each(function () {
        //         let row = $(this);
        //         let question_number = row.find('td:eq(0)').text().trim();
        //         let question_type = row.find('td:eq(1)').text().trim();
        //         // Add more fields as needed
        //         let question_desc = row.find('td:eq(3)').text().trim();
        //         let question_points = parseFloat(row.find('td:eq(6)').text().trim()) || 0;

        //         // Only push non-empty rows
        //         if (question_number && question_type && question_desc) {
        //             examDetails.push({
        //                 question_number: question_number,
        //                 question_type: question_type,
        //                 question_image: row.find('td:eq(2) img').attr('src') || '',
        //                 question_desc: question_desc,
        //                 question: row.find('td:eq(4)').text().trim(),
        //                 question_choices: row.find('td:eq(5)').text().trim(),
        //                 question_points: question_points,
        //                 correct_answer: row.find('td:eq(7)').text().trim(),
        //                 user_answer: row.find('td:eq(8)').text().trim(),
        //                 points_earned: parseFloat(row.find('td:eq(9)').text().trim()) || 0,
        //             });
        //         }
        //     });

        //     // Prepare form data
        //     let formData = {
        //         action: 'submit_exam_result',
        //         result__score: $('#text_result_score').val(),
        //         result__total: $('#text_result_total').val(),
        //         result__exam_no: $('#text_result_exam_no').val(),
        //         result__revNo: $('#textrevNo').val(),
        //         result__exam_name: $('#result_exam_name').val(),
        //         result__exam_purpose: $('#text_exam_result_purpose').val(),
        //         result__exam_department: $('#text_result_exam_department').val(),
        //         result__exam_prLine: $('#text_result_exam_prLine').val(),
        //         result__exam_passing_score: $('#text_result_exam_passing_score').val(),
        //         result__exam_position: $('#text_exam_result_position').val(),
        //         result__empNo: $('#text_result_empNo').val(),
        //         result__name: $('#text_result_name').val(),
        //         result__date_hired: $('#text_result_date_hired').val(),
        //         result__position: $('#text_result_position').val(),
        //         result__exam_date: $('#text_result_exam_date').val(),
        //         result__exam_take: $('#text_result_exam_take').val(),
        //         // total_score: $('#text_result_score').text().trim(),
        //         // total_points: $('#text_result_total').text().trim(),
        //         exam__details: JSON.stringify(examDetails), // Send as JSON string
        //     };

        //     console.log(formData);

        //     // AJAX request
        //     $.ajax({
        //         url: handler,
        //         method: 'POST',
        //         data: formData,
        //         dataType: 'json',
        //         success: function (response) {
        //             if (response === "success") {
        //                 alert("New Record Added!");
        //                 $('#resultModal').modal('hide');
        //                 window.location.href = 'index.php?page=choose_exam.php';
        //             } else {
        //                 alert("An error occurred while inserting the record.");
        //             }
        //         },
        //         error: function (xhr, status, error) {
        //             console.error('AJAX Error:', status, error);
        //             alert("An error occurred. Please try again.");
        //         },
        //     });
        // });

        $('#submit_result_form').submit(function (e) {
            e.preventDefault();

            // Collect exam details
            let examDetails = [];
            $('#tbl_result tbody tr').each(function () {
                let row = $(this);
                let question_number = row.find('td:eq(0)').text().trim();
                let question_type = row.find('td:eq(1)').text().trim();
                // Add more fields as needed
                let question_desc = row.find('td:eq(3)').text().trim();
                let question_points = parseFloat(row.find('td:eq(6)').text().trim()) || 0;

                // Only push non-empty rows
                if (question_number && question_type && question_desc) {
                    examDetails.push({
                        question_number: question_number,
                        question_type: question_type,
                        question_image: row.find('td:eq(2) img').attr('src') || '',
                        question_desc: question_desc,
                        question: row.find('td:eq(4)').text().trim(),
                        question_choices: row.find('td:eq(5)').text().trim(),
                        question_points: question_points,
                        correct_answer: row.find('td:eq(7)').text().trim(),
                        user_answer: row.find('td:eq(8)').text().trim(),
                        points_earned: parseFloat(row.find('td:eq(9)').text().trim()) || 0,
                    });
                }
            });

            // Prepare form data
            let formData = {
                action: 'submit_exam_result',
                result_score: $('#text_result_score').val(),
                result_total: $('#text_result_total').val(),
                result_exam_no: $('#text_result_exam_no').val(),
                result_revNo: $('#textrevNo').val(),
                result_exam_name: $('#result_exam_name').val(),
                result_exam_cat: $('#text_result_exam_cat').val(),
                result_exam_department: $('#text_result_exam_department').val(),
                result_exam_productLine: $('#text_result_exam_prLine').val(),
                result_exam_purpose: $('#text_exam_result_purpose').val(),
                result_exam_passing_score: $('#text_result_exam_passing_score').val(),
                result_exam_position: $('#text_exam_result_position').val(),
                result_empNo: $('#text_result_empNo').val(),
                result_name: $('#text_result_name').val(),
                result_date_hired: $('#text_result_date_hired').val(),
                result_position: $('#text_result_position').val(),
                result_exam_date: $('#text_result_exam_date').val(),
                result_exam_take: $('#text_result_exam_take').val(),
                // total_score: $('#text_result_score').text().trim(),
                // total_points: $('#text_result_total').text().trim(),
                exam_details: JSON.stringify(examDetails), // Send as JSON string
            };

            // AJAX request
            $.ajax({
                url: handler,
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.trim() === "success") {
                        // alert("New Record Added!");
                        $('#resultModal').modal('hide');
                        window.location.href = 'index.php?page=choose_exam.php';
                    } else {
                        alert("An error occurred while inserting the record.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    alert("An error occurred. Please try again.");
                },
            });
        });
    });
</script>   