<?php
include "includes/include.php";
?>
<!-- CONTAINER  -->
<div class="container">
    <!--  STUDENT SECTION -->
    <div class="section-information">
       <div class="section-title">
           <h1>* List of Offer</h1>   
    </div>
        <!-- SEARCH BAR -->
        <div class="search-bar">
            <img src="icon/icons8-search-50.png" alt="" />
            <form action="index.php?page=gradelvl" method="POST">
                <input type="text" name="name" placeholder="Grade name..." required autocomplete="off" />
                <button name="search">Search</button>
                <a href="index.php?page=gradelvl&add=newGradelvl">Add New</a>
            </form>
        </div>
        <!-- END OF SEARCH BAR -->

        <!-- TABLE INFORMATION -->
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Grade ID</th>
                        <th>Name</th>
                        <th>Advisor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mySQLFunction->connection();
                    if (!isset($_POST["search"])) {
                        $result = $mySQLFunction->getGradelevel();
                    } else {
                        $name = $_POST["name"];
                        $result = $mySQLFunction->searchGradelevel($name);
                    }
                    if (!empty($result)) {
                        $rowCount = 1;
                        foreach ($result as $row) {
                            echo '<tr>
                                <td>' . $rowCount . '</td>
                                <td>' . $row["GRADE_ID"] . '</td>
                                <td>' . $row["GRADE_NAME"] . '</td>
                                <td>' . $row["ADVISOR"] . '</td>
                                <td>
                                    <a href="index.php?page=gradelvl&edit=gradelvl&id=' . $row["GRADE_ID"] . '">Edit</a>
                                    <a href="index.php?page=gradelvl&delete=gradelvl&id=' . $row["GRADE_ID"] . '">Delete</a>
                                </td>
                                </tr>';
                            $rowCount++;
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
                    ?>
        </div>
        <!-- END OF TABLE -->
    </div>
    <!-- END OF STUDENT SECTION -->
</div>
<!-- END OF CONTAINER -->
