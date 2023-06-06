<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" />
    <title>Login</title>
</head>

<body>
    <?php
    include "includes/include.php";
    ?>
    <div class="container">
        <form action="includes/login-inc.php" method="POST">
            <h2>Admin Login</h2>

            <div class="input-box">
                <span class="icon">
                    <img src="icon/icons8-user-24.png" alt="" /></span>
                <input type="text" placeholder="Username" name="username" required autocomplete="off" autofocus />
            </div>
            <div class="input-box">
                <span class="icon">
                    <img src="icon/icons8-lock-24.png" alt="" /></span>
                <input type="password" placeholder="Password" name="password" required autocomplete="off" autofocus />
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>

</html>