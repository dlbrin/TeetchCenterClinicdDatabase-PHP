<?php include 'include/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <form class="login" method="POST" action="modal/login.inc.php">
        <div class="logo"><img src="assets/images/logo.png" alt=""></div>
        <div style="color: red; font-size: 24px;">  
        <?php
        if(isset($_SESSION['empty'])){
            echo $_SESSION['empty'];
            session_unset();
        }?>
        </div>  
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button name="adminlogin">Login</button>
    </form>
</body>
</html>