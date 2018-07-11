<?php
session_start();
require('db.php'); //database connection
//require('connections.php');
   try {
   	$user_check = $_SESSION['username'];
   
   $ses_sql = $mysqli->query("select username from user where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];

   if(!isset($_SESSION['username'])){
      header("location:/connectin/index.php");
   }
   	
   } catch (Exception $e) {
   	
   }
   
?>