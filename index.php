<?php
require_once("pages/header.php");
require_once("pages/sidebar.php");

// session_start();
// $_SESSION["username"] = "jmaramag";
/* If page does not exist load home page */

if(!isset($_GET['page'])){
	$page = "pages/dashboard.php";
}else{
	$page = 'pages/'.$_GET['page'];
}

// If no page is set in the URL, default to dashboard
// if (!isset($_GET['page'])) {
//     $page = "pages/dashboard.php";
// } else {
//     $page = 'pages/' . $_GET['page'] . '.php';
// }

// Include the page content
// if (file_exists($page)) {
//     include $page;
// } else {
//     echo "Page not found!";
// }

require_once($page);

require_once("pages/footer.php");
?>