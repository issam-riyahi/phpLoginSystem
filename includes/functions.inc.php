

<?php 

    include_once 'dbh.inc.php';

    function emptyInput($inputs){
        for($i = 0 ; $i < count($inputs) ; $i += 1){
            if($inputs[$i] === ""){
                return true ;
            }
        }
        return false ;
    }
    
    function invalidUid($arg){
        if(preg_match('/^[a-zA-Z0-9]*$/i', $arg )){
            return false;
        }
        else {
            return true;
        }
    }


    function pswMatch($psw1  , $psw2){
        if($psw1 === $psw2){
            return false;

        }
        return true ;
    }

    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true ; 
        }
        return false ;
    }
    
    function uidExists($mysqli, $username , $userEmail){
        $sql = "SELECT * FROM `users` where `userUid` = ? OR `userEmail` = ? ;  ";
        $stmt = mysqli_stmt_init($mysqli);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header('location: ../signup.php?error=stmtfaild');
                exit();
            
        }
        
            mysqli_stmt_bind_param($stmt,'ss',$username, $userEmail);
            mysqli_stmt_execute($stmt);
            $resultData = mysqli_stmt_get_result($stmt);

            
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else {

            return false ;
        }
        echo 1;
        mysqli_stmt_close($stmt);
    }   

    
    

    function createUser($mysqli, $username, $userEmail, $userUid, $password){
        $query = "INSERT INTO `users`( `userName`, `userEmail`, `userUid`, `userPws`) VALUES (?, ?, ?, ? )";
        mysqli_query($mysqli, $query);
        $sql = "INSERT INTO `users`( `userName`, `userEmail`, `userUid`, `userPws`) VALUES (?, ?, ?, ? );";
        $stmt = mysqli_stmt_init($mysqli);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header('location: ../signup.php?error=uidExists');
                exit();
            
        }
        
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,'ssss',$username, $userEmail, $userUid, $hashPassword);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt); 
            header('location: ../signupsuccessful.html');
            exit();
        
        
    }


    function loginUser($mysqli, $username, $pwd){
        $uidExists = uidExists($mysqli, $username, $username);

        if($uidExists === false){
            header('location: ../login.php?error=uidNotExists');
            exit();
        }
        $hashedPwd = $uidExists['userPws'];
        
        $checkPwd = password_verify($pwd, $hashedPwd);

        if($checkPwd === false){
            header('location: ../login.php?error=passwordwrong');
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION['userName'] = $uidExists['userName'];
            $_SESSION['userEmail'] = $uidExists['userEmail'];
            $_SESSION['userUid'] = $uidExists['userUid'];
            header('location: ../home.php');
            exit();
        }
    }   
?>