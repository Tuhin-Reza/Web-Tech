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
   <script src="js/footer.js" defer></script>
	<script src="js/view_book_ticket.js" defer></script>
  <link rel="stylesheet" type="text/css" href="css/view_ticket.css">
	<title>View Book Ticket//<?php echo $_SESSION['uname'];?></title>
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
  <form  name="search" action="book_Ticket.php" method="POST" onsubmit="sendData(this);return false;">
    <div class="img">
      <div id="myDIV">
        <?php
          include('../Controller/view_book_ticket_radiobutton.php');
        ?>
        <div class="flex-container">
          <div>
            <select name="Ticket_no" id="Ticket_no" class="drop">
              <option value="">Ticket Number</option>
                <?php while($row1 = mysqli_fetch_array($result1)):;?>
                  <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
                <?php endwhile;?>
            </select><br>
               <span class="error" id="error1"></span>
		           <span class="error"><?php if(isset($_COOKIE["error1"])) { echo $_COOKIE["error1"]; }?></span>
          </div>
            <?php
              include('../Controller/view_book_ticket_radiobutton.php');
            ?>
            <div>
              <select name="date" id="date" class="drop">
                <option value="">Date</option>
                  <?php while($row1 = mysqli_fetch_array($result1)):;?>
                      <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
                  <?php endwhile;?>
              </select><br>
                 <span class="error2" id="error2"></span>
                 <span class="error2"><?php if(isset($_COOKIE["error2"])) { echo $_COOKIE["error2"]; }?></span>
            </div>
               <input type="submit" class="search" name="submit" id="submit" value="Search">
               <button class="search" onclick="myFunction()">View ALL Ticket</button>
        </div>
           <p id="msg"></p>
           <button class="back"onclick="window.location.href = 'home.php';">Back
      </div><!--mydiv-->
         <p id="content"></p>
    </div>
  </form>
    <?php
        include('inc/footer.php');
    ?> 
</body>
</html>