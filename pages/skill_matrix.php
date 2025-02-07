<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">

        <section id="matrix_tab" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <!-- Content for the row can go here -->
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="" role="tabpanel">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
                                            <!-- <h3 class="fw-bold text-secondary">Employee's Skill Matrix</h3> -->
                                        </div>

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="direct-tab" data-bs-toggle="tab" data-bs-target="#direct" type="button" role="tab" aria-selected="true">
                                                    Direct Employees
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="subcon-tab" data-bs-toggle="tab" data-bs-target="#subcon" type="button" role="tab" aria-selected="false">
                                                    Subcon Employees
                                                </button>
                                            </li>
                                        </ul>

                                            <div class="tab-content" id="myTabContent">
                                                <!-- For Direct Tab -->
                                                <div class="tab-pane fade show active" id="direct" role="tabpanel" aria-labelledby="for-checking-tab">
                                                    <div class="card shadow-sm border-0">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                                <h6 class="text-secondary" id="exam_label"></h6>
                                                                <a href="index.php?page=direct_skill_matrix.php" class="btn btn-primary float-end" title="Click to generate skill matrix">
                                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Generate Skill Matrix
                                                                </a>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table id="tbl_direct" class="table table-striped table-hover table-bordered nowrap" style="width: 100%;">
                                                                    <thead class="table-primary text-center">
                                                                        <tr>
                                                                        <th>Action</th>
                                                                        <th>E.N.</th>
                                                                        <th>Name</th>
                                                                        <th>Date Hired</th>
                                                                        <th>Position</th>
                                                                        <th>Section</th>
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

                                                <!-- Subcon Tab -->
                                                <div class="tab-pane fade" id="subcon" role="tabpanel" aria-labelledby="checked-tab">
                                                    <div class="card shadow-sm border-0">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                                <h6 class="text-secondary" id="c_exam_label"></h6>
                                                                <a href="index.php?page=subcon_skill_matrix.php" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#create_exam" title="Click to generate skill matrix">
                                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Generate Skill Matrix
                                                                </a>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table id="tbl_subcon" class="table table-striped table-hover table-bordered nowrap" style="width: 100%;">
                                                                    <thead class="table-primary text-center">
                                                                        <tr>
                                                                        <th>Action</th>
                                                                        <th>E.N.</th>
                                                                        <th>Name</th>
                                                                        <th>Date Hired</th>
                                                                        <th>Position</th>
                                                                        <th>Section</th>
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
        </section>
    </div>
</div>

