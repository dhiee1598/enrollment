<?php
include "includes/include.php";
$mySQLFunction->connection();
$numberOfStudent = $mySQLFunction->checkRowCount("ENROLL");
$numberOfFaculty = $mySQLFunction->checkRowCount("TEACHER");
$mySQLFunction->disconnect();

?>

<div class="container">
    <div class="home">
        <h1>Welcome Back! Admin</h1>
        <?php
        date_default_timezone_set("Asia/Manila");
        echo "Today is " . date("M d, Y l") . "<br>";
        echo date("h:i:sa");
        ?>
        <div class="enrolled">
            Enrolled Student: <?php echo $numberOfStudent; ?><br>
            Number of Faculty Registered: <?php echo $numberOfFaculty; ?>
        </div>
    </div>
</div>