 <?php
  session_start();
     include("connection.php"); // connect to the database
     include("session.php");
              
   ?>    

   <center>
    
    	<table>
    		<tr>
    			<th><p style="color:green;padding: 40px; margin: -10px 0px 0px -53px; font-size:16px;">Your Charts </p></th>
    			<th><p style="color:green;padding: 40px; margin: -10px 0px 0px -53px; font-size:16px;">People You can chart with </p></th>
    		</tr>
    		<tr>
    			<td>
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
									    echo '<p style="color:blue;padding: 40px; margin: -10px 0px 0px -53px; font-size:16px;">';
										echo $friendsa['firstname'];
										echo $friendsa['lastname'];

										echo '<a href="delete_friend.php?delete=' .$friendsa['email'].' ">  Send Message</a> ';
										  
										  }  
										}else{
										$myfriend1 = $row['myuser_id'];
										$friends = mysqli_query($bd, "SELECT * FROM user WHERE email = '$myfriend1'") or die(mysql_error());
										while($friendsa = mysqli_fetch_array($friends)) {
									    echo '<p style="color:blue;padding: 40px; margin: -10px 0px 0px -53px; font-size:16px;">';
										echo $friendsa['firstname'];
										echo $friendsa['lastname'];

										echo '<a href="delete_friend.php?delete=' .$friendsa['email'].' ">  Send Message</a> ';
										echo "</p>";
										   
										  }  
										}
									}
									
								}else{
								
								 
								  
									echo 'You don\'t have friends </li>';
										}
										
										
								
							   ?>
					

				</td>
			</tr>
		</table>
	</center>