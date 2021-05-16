<?php 
  $serverName = "localhost";
  $userName = "root";
  $userPassword = "";
  $dbName = "carefirst";

  $con = new mysqli($serverName,$userName,$userPassword,$dbName);
  if(!$con){
      die("Connection Failed: ".$con->error);
  }

?>