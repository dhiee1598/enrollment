<?php

include "includes/include.php";
$mySQLFunction->connection();
$result = $mySQLFunction->getSchool();
$mySQLFunction->disconnect();

if (isset($_POST["submit"])) {

    $name = strtoupper(trim($_POST["school"]));
    $address = strtoupper(trim($_POST["address"]));

    $mySQLFunction->connection();
    $mySQLFunction->updateSchool("SCHOOL_NAME", $name);
    $mySQLFunction->updateSchool("SCHOOL_ADDRESS", $address);
    $mySQLFunction->disconnect();

    echo '<div class="container-form">
        <div class="alert-success">
            <p>Updated Succesfully<span> !</span></p><br>
            <a href="index.php?page=settings">X</a>
        </div> 
    </div>';
}

?>
<div class="container">
    <div class="settings">
        <form action="?page=settings" method="POST">
            School Name: <input type="text" name="school" value="<?php echo $result["SCHOOL_NAME"]; ?>" autofocus autocomplete="off">
            Addresss: <input type="text" name="address" value="<?php echo $result["SCHOOL_ADDRESS"]; ?>" autocomplete="off">
            <button name="submit">Update</button>
        </form>
    </div>
</div>