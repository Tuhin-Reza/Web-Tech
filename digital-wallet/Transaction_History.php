<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST">
		<h1>PAGE 3[Transaction History]</h1>
	    <h3>Digital Wallet</h3>
	    <a href="Home.php">Home</a> 
	    <a href="Beneficiary.php">2.Add Beneficiary</a> 
	    <a href="Transaction_History.php">3.Transaction History</a>
	    <br><br>
	    <label for="form">Form:</label>
	    <input type="datetime-local"name="form">
	    <label for="to">To:</label>
	   <input type="datetime-local"name="to">
	   <input type="submit" name="search" value="search">
	</form>
</body>
</html>

