<?php
$studentID = $_GET["id"];

$mySQLFunction->connection();
$studentRow = $mySQLFunction->getStudent("STUDENT_ID", $studentID);

if (isset($_POST["submit"])) {
    $id = $_POST["studentid"];
    $fname = strtoupper(trim($_POST["firstname"]));
    $mname = strtoupper(trim($_POST["middlename"]));
    $lname = strtoupper(trim($_POST["lastname"]));
    $gender = strtoupper(trim($_POST["gender"]));
    $address = strtoupper(trim($_POST["address"]));
    $dob = trim($_POST["dob"]);
    $guardian = strtoupper(trim($_POST["guardian"]));
    $contact = trim($_POST["guardiancontact"]);

    $mySQLFunction->connection();
    $mySQLFunction->updateStudent("STUDENT_FNAME", $fname, $id);
    $mySQLFunction->updateStudent("STUDENT_INIT", $mname, $id);
    $mySQLFunction->updateStudent("STUDENT_LNAME", $lname, $id);
    $mySQLFunction->updateStudent("STUDENT_GENDER", $gender, $id);
    $mySQLFunction->updateStudent("STUDENT_ADDRESS", $address, $id);
    $mySQLFunction->updateStudent("STUDENT_DOB", $dob, $id);
    $mySQLFunction->updateStudent("STUDENT_GUARDIAN", $guardian, $id);
    $mySQLFunction->updateStudent("STU_GUARDIAN_CONTACT", $contact, $id);

    $mySQLFunction->disconnect();
    header("location:index.php?page=student&success=updatedStudent");
    exit();
}
?>

<div class="container-form">
    <div class="form">
        <h1>Edit Student Record </h1>
        <form action="" method="POST">

            <label>
                First Name: <input type="text" name="firstname" value="<?php echo $studentRow['STUDENT_FNAME']; ?>" required autocomplete="off">
            </label>
            <br>
            <label>
                Middle Initial: <input type="text" name="middlename" value="<?php echo $studentRow['STUDENT_INIT']; ?>" required autocomplete="off">
            </label>
            <br>
            <label>
                Last Name: <input type="text" name="lastname" value="<?php echo $studentRow['STUDENT_LNAME']; ?>" required autocomplete="off">
            </label>
            <br>
            <label>
                Male <input type="radio" name="gender" value="MALE" required>
                Female <input type="radio" name="gender" value="FEMALE" required>
            </label>
            <br>
            <label>
                Address: <input type="text" name="address" value="<?php echo $studentRow['STUDENT_ADDRESS']; ?>" required autocomplete="off">
            </label>
            <br>
            <label>
                Date Of Birth: <input type="date" name="dob" value="<?php echo $studentRow['STUDENT_DOB']; ?>" required autocomplete="off">
            </label>
            <br>
            <label>
                Guardian Name: <input type="text" name="guardian" value="<?php echo $studentRow['STUDENT_GUARDIAN']; ?>" required autocomplete="off">
            </label>
            <br>
            <label>
                Guardian Contact: <input type="numeric" name="guardiancontact" value="<?php echo $studentRow['STU_GUARDIAN_CONTACT']; ?>" required autocomplete="off">
            </label>
            <br>
            <label>
                Student ID: <input type="text" name="studentid" value="<?php echo $studentRow["STUDENT_ID"] ?>" readonly>
            </label>
            <br>
            <button name="submit">Submit</button>
            <br>
            <a href="index.php?page=student">Back</a>
        </form>
    </div>
</div>