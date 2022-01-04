<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="header">
		<h1 >Airline Reservition Website</h1><br>
       <p class="abc"><?php echo $_SESSION['uname'];?>    ,Welcome World Best Airline Ticket reservitin website</p>
    </div>
    <ul>
      <li><a href="home.php"class="btn btn-1">Home</a></li>
      <li><a href="profile.php"class="btn btn-1">Profile</a></li>
      <li><a href="change_password.php"class="btn btn-1">Change Password</a></li>
      <li><a href="update_profile.php"class="btn btn-1">Update Profile</a></li>
      <li  style="float:right"><a href="../Controller/signoutAction.php"  class="btn btn-1">SignOut</a></li> 
    </ul>
</body>
</html>