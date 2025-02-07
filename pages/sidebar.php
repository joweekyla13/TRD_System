<?php 
session_start();
$username = $_SESSION['username'];

if (!$username) {
    // Display an alert and then redirect
    echo "<script>alert('Session Expired! Please login to your RAPID account again.');</script>";
    header('index.php?page=landing_page.php');
    exit();
}
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-navy elevation-4" style="position: fixed; height: 100vh; overflow-y: auto;">
    <a href="index.php?page=dashboard.php" id="dashboard" class="brand-link">
        <img src="images/training_course.png" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Training Record DS</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="modules" id="modules" name="modules">

        </div>

        <div class="user-panel mt-3">
            <div class="info">
                <input type="hidden" class="form-control" id="hidden_user_pkid" name="hidden_user_pkid" value="">
                <datalist id="list_hidden_modules"></datalist>
                <p href="" class="d-grid text-light d-none" id="username" name="username"><?php echo $username; ?> </p>
                <!-- <input type="text" id="input_username" name="input_username" value="<?php echo $username; ?>"> -->
                <p href="" class="d-grid text-light fs-5" id="emp_name"></p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item d-none" id="hr_memo" name="hr_memo">
                    <a href="index.php?page=user.php" id="memo" class="nav-link">
                    <i class="fa-solid fa-file-invoice me-1"></i>
                    <input type="hidden" id="hidden_hr" value="1">
                        <p>HR Memorandum</p>
                    </a>
                </li>
                <li class="nav-item d-none" id="hr_memo_approval" name="hr_memo_approval">
                    <a href="index.php?page=hr_memo_approval.php" id="memo_approval" class="nav-link">
                    <i class="fa-solid fa-file-invoice me-1"></i>
                    <input type="hidden" id="hidden_hr_app" value="16">
                        <p>HR Memo Approval (TU)</p>
                    </a>
                </li>
                
                <li class="nav-item d-none">
                    <a href="index.php?page=request.php" id="request" class="nav-link">
                        <i class="fa-solid fa-user-plus me-1"></i>
                        <input type="hidden" id="hidden_tr" value="2">
                        <p>Training Request</p>
                    </a>
                </li>

                <!-- ****************************TRAINING APPROVAL ****************************** -->

                <li class="nav-item d-none" id="training_app">
                    <a href="#" class="nav-link" style="pointer-events: none; color: inherit; text-decoration: none; background: none; outline: none;" id="Train_app">
                        <i class="fa-solid fa-file-circle-check me-1" style="color: #9FA6B2"></i>
                        <input type="hidden" id="hidden_app_conf" value="3">
                        <p class="text-light nav-label" style="margin: 0;">
                            Training Approval
                        </p>
                    </a>
                </li>

                <li class="nav-item d-none">
                    <a href="index.php?page=conformance.php" id="conformance_menu" class="nav-link">
                        <!-- <i class="fa-solid fa-circle-check ms-3"></i> -->
                         <i class="far fa-circle nav-icon ms-2"></i>
                        <input type="hidden" id="hidden_app_conf" value="4">
                        <p>Conformance</p>
                    </a>
                </li>

                <li class="nav-item d-none">
                    <a href="index.php?page=receiving.php" id="receiving_menu" class="nav-link">
                        <!-- <i class="fa-solid fa-check-to-slot ms-3"></i> -->
                         <i class="far fa-circle nav-icon ms-2"></i>
                        <input type="hidden" id="hidden_app_rec" value="5">
                        <p>Receiving</p>
                    </a>
                </li>

                <li class="nav-item d-none">
                    <a href="index.php?page=qc_head.php" id="qc_head_menu" class="nav-link">
                        <!-- <i class="fa-solid fa-user-check ms-3"></i> -->
                         <i class="far fa-circle nav-icon ms-2"></i>
                        <input type="hidden" id="hidden_app_approv" value="6">
                        <p>QC Head</p>
                    </a>
                </li>

                <!-- **************************** ************************* ****************************** -->

                <li class="nav-item d-none">
                    <a href="index.php?page=attendance.php" id="attendance" class="nav-link">
                        <i class="fa-solid fa-clipboard-list me-1"></i>
                        <input type="hidden" id="hidden_att" value="7">
                        <p>Training Attendance</p>
                    </a>
                </li>

                <!-- <li class="nav-item d-none">
                    <a href="index.php?page=training_materials.php" id="training_mats" class="nav-link">
                        <i class="fa-solid fa-file-arrow-up me-1"></i>
                        <input type="hidden" id="hidden_att" value="16">
                        <p>Training Materials</p>
                    </a>
                </li> -->

                <!-- **************************** THEORETICAL EXAMINATION ****************************** -->

                <li class="nav-item d-none" id="theo_exam">
                    <a href="#" class="nav-link" style="pointer-events: none; color: inherit; text-decoration: none; background: none; outline: none;" id="theo_exam_menu">
                        <!-- <i class="fa-solid fa-file-circle-check me-1" style="color: #9FA6B2"></i> -->
                        <i class="fa-solid fa-file-pen me-1" style="color: #9FA6B2"></i>
                        <input type="hidden" id="hidden_theo" value="8">
                        <p class="text-light nav-label" style="margin: 0;">
                        Theoretical Examination
                        </p>
                    </a>
                </li>

                <li class="nav-item d-none">
                    <a href="index.php?page=exams_list.php" id="exams_menu" class="nav-link">
                        <!-- <i class="fa-solid fa-list-ol ms-3"></i> -->
                         <i class="far fa-circle nav-icon ms-2"></i>
                        <input type="hidden" id="hidden_theo_el" value="9">
                        <p>Exam List</p>
                    </a>
                </li>
                <li class="nav-item d-none">
                    <a href="index.php?page=choose_exam_category.php" id="choose_exam" class="nav-link">
                        <!-- <i class="fa-solid fa-file-pen ms-3"></i> -->
                        <i class="far fa-circle nav-icon ms-2"></i>
                        <input type="hidden" id="hidden_theo_te" value="10">
                        <p>Take Examination</p>
                    </a>
                </li>
                <li class="nav-item d-none">
                    <a href="index.php?page=exam_records.php" id="check_exam" class="nav-link">
                        <!-- <i class="fa-solid fa-spell-check ms-3"></i> -->
                        <i class="far fa-circle nav-icon ms-2"></i>
                        <input type="hidden" id="hidden_theo_ec" value="11">
                        <p>Examination Checking</p>
                    </a>
                </li>

                <!-- **************************** ************************* ****************************** -->
                
                <li class="nav-item d-none">
                    <a href="index.php?page=training_endorsement.php" id="training_endorsement" class="nav-link">
                    <!-- <a href="" id="training_endorsement" class="nav-link"> -->

                        <i class="fa-solid fa-file-contract me-1"></i>
                        <input type="hidden" id="hidden_endo" value="12">
                        <p>Training Endorsement</p>
                    </a>
                </li>

                <!-- <li class="nav-item d-none">
                    <a href="index.php?page=training_plan.php" id="training_plan" class="nav-link">
                    <i class="fa-solid fa-folder-open me-1"></i>
                        <input type="hidden" id="hidden_att" value="17">
                        <p>Training Plan</p>
                    </a>
                </li> -->

                <li class="nav-item d-none">
                <!-- <a href="index.php?page=skill_card.php" id="skill_card" class="nav-link"> -->
                    <a href="" id="skill_card" class="nav-link">
                        <i class="fa-solid fa-address-card me-1"></i>
                        <input type="hidden" id="hidden_skill" value="13">
                        <p>Employee's Skill Matrix</p>
                    </a>
                </li>
                <li class="nav-item d-none" id="traineeListNav">
                <!-- <a href="index.php?page=etr_module.php" id="etr" class="nav-link"> -->
                <a href="index.php?page=etr_module.php" id="etr" class="nav-link">                        
                    <i class="fa-solid fa-star me-1"></i>
                        <input type="hidden" id="hidden_etr" value="14">
                        <p>ETR</p>
                    </a>
                </li>
                <li class="nav-item d-none">
                    <a href="index.php?page=settings.php" id="settings" class="nav-link">
                        <i class="fa-solid fa-user-gear me-1"></i>
                        <input type="hidden" id="hidden_user" value="15">

                        <p>User List</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<script type="text/javascript">
