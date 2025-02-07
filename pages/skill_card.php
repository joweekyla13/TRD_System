<!-- Affix Scripts/CSS here -->
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

        <section id="skill_card_section" class="content d-none">
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
                                                            <h3 class="fw-bold text-secondary">QC Stamp / Skill Card</h3>
                                                            <form method="POST" action="skill_card_pdf.php" id="formGenerateSkillCard" target="_blank">
                                                                <!-- HIDDEN DOCNO -->
                                                                <input type="hidden" id="hidden_docno" name="hidden_docno">
                                                                <input type="submit" class="btn btn-success float-end pdf" id="skill_card_pdf" name="skill_card_pdf" value="Generate Skill Card">
                                                            </form>
                                                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreateTREndo" id="btnAddNewTrainEndo"><i class="fa fa-plus fa-md"></i> Add New</button>
                                                        </div>

                                                        <div class="table-responsive">
                                                            <table id="tbl_training_endorsement" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Doc #</th>
                                                                        <th>HR Memo</th>
                                                                        <th>CTRL #</th>
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
        <!-- <div class="modal fade" id="modalCreateTREndo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header modal-info">
                        <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Create Skill Card</h1>
                            
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <p class="fw-bold">Endorsement Memorandum Details</p>
                        </div>

                        <form id="formSubmitTrainEndo" autocomplete="off">

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Document Number</span>
                                        <input class="form-control" type="text" name="docno" id="text_docno" placeholder="Document Number" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="selectedOptions" class="fs-5 mb-1"></div>
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">To</span>
                                        <input class="form-control" type="text" id="text_to" name="endo_to" list="to" placeholder="Send to" multiple>
                                            <datalist id="to">
                                            </datalist>
                                                                            
                                        <input type="hidden" name="selectedValues" id="selectedValues">
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Training Req CTRL #</span>
                                        <input class="form-control" type="text" name="tr_ctrl" id="text_tr_ctrl" list="list_tr_ctrl" placeholder="Control Number">
                                        <datalist id="list_tr_ctrl">
                                        </datalist>
                                    </div>   
                                </div>
                                
                                <div class="col-md-6">
                                    <div id="selectedAttnOptions" class="fs-5 mb-1"></div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Attn</span>
                                        <input class="form-control" type="text" name="attn" id="text_attn" list="list_attn" placeholder="Attention">
                                            <datalist id="list_attn">
                                            </datalist>

                                        <input type="hidden" name="selectedAttnValues" id="selectedAttnValues">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue">HR Memo #</span>
                                        <input class="form-control" type="text" id="text_hr_memo" name="hr_memo" list="list_hr_memo" placeholder="Document Number">
                                        <datalist id="list_hr_memo">
                                            options go here
                                        </datalist>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Subject</span>
                                        <input class="form-control" type="text" name="subject" id="text_subject" placeholder="Enter subject">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Date</span>
                                        <input class="form-control" type="date" name="date_now" id="text_date_now">
                                    </div>
                                </div>
                            </div> 
                            <hr>

                            <div class="mb-3">
                                <p class="fw-bold">Trainee Details</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" style="width: 100%;" id="tbl_training_endorsement_details" >
                                    <thead class="table-primary">
                                        <tr>
                                        <th>Date Hired</th>
                                        <th>E.N.</th>
                                        <th>Full Name</th>
                                        <th>Position/Dept./Section</th>
                                        <th>Title</th>
                                        <th>Remarks</th>
                                        <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        Add more rows as needed
                                    </tbody>

                                </table>
                            </div> 

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Prepared By</span>
                                        <input type="text" class="form-control" id="text_preparedby" name="preparedby" value="ProjectBased" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Noted By</span>
                                        <input type="text" class="form-control" id="text_notedby" name="notedby" list="notedby" placeholder="Noted by">
                                        <datalist id="notedby">
                                        
                                        </datalist>
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
        </div> -->

        <!-- Modal View -->
        <!-- <div class="modal fade" id="modalViewTREndo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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


                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">Document Number</span>
                                        <p class="form-control" type="text" name="docno" id="view_text_docno" placeholder="Document Number"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue">To</span>
                                        <p class="form-control" type="text" id="view_text_to" name="endo_to" list="to" placeholder="Send to"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Training Req CTRL #</span>
                                        <p class="form-control" type="text" name="tr_ctrl" id="view_text_tr_ctrl" list="list_tr_ctrl" placeholder="Control Number"></p>
                                    </div>   
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Attn</span>
                                        <p class="form-control" type="text" name="attn" id="view_text_attn" list="list_attn" placeholder="Attention"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                    <span class="input-group-text text-light" style="background-color: DodgerBlue">HR Memo #</span>
                                        <p class="form-control" type="text" id="view_text_hr_memo" name="hr_memo" list="list_hr_memo" placeholder="Document Number"></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Subject</span>
                                        <p class="form-control" type="text" name="subject" id="view_text_subject" placeholder="Enter subject"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Date</span>
                                        <p class="form-control" type="date" name="date_now" id="view_text_date_now"></p>
                                    </div>
                                </div>
                            </div> 
                            <hr>

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
                                        <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        Add more rows as needed
                                    </tbody>

                                </table>
                            </div> 

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Prepared By</span>
                                        <p type="text" class="form-control" id="view_text_preparedby" name="preparedby" value="ProjectBased"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <span class="input-group-text text-light" style="background-color: DodgerBlue">Noted By</span>
                                        <p type="text" class="form-control" id="view_text_notedby" name="notedby" list="notedby" placeholder="Noted by" required></p>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <form method="POST" action="pdf.php" id="formGeneratePDF">
                                    HIDDEN DOCNO
                                    <input type="hidden" id="hidden_docno" name="hidden_docno">
                                    <input type="submit" class="btn btn-warning float-start pdf" id="pdf" name="pdf" value="Generate PDF">
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                            </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</div>

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

    let handler = "./handler/handler.php";
    let today = new Date().toISOString().split('T')[0];
    $('#text_date_now').val(today);

    $('#skill_card').each(function() {
            if (this.href === window.location.href) {
                $(this).addClass('active');
                $('#skill_card_section').removeClass('d-none');
                $('#headerTitle').text('QC Stamp / Skill Card');
                $('#url_title').text('QC Stamp / Skill Card');
            }
            else {
                $(this).removeClass('active');

            }
        });

    let (blank) = $('#').DataTable({
        "aaSorting"	 : [],
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "./server_side_scripts/(blank).php",
        "drawCallback": function( settings ) {
            $('#').attr('style','width:100%;');
        }
    });

    let (blank) = $('#').DataTable();

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

    fetchLastConNumber();

    // Initialize DataTable with export buttons
    let tblEndorsementDetails = $('#tbl_training_endorsement_details').DataTable();

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

                        // Manually trigger the change event after setting the value
                        $('#text_hr_memo').trigger('change');
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

        if (fkdocno) {  // Use fkdocno instead of ctrlno
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "get_docno_details",
                    "FKDocNo": fkdocno
                },
                dataType: "json",
                success: function (response) {
                    tblEndorsementDetails.clear().draw();

                    if (response.length > 0) {
                        $.each(response, function (index, value) {
                            let addButton = '<center><button class="btn btn-info fa-solid fa-pen-to-square btn_view" style="color:white" data-empno="' + value.fkEmpNo + '"></button></center>';

                            tblEndorsementDetails.row.add([
                                value.fkdate_hired,
                                value.fkEmpNo,
                                value.fkfullname,
                                value.fkpds,
                                value.fktitle,
                                value.fkremarks,
                                addButton
                            ]).draw(false);
                        });
                    } else {
                        alert('No details found for the selected fkdocno.');
                    }
                },
                error: function () {
                    alert('Error fetching document details.');
                }
            });
        }
    });

    $('#formSubmitTrainEndo').submit(function (e) { 
        e.preventDefault();

        let TREData = [];

        // Retrieve field values
        let TE_to = $('#selectedValues').val();
        let TE_tr_ctrl = $('#text_tr_ctrl').val();
        let TE_attn = $('#selectedAttnValues').val();
        let TE_hr_memo = $('#text_hr_memo').val();
        let TE_subject = $('#text_subject').val();
        let TE_preparedby = $('#text_preparedby').val();
        let TE_notedby = $('#text_notedby').val();

        // Validation check for required fields
        if (!TE_to || !TE_tr_ctrl || !TE_attn || !TE_hr_memo || !TE_subject || !TE_preparedby || !TE_notedby) {
            alert('Please fill up all required fields!');
            return false;
        }

        // Check if the table contains any data
        if (!tblEndorsementDetails.data().any()) {
            alert('Please add at least one trainee to the table!');
            return false;
        }

        // Check if there are any visible rows (rows not filtered out)
        let visibleRows = tblEndorsementDetails.rows({ filter: 'applied' }).data().length;
        if (visibleRows === 0) {
            alert('Please add at least one visible trainee to the table!');
            return false;
        }

        // Collect data from visible table rows
        tblEndorsementDetails.rows({ filter: 'applied' }).every(function () {
            let TRRowData = this.data();
            TREData.push({
                fkdate_hired: TRRowData[0].trim(),
                fkEmpNo: TRRowData[1].trim(),
                fkfullname: TRRowData[2].trim(),
                fkpds: TRRowData[3].trim(),
                fktitle: TRRowData[4].trim(),
                fkremarks: TRRowData[5].trim()
            });
        });

        // Prepare data for AJAX submission
        let submitTrainingEndorsement = {
            "action": "add_training_endorsement",
            "rows": TREData
        };
        submitTrainingEndorsement = $.param(submitTrainingEndorsement) + "&" + $('#formSubmitTrainEndo').serialize();

        // AJAX request to submit the data
        $.ajax({
            type: "POST",
            url: handler,
            data: submitTrainingEndorsement,
            dataType: "json",
            success: function (response) {
                // Reset form and provide feedback
                // $('#formSubmitTrainEndo')[0].reset();
                $('#selectedValues').val('');
                $('#text_tr_ctrl').val('');
                $('#selectedAttnValues').val('');
                $('#text_hr_memo').val('');
                $('#text_subject').val('');
                $('#text_notedby').val('');

                $('#selectedAttnOptions').empty();
                $('#selectedOptions').empty();

                $('#modalCreateTREndo').modal('hide');
                tblEndorsementDetails.clear().draw();  // Clear table data
                dataTableTrainingEndorsement.draw();
                fetchLastConNumber();
                toastr.success('Successfully added!');

            },
            error: function(xhr, status, error) {
                console.error('Error on submit:', status, error);
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
    let view_endo_notedby = $(this).data('endo_notedby');
    
        // Set the values in the modal or form
        $('#hidden_docno').val(view_endorsement_docno);
        $('#view_text_docno').text(view_endorsement_docno);
        $('#view_text_to').text(view_endo_to);
        $('#view_text_tr_ctrl').text(view_endo_tr_ctrlno);
        $('#view_text_attn').text(view_endo_attn);
        $('#view_text_hr_memo').text(view_endo_hr_memo);
        $('#view_text_subject').text(view_endo_subject);
        $('#view_text_date_now').text(view_endo_date_now);
        $('#view_text_preparedby').text(view_endo_preparedby);
        $('#view_text_notedby').text(view_endo_notedby);

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
        tblEndorsementDetails.clear().draw();
    }
    });

    let selectedOptions = [];

    $('#text_to').on('input', function() {
        const value = $(this).val().trim();

        // Check if the value is non-empty
        if (value) {
            // Check if the value is already selected
            if (selectedOptions.includes(value)) {
                // If it's already selected, remove it from the array
                removeOption(value);
            } else {
                // If it's not selected, add it to the array
                selectedOptions.push(value);
            }

            // Clear the input field so the user can select another option
            $('#text_to').val('');

            // Update the hidden input field with the selected values
            $('#selectedValues').val(selectedOptions.join(', '));

            // Display the selected options as tags
            renderSelectedOptions();
        }
    });

    // Function to render the selected options as tags
    function renderSelectedOptions() {
        $('#selectedOptions').find('span').remove(); // Clear existing tags, but keep the input

        selectedOptions.forEach(function(option) {
            // Create a tag for each selected option
            const tag = $('<span>').addClass('badge bg-primary me-1').text(option);

            // Add a remove button to the tag
            const removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function() {
                removeOption(option);
            });

            // Append the remove button to the tag
            tag.append(removeBtn);

            // Append the tag to the selectedOptions container before the input field
            $('#selectedOptions').prepend(tag);
        });
    }

    // Function to remove a selected option
    function removeOption(option) {
        // Remove the option from the array
        selectedOptions = selectedOptions.filter(function(item) {
            return item !== option;
        });

        // Update the hidden input field
        $('#selectedValues').val(selectedOptions.join(', '));

        // Re-render the selected options
        renderSelectedOptions();
    }

    // GETTING "TO" FROM tbl_useraccnt
    let to = {
            "action": "get_to",
        }
        to = $.param(to) + "&" + $('#text_to').serialize();

        $.ajax({
        type: "POST",
        url: handler,
        
        data: to,
        dataType: "json",
        success: function (response) {
            let dataList = $('#to');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    let selectedAttnOptions = [];

    $('#text_attn').on('input', function() {
        const value = $(this).val().trim();

        // Check if the value is non-empty
        if (value) {
            // Check if the value is already selected
            if (selectedAttnOptions.includes(value)) {
                // If it's already selected, remove it from the array
                removeAttnOption(value);
            } else {
                // If it's not selected, add it to the array
                selectedAttnOptions.push(value);
            }

            // Clear the input field so the user can select another option
            $('#text_attn').val('');

            // Update the hidden input field with the selected values
            $('#selectedAttnValues').val(selectedAttnOptions.join(', '));

            // Display the selected options as tags
            renderSelectedAttnOptions();
        }
    });

    // Function to render the selected options as tags
    function renderSelectedAttnOptions() {
        $('#selectedAttnOptions').find('span').remove(); // Clear existing tags, but keep the input

        selectedAttnOptions.forEach(function(option) {
            // Create a tag for each selected option
            const tag = $('<span>').addClass('badge bg-primary me-1').text(option);

            // Add a remove button to the tag
            const removeBtn = $('<span>').html(' &times;').css('cursor', 'pointer').on('click', function() {
                removeAttnOption(option);
            });

            // Append the remove button to the tag
            tag.append(removeBtn);

            // Append the tag to the selectedAttnOptions container before the input field
            $('#selectedAttnOptions').prepend(tag);
        });
    }

    // Function to remove a selected option
    function removeAttnOption(option) {
        // Remove the option from the array
        selectedAttnOptions = selectedAttnOptions.filter(function(item) {
            return item !== option;
        });

        // Update the hidden input field
        $('#selectedAttnValues').val(selectedAttnOptions.join(', '));

        // Re-render the selected options
        renderSelectedAttnOptions();
    }

    let attn = {
            "action": "get_to",
        }
        attn = $.param(attn) + "&" + $('#text_attn').serialize();

        $.ajax({
        type: "POST",
        url: handler,
        
        data: attn,
        dataType: "json",
        success: function (response) {
            let dataList = $('#list_attn');
            dataList.empty();
            $.each(response, function(index, value) {
                dataList.append('<option value="' + value + '"></option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

    // GETTING "NOTED BY" FROM vw_employee
    let notedby = {
            "action": "get_noted_by",
        }
        notedby = $.param(notedby) + "&" + $('#textNotedBy').serialize();

        $.ajax({
        type: "POST",
        url: handler,
        
        data: notedby,
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

});

</script>   