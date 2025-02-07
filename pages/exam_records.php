<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section id="records_tab" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                </div>
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="" role="tabpanel">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <h3 class="fw-bold text-secondary mb-4">Exam Records</h3>
                                                </div>

                                                <!-- <div class="table-responsive mt-3 mb-3">
                                                    <table id="tbl_exams" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <th>Action</th>
                                                                <th>Revision No.</th>
                                                                <th>Exam Name</th>
                                                                <th>Purpose</th>
                                                                <th>Department</th>
                                                                <th>Position</th>
                                                                <th>Product Line</th>
                                                                <th>Passing Score</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div> -->

                                                <!-- 1/27/25 start -->
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="newly-hired-tab" data-bs-toggle="tab" data-bs-target="#newly" type="button" role="tab" aria-selected="true">
                                                            Newly Hired List of Exam Records
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="recert-tab" data-bs-toggle="tab" data-bs-target="#recert" type="button" role="tab" aria-selected="false">
                                                            Re-Certification List of Exam Records
                                                        </button>
                                                    </li>
                                                </ul>

                                                <div class="tab-content" id="myTabContent">
                                                    <!-- For Newly Hired Tab -->
                                                    <div class="tab-pane fade show active" id="newly" role="tabpanel" aria-labelledby="for-checking-tab">
                                                        <div class="card shadow-sm border-0">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                                    <h6 class="text-secondary" id="exam_label"></h6>
                                                                    <!-- <button class="btn btn-primary"><i class="fa fa-plus me-2"></i> Add New</button> -->
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table id="tbl_newly" class="table table-striped table-hover table-bordered nowrap" style="width: 100%;">
                                                                        <thead class="table-primary">
                                                                            <tr>
                                                                            <th>Action</th>
                                                                            <th>Revision No.</th>
                                                                            <th>Exam Name</th>
                                                                            <th>Purpose</th>
                                                                            <th>Department</th>
                                                                            <th>Position</th>
                                                                            <th>Product Line</th>
                                                                            <th>Passing Score</th>
                                                                            <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td colspan="7" class="text-center">No data available</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- ReCertification Tab -->
                                                    <div class="tab-pane fade" id="recert" role="tabpanel" aria-labelledby="checked-tab">
                                                        <div class="card shadow-sm border-0">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                                    <h6 class="text-secondary" id="c_exam_label"></h6>
                                                                    <!-- Add Button (Optional) -->
                                                                    <!-- <button class="btn btn-primary"><i class="fa fa-plus me-2"></i> Add New</button> -->
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table id="tbl_recert" class="table table-striped table-hover table-bordered nowrap" style="width: 100%;">
                                                                        <thead class="table-primary">
                                                                            <tr>
                                                                            <th>Action</th>
                                                                            <th>Revision No.</th>
                                                                            <th>Exam Name</th>
                                                                            <th>Purpose</th>
                                                                            <th>Department</th>
                                                                            <th>Position</th>
                                                                            <th>Product Line</th>
                                                                            <th>Passing Score</th>
                                                                            <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td colspan="7" class="text-center">No data available</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                            <!-- end -->
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
</div>

<script type="text/javascript">
    $(document).ready(function () {

    // script when clicking a nav-link
    $('#check_exam').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active');
            $('#theo_exam_menu').addClass('active');
            $('#theo_exam_menu').css({
                'background': '#494E53',
                'outline': 'none'
            });
            $('#records_tab').removeClass('d-none');
            $('#headerTitle').text('Exam Records');
            $('#url_title').text('Theoretical Examination');
        }
        else {
            $(this).removeClass('active');
        }
    });

    let handler = "./handler/handler.php";

    // datatables
    // let tbl_exam= $('#tbl_exams').DataTable({
    //     "aaSorting"	 : [],
    //     "bProcessing": true,
    //     "bServerSide": true,
    //     "sAjaxSource": "./server_side_scripts/exam_records.php",
    //     "drawCallback": function( settings ) {
    //         $('#tbl_exams').attr('style','width:100%;');
    //     },
    //     // Set the default number of entries to "All"
    //     "pageLength": -1,
    //     // Configure the length menu to include "All"
    //     "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
    // });

        // 1/27/2025
    function initializeDataTable(tableId, status) {
        return $(tableId).DataTable({
            "aaSorting": [],
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "./server_side_scripts/exam_records.php",
            "fnServerParams": function (aoData) {
                aoData.push({ "name": "status", "value": status });
            },
            "drawCallback": function (settings) {
                $(tableId).attr('style', 'width:100%;');

                // Apply inline styles to the 4th column (Exam Title)
                $(tableId + ' tbody tr td:nth-child(3), ' + tableId + ' tbody tr td:nth-child(4)').each(function () {
                    $(this).attr('style', 'max-width: 220px; word-wrap: break-word; white-space: normal; overflow-wrap: break-word;');
                });
            },
            // Set the default number of entries to "All"
            "pageLength": -1,
            // Configure the length menu to include "All"
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
        });
    }

    // Initialize DataTables for different statuses
    let tblNewly = initializeDataTable('#tbl_newly', 0);
    let tblRecert = initializeDataTable('#tbl_recert', 1);

    // Deleting of Exam
    $(document).on('click', '.btn_exam_record_delete', function () {
        let exam_record = $(this).data('pkid');
        // console.log(exam_record);

        if (confirm("Are you sure you want to delete this Exam record?")) {
            $.ajax({
                type: "POST",
                url: handler,
                data: {
                    "action": "delete_exam_record",
                    "pkid": exam_record
                },
                dataType: "json",
                success: function (response) {
                    if (response.result) {
                        alert("Successfully deleted the Exam record");
                        tbl_exam.draw();
                    } else {
                        alert("Error deleting the Exam Record.");
                    }
                },
                error: function () {
                    alert("An error occurred while deleting the Exam.");
                }
            });
        }
    });

    // // Getting of pkid of Exam to another page
    // $(document).on('click', '.btn_exam_list', function () {

    //     let edit_pkid = $(this).data('pkid');
    //     console.log(edit_pkid);
    //     // let edit_rev_no = $(this).data('rev_no');
    //     // let edit_description = $(this).data('description');
    //     // let edit_remarks = $(this).data('remarks');
    //     // let edit_passing_score = $(this).data('passing_score');

    //     console.log(edit_pkid);

    //     // Set the values in the modal or form
    //     $('#text_question_pkid').val(edit_pkid);
    //     // $('#text_modify_revision_no').val(edit_rev_no);
    //     // $('#text_modify_description').val(edit_description);
    //     // $('#text_modify_exam_remarks').val(edit_remarks);
    //     // $('#text_modify_passing_score').val(edit_passing_score);

    // });
});

</script> 