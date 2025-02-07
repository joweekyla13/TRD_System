<?php
    session_start();

    // Retrieve session values (if any)
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'USER';

    echo "Good day!" . "<br>". "<br>". "<br>";
    echo "The HR Memorandum, with Doc.# (xyz) that you set for revision has been updated by user: $username. Kindly check it in the TRD System." . "<br>". "<br>";
    echo "To access the memorandum, please log in to the TRD System and navigate to the relevant section. Ensure that all necessary actions or approvals are completed in a timely manner to maintain workflow efficiency." . "<br>". "<br>";
    echo "Thank you for your prompt attention to this matter.". "<br>". "<br>". "<br>";
    echo "Best regards,". "<br>". "<br>";
    echo "The TRD System";
?>
