<?php
if (!isset($_POST["submit"])) {
    header("location:index.php?page=student");
    exit();
} else {
    include "../includes/include.php";

    $id = trim($mySQLFunction->generateStudentID());
    $fname = strtoupper(trim($_POST["firstname"]));
    $mname = strtoupper(trim($_POST["middlename"]));
    $lname = strtoupper(trim($_POST["lastname"]));
    $gender = strtoupper(trim($_POST["gender"]));
    $address = strtoupper(trim($_POST["address"]));
    $dob = trim($_POST["dob"]);
    $guardian = strtoupper(trim($_POST["guardian"]));
    $contact = trim($_POST["guardiancontact"]);
    $gradelvl = trim($_POST["gradelvl"]);


    $store = [$id, $fname, $mname, $lname, $gender, $address, $dob, $guardian, $contact];
    $mySQLFunction->connection();
    $mySQLFunction->insert("STUDENT", $store);

    $mySQLFunction->insert("ENROLL", array($id, $gradelvl, date("Ymd")));

    $mySQLFunction->disconnect();
    header("location:../index.php?page=student&success=newStudentAdded");
    exit();
}
