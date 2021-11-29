<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
table, th, td {
    border: 1px solid black;
}
</style>
    <title>Transaction</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST" onsubmit="return isValid(this);">
        <h1>PAGE 3[Transaction History]</h1>
        <h3>Digital Wallet</h3>
        <a href="Home.php">1.Home</a> 
        <a href="Beneficiary.php">2.Add Beneficiary</a> 
        <a href="Transaction.php">3.Transaction History</a>
        <br><br>
        <label for="form">Form:</label>
        <input type="datetime-local" id="form"   name="form">
        <span id="msg1"></span>
        <label for="to">To:</label>
       <input type="datetime-local" id="to" name="to">
       <span id="msg2"></span>
       <input type="submit" name="search" value="search"><br><br>
    </form>
     
    <script >
        function isValid(jsForm) {
            const form = jsForm.form.value;
            const to = jsForm.to.value;

            if (form=== "") {
                document.getElementById("msg1").innerHTML = "Select Form Time";
                return false;
            }
            if (to === "") {
                document.getElementById("msg2").innerHTML = "Select To Time";
                return false;
            }
            return true;
        }
    </script>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST['search'])){ 
               $Form=$_POST['form'];
               $MN =$_POST['to'];

               $servername = "localhost";
               $username = "root";
               $password = "";
               $dbname = "registration";
               $conn = new mysqli($servername, $username, $password, $dbname);
               if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM dwallet";
                $result = $conn->query($sql);
                echo "Total Records ($result->num_rows)";
                if ($result->num_rows > 0) {
                   echo "<table><tr><th>Transaction_Catetgory</th><th>P_Number</th><th>Amount</th><th>Transferred_on</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Transaction_Catetgory"]. "</td><td>" . $row["P_Number"]. " </td><td>" . $row["Amount"]. "</td><td>" . $row["Transferred_on"]. "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $conn->close();
   
            }
        }
    ?>
             
</body>
</html>	    