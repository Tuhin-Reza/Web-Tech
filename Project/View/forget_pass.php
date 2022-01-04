<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/forget_pass.js" defer></script>
	<link rel="stylesheet" type="text/css" href="css/forget_pass.css">
	<script src="js/footer.js" defer></script>
	<title>Forget Password</title>
</head>
<body> 
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
    	<form name="registration" action="../Controller/forget_passAction.php" method="POST" onsubmit="return validation(this);">
		<div class="img">
    	<div class="option">
    	<h1 class="hedding">Change Password</h1>
    	<div class="border">
		<table>			
			<tr>
				<td class="label">Enter User_Name</td>
				<td>
					<input type="text"class="input-box" name="username" id="username" placeholder="Enter User Name Here"><br>
					<span class="error" id="userErr"></span>
					<span class="error"><?php  if(isset($_COOKIE["userErr"])) { 
						echo $_COOKIE["userErr"]; 
					  }
					?></span>
				</td>
			</tr>
			<tr>
				<td class="label">Enter_New_Password</td>
				<td>
					<input type="password"class="input-box" name="pass" id="pass" placeholder="Enter Password Here" onInput="checkpassword()"><br>
					<span class="error" id="passErr"></span>
					<span class="error"><?php if(isset($_COOKIE["passErr"])) { 
						echo $_COOKIE["passErr"]; 
					  }
					?>
					</span>
				</td>
			</tr>
			<tr>
				<td class="label">Enter_New_Confirm_Password</td>
				<td>
					<input type="password"class="input-box" name="cpass" id="cpass" placeholder="Enter Confirm Password "><br>
					<span class="error" id="cpassErr"></span>
					<span class="error"><?php if(isset($_COOKIE["cpassErr"])) { 
						echo $_COOKIE["cpassErr"]; 
					  }
					?>
					</span>
				</td>
			</tr>
			<tr>
				<td><input type="reset"class="submit" name="clear" value="Clear Form"></td>
				<td>
					<input type="submit"class="button" name="submit" id="submit" value="Update">
				</td>
			</tr>			
		</table>	
	</div>
		</div>	
	</div>
	</form>

</div>	

</form>
<div class="b">
 	    <h2>Airline Reservition Website</h2>
        <p id="demo"></p>
        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>, Coding Journey</p>
    </div>

</body>
</html>