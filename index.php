<?php include "includes/header.php" ?>

<php
if (isset($_GET["page"]) && $_GET["page"] == "home") {
    include "home.php";
}
if (isset($_GET["page"]) && $_GET["page"] == "student") {
    include "student.php";
}
if (isset($_GET["page"]) && $_GET["page"] == "subject") {
    include "subject.php";
}
if (isset($_GET["page"]) && $_GET["page"] == "faculty") {
    include "faculty.php";
}
if (isset($_GET["page"]) && $_GET["page"] == "gradelvl") {
    include "gradelvl.php";
}
if (isset($_GET["page"]) && $_GET["page"] == "settings") {
    include "settings.php";
}
?>

<?php include "includes/footer.php" ?>
