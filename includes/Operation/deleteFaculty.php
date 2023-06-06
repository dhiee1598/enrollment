<?php

if (!isset($_GET["id"])) {
    header("location:../../index.php?page=faculty");
    exit();
} else {
    include "../../includes/include.php";
    $mySQLFunction->connection();
    $mySQLFunction->delete("TEACHER", "TEACHER_ID", $_GET["id"]);
    $mySQLFunction->disconnect();

    header("location:../../index.php?page=faculty&success=facultyDeleted");
    exit();
}
