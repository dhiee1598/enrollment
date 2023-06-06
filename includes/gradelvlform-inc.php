<?php
if (!isset($_POST["submit"])) {
    header("location:../index.php?page=gradelvl");
    exit();
} else {
    include "../includes/include.php";

    $id = trim($mySQLFunction->generateGradeID());
    $name = strtoupper(trim($_POST["name"]));
    $teacherID = $_POST["teacherID"];

    $mySQLFunction->connection();
    $store = [$id, $name, $teacherID];

    $mySQLFunction->insert("GRADELEVEL", $store);
    $mySQLFunction->disconnect();
    header("location:../index.php?page=gradelvl&success=newGradelvlAdded");
    exit();
}
