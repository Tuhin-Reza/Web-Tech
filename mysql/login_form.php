<?php 
    $message="";
    if ($_SERVER['REQUEST_METHOD']==="POST") {
        $Uname=validation($_POST["username"]);
        $Pass=validation($_POST["psw"]);
        if (isset($_POST['submit'])){
            if (empty($Uname) or empty($Pass)) {
                $message= "Invalid username and password";
            }else{
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "registration";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT  * FROM table1 WHERE Username = ? and Password = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss",$username,$password, );
                $Username = "'$Uname'";
                $Password = "'$Pass'";
                $res = $stmt->execute();
                if ($res) {
                    header("Location:welcome.php");
                }
                else {
                    echo "Login failed ";
                }
            }
        }
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
    <title>Sign in</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body style="background-color:<?php echo $color;?>;">
    
    <fieldset style="width:350px; height: 150px;">
        <legend>Sign in</legend>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST">           
            <b>UserName :</b><input type='text' name='username' placeholder="User Name"><br><br>
            <b>Password :</b><input type='password' name='psw' placeholder="Password"><br><br>
            <span class="error"> <?php echo $message;?></span><br>              
            <input type='submit' name='submit' value='Sign in' >
        </form>       
    </fieldset>
   
</body>
</html>
