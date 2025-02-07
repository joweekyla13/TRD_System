<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">

        <section id="revisions_tab" class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <?php

                        session_start();

                        if (isset($_GET['pkid'])) {
                            $_SESSION['question_pkid'] = $_GET['pkid'];
                            $_SESSION['getTitle'] = $_GET['title'];
                            // $_SESSION['getPurpose'] = $_GET['purpose'];
                            // $_SESSION['getPosition'] = $_GET['position'];
                        } else {
                            $_SESSION['question_pkid'] = '';
                            $_SESSION['getTitle'] = '';
                            $_SESSION['getPurpose'] = '';
                            $_SESSION['getPosition'] = '';
                        }
                        ?>
                        <input type="hidden" name="" id="" value="<?php echo htmlspecialchars($_SESSION['getTitle']); ?>">
                        <input type="hidden" name="question_pkid" id="text_question_pkid" value="<?php echo htmlspecialchars($_SESSION['question_pkid']); ?>">
                    </div>
                    
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
                                            <!-- <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#create_exam">
                                                <i class="fa fa-plus fa-md me-2" style="color: white"></i>New Exam
                                            </button> -->
                                        </div>
                                        <div class="table-responsive mt-3 mb-3">
                                            <table id="tbl_revisions" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <!-- <th>Category</th> -->
                                                        <th>Action</th>
                                                        <th>Category</th>
                                                        <th>Revision No.</th>
                                                        <th>Revised at</th>
                                                        <th>Exam Title</th>
                                                        <!-- <th>Purpose</th> -->
                                                        <!-- <th>Position</th> -->
                                                        <th>Passing Score</th>
                                                        <th>Remarks</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <!-- Data rows will go here -->
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
        </section>

        <section id="r_questions_tab" class="content d-none">
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
                                <li class="breadcrumb-item" id="revision_list_btn">Revisions List</li>
                                <li class="breadcrumb-item active" aria-current="page">Questions</li>
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
                                        <div class="table-responsive mt-3 mb-3">
                                            <table id="tbl_r_questions" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Type</th>
                                                        <!-- <th>Action</th> -->
                                                        <th>No.</th>
                                                        <th>Image</th>
                                                        <th>Description</th>
                                                        <th>Question</th>
                                                        <th>Choices</th>
                                                        <th>Answer(s)</th>
                                                        <th>Point(s)</th>
                                                        <!-- <th>Status</th> -->
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
        </section>

    </div>
</div>

