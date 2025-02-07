<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section id="modify_questions" class="content">
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
                                <li class="breadcrumb-item"><a href="index.php?page=exams_list.php">Exam List</a></li>
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
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <h6 class="text-secondary" id="exam_label"></h6>
                                            <div class="d-flex ms-auto gap-2">
                                                <!-- <button class="btn btn-warning" id="modify_exam_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: black"></i>MODIFY EXAM
                                                </button> -->
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_question">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>ADD NEW
                                                </button>
                                                <!-- <button class="d-none btn btn-success" id="save_changes">
                                                    <i class="fa-solid fa-check me-2" style="color: white"></i>SAVE CHANGES
                                                </button> -->
                                            </div>
                                        </div>

                                        <div class="table-responsive mt-3 mb-3">
                                            <table id="tbl_questions" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Action</th>
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

        <!-- Modal Add New Question -->
        <div class="modal fade" id="create_question" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Question Details</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="create_question_form" enctype="multipart/form-data">

                            <input type="hidden" name="question_pkid" id="text_question_pkid" value="<?php echo htmlspecialchars($_SESSION['question_pkid']); ?>">
                            <input type="hidden" name="question_number" id="text_question_number" value="">
                            
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Type of Question</span>
                                <select class="form-select" type="text" name="questionType" id="text_questionType" required>
                                    <option value="0" selected disabled>Select One</option>
                                    <option value="CHOICES">Single / Multiple Answers</option>
                                    <option value="TEXT">Identification / Essay</option>
                                    <option value="GRID">Multiple Grid</option>
                                </select>
                            </div>
                            
                            <div class="form-floating mb-4 d-none" id="description_box">
                                <textarea class="form-control" placeholder="Description" name="question_description" id="text_question_description" style="height: 100px"></textarea>
                                <label for="text_question_description">Description</label>
                            </div>

                            <div class="form-floating mb-4 d-none" id="question_box">
                                <textarea class="form-control" placeholder="Question" name="question" id="text_question" style="height: 100px"></textarea>
                                <label for="text_question">Question</label>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Point(s)</span>
                                <input class="form-control" type="number" name="question_points" id="text_question_points" value="0" min="0" max="100">
                            </div>

                            <div class="mb-4 d-flex justify-content-center">
                                <img id="scoreImage" src="uploads/no_image.png" class="img-fluid mb-2" style="width: 100px; height: 100px;">
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Image</span>
                                    <input class="form-control" type="file" accept="image/*" name="question_image_input" id="text_question_image_input">
                                    <button id="deleteButton" class="btn btn-danger" type="button">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <hr>
                            
                            <div class="d-none" id="single_multiple">
                                <label>Single Answer/Multiple Answers</label>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <label style="font-weight: 300;">
                                        Choices <span style="font-style: italic; font-weight: 300;">(Check the correct answer)</span>
                                    </label>
                                </div>

                                <div class="input-group mb-3">
                                    <input name="sm_choice_input" id="sm_text_choice_input" type="text" class="form-control" placeholder="Add option">
                                    <button type="button" class="btn btn-sm btn-success" id="add_choices_btn">
                                        <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                    </button>
                                </div>

                                <div class="mb-3" id="sm_choices_container"></div>
                            </div>

                            <div class="d-none" id="text_answer">
                                <label>Word/Essay</label>
                                <div class="input-group mb-4">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Answer Type</span>
                                    <select class="form-select" id="answerType">
                                        <option value="0" selected disabled>Select One</option>
                                        <option value="short">Identification</option>
                                        <option value="paragraph">Essay</option>
                                    </select>
                                </div>

                                <div id="answerContainer">
                                    
                                </div>
                            </div>

                            <div class="d-none" id="grid_choices">
                                <div class="mb-3">
                                    <label>Multiple Choice Grid</label>
                                    
                                    <div class="input-group mb-3">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Question</span>
                                        <input type="text" id="newQuestion" class="form-control" placeholder="Enter question">
                                        <button class="btn btn-success" id="addQuestionBtn"><i class="fa fa-plus fa-md" style="color: white"></i></button>
                                    </div>
                                    
                                    <!-- Add options dynamically -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue"> Option </span>
                                        <input type="text" id="grid_newOption" class="form-control" placeholder="Enter option">
                                        <button class="btn btn-success" id="addOptionBtn"><i class="fa fa-plus fa-md" style="color: white"></i></button>
                                    </div>
                                    
                                    <!-- Multiple Choice Grid Table -->
                                    <table class="table table-bordered" id="multipleChoiceGrid">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Question</th>
                                            </tr>
                                        </thead>
                                        <tbody id="gridQuestions">
                                            <!-- Questions will be added dynamically here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="addNew"><i class="fa-solid fa-file-import me-2" style="color: white"></i>SUBMIT</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Modify Question -->
        <div class="modal fade" id="modify_questions_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Update Question</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="modify_question_form" autocomplete="off" enctype="multipart/form-data">

                            <input type="hidden" name="question_pkid" id="text_modify_question_pkid" value="<?php echo htmlspecialchars($_SESSION['question_pkid']); ?>">
                            <input type="hidden" name="exam_number" id="text_modify_exam_number">
                            <input type="hidden" name="question_number" id="text_modify_question_number">
                            
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Select Type of Question</span>
                                <select class="form-select" type="text" name="modify_questionType" id="text_modify_questionType" required>
                                    <option value="0" selected disabled>Select One</option>
                                    <option value="CHOICES">Single Answer/Multiple Answers</option>
                                    <option value="TEXT">Word/Essay</option>
                                    <option value="GRID">Multiple Grid</option>
                                </select>
                            </div>
                            
                            <div class="form-floating mb-4 d-none" id="modify_description_box">
                                <textarea class="form-control" placeholder="Description" name="modify_question_description" id="text_modify_question_description" style="height: 100px"></textarea>
                                <label for="text_question_description">Description</label>
                            </div>

                            <div class="form-floating mb-4 d-none" id="modify_question_box">
                                <textarea class="form-control" placeholder="Question" name="modify_question" id="text_modify_question" style="height: 100px"></textarea>
                                <label for="text_modify_question">Question</label>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Point(s)</span>
                                <input class="form-control" type="number" name="modify_question_points" id="text_modify_question_points" value="0" min="0" max="100">
                            </div>

                            <div class="mb-4 d-flex flex-column align-items-center justify-content-center">
                                <img id="modify_scoreImage" class="img-fluid mb-2" style="width: 100px; height: 100px;">
                                
                                <div class="d-flex align-items-center mt-2">
                                    <input type="hidden" name="current_question_image_input" id="text_current_question_image_input">
                                    <span id="modify_current_image" style="margin-right: 10px;"></span>
                                    <button class="btn btn-sm" id="remove_image_button">
                                        <i class="fa fa-trash" style="color: red"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Image</span>
                                    <input class="form-control" type="file" accept="image/*" name="modify_question_image_input" id="text_modify_question_image_input">
                                    <button id="modify_deleteButton" class="btn btn-danger" type="button">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <hr>
                            
                            <div class="d-none" id="modify_single_multiple">
                                <label>Single Answer/Multiple Answers</label>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <label style="font-weight: 300;">
                                        Choices <span style="font-style: italic; font-weight: 300;">(Check the correct answer)</span>
                                    </label>
                                </div>

                                <div class="input-group mb-3">
                                    <!-- <div class="input-group-text" style="width: 50px; justify-content: center;">
                                        <input class="form-check-input mt-0" id="modify_add_choices" style="margin: 0 auto" type="checkbox" value="" style="position: relative;">
                                    </div> -->
                                    <input name="modify_sm_choice_input" id="modify_sm_text_choice_input" type="text" class="form-control" placeholder="Add option">
                                    <button type="button" class="btn btn-sm btn-success" id="modify_add_choices_btn">
                                        <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                    </button>
                                </div>

                                <div class="mb-3" id="modify_sm_choices_container"></div>
                            </div>

                            <div class="d-none" id="modify_text_answer">
                                <label>Word/Essay</label>
                                <div class="input-group mb-4">
                                    <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Answer Type</span>
                                    <select class="form-select" id="modify_answerType">
                                        <option value="0" selected disabled>Select One</option>
                                        <option value="modify_short">Identification</option>
                                        <option value="modify_paragraph">Essay</option>
                                    </select>
                                </div>

                                <div id="modify_answerContainer">

                                </div>
                            </div>

                            <div class="d-none" id="modify_grid_choices">
                                <div class="mb-3">
                                    <label>Multiple Choice Grid</label>
                                    
                                    <div class="input-group mb-3">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Question</span>
                                        <input type="text" id="modify_newQuestion" class="form-control" placeholder="Enter question">
                                        <button class="btn btn-success" id="modify_addQuestionBtn"><i class="fa fa-plus fa-md" style="color: white"></i></button>
                                    </div>
                                    
                                    <!-- Add options dynamically -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue"> Option </span>
                                        <input type="text" id="modify_grid_newOption" class="form-control" placeholder="Enter option">
                                        <button class="btn btn-success" id="modify_addOptionBtn"><i class="fa fa-plus fa-md" style="color: white"></i></button>
                                    </div>
                                    
                                    <!-- Multiple Choice Grid Table -->
                                    <table class="table table-bordered" id="modify_multipleChoiceGrid">
                                        <thead class="text-center">
                                            <tr>
                                                <!-- <th>Question</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="modify_gridQuestions">
                                            <!-- Questions will be added dynamically here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="modify_question"><i class="fa-solid fa-file-import me-2" style="color: white"></i>UPDATE</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">
    $(document).ready(function() {

        if (window.location.href.indexOf('modify_questions.php') > -1) {
            $('#exams_menu').addClass('active');
            $('#theo_exam_menu').addClass('active');
            $('#theo_exam_menu').css({
                'background': '#494E53',
                'outline': 'none'
            });
            
            $('#questions_tab').removeClass('d-none');
            $('#headerTitle').text('Exam List');
            $('#url_title').text('Theoretical Examination');
        }

        let handler = "./handler/handler.php";

        // 12/17/2024
        let tbl_question = $('#tbl_questions').DataTable({
            "aaSorting": [],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "./server_side_scripts/modify_questions.php",
            // "stateSave": true, // 1/10/2025
            "drawCallback": function (settings) {
                $('#tbl_questions').attr('style', 'width:100%;');
            },
            // Set the default number of entries to "All"
            "pageLength": -1,
            // Configure the length menu to include "All"
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
        });

        let exam_number = $('#text_question_pkid').val();

        // To display Purpose and Position from tbl_questionnaire
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
                        if(response[0].exam_rev_no !== "Rev.No.0.00") {
                            $('#exam_label').text(response[0].exam_title + ' Exam Questions' + ' for ' + response[0].exam_position + ' (' + response[0].exam_rev_no + ')');
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

        // *********************************** ADD NEW QUESTION*********************

        // generating a question number
        function generateQuestionNumber(counter) {
            let questionNumber = counter;

            $('#text_question_number').val(questionNumber);
        }

        // FETCH LAST QUESTION NUMBER FROM THE DATABASE
        function fetchLastQNumber() {
            // Get the value of the question_pkid from the hidden input field
            let question_pkid = $('#text_question_pkid').val();

            $.ajax({
                url: handler,
                method: 'POST',
                data: {
                    action: 'get_last_qNo',
                    pkid: question_pkid
                },
                success: function(response) {
                    let lastCounter = parseInt(response);
                    let nextCounter = lastCounter + 1;

                    // console.log("Next counter: " + nextCounter);

                    generateQuestionNumber(nextCounter);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching question number:", error);
                }
            });
        }

        fetchLastQNumber();

        // Function to show/hide divs based on the selected question type
        $('#text_questionType').on('change', function() {
            let selectedValue = $(this).val();
            
            // Hide all divs by default
            $('#single_multiple').addClass('d-none');
            $('#text_answer').addClass('d-none');
            $('#grid_choices').addClass('d-none');
            $('#description_box').addClass('d-none');
            $('#question_box').addClass('d-none');

            $('#scoreImage').attr('src', 'uploads/no_image.png');
            $('#text_question_image_input').val('');

            // Clear dynamically added options when switching question types
            $('#sm_choices_container').empty();
            $('#answerType').val(0);
            $('#answerContainer').empty();
            $('#gridQuestions').empty();
            $('#gridQuestions tbody').empty();
            $('#multipleChoiceGrid thead tr').html('<th>Question</th>');
            options = [];
            
            // Show the relevant div based on the selected option
            if (selectedValue === 'CHOICES') {
                $('#single_multiple').removeClass('d-none');
                $('#question_box').removeClass('d-none');
            } else if (selectedValue === 'TEXT') {
                $('#text_answer').removeClass('d-none');
                $('#question_box').removeClass('d-none');
            } else if (selectedValue === 'GRID') {
                $('#grid_choices').removeClass('d-none');
                $('#description_box').removeClass('d-none');
            }
        });

        // function for adding image on image space
        $('#text_question_image_input').on('change', function(event) {
            let file = event.target.files[0];
            let imgElement = $('#scoreImage');

            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    imgElement.attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                imgElement.attr('src', 'uploads/no_image.png');
            }
        });

        // Handle delete button click for image input
        $(document).on('click', '#deleteButton', function() {
            let imgElement = $('#scoreImage');
            let fileInput = $('#text_question_image_input');

            imgElement.attr('src', 'uploads/no_image.png');
            fileInput.val('');
        });

        // function to add choices to the choices container
        $(document).on('click', '#add_choices_btn', function() {
            let sm_optionText = $('#sm_text_choice_input').val();
            
            if (sm_optionText.trim() !== '') {
                let choice_newOption = `
                    <div class="input-group mb-1">
                        <div class="input-group-text" style="width: 50px; justify-content: center;">
                            <input class="form-check-input mt-0" style="margin: 0 auto" type="checkbox" name="is_correct">
                        </div>
                        <input type="text" class="form-control" name="choices[]" value="${sm_optionText}" readonly>
                        <button class="btn btn-danger" id="sm_choices_deleteBtn" type="button"><i class="fa fa-trash"></i></button>
                    </div>
                `;
                
                $('#sm_choices_container').append(choice_newOption);
                $('#sm_text_choice_input').val('');
            } else {
                alert("Please add option first.");
            }
        });

        // function to delete added choice(s) from the choices container
        $(document).on('click', '#sm_choices_deleteBtn', function() {
            $(this).closest('.input-group').remove();
        });

        // function for text type of question
        $('#answerType').on('change', function() {
            let answerType = $(this).val();
            let inputField = '';

            if (answerType === 'short') {

                inputField = `<div class="input-group mb-4">
                                <input class="form-control" type="text" name="short_right_answer" id="t_short_right_answer" placeholder="Enter right answer">
                            </div>`;
            } 

                $('#answerContainer').html(inputField);
        });

        // EDITED (12/11/2024) WORKING NA PIII
        // Function for multiple grid type of question
        let options = [];

        // Add new option (header)
        $(document).on('click', '#addOptionBtn', function(e) {
            e.preventDefault();
            let g_optionText = $('#grid_newOption').val().trim();

            if (g_optionText !== '') {
                options.push(g_optionText);

                // Append new header
                const index = options.length - 1; // Get the index of the new option
                $('#multipleChoiceGrid thead tr').append(`
                    <th>
                        <button class="btn btn-danger btn-sm g_remove_option"><i class="fa fa-trash" style="color: white"></i></button>
                        <br> ${g_optionText}
                    </th>
                `);

                // Append new radio buttons in each question row
                $('#gridQuestions tr').each(function() {
                    $(this).append(`<td><input type="radio" name="q${$(this).attr('data-question')}" value="${g_optionText}"></td>`);
                });

                $('#grid_newOption').val('');
            } else {
                alert('Please enter an option first.');
            }
        });

        // Remove option from the header
        $('#multipleChoiceGrid').on('click', '.g_remove_option', function(e) {
            e.preventDefault();

            // Get the index of the header being removed
            const headerIndex = $(this).parent().index();

            // Remove the header
            $(this).parent().remove();

            // Remove the corresponding radio buttons in each row
            $('#gridQuestions tr').each(function() {
                $(this).find('td').eq(headerIndex).remove();
            });

            // Remove the option from the options array
            options.splice(headerIndex - 1, 1); // Adjusted to match the index in `options`
        });

        // Add new question (tbody)
        $(document).on('click', '#addQuestionBtn', function(e) {
            e.preventDefault();
            let questionText = $('#newQuestion').val().trim();

            if (questionText !== '') {
                // Create a new row with the existing options
                let newRow = `<tr data-question="${questionText.replace(/\s+/g, '_')}"><td><button class="btn btn-danger btn-sm me-2" id="g_remove_question"><i class="fa fa-trash" style="color: white"></i></button>${questionText}</td>`;

                // Append radio buttons only for current options
                options.forEach((option) => {
                    newRow += `<td><input type="radio" name="q${questionText.replace(/\s+/g, '_')}" value="${option}"></td>`;
                });

                newRow += `</tr>`;
                $('#gridQuestions').append(newRow);

                $('#newQuestion').val('');
            } else {
                alert('Please enter a question first.');
            }
        });

        // Remove question row
        $('#gridQuestions').on('click', '#g_remove_question', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });

        // CLEARS FORM WHEN MODAL IS CLOSED
        $('#create_question').on('hidden.bs.modal', function () {
            var questionForm = $('#create_question_form');

            $('#single_multiple').addClass('d-none');
            $('#text_answer').addClass('d-none');
            $('#grid_choices').addClass('d-none');

            questionForm[0].reset();

            $('#scoreImage').attr('src', 'uploads/no_image.png');

        });

        // 12/20/2024 (WORKING NA LAHAT NG VALIDATION)
        // ADDING OF QUESTIONS
        // Original code
        $('#create_question_form').submit(function (e) {
            e.preventDefault();

            // Collect basic question data with validation
            let question_number = $('#text_question_number').val();
            let question_pkid = $('#text_question_pkid').val();
            let question_type = $('#text_questionType').val()?.trim();
            let question_image_input = $('#text_question_image_input')[0]?.files[0];
            let question_points = $('#text_question_points').val()?.trim();
            let question_description = $('#text_question_description').val()?.trim();

            if (!question_type || question_type === '0') {
                alert('Please select a question type.');
                return;
            }

            if (!question_points || isNaN(question_points) || parseFloat(question_points) <= 0) {
                alert('Please add question points.');
                return;
            }

            // Collect choices and correct answer
            let question = [];
            let question_choices = [];
            let question_answer = [];

            if (question_type === 'CHOICES') {
                question_description = 'N/A';
                question = $('#text_question').val()?.trim();

                if (!question) {
                    alert('Please enter the question.');
                    return;
                }

                $('#sm_choices_container input[type="text"]').each(function () {
                    let choice = $(this).val()?.trim();
                    if (choice) {
                        question_choices.push(choice);
                    }
                });

                if (question_choices.length === 0) {
                    alert('Please add at least one choice.');
                    return;
                }

                // Collect checked checkbox values for correct answers
                $('#sm_choices_container input[type="checkbox"]:checked').each(function () {
                    let correct_answer = $(this).closest('.input-group').find('input[type="text"]').val()?.trim();
                    if (correct_answer) {
                        question_answer.push(correct_answer);
                    }
                });

                if (question_answer.length === 0) {
                    alert('Please select at least one correct answer.');
                    return;
                }
            } else if (question_type === 'TEXT') {
                question_description = 'N/A';
                question = $('#text_question').val()?.trim();
                if (!question) {
                    alert('Please enter the question text.');
                    return;
                }

                if ($('#answerType').val() === null) {
                    alert('Please select the answer type.');
                    return;
                } else {
                    if ($('#answerType').val() === 'short') {
                        question_choices = 'N/A';
                        question_answer = $('#t_short_right_answer').val().trim();

                        if (!question_answer) {
                            alert('Please enter the correct answer.');
                            return;
                        }
                    } else {
                        question_choices = 'N/A';
                        question_answer = 'N/A';
                    }
                }
            } 

            else if (question_type === 'GRID') {
                if (!question_description) {
                    alert('Please enter the question description.');
                    return;
                }

                let isValid = true;

                // Collect all questions added in the grid
                $('#gridQuestions tr').each(function () {
                    let rowDescription = $(this).find('td').first().text()?.trim();
                    if (rowDescription) {
                        question.push(rowDescription);
                    }

                    // Check if a radio button is selected for the current row
                    let selectedAnswer = $(this).find('input[type="radio"]:checked').val();
                    if (selectedAnswer) {
                        question_answer.push(selectedAnswer);
                    } else {
                        // If no radio button is selected for this row, mark as invalid
                        isValid = false;
                    }
                });

                if (question.length === 0) {
                    alert('Please add at least one question to the grid.');
                    return;
                }

                // Collect all options (columns) added in the grid
                $('#multipleChoiceGrid thead tr th').each(function (index) {
                    if (index > 0) {
                        let option = $(this).text()?.trim();
                        if (option) {
                            question_choices.push(option);
                        }
                    }
                });

                if (question_choices.length === 0) {
                    alert('Please add at least one option/choice in the grid.');
                    return;
                }

                if (!isValid) {
                    alert('Please select a correct answer for each question in the grid.');
                    return;
                }
            }

            let formData = new FormData(this);
            

            // Append basic question data
            formData.append('action', 'add_question');
            formData.append('question_number', question_number);
            formData.append('question_pkid', question_pkid);
            formData.append('questionType', question_type);
            formData.append('question_description', question_description);

            if (question_image_input) {
                formData.append('question_image_input', question_image_input);
            }

            formData.append('question', JSON.stringify(question));
            formData.append('question_points', question_points);

            // Append choices and correct answer
            formData.append('question_choices', JSON.stringify(question_choices));
            formData.append('question_answer', JSON.stringify(question_answer));

            $.ajax({
                url: handler,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    if (response.result === 'Success') {

                        $('#create_question_form')[0].reset();

                        $('#description_box').addClass('d-none');
                        $('#question_box').addClass('d-none');
                        $('#scoreImage').attr('src', 'uploads/no_image.png');
                        $('#sm_choices_container').empty();

                        tbl_question.draw();

                        $('#create_question').modal('hide');
                        fetchLastQNumber();

                        alert('Question created successfully!');

                        // $('#save_changes').removeClass('d-none');
                    } else {
                        alert('Error: ' + response.result);
                    }
                },
            });
        });

        // 1/2/2025
        // $('#create_question_form').on('submit', function (e) {
        //     e.preventDefault();

        //     let formData = new FormData(this); // Automatically collects all form inputs, including files.

        //     // Append additional fields to formData
        //     formData.append('action', 'add_question');

        //     $.ajax({
        //         url: handler,
        //         type: 'POST',
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         dataType: 'json',
        //         success: function (response) {
        //             if (response.result === 'Success') {
        //                 alert('Question created successfully!');
        //                 $('#create_question_form')[0].reset();
        //             } else {
        //                 alert('Error: ' + response.error || response.result);
        //             }
        //         },
        //         error: function (xhr, status, error) {
        //             alert('An error occurred. Please try again.');
        //             console.log(xhr.responseText);
        //         }
        //     });
        // });

        // *********************************** MODIFY QUESTION*********************

        // Function to show/hide divs based on the selected question type
        $('#text_modify_questionType').on('change', function() {
            let selectedValue = $(this).val();
            
            // Hide all divs by default
            $('#modify_single_multiple').addClass('d-none');
            $('#modify_text_answer').addClass('d-none');
            $('#modify_grid_choices').addClass('d-none');
            $('#modify_description_box').addClass('d-none');
            $('#modify_question_box').addClass('d-none');

            $('#text_modify_question_description').val('');
            $('#text_modify_question').val('');
            $('#text_modify_question_points').val(0);

            $('#modify_scoreImage').attr('src', 'uploads/no_image.png');
            $('#text_modify_question_image_input').val('');

            // Clear dynamically added options when switching question types
            $('#modify_sm_choices_container').empty();
            $('#modify_answerType').val(0);
            $('#modify_answerContainer').empty();
            $('#modify_gridQuestions').empty();
            $('#modify_gridQuestions tbody').empty();
            $('#modify_multipleChoiceGrid thead tr').html('<th>Question</th>');
            options = [];
            
            // Show the relevant div based on the selected option
            if (selectedValue === 'CHOICES') {
                $('#modify_single_multiple').removeClass('d-none');
                $('#modify_question_box').removeClass('d-none');
            } else if (selectedValue === 'TEXT') {
                $('#modify_text_answer').removeClass('d-none');
                $('#modify_question_box').removeClass('d-none');
            } else if (selectedValue === 'GRID') {
                $('#modify_grid_choices').removeClass('d-none');
                $('#modify_description_box').removeClass('d-none');
            }
        });

        // function for text type of question
        $('#modify_answerType').on('change', function() {
            let modify_answerType = $(this).val();
            let modify_inputField = '';

            if (modify_answerType === 'modify_short') {
                // $('#short_answer').removeClass('d-none');

                modify_inputField = `<div class="input-group mb-4">
                                <input class="form-control" type="text" name="modify_short_right_answer" id="modify_t_short_right_answer" placeholder="Enter right answer">
                            </div>`;
            }

                $('#modify_answerContainer').html(modify_inputField);
                // $('#answerContainer').append(inputField);
        });

         // Modifying of Questions
        $('#modify_question_form').submit(function (e) { 
            e.preventDefault();

            // Collect basic question data
            let question_pkid = $('#text_modify_question_pkid').val(); // pkid of question in tbl_questions
            let question_exam_number = $('#text_modify_exam_number').val(); // pkid of exam in tbl_exams
            let question_number = $('#text_modify_question_number').val(); // question number
            let question_type = $('#text_modify_questionType').val().trim();
            let current_image_input = $('#text_current_question_image_input').val().trim();
            let question_image_input = $('#text_modify_question_image_input')[0]?.files[0];
            let question_description = $('#text_modify_question_description').val().trim();
            let question_points = $('#text_modify_question_points').val().trim();

            if (!question_type || question_type === '0') {
                alert('Please select a question type.');
                return;
            }

            if (!question_points || isNaN(question_points) || parseFloat(question_points) <= 0) {
                alert('Please add question points.');
                return;
            }

            // Collect choices and correct answer
            let question = [];
            let question_choices = [];
            let question_answer = [];

            if (question_type === 'CHOICES') {
                question_description = 'N/A'
                question = $('#text_modify_question').val().trim();

                if (!question) {
                    alert('Please enter the question text.');
                    return;
                }

                $('#modify_sm_choices_container input[type="text"]').each(function() {
                    question_choices.push($(this).val());
                });

                // Collect checked checkbox values for the correct answers
                $('#modify_sm_choices_container input[type="checkbox"]:checked').each(function() {
                    question_answer.push($(this).closest('.input-group').find('input[type="text"]').val()); // Assuming the corresponding text input holds the answer
                });

                if (question_answer.length === 0) {
                    alert('Please select the correct answer.');
                    return;
                }

            } else if (question_type === 'TEXT') {
                question_description = 'N/A'
                question = $('#text_modify_question').val().trim();

                if (!question) {
                    alert('Please enter the question text.');
                    return;
                }

                if ($('#modify_answerType').val() === null) {
                    alert('Please select the answer type.');
                    return;
                } else {
                    if ($('#modify_answerType').val() === 'modify_short') {
                        question_choices = 'N/A';
                        question_answer = $('#modify_t_short_right_answer').val();

                        if (question_answer === '') {
                            alert('Please enter the correct answer.');
                            return;
                        }
                    } else {
                        question_description = 'N/A'
                        question = $('#text_modify_question').val().trim();

                        if (!question) {
                            alert('Please enter the question text.');
                            return;
                        }

                        question_choices = 'N/A';
                        question_answer = 'N/A';
                    }
                }
            }  else if (question_type === 'GRID') {
                let isValid = true; // Start assuming everything is valid

                if (!question_description) {
                    alert('Please enter the question description.');
                    return;
                }

                // Collect all questions added in the grid
                $('#modify_gridQuestions tr').each(function () {
                    // Get the question description for each row
                    let rowDescription = $(this).find('td').first().text().trim();
                    question.push(rowDescription);

                    // Get the selected radio button's value for the question
                    let selectedAnswer = $(this).find('input[type="radio"]:checked').val();

                    if (selectedAnswer) {
                        question_answer.push(selectedAnswer); // Collect the selected answer
                    } else {
                        // If no radio button is selected for this row, mark as invalid
                        isValid = false;
                    }
                });

                if (question.length === 0) {
                    alert('Please add at least one question to the grid.');
                    return;
                }

                // Collect all options (columns) added in the grid
                $('#modify_multipleChoiceGrid thead tr th').each(function (index) {
                    if (index > 0) { // Skip the first column (question column)
                        let option = $(this).text()?.trim();
                        if (option) {
                            question_choices.push(option);
                        }
                    }
                });

                if (question_choices.length === 0) {
                    alert('Please add at least one option/choice in the grid.');
                    return;
                }

                // Check if all questions have valid answers
                if (!isValid) {
                    alert('Please select a correct answer for each question in the grid.');
                    return;
                }
            }

            let formData = new FormData(this);

            // Check for new image input
            if (question_image_input) {
                formData.append('modify_question_image_input', question_image_input);
            } else {
                formData.append('current_question_image_input', current_image_input); // Use current image if no new image is added
            }

            // Append basic question data
            formData.append('action', 'modify_questions');
            formData.append('modify_question_pkid', question_pkid);
            formData.append('modify_exam_number', question_exam_number);
            formData.append('modify_question_number', question_number);
            formData.append('modify_questionType', question_type);
            // formData.append('modify_question_image_input', question_image_input);
            formData.append('modify_question_description', question_description);
            formData.append('modify_question', JSON.stringify(question)); // Store as JSON
            formData.append('modify_question_points', question_points);

            // Append choices and correct answer
            formData.append('modify_question_choices', JSON.stringify(question_choices));
            formData.append('modify_question_answer', JSON.stringify(question_answer)); // Send as JSON

            $.ajax({
                url: handler,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                        // Clear the form on success
                        $('#modify_question_form')[0].reset();

                        $('#modify_description_box').removeClass('d-none');

                        tbl_question.draw();

                        $('#modify_questions_form').modal('hide');
                        alert('Question updated successfully!');
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    alert('An error occurred. Please try again.');
                    console.log(xhr.responseText);
                }
            });
        });

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

        // Remove Image for MODIFY MODAL
        $(document).on('click', '#remove_image_button', function(e) {
            e.preventDefault();
            $('#modify_scoreImage').attr('src', 'uploads/no_image.png');
            $('#modify_current_image').text('No image uploaded');
            $('#text_current_question_image_input').val('uploads/no_image.png');
            $('#remove_image_button').hide();
        });

        // Add Image for MODIFY MODAL
        $('#text_modify_question_image_input').on('change', function() {
            // Get the file input element and the selected file
            const fileInput = $(this)[0];
            const file = fileInput.files[0];
            
            if (file) {
                // Display the selected file name in #modify_current_image
                $('#modify_current_image').text(file.name);
                $('#modify_current_image').hide();
                $('#remove_image_button').hide();

                // Create a URL for the selected image and set it as the src for #modify_scoreImage
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#modify_scoreImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                // If no file is selected, reset the image and text
                $('#modify_scoreImage').attr('src', 'uploads/no_image.png');
                $('#modify_current_image').text('No image uploaded');
                $('#remove_image_button').hide();
            }
        });

        // Viewing of Questions
        $(document).on('click', '.btn_questions_view', function () {

            let edit_pkid = $(this).data('pkid');
            let edit_question_number = $(this).data('question_number');
            let edit_exam_number = $(this).data('exam_number');
            let edit_question_type = $(this).data('question_type');
            let edit_question_image_path = $(this).data('question_image_path');
            let edit_question_desc = $(this).data('question_desc');
            let edit_question = $(this).data('question');
            let edit_question_choices = $(this).data('question_choices');
            let edit_question_answer = $(this).data('question_answer');
            let edit_question_points = $(this).data('question_points');

            console.log(edit_question_image_path);
            
            // console.log(edit_pkid);
            // console.log(edit_question_image_path);
            // console.log(edit_question_type);

            // Set the values in the modal or form
            $('#text_modify_question_pkid').val(edit_pkid);
            $('#text_modify_exam_number').val(edit_exam_number);
            $('#text_modify_question_number').val(edit_question_number);
            $('#text_modify_questionType').val(edit_question_type);
            $('#text_modify_question_points').val(edit_question_points);

            if(edit_question_image_path !== 'uploads/no_image.png') {
                $('#modify_current_image').show();
                $('#modify_current_image').text(edit_question_image_path);
                $('#text_current_question_image_input').val(edit_question_image_path);
                $('#modify_scoreImage').attr('src', edit_question_image_path);
                $('#remove_image_button').show();

                $(document).on('click', '#modify_deleteButton', function(e) {
                    e.preventDefault();

                    let imgElement = $('#modify_scoreImage');
                    let fileInput = $('#text_modify_question_image_input');

                    imgElement.attr('src', edit_question_image_path);
                    $('#modify_current_image').show();
                    $('#modify_current_image').text(edit_question_image_path);
                    $('#remove_image_button').show();
                    fileInput.val('');
                });
            } else {
                $('#modify_scoreImage').attr('src', 'uploads/no_image.png');
                $('#text_current_question_image_input').val(edit_question_image_path);
                $('#modify_current_image').text('No image uploaded');
                $('#remove_image_button').hide();

                $(document).on('click', '#modify_deleteButton', function(e) {
                    e.preventDefault();

                    let imgElement = $('#modify_scoreImage');
                    let fileInput = $('#text_modify_question_image_input');

                    imgElement.attr('src', edit_question_image_path);
                    fileInput.val('');
                });

            }

            if (edit_question_type === 'CHOICES') {
                $('#modify_description_box').addClass('d-none');
                $('#modify_question_box').removeClass('d-none');

                $('#text_modify_question_description').val(edit_question_desc);
                $('#text_modify_question').val(edit_question);

                $('#modify_single_multiple').removeClass('d-none');

                // Function to add choice(s) for single/multiple answers question type
                $(document).on('click', '#modify_add_choices_btn', function() {
                    let modify_sm_optionText = $('#modify_sm_text_choice_input').val();

                    if (modify_sm_optionText.trim() !== '') {
                        let modify_choiceNewOption = `
                            <div class="input-group mb-1">
                                <div class="input-group-text" style="width: 50px; justify-content: center;">
                                    <input class="form-check-input mt-0 choice-checkbox" type="checkbox" name="is_correct">
                                </div>
                                <input type="text" class="form-control" name="choices[]" value="${modify_sm_optionText}" readonly>
                                <button class="btn btn-danger modify_sm_choices_deleteBtn" type="button"><i class="fa fa-trash"></i></button>
                            </div>
                        `;

                        $('#modify_sm_choices_container').append(modify_choiceNewOption);
                        $('#modify_sm_text_choice_input').val('');
                    } else {
                        alert("Please add option first.");
                    }
                });

                // Function to delete added choice(s) from the choices container
                $(document).on('click', '.modify_sm_choices_deleteBtn', function() {
                    $(this).closest('.input-group').remove();
                });

                // Load choices and answers from database and check correct answers
                let choicesArray = edit_question_choices.split(', <br>');
                let correctAnswersArray = edit_question_answer.split(', <br>');

                choicesArray.forEach(function(choice) {
                    let isChecked = correctAnswersArray.includes(choice.trim()) ? 'checked' : '';

                    let choiceContainer = `
                        <div class="input-group mb-1">
                            <div class="input-group-text" style="width: 50px; justify-content: center;">
                                <input class="form-check-input mt-0 choice-checkbox" type="checkbox" name="is_correct" ${isChecked}>
                            </div>
                            <input type="text" class="form-control" name="choices[]" value="${choice}" readonly>
                            <button class="btn btn-danger modify_sm_choices_deleteBtn" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                    `;

                    $('#modify_sm_choices_container').append(choiceContainer);
                });
            }

            else if(edit_question_type == 'TEXT') {
                $('#modify_description_box').addClass('d-none');
                $('#modify_question_box').removeClass('d-none');

                $('#text_modify_question_description').val(edit_question_desc);
                $('#text_modify_question').val(edit_question);

                $('#modify_text_answer').removeClass('d-none');

                let wordCount = edit_question_answer.trim().split(/,\s*<br>\s*/).length;
                if (wordCount === 1) {
                    $('#modify_answerType').val("modify_short");
                    
                    inputField = `<div class="input-group mb-4">
                        <input class="form-control" type="text" name="modify_short_right_answer" id="modify_t_short_right_answer" value="${edit_question_answer}">
                    </div>`;

                    $('#modify_answerContainer').append(inputField);
                } else {
                    $('#modify_answerType').val("modify_paragraph");

                    inputField = `<div class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" name="modify_keyword_input" id="modify_t_keyword_input" placeholder="Enter keyword to search">
                            <button type="button" class="btn btn-success" id="modify_addKeywordBtn">
                                <i class="fa fa-plus" style="color: white"></i> Add
                            </button>
                        </div>

                        <div class="mt-3" id="modify_keywordList" ></div>
                    </div>`;

                    $('#modify_answerContainer').append(inputField);

                    // Display each keyword in #modify_keywordList
                    let keywordsArray = edit_question_answer.split(/,\s*<br>\s*/);
                    keywordsArray.forEach(function(keyword) {
                        let keywordTag = `<div class="input-group mb-1">
                                    <input type="text" class="form-control" value="${keyword.trim()}" readonly>
                                    <button class="btn btn-danger" id="t_keyword_deleteBtn" type="button"><i class="fa fa-trash"></i></button>
                                </div>`;
                        $('#modify_keywordList').append(keywordTag);
                    });
                }
            }

            else {
                $('#modify_description_box').removeClass('d-none');
                $('#modify_question_box').addClass('d-none');
                $('#text_modify_question_description').val(edit_question_desc);
                $('#modify_grid_choices').removeClass('d-none');

                let rowArray = edit_question.split(/,\s*<br>\s*/);
                let columnArray = edit_question_choices.split(/,\s*<br>\s*/);
                let radioAnswerArray = edit_question_answer.split(/,\s*<br>\s*/);

                // Initialize array to store added options, including pre-existing options
                let modify_options = [...columnArray];

                // Populate headers with remove buttons for each option in columnArray
                let headerRow = `<th>Question</th>`;
                columnArray.forEach((column, index) => {
                    headerRow += `
                        <th data-option="${column}">
                            <button class="btn btn-danger btn-sm modify-g-remove-option" data-index="${index}">
                                <i class="fa fa-trash" style="color: white"></i>
                            </button> <br> ${column}
                        </th>`;
                });
                $('#modify_multipleChoiceGrid thead tr').html(headerRow);

                // Populate rows with radio buttons in each column
                rowArray.forEach((row, rowIndex) => {
                    let rowHTML = `<tr data-question="q${rowIndex + 1}">
                        <td>
                            <button class="btn btn-danger btn-sm modify-g-remove-question">
                                <i class="fa fa-trash" style="color: white"></i>
                            </button> ${row}
                        </td>`;

                    columnArray.forEach((column, colIndex) => {
                        let isChecked = radioAnswerArray[rowIndex] === column ? 'checked="checked"' : '';
                        rowHTML += `<td data-option="${column}"><input type="radio" name="q${rowIndex + 1}" value="${column}" ${isChecked}></td>`;
                    });

                    rowHTML += `</tr>`;
                    $('#modify_gridQuestions').append(rowHTML);
                });

                // Add new option (header)
                $(document).on('click', '#modify_addOptionBtn', function(e) {
                    e.preventDefault();
                    let g_optionText = $('#modify_grid_newOption').val().trim();

                    if (g_optionText !== '') {
                        modify_options.push(g_optionText);

                        // Append a new header cell with a remove button
                        $('#modify_multipleChoiceGrid thead tr').append(`
                            <th data-option="${g_optionText}">
                                <button class="btn btn-danger btn-sm modify-g-remove-option"><i class="fa fa-trash" style="color: white"></i></button> <br> ${g_optionText}
                            </th>
                        `);

                        // Append a new radio button cell for each existing question row
                        $('#modify_gridQuestions tr').each(function() {
                            let questionName = $(this).data('question');
                            $(this).append(`<td data-option="${g_optionText}"><input type="radio" name="${questionName}" value="${g_optionText}"></td>`);
                        });

                        $('#modify_grid_newOption').val('');
                    } else {
                        alert('Please enter an option first.');
                    }
                });

                // Remove option from the header and all rows
                $('#modify_multipleChoiceGrid').on('click', '.modify-g-remove-option', function(e) {
                    e.preventDefault();

                    let optionText = $(this).parent().data('option');

                    // Update the modify_options array by removing the selected option
                    modify_options = modify_options.filter(option => option !== optionText);

                    // Remove the header cell for the selected option
                    $(this).parent().remove();

                    // Remove the corresponding cell with the same option in each question row
                    $('#modify_gridQuestions tr').each(function() {
                        $(this).find(`td[data-option="${optionText}"]`).remove();
                    });
                });

                // Add new question (tbody)
                $(document).on('click', '#modify_addQuestionBtn', function(e) {
                    e.preventDefault();
                    let questionText = $('#modify_newQuestion').val().trim();

                    if (questionText !== '') {
                        let questionId = `q${$('#modify_gridQuestions tr').length + 1}`;

                        let newRow = `<tr data-question="${questionId}">
                            <td>
                                <button class="btn btn-danger btn-sm modify-g-remove-question"><i class="fa fa-trash" style="color: white"></i></button> ${questionText}
                            </td>`;

                        modify_options.forEach((option) => {
                            newRow += `<td data-option="${option}"><input type="radio" name="${questionId}" value="${option}"></td>`;
                        });

                        newRow += `</tr>`;
                        $('#modify_gridQuestions').append(newRow);

                        $('#modify_newQuestion').val('');
                    } else {
                        alert('Please enter a question first.');
                    }
                });

                // Remove question row
                $('#modify_gridQuestions').on('click', '.modify-g-remove-question', function(e) {
                    e.preventDefault();
                    $(this).closest('tr').remove();
                });
            }
        });

        // Deleting of Questions
        $(document).on('click', '.btn_questions_delete', function () {
            let delete_question = $(this).data('id');

            if (confirm("Are you sure you want to delete this Question?")) {

                $.ajax({
                    type: "POST",
                    url: handler,
                    data: {
                        "action": "delete_question",
                        "pkid": delete_question
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.result) {
                            fetchLastQNumber();
                            tbl_question.draw();
                            // $('#save_changes').removeClass('d-none');
                        } else {
                            alert("Error deleting the Question.");
                        }
                    },
                    error: function () {
                        alert("An error occurred while deleting the Question.");
                    }
                });
            }
        });


    });

</script>