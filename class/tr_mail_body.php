<?php
    session_start();

    // Retrieve session values (if any)
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'USER';

    echo "Good day!" . "<br>". "<br>". "<br>";
    echo "This is to inform you that a new Training Request has been submitted to the TRD System by user: $username. We kindly request you to review and approve the details at your earliest convenience." . "<br>". "<br>";
    echo "To access the training request, please log in to the TRD System and navigate to the relevant section. Ensure that all necessary actions or approvals are completed in a timely manner to maintain workflow efficiency." . "<br>". "<br>";
    echo "Thank you for your prompt attention to this matter.". "<br>". "<br>". "<br>";
    echo "Best regards,". "<br>". "<br>";
    echo "The TRD System";
?>
