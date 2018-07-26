<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ConnectIn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link id="callCss" rel="stylesheet" href="themes/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8" />
  <link id="callCss" rel="stylesheet" href="themes/css/style.css" type="text/css" media="screen" charset="utf-8" />
  <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link rel="stylesheet" href="themes/font-awesome/css/font-awesome.min.css">

    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet">
    

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php 
 session_start();
include('session.php'); 
?>

</head>
<body data-spy="scroll" data-target=".navbar">
  <div id="headerSection">
  <div class="container">
    <h1 style="color: rgb(255,255,255);" class="brand cntr">ConnectIn</h1>
    <div class="navbar">
      <div class="nav-collapse">
        <ul class="nav">
          
          <li class="active"><a href="#carouselSection">Chats<i class="fa fa-pie-chart" style="font-size:24px;color: rgba(25,255,255,.9);"></i></a></li>
          <li><a href="#ourServices">Connections<i class="fa fa-users" style="font-size:24px;color: rgba(25,255,255,.9);"></i></a></li>
          <li><a href="#portfolioSection">Notifications<i class="fa fa-bell-o" style="font-size:24px;color: rgba(25,255,255,.9);"></i></a></li>
          <li><a href="#blogSection">Profile<i class="fa fa-user-o" style="font-size:24px;color: rgba(25,255,255,.9);"></i></a></li>
          
        </ul>
        
         
      </div>
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
  </div>
  </div>


<!-- Charts======================================== -->
<div id="carouselSection"> 
<div id="bodySection"> 
  <div class="container cntr">
      <h4>Your Chat</h4>
  <div id="testimonial" class="carousel slide">
        <p>
    <?php 
    include('chart.php'); 
    ?>
    </p>
     
    </div> 
  </div>
</div>
</div>
<!-- Connections======================================== -->
<div id="ourServices"> 
<div id="bodySection"> 
  <div class="container cntr">
      <h4>Your Connections</h4>
  <div id="testimonial" class="carousel slide">
        <p>
    <?php 
    include('connections.php'); 
    ?>
    </p>
     
    </div>

    
  </div>
</div>
</div>
<!-- Notifications======================================== -->
<div id="portfolioSection"> 
<div id="bodySection"> 
  <div class="container cntr">
      <h4>Your Notifications</h4>
      <div id="testimonial" class="carousel slide">
     
    </div>
  
  </div>
</div>
</div>
<!-- Notifications======================================== -->
<div id="blogSection">
<div id="bodySection"> 
  <div class="container cntr">
      <h4>Profile</h4>
      <div id="testimonial" class="carousel slide">
    <p><?php include('profile.php');  ?></p>
    
    

    <?php echo "<p>";
      echo "email:  ";
      echo $_SESSION['email'];
      echo "<br>";
      function logout(){
         unset($_SESSION['email']);
         header('Location: /connectin/index.php');
         exit();
       }
     if (isset($_GET['log'])) {
         logout();
       }
  ?>
         </p>
      <div>
        <p>  <br><a href="index.php?log=true">logout</a></p>
      </div>
    
  </div>
</div>
</div>

</body>
</html> 


