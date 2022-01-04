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
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <script src="js/footer.js" defer></script>
	<title>Home Page//<?php echo $_SESSION['uname'];?></title>
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
      <a href="flights_details.php"><input type="submit" class="but" value="View Flight Details"></a><br><br>
      <a href="search_Flight.php"><input type="submit" class="but" value="Book Flight Tickets"></a><br><br>
      <a href="view_book_ticket.php"><input type="submit" class="but" value="View Booked Flight Tickets"></a><br><br>
      <a href="booking_cancel.php"><input type="submit" class="but" value="Cancel Booked Flight Tickets"></a><br><br>
      <a href="registerd_complaint.php"><input type="submit" class="but" value="Registering Complaints"></a>
    </div>
    </div>


    <?php
        include('inc/footer.php');
    ?>
</body>
</html>