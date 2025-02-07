<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="card"> -->
                            <!-- <div class="card-header">
                            <h3 class="fw-bold text-secondary">Training Request Lists</h3>
                            </div> -->

                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <!-- Request Tab Content -->
                                    <div class="tab-pane fade show active" id="requestTab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                                            <h3 class="fw-bold text-secondary">Attendance List</h3>
                                                            <button type="button" class="btn btn-primary mb-3 btnCreateAttendance" data-bs-toggle="modal" data-bs-target="#modalViewAttendance" id="btnCreateAttendance"><i class="fa fa-plus fa-md me-2"></i>Create Attendance</button>
                                                        </div>

                                                        <div class="table-responsive">
                                                            <table id="tbl_attendance" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Control No.</th>
                                                                        <th>Training Date</th>
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

        <!-- Modal Add & Update Attendance -->
        <div class="modal fade" id="modalViewAttendance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Trainee Attendance</h1>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <form id="formSubmitTraineeAttendance">
                            <div class="col-md-14">
                                <div class="mb-1">
                                    <label for="view_text_ctrlno" style="color: DodgerBlue">CTRL #</label>
                                </div>

                                <div class="mb-3">
                                <input class="form-control" type="text" name="view_ctrlno" id="view_text_ctrlno" list="list_ctrlno" placeholder="Enter control number">
                                    <datalist id="list_ctrlno"></datalist>
                                    <input type="hidden" name="view_docno" id="view_text_docno">
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <label for="view_text_training_date" style="color: DodgerBlue">Training Date</label>
                                    </div>

                                    <div class="mb-3">
                                        <input class="form-control" type="date" name="view_training_date" id="view_text_training_date">
                                    </div>
                                </div>
                            </div>
                                              
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="tblTraineeAttendanceDetails" >
                                    <thead class="table-primary">
                                        <tr>
                                        <th>Status</th>
                                        <th>Emp #</th>
                                        <th>Emp Name</th>
                                        <th>Date Hired</th>
                                        <th>Pos/Dept/Section</th>
                                        <th>Training Hours</th>
                                        <th>Reason/Remarks of Absence</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer mt-3">
                                <button type="submit" id="btnSubmitTrainee" class="btn btn-success btnSubmitTrainee"><i class="fa fa-plus fa-md me-2"></i>Submit</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                            </form> 
                        </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {

    $('#attendance').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active');
            $('#headerTitle').text('Training Attendance');
            $('#url_title').text('Training Attendance');
        }
        else {
            $(this).removeClass('active');
        }
    });

    let handler = "./handler/handler.php";
    let today = new Date().toISOString().split('T')[0];

    $('#view_text_training_date').attr('max', today);

    let dataTableAttendance = $('#tbl_attendance').DataTable({
        "aaSorting" : [],
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "./server_side_scripts/attendance.php",
        "drawCallback": function(settings) {
            $('#tbl_attendance').attr('style','width:100%;');
        }
    });

    let dataTableTraineeAttendanceDetails = $('#tblTraineeAttendanceDetails').DataTable({
        columnDefs: [
            {
                targets: [3, 4],  // Specify both column indexes in an array
                visible: false  // Hide both columns
            }
        ],
        responsive: true,
    });

    // GETTING CONTROL NUMBER
    let get_ctrlno = {
            "action": "get_control_no",
        }
        get_ctrlno = $.param(get_ctrlno) + "&" + $('#view_text_ctrlno').serialize();

    $.ajax({
        type: "POST",
        url: handler,
        
        data: get_ctrlno,
        dataType: "json",
        success: function (response) {
            let dataList = $('#list_ctrlno');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });
 
    // Fetch and display employees for the selected doc number (PAUL'S ORIGINAL CODE W/OUT DISABLING AND INPUT FOR ABSENT REASON)
    // $('#view_text_ctrlno').on('change', function () {
    //     let conno = $(this).val();

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             action: "get_conno_trainee_table",
    //             trainee_conno: conno
    //         },
    //         dataType: "json",
    //         success: function(response) {
    //             dataTableTraineeAttendanceDetails.clear().draw();  // Clear the table before adding new data

    //             $.each(response, function(index, value) {
    //                 // Generate a unique name for each row's radio button group
    //                 let uniqueName = `radio_add_attendance_${index}`;

    //                 // Add each row using DataTables' `row.add()` method
    //                 dataTableTraineeAttendanceDetails.row.add([
    //                     `<div class="btn-group add_radio_attendance ms-2" role="group">   
    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_present_${index}" value="0" autocomplete="off">
    //                         <label class="btn btn-outline-success" for="radio_add_present_${index}">Present</label>

    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_absent_${index}" value="1" autocomplete="off">
    //                         <label class="btn btn-outline-danger" for="radio_add_absent_${index}">Absent</label>

    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_others_${index}" value="2" autocomplete="off">
    //                         <label class="btn btn-outline-secondary" for="radio_add_others_${index}">Others</label>
    //                     </div>`,
    //                     value.fkEmpNo,
    //                     value.fkfullname,
    //                     value.fkdate_hired,
    //                     value.fkpds,
    //                     `<input id='text_absent_remarks' name='absent_remarks' list='list_absent_remarks' class='form-select' placeholder='Add remarks'>
    //                         <datalist id='list_absent_remarks'>
    //                             <option value="0" selected disabled>Select</option>
    //                             <option value="Absent Without Leave">Absent Without Leave</option>
    //                             <option value="Resigned">Resigned</option>
    //                             <option value="Maternity Leave">Maternity Leave</option>
    //                             <option value='Sick Leave'>Sick Leave</option>
    //                             <option value='Vacation Leave'>Vacation Leave</option>
    //                         </datalist>`
    //                 ]).draw(false);  // Use `draw(false)` to avoid resetting the pagination
    //             });
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('AJAX Error: ' + status + ' ' + error);
    //         }
    //     });
    // });

    // 11/22/2024 (hindi nababalik sa dati pag pumindot ng ibang radio, pero disabled na siya pagka reload and may text for reason na)
    // $('#view_text_ctrlno').on('change', function () {
    //     let conno = $(this).val();

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             action: "get_conno_trainee_table",
    //             trainee_conno: conno
    //         },
    //         dataType: "json",
    //         success: function(response) {
    //             dataTableTraineeAttendanceDetails.clear().draw(); // Clear the table before adding new data

    //             $.each(response, function(index, value) {
    //                 let uniqueName = `radio_add_attendance_${index}`;

    //                 dataTableTraineeAttendanceDetails.row.add([
    //                     `<div class="btn-group add_radio_attendance ms-2" role="group">   
    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_present_${index}" value="0" autocomplete="off">
    //                         <label class="btn btn-outline-success" for="radio_add_present_${index}">Present</label>

    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_absent_${index}" value="1" autocomplete="off">
    //                         <label class="btn btn-outline-danger" for="radio_add_absent_${index}">Absent</label>

    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_others_${index}" value="2" autocomplete="off">
    //                         <label class="btn btn-outline-secondary" for="radio_add_others_${index}">Others</label>
    //                     </div>`,
    //                     value.fkEmpNo,
    //                     value.fkfullname,
    //                     value.fkdate_hired,
    //                     value.fkpds,
    //                     `<input id="text_absent_remarks_${index}" name="absent_remarks_${index}" class="form-control" placeholder="Add remarks" disabled>
    //                         <datalist id="list_absent_remarks_${index}">
    //                             <option value="Absent Without Leave">Absent Without Leave</option>
    //                             <option value="Resigned">Resigned</option>
    //                             <option value="Maternity Leave">Maternity Leave</option>
    //                             <option value="Sick Leave">Sick Leave</option>
    //                             <option value="Vacation Leave">Vacation Leave</option>
    //                         </datalist>`
    //                 ]).draw(false);
    //             });

    //             // Handle radio button changes
    //             dataTableTraineeAttendanceDetails.rows().nodes().to$().on('change', 'input[type=radio]', function () {
    //                 let $row = $(this).closest('tr'); // Get the closest table row
    //                 let index = $(this).attr('id').split('_').pop(); // Extract the index from the ID
    //                 let remarksInput = $(`#text_absent_remarks_${index}`);

    //                 if ($(this).is(`#radio_add_present_${index}`)) {
    //                     // Disable and reset the remarks input for "Present"
    //                     remarksInput.prop('disabled', true).val('');
    //                 } else if ($(this).is(`#radio_add_absent_${index}`)) {
    //                     // Replace the input for "Absent" with a reason input field
    //                     remarksInput.replaceWith(`
    //                         <input id="text_absent_reason_${index}" name="absent_reason_${index}" class="form-control" placeholder="Enter reason">
    //                     `);
    //                 } else if ($(this).is(`#radio_add_others_${index}`)) {
    //                     // Enable the remarks input for "Others"
    //                     remarksInput.prop('disabled', false);
    //                 }
    //             });
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('AJAX Error: ' + status + ' ' + error);
    //         }
    //     });
    // });

    // First get_conno_trainee_table
    // $('#view_text_ctrlno').on('change', function () {
    //     let conno = $(this).val();

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             action: "get_conno_trainee_table",
    //             trainee_conno: conno
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             // dataTableTraineeAttendanceDetails.clear().draw(); // Clear the table before adding new data

    //             // $.each(response, function (index, value) {
    //             //     let uniqueName = `radio_add_attendance_${index}`;

    //             //     dataTableTraineeAttendanceDetails.row.add([
    //             //         `<div class="btn-group add_radio_attendance ms-2" role="group">   
    //             //             <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_present_${index}" value="0" autocomplete="off">
    //             //             <label class="btn btn-outline-success" for="radio_add_present_${index}">Present</label>

    //             //             <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_absent_${index}" value="1" autocomplete="off">
    //             //             <label class="btn btn-outline-danger" for="radio_add_absent_${index}">Absent</label>

    //             //             <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_others_${index}" value="2" autocomplete="off">
    //             //             <label class="btn btn-outline-secondary" for="radio_add_others_${index}">Others</label>
    //             //         </div>`,
    //             //         value.fkEmpNo,
    //             //         value.fkfullname,
    //             //         value.fkdate_hired,
    //             //         value.fkpds,
    //             //         `<input id="text_absent_remarks_${index}" name="absent_remarks_${index}" list="list_absent_remarks_${index}" class="form-control" placeholder="Add remarks" disabled>
    //             //             <datalist id="list_absent_remarks_${index}">
    //             //                 <option value="Absent Without Leave">Absent Without Leave</option>
    //             //                 <option value="Resigned">Resigned</option>
    //             //                 <option value="Maternity Leave">Maternity Leave</option>
    //             //                 <option value="Sick Leave">Sick Leave</option>
    //             //                 <option value="Vacation Leave">Vacation Leave</option>
    //             //             </datalist>`
    //             //     ]).draw(false);
    //             // });

    //             dataTableTraineeAttendanceDetails.clear().draw(); // Clear the table before adding new data

    //             $.each(response, function (index, value) {
    //                 let uniqueName = `radio_add_attendance_${index}`;

    //                 dataTableTraineeAttendanceDetails.row.add([
    //                     `<div class="btn-group add_radio_attendance ms-2" role="group">   
    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_present_${index}" value="0" autocomplete="off">
    //                         <label class="btn btn-outline-success" for="radio_add_present_${index}">Present</label>

    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_absent_${index}" value="1" autocomplete="off">
    //                         <label class="btn btn-outline-danger" for="radio_add_absent_${index}">Absent</label>

    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_others_${index}" value="2" autocomplete="off">
    //                         <label class="btn btn-outline-secondary" for="radio_add_others_${index}">Others</label>
    //                     </div>`,
    //                     value.fkEmpNo,
    //                     value.fkfullname,
    //                     value.fkdate_hired,
    //                     value.fkpds,
    //                     // value.fkEmpNo,
    //                     // value.fullname,
    //                     // value.date_hired,
    //                     // value.pds,
    //                     // value.day1, // Include the date here for uniqueness
    //                     `<input id="text_absent_remarks_${index}" name="absent_remarks_${index}" list="list_absent_remarks_${index}" class="form-control" placeholder="Add remarks" disabled>
    //                         <datalist id="list_absent_remarks_${index}">
    //                             <option value="Absent Without Leave">Absent Without Leave</option>
    //                             <option value="Resigned">Resigned</option>
    //                             <option value="Maternity Leave">Maternity Leave</option>
    //                             <option value="Sick Leave">Sick Leave</option>
    //                             <option value="Vacation Leave">Vacation Leave</option>
    //                         </datalist>`
    //                 ]).draw(false);
    //             });

    //             // Handle radio button changes
    //             dataTableTraineeAttendanceDetails.rows().nodes().to$().on('change', 'input[type=radio]', function () {
    //                 let $row = $(this).closest('tr'); // Get the closest table row
    //                 let index = $(this).attr('id').split('_').pop(); // Extract the index from the ID
    //                 let remarksInput = $(`#text_absent_remarks_${index}`);
    //                 let absentReasonInput = $(`#text_absent_reason_${index}`);

    //                 // Remove dynamic reason input if it exists
    //                 if (absentReasonInput.length) {
    //                     absentReasonInput.remove();
    //                     $row.find(`td:last-child`).append(`
    //                         <input id="text_absent_remarks_${index}" name="absent_remarks_${index}" list="list_absent_remarks_${index}" class="form-control" placeholder="Add remarks" disabled>
    //                         <datalist id="list_absent_remarks_${index}">
    //                             <option value="Absent Without Leave">Absent Without Leave</option>
    //                             <option value="Resigned">Resigned</option>
    //                             <option value="Maternity Leave">Maternity Leave</option>
    //                             <option value="Sick Leave">Sick Leave</option>
    //                             <option value="Vacation Leave">Vacation Leave</option>
    //                         </datalist>
    //                     `);
    //                     remarksInput = $(`#text_absent_remarks_${index}`); // Reinitialize
    //                 }

    //                 if ($(this).is(`#radio_add_present_${index}`)) {
    //                     // Reset and disable the remarks input for "Present"
    //                     remarksInput.prop('disabled', true).val('');
    //                 } else if ($(this).is(`#radio_add_absent_${index}`)) {
    //                     // Replace the remarks input with a dynamic reason input for "Absent"
    //                     remarksInput.replaceWith(`
    //                         <input id="text_absent_reason_${index}" name="absent_reason_${index}" class="form-control" placeholder="Enter reason">
    //                     `);
    //                 } else if ($(this).is(`#radio_add_others_${index}`)) {
    //                     // Enable the remarks input for "Others"
    //                     remarksInput.prop('disabled', false).val('');
    //                 }
    //             });
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('AJAX Error: ' + status + ' ' + error);
    //         }
    //     });
    // });

    // ORIGINAL get_conno_trainee_table
    // $('#view_text_ctrlno').on('change', function () {
    //     let conno = $(this).val();

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             action: "get_conno_trainee_table",
    //             trainee_conno: conno
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             dataTableTraineeAttendanceDetails.clear().draw(); // Clear the table before adding new data

    //             $.each(response, function (index, value) {
    //                 let uniqueName = `radio_add_attendance_${index}`;

    //                 dataTableTraineeAttendanceDetails.row.add([
    //                     `<div class="btn-group add_radio_attendance ms-2" role="group">   
    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_present_${index}" value="0" autocomplete="off">
    //                         <label class="btn btn-outline-success" for="radio_add_present_${index}">Present</label>

    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_absent_${index}" value="1" autocomplete="off">
    //                         <label class="btn btn-outline-danger" for="radio_add_absent_${index}">Absent</label>

    //                         <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_others_${index}" value="2" autocomplete="off">
    //                         <label class="btn btn-outline-secondary" for="radio_add_others_${index}">Others</label>
    //                     </div>`,

    //                     value.fkEmpNo,
    //                     value.fullname,
    //                     value.fkdate_hired,
    //                     value.fkpds,
    //                     `<input id="text_absent_remarks_${index}" name="absent_remarks_${index}" list="list_absent_remarks_${index}" class="form-control" placeholder="Add remarks" disabled>
    //                         <datalist id="list_absent_remarks_${index}">
    //                             <option value="Absent Without Leave">Absent Without Leave</option>
    //                             <option value="Resigned">Resigned</option>
    //                             <option value="Maternity Leave">Maternity Leave</option>
    //                             <option value="Sick Leave">Sick Leave</option>
    //                             <option value="Vacation Leave">Vacation Leave</option>
    //                         </datalist>`
    //                 ]).draw(false);
    //             });

    //             // Handle radio button changes
    //             dataTableTraineeAttendanceDetails.rows().nodes().to$().on('change', 'input[type=radio]', function () {
    //                 let $row = $(this).closest('tr'); // Get the closest table row
    //                 let index = $(this).attr('id').split('_').pop(); // Extract the index from the ID
    //                 let remarksInput = $(`#text_absent_remarks_${index}`);
    //                 let absentReasonInput = $(`#text_absent_reason_${index}`);

    //                 // Remove dynamic reason input if it exists
    //                 if (absentReasonInput.length) {
    //                     absentReasonInput.remove();
    //                     $row.find(`td:last-child`).append(`
    //                         <input id="text_absent_remarks_${index}" name="absent_remarks_${index}" list="list_absent_remarks_${index}" class="form-control" placeholder="Add remarks" disabled>
    //                         <datalist id="list_absent_remarks_${index}">
    //                             <option value="Absent Without Leave">Absent Without Leave</option>
    //                             <option value="Resigned">Resigned</option>
    //                             <option value="Maternity Leave">Maternity Leave</option>
    //                             <option value="Sick Leave">Sick Leave</option>
    //                             <option value="Vacation Leave">Vacation Leave</option>
    //                         </datalist>
    //                     `);
    //                     remarksInput = $(`#text_absent_remarks_${index}`); // Reinitialize
    //                 }

    //                 if ($(this).is(`#radio_add_present_${index}`)) {
    //                     // Reset and disable the remarks input for "Present"
    //                     remarksInput.prop('disabled', true).val('');
    //                 } else if ($(this).is(`#radio_add_absent_${index}`)) {
    //                     // Replace the remarks input with a dynamic reason input for "Absent"
    //                     remarksInput.replaceWith(`
    //                         <input id="text_absent_reason_${index}" name="absent_reason_${index}" class="form-control" placeholder="Enter reason">
    //                     `);
    //                 } else if ($(this).is(`#radio_add_others_${index}`)) {
    //                     // Enable the remarks input for "Others"
    //                     remarksInput.prop('disabled', false).val('');
    //                 }
    //             });
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('AJAX Error: ' + status + ' ' + error);
    //         }
    //     });
    // });

    // NAGANA NA get_conno_trainee_table
    // Edited 1-15-25
    $('#view_text_ctrlno').on('change', function () {
        let conno = $(this).val();

        $.ajax({
            type: "POST",
            url: handler,
            data: {
                action: "get_conno_trainee_table",
                trainee_conno: conno
            },
            dataType: "json",
            success: function (response) {
                dataTableTraineeAttendanceDetails.clear().draw(); // Clear the table before adding new data

                $.each(response, function (index, value) {
                    let uniqueName = `radio_add_attendance_${index}`;
                    let isStatusTwo = value.day1_status === "2"; // Check if day1_status equals "2"
                    let remarksDisabled = isStatusTwo ? "" : "disabled";
                    let reasonInput = `
                        <input id="text_absent_remarks_${index}" name="absent_remarks_${index}" list="list_absent_remarks_${index}" class="form-control" placeholder="Add remarks" ${remarksDisabled} value="${isStatusTwo ? value.day1_reason : ''}">
                        <datalist id="list_absent_remarks_${index}">
                            <option value="Absent Without Leave">Absent Without Leave</option>
                            <option value="Resigned">Resigned</option>
                            <option value="Maternity Leave">Maternity Leave</option>
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Vacation Leave">Vacation Leave</option>
                        </datalist>
                    `;

                    let trainingHours = `
                        <input class="form-control" type="number" name="training_hours_${index}" id="training_hours_${index}" value="0" min="0" max="100">
                    `;

                    // Add the row to the DataTable
                    dataTableTraineeAttendanceDetails.row.add([
                        `<div class="btn-group add_radio_attendance ms-2" role="group">   
                            <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_present_${index}" value="0" autocomplete="off">
                            <label class="btn btn-outline-success" for="radio_add_present_${index}">Present</label>

                            <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_absent_${index}" value="1" autocomplete="off">
                            <label class="btn btn-outline-danger" for="radio_add_absent_${index}">Absent</label>

                            <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_others_${index}" value="2" autocomplete="off" ${isStatusTwo ? "checked" : ""}>
                            <label class="btn btn-outline-secondary" for="radio_add_others_${index}">Others</label>
                        </div>`,
                        value.fkEmpNo,
                        value.fullname,
                        value.fkdate_hired,
                        value.fkpds,
                        trainingHours,   // Training hours input in another column
                        reasonInput    // Reason input in one column

                    ]).draw(false);
                });

                // Handle radio button changes
                dataTableTraineeAttendanceDetails.rows().nodes().to$().on('change', 'input[type=radio]', function () {
                    let $row = $(this).closest('tr'); // Get the closest table row
                    let index = $(this).attr('id').split('_').pop(); // Extract the index from the ID
                    let remarksInput = $(`#text_absent_remarks_${index}`);
                    let absentReasonInput = $(`#text_absent_reason_${index}`);

                    // Edited 1-15-25
                    let trainingHrsInput = $(`#training_hours_${index}`);

                    // Remove dynamic reason input if it exists
                    if (absentReasonInput.length) {
                        absentReasonInput.remove();
                        $row.find(`td:last-child`).append(`
                            <input id="text_absent_remarks_${index}" name="absent_remarks_${index}" list="list_absent_remarks_${index}" class="form-control" placeholder="Add remarks" disabled>
                            <datalist id="list_absent_remarks_${index}">
                                <option value="Absent Without Leave">Absent Without Leave</option>
                                <option value="Resigned">Resigned</option>
                                <option value="Maternity Leave">Maternity Leave</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <option value="Vacation Leave">Vacation Leave</option>
                            </datalist>
                        `);
                        remarksInput = $(`#text_absent_remarks_${index}`); // Reinitialize
                    }

                    if ($(this).is(`#radio_add_present_${index}`)) {
                        // Reset and disable the remarks input for "Present"
                        remarksInput.prop('disabled', true).val('');
                        trainingHrsInput.prop('disabled', false).val('0');

                    } else if ($(this).is(`#radio_add_absent_${index}`)) {
                        // Replace the remarks input with a dynamic reason input for "Absent"
                        remarksInput.replaceWith(`
                            <input id="text_absent_reason_${index}" name="absent_reason_${index}" class="form-control" placeholder="Enter reason">
                        `);
                        trainingHrsInput.prop('disabled', true).val('0');

                    } else if ($(this).is(`#radio_add_others_${index}`)) {
                        // Enable the remarks input for "Others"
                        remarksInput.prop('disabled', false).val('');
                        trainingHrsInput.prop('disabled', true).val('0');
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + status + ' ' + error);
            }
        });
    });

    // Nitatrabaho ko
    // $('#view_text_ctrlno').on('change', function () {
    //     let conno = $(this).val();

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             action: "get_conno_trainee_table",
    //             trainee_conno: conno
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             dataTableTraineeAttendanceDetails.clear().draw(); // Clear the table before adding new data

    //             if (response.length > 0) {
    //                 // Data found, process and populate the table
    //                 $.each(response, function (index, value) {
    //                     let uniqueName = `radio_add_attendance_${index}`;
    //                     let isStatusTwo = value.day1_status === "2"; // Check if day1_status equals "2"
    //                     let remarksDisabled = isStatusTwo ? "" : "disabled";
    //                     let reasonInput = `
    //                         <input id="text_absent_remarks_${index}" name="absent_remarks_${index}" list="list_absent_remarks_${index}" class="form-control" placeholder="Add remarks" ${remarksDisabled} value="${isStatusTwo ? value.day1_reason : ''}">
    //                         <datalist id="list_absent_remarks_${index}">
    //                             <option value="Absent Without Leave">Absent Without Leave</option>
    //                             <option value="Resigned">Resigned</option>
    //                             <option value="Maternity Leave">Maternity Leave</option>
    //                             <option value="Sick Leave">Sick Leave</option>
    //                             <option value="Vacation Leave">Vacation Leave</option>
    //                         </datalist>
    //                     `;

    //                     dataTableTraineeAttendanceDetails.row.add([
    //                         `<div class="btn-group add_radio_attendance ms-2" role="group">   
    //                             <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_present_${index}" value="0" autocomplete="off">
    //                             <label class="btn btn-outline-success" for="radio_add_present_${index}">Present</label>

    //                             <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_absent_${index}" value="1" autocomplete="off">
    //                             <label class="btn btn-outline-danger" for="radio_add_absent_${index}">Absent</label>

    //                             <input type="radio" class="btn-check" name="${uniqueName}" id="radio_add_others_${index}" value="2" autocomplete="off" ${isStatusTwo ? "checked" : ""}>
    //                             <label class="btn btn-outline-secondary" for="radio_add_others_${index}">Others</label>
    //                         </div>`,
    //                         value.fkEmpNo,
    //                         value.fullname,
    //                         value.fkdate_hired,
    //                         value.fkpds,
    //                         reasonInput
    //                     ]).draw(false);
    //                 });

    //                 // Handle radio button changes
    //                 dataTableTraineeAttendanceDetails.rows().nodes().to$().on('change', 'input[type=radio]', function () {
    //                     let $row = $(this).closest('tr'); // Get the closest table row
    //                     let index = $(this).attr('id').split('_').pop(); // Extract the index from the ID
    //                     let remarksInput = $(`#text_absent_remarks_${index}`);
    //                     let absentReasonInput = $(`#text_absent_reason_${index}`);

    //                     // Remove dynamic reason input if it exists
    //                     if (absentReasonInput.length) {
    //                         absentReasonInput.remove();
    //                         $row.find(`td:last-child`).append(`
    //                             <input id="text_absent_remarks_${index}" name="absent_remarks_${index}" list="list_absent_remarks_${index}" class="form-control" placeholder="Add remarks" disabled>
    //                             <datalist id="list_absent_remarks_${index}">
    //                                 <option value="Absent Without Leave">Absent Without Leave</option>
    //                                 <option value="Resigned">Resigned</option>
    //                                 <option value="Maternity Leave">Maternity Leave</option>
    //                                 <option value="Sick Leave">Sick Leave</option>
    //                                 <option value="Vacation Leave">Vacation Leave</option>
    //                             </datalist>
    //                         `);
    //                         remarksInput = $(`#text_absent_remarks_${index}`); // Reinitialize
    //                     }

    //                     if ($(this).is(`#radio_add_present_${index}`)) {
    //                         // Reset and disable the remarks input for "Present"
    //                         remarksInput.prop('disabled', true).val('');
    //                     } else if ($(this).is(`#radio_add_absent_${index}`)) {
    //                         // Replace the remarks input with a dynamic reason input for "Absent"
    //                         remarksInput.replaceWith(`
    //                             <input id="text_absent_reason_${index}" name="absent_reason_${index}" class="form-control" placeholder="Enter reason">
    //                         `);
    //                     } else if ($(this).is(`#radio_add_others_${index}`)) {
    //                         // Enable the remarks input for "Others"
    //                         remarksInput.prop('disabled', false).val('');
    //                     }
    //                 });
    //             } else {
    //                 // No records found, show a message or just clear the table
    //                 dataTableTraineeAttendanceDetails.row.add([
    //                     'No records found', '', '', '', '', ''
    //                 ]).draw(false);
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('AJAX Error: ' + status + ' ' + error);
    //         }
    //     });
    // });




    // GETTING DOCUMENT NUMMBER BASE IN THE CTRL NUMBER
    $('#view_text_ctrlno').on('change', function() {
        let ctrlno = $(this).val();

        if(ctrlno) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "get_docno",
                    "ctrlnumber": ctrlno
                },
                dataType: "json",
                success: function(response) {
                    if(response.length > 0) {
                            $('#text_docno').val(response[0]);
                        } else {
                            $('#text_docno').val(''); 
                        }
                    },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });

            // GETTING EMPLOYEE NUMBER
            let empno = {
                "action": "display_empno",
            };
            empno = $.param(empno) + "&" + $('#text_empno').serialize();

            $.ajax({
                type: "POST",
                url: handler,
                data: empno,
                dataType: "json",
                success: function (response) {
                    let dataList = $('#list_empno');
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

            // let empno = {
            //         "action": "get_conno_trainee",
            //         "CTRLNumber": ctrlno
            //     }
            //     empno = $.param(empno) + "&" + $('#text_empno').serialize();

            // $.ajax({
            //     type: "POST",
            //     url: handler,
                
            //     data: empno,
            //     dataType: "json",
            //     success: function (response) {
            //         let dataList = $('#list_empno');
            //         dataList.empty();
            //         $.each(response, function(index, value) {
            //             dataList.append('<option value="' + value + '"></option>');
            //         });
            //     },
            //     error: function (xhr, status, error) {
            //         console.error('AJAX Error: ' + status + error);
            //     }
            // });
        }
    });

    // GETTING EMPLOYEE DETAILS BASE IN THE EMPLOYEE NUMBER
    $('#text_empno').on('change', function() {
        let empNo = $(this).val();

        if(empNo) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "get_employee",
                    "textEmpNo": empNo
                },
                dataType: "json",
                success: function(response) {
                    if(response.FullName) {
                        $('#text_fullname').val(response.FullName);
                        $('#text_pds').val(response.pds);
                        $('#text_date_hired').val(response.DateHired);
                    } else {
                        $('#text_fullname').val(''); 
                        $('#text_pds').val('');
                        $('#text_date_hired').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        }
    });

    // PAUL'S ORIGINAL CODE
    // $('#formSubmitTraineeAttendance').submit(function (e) { 
    //     e.preventDefault();

    //     let allTrainees = [];
    //     let ctrlNum = $('#view_text_ctrlno').val().trim();
    //     let trainingDate = $('#view_text_training_date').val().trim();
    //     let missingStatus = false; // Flag to track if any day1_status is missing
    //     let missingRemarks = false; // Flag to track if remarks are missing for absent or others

    //     // Collect data from visible rows
    //     dataTableTraineeAttendanceDetails.rows({ filter: 'applied' }).every(function () {
    //         let rowNode = $(this.node());

    //         // Retrieve data from each cell in the row
    //         let fkEmpNo = rowNode.find('td').eq(1).text().trim();
    //         let fkfullname = rowNode.find('td').eq(2).text().trim();
    //         let fkdate_hired = rowNode.find('td').eq(3).text().trim();
    //         let fkpds = rowNode.find('td').eq(4).text().trim();

    //         // Get the selected radio button's value for attendance status
    //         let day1_status = rowNode.find('input[type="radio"]:checked').val();

    //         let day1_reason = rowNode.find('input[name="absent_remarks"]').val();

    //         // Check if day1_status is missing for the current row
    //         if (!day1_status) {
    //             missingStatus = true; // Set flag if any day1_status is missing
    //         }

    //         // Check if remarks are required (Absent or Others) and if missing
    //         if ((day1_status == "1" || day1_status == "2") && !day1_reason) {
    //             missingRemarks = true; // Set flag if remarks are missing for Absent/Others
    //         }

    //         // Push the row data into the allTrainees array even if the day1_status is missing
    //         allTrainees.push({
    //             day1_status: day1_status || "", // Default to empty if none selected
    //             fkEmpNo: fkEmpNo,
    //             fkfullname: fkfullname,
    //             fkdate_hired: fkdate_hired,
    //             fkpds: fkpds,
    //             day1_reason: day1_reason || "" // Default to empty if none selected
    //         });
    //     });

    //     // If any row is missing day1_status or remarks for absent/others, show alert and stop submission
    //     if (missingStatus) {
    //         alert("Please select if the trainee is present or absent for all rows.");
    //         return; // Stop form submission if validation fails
    //     }

    //     if (missingRemarks) {
    //         alert("Please enter remarks for absent or other trainees.");
    //         return; // Stop form submission if validation fails
    //     }

    //     console.log('Collected Table Data:', allTrainees);

    //     // Check if ctrlNum, trainingDate, or allTrainees array are empty
    //     if (!trainingDate || !ctrlNum || allTrainees.length === 0) {
    //         alert('Please fill up all the fields!');
    //         return; // Stop submission if validation fails
    //     }

    //     // Prepare data for AJAX submission
    //     let submitAttendance = {
    //         "action": "submit_attendance",
    //         "rows": allTrainees
    //     };
    //     submitAttendance = $.param(submitAttendance) + "&" + $('#formSubmitTraineeAttendance').serialize();

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: submitAttendance,
    //         dataType: "json",
    //         success: function (response) {
    //             dataTableAttendance.draw();
    //             alert('Successfully Added!');
    //             $('#modalViewAttendance').modal('hide');
    //             $('#formSubmitTraineeAttendance')[0].reset();
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('AJAX Error:', status, error);
    //         }
    //     });
    // });

    // JOWEE'S CODE Hindi gumagana pag nag add ng may absent and others, pero present is good
    // $('#formSubmitTraineeAttendance').submit(function (e) { 
    //     e.preventDefault();

    //     let allTrainees = [];
    //     let ctrlNum = $('#view_text_ctrlno').val().trim();
    //     let trainingDate = $('#view_text_training_date').val().trim();
    //     let missingStatus = false; // Flag to track if any day1_status is missing
    //     let missingRemarks = false; // Flag to track if remarks are missing for absent or others

    //     // Collect data from visible rows
    //     dataTableTraineeAttendanceDetails.rows({ filter: 'applied' }).every(function () {
    //         let rowNode = $(this.node());

    //         // Retrieve data from each cell in the row
    //         let fkEmpNo = rowNode.find('td').eq(1).text().trim();
    //         let fkfullname = rowNode.find('td').eq(2).text().trim();
    //         let fkdate_hired = rowNode.find('td').eq(3).text().trim();
    //         let fkpds = rowNode.find('td').eq(4).text().trim();

    //         // Get the selected radio button's value for attendance status
    //         let day1_status = rowNode.find('input[type="radio"]:checked').val();

    //         let day1_reason = "";

    //         if (day1_status === "0") { // Absent
    //             day1_reason = "";
    //         }
    //         else if (day1_status === "1") { // Absent
    //             day1_reason = rowNode.find(`input[name="absent_reason"]`).val() || ""; // Default to empty string
    //         } else if (day1_status === "2") { // Others
    //             day1_reason = rowNode.find(`input[name="absent_remarks"]`).val() || ""; // Default to empty string
    //         }

    //         // Check if day1_status is missing for the current row
    //         if (!day1_status) {
    //             missingStatus = true; // Set flag if any day1_status is missing
    //         }

    //         // Check if remarks are required (Absent or Others) and if missing
    //         if ((day1_status == "1" || day1_status == "2") && !day1_reason) {
    //             missingRemarks = true; // Set flag if remarks are missing for Absent/Others
    //         }

    //         // Push the row data into the allTrainees array even if the day1_status is missing
    //         allTrainees.push({
    //             day1_status: day1_status || "", // Default to empty if none selected
    //             fkEmpNo: fkEmpNo,
    //             fkfullname: fkfullname,
    //             fkdate_hired: fkdate_hired,
    //             fkpds: fkpds,
    //             day1_reason: day1_reason || "" // Default to empty if none selected
    //         });
    //     });

    //     // If any row is missing day1_status or remarks for absent/others, show alert and stop submission
    //     if (missingStatus) {
    //         alert("Please select if the trainee is present or absent for all rows.");
    //         return; // Stop form submission if validation fails
    //     }

    //     if (missingRemarks) {
    //         alert("Please enter remarks for absent or other trainees.");
    //         return; // Stop form submission if validation fails
    //     }

    //     console.log('Collected Table Data:', allTrainees);

    //     // Check if ctrlNum, trainingDate, or allTrainees array are empty
    //     if (!trainingDate || !ctrlNum || allTrainees.length === 0) {
    //         alert('Please fill up all the fields!');
    //         return; // Stop submission if validation fails
    //     }

    //     // Prepare data for AJAX submission
    //     let submitAttendance = {
    //         "action": "submit_attendance",
    //         "rows": allTrainees
    //     };
    //     submitAttendance = $.param(submitAttendance) + "&" + $('#formSubmitTraineeAttendance').serialize();

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: submitAttendance,
    //         dataType: "json",
    //         success: function (response) {
    //             dataTableAttendance.draw();
    //             alert('Successfully Added!');
    //             $('#modalViewAttendance').modal('hide');
    //             $('#formSubmitTraineeAttendance')[0].reset();
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('AJAX Error:', status, error);
    //         }
    //     });
    // });

    // ORIGINAL formSubmitAttendance CODE
    // $('#formSubmitTraineeAttendance').submit(function (e) { 
    //     e.preventDefault();

    //     let allTrainees = [];
    //     let ctrlNum = $('#view_text_ctrlno').val().trim();
    //     let trainingDate = $('#view_text_training_date').val().trim();
    //     let missingStatus = false; // Flag to track if any day1_status is missing
    //     let missingRemarks = false; // Flag to track if remarks are missing for absent or others

    //     // Collect data from visible rows
    //     dataTableTraineeAttendanceDetails.rows({ filter: 'applied' }).every(function () {
    //         let rowNode = $(this.node());

    //         // Retrieve data from each cell in the row
    //         let fkEmpNo = rowNode.find('td').eq(1).text().trim();
    //         let fkfullname = rowNode.find('td').eq(2).text().trim();
    //         let fkdate_hired = rowNode.find('td').eq(3).text().trim();
    //         let fkpds = rowNode.find('td').eq(4).text().trim();

    //         // Get the selected radio button's value for attendance status
    //         let day1_status = rowNode.find('input[type="radio"]:checked').val();
    //         let index = rowNode.find('input[type="radio"]:checked').attr('id')?.split('_').pop();

    //         let day1_reason = "";

    //         if (day1_status === "0") { // Present
    //             day1_reason = ""; // No remarks needed
    //         } else if (day1_status === "1") { // Absent
    //             day1_reason = rowNode.find(`#text_absent_reason_${index}`).val()?.trim() || ""; // Get reason
    //         } else if (day1_status === "2") { // Others
    //             day1_reason = rowNode.find(`#text_absent_remarks_${index}`).val()?.trim() || ""; // Get remarks
    //         }

    //         // Check if day1_status is missing for the current row
    //         if (!day1_status) {
    //             missingStatus = true; // Set flag if any day1_status is missing
    //         }

    //         // Check if remarks are required (Absent or Others) and if missing
    //         if ((day1_status === "1" || day1_status === "2") && !day1_reason) {
    //             missingRemarks = true; // Set flag if remarks are missing for Absent/Others
    //         }

    //         // Push the row data into the allTrainees array even if the day1_status is missing
    //         allTrainees.push({
    //             day1_status: day1_status || "", // Default to empty if none selected
    //             fkEmpNo: fkEmpNo,
    //             fkfullname: fkfullname,
    //             fkdate_hired: fkdate_hired,
    //             fkpds: fkpds,
    //             day1_reason: day1_reason || "" // Default to empty if none provided
    //         });
    //     });

    //     // If any row is missing day1_status or remarks for absent/others, show alert and stop submission
    //     if (missingStatus) {
    //         alert("Please select if the trainee is present or absent for all rows.");
    //         return; // Stop form submission if validation fails
    //     }

    //     if (missingRemarks) {
    //         alert("Please enter remarks for absent or other trainees.");
    //         return; // Stop form submission if validation fails
    //     }

    //     console.log('Collected Table Data:', allTrainees);

    //     // Check if ctrlNum, trainingDate, or allTrainees array are empty
    //     if (!trainingDate || !ctrlNum || allTrainees.length === 0) {
    //         alert('Please fill up all the fields!');
    //         return; // Stop submission if validation fails
    //     }

    //     // Prepare data for AJAX submission
    //     let submitAttendance = {
    //         "action": "submit_attendance",
    //         "rows": allTrainees
    //     };
    //     submitAttendance = $.param(submitAttendance) + "&" + $('#formSubmitTraineeAttendance').serialize();

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             "action": "check_attendance",
    //             "fkConNo": ctrlNum,
    //             "trDate": trainingDate
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             if (response.exists) {
    //                 alert('This CTRL Number and Training Date already exist. Choose another CTRL Number or Training Date.');
    //                 // $('#modalViewAttendance').modal('hide');
    //                 // $('#formSubmitTraineeAttendance')[0].reset();
    //                 return; // Stop further execution
    //             } else {
    //                 // If no duplicate, proceed with form submission
    //                 $.ajax({
    //                     type: "POST",
    //                     url: handler,
    //                     data: submitAttendance,
    //                     dataType: "json",
    //                     success: function (response) {
    //                         dataTableAttendance.draw();
    //                         alert('Successfully Added!');
    //                         $('#modalViewAttendance').modal('hide');
    //                         $('#formSubmitTraineeAttendance')[0].reset();
    //                     },
    //                     error: function (xhr, status, error) {
    //                         console.error('AJAX Error:', status, error);
    //                     }
    //                 });
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('AJAX Error:', status, error);
    //         }
    //     });
    // });

    // 1-15-25
    $('#formSubmitTraineeAttendance').submit(function (e) { 
        e.preventDefault();

        let allTrainees = [];
        let ctrlNum = $('#view_text_ctrlno').val().trim();
        let trainingDate = $('#view_text_training_date').val().trim();
        let missingStatus = false; // Flag to track if any day1_status is missing
        let missingRemarks = false; // Flag to track if remarks are missing for absent or others

        // Collect data from visible rows
        dataTableTraineeAttendanceDetails.rows({ filter: 'applied' }).every(function () {
            let rowNode = $(this.node());

            // Retrieve data from each cell in the row
            let fkEmpNo = rowNode.find('td').eq(1).text().trim();
            let fkfullname = rowNode.find('td').eq(2).text().trim();

            // Get the selected radio button's value for attendance status
            let day1_status = rowNode.find('input[type="radio"]:checked').val();
            let index = rowNode.find('input[type="radio"]:checked').attr('id')?.split('_').pop();

            // Retrieve the training_hours value using the index
            let training_hours = rowNode.find('td').eq(3).find(`input#training_hours_${index}`).val()?.trim() || "0";

            let day1_reason = "";

            if (day1_status === "0") { // Present
                day1_reason = ""; // No remarks needed
            } else if (day1_status === "1") { // Absent
                day1_reason = rowNode.find(`#text_absent_reason_${index}`).val()?.trim() || ""; // Get reason
            } else if (day1_status === "2") { // Others
                day1_reason = rowNode.find(`#text_absent_remarks_${index}`).val()?.trim() || ""; // Get remarks
            }

            // Check if day1_status is missing for the current row
            if (!day1_status) {
                missingStatus = true; // Set flag if any day1_status is missing
            }

            // Check if remarks are required (Absent or Others) and if missing
            if ((day1_status === "1" || day1_status === "2") && !day1_reason) {
                missingRemarks = true; // Set flag if remarks are missing for Absent/Others
            }

            // Push the row data into the allTrainees array even if the day1_status is missing
            allTrainees.push({
                day1_status: day1_status || "", // Default to empty if none selected
                fkEmpNo: fkEmpNo,
                fkfullname: fkfullname,
                day1_reason: day1_reason || "", // Default to empty if none provided
                training_hours: training_hours // Include training hours
            });
        });



        // If any row is missing day1_status or remarks for absent/others, show alert and stop submission
        if (missingStatus) {
            alert("Please select if the trainee is present or absent for all rows.");
            return; // Stop form submission if validation fails
        }

        if (missingRemarks) {
            alert("Please enter remarks for absent or other trainees.");
            return; // Stop form submission if validation fails
        }

        console.log('Collected Table Data:', allTrainees);

        // Check if ctrlNum, trainingDate, or allTrainees array are empty
        if (!trainingDate || !ctrlNum || allTrainees.length === 0) {
            alert('Please fill up all the fields!');
            return; // Stop submission if validation fails
        }


        // Edited 1-14-25
                    // Prepare data for AJAX submission
                    let submitAttendance = {
                        "action": "submit_attendance",
                        "rows": allTrainees
                    };
                    submitAttendance = $.param(submitAttendance) + "&" + $('#formSubmitTraineeAttendance').serialize();

                    $.ajax({
                        type: "POST",
                        url: handler,
                        data: {
                            "action": "check_attendance",
                            "fkConNo": ctrlNum,
                            "trDate": trainingDate
                        },
                        dataType: "json",
                        success: function (response) {
                            if (response.exists) {
                                alert('This CTRL Number and Training Date already exist. Choose another CTRL Number or Training Date.');
                                // $('#modalViewAttendance').modal('hide');
                                // $('#formSubmitTraineeAttendance')[0].reset();
                                return; // Stop further execution
                            } else {
                                // If no duplicate, proceed with form submission
                                $.ajax({
                                    type: "POST",
                                    url: handler,
                                    data: submitAttendance,
                                    dataType: "json",
                                    success: function (response) {
                                        dataTableAttendance.draw();
                                        alert('Successfully Added!');
                                        $('#modalViewAttendance').modal('hide');
                                        $('#formSubmitTraineeAttendance')[0].reset();
                                    },
                                    error: function (xhr, status, error) {
                                        console.error('AJAX Error:', status, error);
                                    }
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                        }
                    });
                
            
        // $.ajax({
        //     type: "POST",
        //     url: handler,
        //     data: {
        //         "action": "count_training",
        //         "fkConno": ctrlNum,
        //         "fkTrainingDate": trainingDate
        //     },
        //     dataType: "json",
        //     success: function (response) {
        //         if(response.fkconno){
        //             alert('You have reach the maximum training days for this CTRL Number.');
        //             return;
        //         }else{
        //             // Prepare data for AJAX submission
        //             let submitAttendance = {
        //                 "action": "submit_attendance",
        //                 "rows": allTrainees
        //             };
        //             submitAttendance = $.param(submitAttendance) + "&" + $('#formSubmitTraineeAttendance').serialize();

        //             $.ajax({
        //                 type: "POST",
        //                 url: handler,
        //                 data: {
        //                     "action": "check_attendance",
        //                     "fkConNo": ctrlNum,
        //                     "trDate": trainingDate
        //                 },
        //                 dataType: "json",
        //                 success: function (response) {
        //                     if (response.exists) {
        //                         alert('This CTRL Number and Training Date already exist. Choose another CTRL Number or Training Date.');
        //                         // $('#modalViewAttendance').modal('hide');
        //                         // $('#formSubmitTraineeAttendance')[0].reset();
        //                         return; // Stop further execution
        //                     } else {
        //                         // If no duplicate, proceed with form submission
        //                         $.ajax({
        //                             type: "POST",
        //                             url: handler,
        //                             data: submitAttendance,
        //                             dataType: "json",
        //                             success: function (response) {
        //                                 dataTableAttendance.draw();
        //                                 alert('Successfully Added!');
        //                                 $('#modalViewAttendance').modal('hide');
        //                                 $('#formSubmitTraineeAttendance')[0].reset();
        //                             },
        //                             error: function (xhr, status, error) {
        //                                 console.error('AJAX Error:', status, error);
        //                             }
        //                         });
        //                     }
        //                 },
        //                 error: function (xhr, status, error) {
        //                     console.error('AJAX Error:', status, error);
        //                 }
        //             });
        //         }
        //     }
        // });
        
    });

    

    // $('#formSubmitTraineeAttendance').submit(function (e) { 
    //     e.preventDefault();

    //     // Retrieve field values
    //     let trainingDate = $('#view_text_training_date').val();
    //     let empno = $('#text_empno').val();
    //     let fullname = $('#text_fullname').val();
    //     let pds = $('#text_pds').val();
    //     let dateHired = $('#text_date_hired').val();
    //     let presentAbsent = $("input[name='radio_add_attendance']:checked").val();
    //     let reason = $('#text_add_reason').val();

    //     if (!trainingDate || !empno || !fullname || !pds || !dateHired || !presentAbsent) {
    //         alert('Please fill up all required fields!');
    //     } 
    //     else if (presentAbsent === '1' && !reason) {
    //         alert('Please provide a reason for absence.');
    //     } 
    //     else {
    //         let submitAttendance = {
    //             "action": "submit_attendance"
    //         };
    //         submitAttendance = $.param(submitAttendance) + "&" + $('#formSubmitTraineeAttendance').serialize();

    //         $.ajax({
    //             type: "POST",
    //             url: handler,
    //             data: submitAttendance,
    //             dataType: "json",
    //             success: function (response) {
    //                 console.log("Form submission response: ", response);

    //                 // Update data tables
    //                 dataTableAttendance.draw(); 
    //                 dataTableTraineeAttendanceDetails.draw();

    //                 // Reset form fields
    //                 $('#text_empno').val('');
    //                 $('#text_fullname').val('');
    //                 $('#text_pds').val('');
    //                 $('#text_date_hired').val('');
    //                 $('#text_add_reason').val('');
    //                 $('#radio_add_present').prop('checked', false);
    //                 $('#radio_add_absent').prop('checked', false);

    //                 // Hide modal and alert success
    //                 $('#modalViewAttendance').modal('hide');
    //                 // alert('Successfully added!');
    //                 toastr.success('Successfully Added!');

    //             },
    //             error: function (xhr, status, error) {
    //                 console.error('Error on submit: ', status, error);
    //             }
    //         });
    //     }
    // });

    $(document).on('click', '.btnCreateAttendance', function () {

        $('#btnSubmitTrainee').removeClass('d-none');
        $('#view_text_ctrlno').attr('readonly', false);
        $('#view_text_training_date').attr('readonly', false);

    });

    $(document).on('click', '.btn_view_attendance', function () {

        $('#btnSubmitTrainee').addClass('d-none');

        $('#view_text_ctrlno').attr('readonly', true);
        $('#view_text_training_date').attr('readonly', true);

        let view_pkid = $(this).data('pkid');
        let view_fkconno = $(this).data('fkconno');
        let view_fkEmpNo = $(this).data('attn_empno');
        let view_fullname = $(this).data('fullname');
        let view_date_hired = $(this).data('date_hired');
        let view_pds = $(this).data('attn_pds');
        let view_day1 = $(this).data('day1');
        let view_day1_status = $(this).data('day1_status');
        let view_day1_reason = $(this).data('day1_reason');

        // Set input fields based on clicked row data
        $('#view_text_attendance_pkid').val(view_pkid);
        $('#view_text_ctrlno').val(view_fkconno);
        $('#view_text_training_date').val(view_day1);

        $.ajax({
            type: "POST",
            url: handler,  // Ensure 'handler' contains a valid URL
            data: {
                "action": "get_trainee_attendance",
                "fkControlNum": view_fkconno,
                "fkTrainingDate": view_day1
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                
                // Clear the table before adding new rows
                dataTableTraineeAttendanceDetails.clear().draw();

                // Add each row to the DataTable
                $.each(response, function (index, value) {
                    let statusBadge;
                    if (value.day1_status == 0) {
                        statusBadge = '<center><span class="badge bg-success text-light"><span>Present</span></span></center>';
                    } else if (value.day1_status == 1) {
                        statusBadge = '<center><span class="badge bg-danger text-light"><span>Absent</span></span></center>';
                    } else if (value.day1_status == 2) {
                        statusBadge = '<center><span class="badge bg-secondary text-light"><span>Others</span></span></center>';
                    }

                    // Edited 1-15-25
                    // Add the row to the DataTable
                    dataTableTraineeAttendanceDetails.row.add([
                        statusBadge,
                        value.fkEmpNo,
                        value.fullname,
                        value.date_hired,
                        value.pds,
                        value.training_hours,
                        value.day1_reason
                    ]).draw(false);  // Use draw(false) to keep pagination state

                });
            },
            error: function (xhr, status, error) {
                console.log("Error:", xhr.responseText);
            }
        });
    });

    // CLEARS FORM WHEN MODAL IS CLOSED
    $('#modalViewAttendance').on('hidden.bs.modal', function () {
        dataTableTraineeAttendanceDetails.clear().draw();
        $('#formSubmitTraineeAttendance')[0].reset();
        $('#con_training_date').addClass('d-none');
        $('#con_add_roa').addClass('d-none');
    });

    $('#text_empno').on('input', function () {
        let check_empno = $(this).val();

        if(check_empno === ''){
            $('#text_fullname').val('');
            $('#text_date_hired').val('');
            $('#text_pds').val('');

        }
    });

    $('#btnAddTrainee').click(function (e) { 
        e.preventDefault();
        
        $('#con_training_date').removeClass('d-none');
    });

    // $(document).on('click', '.btnSubmitTrainee', function () {
    //     dataTableTraineeAttendanceDetails.draw();
    // });

    // Function to handle the radio button changes
    $('#radio_add_present').click(function() {
        $('#con_add_roa').addClass('d-none');
    });

    $('#radio_add_absent').click(function() {
        $('#con_add_roa').removeClass('d-none');
    });


// _______________________________________________________________________________________________________________________________________________

    // Prevent form submission on Enter key

    $('#formSubmitTraineeAttendance').on('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent form submission
        }
    });

});

</script>