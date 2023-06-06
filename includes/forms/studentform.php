<?php
if (!isset($_GET["add"])) {
    header("location:../../index.php?page=student");
    exit();
}
?>
<div class="container-form">
    <div class="form">
        <h1>New Student Form</h1>
        <form action="./includes/studentform-inc.php" method="POST">
            <label>
                First Name: <input type="text" name="firstname" autocomplete="off" autofocus required>
            </label>
            <br>
            <label>
                Middle Initial: <input type="text" name="middlename" autocomplete="off" required>
            </label>
            <br>
            <label>
                Last Name: <input type="text" name="lastname" autocomplete="off" required>
            </label>
            <br>
            <label>
                Male <input type="radio" name="gender" value="MALE" required>
                Female <input type="radio" name="gender" value="FEMALE" required>
            </label>
            <br>
            <label>
                Address: <input type="text" name="address" autocomplete="off" required>
            </label>
            <br>
            <label>
                Date Of Birth: <input type="date" name="dob" autocomplete="off" required>
            </label>
            <br>
            <label>
                Guardian Name: <input type="text" name="guardian" autocomplete="off" required>
            </label>
            <br>
            <label>
                Guardian Contact: <input type="numeric" name="guardiancontact" autocomplete="off" required>
            </label>
            <br>
            <label>
                Grade Level:
                <select name="gradelvl">
                    <?php
                    $mySQLFunction->connection();
                    $result = $mySQLFunction->getGradeLevel();
                    foreach ($result as $row) {
                        echo '<option value="' . $row["GRADE_ID"] . '">' . $row["GRADE_NAME"] . '</option>';
                    }
                    ?>
                </select>
            </label>
            <br>
            <button name="submit">Submit</button>
            <br>
            <a href="index.php?page=student">Back</a>
        </form>
    </div>
</div>