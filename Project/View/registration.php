<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/signup.js" defer></script>
	<script src="js/footer.js" defer></script>
	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<title>Sign up</title>
</head>
<body> 
	<form name="registration" action="../Controller/signupAction.php" method="POST" onsubmit="return validation(this);">
	<div class="header">
		<h1 >Airline Reservition Website</h1>
       <p class="abc">Welcome World Best Airline Ticket reservitin website</p>
   </div>
      <div class="main">    	
		<ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="signIn.php">Signin</a></li>
         <li><a href="registration.php">Signup</a></li>
         <li><a href="index.php">About</a></li>
      </ul>  
      <div class="form">
      	<div class="p1">
    		   <h4>SignUp</h4>
    	   </div>    
       
    	<table>
			<tr>
				<td class="ab">Enter First Name</td>
				<td>
					<input type="text"class="td2" name="fname" id="fname" placeholder="Enter First Name Here"><br>
					<span class="error" id="fnameErr"></span>
					<span class="error"><?php if(isset($_COOKIE["fnameErr"])) { 
						echo $_COOKIE["fnameErr"]; 
					  }
					  ?></span>
				
				</td>
			</tr>
			<tr>
				<td class="ab" >Enter Last Name</td>
				<td>
					<input type="text"class="td2" name="lname" id="lname" placeholder="Enter Last Name Here"><br>
					<span class="error" id="lnameErr"></span>
					<span class="error"><?php if(isset($_COOKIE["lnameErr"])) { 
						echo $_COOKIE["lnameErr"]; 
					  }
					  ?></span>
				</td>
			</tr>
			<tr>
				<td class="ab">Enter Email</td>
				<td>
					<input type="text"class="td2" name="mail" id="mail" placeholder="Enter E-mail Id Here"><br>
					<span class="error" id="mailErr"></span>
					<span class="error"><?php if(isset($_COOKIE["mailErr"])) { 
						echo $_COOKIE["mailErr"]; 
					  }
					 ?></span>
				</td>
			</tr>
			<tr>
				<td class="ab">Enter User_Name</td>
				<td>
					<input type="text"class="td2" name="username" id="username" placeholder="Enter User Name Here" onInput="checkUsername()"><br>
					<span class="error" id="userErr"></span>
					<span class="error"><?php if(isset($_COOKIE["userErr"])) { 
						echo $_COOKIE["userErr"]; 
					  }
					  ?></span>
				</td>
			</tr>
			<tr>
				<td class="ab">Enter Password</td>
				<td>
					<input type="password"class="td2" name="pass" id="pass" placeholder="Enter Password Here" onInput="checkpassword()"><br>
					<span class="error" id="passErr"></span>
					<span class="error"><?php if(isset($_COOKIE["passErr"])) { 
						echo $_COOKIE["passErr"]; 
					  }
					  ?></span>
				</td>
			</tr>
			<tr>
				<td class="ab">Enter Confirm Password</td>
				<td>
					<input type="password"class="td2" name="cpass" id="cpass" placeholder="Enter Confirm Password Here"><br>
					<span class="error" id="cpassErr"></span>
					<span class="error"><?php if(isset($_COOKIE["cpassErr"])) { 
						echo $_COOKIE["cpassErr"]; 
					  }
					  ?></span>
				</td>
			</tr>
			<tr>
				<td><input type="reset"class="reset" name="clear" value="Clear Form"></td>
				<td>
					<input type="submit"class="button" name="submit" id="submit" value="Create Account">
				</td>
			</tr>			
		</table><br>
		<label>Alreday Account Go to <a class="two" href="signin.php" target="_self"><b>Signin Page</label>
		</div>
      </div>
   </form>
   <div class="b">
 	   <h2>Airline Reservition Website</h2>
        <p id="demo"></p>
        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>, Coding Journey</p>
   </div>
</body>
</html>