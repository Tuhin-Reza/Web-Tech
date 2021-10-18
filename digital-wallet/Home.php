<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<form>
		<h1>PAGE 1[Home]</h1>
	    <h3>Digital Wallet</h3>
	    <a href="Home.php">1.Home</a> 
	    <a href="Beneficiary.php">2.Add Beneficiary</a> 
	    <a href="Transaction_History.php">3.Transaction History</a>
	    <br><br>
	    <h3>Fund Transfer</h3>
	    <label for="category">Select Category:</label>
	    <select name="category"required>
	       	<option value ="sv">Select a value</option>
            <option value ="mrecharge">Mobile Recharge</option>
		    <option value ="mtransfer">Send Money</option>
	    </select><br><br>

	    <label for="to">To:</label>
	    <select name="to"required>
            <option value ="mrecharge"></option>
		    <option value ="mtransfer"></option>
	    </select><br><br>

	    <label for="amount">Amount :</label>
	    <input type="text" id="amount" name="amount" required>
	    <br><br>
	    <input type="submit" name="Submit">
	</form>

	<?php 
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$category =$_POST['category'];
	 	$to =$_POST['to'];
	 	$amount=$_POST["amount"];

		if ($category==='Select a value' and  empty($$category)) {
			echo "Select Category";
		}
		else{
			$category=validation( $_POST['category']);
	 	    $to =validation($_POST['to']);
	 	    $amount=validation($_POST["amount"]);
	 	    

	 	    $handle1 = fopen("data.json", "a");
	 	        $arr1 = array('Category' => $category, 'To' => $to,'Amount' => $amount,);

	 	    $encode = json_encode($arr1);
	 	    $res = fwrite($handle1, $encode . "\n");
	        if ($res) {
	        	echo "Successfully saved";
	        }
	        else {
	        	echo "Error while saving";
	        }
	    }
		
	}
	function validation($data){
		$data = trim($data);
		$data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 	        
	?>
	




</body>
</html>