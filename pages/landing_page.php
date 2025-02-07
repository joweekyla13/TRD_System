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

        <section id="dashboard_section" class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="card"> -->
                            <div class="card-body">

                                 <div class="tab-content" id="myTabContent">
                                    <!-- Request Tab Content -->
                                    <!-- <div class="tab-pane fade show active" id="requestTab" role="tabpanel"> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mt-1">
                                                            <!-- <h3 class="fw-bold text-secondary">Dashboard</h3> -->
                                                            <br><br><br>

                                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                                <img src="images/training_course_icon.png" class="img-fluid mb-4" style="max-width: 200px;">
                                                                <h4 class="text-center">You are not authorized to access this system.</h4>
                                                                <h5 class="text-center text-secondary">Please try to log in to your RAPID account again.</h5>
                                                                <a class="btn btn-info mb-3" href="http://rapid/" >Login</a>
                                                            </div>
                                                             
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- </div> -->

                                 </div>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

    $('#dashboard').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active');
            // $('#dashboard_section').removeClass('d-none');
            $('#headerTitle').text('Training Record Database System');
            $('#url_title').text('Training Record Database System');
        }
        else {
            $(this).removeClass('active');
        }
    });

});

</script>   