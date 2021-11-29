<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration";

    $connect = new mysqli($servername, $username, $password, $dbname);
    $query = "SELECT * FROM `dwallet`";
    $result1 = mysqli_query($connect, $query);

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $categroy=validation($_POST["Categroy"]);
        $person=validation($_POST["To"]);
        $amount=validation($_POST["amount"]);
        echo  $categroy;

        session_start();
        $_SESSION['categroy']=$categroy;
        $_SESSION['person']=$person;
        $_SESSION['amount']=$amount;

        header("Location:Beneficiary.php");
    }
    function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST" onsubmit="return isValid(this);">
         <h1>PAGE 1[Home]</h1>
        <h3>Digital Wallet</h3>
        <a href="Home.php">1.Home</a> 
        <a href="Beneficiary.php">2.Add Beneficiary</a> 
        <a href="Transaction.php">3.Transaction History</a>
        <br><br>
        <h3>Fund Transfer</h3>

        <select name="Categroy" id="Categroy">
            <option value="">Select Categroy</option>
            <option value ="Mobile Recharge">Mobile Recharge</option>
            <option value ="Money Transfer">Send Money</option>
        </select><span id="msg1"></span><br><br>

        <select name="To" id="To">
            <option value="">To</option>
            <?php while($row1 = mysqli_fetch_array($result1)):;?>
            <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
            <?php endwhile;?>
        </select><br><br>

        <label for="amount">Amount :</label>
        <input type="text" id="amount" name="amount">
        <span id="msg2"></span>
        <br><br>
        <input type="submit" name="submit1">
    </form>
    <script >
        function isValid(jsForm) {
            const amount = jsForm.amount.value;
            const categroy= document.getElementById("Categroy");
            if (categroy.value === "") {
                document.getElementById("msg1").innerHTML = "Select Your Categroy";
                return false;
            }else{
                document.getElementById("msg1").innerHTML = " ";
            }
            if (amount === "") {
                document.getElementById("msg2").innerHTML = "Please Enter Your Amount";
                return false;
            } 
            else{
                document.getElementById("msg").innerHTML = " ";
            }
            return true;
        }
    </script>
        
    </form>


</body>
</html>