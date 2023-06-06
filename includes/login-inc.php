<?php
include "include.php";

if (!isset($_POST["submit"])) {
    header("location:../login.php?error=accessdenied");
    exit();
} else {

    if (empty($_POST["username"]) || empty($_POST["password"])) {
        header("location:../login.php?error=emptyfield");
        exit();
    } else {
        $mySQLFunction->connection();
        $username = trim($_POST["username"]);
        $password = $mySQLFunction->encrypt(trim($_POST["password"]));

        $result = $mySQLFunction->checkUserLogin($username, $password);

        if (!$result) {
            header("location:../login.php?error=wrongUsernameOrPassord");
            exit();
        } else {
            session_start();
            $_SESSION["username"] = $username;
            header("location:../index.php?page=home");
            exit();
        }
    }
}
