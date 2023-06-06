<?php
include "function.php";
$mySQLFunction = new myDataBase("localhost", "dhiee15", "0c/aD*6-urN.t(K_", "enrollment_db");

// IS SET ADD 
if (isset($_GET["add"])) {

    // FORM FOR STUDENT
    if ($_GET["add"] == "newStudent") {
        include "includes/forms/studentform.php";
    }
    // FORM FOR SUBJECTS
    if ($_GET["add"] == "newSubject") {
        include "includes/forms/subjectform.php";
    }
    // FORM FOR FACULTY
    if ($_GET["add"] == "newFaculty") {
        include "includes/forms/facultyform.php";
    }
    // FORM FOR GRADE LEVEL
    if ($_GET["add"] == "newGradelvl") {
        include "includes/forms/gradelvlform.php";
    }
}

// IS SET VIEW
if (isset($_GET["view"])) {
    if ($_GET["view"] == "student") {
        include "includes/Operation/viewStudent.php";
    }
    if ($_GET["view"] == "faculty") {
        include "includes/Operation/viewFaculty.php";
    }
}

// IS SET EDIT
if (isset($_GET["edit"])) {
    if ($_GET["edit"] == "student") {
        include "includes/Operation/updateStudent.php";
    }
    if ($_GET["edit"] == "subject") {
        include "includes/Operation/updateSubject.php";
    }
    if ($_GET["edit"] == "faculty") {
        include "includes/Operation/updateFaculty.php";
    }
    if ($_GET["edit"] == "gradelvl") {
        include "includes/Operation/updateGradelvl.php";
    }
}

// IS SET DELETE
if (isset($_GET["delete"])) {

    // DELETE STUDENT WARNING
    if ($_GET["delete"] == "student") {
        echo '<div class="container-form">
                <div class="alert-warning">
                    <p>Are you sure you want to delete this student?</p><br>
                    <a href="includes/Operation/deleteStudent.php?delete=student&id=' . $_GET["id"] . '">Yes</a>
                    <a href="index.php?page=student">No</a>
                </div>
            </div>';
    }

    // DELETE SUBJECT WARNING
    if ($_GET["delete"] == "subject") {
        echo '<div class="container-form">
                <div class="alert-warning">
                    <p>Are you sure you want to delete this subject?</p><br>
                    <a href="includes/Operation/deleteSubject.php?delete=subject&id=' . $_GET["id"] . '">Yes</a>
                    <a href="index.php?page=subject">No</a>
                </div>
            </div>';
    }

    // DELETE FACULTY WARNING
    if ($_GET["delete"] == "faculty") {
        echo '<div class="container-form">
                <div class="alert-warning">
                    <p>Are you sure you want to delete this faculty?</p><br>
                    <a href="includes/Operation/deleteFaculty.php?delete=faculty&id=' . $_GET["id"] . '">Yes</a>
                    <a href="index.php?page=faculty">No</a>
                </div>
            </div>';
    }

    // DELETE GRADELEVEL WARNING
    if ($_GET["delete"] == "gradelvl") {
        echo '<div class="container-form">
                <div class="alert-warning">
                    <p>Are you sure you want to delete this Offer?</p><br>
                    <a href="includes/Operation/deleteGradelvl.php?delete=gradelvl&id=' . $_GET["id"] . '">Yes</a>
                    <a href="index.php?page=gradelvl">No</a>
                </div>
            </div>';
    }
}

// IS SET SUCCESS MESSAGE
if (isset($_GET["success"])) {

    // DELETE STUDENT MESSAGE
    if ($_GET["success"] == "studentDeleted") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Deleted Student Succesfully<span> !</span></p><br>
                    <a href="index.php?page=student">X</a>
                </div> 
            </div>';
    }

    // DELETE SUBJECT MESSAGE
    if ($_GET["success"] == "subjectDeleted") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Deleted Subject Succesfully<span> !</span></p><br>
                    <a href="index.php?page=subject">X</a>
                </div> 
            </div>';
    }

    // DELETE FACULTY MESSAGE
    if ($_GET["success"] == "facultyDeleted") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Deleted Faculty Succesfully<span> !</span></p><br>
                    <a href="index.php?page=faculty">X</a>
                </div> 
            </div>';
    }

    // DELETE GRADELVL MESSAGE
    if ($_GET["success"] == "gradelvlDeleted") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Deleted Offer Succesfully<span> !</span></p><br>
                    <a href="index.php?page=gradelvl">X</a>
                </div> 
            </div>';
    }


    // UPDATED STUDENT MESSAGE
    if ($_GET["success"] == "updatedStudent") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Update Student Succesfully<span> !</span></p><br>
                    <a href="index.php?page=student">X</a>
                </div> 
            </div>';
    }

    // UPDATED SUBJECT MESSAGE
    if ($_GET["success"] == "subjectUpdated") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Update Subject Succesfully<span> !</span></p><br>
                    <a href="index.php?page=subject">X</a>
                </div> 
            </div>';
    }

    // UPDATED FACULTY MESSAGE
    if ($_GET["success"] == "facultyUpdated") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Update Faculty Succesfully<span> !</span></p><br>
                    <a href="index.php?page=faculty">X</a>
                </div> 
            </div>';
    }

    // UPDATED GRADELEVEL MESSAGE
    if ($_GET["success"] == "gradelvlUpdated") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Update Grade Offer Succesfully<span> !</span></p><br>
                    <a href="index.php?page=gradelvl">X</a>
                </div> 
            </div>';
    }

    // NEW STUDENT ADDED MESSAGE
    if ($_GET["success"] == "newStudentAdded") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Added Student Succesfully<span> !</span></p><br>
                    <a href="index.php?page=student">X</a>
                </div> 
            </div>';
    }

    // NEW SUBJECT ADDED MESSAGE
    if ($_GET["success"] == "newSubjectAdded") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Added Subject Succesfully<span> !</span></p><br>
                    <a href="index.php?page=subject">X</a>
                </div> 
            </div>';
    }

    // NEW FACULTY ADDED MESSAGE
    if ($_GET["success"] == "newFacultyAdded") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Added Faculty Succesfully<span> !</span></p><br>
                    <a href="index.php?page=faculty">X</a>
                </div> 
            </div>';
    }

    // NEW GRADELEVEL ADDED MESSAGE
    if ($_GET["success"] == "newGradelvlAdded") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>Added Succesfully<span> !</span></p><br>
                    <a href="index.php?page=gradelvl">X</a>
                </div> 
            </div>';
    }
}

// ERROR MESSAGE
if (isset($_GET["error"])) {
    if ($_GET["error"] == "accessdenied") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>ACCESS DENIED<span> !</span></p><br>
                    <a href="login.php">X</a>
                </div> 
            </div>';
    }
    if ($_GET["error"] == "wrongUsernameOrPassord") {
        echo '<div class="container-form">
                <div class="alert-success">
                    <p>WRONG PASSWORD TRY AGAIN<span> !</span></p><br>
                    <a href="login.php">X</a>
                </div> 
            </div>';
    }
}
