<?php
//session_start();
require_once('db.php'); //database connection
   
  ///connections
  try {

  	$consql = $mysqli->query("SELECT username, password FROM user WHERE NOT username = '$login_session'");
   
   $count = mysqli_num_rows($consql);
   
		      if($count > 0){
		      	echo "<table>";
		      	while ($rowcon =mysqli_fetch_array($consql, MYSQLI_ASSOC)) {
		      		echo "<tr><td>" . $rowcon["username"];
		      		
		      		echo "</td> <td><button>connect</button></td> </tr>";
		      	}
		      	echo "</table>";
		       }
    mysqli_close($mysqli);
  	
  } catch (Exception $e) {
  	
  }
   
?>