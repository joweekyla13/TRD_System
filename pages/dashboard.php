<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">
        <!-- <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-12">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </section> -->

        <section id="dashboard_section" class="content-header" style="height: 100%; width: 100%">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <div class="card-body">

                                 <div class="tab-content" id="myTabContent">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mt-1 mb-5">
                                                            <br><br><br>

                                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                                <img src="images/training_course_icon.png" class="img-fluid mb-5" style="max-width: 200px;">
                                                                <h4 class="text-center mb-5">Welcome to Training Record Database System!</h4>
                                                                <h5 class="text-center text-secondary mb-3">This system provides data processing for production training request.</h5>
                                                                <h5 class="text-center text-secondary">Kindly ask admins to give you access on other modules.</h5>
                                                                <h5 class="text-center text-secondary">Thank you!</h5>


                                                                <!-- <a class="btn btn-info mb-3" href="index.php?page=user.php" >Proceed</a> -->
                                                            </div>
                                                             
                                                        </div>

                                                    </div>
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