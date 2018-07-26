<?php
  //session_start();
     include("connection.php"); // connect to the database
     include("session.php");
              
   ?>    
   <body>   
   	<center>
    
    	<table>
    		<tr>
    			<th><p style="color:green;padding: 40px; margin: -10px 0px 0px -53px; font-size:16px;">Logged in as </p></th>
    		</tr>
    		<tr>
    			<td>
      <?php
						 /* Logged in as  */
              $user_id = $_SESSION["email"];		
                   
               $result = mysqli_query($bd, "SELECT * FROM `user` WHERE `email`='$user_id' LIMIT 1");

               $count = mysqli_num_rows($result);
                if($count > 0){
				      	
				      	while ($rowcon =mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				   //echo "<tr><td>Logged in as ";
				      		echo "Name: " . $rowcon["firstname"];
				      		echo " " . $rowcon["lastname"];
				      		echo "<br>Gender: " . $rowcon["gender"];
                  echo "<br>School: " . $rowcon["school"];
				      	}
				      	
				       }
                  	?> 
              </td>
              <td>