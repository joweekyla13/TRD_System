<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
$username = $_SESSION['username'];
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

        <section id="training_endorsement_section" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="card"> -->
                            <div class="card-body">

                                 <div class="tab-content" id="myTabContent">
                                    <!-- Request Tab Content -->
                                    <div class="tab-pane fade show active" id="requestTab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <!-- <div class="text-right mt-4">
                                                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#request_memo"><i class="fa fa-plus fa-md"></i> New Memo</button>
                                                        </div> -->

                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <h3 class="fw-bold text-secondary">Training Endorsement List</h3>
                                                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreateTREndo" id="btnAddNewTrainEndo"><i class="fa fa-plus fa-md"></i> Add New</button>
                                                        </div>

                                                        <div class="table-responsive">
                                                            <table id="tbl_training_endorsement" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Doc #</th>
                                                                        <th>HR Memo</th>
                                                                        <th>CTRL #</th>
                                                                        <th>Date Filed</th>
                                                                        <th>Action</th>
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
                                    </div>

                                 </div>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Add -->
        <div class="modal fade" id="modalCreateTREndo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Endorsement Memorandum Form</h1>
                            
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <p class="fw-bold">Endorsement Memorandum Details</p>
                        </div>

                        <form id="formSubmitTrainEndo" autocomplete="off" enctype="multipart/form-data">

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 33%">Document Number</span>
                                        <input class="form-control" type="text" name="docno" id="text_docno" placeholder="Document Number" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="selectedOptions" class="fs-5 mb-1"></div>
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 33%">To</span>
                                        <input class="form-control" type="text" id="text_to" name="endo_to" list="to" placeholder="Send to" multiple>
                                            <datalist id="to">
                                            </datalist>
                                                                            
                                        <input type="hidden" name="selectedValues" id="selectedValues">

                                        <input class="form-control" type="hidden" id="text_to_email" name="to_email" readonly>

                                        <!-- Edited 1-20-25 -->
                                        <!-- <input type="hidden" name="staticEmails" id="staticEmails"  value="paulgabrielle28@gmail.com, paulbariring28@gmail.com, "> -->
                                        <!-- <input type="hidden" name="staticEmails" id="staticEmails"  value="cnpoblete@pricon.ph, ldatok@pricon.ph, jmporcare@pricon.ph, eldugos@pricon.ph, havasquez@pricon.ph, rdmorallos@pricon.ph, evalfelor@pricon.ph, jgsulit@pricon.ph, "> -->
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Training Req CTRL #</span>
                                        <input class="form-control" type="text" name="tr_ctrl" id="text_tr_ctrl" list="list_tr_ctrl" placeholder="Control Number">
                                        <datalist id="list_tr_ctrl">
                                        </datalist>
                                    </div>   
                                </div>
                                
                                <div class="col-md-6">
                                    <div id="selectedAttnOptions" class="fs-5 mb-1"></div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Attn</span>
                                        <input class="form-control" type="text" name="attn" id="text_attn" list="list_attn" placeholder="Attention">
                                            <datalist id="list_attn">
                                            </datalist>

                                        <input type="hidden" name="selectedAttnValues" id="selectedAttnValues">
                                        <input type="hidden" name="selectedAttnEmailValues" id="selectedAttnEmailValues">


                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">HR Memo #</span>
                                        <input class="form-control" type="text" id="text_hr_memo" name="hr_memo" list="list_hr_memo" placeholder="Document Number">
                                        <datalist id="list_hr_memo">
                                            <!-- options go here -->
                                        </datalist>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Subject</span>
                                        <input class="form-control" type="text" name="subject" id="text_subject" placeholder="Enter subject">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Date Filed</span>
                                        <input class="form-control" type="date" name="date_now" id="text_date_now" readonly>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Section</span>
                                        <select class="form-select" type="text" name="section" id="textSection" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Production">Production</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="PPC">PPC</option>
                                            <option value="LQC">LQC</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div> 
                            <hr>

                            <!-- <div class="d-flex justify-content-end mb-3">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="fa-solid fa-user-plus me-2" style="color: white"></i>ADD TRAINEE</button>
                            </div> -->

                            <div class="mb-3">
                                <p class="fw-bold">Trainee Details</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="tbl_training_endorsement_details" >
                                    <thead class="table-primary">
                                        <tr>
                                        <th>Action</th>
                                        <th>Date Hired</th>
                                        <th>E.N.</th>
                                        <th>Full Name</th>
                                        <th>Position/Dept./Section</th>
                                        <th>Title</th>
                                        <th>Score</th>
                                        <th>Rating</th>
                                        <th>Passing Score</th>
                                        <th>Remarks</th>
                                        <th>Exam Date</th>
                                        <!-- <th>Immediate Superior</th> -->

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <!-- Add more rows as needed -->
                                    </tbody>

                                </table>
                            </div> 

                            <!-- 1/15/2025 -->
                            <div class="mt-4 mb-3">
                                <p class="fw-bold">Upload Hands-On Exam Results here:</p>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <input class="form-control" type="file" accept="image/*" name="image[]" id="text_question_image_input" multiple>
                                </div>
                            </div>

                            <div class="mb-3" id="exams_results"></div>
                            <!-- end -->

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Prepared By</span>

                                        <input type="text" class="form-control" id="text_preparedby" name="preparedby" readonly>
                                        <input type="hidden" class="form-control" id="text_preparedby_username" name="preparedby_username" value="<?php echo $username; ?>" readonly>
                                        <input type="hidden" class="form-control" id="text_preparedby_email" name="preparedby_email" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Edited 2-3-25 -->
                                    <div id="selectedNotedByOptions" class="fs-5 mb-1"></div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Checked By</span>
                                        <input type="text" class="form-control" id="text_notedby" name="notedby" list="notedby" placeholder="Checked by">
                                        <datalist id="notedby">
                                        
                                        </datalist>
                                        <input type="hidden" name="selectedNotedByValues" id="selectedNotedByValues">
                                        <input type="hidden" name="selectedNotedByOptionsEmail" id="selectedNotedByOptionsEmail">
                                        <!-- <input type="hidden" class="form-control" id="textUsername" name="username"> -->
                                    </div>
                                </div>
                                

                                <!-- Edited 1-21-25 -->
                                <div class="col-md-6">
                                    <div id="selectedApprovedByOptions" class="fs-5 mb-1"></div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Approved By</span>
                                        <input class="form-select" type="text" id="text_approvedby" name="approvedby" list="list_approvedby" placeholder="Approved by">
                                        <datalist id="list_approvedby">
                                            <option value="Joel Padullo">Joel Padullo</option>
                                            <option value="Yoichi Matsuzaki">Yoichi Matsuzaki</option>
                                            <option value="Rita Morallos">Rita Morallos</option>
                                            <option value="Helen Vasquez">Helen Vasquez</option>
                                            <option value="Criselda Poblete">Criselda Poblete</option>
                                            <option value="Joylyn Porcare">Joylyn Porcare</option>
                                            <option value="Lovie Atok">Lovie Atok</option>
                                            <option value="Rosalie Tagara">Rosalie Tagara</option>
                                            <option value="Evangeline Dugos">Evangeline Dugos</option>
                                            <option value="Marvin Allied">Marvin Allied</option>
                                            <option value="Laurius Casim">Laurius Casim</option>
                                        </datalist>
                                        <input type="hidden" name="selectedApprovedByValues" id="selectedApprovedByValues">
                                        <input type="hidden" name="selectedApprovedByOptionsEmail" id="selectedApprovedByOptionsEmail">
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btnSubmitTrainEndo"><i class="fa-solid fa-file-import me-2" style="color: white"></i>SUBMIT</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal View -->
        <div class="modal fade" id="modalViewTREndo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Endorsement Memorandum Form</h1>
                            
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <p class="fw-bold">Endorsement Memorandum Details</p>
                        </div>

                        <!-- <form id="formSubmitTrainEndo" autocomplete="off"> -->

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 33%">Document Number</span>
                                        <p class="form-control" type="text" name="docno" id="view_text_docno" placeholder="Document Number"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 33%">To</span>
                                        <p class="form-control" type="text" id="view_text_to" name="endo_to" list="to" placeholder="Send to"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Training Req CTRL #</span>
                                        <p class="form-control" type="text" name="tr_ctrl" id="view_text_tr_ctrl" list="list_tr_ctrl" placeholder="Control Number"></p>
                                    </div>   
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Attn</span>
                                        <p class="form-control" type="text" name="attn" id="view_text_attn" list="list_attn" placeholder="Attention"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">HR Memo #</span>
                                        <p class="form-control" type="text" id="view_text_hr_memo" name="hr_memo" list="list_hr_memo" placeholder="Document Number"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Subject</span>
                                        <p class="form-control" type="text" name="subject" id="view_text_subject" placeholder="Enter subject"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Date Filed</span>
                                        <p class="form-control" type="date" name="date_now" id="view_text_date_now"></p>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Section</span>
                                        <select class="form-select" type="text" name="section" id="textSection" required>
                                            <option value="0" selected disabled>Select One</option>
                                            <option value="Production">Production</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="PPC">PPC</option>
                                            <option value="LQC">LQC</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div> 
                            <hr>

                            <!-- <div class="d-flex justify-content-end mb-3">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="fa-solid fa-user-plus me-2" style="color: white"></i>ADD TRAINEE</button>
                            </div> -->

                            <div class="mb-3">
                                <p class="fw-bold">Trainee Details</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="view_tbl_training_endorsement_details" >
                                    <thead class="table-primary">
                                        <tr>
                                        <th>Date Hired</th>
                                        <th>E.N.</th>
                                        <th>Full Name</th>
                                        <th>Position/Dept./Section</th>
                                        <th>Title</th>
                                        <!-- <th>Score</th>
                                        <th>Rating</th> -->
                                        <th>Remarks</th>
                                        <!-- <th>Immediate Superior</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <!-- Add more rows as needed -->
                                    </tbody>

                                </table>
                            </div> 

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Prepared By</span>
                                        <p type="text" class="form-control" id="view_text_preparedby" name="preparedby" value="ProjectBased"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Checked By</span>
                                        <p type="text" class="form-control" id="view_text_notedby" name="notedby" list="notedby" placeholder="Noted by" required></p>
                                        <!-- <input type="hidden" class="form-control" id="textUsername" name="username"> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 33%">Approved By</span>
                                        <p type="text" class="form-control" id="view_text_approvedby" name="view_approvedby"></p>
                                        <!-- <input type="hidden" class="form-control" id="textUsername" name="username"> -->
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <form method="POST" action="pdf_training_endorsement.php" id="formGeneratePDF" target="_blank">
                                    <!-- HIDDEN DOCNO -->
                                    <input type="hidden" id="hidden_docno" name="hidden_docno">
                                    <input type="hidden" id="hidden_tr_conno" name="hidden_tr_conno">
                                    <input type="hidden" id="hidden_hr_memo" name="hidden_hr_memo">

                                    <input type="hidden" id="hidden_prepared_by" name="hidden_prepared_by">
                                    <input type="hidden" id="hidden_checked_by" name="hidden_checked_by">

                                    <!-- Edited 1-13-25 -->
                                    <input type="hidden" id="pdf_hidden_preparedby_empno" name="pdf_hidden_preparedby_empno">
                                    <input type="hidden" id="pdf_hidden_checked_empno" name="pdf_hidden_checked_empno">
                                    <input type="hidden" id="pdf_hidden_approvedby_empno" name="pdf_hidden_approvedby_empno">

                                    <!-- Edited 1-22-25 -->
                                    <input type="hidden" id="pdf_hidden_preparedby_position" name="pdf_hidden_preparedby_position">
                                    <input type="hidden" id="pdf_hidden_checked_position" name="pdf_hidden_checked_position">
                                    <input type="hidden" id="pdf_hidden_approvedby_position" name="pdf_hidden_approvedby_position">

                                    <input type="submit" class="btn btn-warning float-start pdf" id="pdf" name="pdf" value="Generate PDF">
                                </form>
                                <!-- <button type="submit" class="btn btn-primary" id="btnSubmitTrainEndo"><i class="fa-solid fa-file-import me-2" style="color: white"></i>SUBMIT</button> -->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        <!-- </form> -->
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

