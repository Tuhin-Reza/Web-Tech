<?php
   session_start();
    if (count($_SESSION) === 0) {
    	header("Location: ../Controller/signout.php");
    }
    include('../Controller/profileAction.php');
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="css/profile.css">
        <script src="js/footer.js" defer></script>
	<title>Profile Page</title>
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
    <div class="img">
    	 <div class="option">
    	 	<div class="border">
	<table>
			<tr>
				<td class="label">First_Name</td>
				<td>
					<input type="text"class="input-box" name="fname" id="fname" value="<?php echo $First_Name ;?>" readonly>
				</td>
			</tr>
			<tr>
				<td class="label">Last Name</td>
				<td>
					<input type="text"class="input-box"name="lname" id="lname" value="<?php echo $Last_Name ;?>" readonly>
				</td>
			</tr>
			<tr>
				<td class="label">Enter Email</td>
				<td>
					<input type="text"class="input-box" name="mail" id="mail" value="<?php echo $Email ;?>" readonly>
				</td>
			</tr>
			<tr>
				<td class="label">User_Name</td>
				<td>
					<input type="text"class="input-box"name="username" id="username" value="<?php echo $User_Name ;?>"readonly>
				</td>
			</tr>
			<tr>
				<td class="label">Password</td>
				<td>
					<input type="text"class="input-box" name="pass" id="pass" value="<?php echo $Password ;?>"readonly>
				</td>
			</tr>
		</table>
		</div>
	</div>
		</div>
    <?php
        include('inc/footer.php');
    ?>
</body>
</html>