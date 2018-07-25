<?php 
session_start();
require('connection.php'); //database connection

if(isset($_POST['submit'] ))
{
	//declaring the variables to be stored in database
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$school = $_POST['school'];
$password = $_POST['password'];
$pass = $_POST['pass'];


	if (isset($firstname) && isset($password) && isset($pass) && isset($email) && isset($school) && isset($lastname) && isset($gender)) {
		//check if the passwords match
		if (isset($password) !== isset($pass) ) {
			echo "<script type= 'text/javascript'>alert('the password do not match');</script>";
		}
		$hassedPasword = md5($password);
		//storing values of the variables to their corresponding fields in the login table

		/* Select queries return a resultset */
		$result = mysqli_query($bd, "INSERT INTO user (firstname,lastname,gender,school,email,password) VALUES ('$firstname','$lastname','$gender','$school','$email','$hassedPasword')");
		if ($result) {
			header("Location:index.php");
				//header("Location:home.php");
			
				}
				//header("Location:/connectin/index.php");
			}
}
		//login

if (isset($_POST['login'])) {
	$email = $_POST['email'];
    $password = $_POST['password'];
    $hasspass = md5($password);
    echo $email;
   // check if not empty
     if(empty($email) || empty($password))
	       {
		     echo "Missing data";
	       }
         else
	       {

	       //	echo "no Missing data"; die();

     //check if user exits
	       $consql = mysqli_query($bd, "SELECT email, password FROM user WHERE email = '$email'");
		   
		   $count = mysqli_num_rows($consql);
           
		   //print_r($consql); die();
		   
				      if($count > 0){
				      	
				      	while ($rowcon =mysqli_fetch_array($consql, MYSQLI_ASSOC)) {
				      		echo "<tr><td>" . $rowcon["email"];
				      		//die();
				      		$_SESSION['email'] = $email;
				      		
				      		header("location:home.php");
				      	}
				      	
				       }
				       else{
 	                       header("location:index.php");
                       }
    mysqli_close($mysqli);
	}       	
 }
 
?>