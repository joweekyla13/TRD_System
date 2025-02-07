<?php

session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'USER';
$docno = isset($_SESSION['docno']) ? $_SESSION['docno'] : 'N/A';

echo "Good day!" . "<br><br>";
echo "This is to inform you that a new HR Memorandum with Doc# $docno has been submitted to the TRD System by user: $username. We kindly request you to review the details at your earliest convenience." . "<br><br>";
echo "To access the memorandum, please log in to the TRD System and navigate to the relevant section. Ensure that all necessary actions or approvals are completed in a timely manner to maintain workflow efficiency." . "<br><br>";
echo "Thank you for your prompt attention to this matter." . "<br><br>";
echo "Best regards," . "<br><br>";
echo "The TRD System";


?>