<!-- Modal Viewing and Editing Exam -->
<!-- <div class="modal fade" id="modify_exam_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-info">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">View Exam</h1>
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="modify_exam_form" autocomplete="off">

                    <input type="hidden" name="pkid" id="text_pkid">

                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Purpose</span>
                        <input class="form-select" type="text" id="text_modify_purpose" name="modify_purpose" list="purpose" placeholder="Select Purpose" multiple readonly>
                            <datalist id="purpose">
                            </datalist>
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Position</span>
                        <input class="form-select" type="text" id="text_modify_position" name="modify_position" list="position" placeholder="Select Position" multiple readonly>
                            <datalist id="position">
                            </datalist>
                    </div>

                    <div class="mb-1">
                        <label style="color: DodgerBlue">Remarks: </label>
                    </div>

                    <div class="mb-4">
                        <textarea class="form-control" placeholder="Enter remarks here..." title="Enter up to 350 characters only" maxlength="350" name="modify_exam_remarks" id="text_modify_exam_remarks" style="height: 100px" readonly></textarea>

                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Passing Score</span>
                        <input class="form-control" type="number" name="modify_passing_score" id="text_modify_passing_score" value="0" min="0" max="100" readonly>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="modify_exam_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-info">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">View Exam Details</h1>
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="modify_exam_form" autocomplete="off">

                    <input type="hidden" name="pkid" id="text_pkid">

                    <!-- 1/27/2025 -->
                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 12%">Category</span>
                        <!-- <select class="form-control" type="text" id="text_modify_category" name="modify_category" readonly>
                            <option value="3" disabled selected>Select Category</option>
                            <option value="0">Newly Hired</option>
                            <option value="1">Re-Certification</option>
                        </select> -->
                        <input class="form-control" type="text" id="text_modify_category" name="modify_category" placeholder="Enter Title" readonly>
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 12%">Title</span>
                        <input class="form-control" type="text" id="text_modify_title" name="modify_title" placeholder="Enter Title" readonly>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%">Purpose</span>
                                <input class="form-control" type="text" id="text_modify_purpose" name="modify_purpose" list="purpose" placeholder="Select Purpose" readonly>
                                    <datalist id="purpose">
                                        <!-- options go here -->
                                    </datalist>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 30%">Department</span>
                                <input class="form-control" type="text" id="text_modify_department" name="modify_department" list="department" placeholder="Select Department" readonly>
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
                                <input class="form-control" type="text" id="text_modify_position" name="modify_position" list="position" placeholder="Select Position" readonly>
                                    <datalist id="position">
                                        <!-- options go here -->
                                    </datalist>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- 1/13/2025 -->
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 30%">Product Line</span>
                                <input class="form-control" type="text" id="text_modify_prLine" name="modify_prLine" placeholder="Enter Product Line" readonly>
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
                        <textarea class="form-control" placeholder="Enter exam instructions" title="Enter up to 350 characters only" maxlength="350" name="modify_exam_remarks" id="text_modify_exam_remarks" style="height: 100px" readonly></textarea>

                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 15%">Passing Score</span>
                        <input class="form-control" type="number" name="modify_passing_score" id="text_modify_passing_score" value="0" min="0" max="100" readonly>
                    </div>

                    <div class="modal-footer">
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
    if (window.location.href.indexOf('revisions_list.php') > -1) {
        if (this.href === window.location.href) {
            // $(this).addClass('active');
            $('#exams_menu').addClass('active');
            $('#theo_exam_menu').addClass('active');
            $('#theo_exam_menu').css({
                'background': '#494E53',
                'outline': 'none'
            });
            $('#revisions_tab').removeClass('d-none');
            $('#headerTitle').text('Revisions List');
            $('#url_title').text('Theoretical Examination');
        }
    }

    let handler = "./handler/handler.php";

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

        // Viewing of Exam
        $(document).on('click', '.btn_exam_view', function () {

        let edit_pkid = $(this).data('pkid');
        // let edit_category = $(this).data('category');
        let edit_category = '';

        if ($(this).data('category') == 0) {
            edit_category = "Newly Hired";
        } else {
            edit_category = "Re-Certification";
        }

        let edit_title = $(this).data('title');
        let edit_purpose = $(this).data('purpose');
        let edit_department = $(this).data('department');
        let edit_position = $(this).data('position');
        // let edit_prod_line = $(this).data('prodLine');
        let edit_prLine = $(this).data('product_line');
        let edit_remarks = $(this).data('remarks');
        let edit_passing_score = $(this).data('passing_score');

        console.log(edit_prLine);

        // Set the values in the modal or form
        $('#text_pkid').val(edit_pkid);
        $('#text_modify_title').val(edit_title);
        $('#text_modify_category').val(edit_category);
        $('#text_modify_prLine').val(edit_prLine);
        $('#text_modify_department').val(edit_department);
        $('#text_modify_purpose').val(edit_purpose);
        $('#text_modify_position').val(edit_position);
        $('#text_modify_exam_remarks').val(edit_remarks);
        $('#text_modify_passing_score').val(edit_passing_score);

        });

    // // datatables
    // let tbl_r_question = $('#tbl_r_questions').DataTable({
    //     "aaSorting"	 : [],
    //     "bProcessing": true,
    //     "bServerSide": true,
    //     "sAjaxSource": "./server_side_scripts/revisions_questions.php",
    //     "drawCallback": function( settings ) {
    //         $('#tbl_r_questions').attr('style','width:100%;');
    //     }
    // })

    // Viewing of Revisions
    $(document).on('click', '.btn_r_questions_list', function () {
        let edit_pkid = $(this).data('pkid');
        let edit_title = $(this).data('title');
        console.log(edit_title);
        let edit_purpose = $(this).data('purpose');
        let edit_position = $(this).data('position');
        // alert(edit_pkid);

        // window.location = "index.php?page=revisions_questions.php&pkid=" + edit_pkid + "&purpose=" + edit_purpose + "&position=" + edit_position;
        window.location = 'index.php?page=revisions_questions.php&pkid=' + edit_pkid + '&title=' + edit_title;

    });

    // $(document).on('click', '#revision_list_btn', function (e) {
    //     e.preventDefault();
    //     $('#revisions_tab').addClass('d-none');
    //     $('#r_questions_tab').removeClass('d-none');
    // });

     // Viewing Questions List
    //  $(document).on('click', '.btn_r_questions_list', function () {
    //     let edit_pkid = $(this).data('pkid');
    //     console.log(edit_pkid);

    //     // Show the Questions tab and hide the Revisions tab
    //     $('#revisions_tab').addClass('d-none');
    //     $('#r_questions_tab').removeClass('d-none');
    // });

    // // Viewing Revisions List
    // $(document).on('click', '#revision_list_btn', function (e) {
    //     e.preventDefault();

    //     // Show the Revisions tab and hide the Questions tab
    //     $('#r_questions_tab').addClass('d-none');
    //     $('#revisions_tab').removeClass('d-none');
    // });
});

</script> 