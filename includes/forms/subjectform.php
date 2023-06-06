<?php
if (!isset($_GET["add"])) {
    header("location:../../index.php?page=subject");
    exit();
}
?>
<div class="container-form">
    <div class="form-subject">
        <h1>New Subject Form</h1>
        <form action="./includes/subjectform-inc.php" method="POST">
            <label>
                Subject Name: <input type="text" name="name" autocomplete="off" autofocus required>
            </label>
            <br>
            <label>
                Subject Description: <input type="text" name="description" autocomplete="off" required>
            </label>
            <br>
            <label>
                Subject Time: <input type="text" name="time" autocomplete="off" required>
            </label>
            <br>
            <label>
                Grade Level:
                <select name="gradelvl">
                    <option value=""></option>
                    <?php
                    $mySQLFunction->connection();
                    $result = $mySQLFunction->getGradeLevel();
                    foreach ($result as $row) {
                        echo '<option value="' . $row["GRADE_ID"] . '">' . $row["GRADE_NAME"] . '</option>';
                    }
                    $mySQLFunction->disconnect();
                    ?>
                </select>
            </label>
            <br>
            <label>
                Teacher:
                <select name="teacher">
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

            <button name="submit">Submit</button>
            <br>
            <a href="index.php?page=subject">Back</a>
        </form>
    </div>
</div>