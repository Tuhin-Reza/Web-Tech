<?php 
   session_start();
    if (count($_SESSION) === 0) {
    	header("Location: ../Controller/signout.php");
    }
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/change_password.css">
        <script src="js/footer.js" defer></script>
	<script src="js/forget_pass.js" defer></script>
	<title>Change Password</title>
</head>
<body>
	 <div class="header">
        <h1 >Airline Reservition Website</h1><br>
        <p class="abc"> <?php echo $_SESSION['uname'];?> ,       Welcome World Best Airline Ticket reservitin website</p>
    </div>
     <ul>
      <li><a href="home.php"class="btn btn-1">Home</a></li>
      <li><a href="profile.php"class="btn btn-1">Profile</a></li>
      <li><a href="change_password.php"class="btn btn-1">Change Password</a></li>
      <li><a href="update_profile.php"class="btn btn-1">Update Profile</a></li>
      <li  style="float:right"><a href="../Controller/signoutAction.php"  class="btn btn-1">SignOut</a></li> 
    </ul>
	<form name="registration" action="../Controller/change_passwordAction.php" method="POST" onsubmit="return validation(this);">
		<div class="img">
    	 <div class="option">
    	 	<h1 class="hedding">Change Password</h1>
    	 	<div class="border">
		<table>			
			<tr>
				<td class="label">Fixed User_Name</td>
				<td>
					<input type="text"class="input-box" name="username" id="username" value="<?php echo $_SESSION['uname'];?>" readonly>
					<span id="userErr"></span>
					<?php if(isset($_COOKIE["userErr"])) { 
						echo $_COOKIE["userErr"]; 
					  }
					?>
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
					?></span>
				</td>
			</tr>
			<tr>
				<td class="label">Enter_New_Confirm_Password</td>
				<td>
					<input type="password"class="input-box" name="cpass" id="cpass" placeholder="Enter Confirm Password ">
					<span class="error" id="cpassErr"></span>
					<span class="error"><?php if(isset($_COOKIE["cpassErr"])) { 
						echo $_COOKIE["cpassErr"]; 
					  }
					?></span>
				</td>
			</tr>
			<tr>
				<td>
					<input type="reset"class="submit" name="clear" value="Clear Form">
				</td>
				<td>
					<input type="submit"class="button" name="submit" id="submit" value="Update">
				</td>
			</tr>			
		</table>
		</div>
	</div>
		</div>
	</form>

    <?php
        include('inc/footer.php');
    ?>
</body>
</html>