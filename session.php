<?php
//session_start();
include('connection.php'); //database connection

if(isset($_SESSION["username"])) {
         $result = mysqli_query($bd, "SELECT user_id FROM `user` WHERE `username`='".$_SESSION["username"]."' LIMIT 1");
        
         if(mysqli_num_rows($result)) {
                 while($row = mysqli_fetch_array($result)) {
                 //$login_session = $row['username'];
                 $_SESSION["SESS_MEMBER_ID"] = $row["user_id"];
                 }  
             }
         }
?>