<!-- Modal Editing Employee Details -->
<div class="modal fade" id="modify_emp_info_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-info">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Modify Employee Details</h1>
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="modify_exam_form" autocomplete="off">

                    <input type="hidden" name="pkid" id="text_pkid">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">E.N.</span>
                                <input class="form-control" type="text" id="text_employee_number" name="employee_number">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Name</span>
                                <input class="form-control" type="text" id="text_employee_name" name="employee_name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Position</span>
                                <input class="form-control" type="text" id="text_emp_position" name="emp_position">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Section</span>
                                <input class="form-control" type="text" id="text_emp_section" name="emp_section">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Date Hired</span>
                                <input class="form-control" type="date" id="text_date_hired" name="date_hired">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Date Certified</span>
                                <input class="form-control" type="date" id="text_date_certified" name="date_certified">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Validity Period</span>
                                <input class="form-control" type="date" id="text_val_period" name="val_period">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Total Ratings</span>
                                <input class="form-control" type="text" id="text_total_ratings" name="total_ratings">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 11%">Product Line</span>
                                <input class="form-control" type="text" id="text_product_line" name="product_line">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Station</span>
                                <!-- <input class="form-control" type="date" id="text_station" name="station"> -->
                                <select class="form-select" id="text_station" name="station">
                                    <option selected disabled value="0">Select Station</option>
                                    <option value="1">Full Assembly</option>
                                    <option value="2">Visual Inspection</option>
                                    <option value="3">Parts Preparation</option>
                                    <option value="4">Machine Station</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Insert Type</span>
                                <!-- <input class="form-control" type="text" id="text_insert_type" name="insert_type"> -->
                                <select class="form-select" id="text_insert_type" name="insert_type">
                                    <option selected disabled value="0">Select Insert Type</option>
                                    <option value="1">Manual</option>
                                    <option value="2">Auto</option>
                                </select>
                            </div>
                        </div>

                        <div class="card d-none" id="full_assembly_auto_card">
                            <div class="card-body">
                                <h3 class="text-center">FULL ASSEMBLY (AUTO INSERT TYPE)</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">Full Assembly</span>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="" name="" style="width: 100%;">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn btn-sm btn-success" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div> -->

                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-none" id="full_assembly_manual_card">
                            <div class="card-body">
                                <h3 class="text-center">FULL ASSEMBLY (MANUAL INSERT TYPE)</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-none" id="visual_ins_auto_card">
                            <div class="card-body">
                                <h3 class="text-center">VISUAL INSPECTION (AUTO INSERT TYPE)</h3>
                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-none" id="visual_ins_manual_card">
                            <div class="card-body">
                                <h3 class="text-center">VISUAL INSPECTION (MANUAL INSERT TYPE)</h3>
                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-none" id="parts_prep_auto_card">
                            <div class="card-body">
                                <h3 class="text-center">PARTS PREPARATION (AUTO INSERT TYPE)</h3>
                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-none" id="parts_prep_manual_card">
                            <div class="card-body">
                                <h3 class="text-center">PARTS PREPARATION (MANUAL INSERT TYPE)</h3>
                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-none" id="machine_station_auto_card">
                            <div class="card-body">
                                <h3 class="text-center">MACHINE STATION (AUTO INSERT TYPE)</h3>
                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card d-none" id="machine_station_manual_card">
                            <div class="card-body">
                                <h3 class="text-center">MACHINE STATION (MANUAL INSERT TYPE)</h3>
                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="LB_cont">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="full_assy_cont">

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group mb-4 mt-4" style="flex-direction: column; align-items: center; width: 100%;">
                                            <span class="input-group-text text-light" style="background-color: DodgerBlue; width: 100%; height: 100px; display: flex; justify-content: center; align-items: center; text-align: center;">
                                                Full Assembly
                                            </span>
                                            <div class="input-group mb-3">
                                                <select class="form-select">
                                                    <option selected disabled value="0">Select Series</option>
                                                    <option value="NP645">NP645</option>
                                                    <option value="NP537">NP537</option>
                                                    <option value="NP635">NP635</option>
                                                    <option value="NP562">NP562</option>
                                                </select>
                                                <button type="button" class="btn text-light" style="background-color: #5499c7" id="add_series_btn">
                                                    <i class="fa fa-plus fa-md me-2" style="color: white"></i>Add
                                                </button>
                                            </div>
                                        </div>

                                        <div class="SP_Assy_cont">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" ><i class="fa-solid fa-file-import me-2" style="color: white"></i>SAVE CHANGES</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Viewing Employee Details -->
<div class="modal fade" id="view_emp_info_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header modal-info">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">View Employee Details</h1>
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="modify_exam_form" autocomplete="off">

                    <input type="hidden" name="pkid" id="text_vw_pkid">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">E.N.</span>
                                <input class="form-control" type="text" id="text_vw_employee_number" name="vw_employee_number" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Name</span>
                                <input class="form-control" type="text" id="text_vw_employee_name" name="vw_employee_name" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Position</span>
                                <input class="form-control" type="text" id="text_vw_emp_position" name="vw_emp_position" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Section</span>
                                <input class="form-control" type="text" id="text_vw_emp_section" name="vw_emp_section" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Date Hired</span>
                                <input class="form-control" type="date" id="text_vw_date_hired" name="vw_date_hired" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Date Certified</span>
                                <input class="form-control" type="date" id="text_vw_date_certified" name="vw_date_certified" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Validity Period</span>
                                <input class="form-control" type="date" id="text_vw_val_period" name="vw_val_period" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Total Ratings</span>
                                <input class="form-control" type="text" id="text_vw_total_ratings" name="vw_total_ratings" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 11%">Product Line</span>
                                <input class="form-control" type="text" id="text_vw_product_line" name="vw_product_line" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Station</span>
                                <input class="form-control" type="date" id="text_vw_station" name="vw_station" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Insert Type</span>
                                <input class="form-control" type="text" id="text_vw_insert_type" name="vw_insert_type" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Viewing and PDF Generation of Employee Details -->
