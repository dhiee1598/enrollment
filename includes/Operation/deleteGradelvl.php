<?php

if (!isset($_GET["id"])) {
    header("location:../../index.php?page=gradelvl");
} else {
    include "../../includes/include.php";
    $mySQLFunction->connection();
    $mySQLFunction->delete("GRADELEVEL", "GRADE_ID", $_GET["id"]);
    $mySQLFunction->disconnect();

    header("location:../../index.php?page=gradelvl&success=gradelvlDeleted");
}