// ************************************************************************************************************************************************************************

    let handler = "./handler/handler.php";

    $('#training_endorsement').each(function() {
            if (this.href === window.location.href) {
                $(this).addClass('active');
                $('#training_endorsement_section').removeClass('d-none');
                $('#headerTitle').text('Training Endorsement');
                $('#url_title').text('Training Endorsement');
            }
            else {
                $(this).removeClass('active');

            }
        });

    let dataTableTrainingEndorsement = $('#tbl_training_endorsement').DataTable({
        "aaSorting"	 : [],
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "./server_side_scripts/training_endorsement.php",
        "drawCallback": function( settings ) {
            $('#tbl_training_endorsement').attr('style','width:100%;');
        }
    });

    let dataTableViewTrainingEndorsement = $('#view_tbl_training_endorsement_details').DataTable();

    // GENERATE CONTROL NUMBER
    function generateControlNumber(counter) {
    let now = new Date();
    let month = (now.getMonth() + 1).toString().padStart(2, '0');
    let day = now.getDate().toString().padStart(2, '0');
    let year = now.getFullYear().toString().slice(-2);

    // Generate control number in YYMM-XXXX format
    let controlNumber = `${year}${month}-${counter.toString().padStart(4, '0')}`;

    // Update the control number field
    $('#text_docno').val('TUE-' + controlNumber);
    }

    // FETCH LAST CONTROL NUMBER FROM THE DATABASE
    function fetchLastConNumber() {
        $.ajax({
            url: handler,
            method: 'POST',
            data: {
                action: 'get_endo_last_conno'
            },
            success: function(response) {
                // Try to parse the response to an integer
                let lastCounter = parseInt(response);

                // Check if the response is a valid number
                if (!isNaN(lastCounter)) {
                    let nextCounter = lastCounter + 1;

                    // Generate and set the next control number
                    generateControlNumber(nextCounter);
                } else {
                    console.error("Invalid response for control number:", response);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching document number:", error);
            }
        });
    }

    function getUserFullName(){
        let preparedByUsername = $('#text_preparedby_username').val();

        let getTRDSUserInfo = {
            "action": "get_trds_user_info",
            "userUsername": preparedByUsername
        };
        $.ajax({
            type: "POST",
            url: handler,
            data: getTRDSUserInfo,
            dataType: "json",
            success: function (response) {
                $('#text_preparedby_email').val(response.email);
                $('#text_preparedby').val(response.EmpName);

            }
        });
    }

    // Edited 1-22-25
    function getApprovedByPosition() {
        let approvedbyName = $('#view_text_approvedby').text();
        let namesArray = approvedbyName.split(" / "); // Split the names by " / "

        // Clear the hidden input field before populating it
        $('#pdf_hidden_approvedby_position').val("");
        $('#pdf_hidden_approvedby_empno').val("");
        

        namesArray.forEach((name) => {
            let getApprovedByPosition = {
                "action": "get_trds_user_email",
                "EmployeeName": name.trim() // Trim to remove extra spaces
            };

            $.ajax({
                type: "POST",
                url: handler,
                data: getApprovedByPosition,
                dataType: "json",
                success: function (response) {
                    let existingValue = $('#pdf_hidden_approvedby_position').val();
                    let existingEmpNoValue = $('#pdf_hidden_approvedby_empno').val();
                    let newEmpNoValue = existingEmpNoValue ? existingEmpNoValue + " / " + response.EmpNo : response.EmpNo;
                    let newValue = existingValue ? existingValue + " / " + response.position : response.position;
                    $('#pdf_hidden_approvedby_position').val(newValue);
                    $('#pdf_hidden_approvedby_empno').val(newEmpNoValue);

                }
            });
        });
    }

    // Edited 2-3-25
    function getNotedByPosition() {
    let notedbyName = $('#view_text_notedby').text().trim();
    let namesArray = notedbyName ? notedbyName.split(" / ") : []; // Ensure namesArray is valid

    // Clear the hidden input fields before making requests
    $('#pdf_hidden_checked_position').val("");
    $('#pdf_hidden_checked_empno').val("");

    // Use Sets to store unique values
    let positionsSet = new Set();
    let empNoSet = new Set();

    namesArray.forEach((name) => {
        let trimmedName = name.trim();
        if (!trimmedName) return; // Skip empty values

        console.log("Processing name:", trimmedName); // Debugging

        let getNotedByPosition = {
            "action": "get_trds_user_email",
            "EmployeeName": trimmedName
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: getNotedByPosition,
            dataType: "json",
            success: function (response) {
                console.log("Response received:", response); // Debugging

                if (response.EmpNo) empNoSet.add(response.EmpNo);
                if (response.position) positionsSet.add(response.position);

                // Update the hidden fields with unique values
                $('#pdf_hidden_checked_position').val(Array.from(positionsSet).join(" / "));
                $('#pdf_hidden_checked_empno').val(Array.from(empNoSet).join(" / "));
            }
        });
    });
}



    function getSendToEmail(){
        $.ajax({
              type: "POST",
              url: handler,
              data: {
                  "action": "get_trds_user_email",
                  "EmployeeName": $('#text_to').val()
              },
              dataType: "json",
              success: function (response) {
                    $('#text_to_email').val(response.email);
              }
        });
    }

    function getDateNow(){
        let today = new Date().toISOString().split('T')[0];
        $('#text_date_now').val(today);
    }


    fetchLastConNumber();
    getUserFullName();
    getDateNow();

    // CLEARS FORM WHEN MODAL IS CLOSED
    // $('#modalCreateTREndo').on('hidden.bs.modal', function () {
    //     $('#formSubmitTrainEndo')[0].reset();
    //     tblEndorsementDetails.clear().draw();
    //     fetchLastConNumber();
    //     getDateNow();
    // });

    // Initialize DataTable with export buttons
    let tblEndorsementDetails = $('#tbl_training_endorsement_details').DataTable({
        columnDefs: [
            {
                targets: 0,  // The index of the "Action" column
                visible: false  // Initial visibility is false (hidden)
            }
        ],
        responsive: true,
    });

    // GETTING "conno" FROM tbl_training_request
    let control_no = {
            "action": "get_control_no",
        }
        control_no = $.param(control_no) + "&" + $('#text_tr_ctrl').serialize();

        $.ajax({
        type: "POST",
        url: handler,
        data: control_no,
        dataType: "json",
        success: function (response) {
            let dataList = $('#list_tr_ctrl');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    $('#text_tr_ctrl').on('change', function () {
        let ctrlno = $(this).val();

        if (ctrlno) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "get_tr_docno",
                    "CTRLNo": ctrlno
                },
                dataType: "json",
                success: function (response) {
                    // Ensure we clear the text field before updating
                    $('#text_hr_memo').val('');

                    if (response.length > 0) {
                        $('#text_hr_memo').val(response[0].fkdocno);
                        $('#text_to').val(response[0].requestor);

                        getSendToEmail();
                        // Manually trigger the change event after setting the value
                        $('#text_hr_memo').trigger('change');
                        // $('#text_to').val('');

                    } else {
                        alert('No fkdocno found for the selected CTRLNo.');
                    }
                },
                error: function () {
                    alert('Error fetching fkdocno.');
                }
            });
        }
    });

    $('#text_hr_memo').on('change', function () {
        let fkdocno = $(this).val();
        let conno = $('#text_tr_ctrl').val();

        if (fkdocno) {  // Use fkdocno instead of ctrlno
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "get_docno_details",
                    "ConNo": conno,
                    "FKDocNo": fkdocno
                },
                dataType: "json",
                success: function (response) {
                    tblEndorsementDetails.clear().draw();

                    if (response.length > 0) {
                        $.each(response, function (index, value) {
                            let addButton = '<center><button class="btn btn-info fa-solid fa-pen-to-square btn_view" style="color:white" data-empno="' + value.fkEmpNo + '"></button></center>';

                            tblEndorsementDetails.row.add([
                                addButton,
                                value.fkdate_hired,
                                value.fkEmpNo,
                                value.fkfullname,
                                value.fkpds,
                                value.exam_name,
                                value.total_score,
                                value.percentage_score,
                                value.passing_score,
                                value.remarks, // Add remarks
                                value.exam_date
                            ]).draw(false);
                        });
                    } else {
                        alert("The trainees associated with this document number have not yet taken their exam.");
                    }
                },
                error: function () {
                    alert('Error fetching document details.');
                }
            });
        }
    });

    // 1/17/2025
    let allFiles = []; // To store all selected files

    $('#text_question_image_input').on('change', function (event) {
        let files = Array.from(event.target.files); // Get selected files as an array
        let examsResults = $('#exams_results'); // Target the div

        // Add new files to the allFiles array, avoiding duplicates
        files.forEach(file => {
            if (!allFiles.some(existingFile => existingFile.name === file.name)) {
                allFiles.push(file);

                // Create a row for each new file with filename and remove button
                let fileRow = `
                    <div class="input-group mb-2" data-filename="${file.name}">
                        <input type="text" class="form-control" value="${file.name}" readonly>
                        <button class="btn btn-danger removeImage" type="button">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                `;

                // Append the row to the results div
                examsResults.append(fileRow);
            }
        });

        // Clear the input field so it can trigger the change event again for new files
        $('#text_question_image_input').val('');
    });

    // Handle removing an uploaded image row
    $(document).on('click', '.removeImage', function () {
        // Get the filename from the closest .input-group element
        let filenameToRemove = $(this).closest('.input-group').data('filename');

        // Remove the file from the allFiles array
        allFiles = allFiles.filter(file => file.name !== filenameToRemove);

        // Remove the row
        $(this).closest('.input-group').remove();
    });

    // Helper function (optional if you need to do something with the combined files)
    function getCombinedFiles() {
        return allFiles;
    }
    // end

    // Edited 1-21-25
    $('#formSubmitTrainEndo').submit(function (e) { 
        e.preventDefault();

        // 1/17/2025
        let formData = new FormData(this);
        let imagesArray = allFiles;

        console.log(imagesArray);

        imagesArray.forEach(function (image, index) {
            formData.append('images[]', image, image.name); // Append each image with the same key 'images[]'
        });
        // end

        let TREData = [];
        // Retrieve field values
        let TE_docno = $('#text_docno').val().trim();
        let TE_to = $('#text_to').val().trim();
        let TE_tr_ctrl = $('#text_tr_ctrl').val().trim();
        let TE_attn = $('#selectedAttnValues').val().trim();
        let TE_hr_memo = $('#text_hr_memo').val().trim();
        let TE_subject = $('#text_subject').val().trim();
        let TE_preparedby = $('#text_preparedby').val().trim();
        let TE_notedby = $('#text_notedby').val().trim();
        let TE_textDateNow = $('#text_date_now').val().trim();
        let TE_approvedby = $('#selectedApprovedByValues').val().trim();


        // Validation check for required fields
        if (!TE_docno || !TE_to || !TE_tr_ctrl || !TE_attn || !TE_hr_memo || !TE_subject || !TE_textDateNow || !TE_preparedby || !TE_notedby || !TE_approvedby) {
            alert('Please fill up all required fields!');
            return false;
        }

        // Check if the table contains any data
        if (!tblEndorsementDetails.data().any()) {
            alert('Trainee table is empty!');
            return false;
        }

        // Check if there are any visible rows (rows not filtered out)
        let visibleRows = tblEndorsementDetails.rows({ filter: 'applied' }).data().length;
        if (visibleRows === 0) {
            alert('Please add at least one visible trainee to the table!');
            return false;
        }

        $.ajax({
            type: "POST",
            url: handler,
            data: {
                "action": "check_training_dates",
                "attendanceFKConno": TE_tr_ctrl
            },
            dataType: "json",
            success: function (response) {
                if (response.fkconno) {
                    $.ajax({
                        type: "POST",
                        url: handler,
                        data: {
                            "action": "check_TE_docno",
                            "endorsementDocno": TE_docno
                        },
                        dataType: "json",
                        success: function (response) {
                            if(response.endorsement_docno){
                                console.log(response.endorsement_docno);
                                alert('Invalid Document Number. Please try submitting again.');
                                fetchLastConNumber();
                                getUserFullName();
                                getDateNow();
                                return;
                            }else{
                                $.ajax({
                                    type: "POST",
                                    url: handler,
                                    data: {
                                        "action": "check_training_endo",
                                        "endorsementDocno": TE_docno,
                                        "endoHRMemo": TE_hr_memo,
                                        "endoTRCtrlno": TE_tr_ctrl
                                    },
                                    dataType: "json",
                                    success: function (response) {
                                        console.log(response);
                                        if (response.endorsement_docno) {
                                            alert("This Training Request is already available in the table.");
                                            return;
                                        } else {
                                            // Collect data from visible table rows
                                            tblEndorsementDetails.rows({ filter: 'applied' }).every(function () {
                                                let TRRowData = this.data();
                                                TREData.push({
                                                    fkdate_hired: TRRowData[1].trim(),
                                                    fkEmpNo: TRRowData[2].trim(),
                                                    fkfullname: TRRowData[3].trim(),
                                                    fkpds: TRRowData[4].trim(),
                                                    exam_title: TRRowData[5].trim(),
                                                    exam_score: TRRowData[6].trim(),
                                                    exam_rating: TRRowData[7].trim(),
                                                    exam_passing_score: TRRowData[8].trim(),
                                                    exam_remarks: TRRowData[9].trim(),
                                                    exam_date: TRRowData[10].trim()

                                                });
                                            });

                                            formData.append("rows", JSON.stringify(TREData));
                                            formData.append("action", "add_training_endorsement");

                                            // Prepare data for AJAX submission
                                            // let submitTrainingEndorsement = {
                                            //     "action": "add_training_endorsement",
                                            //     "rows": TREData
                                            // };
                                            // submitTrainingEndorsement = $.param(submitTrainingEndorsement) + "&" + $('#formSubmitTrainEndo').serialize();

                                            // AJAX request to submit the data
                                            $.ajax({
                                                type: "POST",
                                                url: handler,
                                                // data: submitTrainingEndorsement,
                                                data: formData,
                                                processData: false,
                                                contentType: false,
                                                dataType: "json",
                                                success: function (response) {

                                                    send_email();
                                                    send_multiple_email();
                                                    // Reset form and provide feedback
                                                    // $('#formSubmitTrainEndo')[0].reset();
                                                    $('#selectedValues').val('');
                                                    $('#text_tr_ctrl').val('');
                                                    $('#selectedAttnValues').val('');
                                                    $('#text_hr_memo').val('');
                                                    $('#text_subject').val('');
                                                    $('#text_notedby').val('');
                                                    $('#text_to').val('');
                                                    $('#text_to_email').val('');
                                                    $('#selectedAttnEmailValues').val('');
                                                    $('#selectedAttnOptions').empty();
                                                    $('#selectedOptions').empty();
                                                    $('#modalCreateTREndo').modal('hide');


                                                    $('#text_approvedby').val('');
                                                    $('#selectedApprovedByValues').val('');
                                                    $('#selectedApprovedByOptionsEmail').val('');
                                                    $('#selectedApprovedByOptions').empty();

                                                    // Edited 2-3-25
                                                    $('#text_notedby').val('');
                                                    $('#selectedNotedByValues').val('');
                                                    $('#selectedNotedByOptionsEmail').val('');
                                                    $('#selectedNotedByOptions').empty();

                                                    tblEndorsementDetails.clear().draw();  // Clear table data
                                                    dataTableTrainingEndorsement.draw();

                                                    fetchLastConNumber();
                                                    getDateNow();
                                                    getUserFullName();

                                                    toastr.success('Successfully added!');

                                                },
                                                error: function(xhr, status, error) {
                                                    console.error('Error on submit:', status, error);
                                                }
                                            });
                                        }
                                    }
                                });
                            }
                        }
                    });
                }else{
                    alert("This training request doesn't have any training dates yet.");
                    return;
                }
            }
        });
    });

    $(document).on('click', '.btn_view', function() {

    let view_endorsement_docno = $(this).data('endorsement_docno');
    let view_endo_to = $(this).data('endo_to').replace(/,/g, ' / ');
    let view_endo_attn = $(this).data('endo_attn').replace(/,/g, ' / ');
    let view_endo_subject = $(this).data('endo_subject');
    let view_endo_hr_memo = $(this).data('endo_hr_memo');
    let view_endo_tr_ctrlno = $(this).data('endo_tr_ctrlno');
    let view_endo_date_now = $(this).data('endo_date_now');
    let view_endo_hr_tu = $(this).data('endo_hr_tu');
    let view_endo_tu_requestor = $(this).data('endo_tu_requestor');
    let view_endo_date_hired = $(this).data('endo_date_hired');
    let view_endo_empno = $(this).data('endo_empno');
    let view_endo_fullname = $(this).data('endo_fullname');
    let view_endo_pds = $(this).data('endo_pds');
    let view_endo_title = $(this).data('endo_title');
    let view_endo_remarks = $(this).data('endo_remarks');
    let view_endo_preparedby = $(this).data('endo_preparedby');
    // Edited 2-3-25
    let view_endo_notedby = $(this).data('endo_notedby').replace(/,/g, ' / ');
    let view_endo_approvedby = $(this).data('endo_approvedby').replace(/,/g, ' / ');

        // Set the values in the modal or form
        $('#hidden_docno').val(view_endorsement_docno);
        $('#hidden_tr_conno').val(view_endo_tr_ctrlno);
        $('#hidden_hr_memo').val(view_endo_hr_memo);

        $('#hidden_prepared_by').val(view_endo_preparedby);
        $('#hidden_checked_by').val(view_endo_notedby);


        $('#view_text_docno').text(view_endorsement_docno);
        $('#view_text_to').text(view_endo_to);
        $('#view_text_tr_ctrl').text(view_endo_tr_ctrlno);
        $('#view_text_attn').text(view_endo_attn);
        $('#view_text_hr_memo').text(view_endo_hr_memo);
        $('#view_text_subject').text(view_endo_subject);
        $('#view_text_date_now').text(view_endo_date_now);
        $('#view_text_preparedby').text(view_endo_preparedby);
        $('#view_text_notedby').text(view_endo_notedby);
        $('#view_text_approvedby').text(view_endo_approvedby);

        $.ajax({
            type: "POST",
            url: handler,
            data: {
                action: "view_training_endo",
                docno: view_endorsement_docno
            },
            dataType: "json",
            success: function(response) {
                let tableDetails = $('#view_tbl_training_endorsement_details tbody');
                tableDetails.empty();
                
                $.each(response, function(index, value) {
                    tableDetails.append(`
                        <tr>
                            <td>${value.endo_date_hired}</td>
                            <td>${value.endo_empno}</td>
                            <td>${value.endo_fullname}</td>
                            <td>${value.endo_pds}</td>
                            <td>${value.endo_title}</td>
                            <td>${value.endo_remarks}</td>
                        </tr>
                    `);
                });

                // Edited 1-13-25
                getPreparedByEmpNo();
                getCheckedByEmpNo();

                // Edited 1-22-25
                getApprovedByPosition();

                // Edited 2-3-25
                getNotedByPosition();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
            }
        });
    });

    // CLEARING THE EMPLOYEE DETAILS IF THE EMPLOYEE NUMBER IS EMPTY
    $('#text_tr_ctrl').on('input', function () {

        let check_ctrl = $(this).val();

        if(check_ctrl === ''){
            $('#text_hr_memo').val('');
            $('#text_to').val('');
            $('#text_to_email').val('');

            tblEndorsementDetails.clear().draw();
        }
    });

    $('#text_hr_memo').on('input', function () {

        let check_hr_memo = $(this).val();

        if(check_hr_memo === ''){
            $('#text_to').val('');
            $('#text_to_email').val('');
            tblEndorsementDetails.clear().draw();
        }
    });

    // let selectedOptions = [];

    // // Listen to the change event for option selection
    // $('#text_to').on('change', function () {
    //     const value = $(this).val().trim();

    //     if (value) {
    //         // Validate input against the datalist options
    //         let isValid = false;
    //         $('#to option').each(function () {
    //             if ($(this).val() === value) {
    //                 isValid = true;
    //                 return false; // Exit the loop early
    //             }
    //         });

    //         if (isValid) {
    //             if (selectedOptions.includes(value)) {
    //                 // If it is already in the list, remove it
    //                 removeOption(value);
    //             } else {
    //                 // Add the value to the list
    //                 selectedOptions.push(value);
    //             }
    //         } else {
    //             alert('This name is not in the list of choices. Please select another one.');
    //         }

    //         // Clear the input field
    //         $('#text_to').val('');

    //         // Update the hidden input field with the selected values
    //         $('#selectedValues').val(selectedOptions.join(', '));

    //         // Display the selected options as tags
    //         renderSelectedOptions();
    //     }
    // });

    // // Function to render the selected options as tags
    // function renderSelectedOptions() {
    //     $('#selectedOptions').find('span').remove(); // Clear existing tags, but keep the input

    //     selectedOptions.forEach(function (option) {
    //         // Create a tag for each selected option
    //         const tag = $('<span>').addClass('badge bg-primary me-1').text(option);

    //         // Add a remove button to the tag
    //         const removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function () {
    //             removeOption(option);
    //         });

    //         // Append the remove button to the tag
    //         tag.append(removeBtn);

    //         // Append the tag to the selectedOptions container
    //         $('#selectedOptions').prepend(tag);
    //     });
    // }

    // // Function to remove a selected option
    // function removeOption(option) {
    //     // Remove the option from the array
    //     selectedOptions = selectedOptions.filter(function (item) {
    //         return item !== option;
    //     });

    //     // Update the hidden input field
    //     $('#selectedValues').val(selectedOptions.join(', '));

    //     // Re-render the selected options
    //     renderSelectedOptions();
    // }

    // // Fetching data for "to"
    // let to = {
    //     "action": "get_to",
    // };
    // to = $.param(to) + "&" + $('#text_to').serialize();

    // $.ajax({
    //     type: "POST",
    //     url: handler,
    //     data: to,
    //     dataType: "json",
    //     success: function (response) {
    //         let dataList = $('#to');
    //         dataList.empty();
    //         $.each(response, function (index, value) {
    //             dataList.append('<option value="' + value + '"></option>');
    //         });
    //     },
    //     error: function (xhr, status, error) {
    //         console.error('AJAX Error: ' + status + error);
    //     }
    // });

    // ====================== "Attn" Feature ======================

    let selectedAttnOptions = [];
    let selectedAttnEmails = {};

    // Listen to the change event for option selection
    $('#text_attn').on('change', function () {
        const value = $(this).val().trim();

        if (value) {
            // Validate input against the datalist options
            let isValid = false;
            $('#list_attn option').each(function () {
                if ($(this).val() === value) {
                    isValid = true;
                    return false; // Exit the loop early
                }
            });

            if (isValid) {
                if (selectedAttnOptions.includes(value)) {
                    // If it is already in the list, remove it
                    removeAttnOption(value);
                } else {
                    // Add the value to the list
                    selectedAttnOptions.push(value);

                    // Fetch and add the email for the new value
                    fetchEmailForOption(value);
                }
            } else {
                alert('This name is not in the list of choices. Please select another one.');
            }

            // Clear the input field
            $('#text_attn').val('');

            // // Update the hidden input field with the selected values
            // $('#selectedAttnValues').val(selectedAttnOptions.join(', '));

            // Display the selected options as tags
            // renderSelectedAttnOptions();
        }
    });

    // Function to render the selected options as tags
    function renderSelectedAttnOptions() {
        $('#selectedAttnOptions').find('span').remove(); // Clear existing tags, but keep the input

        selectedAttnOptions.forEach(function (option) {
            // Create a tag for each selected option
            const tag = $('<span>').addClass('badge bg-primary me-1').text(option);

            // Add a remove button to the tag
            const removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function () {
                removeAttnOption(option);
            });

            // Append the remove button to the tag
            tag.append(removeBtn);

            // Append the tag to the selectedAttnOptions container
            $('#selectedAttnOptions').prepend(tag);
        });

        // Update the hidden input field with the selected values
        $('#selectedAttnValues').val(selectedAttnOptions.join(', '));
        $('#selectedAttnEmailValues').val(Object.values(selectedAttnEmails).join(', '));
    }

    // Function to remove a selected option
    function removeAttnOption(option) {
        // Remove the option from the array
        selectedAttnOptions = selectedAttnOptions.filter(function (item) {
            return item !== option;
        });

        // Update the hidden input field
        // $('#selectedAttnValues').val(selectedAttnOptions.join(', '));
        delete selectedAttnEmails[option];

        // Re-render the selected options
        renderSelectedAttnOptions();
    }

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
                    selectedAttnEmails[option] = response.email;
                } else {
                    console.error("No email found in response:", response);
                }

                // Re-render after fetching the email
                renderSelectedAttnOptions();
            },
            error: function (error) {
                console.error("Error fetching email for:", option, error);
            }
        });
    }

    // Fetching data for "attn"
    let attn = {
        "action": "get_to",
    };
    attn = $.param(attn) + "&" + $('#text_attn').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: attn,
        dataType: "json",
        success: function (response) {
            let dataList = $('#list_attn');
            dataList.empty();
            $.each(response, function (index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    // GETTING "Supervisor" FROM db_rapid tbl_employeeinfo
    // $.ajax({
    //     type: "POST",
    //     url: handler,
    //     data: {
    //         "action": "get_notedby"
    //     },
    //     dataType: "json",
    //     success: function (response) {
    //         let dataList = $('#notedby');
    //         dataList.empty();
    //         $.each(response, function(index, value) {
    //             dataList.append('<option value="' + value + '"></option>');
    //         });
    //     },
    //     error: function (xhr, status, error) {
    //         console.error('AJAX Error: ' + status + error);
    //     }
    // });

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


    function send_email(){

        let requestorEmail = $('#text_preparedby_email').val();
        let emailTO = $('#text_to_email').val();
        let emailDocno = $('#text_docno').val();
        let emailSubject = $('#text_subject').val();
        let requestorName = $('#text_preparedby').val();

        $.ajax({
            url: handler,
            type: 'POST',
            data: {
                "action": "send_training_endorsement_email",
                "email_docno": emailDocno,
                "email_subject": emailSubject,
                "send_to": $('#text_to_email').val(),
                "sent_from": requestorEmail,
                "user_fullname": requestorName

            },
            success: function(response) {
                console.log(response);
                $('#result').text(response); // Display response in result paragraph
            },
            error: function() {
                $('#result').text("Request failed. Unable to send email."); // Error handling
            }
        });
    }

    function send_multiple_email() {
        let preparedByEmail = $('#text_preparedby_email').val();
        let multiple_emailTO = $('#selectedAttnEmailValues').val().split(',').map(email => email.trim()); // Split and trim emails
        let multiple_emailSubject = $('#text_subject').val();
        let multiple_emailDocno = $('#text_docno').val();
        let preparedByName = $('#text_preparedby').val();

        // Iterate over each email and send individually
        multiple_emailTO.forEach(function (email) {
            if (email) { // Ensure no empty strings
                $.ajax({
                    url: handler,
                    type: 'POST',
                    data: {
                        "action": "send_training_endorsement_multiple_emails",
                        "email_subject": multiple_emailSubject,
                        "email_docno": multiple_emailDocno,
                        "send_to": email,
                        "sent_from": preparedByEmail,
                        "user_fullname": preparedByName
                    },
                    success: function (response) {
                        console.log(multiple_emailSubject);
                        console.log(`Email sent to ${email}:`, response);
                        $('#result').append(`<div>Email sent to ${email}: ${response}</div>`);
                    },
                    error: function () {
                        $('#result').append(`<div>Failed to send email to ${email}</div>`);
                    }
                });
            }
        });
    }

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

    // CLEAR "" WHEN "" IS EMPTY
    // $('#').on('input', function () {
    //     let check_title = $(this).val();

    //     if(check_title === ''){
    //         $('#').val('');
    //     }
    // });

    // $.ajax({
    //     type: "POST",
    //     url: handler,
    //     data: {
    //         "action": "get_supervisor"
    //     },
    //     dataType: "json",
    //     success: function (response) {
    //         let dataList = $('#notedby');
    //         dataList.empty();
    //         $.each(response, function(index, value) {
    //             dataList.append('<option value="' + value + '"></option>');
    //         });
    //     }
    // });

    // let get_section = {
    //     "action": "get_section",
    // }
    // get_section = $.param(get_section) + "&" + $('#textSection').serialize();

    // $.ajax({
    //     type: "POST",
    //     url: handler,
    //     data: get_section,
    //     dataType: "json",
    //     success: function (response) {
    //         let dataList = $('#list_section');
    //         dataList.empty();
    //         $.each(response, function(index, value) {
    //             dataList.append('<option value="' + value + '"></option>');
    //         });
    //     },
    //     error: function (xhr, status, error) {
    //         console.error('AJAX Error: ' + status + error);
    //     }
    // });

    let get_supervisor = {
        "action": "get_to",
    }
    get_supervisor = $.param(get_supervisor) + "&" + $('#text_notedby').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: get_supervisor,
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

    // Edited 1-13-25
    function getPreparedByEmpNo(){

        let getEmpNo = {
            "action": "get_trds_user_email",
            "EmployeeName": $('#hidden_prepared_by').val()
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: getEmpNo,
            dataType: "json",
            success: function (response) {
                $('#pdf_hidden_preparedby_empno').val(response.EmpNo);
                $('#pdf_hidden_preparedby_position').val(response.position);

            },
            error: function (error) {
                console.error("Error fetching email for:", option, error);
            }
        });
    }

    function getCheckedByEmpNo(){

        let getEmpNo = {
            "action": "get_trds_user_email",
            "EmployeeName": $('#hidden_checked_by').val()
        };

        $.ajax({
            type: "POST",
            url: handler,
            data: getEmpNo,
            dataType: "json",
            success: function (response) {
                $('#pdf_hidden_checked_empno').val(response.EmpNo);
                $('#pdf_hidden_checked_position').val(response.position);

            },
            error: function (error) {
                console.error("Error fetching email for:", option, error);
            }
        });
    }

// ____________________________________________________________________Edited 1-15-25____________________________________________________________________________________________________


    // function send_email_to_requestor() {
    //         let preparedByEmail = $('#txtApprover_email').val();
    //         let emailTO = $('#txtSend_to_email').val().split(',').map(email => email.trim()); // Split and trim emails
    //         let emailCC = $('#staticEmails').val().split(',').map(email => email.trim()); // For Cc, split and trim
    //         let emailSubject = $('#textSubject_view').val();
    //         let emailDocno = $('#textDocNo_view').val();
    //         let preparedByName = $('#txtApprover_name').val();

    //         // Iterate over each email and send individually
    //         emailTO.forEach(function (email) {
    //             if (email) { // Ensure no empty strings
    //                 $.ajax({
    //                     url: handler,
    //                     type: 'POST',
    //                     data: {
    //                         "action": "send_email_to_requestor",
    //                         "email_subject": emailSubject,
    //                         "email_docno": emailDocno,
    //                         "send_to": email,
    //                         "cc_recipients": emailCC,
    //                         "sent_from": preparedByEmail,
    //                         "user_fullname": preparedByName
    //                     },
    //                     success: function (response) {
    //                         console.log(emailSubject);
    //                         console.log(`Email sent to ${email}:`, response);
    //                         $('#result').append(`<div>Email sent to ${email}: ${response}</div>`);
    //                     },
    //                     error: function () {
    //                         $('#result').append(`<div>Failed to send email to ${email}</div>`);
    //                     }
    //                 });
    //             }
    //         });
    //     }

    // Edited 1-21-25 22o
    function send_email(){

        let requestorEmail = $('#text_preparedby_email').val();
        let emailTO = $('#text_to_email').val();
        // let emailCC = $('#staticEmails').val().split(',').map(email => email.trim()); // For Cc, split and trim
        let emailDocno = $('#text_docno').val();
        let emailSubject = $('#text_subject').val();
        let requestorName = $('#text_preparedby').val();

        $.ajax({
            url: handler,
            type: 'POST',
            data: {
                "action": "send_training_endorsement_email",
                "email_docno": emailDocno,
                "email_subject": $('#text_subject').val(),
                "send_to": emailTO,
                // "cc_recipients": emailCC,
                "sent_from": requestorEmail,
                "user_fullname": requestorName

            },
            success: function(response) {
                console.log(response);
                $('#result').text(response); // Display response in result paragraph
            },
            error: function() {
                $('#result').text("Request failed. Unable to send email."); // Error handling
            }
        });
    }


    // Edited 1-21-25 22o
    function send_multiple_email() {
        let preparedByEmail = $('#text_preparedby_email').val();
        let multiple_emailTO = $('#selectedAttnEmailValues').val().split(',').map(email => email.trim()); // Split and trim emails
        // let emailCC = $('#staticEmails').val().split(',').map(email => email.trim()); // For Cc, split and trim
        let multiple_emailSubject = $('#text_subject').val();
        let multiple_emailDocno = $('#text_docno').val();
        let preparedByName = $('#text_preparedby').val();

        $.ajax({
            url: handler,
            type: 'POST',
            data: {
                "action": "send_training_endorsement_multiple_emails",
                "email_subject": multiple_emailSubject,
                "email_docno": multiple_emailDocno,
                "send_to": multiple_emailTO,
                // "cc_recipients": emailCC,
                "sent_from": preparedByEmail,
                "user_fullname": preparedByName
            },
            success: function(response) {
                console.log(response);
                $('#result').text(response); // Display response in result paragraph
            },
            error: function() {
                $('#result').text("Request failed. Unable to send email."); // Error handling
            }
        });
            
    }

//______________________________________________________________Edited 2-3-25__________________________________________________________________________________________________________________________________________

let selectedApprovedByOptions = [];
    let selectedApprovedByEmails = {};

    // Listen to the change event for the Approved By input
    $('#text_approvedby').on('change', function () {
        let value = $(this).val().trim();

        if (value) {
            // Validate input against the datalist options
            let isValid = false;
            $('#list_approvedby option').each(function () {
                if ($(this).val() === value) {
                    isValid = true;
                    return false; // Exit the loop early
                }
            });

            if (isValid) {
                if (selectedApprovedByOptions.includes(value)) {
                    // If it is already in the list, remove it
                    removeApprovedByOption(value);
                } else {
                    // Check if the user already selected 2 options
                    if (selectedApprovedByOptions.length >= 2) {
                        alert('You can only select 1 or 2 person!');
                    } else {
                        // Add the value to the list
                        selectedApprovedByOptions.push(value);
                        // Fetch and add the email for the new value
                        fetchApprovedByEmail(value);
                    }
                }
            } else {
                alert('This name is not in the list of choices. Please select another one.');
            }

            // Clear the input field so the user can select another option
            $('#text_approvedby').val('');
        }
    });

    // Function to render the selected options as tags
    function renderApprovedByOptions() {
        $('#selectedApprovedByOptions').find('span').remove(); // Clear existing tags

        selectedApprovedByOptions.forEach(function (option) {
            // Create a tag for each selected option
            let tag = $('<span>').addClass('badge bg-primary me-1').text(option);

            // Add a remove button to the tag
            let removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function () {
                removeApprovedByOption(option);
            });

            // Append the remove button to the tag
            tag.append(removeBtn);

            // Append the tag to the selectedApprovedByOptions container
            $('#selectedApprovedByOptions').prepend(tag);
        });

        // Update the hidden input fields
        $('#selectedApprovedByValues').val(selectedApprovedByOptions.join(', '));
        $('#selectedApprovedByOptionsEmail').val(Object.values(selectedApprovedByEmails).join(', '));
    }

    // Function to remove a selected option
    function removeApprovedByOption(option) {
        // Remove the option from the array
        selectedApprovedByOptions = selectedApprovedByOptions.filter(function (item) {
            return item !== option;
        });

        // Remove the corresponding email from the mapping
        delete selectedApprovedByEmails[option];

        // Re-render the selected options
        renderApprovedByOptions();
    }

    // Function to fetch the email for a selected option
    function fetchApprovedByEmail(option) {
        let getApprovedByEmail = {
            "action": "get_trds_user_email",
            "EmployeeName": option
        };

        $.ajax({
            type: "POST",
            url: handler, // Replace with your actual handler URL
            data: getApprovedByEmail,
            dataType: "json",
            success: function (response) {
                if (response.email) {
                    selectedApprovedByEmails[option] = response.email;
                } else {
                    console.error("No email found in response:", response);
                }

                // Re-render after fetching the email
                renderApprovedByOptions();
            },
            error: function (error) {
                console.error("Error fetching email for:", option, error);
            }
        });
    }

    let selectedNotedByOptions = [];
    let selectedNotedByOptionsEmail = {};

    // Listen to the change event for the Approved By input
    $('#text_notedby').on('change', function () {
        let value = $(this).val().trim();

        if (value) {
            // Validate input against the datalist options
            let isValid = false;
            $('#notedby option').each(function () {
                if ($(this).val() === value) {
                    isValid = true;
                    return false; // Exit the loop early
                }
            });

            if (isValid) {
                if (selectedNotedByOptions.includes(value)) {
                    // If it is already in the list, remove it
                    removeNotedByOption(value);
                } else {
                    // Check if the user already selected 2 options
                    if (selectedNotedByOptions.length >= 2) {
                        alert('You can only select 1 or 2 person!');
                    } else {
                        // Add the value to the list
                        selectedNotedByOptions.push(value);
                        // Fetch and add the email for the new value
                        fetchNotedByEmail(value);
                    }
                }
            } else {
                alert('This name is not in the list of choices. Please select another one.');
            }

            // Clear the input field so the user can select another option
            $('#text_notedby').val('');
        }
    });

    // Function to render the selected options as tags
    function renderNotedByOptions() {
        $('#selectedNotedByOptions').find('span').remove(); // Clear existing tags

        selectedNotedByOptions.forEach(function (option) {
            // Create a tag for each selected option
            let tag = $('<span>').addClass('badge bg-primary me-1').text(option);

            // Add a remove button to the tag
            let removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function () {
                removeNotedByOption(option);
            });

            // Append the remove button to the tag
            tag.append(removeBtn);

            // Append the tag to the selectedNotedByOptions container
            $('#selectedNotedByOptions').prepend(tag);
        });

        // Update the hidden input fields
        $('#selectedNotedByValues').val(selectedNotedByOptions.join(', '));
        $('#selectedNotedByOptions').val(Object.values(selectedNotedByOptionsEmail).join(', '));
    }

    // Function to remove a selected option
    function removeNotedByOption(option) {
        // Remove the option from the array
        selectedNotedByOptions = selectedNotedByOptions.filter(function (item) {
            return item !== option;
        });

        // Remove the corresponding email from the mapping
        delete selectedNotedByOptionsEmail[option];

        // Re-render the selected options
        renderNotedByOptions();
    }

    // Function to fetch the email for a selected option
    function fetchNotedByEmail(option) {
        let getApprovedByEmail = {
            "action": "get_trds_user_email",
            "EmployeeName": option
        };

        $.ajax({
            type: "POST",
            url: handler, // Replace with your actual handler URL
            data: getApprovedByEmail,
            dataType: "json",
            success: function (response) {
                if (response.email) {
                    selectedNotedByOptionsEmail[option] = response.email;
                } else {
                    console.error("No email found in response:", response);
                }

                // Re-render after fetching the email
                renderNotedByOptions();
            },
            error: function (error) {
                console.error("Error fetching email for:", option, error);
            }
        });
    }


// _______________________________________________________________________________________________________________________________________________

    // Prevent form submission on Enter key

    $('#formSubmitTrainEndo').on('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent form submission
        }
    });

});

</script>   