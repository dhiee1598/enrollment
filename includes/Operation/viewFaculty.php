<?php
$teacherID = $_GET["id"];

$mySQLFunction->connection();
$studentRow = $mySQLFunction->getTeacher("TEACHER_ID", $teacherID);
$mySQLFunction->disconnect();

?>

<div class="container-form">
    <div class="view">
        <h1>TEACHER ID: <?php echo $studentRow["TEACHER_ID"]; ?></h1>
        <div class="view-student">
            <div class="student-info">
                <h2>Faculty Profile</h2>
                <p><b>Name:</b> <?php echo $studentRow["TEACHER_FNAME"] . " " . $studentRow["TEACHER_INIT"] . " " . $studentRow["TEACHER_LNAME"] ?></p>
                <p><b>Address:</b> <?php echo $studentRow["TEACHER_ADDRESS"] ?></p>
                <p><b>Contact Number:</b> <?php echo $studentRow["TEACHER_CONTACT"] ?></p>
                <p><b>Email:</b> <?php echo $studentRow["TEACHER_EMAIL"] ?></p>
            </div>
            <div class="teacher-sub">
                <h2>Subject for these school year</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Time</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $mySQLFunction->connection();
                        $result = $mySQLFunction->getTeacherSub($teacherID);
                        foreach ($result as $row) {
                            echo '<tr>';
                            echo '<td>' . $row["SUBJECT_NAME"] . '</td>';
                            echo '<td>' . $row["SUBJECT_DESCRIPTION"] . '</td>';
                            echo '<td>' . $row["SUBJECT_TIME"] . '</td>';
                            echo '</tr>';
                        }
                        $mySQLFunction->disconnect();
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
        <a href="index.php?page=faculty">Exit</a>
    </div>

</div>