$(document).ready(function () {
    let handler = "./handler/handler.php";

    // Function to load user modules
    function loadUserModules(userPkid) {
        let user_module = {
            "action": "get_user_module",
            "user_id": userPkid
        };
        user_module = $.param(user_module) + "&" + $('#hidden_modules').serialize();

        $.ajax({
            type: "POST",
            url: handler,
            data: user_module,
            dataType: "json",
            success: function (response) {
                console.log(response);  // Verify structure
                let dataList = $('#modules');
                dataList.empty();

                // Process the response
                $.each(response, function (index, item) {
                    if (item.module_id) {
                        let liElement = $(`li.nav-item input[type="hidden"][value="${item.module_id}"]`).closest('li');
                        if (liElement.length > 0) {
                            liElement.removeClass('d-none');
                        }
                        dataList.append(`<input type="hidden" value="${item.module_id}">`);
                    } else {
                        console.warn("Missing 'module_id' in response item:", item);
                    }
                });

                // Check visibility of certain links
                let isConformanceVisible = $('#conformance_menu').closest('li').is(':visible');
                let isReceivingVisible = $('#receiving_menu').closest('li').is(':visible');
                let isQcHeadVisible = $('#qc_head_menu').closest('li').is(':visible');

                let isExamListVisible = $('#questionnaires_menu').closest('li').is(':visible');
                let isTakeExamVisible = $('#choose_exam').closest('li').is(':visible');
                let isCheckExamVisible = $('#check_exam').closest('li').is(':visible');

                if (isConformanceVisible || isReceivingVisible || isQcHeadVisible) {
                    $('#training_app').removeClass('d-none');
                } else {
                    $('#training_app').addClass('d-none');
                }

                if (isExamListVisible || isTakeExamVisible || isCheckExamVisible) {
                    $('#theo_exam').removeClass('d-none');
                } else {
                    $('#theo_exam').addClass('d-none');
                }
            },
        });
    }

    let rapidUsername = $('#username').text().trim();

    // $('#input_username').on('change', function () {

    //     let rapidInputUsername = $(this).val().trim();

    //     if (!rapidInputUsername) {
    //         window.location.replace('index.php?page=landing_page.php');
    //         alert('Session expired. Please log in to your RAPID account again.');
    //         return;
    //     }
    // });

    let getUsernamePKID = {
            "action": "get_user_pkid",
            "rapid_username": rapidUsername
        };

    $.ajax({
        type: "POST",
        url: handler,
        data: getUsernamePKID,
        dataType: "json",
        success: function (response) {
            console.log(rapidUsername);
            console.log(response);
            let userPkid = response[0];
            $('#hidden_user_pkid').val(userPkid);

            // Load user modules as soon as userPkid is retrieved
            loadUserModules(userPkid);
        }
    });

    $('#hidden_user_pkid').on('change', function () {
        let hiddenUserPkid = $(this).val().trim();
        if (hiddenUserPkid) {
            loadUserModules(hiddenUserPkid);
        }
    });

    let userUsername = $('#username').text();

    let getEmpName = {
        "action": "get_trds_user_info",
        "userUsername": userUsername
    }
    $.ajax({
        type: "POST",
        url: handler,
        data: getEmpName,
        dataType: "json",
        success: function (response) {
            $('#emp_name').text(response.EmpName);
        }
    });
});
</script>


  