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
    			<th><p style="color:green;padding: 40px; margin: -10px 0px 0px -53px; font-size:16px;">People You May Know </p></th>
    			<th><p style="color:green; padding: 40px;margin: -10px 0px 0px -53px; font-size:16px;">Your friends</p> </th>
    			<th><p style="color:green;padding: 40px; margin: -10px 0px 0px -53px; font-size:16px;">Friend requests </p> </th>
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
				      		echo "" . $rowcon["firstname"];
				      		echo " " . $rowcon["lastname"];
				      		echo "<br>studies from  <br>" . $rowcon["school"];
				      	}
				      	
				       }
                  	?> 
              </td>
              <td>
                
 <?php
						 /* people you may know */
                            
        $user_id=$_SESSION["email"];		

        $result = mysqli_query($bd, "SELECT * FROM `user` WHERE NOT `email`='$user_id'");

            while($row = mysqli_fetch_array($result)) {
				$memberid = $row["email"];

                $user_id=$_SESSION["email"];							
	            $post = mysqli_query($bd, "SELECT * FROM connections WHERE myuser_id = '$user_id' AND user_friend='$memberid' OR user_friend = '$user_id' AND myuser_id='$memberid'")or die(mysql_error());
								
				$num_rows  =mysqli_num_rows($post);
							
			   if ($num_rows != 0 ){

					while($row = mysqli_fetch_array($post)){
				
				    $myfriend = $memberid;
					$user_id=$_SESSION["email"];
								
					if($myfriend == $user_id){
									
						$myfriend1 = $row['user_friend'];
						$friends = mysqli_query($bd, "SELECT * FROM user WHERE email = '$myfriend1'")or die(mysql_error());
						$friendsa = mysqli_fetch_array($friends);
							
						}else{
										
							$friends = mysqli_query($bd, "SELECT * FROM user WHERE email = '$myfriend'")or die(mysql_error());
							$friendsa = mysqli_fetch_array($friends);
									
							}
									
								}
								
								} else
							
							{

						   echo"<p style='position:absolute; top:90px; left:20px; font-size:16px; color:white;'>People you may know,</p>"; 
                            
							echo'<div align="left">'.$row['firstname']." ".$row['lastname'].'</div> ';	
							echo "<br>studies from  <br>" . $row["school"];
							 echo'<a href="process.php?send='.$row['email'].'" class="retweet_link"><div id="button_style1">Connect</div></a><br>';	
							 
							 
							echo'<hr class="line_1" width="150px" style="position:absolute;left:10px;"> ';
							echo'<br>';
							
							} 
		                     }
						?>
				</td>
				<td>

						 <?php
						    
							//Your friends 
							 $user_id=$_SESSION["email"];							
							 $post = mysqli_query($bd, "SELECT * FROM connections WHERE myuser_id = '$user_id' OR user_friend = '$user_id' ");
								
							     $num_rows  =mysqli_num_rows($post);
							
							     if ($num_rows != 0 ) {

							  	while($row = mysqli_fetch_array($post)){
				
								    $myfriend = $row['myuser_id'];
								    $user_id=$_SESSION["email"];
                                    $myfriend1 = $row['user_friend'];

									if($myfriend == $user_id){
									
										$myfriend1 = $row['user_friend'];
										$friends = mysqli_query($bd, "SELECT * FROM user WHERE email = '$myfriend1'") or die(mysql_error());
										while($friendsa = mysqli_fetch_array($friends)) {
									    echo '<p style="padding: 40px; margin: -10px 0px 0px -53px; font-size:16px;">';
										echo $friendsa['firstname'];
										echo $friendsa['lastname'];
										echo "<br>studies from  <br>" . $friendsa["school"];

										echo '<a href="delete_friend.php?delete=' .$friendsa['email'].' ">  Unfriend</a> ';
										  
										  }  
										}else{
										$myfriend1 = $row['myuser_id'];
										$friends = mysqli_query($bd, "SELECT * FROM user WHERE email = '$myfriend1'") or die(mysql_error());
										while($friendsa = mysqli_fetch_array($friends)) {
									    echo '<p style="padding: 40px; margin: -10px 0px 0px -53px; font-size:16px;">';
										echo $friendsa['firstname'];
										echo $friendsa['lastname'];
										echo "<br>studies from  <br>" . $friendsa["school"];

										echo '<a href="delete_friend.php?delete=' .$friendsa['email'].' ">  Unfriend</a> ';
										echo "</p>";
										   
										  }  
										}
									}
									
								}else{
								
								 
								  
									echo 'None </li>';
										}
										
										
								
							   ?>
					
					
					 
					 </div>
				</td>
				<td>
					 
					 
					
					 <?php
						 //showing friendship requests
				         $user_id=$_SESSION["email"];
                         $query = mysqli_query($bd, "SELECT * FROM request WHERE receiver = '$user_id'");
                                 if(mysqli_num_rows($query) > 0) { 
                                 	while($row = mysqli_fetch_array($query)) { 
                                 		$sender = $row['sender'];
								        $_query = mysqli_query($bd, "SELECT * FROM user WHERE email = '$sender'");
								         while ($_row = mysqli_fetch_array($_query)) {
								       echo '<p style="color:blue;padding: 40px; margin: -10px 0px 0px -53px; font-size:16px;">';
                                       echo $_row['firstname'];
                                       echo $_row['lastname'];
                                       echo "<br>studies from  <br>" . $_row["school"];
                                       echo '<br>
										 <a href="add_friend.php?accept=' .$_row['email'].' ">Accept</a><br>
					                     <a href="delete_friend_request.php?accept=' .$_row['email'].'">Reject</a>
		                                 
										 </p>';
						
								      }
								 }
	                        
                              }else{ 
						        echo"<div class='myfriend_div1'>
						   
						   		None  </li> </div>";
									
								}

                            
					 ?>
					</td>
				</tr>
			</table>
		</center>
			</body>
	