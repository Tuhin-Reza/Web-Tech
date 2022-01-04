<?php
 include('../Controller/view_Book_TicketAction.php');


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/book_Ticket.js" defer></script>
	<title></title>
</head>
<body>
	<form  id="myDIV" name="search" action="book_Ticket.php" method="POST" onsubmit="sendData(this);return false;">

	 <select name="Ticket_no" id="Ticket_no">
            <option value="">Ticket Number</option>
            <?php while($row1 = mysqli_fetch_array($result1)):;?>
            <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
            <?php endwhile;?>
        </select><br>
        <span id="error1"></span>
		<span><?php if(isset($_COOKIE["error1"])) { echo $_COOKIE["error1"]; }?></span>
<?php
 include('../Controller/view_Book_TicketAction.php');


?>
         <select name="date" id="date">
            <option value="">Date</option>
            <?php while($row1 = mysqli_fetch_array($result1)):;?>
            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
            <?php endwhile;?>
        </select><br>
        <span id="error2"></span>
		<span><?php if(isset($_COOKIE["error2"])) { echo $_COOKIE["error2"]; }?></span>


        <input type="submit" name="submit" id="submit" value="Search">
        <button onclick="myFunction()">View ALl Ticket</button>
        <p id="msg"></p>
        </form>
      
         <p id="content"></p>

       
</body>
</html>