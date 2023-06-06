<?php
include "includes/include.php";

?>
<!-- CONTAINER  -->
<div class="container">
    <!--  STUDENT SECTION -->
    <div class="section-information">
        <div class="section-title">
            <h1>* List of Faculty</h1>
        </div>
        <!-- SEARCH BAR -->
        <div class="search-bar">
            <img src="icon/icons8-search-50.png" alt="" />
            <form action="index.php?page=faculty" method="POST">
                <input type="text" name="lname" placeholder="Last name..." required autocomplete="off" />
                <button name="search">Search</button>
                <a href="index.php?page=faculty&add=newFaculty">Add New</a>
            </form>
        </div>
        <!-- END OF SEARCH BAR -->

        <!-- TABLE INFORMATION -->
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teacher ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mySQLFunction->connection();
                    if (!isset($_POST["search"])) {
                        $result = $mySQLFunction->getTeacher();
                    } else {
                        $lname = $_POST["lname"];
                        $result = $mySQLFunction->searchTeacher($lname);
                    }
                    if (!empty($result)) {
                        $count = 1;
                        foreach ($result as $row) {
                            echo '<tr>';
                            echo '<td>' . $count . '</td>';
                            echo '<td>' . $row["TEACHER_ID"] . '</td>';
                            echo '<td>' . $row["TEACHER_FNAME"] . '</td>';
                            echo '<td>' . $row["TEACHER_LNAME"] . '</td>';
                            echo '<td>
                                        <a href="index.php?page=faculty&view=faculty&id=' . $row["TEACHER_ID"] . '">View</a>
                                        <a href="index.php?page=faculty&edit=faculty&id=' . $row["TEACHER_ID"] . '">Edit</a>
                                        <a href="index.php?page=faculty&delete=faculty&id=' . $row["TEACHER_ID"] . '">Delete</a>
                                     </td>';
                            echo '</tr>';
                            $count++;
                        }
                    } else {
                        echo '<tr>
                        <td></td>
                        <td></td>
                        <td>Empty Table</td>
                        <td></td>
                        <td></td>
                    </tr>';
                    }
                    echo '</table>';
                    echo '<a href="">Back</a>';
                    $mySQLFunction->disconnect();
                    ?>
        </div>
        <!-- END OF TABLE -->
    </div>
    <!-- END OF STUDENT SECTION -->
</div>
<!-- END OF CONTAINER -->