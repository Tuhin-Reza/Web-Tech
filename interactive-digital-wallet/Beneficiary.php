<?php
    $message=" ";
    session_start();
    $name=$_SESSION['person'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    	if (isset($_POST['submit'])){  
	    	$TC=$_POST['B_N'];
	 	    $MN =$_POST['M_N'];
	 	    $date =$_POST['to'];

            $c=$_SESSION['categroy'];
            $a=$_SESSION['amount'];

            //echo $name;
 
	 		$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "registration";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "INSERT INTO dwallet(Person,Transaction_Catetgory,P_Number,Amount,Transferred_on) VALUES (?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss",$Person,$Transaction_Catetgory,$P_Number,$Amount,$Transferred_on);

                $Person="$TC";
                $Transaction_Catetgory="$c";
                $P_Number="$MN";
                $Amount="$a";
                $Transferred_on="$date"; 
                $res = $stmt->execute();
                if ($res) { 
                    $message="$c SuccessFull" ;  
                }
                else {
                	$message="$c Failed" ; 
                }
                $conn->close();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		table, th, td {
        border: 1px solid black;
       }
    </style>
	<title>Beneficary</title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST" onsubmit="return isValid(this);">
		<h1>PAGE 2[Add Beneficiary]</h1>
	    <h3>Digital Wallet</h3>
	    <a href="Home.php">1.Home</a> 
	    <a href="Beneficiary.php">2.Add Beneficiary</a> 
	    <a href="Transaction.php">3.Transaction History</a>
	    <br><br>
	    <h3>Add Beneficiary</h3>
	    <label for="B_N">Beneficiary Name:</label>
	    <input type="text" id="B_N" name="B_N" value="<?php echo $name; ?>">
	    <span id="msg1"></span>
	    <label for="M_N">Mobile No:</label>
	    <input type="text" id="M_N" name="M_N">
	    <span id="msg2"></span><br><br>
	    <input type="datetime-local"id="to" name="to">
	    <span id="msg3"></span><br><br>
	    <input type="submit" name="submit"><br><br>
	    <span><?php echo $message ;?></span><br><br>
	    <?php
         	$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "registration";
           $conn = new mysqli($servername, $username, $password, $dbname);
           if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
           }
          $sql = "SELECT Person,P_Number FROM dwallet";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          	echo "<table><tr></tr>";
          	while($row = $result->fetch_assoc()) {
          		echo "<tr><td>" . $row["Person"]. "</td><td>" . $row["P_Number"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
                }
                $conn->close();
        ?>	    
	</form>
	<script >
		function isValid(jsForm) {
			const B_N = jsForm.B_N.value;
			const M_N = jsForm.M_N.value;
			const to = jsForm.to.value;
			if (B_N=== "") {
				document.getElementById("msg1").innerHTML = "Please Enter Beneficiary Name";
				return false;
			}
			if (M_N === "") {
				document.getElementById("msg2").innerHTML = "Please Enter Mobile Number";
				return false;
			}
			if (to === "") {
				document.getElementById("msg3").innerHTML = "Please Enter DateTime";
				return false;
			}
			return true;
		}
	</script>
</body>
</html>