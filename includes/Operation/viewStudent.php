<?php
$studentID = $_GET["id"];

$mySQLFunction->connection();
$studentRow = $mySQLFunction->getStudent("STUDENT_ID", $studentID);
$enroll = $mySQLFunction->getEnroll($studentID);
$mySQLFunction->disconnect();
?>

<div class="container-form">
    <div class="view">
        <h1>STUDENT ID: <?php echo $studentRow["STUDENT_ID"]; ?></h1>
        <div class="view-student">
            <div class="student-info">
                <h2>Student Profile</h2>
                <p><b>Name:</b> <?php echo $studentRow["STUDENT_FNAME"] . " " . $studentRow["STUDENT_INIT"] . " " . $studentRow["STUDENT_LNAME"] ?></p>
                <p><b>Gender:</b> <?php echo $studentRow["STUDENT_GENDER"] ?></p>
                <p><b>Date of Birth:</b> <?php echo $studentRow["STUDENT_DOB"] ?></p>
                <p><b>Address:</b> <?php echo $studentRow["STUDENT_ADDRESS"] ?></p>
                <p><b>Guardian Name:</b> <?php echo $studentRow["STUDENT_GUARDIAN"] ?></p>
                <p><b>Contact:</b> <?php echo $studentRow["STU_GUARDIAN_CONTACT"] ?></p>
                <p><b>Enrolled In:</b> <?php echo $enroll["GRADE_NAME"]; ?></p>
            </div>
            <div class="student-sub">
                <h2>Subject for these school year</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Time</th>
                            <th>Teacher</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $mySQLFunction->connection();
                        $result = $mySQLFunction->getStudentSub($enroll["GRADE_ID"]);
                        foreach ($result as $row) {
                            echo "<tr>";
                            echo '<td>' . $row["SUBJECT_NAME"] . '</td>';
                            echo '<td>' . $row["SUBJECT_DESCRIPTION"] . '</td>';
                            echo '<td>' . $row["SUBJECT_TIME"] . '</td>';
                            echo '<td>' . $row["TEACHER"] . '</td>';
                            echo '</td>';
                        }
                        $mySQLFunction->disconnect();
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
        <a href="index.php?page=student">Exit</a>
    </div>

</div>