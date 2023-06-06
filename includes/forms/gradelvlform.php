<?php
if (!isset($_GET["add"])) {
    header("location:../../index.php?page=gradelvl");
    exit();
}
?>
<div class="container-form">
    <div class="form-gradelvl">
        <h1>Grade Level Form</h1>
        <form action="./includes/gradelvlform-inc.php" method="POST">
            <label>
                Grade Name: <input type="text" name="name" autocomplete="off" autofocus required>
            </label>
            <br>
            <label>
                Advisor:
                <select name="teacherID">
                    <option value=""></option>
                    <?php
                    $mySQLFunction->connection();
                    $result = $mySQLFunction->getTeacher();
                    foreach ($result as $row) {
                        if (($mySQLFunction->checkRowCount("GRADELEVEL", "TEACHER_ID", $row["TEACHER_ID"])) == 1) {
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
            <a href="index.php?page=gradelvl">Back</a>
        </form>
    </div>
</div>