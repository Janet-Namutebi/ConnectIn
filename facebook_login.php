<?php
require_once './config.php';
ob_start();
// Only if user is logged in and given permission, we can fetch user details
if ($userID) {
  try {
    if ($_SESSION["email"] == "") {
      // fetch user details.
      $user_profile = $facebook->api('/me');

      // Now check if user exist with same email ID
      $sql = "SELECT COUNT(*) AS count from user where email = :email_id";
      try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":email_id", $user_profile["email"]);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if ($result[0]["count"] > 0) {
          // User Exist 

          $_SESSION["password"] = $user_profile["password"];
          $_SESSION["email"] = $user_profile["email"];
          $_SESSION["new_user"] = "no";
        } else {
          // New user, Insert in database
          $sql = "INSERT INTO `user` (firstname,lastname,gender,school,email,password) VALUES " . "( :firstname, :lastname, :gender, :school, :email, :password)";
          $stmt = $DB->prepare($sql);
          $stmt->bindValue(":firstname", $user_profile["firstname"]);
          $stmt->bindValue(":lastname", $user_profile["lastname"]);
          $stmt->bindValue(":gender", $user_profile["gender"]);
          $stmt->bindValue(":email", $user_profile["email"]);
          $stmt->bindValue(":school", $user_profile["school"]);
          $stmt->bindValue(":password", $user_profile["password"]);

          $stmt->execute();
          $result = $stmt->rowCount();
          if ($result > 0) {
            $_SESSION["firstname"] = $user_profile["firstname"];
            $_SESSION["lastname"] = $user_profile["lastname"];
            $_SESSION["gender"] = $user_profile["gender"];
            $_SESSION["school"] = $user_profile["school"];
            $_SESSION["email"] = $user_profile["email"];
            $_SESSION["new_user"] = "yes";
          }
        }
      } catch (Exception $ex) {
        #echo $ex->getMessage();
      }
	  
	  header("location:home.php");
    }
    $_SESSION["user_id"] = $userID;
  } catch (FacebookApiException $e) {
    $userID = NULL;
  }
} else {
	// if not a authentic facebook user
	header("location:index.php");
}
ob_end_flush();
?>