

<?php


session_start();
if(isset($_POST['submit'])){
        include_once 'dbh.inc.php';
        include_once 'functions.inc.php';
        $username =mysqli_real_escape_string( $con ,$_POST['uid']) ;
        $pwd = mysqli_real_escape_string( $con ,$_POST['password']);

        // echo $name ;
        // echo $psw;
        // $query = "SELECT `userName`, `userEmail` , `userUid` FROM `users` WHERE `userName` = '$name' AND `userPws` = '$psw' ";

        // if($result =  mysqli_query($con, $query)){
        //     $user = mysqli_fetch_assoc($result);
        //     $_SESSION['userName'] = $user['userName'];
        //     $_SESSION['userEmail'] = $user['userEmail'];
        //     $_SESSION['userUid'] = $user['userUid'];

        //     // var_dump($user);

        //     mysqli_free_result($result);

        //     header('location: ../home.php');
        // }
        if(emptyInput(array($username, $pwd)) !== false){
            // $_SESSION['error'] = 'Enter All field';
            header('location: ../login.php?error=emptyInputs');
            exit();
        }
        loginUser($con,$username, $pwd);
    }
    else {
        
        header('location: ../login.php');
        exit();
    }