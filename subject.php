<?php
include "includes/include.php";
?>
<!-- CONTAINER  -->
<div class="container">
    <!--  STUDENT SECTION -->
    <div class="section-information">
        <div class="section-title">
            <h1>* List of Subjects</h1>
        </div>

        <!-- SEARCH BAR -->
        <div class="search-bar">
            <img src="icon/icons8-search-50.png" alt="" />
            <form action="index.php?page=subject" method="POST">
                <input type="text" name="name" placeholder="Name..." autocomplete="off" required />
                <button name="search">Search</button>
                <a href="index.php?page=subject&add=newSubject">Add New</a>
            </form>
        </div>
        <!-- END OF SEARCH BAR -->

        <!-- TABLE INFORMATION -->
        <div class="table-subject">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Time</th>
                        <th>Grade Name</th>
                        <th>Teacher</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mySQLFunction->connection();
                    if (!isset($_POST["search"])) {
                        $result = $mySQLFunction->getSubjects();
                    } else {
                        $name = $_POST["name"];
                        $result = $mySQLFunction->searchSubject($name);
                    }
                    if (!empty($result)) {
                        $rowCount = 1;
                        foreach ($result as $row) {
                            echo '<tr>
                                        <td>' . $rowCount . '</td>
                                            <td>' . $row["SUBJECT_ID"] . '</td>
                                            <td>' . $row["SUBJECT_NAME"] . '</td>
                                            <td>' . $row["SUBJECT_DESCRIPTION"] . '</td>
                                            <td>' . $row["SUBJECT_TIME"] . '</td>
                                            <td>' . $row["GRADE_NAME"] . '</td>
                                            <td>' . $row["TEACHER"] . '</td>
                                            <td>
                                                <a href="index.php?page=subject&edit=subject&id=' . $row["SUBJECT_ID"] . '">Edit</a>
                                                <a href="index.php?page=subject&delete=subject&id=' . $row["SUBJECT_ID"] . '">Delete</a>
                                            </td>
                                            </tr>';
                            $rowCount++;
                        }
                        echo '</table>';
                        echo '<a href="">Back</a>';
                    } else {
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td>Empty Table</td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '</tr>';
                        echo '</table>';
                        echo '<a href="">Back</a>';
                    }
                    $mySQLFunction->disconnect();
                    ?>
        </div>
        <!-- END OF TABLE -->
    </div>
    <!-- END OF STUDENT SECTION -->
</div>
<!-- END OF CONTAINER -->