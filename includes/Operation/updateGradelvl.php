<?php
$id = $_GET["id"];

$mySQLFunction->connection();
$graderow = $mySQLFunction->getGradelevel("GRADE_ID", $id);
$mySQLFunction->disconnect();

if (isset($_POST["submit"])) {

    $id = $_POST["id"];
    $name = strtoupper(trim($_POST["name"]));
    $teacher = $_POST["teacherID"];

    $mySQLFunction->connection();

    if ($teacher != $graderow["TEACHER_ID"]) {
        $mySQLFunction->updateGradelvl("TEACHER_ID", $teacher, $id);
    }
    $mySQLFunction->updateGradelvl("GRADE_NAME", $name, $id);
    $mySQLFunction->disconnect();

    header("location:index.php?page=gradelvl&success=gradelvlUpdated");
    exit();
}


?>

<div class="container-form">
    <div class="form-gradelvl">
        <h1>Edit Grade level </h1>
        <form action="" method="POST">
            <label>
                Grade ID: <input type="text" name="id" value="<?php echo $graderow['GRADE_ID']; ?>" readonly>
            </label>
            <br>
            <label>
                Name: <input type="text" name="name" value="<?php echo $graderow['GRADE_NAME']; ?>" required>
            </label>
            <br>
            <label>
                Advisor:
                <select name="teacherID">
                    <option value="<?php echo $graderow["TEACHER_ID"] ?>"><?php echo $graderow["ADVISOR"]; ?></option>';
                    <?php
                    $mySQLFunction->connection();
                    $result = $mySQLFunction->getTeacher();
                    foreach ($result as $row) {
                        if (($mySQLFunction->checkRowCount("GRADELEVEL", "TEACHER_ID", $row["TEACHER_ID"])) == 1) {
                            continue;
                        } else {
                            echo '<option value="' . $row["TEACHER_ID"] . '">' . $row["TEACHER_FNAME"] . " " . $row["TEACHER_INIT"] . " " . $row["TEACHER_LNAME"] . '</option>';
                        }
                    }
                    $mySQLFunction->disconnect();
                    ?>
                </select>
            </label>
            <br>
            <button name="submit">Submit</button>
            <a href="index.php?page=gradelvl">Back</a>
        </form>
    </div>
</div>