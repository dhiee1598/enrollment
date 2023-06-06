<?php
if (!isset($_GET["add"])) {
    header("location:../../index.php?page=faculty");
    exit();
}
?>
<div class="container-form">
    <div class="form-faculty">
        <h1>New Faculty Form</h1>
        <form action="./includes/facultyform-inc.php" method="POST">
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
                Address: <input type="text" name="address" autocomplete="off" required>
            </label>
            <br>
            <label>
                Contact: <input type="numeric" name="contact" autocomplete="off" required>
            </label>
            <br>
            <label>
                Email: <input type="email" name="email" autocomplete="off" required>
            </label>

            <br>
            <button name="submit">Submit</button>
            <br>
            <a href="index.php?page=faculty">Back</a>
        </form>
    </div>
</div>