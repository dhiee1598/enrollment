<?php

if (!isset($_GET["id"])) {
    header("location:../../index.php?page=student");
} else {
    include "../../includes/include.php";
    $mySQLFunction->connection();
    $mySQLFunction->delete("STUDENT", "STUDENT_ID", $_GET["id"]);
    $mySQLFunction->disconnect();

    header("location:../../index.php?page=student&success=studentDeleted");
    exit();
}
