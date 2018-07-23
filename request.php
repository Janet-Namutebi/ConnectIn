<?php
//session_start();
require_once('db.php'); //database connection
   
  ///connections
  try {
   // requet
  	
  	function connect(){
  		$request = $mysqli->query("INSERT INTO request (username,friend,status) VALUES ('$login_session','$user','request-sent')");
	
	    if($request){

			 return true;
			}
	}
	
	if (isset($_GET['request'])) {

		connect();
		echo "request sent";
	 }