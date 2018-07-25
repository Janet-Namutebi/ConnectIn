<?php
//session_start();
include('connection.php'); //database connection

if(isset($_SESSION["email"])) {
         $result = mysqli_query($bd, "SELECT email FROM `user` WHERE `email`='".$_SESSION["email"]."' LIMIT 1");
        
         if(mysqli_num_rows($result)) {
                 while($row = mysqli_fetch_array($result)) {
                 //$login_session = $row['username'];
                 $_SESSION["email"] = $row["email"];
                 }  
             }
         }
         else{

         	header('Location: index.php');
         }
?>