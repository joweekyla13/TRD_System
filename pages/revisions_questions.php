<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section id="r_questions_tab" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <?php

                        session_start();

                        if (isset($_GET['pkid'])) {
                            $_SESSION['question_pkid'] = $_GET['pkid'];
                            $_SESSION['getTitle'] = $_GET['title'];
                            $_SESSION['getPurpose'] = $_GET['purpose'];
                            $_SESSION['getPosition'] = $_GET['position'];
                        } else {
                            $_SESSION['question_pkid'] = '';
                            $_SESSION['getTitle'] = '';
                            $_SESSION['getPurpose'] = '';
                            $_SESSION['getPosition'] = '';
                        }
                        ?>
                        <input type="hidden" name="getTitle" id="text_getTitle" value="<?php echo htmlspecialchars($_SESSION['getTitle']); ?>">
                        <input type="hidden" name="question_pkid" id="text_question_pkid" value="<?php echo htmlspecialchars($_SESSION['question_pkid']); ?>">
                        <input type="hidden" name="getPurpose" id="text_getPurpose" value="<?php echo htmlspecialchars($_SESSION['getPurpose']); ?>">
                        <input type="hidden" name="getPosition" id="text_getPosition" value="<?php echo htmlspecialchars($_SESSION['getPosition']); ?>">
                    </div>

                    <div class="col-md-10 d-flex justify-content-end mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white p-2 m-2">
                                <li class="breadcrumb-item text-primary" id="bckRevisions">Revisions List</li>
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
                                        <!-- <div class="d-flex justify-content-between align-items-center mt-2">
                                            <h6 class="text-secondary" id="exam_label"></h6>
                                            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#create_question"><i class="fa fa-plus fa-md me-2" style="color: white"></i>ADD NEW</button>
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create_question"><i class="fa fa-plus fa-md me-2" style="color: white"></i>SAVE CHANGES</button>
                                        </div> -->

                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <h6 class="text-secondary" id="exam_label"></h6>
                                            <div class="d-flex ms-auto gap-2">
                                                <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_question">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>ADD NEW
                                                </button> -->
                                                <button class="d-none btn btn-success" id="save_changes">
                                                    <i class="fa-solid fa-check me-2" style="color: white"></i>SAVE CHANGES
                                                </button>
                                            </div>
                                        </div>

                                        <div class="table-responsive mt-3 mb-3">
                                            <table id="tbl_questions" class="table table-bordered table-hover nowrap" style="width: 100%;">
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
        </section>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        if (window.location.href.indexOf('revisions_questions.php') > -1) {
            $('#exams_menu').addClass('active');
            $('#theo_exam_menu').addClass('active');
            $('#theo_exam_menu').css({
                'background': '#494E53',
                'outline': 'none'
            });
            
            $('#r_questions_tab').removeClass('d-none');
            $('#headerTitle').text('Revisions List');
            $('#url_title').text('Theoretical Examination');
        }

        let handler = "./handler/handler.php";

        // datatables
        let tbl_question = $('#tbl_questions').DataTable({
            "aaSorting"	 : [],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "./server_side_scripts/revisions_questions.php",
            "drawCallback": function( settings ) {
                $('#tbl_questions').attr('style','width:100%;');
            },
            // Set the default number of entries to "All"
            "pageLength": -1,
            // Configure the length menu to include "All"
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
        })

        $(document).on('click', '#bckRevisions', function () {
            let get_pkid = $('#text_question_pkid').val();
            let get_title = $('#text_getTitle').val();
            console.log(get_title);
            let get_purpose = $('#text_getPurpose').val();
            let get_position = $('#text_getPosition').val();
            // window.location = 'index.php?page=revisions_list.php&pkid=' + get_pkid + '&purpose=' + get_purpose + '&position=' + get_position;
            window.location = 'index.php?page=revisions_list.php&pkid=' + get_pkid + '&title=' + get_title;
        });

        let exam_number = $('#text_question_pkid').val();
        // console.log(exam_number);

        if (exam_number) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    action: "display_exam_details",
                    text_exam_pkid: exam_number
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    
                     // Check if the response contains data
                    if (response && response.length > 0) {
                        if(response[0].exam_revision_no !== "Rev.No.0.00") {
                            $('#exam_label').text(response[0].exam_title + ' Exam Questions' + ' for ' + response[0].exam_position + ' (' + response[0].exam_revision_no + ')');
                        } else {
                            $('#exam_label').text(response[0].exam_title + ' Exam Questions' + ' for ' + response[0].exam_position);
                        }
                    } else {
                        $('#exam_label').text("No purpose and position found");
                    }
                    
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        }

    });

</script> 