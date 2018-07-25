<?php
  
       session_start();
          include("connection.php"); // connect to the database
            include("session.php");
			
        $receivermsg =$_GET['send'];
        
		$sendermsg = $_SESSION["username"];

		$messages = mysqli_query($bd, "SELECT * FROM messages WHERE sendermsg = '$sendermsg' AND receivermsg = '$receivermsg'")or die(mysql_error());
		while ($text = mysqli_fetch_array($messages)) {
			echo $text['message'];

		}
		?>