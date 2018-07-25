  <?php
  
       session_start();
          include("connection.php"); // connect to the database
            include("session.php");
			
        $receivermsg =$_GET['send'];
        
		$sendermsg = $_SESSION["username"];

		// $messages = mysqli_query($bd, "SELECT message_id, sendermsg, receivermsg, message, max(timedate) timedate FROM messages WHERE sendermsg = '$sendermsg' AND receivermsg = '$receivermsg' OR sendermsg = '$receivermsg' AND receivermsg = '$sendermsg'")or die(mysql_error());
		// while ($text = mysqli_fetch_array($messages)) {
		// 	echo '<p style="color:blue;">';
  //           echo $text['receivermsg'];
		//     echo '  </p><table><tr><td><p style="color:black;">';
		//     echo $text['message'];
		//     echo "  ...";
		//     echo $text['timedate'];
		//     echo "</p></td></tr></table>";
		// }


		?>
		<p>
			<form method="post">
			<input type="text" name="message"><input type="submit" name="submit" value="send">
			</form>
		</p>
	<?php
	if (isset($_POST['submit'])) {
		$message = $_POST['message'];
	
		$addfriend = mysqli_query($bd, "INSERT INTO messages(sendermsg,receivermsg,message) VALUES('$sendermsg','$receivermsg','$message') ") or die(mysql_error());
		
		echo "<script type=\"text/javascript\">
							alert(\"sent\");
							window.location='chart.php';
						</script>";
	  }
	
	
  ?>