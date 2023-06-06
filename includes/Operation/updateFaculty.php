<?php
$teacherID = $_GET["id"];

$mySQLFunction->connection();
$teacherRow = $mySQLFunction->getTeacher("TEACHER_ID", $teacherID);
$mySQLFunction->disconnect();

if (isset($_POST["submit"])) {
    $id = $_POST["teacherID"];
    $fname = strtoupper(trim($_POST["firstname"]));
    $mname = strtoupper(trim($_POST["middlename"]));
    $lname = strtoupper(trim($_POST["lastname"]));
    $address = strtoupper(trim($_POST["address"]));
    $contact = trim($_POST["contact"]);
    $email = trim($_POST["email"]);

    $mySQLFunction->connection();
    $mySQLFunction->updateFaculty("TEACHER_FNAME", $fname, $id);
    $mySQLFunction->updateFaculty("TEACHER_INIT", $mname, $id);
    $mySQLFunction->updateFaculty("TEACHER_LNAME", $lname, $id);
    $mySQLFunction->updateFaculty("TEACHER_ADDRESS", $address, $id);
    $mySQLFunction->updateFaculty("TEACHER_CONTACT", $contact, $id);
    $mySQLFunction->updateFaculty("TEACHER_EMAIL", $email, $id);

    $mySQLFunction->disconnect();
    header("location:index.php?page=faculty&success=facultyUpdated");
    exit();
}
?>

<div class="container-form">
    <div class="form-faculty">
        <h1>Edit Faculty Record </h1>
        <form action="" method="POST">
            <label>
                Teacher ID: <input type="text" name="teacherID" value="<?php echo $teacherRow['TEACHER_ID']; ?>" readonly>
            </label>
            <br>
            <label>
                First Name: <input type="text" name="firstname" value="<?php echo $teacherRow['TEACHER_FNAME']; ?>" required>
            </label>
            <br>
            <label>
                Middle Initial: <input type="text" name="middlename" value="<?php echo $teacherRow['TEACHER_INIT']; ?>" required>
            </label>
            <br>
            <label>
                Last Name: <input type="text" name="lastname" value="<?php echo $teacherRow['TEACHER_LNAME']; ?>" required>
            </label>
            <br>
            <label>
                Address: <input type="text" name="address" value="<?php echo $teacherRow['TEACHER_ADDRESS']; ?>" required>
            </label>
            <br>
            <label>
                Contact: <input type="numeric" name="contact" value="<?php echo $teacherRow['TEACHER_CONTACT']; ?>" required>
            </label>
            <br>
            <label>
                Email: <input type="email" name="email" value="<?php echo $teacherRow['TEACHER_EMAIL']; ?>" required>
            </label>
            <button name="submit">Submit</button>
            <br>
            <a href="index.php?page=faculty">Back</a>
        </form>
    </div>
</div>