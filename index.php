<!DOCTYPE html>
<html>
<head>
	<title>connectin</title>
	<link rel="stylesheet" type="text/css" href="./css/acs.css">
</head>
<body>
<div>
	
</div>

<div class="login-wrap">
    
	<div class="login-html">
		<h1>ConnectIn</h1>
		<p style="color: rgb(0,0,0);">ConnectIn helps you to connect with peope from different world class schools to share knowledge through disscussions and sharing pastpapers</p>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<input type="button" name ="login" class="button" value="Sign In with Facebook"/>
				</div>
				<form action="user.php" method="post">
				<div class="group">
					<label for="user" class="label">Email / Phone</label>
					<input id="username" type="text" name="email" class= "input"/>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="password" type="password" name="password" class="input" data-type="password"/>
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked/>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" name ="login" class="button" value="Sign In"/>
				</div>
			</form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<input type="button" name ="login" class="button" value="Sign Up with Facebook"/>
				</div>
				<form method="post" action="user.php">
				<div class="group">
					<label for="user" class="label">Firstname</label>
					<input type="text" name="firstname" class="input"/>
				</div>
				<div class="group">
					<label for="user" class="label">Last Name</label>
					<input type="text" name="lastname" class="input"/>
				</div>
				<div class="group">
					<label for="user" class="label">Gender</label>
					<select name="gender">
						<option value="female">Female</option>
						<option value="male">Male</option>
					</select>
				</div>
		        <div class="group">
					<label for="pass" class="label">Email / Phone </label>
					<input id="email" type="text" name="email" class="input"/>
				</div>
				<div class="group">
					<label for="user" class="label">School</label>
					<input id="Username" type="text" name="school" class="input"/>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="password2" type="password" name="password" class="input" data-type="password"/>
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass2" type="password" name="pass" class="input" data-type="password"/>
				</div>

				<div class="group">
					<input type="submit" name="submit"class="button" value="Sign Up"/>
				</div>
				</form>
	          
				
			</div>
		</div>
	</div>
</div>

</body>
</html>

