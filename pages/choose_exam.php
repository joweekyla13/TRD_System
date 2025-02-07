<!--Affix Scripts/CSS here-->
<?php
require_once('./libraries/includes.php');
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section id="choose_exam_tab" class="content d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <?php

                        session_start();

                        if (isset($_GET['category'])) {
                            $_SESSION['get_category'] = $_GET['category'];
                        } else {
                            $_SESSION['get_category'] = '';
                        }
                        ?>

                        <input type="hidden" name="categ" id="text_categ" value="<?php echo htmlspecialchars($_SESSION['get_category']); ?>">
                    </div>

                    <div class="col-md-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mt-3">
                                            <div class="card-body mb-4">
                                                <h3 class="fw-bold text-secondary text-center">Theoretical Examination</h3>
                                                <h5 class="fw-bold text-secondary text-center">Please select the title of exam</h5>

                                                <div id="exam_cards_container">

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
        
        // $('#choose_exam').each(function() {
            // if (this.href === window.location.href) {
            if (window.location.href.indexOf('choose_exam.php') > -1) {
                $('#choose_exam').addClass('active');
                $('#theo_exam_menu').addClass('active');
                $('#theo_exam_menu').css({
                    'background': '#494E53',
                    'outline': 'none'
                });
                $('#choose_exam_tab').removeClass('d-none');
                $('#headerTitle').text('Theoretical Examination');
                $('#url_title').text('Theoretical Examination');
            }
            else {
                $(this).removeClass('active');
            }
        // });

        let handler = "./handler/handler.php";

        category = $('#text_categ').val();


        let get_exam_div = {
            "action": "display_exam",
            category: category
        }

        $.ajax({
            type: "POST",
            url: handler,
            data: get_exam_div,
            dataType: "json",
            success: function(response) {
                console.log(response);

                $('#exam_cards_container').empty();

                // Initialize a variable to keep track of the card count in the current row
                let currentRow = $('<div class="row"></div>');
                let cardCount = 0;

                $.each(response, function(index, value) {
                    console.log(value);

                    let examPage = value.category == 0 ? "examination.php" : "recertification_exam.php";

                    let titleDiv = `
                        <div class="col-md-4 mt-4">
                            <div class="card elevation-3" style="height: 360px; display: flex; flex-direction: column;">
                                <!-- Card Body -->
                                <div class="card-body text-center" style="flex: 1; overflow: hidden;">
                                    <h5 class="fw-semibold mb-3" style="font-size: 1.1rem; max-height: 6rem; overflow-wrap: break-word;">${value.exam_title}</h5>
                                    <h6 class="text-secondary mb-3"> for </h6>
                                    <h5 class="fw-semibold mb-4" style="font-size: 1rem; max-height: 3rem; overflow-wrap: break-word;">${value.exam_position}</h5>
                                </div>

                                <!-- Footer Section (Always at the Bottom) -->
                                <div style="padding: 10px; flex-shrink: 0;">
                                    <h6 class="text-start fw-normal" style="font-size: 0.9rem;">
                                        <span class="fw-semibold">Purpose:</span> ${value.exam_purpose}
                                    </h6>
                                    <h6 class="text-start fw-normal" style="font-size: 0.9rem;">
                                        <span class="fw-semibold">Department:</span> ${value.exam_department}
                                    </h6>
                                    <h6 class="text-start fw-normal mb-3" style="font-size: 0.9rem;">
                                        <span class="fw-semibold">Product Line:</span> ${value.exam_productLine}
                                    </h6>
                                    <a class="btn btn-primary fs-5 w-100" href="index.php?page=${examPage}&pkid=${value.pkid}&purpose=${value.exam_purpose}&position=${value.exam_position}&passing_score=${value.exam_passing_score}">Take Exam</a>
                                </div>
                            </div>
                        </div>
                    `;

                    // Append the card to the current row
                    currentRow.append(titleDiv);
                    cardCount++;

                    // Check if we have reached 3 cards in the current row
                    if (cardCount === 3) {
                        $('#exam_cards_container').append(currentRow);
                        currentRow = $('<div class="row"></div>');
                        cardCount = 0;
                    }
                });

                // If there are any remaining cards in the last row that didn't make it to 3
                if (cardCount > 0) {
                    $('#exam_cards_container').append(currentRow);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: " + textStatus, errorThrown); // Log AJAX errors
            }
        });
    });
</script>   