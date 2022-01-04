<?php
   session_start();
    /*if (count($_SESSION) === 0) {
      header("Location: ../Controller/signout.php");
    }*/
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/registerd_complaint.js" defer></script>
	<script src="js/footer.js" defer></script>
	<link rel="stylesheet" type="text/css" href="css/registerd_complaint.css">
	<title>Opinion//<?php echo $_SESSION['uname'];?></title>
</head>
<body>
	 <div class="header">
    <h1 >Airline Reservition Website</h1><br>
    <p class="abc"> <?php echo $_SESSION['uname'];?> ,Welcome World Best Airline Ticket reservitin website</p>
  </div>
  <ul>
    <li><a href="home.php"class="btn btn-1">Home</a></li>
    <li><a href="profile.php"class="btn btn-1">Profile</a></li>
    <li><a href="change_password.php"class="btn btn-1">Change Password</a></li>
    <li><a href="update_profile.php"class="btn btn-1">Update Profile</a></li>
    <li  style="float:right"><a href="../Controller/signoutAction.php"  class="btn btn-1">SignOut</a></li> 
  </ul>
  <main>
  <article>
	<form name="jsForm" action="../Controller/registerd_complaintAction.php" method="POST" onsubmit="return isValid(this);">

		<div class="background">
		<div class="box">
		<label for="opinion">Give your opinion</label><br>
		<textarea id="opinion" name="opinion"></textarea>
		<span class="error"><p class="error" id="msg"></p></span>

		<input  type="submit" class="submit" value="Submit">
		</div>
		</div>

	</form>
	  </article>
	  <button class="back"onclick="window.location.href = 'home.php';">Back
    </button>
</main>
	  <?php
        include('inc/footer.php');
    ?> 


</body>
</html>