

<?php 

    $errorMeassge = 'The Username or Password doesn\'t matchs';

?>




<?php include 'header.php' ?>



<div class="login">
    <h2>Login</h2>
    <div class="error-message <?php echo  isset($_GET['error']) ? 'active' : '' ?> ">
        <p><?php echo  $errorMeassge ?></p>
    </div>
    <form action="./includes/login.inc.php" method="POST">
        
        <input type="text" name="uid" id="uid" placeholder="Username/Email...">
        <input type="password" name="password" id="psw" placeholder="Password">
        <button type="submit" id="login" name="submit">Login</button>
    </form>
</div>
<?php include 'footer.php' ?>