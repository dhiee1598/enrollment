<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location:login.php?error=accessdenied");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/dashboard-style.css?v=<?php echo time(); ?>" />
    <title>Home</title>
</head>

<body>
    <!-- HEADER SECTION -->
    <header>
        <div class="header-top">
            <div class="main-title">
                <img src="icon/samplelogo.png" alt="logo" />
                <h1>Elementary Enrollment System</h1>
            </div>
            <div class="top-bar">
                <p>Administrator</p>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <div class="header-side">
            <p>Dashboard</p>
            <ul>
                <li>
                    <img src="icon/icons8-home-48.png" alt="" /><a href="index.php?page=home">Home</a>
                </li>
                <li>
                    <img src="icon/icons8-student-64.png" alt="" /><a href="index.php?page=student">Students</a>
                </li>
                <li>
                    <img src="icon/icons8-books-50.png" alt="" /><a href="index.php?page=subject">Subjects</a>
                </li>
                <li>
                    <img src="icon/icons8-employees-50.png" alt="" /><a href="index.php?page=faculty">Faculties</a>
                </li>
                <li>
                    <img src="icon/icons8-offer-50.png" alt="" /><a href="index.php?page=gradelvl">Grade Offer</a>
                </li>
                <li>
                    <img src="icon/icons8-settings-48.png" alt="" /><a href="index.php?page=settings">Settings</a>
                </li>
            </ul>
        </div>
    </header>
    <!-- END OF HEADER SECTION -->