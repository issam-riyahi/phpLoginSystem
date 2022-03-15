

<?php
    session_start() ;
    // var_dump($_SESSION);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="logo">
            <h1>Login</h1>
        </div>
        <ul>
            <li><a href="home.php">Home</a></li>
            
            
            <?php if(isset($_SESSION['userUid'])): ?>
                  
                <li><a href="profile.php">Your Profile</a></li>
                <li><a href="./includes/logout.inc.php">LogOut</a></li>
            <?php else : ?>
                <li><a href="login.php">login</a></li>
                <li><a href="signup.php">Sing Up </a></li>
            <?php endif ?> 
            <?php session_abort() ?>   
        </ul>
    </nav>