<!DOCTYPE html>
<html>
<head>
	<title>connectin</title>
	<link rel="stylesheet" type="text/css" href="./css/acs.css">
</head>
<body>

<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="user.php" method="post">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="username" type="text" name="username" class= "input"/>
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
				<form method="post" action="user.php">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="Username" type="text" name="username" class="input"/>
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
					<label for="pass" class="label">Email Address</label>
					<input id="email" type="text" name="email" class="input"/>
				</div>
				<div class="group">
					<input type="submit" name="submit"class="button" value="Sign Up"/>
				</div>

				</form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>

