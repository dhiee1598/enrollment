<?php

$subjectid = $_GET["id"];

$mySQLFunction->connection();
$subjectRow = $mySQLFunction->getSubjects("SUBJECT_ID", $subjectid);
$mySQLFunction->disconnect();

if (isset($_POST["submit"])) {
    $mySQLFunction->connection();
    $id = $_POST["subjectid"];
    $name = strtoupper(trim($_POST["name"]));
    $description = strtoupper(trim($_POST["description"]));
    $time = strtoupper(trim($_POST["time"]));
    $grade = strtoupper(trim($_POST["gradelvl"]));
    $teacher = trim($_POST["teacher"]);

    if ($teacher != $subjectRow["TEACHER_ID"]) {
        $mySQLFunction->updateSubject("TEACHER_ID", $teacher, $id);
    }
    $mySQLFunction->updateSubject("SUBJECT_NAME", $name, $id);
    $mySQLFunction->updateSubject("SUBJECT_DESCRIPTION", $description, $id);
    $mySQLFunction->updateSubject("SUBJECT_TIME", $time, $id);
    $mySQLFunction->updateSubject("GRADE_ID", $grade, $id);
    $mySQLFunction->disconnect();
    header("location:index.php?page=subject&success=subjectUpdated");
    exit();
}


?>
<div class="container-form">
    <div class="form-subject-update">
        <h1>Edit Subject</h1>
        <form action="" method="POST">
            <label>
                Subject Name: <input type="text" name="name" autocomplete="off" value="<?php echo $subjectRow["SUBJECT_NAME"]; ?>" autofocus required>
            </label>
            <br>
            <label>
                Subject Description: <input type="text" name="description" value="<?php echo $subjectRow["SUBJECT_DESCRIPTION"]; ?>" autocomplete="off" required>
            </label>
            <br>
            <label>
                Subject Time: <input type="text" name="time" value="<?php echo $subjectRow["SUBJECT_TIME"] ?>" autocomplete="off" required>
            </label>
            <br>
            <label>
                Grade Level:
                <select name="gradelvl" required>
                    <option value="<?php echo $subjectRow['GRADE_ID'] ?>"><?php echo $subjectRow['GRADE_NAME'] ?></option>
                    <?php
                    $mySQLFunction->connection();
                    $result = $mySQLFunction->getGradeLevel();
                    foreach ($result as $row) {

                        if ($row["GRADE_ID"] == $subjectRow["GRADE_ID"]) {
                            continue;
                        } else {
                            echo '<option value="' . $row["GRADE_ID"] . '">' . $row["GRADE_NAME"] . '</option>';
                        }
                    }
                    $mySQLFunction->disconnect();
                    ?>
                </select>
            </label>
            <br>
            <label>
                Teacher:
                <select name="teacher" required>
                    <option value="<?php echo $subjectRow["TEACHER_ID"] ?>"><?php echo $subjectRow["TEACHER"]; ?></option>';
                    ?></option>
                    <?php
                    $mySQLFunction->connection();
                    $result = $mySQLFunction->getTeacher();
                    foreach ($result as $row) {
                        if (($mySQLFunction->checkRowCount("SUBJECTS", "TEACHER_ID", $row["TEACHER_ID"])) == 3) {
                            continue;
                        } else {
                            echo '<option value="' . $row["TEACHER_ID"] . '"n>' . $row["TEACHER_FNAME"] . " " . $row["TEACHER_INIT"] . " " . $row["TEACHER_LNAME"] . '</option>';
                        }
                    }
                    $mySQLFunction->disconnect();
                    ?>
                </select>
            </label>
            <br>
            <label>
                Subject ID: <input type="text" value="<?php echo $subjectRow["SUBJECT_ID"]; ?>" name="subjectid" readon>
            </label>

            <button name="submit">Submit</button>
            <br>
            <a href="index.php?page=subject">Back</a>
        </form>
    </div>
</div>