<div class="modal fade" id="pdf_emp_info_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-info">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Skill Card Generate</h1>
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="modify_exam_form" autocomplete="off">

                    <input type="hidden" name="pkid" id="text_vw_pkid">

                    <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">E.N.</span>
                                <input class="form-control" type="text" id="text_pdf_employee_number" name="pdf_employee_number" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Name</span>
                                <input class="form-control" type="text" id="text_pdf_employee_name" name="pdf_employee_name" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Position</span>
                                <input class="form-control" type="text" id="text_pdf_emp_position" name="pdf_emp_position" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Section</span>
                                <input class="form-control" type="text" id="text_pdf_emp_section" name="pdf_emp_section" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Date Hired</span>
                                <input class="form-control" type="date" id="text_pdf_date_hired" name="pdf_date_hired" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-4">
                                <span class="input-group-text w-16.7 text-light" style="background-color: DodgerBlue; width: 22%">Date Certified</span>
                                <input class="form-control" type="date" id="text_pdf_date_certified" name="pdf_date_certified" readonly>
                            </div>
                        </div>
                    </div> -->
                </form>

                <!-- <div class="modal-footer"> -->
                    <!-- <button type="submit" class="btn btn-success" id="submit_result">SUBMIT</button> -->
                    <!-- <form method="POST" action="skill_card_pdf.php" id="formGeneratePDF" target="_blank"> -->
                    <form method="POST" action="skill_card_pdfL.php" id="formGeneratePDF" target="_blank">

                        <input type="hidden" name="employee_number" id="text_pdf_employee_number">
                        <input type="hidden" name="employee_firstname" id="text_pdf_employee_firstname">
                        <input type="hidden" name="employee_lastname" id="text_pdf_employee_lastname">
                        <input type="hidden" name="employee_middlename" id="text_pdf_employee_middlename">
                        <input type="hidden" name="employee_position" id="text_pdf_employee_position">
                        <input type="hidden" name="employee_date_hired" id="text_pdf_employee_date_hired">
                        <input type="hidden" name="employee_section" id="text_pdf_employee_section">

                        <div class="d-flex justify-content-center align-items-center">
                        <!-- <div class="d-flex justify-content-between align-items-center"> -->
                            <input type="submit" class="btn btn-warning float-start text-light pdf" id="pdf" name="pdf" value="Generate Skill Card">
                    </form>
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-2" style="color: white"></i>CLOSE</button> -->
                        </div>

                        
                    
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

    // script when clicking a nav-link
    $('#skill_card').each(function() {
        // if (this.href === window.location.href) {
        if (window.location.href.indexOf('skill_matrix.php') > -1) {
            // $(this).addClass('active');
            $('#skill_card').addClass('active');
            $('#matrix_tab').removeClass('d-none');
            $('#headerTitle').text('Employee\'s Skill Matrix');
            $('#url_title').text('Employee\'s Skill Matrix');
        }
        else {
            $(this).removeClass('active');
        }
    });

    let handler = "./handler/handler.php";

    let tbl_Direct= $('#tbl_direct').DataTable({
        "aaSorting"	 : [],
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "./server_side_scripts/direct_employees.php",
        "drawCallback": function( settings ) {
            $('#tbl_exams').attr('style','width:100%;');
        },
        // Set the default number of entries to "All"
        // "pageLength": -1,
        // // Configure the length menu to include "All"
        // "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
    });

    let tbl_Subcon= $('#tbl_subcon').DataTable({
        "aaSorting"	 : [],
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "./server_side_scripts/subcon_employees.php",
        "drawCallback": function( settings ) {
            $('#tbl_exams').attr('style','width:100%;');
        },
        // Set the default number of entries to "All"
        // "pageLength": -1,
        // // Configure the length menu to include "All"
        // "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
    });

    // CLEARS FORM WHEN MODAL IS CLOSED
    $('#create_exam').on('hidden.bs.modal', function () {
        var examForm = $('#create_exam_form');

        // $('#revision_div').addClass('d-none');
        // $('#category_div').addClass('d-none');
        examForm[0].reset();

    });

    // Adding new Exam
    $('#create_exam_form').submit(function (e) { 
        e.preventDefault();

        let allData = [];

        let category  = $('#text_category').val();
        // let revision_no = $('#text_revision_no').val();

        let exam_title = $('#text_title').val();
        let purpose = $('#text_purpose').val();
        let department = $('#text_department').val();
        let position = $('#text_position').val();
        let productLine = $('#text_prLine').val();
        let remarks =  $('#text_remarks').val();
        let passing_score = $('#text_passing_score').val();

        if (category == null || !exam_title || !purpose || !department || !position || !productLine || !remarks || passing_score == '0') {
            alert('Please fill up all required fields!');
            return false;
        }

        let data = {
            "action": "add_exam",
            "rows": allData
        };

        data = $.param(data) + "&" + $('#create_exam_form').serialize();

        $.ajax({
            type: "POST",
            url: handler,
            data: data,
            dataType: "json",
            success: function (response) {
                console.log('Response:', response);

                if (response.result.startsWith("Error")) {
                    alert(response.result); 
                } else {
                    alert('Exam Successfully Added!');
                    // toastr.success('Successfully Added!');

                    // $('#category_div').addClass('d-none');
                    $('#text_category').val(3);
                    // $('#revision_div').addClass('d-none');
                    // $('#text_revision_no').val('');
                    $('#text_title').val('');
                    $('#text_purpose').val('');
                    $('#text_department').val('');
                    $('#text_position').val('');
                    $('#text_prLine').val('');
                    $('#text_remarks').val('');
                    $('#text_passing_score').val('0');

                    $('#create_exam').modal('hide');

                    tbl_exam.draw();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("AJAX Error: " + textStatus);
            }
        });
        
    });

    // Modifying of Exam (ORIGINAL CODE)
    $('#modify_exam_form').submit(function (e) { 
        e.preventDefault();
        let pkid = $('#text_pkid').val();

        let category  = $('#text_modify_category').val();
        // let revision_no = $('#text_modify_revision_no').val();

        let title = $('#text_modify_title').val();
        let purpose = $('#text_modify_purpose').val();
        let department = $('#text_modify_department').val();
        let position = $('#text_modify_position').val();
        let prLine = $('#text_modify_prLine').val();
        let remarks =  $('#text_modify_exam_remarks').val();
        let passing_score = $('#text_modify_passing_score').val();

        // validation for input fields
        if (category == null || !title || !purpose || !department || !position || !prLine || !remarks || passing_score == '0') {
            alert('Please fill up all required fields!');
            return false;
        }

        let modifyExam = {
            "action": "modify_exam",
            "exam_pkid": pkid
        };
        modifyExam = $.param(modifyExam) + "&" + $('#modify_exam_form').serialize();
        $.ajax({
            type: 'POST',
            url: handler,
            data: modifyExam,
            dataType: "json",
            success: function (response) {
                console.log('Response:', response);

                if (response.result.startsWith("Error")) {
                    alert(response.result); 
                } else {

                    let m_pkid = $('#text_pkid').val();
                    let passing_score = $('#text_modify_passing_score').val();
                    console.log(m_pkid);

                    $.ajax({
                        type: "POST",
                        url: handler,
                        data: {
                            "action": "update_passing_score",
                            "modify_pkid": m_pkid,
                            "m_passing_score": passing_score
                        },
                        dataType: "json",
                        success: function (response) {
                            
                        }
                    });

                    alert('Exam updated successfully!');

                    // // Clear form and hide modal
                    // $('#modify_category_div').addClass('d-none');
                    $('#text_modify_category').val(3);
                    // $('#modify_revision_div').addClass('d-none');
                    // $('#text_modify_revision_no').val('');
                    $('#text_modify_title').val('');
                    $('#text_modify_purpose').val('');
                    $('#text_modify_department').val('');
                    $('#text_modify_position').val('');
                    $('#text_modify_prLine').val('');
                    $('#text_modify_exam_remarks').val('');
                    $('#text_modify_passing_score').val('0');
                    $('#text_pkid').val('');

                    $('#modify_exam_modal').modal('hide');
                    tbl_exam.draw();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("AJAX Error: " + textStatus);
            }
        });
    });

    // $(document).on('change', '#text_station, #text_insert_type' function () {
    //     if ($('#text_station').val() == '1' && $('#text_insert_type').val() == '1') {
    //         $('#full_assembly_auto_card').removeClass('d-none');
    //         $('#full_assembly_manual_card').addClass('d-none');
    //         $('#visual_ins_auto_card').addClass('d-none');
    //         $('#visual_ins_manual_card').addClass('d-none');
    //         $('#parts_prep_auto_card').addClass('d-none');
    //         $('#parts_prep_manual_card').addClass('d-none');
    //         $('#machine_station_auto_card').addClass('d-none');
    //         $('#machine_station_manual_card').addClass('d-none');
    //     } elseif ($('#text_station').val() == '1' && $('#text_insert_type').val() == '2') {
    //         $('#full_assembly_auto_card').addClass('d-none');
    //         $('#full_assembly_manual_card').removeClass('d-none');
    //         $('#visual_ins_auto_card').addClass('d-none');
    //         $('#visual_ins_manual_card').addClass('d-none');
    //         $('#parts_prep_auto_card').addClass('d-none');
    //         $('#parts_prep_manual_card').addClass('d-none');
    //         $('#machine_station_auto_card').addClass('d-none');
    //         $('#machine_station_manual_card').addClass('d-none');
    //     } elseif ($('#text_station').val() == '2' && $('#text_insert_type').val() == '1') {
    //         $('#full_assembly_auto_card').addClass('d-none');
    //         $('#full_assembly_manual_card').addClass('d-none');
    //         $('#visual_ins_auto_card').removeClass('d-none');
    //         $('#visual_ins_manual_card').addClass('d-none');
    //         $('#parts_prep_auto_card').addClass('d-none');
    //         $('#parts_prep_manual_card').addClass('d-none');
    //         $('#machine_station_auto_card').addClass('d-none');
    //         $('#machine_station_manual_card').addClass('d-none');
    //     } elseif ($('#text_station').val() == '2' && $('#text_insert_type').val() == '2') {
    //         $('#full_assembly_auto_card').addClass('d-none');
    //         $('#full_assembly_manual_card').addClass('d-none');
    //         $('#visual_ins_auto_card').addClass('d-none');
    //         $('#visual_ins_manual_card').removeClass('d-none');
    //         $('#parts_prep_auto_card').addClass('d-none');
    //         $('#parts_prep_manual_card').addClass('d-none');
    //         $('#machine_station_auto_card').addClass('d-none');
    //         $('#machine_station_manual_card').addClass('d-none');
    //     } elseif ($('#text_station').val() == '3' && $('#text_insert_type').val() == '1') {
    //         $('#full_assembly_auto_card').addClass('d-none');
    //         $('#full_assembly_manual_card').addClass('d-none');
    //         $('#visual_ins_auto_card').addClass('d-none');
    //         $('#visual_ins_manual_card').addClass('d-none');
    //         $('#parts_prep_auto_card').removeClass('d-none');
    //         $('#parts_prep_manual_card').addClass('d-none');
    //         $('#machine_station_auto_card').addClass('d-none');
    //         $('#machine_station_manual_card').addClass('d-none');
    //     } elseif ($('#text_station').val() == '3' && $('#text_insert_type').val() == '2') {
    //         $('#full_assembly_auto_card').addClass('d-none');
    //         $('#full_assembly_manual_card').addClass('d-none');
    //         $('#visual_ins_auto_card').addClass('d-none');
    //         $('#visual_ins_manual_card').addClass('d-none');
    //         $('#parts_prep_auto_card').addClass('d-none');
    //         $('#parts_prep_manual_card').removeClass('d-none');
    //         $('#machine_station_auto_card').addClass('d-none');
    //         $('#machine_station_manual_card').addClass('d-none');
    //     } elseif ($('#text_station').val() == '4' && $('#text_insert_type').val() == '1') {
    //         $('#full_assembly_auto_card').addClass('d-none');
    //         $('#full_assembly_manual_card').addClass('d-none');
    //         $('#visual_ins_auto_card').addClass('d-none');
    //         $('#visual_ins_manual_card').addClass('d-none');
    //         $('#parts_prep_auto_card').addClass('d-none');
    //         $('#parts_prep_manual_card').addClass('d-none');
    //         $('#machine_station_auto_card').removeClass('d-none');
    //         $('#machine_station_manual_card').addClass('d-none');
    //     } elseif ($('#text_station').val() == '4' && $('#text_insert_type').val() == '2') {
    //         $('#full_assembly_auto_card').addClass('d-none');
    //         $('#full_assembly_manual_card').addClass('d-none');
    //         $('#visual_ins_auto_card').addClass('d-none');
    //         $('#visual_ins_manual_card').addClass('d-none');
    //         $('#parts_prep_auto_card').addClass('d-none');
    //         $('#parts_prep_manual_card').addClass('d-none');
    //         $('#machine_station_auto_card').addClass('d-none');
    //         $('#machine_station_manual_card').removeClass('d-none');
    //     }
    // });

    $(document).on('change', '#text_station, #text_insert_type', function () { // Corrected syntax
        if ($('#text_station').val() == '1' && $('#text_insert_type').val() == '2') {
            $('#full_assembly_auto_card').removeClass('d-none');
            $('#full_assembly_manual_card, #visual_ins_auto_card, #visual_ins_manual_card, #parts_prep_auto_card, #parts_prep_manual_card, #machine_station_auto_card, #machine_station_manual_card').addClass('d-none');
        } else if ($('#text_station').val() == '1' && $('#text_insert_type').val() == '1') {
            $('#full_assembly_manual_card').removeClass('d-none');
            $('#full_assembly_auto_card, #visual_ins_auto_card, #visual_ins_manual_card, #parts_prep_auto_card, #parts_prep_manual_card, #machine_station_auto_card, #machine_station_manual_card').addClass('d-none');
        } else if ($('#text_station').val() == '2' && $('#text_insert_type').val() == '2') {
            $('#visual_ins_auto_card').removeClass('d-none');
            $('#full_assembly_auto_card, #full_assembly_manual_card, #visual_ins_manual_card, #parts_prep_auto_card, #parts_prep_manual_card, #machine_station_auto_card, #machine_station_manual_card').addClass('d-none');
        } else if ($('#text_station').val() == '2' && $('#text_insert_type').val() == '1') {
            $('#visual_ins_manual_card').removeClass('d-none');
            $('#full_assembly_auto_card, #full_assembly_manual_card, #visual_ins_auto_card, #parts_prep_auto_card, #parts_prep_manual_card, #machine_station_auto_card, #machine_station_manual_card').addClass('d-none');
        } else if ($('#text_station').val() == '3' && $('#text_insert_type').val() == '2') {
            $('#parts_prep_auto_card').removeClass('d-none');
            $('#full_assembly_auto_card, #full_assembly_manual_card, #visual_ins_auto_card, #visual_ins_manual_card, #parts_prep_manual_card, #machine_station_auto_card, #machine_station_manual_card').addClass('d-none');
        } else if ($('#text_station').val() == '3' && $('#text_insert_type').val() == '1') {
            $('#parts_prep_manual_card').removeClass('d-none');
            $('#full_assembly_auto_card, #full_assembly_manual_card, #visual_ins_auto_card, #visual_ins_manual_card, #parts_prep_auto_card, #machine_station_auto_card, #machine_station_manual_card').addClass('d-none');
        } else if ($('#text_station').val() == '4' && $('#text_insert_type').val() == '2') {
            $('#machine_station_auto_card').removeClass('d-none');
            $('#full_assembly_auto_card, #full_assembly_manual_card, #visual_ins_auto_card, #visual_ins_manual_card, #parts_prep_auto_card, #parts_prep_manual_card, #machine_station_manual_card').addClass('d-none');
        } else if ($('#text_station').val() == '4' && $('#text_insert_type').val() == '1') {
            $('#machine_station_manual_card').removeClass('d-none');
            $('#full_assembly_auto_card, #full_assembly_manual_card, #visual_ins_auto_card, #visual_ins_manual_card, #parts_prep_auto_card, #parts_prep_manual_card, #machine_station_auto_card').addClass('d-none');
        }
    });

    $(document).on('click', '.btn_modify_emp_info', function () {

        let get_pkid = $(this).data('pkid');
        let get_employee_number = $(this).data('employee_number');
        
        let get_employee_fname = $(this).data('employee_firstname');
        let get_employee_lname = $(this).data('employee_lastname');
        let get_employee_mname = $(this).data('employee_middlename');

        let formatted_mname = get_employee_mname ? get_employee_mname.charAt(0) + '.' : '';

        let employee_name = get_employee_fname + ' ' + formatted_mname + ' ' + get_employee_lname;

        let get_position = $(this).data('employee_position');
        let get_date_hired = $(this).data('employee_date_hired');
        let get_section = $(this).data('employee_section');
        // alert('working');

        $('#text_pkid').val(get_pkid);
        $('#text_employee_number').val(get_employee_number);
        $('#text_employee_name').val(employee_name);
        $('#text_emp_position').val(get_position);
        $('#text_emp_section').val(get_section);
        $('#text_date_hired').val(get_date_hired);

    });

    $(document).on('click', '.btn_view_emp_info', function () {

        let get_pkid = $(this).data('pkid');
        let get_employee_number = $(this).data('employee_number');

        let get_employee_fname = $(this).data('employee_firstname');
        let get_employee_lname = $(this).data('employee_lastname');
        let get_employee_mname = $(this).data('employee_middlename');

        let formatted_mname = get_employee_mname ? get_employee_mname.charAt(0) + '.' : '';

        let employee_name = get_employee_fname + ' ' + formatted_mname + ' ' + get_employee_lname;

        let get_position = $(this).data('employee_position');
        let get_date_hired = $(this).data('employee_date_hired');
        let get_section = $(this).data('employee_section');
        // alert('working');

        $('#text_vw_pkid').val(get_pkid);
        $('#text_vw_employee_number').val(get_employee_number);
        $('#text_vw_employee_name').val(employee_name);
        $('#text_vw_emp_position').val(get_position);
        $('#text_vw_emp_section').val(get_section);
        $('#text_vw_date_hired').val(get_date_hired);

    });

    $(document).on('click', '.btn_create_skill_card', function () {

        // let get_pkid = $(this).data('pkid');
        let get_employee_number = $(this).data('employee_number');
        let get_employee_fname = $(this).data('employee_firstname');
        let get_employee_lname = $(this).data('employee_lastname');
        let get_employee_mname = $(this).data('employee_middlename');

        let formatted_mname = get_employee_mname ? get_employee_mname.charAt(0) + '.' : '';

        let employee_name = get_employee_fname + ' ' + formatted_mname + ' ' + get_employee_lname;

        let get_position = $(this).data('employee_position');
        let get_date_hired = $(this).data('employee_date_hired');
        let get_section = $(this).data('employee_section');

        $('#text_pdf_employee_number').val(get_employee_number);
        $('#text_pdf_employee_name').val(employee_name);
        $('#text_pdf_emp_position').val(get_position);
        $('#text_pdf_emp_section').val(get_section);
        $('#text_pdf_date_hired').val(get_date_hired);

        // FOR PDF GENERATION
        $('#text_pdf_employee_number').val(get_employee_number);
        $('#text_pdf_employee_firstname').val(get_employee_fname);
        $('#text_pdf_employee_lastname').val(get_employee_lname);
        $('#text_pdf_employee_middlename').val(get_employee_mname);
        $('#text_pdf_employee_position').val(get_section);
        $('#text_pdf_employee_date_hired').val(get_date_hired);
        $('#text_pdf_employee_section').val(get_section);

        // let skill_card_data = {
        //     // pkid: $(this).data('pkid'),
        //     employee_number: $(this).data('employee_number'),
        //     employee_firstname: $(this).data('employee_firstname'),
        //     employee_lastname: $(this).data('employee_lastname'),
        //     employee_middlename: $(this).data('employee_middlename'),
        //     employee_position: $(this).data('employee_position'),
        //     employee_date_hired: $(this).data('employee_date_hired'),
        //     employee_section: $(this).data('employee_section')
        // };

        // // Send the data to the server via AJAX
        // $.ajax({
        //     url: 'skill_card_pdf.php',
        //     type: 'POST',
        //     data: skill_card_data,
        //     success: function(response) {
        //         // Assuming the server returns a URL to the generated PDF
        //         window.open(response, '_blank');
        //         // window.open(response.pdf_url, '_blank');
        //     },
        //     error: function(xhr, status, error) {
        //         alert('An error occurred while generating the PDF.');
        //     }
        // });

    });
});

</script> 