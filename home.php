<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="./css/acs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php include('session.php'); ?>
</head>
<body>
<div class="maintab">
	<center><h1 style="color: rgba(51,168,255,.9);">C<img src="./images/share.jpg" height="30px" width="40px">nnectIn</h1></center>
</div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Chats')"><i class="fa fa-pie-chart" style="font-size:24px;color: rgba(255,255,255,.9);"></i></button>
  <button class="tablinks" onclick="openCity(event, 'Connections')"><i class="fa fa-users" style="font-size:24px;color: rgba(255,255,255,.9);"></i>
  </button>
  <button class="tablinks" onclick="openCity(event, 'Notifications')"><i class="fa fa-bell-o" style="font-size:24px;color: rgba(255,255,255,.9);"></i></button>
  <button class="tablinks" onclick="openCity(event, 'Profile')"><i class="fa fa-user-o" style="font-size:24px;color: rgba(255,255,255,.9);"></i></button>
</div>

<div id="Chats" class="tabcontent">
  <h3>Chats</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Connections" class="tabcontent">
  <h3>Connections</h3>
  <p><?php include('connections.php'); ?></p>
</div>

<div id="Notifications" class="tabcontent">
  <h3>Notifications</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Profile" class="tabcontent">
  <h3>Profile</h3>
  <p><?php echo "<table> <tr> <td>";
           echo $login_session;
           echo "</td><td><button>logout";
           //include('logout.php');
           echo "</button></td></tr></table>"; 
      ?></p>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
     
</body>
</html> 


