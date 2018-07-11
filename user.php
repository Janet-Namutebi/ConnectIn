<?php 
session_start();
require('db.php'); //database connection

if(isset($_POST['submit'] ))
{
	//declaring the variables to be stored in database
$username = $_POST['username'];
$password = $_POST['password'];
$pass = $_POST['pass'];
$email = $_POST['email'];

	if (isset($username) && isset($password) && isset($pass) && isset($email)) {
		//check if the passwords match
		if (isset($password) !== isset($pass) ) {
			echo "<script type= 'text/javascript'>alert('the password do not match');</script>";
		}
		$hassedPasword = md5($password);
		//storing values of the variables to their corresponding fields in the login table

		/* Select queries return a resultset */
		$result = $mysqli->query("INSERT INTO user (username,email,password) VALUES ('$username','$email','$hassedPasword')");
		if ($result) {
			header("Location:/connectin/index.php");
				//header("Location:home.php");
			
				}
				//header("Location:/connectin/index.php");
			}
}
		//login

if (isset($_POST['login'])) {
	$username = $_POST['username'];
    $password = $_POST['password'];
    $hasspass = md5($password);
   // check if not empty
     if(empty($username) || empty($password))
	       {
		     echo "Missing data";
	       }
         else
	       {

     //check if user exits
	       $consql = $mysqli->query("SELECT username, password FROM user WHERE username = '$username'");
		   
		   $count = mysqli_num_rows($consql);
		   
				      if($count > 0){
				      	
				      	while ($rowcon =mysqli_fetch_array($consql, MYSQLI_ASSOC)) {
				      		echo "<tr><td>" . $rowcon["username"];
				      		$_SESSION['username'] = $username;
				      		header("location:home.php");
				      	}
				      	
				       }
    mysqli_close($mysqli);
	}       	
 }
?>