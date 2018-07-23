  <?php

       session_start();
       include("connection.php"); // connect to the database
       include("session.php"); //get the id (member_id) for the login user

       $myfriend=$_GET['accept'];
       $me= $_SESSION["username"];
       $query = mysqli_query($bd, "delete from request WHERE receiver = '$me' AND sender = '$myfriend' OR receiver = '$myfriend' AND sender = '$me' ");
    
     
	 {
		echo "<script type=\"text/javascript\">
							alert(\"friend request deleted\");
							window.location='home.php';
						</script>";
			
		
	}
	
	
  ?>