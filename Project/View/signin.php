<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/signin.js" defer></script>
	<link rel="stylesheet" type="text/css" href="css/signIN.css">
	<title>Sign in</title>
</head>
 <body>
	<div class="b">
		<div>
		<form name="registration" action="../Controller/signinAction.php" method="POST" onsubmit="return validation(this);">
			<h1 class="headding">Sign In</h1>

			
				<div class="input-box">
				<input type='text' class="input-box2" name='username' id="username" placeholder="User_Name" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"><br>
		    </div>

		   <div class="input-box3">
			<input type="password"class="input-box2"  name='pass' id="pass" placeholder="Password">

			</div>

			<label class="chbox1">
			<input type="checkbox" onclick="myFunction()"> <small>Show Password</small>
			<label class="chbox2">
			<input type="checkbox" name="remember" id="remember"><small>Remember</small><br>
			
				

			<div class="error">
			<span id="userErr"></span>
				<?php if(isset($_COOKIE["userErr"])) { 
					echo $_COOKIE["userErr"]; 
				 }
		        ?>
		        <span id="passErr"></span>
				<?php if(isset($_COOKIE["passErr"])) { 
				    echo $_COOKIE["passErr"]; 
			    }
		        ?><br>
		        </div>
	    	<input type="submit"class="login-btn" name="submit" value="Signin"><br>

		    <div class="bottom-links">
		    	Don't have an account? <a class="two" href="registration.php">Sign Up</a><br><br><a class="two" href="forget_pass.php">Forgot your password?</a>
		    </div>
	</form>
	</div>
	 </div>

</body>
</html>