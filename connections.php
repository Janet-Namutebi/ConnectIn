  <?php
  //session_start();
     include("connection.php"); // connect to the database
     include("session.php");
              
   ?>    
   <body>   
    <div>
      <?php
						 /* select the names of the login from the database */
              $user_id = $_SESSION["username"];		
                   
               $result = mysqli_query($bd, "SELECT username FROM `user` WHERE `username`='$user_id' LIMIT 1");

               $count = mysqli_num_rows($result);
                if($count > 0){
				      	
				      	while ($rowcon =mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				      		echo "<tr><td>Logged in as ";
				      		echo "" . $rowcon["username"];
				      	}
				      	
				       }
                  	?> 

                 <div id="">
				  <?php
						 /* select the names of the login from the database */
                            
                        $user_id=$_SESSION["username"];		

                         $result = mysqli_query($bd, "SELECT * FROM `user` WHERE NOT `username`='$user_id'");

                          while($row = mysqli_fetch_array($result)) {
						     $memberid = $row["username"];

                           /* below check if the friend is already your friend */
                             
                           /* display all members apart from the logged in user*/
								// echo"<p style='position:absolute; top:90px; left:20px; font-size:16px; color:white;'>People you may know,</p>"; 
								// echo"<div>";
								// echo $allrow['username'];
									
								// echo $allrow['user_id'];
									
								// echo "</div>";	
								// echo'<a href="process.php?send='.$allrow['username'].'"><div">Connect</div></a><br>';  
		      //                    echo "</table>";

                            $user_id=$_SESSION["username"];							
						    $post = mysqli_query($bd, "SELECT * FROM connections WHERE myuser_id = '$user_id' AND user_friend='$memberid' OR user_friend = '$user_id' AND myuser_id='$memberid'")or die(mysql_error());
								
							$num_rows  =mysqli_num_rows($post);
							
							if ($num_rows != 0 ){

							while($row = mysqli_fetch_array($post)){
				
						    $myfriend = $memberid;
							$user_id=$_SESSION["username"];
								
							if($myfriend == $user_id){
									
							$myfriend1 = $row['user_friend'];
							$friends = mysqli_query($bd, "SELECT * FROM user WHERE user_id = '$myfriend1'")or die(mysql_error());
							$friendsa = mysqli_fetch_array($friends);
							// echo"";		  
							// echo" <div id='button_style'>Friends $memberid</div> ";
       //                      echo'<hr class="line_1"> ';
									    
							}else{
										
							$friends = mysqli_query($bd, "SELECT * FROM user WHERE username = '$myfriend'")or die(mysql_error());
							$friendsa = mysqli_fetch_array($friends);
							echo"<p style='position:absolute; top:90px; left:20px; font-size:16px; color:white;'>People you may know,</p>"; 
                            
							echo'<div align="left">'.$friendsa['username']." ".$friendsa['user_id'].'</div> ';	
							 echo'<a href="process.php?send='.$friendsa['username'].'" class="retweet_link"><div id="button_style1">Connect</div></a><br>';	
							 
							 
							echo'<hr class="line_1" width="150px" style="position:absolute;left:10px;"> ';
							echo'<br>';
									
							}
									
								}
								
								} else
							
							{

						   echo"<p style='position:absolute; top:90px; left:20px; font-size:16px; color:white;'>People you may know,</p>"; 
                            
							echo'<div align="left">'.$row['username']." ".$row['user_id'].'</div> ';	
							 echo'<a href="process.php?send='.$row['username'].'" class="retweet_link"><div id="button_style1">Connect</div></a><br>';	
							 
							 
							echo'<hr class="line_1" width="150px" style="position:absolute;left:10px;"> ';
							echo'<br>';
							
							} 
		                     }
						?>
						   
						   </div>
						
						
						
					 
					<div id="friend_div">
					 
					 
					 
					
						 <?php
						    echo"<div>";
									    echo '<p style="color:green; margin: -19px 0px 0px -53px; font-size:16px;">Your friends</p>';
							 $user_id=$_SESSION["username"];							
							 $post = mysqli_query($bd, "SELECT * FROM connections WHERE myuser_id = '$user_id' OR user_friend = '$user_id' ");
								
							     $num_rows  =mysqli_num_rows($post);
							
							     if ($num_rows != 0 ) {

							  	while($row = mysqli_fetch_array($post)){
				
								    $myfriend = $row['myuser_id'];
								    $user_id=$_SESSION["username"];
								    
								
									if($myfriend == $user_id){
									
										$myfriend1 = $row['user_friend'];
										$friends = mysqli_query($bd, "SELECT * FROM user WHERE username = '$myfriend1'")or die(mysql_error());
										while($friendsa = mysqli_fetch_array($friends)) {
									
										echo $friendsa['username'];
										echo $friendsa['user_id'];
										echo '</p></a><div><a href="delete_friend.php?delete=' .$friendsa['username'].' ">Unfriend</a> </div> ';
										
										   echo'</div>';
										  }  
										}
									}
									
								}else{
								
								  echo"<div id='myfriend_div'>";
								  
									echo 'You don\'t have friends </li>';
										}
										
									echo'</div>';	
								
							   ?>
					
					
					 
					 </div>
					 
					 
					 
					 <div>
					 <?php
						 //Section for showing friendship requests
				         $user_id=$_SESSION["username"];
                         $query = mysqli_query($bd, "SELECT * FROM request WHERE receiver = '$user_id'");
                                 if(mysqli_num_rows($query) > 0) { 
                                 	while($row = mysqli_fetch_array($query)) { 
                                 		$sender = $row['sender'];
								        $_query = mysqli_query($bd, "SELECT * FROM user WHERE username = '$sender'");
								         while ($_row = mysqli_fetch_array($_query)) {
								      	
                                       echo $_row['username'];
                                       echo $_row['user_id'];
                                       echo '<br>
										 <a href="add_friend.php?accept=' .$_row['username'].' ">Accept</a><br>
					                     <a href="delete_friend_request.php?accept=' .$_row['username'].'">Reject</a>
		                                 
										 <hr>';
						
								      }
								 }
	                        
                              }else{ 
						        echo"<div class='myfriend_div1'>
						   
						   		You do not have any friend pending  </li> </div>";
									
								}

                            
					 ?>
					 </div>
					</div>
			</body>
	