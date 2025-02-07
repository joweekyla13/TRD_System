<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-12">
                    <div class="col-12"></div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation"> -->
                                        <!-- <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#requestTab" type="button" role="tab" aria-selected="true">User List</button> -->
                                    <!-- </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#receiveTab" type="button" role="tab" aria-selected="false">User's Access List</button>
                                    </li>
                                </ul> -->

                                <!-- <div class="tab-content" id="myTabContent"> -->
                                    <!-- Request Tab Content -->
                                    <!-- <div class="tab-pane fade show active" id="requestTab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <h3 class="fw-bold text-secondary">Access List</h3> -->
                                                        <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAddUser"><i class="fa fa-plus fa-md"></i> New User</button> -->
                                                    <!-- </div>

                                                    <div class="table-responsive">
                                                        <table id="tbl_users" class="table table-bordered table-hover" style="width: 100%;">
                                                            <thead class="table-secondary">
                                                                <tr>
                                                                    <th>Emp #</th>
                                                                    <th>Username</th>
                                                                    <th>Emp Name</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div> -->

                                                    <!-- <h2>Send Test Email</h2>
                                                    <button id="sendEmailBtn">Send Email</button>
                                                    <p id="result"></p> -->
                                                <!-- </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- Receive Tab Content -->
                                    <!-- <div class="tab-pane fade" id="receiveTab" role="tabpanel"> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div class="mt-2">
                                                        <h3 class="fw-bold text-secondary">Access List
                                                            <button type="button" id="btnGiveAccess" class="btn btn-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#modalUserAccess"><i class="fa fa-plus fa-md"></i> Give Access</button>
                                                            <button type="button" class="btn btn-primary mb-3 me-2 float-end" data-bs-toggle="modal" data-bs-target="#modalAddUser"><i class="fa fa-plus fa-md"></i> New User</button>
                                                        </h3>
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table id="tbl_user_list" class="table table-bordered table-hover" style="width: 100%;">
                                                            <thead class="table-secondary">
                                                                <tr>
                                                                    <th>Emp No.</th>
                                                                    <th>Emp Name</th>
                                                                    <th>Username</th>
                                                                    <th>ACCESS</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                <!-- </div>  -->
                                <!-- End of tab-content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Add User -->
        <div class="modal fade" id="modalAddUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Add User</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formSubmitUser" autocomplete="off">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%;">Emp No.</span>
                                <input class="form-control" type="text" name="add_empno" id="text_add_empno" list="list_add_empno" placeholder="Enter employee number" style="text-transform: uppercase">
                                <datalist id="list_add_empno"></datalist>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%;">Username</span>
                                <input class="form-control" type="text" name="add_username" id="text_add_username" placeholder="Enter username">
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%;">Email</span>
                                <input class="form-control" type="text" name="add_email" id="text_add_email" placeholder="Enter email">
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%;">Position</span>
                                <input class="form-select" type="text" name="add_position" id="text_add_position" list="list_add_position" placeholder="Select Position">
                                <datalist id="list_add_position"></datalist>
                                <!-- <select class="form-select" type="text" name="add_position" id="text_add_position" placeholder="Enter Position">
                                    <option value="" disable>Select One</option>
                                    <option value="Employee">Employee</option>

                                    <option value="Jr. Supervisor">Jr. Supervisor</option>
                                    <option value="Sr. Supervisor">Sr. Supervisor</option>

                                    <option value="Assistant Manager">Assistant Manager</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Senior Manager">Senior Manager</option>
                                    <option value="Jr. General Manager">Jr. General Manager</option>
                                    <option value="General Manager">General Manager</option>                                
                                </select> -->
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%;">Department</span>
                                <input class="form-select" type="text" name="add_department" id="text_add_department" list="list_add_department" placeholder="Select Department">
                                <datalist id="list_add_department"></datalist>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 25%;">Section</span>
                                <input class="form-select" type="text" name="add_section" id="text_add_section" list="list_add_section" placeholder="Select section">
                                <datalist id="list_add_section"></datalist>
                            </div>

                            <!-- <input class="form-control" type="text" name="add_position" id="text_add_position" placeholder="Position">
                            <input class="form-control" type="text" name="add_section" id="text_add_section" placeholder="Section">
                            <input class="form-control" type="text" name="add_department" id="text_add_department" placeholder="Department"> -->

                            <input type="hidden" id="text_add_fullname" name="add_fullname">
                            <!-- <input type="text" id="text_add_pds" name="add_pds"> -->
                            <!-- <input type="text" id="text_add_dept" name="add_dept"> -->
                            <!-- <input type="text" id="text_add_section" name="add_section"> -->


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="addNewUser"><i class="fa-solid fa-file-import me-2" style="color: white"></i>ADD</button>
                                <!-- <button type="button" data-bs-toggle="modal" data-bs-target="#modalUserAccess" class="btn btn-success" id="userAccess"><i class="fa-solid fa-file-import me-2" style="color: white"></i>GIVE ACCESS</button> -->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal User Access -->
        <div class="modal fade" id="modalUserAccess" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Add to Access List</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formSubmitUserAccess" autocomplete="off">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Emp No.</span>
                                <input class="form-control" type="text" name="empno" id="text_empno" list="list_empno" placeholder="Enter employee number" style="text-transform: uppercase">
                                <datalist id="list_empno"></datalist>
                                <input type="hidden" id="hidden_added_pkid" name="hidden_added_pkid">
                            </div>

                            <span class="d-block text-center input-group-text w-16.7 text-light mb-4 w-100" style="background-color: DodgerBlue">Access Points</span>

                            <div class="div_hidden_modules" id="div_hidden_modules" name="div_hidden_modules">
                            </div>
                        
                            <div class="ml-5 div_access_points" id="div_access_points">
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="1">
                                    HR Memorandum
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="16">
                                    HR Memo Approval
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="2">
                                    Training Request
                                </label>
                                <br>
                                <!-- <label>
                                    <input type="checkbox" name="accessPoints[]" value="3">
                                    Training Approval
                                </label>
                                <br> -->
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="4">
                                    Conformance
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="5">
                                    Receiving
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="6">
                                    QC Head Approval
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="7">
                                    Training Attendance
                                </label>
                                <br>
                                <!-- <label>
                                    <input type="checkbox" name="accessPoints[]" value="8">
                                    Theoretical Exam
                                </label>
                                <br> -->
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="9">
                                    Exam List
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="10">
                                    Take Examination
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="11">
                                    Examination Checking
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="12">
                                    Training Endorsement
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="13">
                                    Skill Card
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="14">
                                    ETR
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="accessPoints[]" value="15">
                                    User List
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

        <!-- Modal Modify User Access -->
        <div class="modal fade" id="modalModifyUserAccess" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Add to Access List</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formSubmitModifyUserAccess" autocomplete="off">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Emp No.</span>
                                <input class="form-control" type="text" name="modify_empno" id="text_modify_empno" placeholder="Employee number">
                                <input type="hidden" id="hidden_modify_added_pkid" name="hidden_modify_added_pkid">
                            </div>

                            <span class="d-block text-center input-group-text w-16.7 text-light mb-4 w-100" style="background-color: DodgerBlue">Access Points</span>
                        
                            <div class="ml-5 div_modify_access_points" id="div_modify_access_points">
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="1">
                                    HR Memorandum
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="16">
                                    HR Memo Approval
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="2">
                                    Training Request
                                </label>
                                <br>
                                <!-- <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="3">
                                    Training Approval
                                </label>
                                <br> -->
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="4">
                                    Conformance
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="5">
                                    Receiving
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="6">
                                    QC Head Approval
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="7">
                                    Training Attendance
                                </label>
                                <br>
                                <!-- <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="8">
                                    Theoretical Exam
                                </label>
                                <br> -->
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="9">
                                    Exam List
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="10">
                                    Take Examination
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="11">
                                    Examination Checking
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="12">
                                    Training Endorsement
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="13">
                                    Skill Card
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="14">
                                    ETR
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="modify_accessPoints[]" value="15">
                                    User List
                                </label>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="modifyNew"><i class="fa-solid fa-file-import me-2" style="color: white"></i>Apply</button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddAccess" id="btnAddAccess"><i class="fa fa-plus fa-md"></i> Add Access</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal to Add Access -->
        <div class="modal fade" id="modalAddAccess" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addAccessModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable"> <!-- This class makes the modal body scrollable -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold" id="addAccessModalLabel">Add Access</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> <!-- Modal body where content will be scrollable -->
                        <span class="d-block text-center input-group-text w-16.7 text-light mb-4 w-100" style="background-color: DodgerBlue">Access Points</span>
                        <form id="formSubmitAddAccess">
                            <input type="hidden" id="hidden_add_empno" name="hidden_add_empno">
                            <input type="hidden" id="hidden_add_pkid" name="hidden_add_pkid">

                            <div class="ml-5 div_modify_access_points" id="div_modify_access_points">
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="1">
                                    HR Memorandum
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="16">
                                    HR Memo Approval
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="2">
                                    Training Request
                                </label>
                                <br>
                                <!-- <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="3">
                                    Training Approval
                                </label>
                                <br> -->
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="4">
                                    Conformance
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="5">
                                    Receiving
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="6">
                                    QC Head Approval
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="7">
                                    Training Attendance
                                </label>
                                <br>
                                <!-- <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="8">
                                    Theoretical Exam
                                </label>
                                <br> -->
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="9">
                                    Exam List
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="10">
                                    Take Examination
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="11">
                                    Examination Checking
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="12">
                                    Training Endorsement
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="13">
                                    Skill Card
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="14">
                                    ETR
                                </label>
                                <br>
                                <label>
                                    <input type="checkbox" name="add_accessPoints[]" value="15">
                                    User List
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btnSaveAccess"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>Close</button>
                    </div> 
                        </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

    let handler = "./handler/handler.php";

    $('#settings').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active');
            $('#settings_tab').removeClass('d-none');
            $('#headerTitle').text('Settings');
            $('#url_title').text('Settings');
        }
        else {
            $(this).removeClass('active');
        }
    });

    let dataTabeUserModule = $('#tbl_user_module').DataTable();

    let dataTablesUserList = $('#tbl_user_list').DataTable({
        "aaSorting"	 : [],
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "./server_side_scripts/user_list.php",
        "drawCallback": function( settings ) {
            $('#tbl_user_list').attr('style','width:100%;');
        }
    });

    let dataTablesUsers = $('#tbl_users').DataTable({
        "aaSorting"	 : [],
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "./server_side_scripts/modal_users.php",
        "drawCallback": function( settings ) {
            $('#tbl_users').attr('style','width:100%;');
        }
    });

    displayEmpNo();
    displayAddedEmpNo();

    // Function to send email when button is clicked
    // $('#sendEmailBtn').click(function() {
    //     $.ajax({
    //         url: handler, // Request the email_request.php file
    //         type: 'POST', // Send a GET request
    //         data: {
    //             "action": "send_for_approval"
    //         },
    //         success: function(response) {
    //             console.log(response);
    //             $('#result').text(response); // Display response in result paragraph
    //         },
    //         error: function() {
    //             $('#result').text("Request failed. Unable to send email."); // Error handling
    //         }
    //     });
    // });

    $('#text_empno').on('change', function () {
        let user_pkid = $(this).val();

        if(user_pkid){
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "display_users_pkid",
                    "user_empno": user_pkid
                },
                dataType: "json",
                success: function (response) {
                    if(response.pkid) {
                        $('#hidden_added_pkid').val(response.pkid);
                    } else {
                        $('#hidden_added_pkid').val(''); 
                    }
                }
            });
        }
    });

    $('#formSubmitUserAccess').submit(function (e) { 
        e.preventDefault();

        let EmpNo = $('#text_empno').val();
        let isAnyAccessPointChecked = $('input[name="accessPoints[]"]:checked').length > 0;

        if(!EmpNo){
            alert('Please fill up all the fields!');
            return;
        }

        if(!isAnyAccessPointChecked){
            alert('Assign at least one module for the user.');
            return;
        }

        let add_user_access_if_not_exists = {
            "action": "add_user_access_if_not_exists"
        }
        add_user_access_if_not_exists = $.param(add_user_access_if_not_exists) + "&" + $('#formSubmitUserAccess').serialize();
        
        $.ajax({
            type: "POST",
            url: handler,
            data: add_user_access_if_not_exists,
            dataType: "json",
            success: function (response) {
                $('#formSubmitUserAccess')[0].reset();
                $('#modalUserAccess').modal('hide');
                dataTablesUserList.draw();
                displayEmpNo();
                displayAddedEmpNo();
                alert('Successfully added!');
            }
        });
    });

    // $('#formSubmitModifyUserAccess').submit(function (e) { 
    //     e.preventDefault();
        
    // });

    // When a user clicks the "View" button
    $(document).on('click', '.btn_view', function () {
        let view_pkid = $(this).data('userpkid');
        let view_user_id = $(this).data('user_id');
        let view_module_id = $(this).data('module_id');
        let view_EmpNo = $(this).data('empno');
        let view_module_name = $(this).data('module_name');

        // Set input fields based on clicked row data
        $('#hidden_modify_added_pkid').val(view_user_id);
        $('#text_modify_empno').val(view_EmpNo);

        $('#text_modify_empno').attr('readonly', true);

        // Prepare AJAX request to get the user's module access list
        let user_module = {
            "action": "get_user_module",
            "user_id": view_user_id 
        };
        user_module = $.param(user_module);

        // Fetch user's access points and show only relevant checkboxes
        $.ajax({
            type: "POST",
            url: handler,
            data: user_module,
            dataType: "json",
            success: function (response) {
                console.log(response); // Verify the response structure

                // Reset visibility of all checkboxes
                $('input[name="modify_accessPoints[]"]').closest('label').show();

                // Hide all checkboxes initially (just in case)
                $('input[name="modify_accessPoints[]"]').prop('checked', false).closest('label').hide();

                // Loop through each module_id in the response
                $.each(response, function(index, item) {
                    // Find the checkbox with the matching value
                    let checkbox = $(`input[name="modify_accessPoints[]"][value="${item.module_id}"]`);

                    // Check and show the checkbox
                    checkbox.prop('checked', true).closest('label').show();
                });
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
            }
        });
    });

    // When the "Add Access" button is clicked
    $(document).on('click', '#btnAddAccess', function () {
        // Step 1: Reset visibility of all checkboxes to visible in the Add Access modal
        $('#modalAddAccess input[name="add_accessPoints[]"]').closest('label').show();

        let hiddenAddPKID = $('#hidden_modify_added_pkid').val();
        let hiddenAddEmpNo = $('#text_modify_empno').val();

        $('#hidden_add_pkid').val(hiddenAddPKID);
        $('#hidden_add_empno').val(hiddenAddEmpNo);

        // Step 2: Hide the checkboxes that were checked in the original modal (from the "View" action)
        $('input[name="modify_accessPoints[]"]:checked').each(function () {
            let checkbox = $(this);
            
            // Find the matching checkbox in the Add Access modal and hide it
            $(`input[name="add_accessPoints[]"][value="${checkbox.val()}"]`)
                .closest('label')
                .hide(); // Hide the already checked checkboxes
        });
    });



    // $('#btnGiveAccess').click(function (e) { 
    //     e.preventDefault();
    //     $('#addNew').removeClass('d-none');
    //     $('#text_empno').attr('readonly', false);
    // });

    let removedModules = [];

    // Add event listener for changes on checkboxes
    $(document).on('change', 'input[name="modify_accessPoints[]"]', function () {
        if (!$(this).is(':checked')) {
            // Add the value of the unchecked checkbox to the array
            removedModules.push($(this).val());
            console.log(`Checkbox with value ${$(this).val()} was unchecked`);
        } else {
            // If the checkbox is checked again, remove it from the array
            removedModules = removedModules.filter(value => value !== $(this).val());
        }

        // Log the current state of the array
        console.log('Unchecked values array:', removedModules);
    });

    $('#formSubmitModifyUserAccess').submit(function (e) {
        e.preventDefault();

        let modifyUserAccess = {
            "action": "remove_modify_user_access",
            "removedModules": removedModules  // Send the array as it is
        };

        // Combine the serialized form data with removedModules
        modifyUserAccess = $.param(modifyUserAccess) + "&" + $('#formSubmitModifyUserAccess').serialize();

        $.ajax({
            type: "POST",
            url: handler,
            data: modifyUserAccess,
            dataType: "json",
            success: function (response) {
                $('#formSubmitModifyUserAccess')[0].reset();
                $('#modalModifyUserAccess').modal('hide');
                alert('Successfully updated!');
            }
        });
    });


    let user_module = {
        "action": "get_user_module",
        "user_id": $('#hidden_user_pkid').val() 
    };
    user_module = $.param(user_module) + "&" + $('#hidden_modules').serialize();

        $.ajax({
        type: "POST",
        url: handler,
        data: user_module,
        dataType: "json",
        success: function (response) {
            console.log(response);  // Verify structure
            let dataList = $('#div_hidden_modules');
            dataList.empty();
            
            // For each item.module_id, display the corresponding li element
            $.each(response, function(index, item) {
                dataList.append(`<input type="hidden" value="${item.module_id}">`);
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    // CLEARS FORM WHEN MODAL IS CLOSED
    $('#modalUserAccess').on('hidden.bs.modal', function () {
        $('#formSubmitUserAccess')[0].reset();
    });
    $('#modalAddUser').on('hidden.bs.modal', function () {
        $('#formSubmitUser')[0].reset();
    });

    $('#formSubmitUser').submit(function (e) { 
        e.preventDefault();

        let EmpNo = $('#text_add_empno').val();
        let Username = $('#text_add_username').val();
        let Position = $('#text_add_position').val();
        let Department = $('#text_add_department').val();
        let Section = $('#text_add_section').val();

        if(!EmpNo || !Username || !Position || !Department || !Section){
            alert('Please fill up all the fields!');
            return;
        }

        $.ajax({
            type: "POST",
            url: handler,
            data: {
                "action": "check_new_user",
                "empno": EmpNo
            },
            dataType: "json",
            success: function (response) {
                if(response.EmpNo){
                    alert("This user is already added.");
                    return;
                } else {
                    // Proceed with submission
                    let add_user_access = {
                        "action": "add_new_user"
                    }
                    add_user_access = $.param(add_user_access) + "&" + $('#formSubmitUser').serialize();
                    
                    $.ajax({
                        type: "POST",
                        url: handler,
                        data: add_user_access,
                        dataType: "json",
                        success: function (response) {
                            $('#formSubmitUser')[0].reset();
                            $('#modalAddUser').modal('hide');
                            dataTablesUsers.draw();
                            alert('Successfully added!');
                            displayAddedEmpNo();
                            // $('#modalUserAccess').modal('show');
                        }
                    });
                }
            }
        });
    });

    // GETTING EXISTING USERS FROM FROM tbl_user
    function displayEmpNo(){

        let display_existing_user = {
            "action": "display_empno",
        };
        display_existing_user = $.param(display_existing_user) + "&" + $('#text_add_empno').serialize();

        $.ajax({
            type: "POST",
            url: handler,
            data: display_existing_user,
            dataType: "json",
            success: function (response) {
                let dataList = $('#list_add_empno');
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
    }

    // GETTING EMPLOYEE NUMBER
    function displayAddedEmpNo(){
        let empno_datalist = {
            "action": "display_users_empno"
        }
        empno_datalist = $.param(empno_datalist) + "&" + $('#text_empno').serialize();

        $.ajax({
            type: "POST",
            url: handler,
            data: empno_datalist,
            dataType: "json",
            success: function (response) {
                let dataList = $('#list_empno');
                dataList.empty();
                $.each(response, function(index, item) {
                    dataList.append('<option value="' + item.EmpNo + '">' + item.EmpName + '</option>');
                    // dataList.append('<option value="' + value + '"></option>');
                });
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
            }
        });
    }    

    // GETTING EMPLOYEE DETAILS BASE IN THE EMPLOYEE NUMBER
    $('#text_add_empno').on('change', function() {
        let empNo = $(this).val();

        if (empNo) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "get_employee_user_pds_list",
                    "textEmpNo": empNo
                },
                dataType: "json",
                success: function(response) {
                    console.log('Response:', response);

                    if (response.FullName) {
                        $('#text_add_fullname').val(response.FullName);
                        $('#text_add_position').val(response.Position);
                        $('#text_add_section').val(response.Section);
                        $('#text_add_department').val(response.Department);
                        // $('#text_add_pds').val(response.pds);

                        // Automatically trigger the username lookup once FullName is set
                        let empName = response.FullName;
                        if (empName) {
                            $.ajax({
                                type: "POST",
                                url: handler,
                                data: {
                                    "action": "get_username",
                                    "textNotedBy": empName
                                },
                                dataType: "json",
                                success: function (usernameResponse) {
                                    console.log('Username Response:', usernameResponse);

                                    if (usernameResponse.length > 0) {
                                        $('#text_add_username').val(usernameResponse[0]);
                                    $('#text_add_email').val(usernameResponse[1]);
                                    } else {
                                        $('#text_add_username').val('');
                                        $('#text_add_email').val('');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX Error: ' + status + error);
                                }
                            });
                        }
                    } else {
                        $('#text_add_fullname').val(''); 
                        $('#text_add_pds').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        }
    });

    // CLEARS FORM WHEN MODAL IS CLOSED
    // $('#modalAddAccess').on('hidden.bs.modal', function () {
    //     $('#modalModifyUserAccess').modal('show');
    // });

    $('#formSubmitAddAccess').submit(function (e) { 
        e.preventDefault();

        let EmpNo = $('#hidden_add_empno').val();
        let isAnyAccessPointChecked = $('input[name="add_accessPoints[]"]:checked').length > 0;

        if(!EmpNo){
            alert('Please fill up all the fields!');
            return;
        }

        if(!isAnyAccessPointChecked){
            alert('Assign at least one module for the user.');
            return;
        }

        let add_modify_user_access = {
            "action": "add_modify_user_access"
        }
        add_modify_user_access = $.param(add_modify_user_access) + "&" + $('#formSubmitAddAccess').serialize();
        
        $.ajax({
            type: "POST",
            url: handler,
            data: add_modify_user_access,
            dataType: "json",
            success: function (response) {
                $('#formSubmitAddAccess')[0].reset();
                $('#modalAddAccess').modal('hide');
                dataTablesUserList.draw();
                displayEmpNo();
                displayAddedEmpNo();
                alert('Successfully added!');
            }
        });
        
    });

    $('#text_add_empno').on('input', function () {
        let addEmpno = $(this).val();
        if(!addEmpno){
            $('#text_add_username').val('');
            $('#text_add_email').val('');
            $('#text_add_position').val('');
            $('#text_add_department').val('');
            $('#text_add_section').val('');
            return;
        }
    });

    // GETTING THE USERNAME EQUAL TO EMPLOYEE NAME
    // $('#text_add_fullname').on('change', function () {
    //     let empName = $(this).val();
    //     console.log('Employee Name:', empName);
        
    //     if (empName) {
    //         $.ajax({
    //             type: "POST",
    //             url: handler,
    //             data: {
    //                 "action": "get_username",
    //                 "textNotedBy": empName
    //             },
    //             dataType: "json",
    //             success: function (response) {
    //                 console.log('Response:', response);
                    
    //                 if(response.length > 0){
    //                     $('#text_add_username').val(response);
    //                 }else{
    //                     $('#text_add_username').val('');
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('AJAX Error: ' + status + error);
    //             }
    //         });
    //     }
    // });

    // GETTING POSITION
    let get_position = {
        "action": "get_position",
    }
    get_position = $.param(get_position) + "&" + $('#text_add_position').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: get_position,
        dataType: "json",
        success: function (response) {
            let dataList = $('#list_add_position');
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
    get_department = $.param(get_department) + "&" + $('#text_add_department').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: get_department,
        dataType: "json",
        success: function (response) {
            let dataList = $('#list_add_department');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    // GETTING SECTION
    let get_section = {
        "action": "get_section",
    }
    get_section = $.param(get_section) + "&" + $('#text_add_section').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        data: get_section,
        dataType: "json",
        success: function (response) {
            let dataList = $('#list_add_section');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

// _______________________________________________________________________________________________________________________________________________

    // Prevent form submission on Enter key

    $('#formSubmitModifyUserAccess').on('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent form submission
        }
    });

});

</script>