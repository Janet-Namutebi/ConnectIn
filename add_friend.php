  <?php
  
       session_start();
          include("connection.php"); // connect to the database
            include("session.php");
			
        $acceptfriend=$_GET['accept'];
        
		$me= $_SESSION["username"];
		

		$addfriend = mysqli_query($bd, "INSERT INTO connections(myuser_id,user_friend) VALUES('$me','$acceptfriend') ") or die(mysql_error());
		
		
	    $deleterequest = mysqli_query($bd, "DELETE FROM request WHERE receiver = '$me' AND sender = '$acceptfriend' OR receiver ='$acceptfriend' AND sender ='$me'") or die(mysql_error());
    {
		echo "<script type=\"text/javascript\">
							alert(\"friend added\");
							window.location='home.php';
						</script>";
	  }
	
	
  ?>