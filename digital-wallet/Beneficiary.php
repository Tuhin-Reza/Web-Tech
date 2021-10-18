<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST">
		<h1>PAGE 2[Add Beneficiary]</h1>
	    <h3>Digital Wallet</h3>
	    <a href="Home.php">1.Home</a> 
	    <a href="Beneficiary.php">2.Add Beneficiary</a> 
	    <a href="Transaction_History.php">3.Transaction History</a>
	    <br><br>
	    <h3>Add Beneficiary</h3>
	    <label for="B_N">Beneficiary Name:</label>
	    <input type="text" id="B_N" name="B_N">
	    <label for="M_N">Mobile No:</label>
	    <input type="text" id="M_N" name="M_N">
	   <input type="submit" name="Submit">
	</form>

	<?php
	 	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	 	{
	 		$B_N =$_POST['B_N'];
	 	    $M_N =$_POST['M_N'];

	 	    if (empty($B_N)) {
	 	    	echo "Fill up the Beneficiary Name";
		    }
		    else if(empty($M_N)){
		    	echo "Fill up the Mobile No";
		    }
		    else{
		    	$B_N =validation( $_POST['B_N']);
	 	        $M_N =validation($_POST['M_N']);
	 	        $handle1 = fopen("data.json", "a");
	 	        $arr1 = array('B_N' => $B_N, 'M_N' => $M_N,);

	 	    $encode = json_encode($arr1);
	 	    $res = fwrite($handle1, $encode . "\n");
	        if ($res) {
	        	echo "Successfully saved";
	        }
	        else {
	        	echo "Error while saving";
		    }
         }
       function validation($data) {
       	 $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
  ?>
  <?php 

	$handle1 = fopen("data.json", "r");
	$data=fread($handle1, filesize("data.json"));
	?>

	<?php
	echo "<br>";
	$decode=json_decode($data);
	?>

	<?php 
	echo "<br>";
	$explode=explode("\n", $data);
	array_pop($explode);
	?>

	<?php
	echo "<br>";
	$arr1=array();
	for ($i=0; $i <count($explode) ; $i++) { 
		$json=json_decode($explode[$i]);
		array_push($arr1,$json);
	}
	?>

	<table border="1">
		<thead>
			<tr>
				<th>Beneficiary Name</th>
				<th>Mobile No</th>
			</tr>
		</thead>
		<tbody>
			<?php
			for ($k=0; $k <count($arr1) ; $k++) { 
			 	echo"<tr>";
			 	echo"<td>" .$arr1[$k]->B_N ."</td>";
			 	echo"<td>" .$arr1[$k]->M_N."</td>";
			 	echo"</tr>";
			 } 
			?>			
		</tbody>		
	</table>
</body>
</html>

