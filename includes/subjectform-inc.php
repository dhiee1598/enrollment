<?php
if (!isset($_POST["submit"])) {
    header("location:index.php?page=subject");
    exit();
} else {
    include "../includes/include.php";

    $id = trim($mySQLFunction->generateSubjectID());
    $name = strtoupper(trim($_POST["name"]));
    $description = strtoupper(trim($_POST["description"]));
    $time = strtoupper(trim($_POST["time"]));
    $grade = strtoupper(trim($_POST["gradelvl"]));
    $teacher = trim($_POST["teacher"]);

    $store = [$id, $name, $description, $time, $grade, $teacher];
    $mySQLFunction->connection();

    if ($mySQLFunction->checkRowCount("SUBJECTS", "TEACHER_ID", $teacher) >= 3) {
        header("location:../index.php?page=subject&add=newSubject&error=limitError");
        exit();
    } else {
        $mySQLFunction->insert("SUBJECTS", $store);
        $mySQLFunction->disconnect();
        header("location:../index.php?page=subject&success=newSubjectAdded");
        exit();
    }
}
