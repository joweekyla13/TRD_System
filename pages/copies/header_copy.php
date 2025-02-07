<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRDS</title>

    <!--Affix Scripts/CSS here-->
    <?php
    require_once('./libraries/includes.php');
    ?>
</head>

<!-- Navbar -->
<!-- <nav class="main-header navbar navbar-expand navbar-light"> -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link fw-bold" id="headerTitle"></a>
        </li>
    </ul>
</nav>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-navy elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column justify-content-center align-items-center">
            <div class="info d-flex text-center">
                <a href="" class="d-grid fw-bold">Training Request Database<br>System</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" id="requestNav">
                    <a href="#requestTab" class="nav-link active">
                        <i class="fa-solid fa-user-plus"></i>
                        <p>Request Trainee</p>
                    </a>
                </li>
                <li class="nav-item" id="receivingNav">
                    <a href="#receivingTab" class="nav-link">
                        <i class="fa-solid fa-file-arrow-down"></i>
                        <p>Receiving</p>
                    </a>
                </li>
                <li class="nav-item" id="requestListNav">
                    <a href="#requestListTab" class="nav-link">
                        <i class="fa-solid fa-list-ul"></i>
                        <p>List of Requests</p>
                    </a>
                </li>
                <li class="nav-item" id="traineeListNav">
                    <a href="#traineeListTab" class="nav-link">
                        <i class="fa-solid fa-address-book"></i>
                        <p>List of Trainees</p>
                    </a>
                </li>
                <li class="nav-item" id="settingsNav">
                    <a href="#settingsTab" class="nav-link">
                        <i class="fa-solid fa-gears"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<!-- <script src="css/styles.css" language="css"></script> -->