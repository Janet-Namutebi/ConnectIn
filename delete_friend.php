  <?php
  session_start();
          include("connection.php"); // connect to the database
            include("session.php");

    $myfriend=$_GET['delete'];
    $me= $_SESSION["email"];
    
     $query = mysqli_query($bd, "delete from connections WHERE myuser_id = '" . $_SESSION["email"] . "' AND user_friend = '" . $_GET['delete'] . "' OR myuser_id = '" . $_GET['delete'] . "' AND user_friend = '" . $_SESSION["email"] . "' ");
     {
		echo "<script type=\"text/javascript\">
							alert(\"friend has been deleted\");
							window.location='home.php';
						</script>";
			
		
		}
	
	
  ?>