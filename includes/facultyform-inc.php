<?php
if (!isset($_POST["submit"])) {
    header("location:index.php?page=faculty");
    exit();
} else {
    include "../includes/include.php";

    $id = trim($mySQLFunction->generateTeacherID());
    $fname = strtoupper(trim($_POST["firstname"]));
    $mname = strtoupper(trim($_POST["middlename"]));
    $lname = strtoupper(trim($_POST["lastname"]));
    $address = strtoupper(trim($_POST["address"]));
    $contact = trim($_POST["contact"]);
    $email = trim($_POST["email"]);


    $store = [$id, $fname, $mname, $lname, $address, $contact, $email];
    $mySQLFunction->connection();
    $mySQLFunction->insert("TEACHER", $store);
    $mySQLFunction->disconnect();
    header("location:../index.php?page=faculty&success=newFacultyAdded");
    exit();
}
