

<?php


 $serverName = 'localhost';
 $DbUsername = 'root';
 $dBPasword = '';
 $DbName = 'phpProjectLogin';


 $con = mysqli_connect($serverName, $DbUsername, $dBPasword, $DbName);

 if(!$con){
     die("Connection failed : " . mysqli_connect_errno());
 }