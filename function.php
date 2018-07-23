

                    <?php

					    include("connection.php");
						if(isset($_SESSION["SESS_MEMBER_ID"])) {
						$result = mysqli_query($bd, "SELECT user_id FROM `user` WHERE `user_id`='".$_SESSION["SESS_MEMBER_ID"]."' LIMIT 1");
						if(mysqli_num_rows($result)) {
                        $row = mysqli_fetch_array($result);
                         $_SESSION["SESS_MEMBER_ID"] = $row["user_id"];
						 
                       }
			       }
				   
	
                     ?> 



					 





                    				 
						
					   					   
