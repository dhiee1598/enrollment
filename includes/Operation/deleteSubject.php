<?php

if (!isset($_GET["id"])) {
    header("location:../../index.php?page=subject");
} else {
    include "../../includes/include.php";
    $mySQLFunction->connection();
    $mySQLFunction->delete("SUBJECTS", "SUBJECT_ID", $_GET["id"]);
    $mySQLFunction->disconnect();

    header("location:../../index.php?page=subject&success=subjectDeleted");
    exit();
}
