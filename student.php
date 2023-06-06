<?php
include "includes/include.php";
?>
<!-- CONTAINER  -->
<div class="container">
    <!--  STUDENT SECTION -->
    <div class="section-information">
        <div class="section-title">
            <h1>* List of Student</h1>
        </div>

        <!-- SEARCH BAR -->
        <div class="search-bar">
            <img src="icon/icons8-search-50.png" alt="" />
            <form action="index.php?page=student" method="POST">
                <input type="text" name="studentlname" placeholder="Last name..." required />
                <button name="search">Search</button>
                <a href="index.php?page=student&add=newStudent">Add New</a>
            </form>
        </div>
        <!-- END OF SEARCH BAR -->

        <!-- TABLE INFORMATION -->
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mySQLFunction->connection();
                    if (!isset($_POST["search"])) {
                        $result = $mySQLFunction->getStudent();
                    } else {
                        $lname = $_POST["studentlname"];
                        $result = $mySQLFunction->searchStudent($lname);
                    }
                    if (!empty($result)) {
                        $rowCount = 1;
                        foreach ($result as $row) {
                            echo '<tr>
                                    <td>' . $rowCount . '</td>
                                    <td>' . $row["STUDENT_ID"] . '</td>
                                    <td>' . $row["STUDENT_FNAME"] . '</td>
                                    <td>' . $row["STUDENT_LNAME"] . '</td>
                                    <td>
                                        <a href="index.php?page=student&view=student&id=' . $row["STUDENT_ID"] . '">View</a>
                                        <a href="index.php?page=student&edit=student&id=' . $row["STUDENT_ID"] . '">Edit</a>
                                        <a href="index.php?page=student&delete=student&id=' . $row["STUDENT_ID"] . '">Delete</a>
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
                        echo '<td>Empty Table</td>';
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