<?php
       session_start();
          include("connection.php"); // connect to the database
          include("session.php");


          $receiver=$_GET['send'];
           $sender= $_SESSION["email"];


            $query = mysqli_query($bd, "SELECT * FROM request WHERE receiver = '" . $_SESSION["email"] . "' AND sender = '" . $_GET['send'] . "' OR receiver = '" . $_GET['send'] . "' AND sender = '" . $_SESSION["email"] . "'");

            if(mysqli_num_rows($query) > 0){
   
             $row = mysqli_fetch_array($query); 
             

             echo"
             <script type=\"text/javascript\">
							alert(\"Friend request already sent\");
							window.location='home.php';
						</script>

            ";

             }
	
           else{
   
             $query = mysqli_query($bd, "SELECT * FROM connections WHERE `myuser_id`='" . $_SESSION["username"] . "' AND `user_friend`='" . $_GET['send'] . "' OR`myuser_id`='" . $_GET['send'] . "' AND `user_friend`='" . $_SESSION["username"] . "'");
             
			 if(mysqli_num_rows($query) > 0){
    
	         $row = mysqli_fetch_array($query);

	         echo"
               <script type=\"text/javascript\">
							alert(\"Is already your friend\");
							window.location='home.php';
						</script>

              ";

            }

             else
     
	         {


              mysqli_query($bd, "INSERT INTO request(sender, receiver) VALUES('$sender','$receiver') ") or
              die(mysql_error());
            
			 {
		    
			           echo "<script type=\"text/javascript\">
							alert(\"friend request sent\");
							window.location='home.php';
						</script>";
			
		
               }
	          }
            }		
 
             ?>


   
    