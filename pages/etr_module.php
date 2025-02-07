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
                        <iframe 
                            src="http://systemone/etr/emp_record_viewer.php?empID=" 
                            width="100%" 
                            height="500%" 
                            style="border-radius: 8px;"
                            >
                        </iframe>
                    </div>
                </div>
            </div>
        </section>
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

    $('#etr_module').each(function() {
            if (this.href === window.location.href) {
                $(this).addClass('active');
                $('#etr_module_section').removeClass('d-none');
                $('#headerTitle').text('ETR');
                $('#url_title').text('ETR');
            }
            else {
                $(this).removeClass('active');

            }
        });

    // let dataTableTrainingEndorsement = $('#tbl_training_endorsement').DataTable({
    //     "aaSorting"	 : [],
    //     "bProcessing": true,
    //     "bServerSide": true,
    //     "sAjaxSource": "./server_side_scripts/training_endorsement.php",
    //     "drawCallback": function( settings ) {
    //         $('#tbl_training_endorsement').attr('style','width:100%;');
    //     }
    // });

    // let dataTableViewTrainingEndorsement = $('#view_tbl_training_endorsement_details').DataTable();

    // // GENERATE CONTROL NUMBER
    // function generateControlNumber(counter) {
    // let now = new Date();
    // let month = (now.getMonth() + 1).toString().padStart(2, '0');
    // let day = now.getDate().toString().padStart(2, '0');
    // let year = now.getFullYear().toString().slice(-2);

    // // Generate control number in YYMM-XXXX format
    // let controlNumber = `${year}${month}-${counter.toString().padStart(4, '0')}`;

    // // Update the control number field
    // $('#text_docno').val('TUE-' + controlNumber);
    // }

    // // FETCH LAST CONTROL NUMBER FROM THE DATABASE
    // function fetchLastConNumber() {
    //     $.ajax({
    //         url: handler,
    //         method: 'POST',
    //         data: {
    //             action: 'get_endo_last_conno'
    //         },
    //         success: function(response) {
    //             // Try to parse the response to an integer
    //             let lastCounter = parseInt(response);

    //             // Check if the response is a valid number
    //             if (!isNaN(lastCounter)) {
    //                 let nextCounter = lastCounter + 1;

    //                 // Generate and set the next control number
    //                 generateControlNumber(nextCounter);
    //             } else {
    //                 console.error("Invalid response for control number:", response);
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error("Error fetching document number:", error);
    //         }
    //     });
    // }

    // function getUserFullName(){
    //     let preparedByUsername = $('#text_preparedby_username').val();

    //     let getTRDSUserInfo = {
    //         "action": "get_trds_user_info",
    //         "userUsername": preparedByUsername
    //     };
    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: getTRDSUserInfo,
    //         dataType: "json",
    //         success: function (response) {
    //             $('#text_preparedby_email').val(response.email);
    //             $('#text_preparedby').val(response.EmpName);

    //         }
    //     });
    // }

    // function getSendToEmail(){
    //     $.ajax({
    //           type: "POST",
    //           url: handler,
    //           data: {
    //               "action": "get_trds_user_email",
    //               "EmployeeName": $('#text_to').val()
    //           },
    //           dataType: "json",
    //           success: function (response) {
    //                 $('#text_to_email').val(response.email);
    //           }
    //     });
    // }

    // function getDateNow(){
    //     let today = new Date().toISOString().split('T')[0];
    //     $('#text_date_now').val(today);
    // }


    // fetchLastConNumber();
    // getUserFullName();
    // getDateNow();

    // CLEARS FORM WHEN MODAL IS CLOSED
    // $('#modalCreateTREndo').on('hidden.bs.modal', function () {
    //     $('#formSubmitTrainEndo')[0].reset();
    //     tblEndorsementDetails.clear().draw();
    //     fetchLastConNumber();
    //     getDateNow();
    // });

    // Initialize DataTable with export buttons
    // let tblEndorsementDetails = $('#tbl_training_endorsement_details').DataTable({
    //     columnDefs: [
    //         {
    //             targets: 0,  // The index of the "Action" column
    //             visible: false  // Initial visibility is false (hidden)
    //         }
    //     ],
    //     responsive: true,
    // });

    // // GETTING "conno" FROM tbl_training_request
    // let control_no = {
    //         "action": "get_control_no",
    //     }
    //     control_no = $.param(control_no) + "&" + $('#text_tr_ctrl').serialize();

    //     $.ajax({
    //     type: "POST",
    //     url: handler,
    //     data: control_no,
    //     dataType: "json",
    //     success: function (response) {
    //         let dataList = $('#list_tr_ctrl');
    //         dataList.empty();
    //         $.each(response, function(index, value) {
    //             dataList.append('<option value="' + value + '"></option>');
    //         });
    //     },
    //     error: function (xhr, status, error) {
    //         console.error('AJAX Error: ' + status + error);
    //     }
    // });

    // $('#text_tr_ctrl').on('change', function () {
    //     let ctrlno = $(this).val();

    //     if (ctrlno) {
    //         $.ajax({
    //             type: "POST",
    //             url: handler,
    //             data: {
    //                 "action": "get_tr_docno",
    //                 "CTRLNo": ctrlno
    //             },
    //             dataType: "json",
    //             success: function (response) {
    //                 // Ensure we clear the text field before updating
    //                 $('#text_hr_memo').val('');

    //                 if (response.length > 0) {
    //                     $('#text_hr_memo').val(response[0].fkdocno);
    //                     $('#text_to').val(response[0].requestor);

    //                     getSendToEmail();
    //                     // Manually trigger the change event after setting the value
    //                     $('#text_hr_memo').trigger('change');
    //                     // $('#text_to').val('');

    //                 } else {
    //                     alert('No fkdocno found for the selected CTRLNo.');
    //                 }
    //             },
    //             error: function () {
    //                 alert('Error fetching fkdocno.');
    //             }
    //         });
    //     }
    // });

    // $('#text_hr_memo').on('change', function () {
    //     let fkdocno = $(this).val();

    //     if (fkdocno) {  // Use fkdocno instead of ctrlno
    //         $.ajax({
    //             type: "POST",
    //             url: handler,
    //             data: {
    //                 "action": "get_docno_details",
    //                 "FKDocNo": fkdocno
    //             },
    //             dataType: "json",
    //             success: function (response) {
    //                 tblEndorsementDetails.clear().draw();

    //                 if (response.length > 0) {
    //                     $.each(response, function (index, value) {
    //                         let addButton = '<center><button class="btn btn-info fa-solid fa-pen-to-square btn_view" style="color:white" data-empno="' + value.fkEmpNo + '"></button></center>';

    //                         tblEndorsementDetails.row.add([
    //                             addButton,
    //                             value.fkdate_hired,
    //                             value.fkEmpNo,
    //                             value.fkfullname,
    //                             value.fkpds,
    //                             value.fktitle,
    //                             value.fkresult,
    //                             value.fkremarks
                                
    //                         ]).draw(false);
    //                     });
    //                 } else {
    //                     alert('No details found for the selected fkdocno.');
    //                 }
    //             },
    //             error: function () {
    //                 alert('Error fetching document details.');
    //             }
    //         });
    //     }
    // });

    // $('#formSubmitTrainEndo').submit(function (e) { 
    //     e.preventDefault();

    //     let TREData = [];
    //     // Retrieve field values
    //     let TE_docno = $('#text_docno').val().trim();
    //     let TE_to = $('#text_to').val().trim();
    //     let TE_tr_ctrl = $('#text_tr_ctrl').val().trim();
    //     let TE_attn = $('#selectedAttnValues').val().trim();
    //     let TE_hr_memo = $('#text_hr_memo').val().trim();
    //     let TE_subject = $('#text_subject').val().trim();
    //     let TE_preparedby = $('#text_preparedby').val().trim();
    //     let TE_notedby = $('#text_notedby').val().trim();
    //     let TE_textDateNow = $('#text_date_now').val().trim();

    //     // Validation check for required fields
    //     if (!TE_docno || !TE_to || !TE_tr_ctrl || !TE_attn || !TE_hr_memo || !TE_subject || !TE_textDateNow || !TE_preparedby || !TE_notedby) {
    //         alert('Please fill up all required fields!');
    //         return false;
    //     }

    //     // Check if the table contains any data
    //     if (!tblEndorsementDetails.data().any()) {
    //         alert('Trainee table is empty!');
    //         return false;
    //     }

    //     // Check if there are any visible rows (rows not filtered out)
    //     let visibleRows = tblEndorsementDetails.rows({ filter: 'applied' }).data().length;
    //     if (visibleRows === 0) {
    //         alert('Please add at least one visible trainee to the table!');
    //         return false;
    //     }

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             "action": "check_training_dates",
    //             "attendanceFKConno": TE_tr_ctrl
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             if (response.fkconno) {
    //                 $.ajax({
    //                     type: "POST",
    //                     url: handler,
    //                     data: {
    //                         "action": "check_TE_docno",
    //                         "endorsementDocno": TE_docno
    //                     },
    //                     dataType: "json",
    //                     success: function (response) {
    //                         if(response.endorsement_docno){
    //                             console.log(response.endorsement_docno);
    //                             alert('Invalid Document Number. Please try submitting again.');
    //                             fetchLastConNumber();
    //                             getUserFullName();
    //                             getDateNow();
    //                             return;
    //                         }else{
    //                             $.ajax({
    //                                 type: "POST",
    //                                 url: handler,
    //                                 data: {
    //                                     "action": "check_training_endo",
    //                                     "endorsementDocno": TE_docno,
    //                                     "endoHRMemo": TE_hr_memo,
    //                                     "endoTRCtrlno": TE_tr_ctrl
    //                                 },
    //                                 dataType: "json",
    //                                 success: function (response) {
    //                                     console.log(response);
    //                                     if (response.endorsement_docno) {
    //                                         alert("This Training Request is already available in the table.");
    //                                         return;
    //                                     } else {
    //                                         // Collect data from visible table rows
    //                                         tblEndorsementDetails.rows({ filter: 'applied' }).every(function () {
    //                                             let TRRowData = this.data();
    //                                             TREData.push({
    //                                                 fkdate_hired: TRRowData[1].trim(),
    //                                                 fkEmpNo: TRRowData[2].trim(),
    //                                                 fkfullname: TRRowData[3].trim(),
    //                                                 fkpds: TRRowData[4].trim(),
    //                                                 fktitle: TRRowData[5].trim(),
    //                                                 fkresult: TRRowData[6].trim(),
    //                                                 fkremarks: TRRowData[7].trim()
    //                                             });
    //                                         });

    //                                         // Prepare data for AJAX submission
    //                                         let submitTrainingEndorsement = {
    //                                             "action": "add_training_endorsement",
    //                                             "rows": TREData
    //                                         };
    //                                         submitTrainingEndorsement = $.param(submitTrainingEndorsement) + "&" + $('#formSubmitTrainEndo').serialize();

    //                                         // AJAX request to submit the data
    //                                         $.ajax({
    //                                             type: "POST",
    //                                             url: handler,
    //                                             data: submitTrainingEndorsement,
    //                                             dataType: "json",
    //                                             success: function (response) {

    //                                                 send_email();
    //                                                 send_multiple_email();
    //                                                 // Reset form and provide feedback
    //                                                 // $('#formSubmitTrainEndo')[0].reset();
    //                                                 $('#selectedValues').val('');
    //                                                 $('#text_tr_ctrl').val('');
    //                                                 $('#selectedAttnValues').val('');
    //                                                 $('#text_hr_memo').val('');
    //                                                 $('#text_subject').val('');
    //                                                 $('#text_notedby').val('');

    //                                                 $('#text_to').val('');
    //                                                 $('#text_to_email').val('');

    //                                                 $('#selectedAttnEmailValues').val('');

    //                                                 $('#selectedAttnOptions').empty();
    //                                                 $('#selectedOptions').empty();

    //                                                 $('#modalCreateTREndo').modal('hide');
    //                                                 tblEndorsementDetails.clear().draw();  // Clear table data
    //                                                 dataTableTrainingEndorsement.draw();

    //                                                 fetchLastConNumber();
    //                                                 getDateNow();
    //                                                 getUserFullName();

    //                                                 toastr.success('Successfully added!');

    //                                             },
    //                                             error: function(xhr, status, error) {
    //                                                 console.error('Error on submit:', status, error);
    //                                             }
    //                                         });
    //                                     }
    //                                 }
    //                             });
    //                         }
    //                     }
    //                 });
    //             }else{
    //                 alert("This training request doesn't have any training dates yet.");
    //                 return;
    //             }
    //         }
    //     });
    // });

    // $(document).on('click', '.btn_view', function() {

    // let view_endorsement_docno = $(this).data('endorsement_docno');
    // let view_endo_to = $(this).data('endo_to').replace(/,/g, ' / ');
    // let view_endo_attn = $(this).data('endo_attn').replace(/,/g, ' / ');
    // let view_endo_subject = $(this).data('endo_subject');
    // let view_endo_hr_memo = $(this).data('endo_hr_memo');
    // let view_endo_tr_ctrlno = $(this).data('endo_tr_ctrlno');
    // let view_endo_date_now = $(this).data('endo_date_now');
    // let view_endo_hr_tu = $(this).data('endo_hr_tu');
    // let view_endo_tu_requestor = $(this).data('endo_tu_requestor');
    // let view_endo_date_hired = $(this).data('endo_date_hired');
    // let view_endo_empno = $(this).data('endo_empno');
    // let view_endo_fullname = $(this).data('endo_fullname');
    // let view_endo_pds = $(this).data('endo_pds');
    // let view_endo_title = $(this).data('endo_title');
    // let view_endo_remarks = $(this).data('endo_remarks');
    // let view_endo_preparedby = $(this).data('endo_preparedby');
    // let view_endo_notedby = $(this).data('endo_notedby');

    //     // Set the values in the modal or form
    //     $('#hidden_docno').val(view_endorsement_docno);
    //     $('#hidden_tr_conno').val(view_endo_tr_ctrlno);
    //     $('#hidden_hr_memo').val(view_endo_hr_memo);

    //     $('#view_text_docno').text(view_endorsement_docno);
    //     $('#view_text_to').text(view_endo_to);
    //     $('#view_text_tr_ctrl').text(view_endo_tr_ctrlno);
    //     $('#view_text_attn').text(view_endo_attn);
    //     $('#view_text_hr_memo').text(view_endo_hr_memo);
    //     $('#view_text_subject').text(view_endo_subject);
    //     $('#view_text_date_now').text(view_endo_date_now);
    //     $('#view_text_preparedby').text(view_endo_preparedby);
    //     $('#view_text_notedby').text(view_endo_notedby);

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             action: "view_training_endo",
    //             docno: view_endorsement_docno
    //         },
    //         dataType: "json",
    //         success: function(response) {
    //             let tableDetails = $('#view_tbl_training_endorsement_details tbody');
    //             tableDetails.empty();
                
    //             $.each(response, function(index, value) {
    //                 tableDetails.append(`
    //                     <tr>
    //                         <td>${value.endo_date_hired}</td>
    //                         <td>${value.endo_empno}</td>
    //                         <td>${value.endo_fullname}</td>
    //                         <td>${value.endo_pds}</td>
    //                         <td>${value.endo_title}</td>
    //                         <td>${value.endo_remarks}</td>
    //                     </tr>
    //                 `);
    //             });
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('AJAX Error: ' + status + error);
    //         }
    //     });
    // });

    // // CLEARING THE EMPLOYEE DETAILS IF THE EMPLOYEE NUMBER IS EMPTY
    // $('#text_tr_ctrl').on('input', function () {

    //     let check_ctrl = $(this).val();

    //     if(check_ctrl === ''){
    //         $('#text_hr_memo').val('');
    //         $('#text_to').val('');
    //         $('#text_to_email').val('');

    //         tblEndorsementDetails.clear().draw();
    //     }
    // });

    // $('#text_hr_memo').on('input', function () {

    //     let check_hr_memo = $(this).val();

    //     if(check_hr_memo === ''){
    //         $('#text_to').val('');
    //         $('#text_to_email').val('');
    //         tblEndorsementDetails.clear().draw();
    //     }
    // });

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

    // let selectedAttnOptions = [];
    // let selectedAttnEmails = {};

    // // Listen to the change event for option selection
    // $('#text_attn').on('change', function () {
    //     const value = $(this).val().trim();

    //     if (value) {
    //         // Validate input against the datalist options
    //         let isValid = false;
    //         $('#list_attn option').each(function () {
    //             if ($(this).val() === value) {
    //                 isValid = true;
    //                 return false; // Exit the loop early
    //             }
    //         });

    //         if (isValid) {
    //             if (selectedAttnOptions.includes(value)) {
    //                 // If it is already in the list, remove it
    //                 removeAttnOption(value);
    //             } else {
    //                 // Add the value to the list
    //                 selectedAttnOptions.push(value);

    //                 // Fetch and add the email for the new value
    //                 fetchEmailForOption(value);
    //             }
    //         } else {
    //             alert('This name is not in the list of choices. Please select another one.');
    //         }

    //         // Clear the input field
    //         $('#text_attn').val('');

    //         // // Update the hidden input field with the selected values
    //         // $('#selectedAttnValues').val(selectedAttnOptions.join(', '));

    //         // Display the selected options as tags
    //         // renderSelectedAttnOptions();
    //     }
    // });

    // // Function to render the selected options as tags
    // function renderSelectedAttnOptions() {
    //     $('#selectedAttnOptions').find('span').remove(); // Clear existing tags, but keep the input

    //     selectedAttnOptions.forEach(function (option) {
    //         // Create a tag for each selected option
    //         const tag = $('<span>').addClass('badge bg-primary me-1').text(option);

    //         // Add a remove button to the tag
    //         const removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function () {
    //             removeAttnOption(option);
    //         });

    //         // Append the remove button to the tag
    //         tag.append(removeBtn);

    //         // Append the tag to the selectedAttnOptions container
    //         $('#selectedAttnOptions').prepend(tag);
    //     });

    //     // Update the hidden input field with the selected values
    //     $('#selectedAttnValues').val(selectedAttnOptions.join(', '));
    //     $('#selectedAttnEmailValues').val(Object.values(selectedAttnEmails).join(', '));
    // }

    // // Function to remove a selected option
    // function removeAttnOption(option) {
    //     // Remove the option from the array
    //     selectedAttnOptions = selectedAttnOptions.filter(function (item) {
    //         return item !== option;
    //     });

    //     // Update the hidden input field
    //     // $('#selectedAttnValues').val(selectedAttnOptions.join(', '));
    //     delete selectedAttnEmails[option];

    //     // Re-render the selected options
    //     renderSelectedAttnOptions();
    // }

    // function fetchEmailForOption(option) {
    //     let getEmailTo = {
    //         "action": "get_trds_user_email",
    //         "EmployeeName": option
    //     };

    //     $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: getEmailTo,
    //         dataType: "json",
    //         success: function (response) {
    //             if (response.email) {
    //                 selectedAttnEmails[option] = response.email;
    //             } else {
    //                 console.error("No email found in response:", response);
    //             }

    //             // Re-render after fetching the email
    //             renderSelectedAttnOptions();
    //         },
    //         error: function (error) {
    //             console.error("Error fetching email for:", option, error);
    //         }
    //     });
    // }

    // // Fetching data for "attn"
    // let attn = {
    //     "action": "get_to",
    // };
    // attn = $.param(attn) + "&" + $('#text_attn').serialize();

    // $.ajax({
    //     type: "POST",
    //     url: handler,
    //     data: attn,
    //     dataType: "json",
    //     success: function (response) {
    //         let dataList = $('#list_attn');
    //         dataList.empty();
    //         $.each(response, function (index, value) {
    //             dataList.append('<option value="' + value + '"></option>');
    //         });
    //     },
    //     error: function (xhr, status, error) {
    //         console.error('AJAX Error: ' + status + error);
    //     }
    // });

    // // GETTING "NOTED BY" FROM vw_employee
    // let notedby = {
    //         "action": "get_noted_by",
    //     }
    //     notedby = $.param(notedby) + "&" + $('#textNotedBy').serialize();

    //     $.ajax({
    //     type: "POST",
    //     url: handler,
        
    //     data: notedby,
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

    // // GETTING THE USERNAME EQUAL TO NOTED BY
    // $('#textNotedBy').on('change', function () {
    //     let noted_by = $(this).val();

    //     if(noted_by){
    //         $.ajax({
    //         type: "POST",
    //         url: handler,
    //         data: {
    //             "action": "get_username",
    //             "textNotedBy": noted_by
    //         },
    //         dataType: "json",
    //         success: function (response) {
    //             if(response.length > 0){
    //                 $('#textUsername').val(response);
    //             }else{
    //                 $('#textUsername').val('');
    //             }
    //             }
    //         });
    //     }
    // });


    // function send_email(){

    //     let requestorEmail = $('#text_preparedby_email').val();
    //     let emailTO = $('#text_to_email').val();
    //     let emailDocno = $('#text_docno').val();
    //     let emailSubject = $('#text_subject').val();
    //     let requestorName = $('#text_preparedby').val();

    //     $.ajax({
    //         url: handler,
    //         type: 'POST',
    //         data: {
    //             "action": "send_training_endorsement_email",
    //             "email_docno": emailDocno,
    //             "email_subject": $('#text_subject').val(),
    //             "send_to": $('#text_to_email').val(),
    //             "sent_from": requestorEmail,
    //             "user_fullname": requestorName

    //         },
    //         success: function(response) {
    //             console.log(response);
    //             $('#result').text(response); // Display response in result paragraph
    //         },
    //         error: function() {
    //             $('#result').text("Request failed. Unable to send email."); // Error handling
    //         }
    //     });
    // }

    // function send_multiple_email() {
    //     let preparedByEmail = $('#text_preparedby_email').val();
    //     let multiple_emailTO = $('#selectedAttnEmailValues').val().split(',').map(email => email.trim()); // Split and trim emails
    //     let multiple_emailSubject = $('#text_subject').val();
    //     let multiple_emailDocno = $('#text_docno').val();
    //     let preparedByName = $('#text_preparedby').val();

    //     // Iterate over each email and send individually
    //     multiple_emailTO.forEach(function (email) {
    //         if (email) { // Ensure no empty strings
    //             $.ajax({
    //                 url: handler,
    //                 type: 'POST',
    //                 data: {
    //                     "action": "send_training_endorsement_multiple_emails",
    //                     "email_subject": multiple_emailSubject,
    //                     "email_docno": multiple_emailDocno,
    //                     "send_to": email,
    //                     "sent_from": preparedByEmail,
    //                     "user_fullname": preparedByName
    //                 },
    //                 success: function (response) {
    //                     console.log(multiple_emailSubject);
    //                     console.log(`Email sent to ${email}:`, response);
    //                     $('#result').append(`<div>Email sent to ${email}: ${response}</div>`);
    //                 },
    //                 error: function () {
    //                     $('#result').append(`<div>Failed to send email to ${email}</div>`);
    //                 }
    //             });
    //         }
    //     });
    // }

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

// _______________________________________________________________________________________________________________________________________________

    // Prevent form submission on Enter key

//     $('#formSubmitTrainEndo').on('keydown', function (e) {
//         if (e.key === 'Enter') {
//             e.preventDefault(); // Prevent form submission
//         }
//     });

});

</script>   