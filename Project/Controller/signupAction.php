<?php
    session_start();
    $fnameErr=$lnameErr=$mailErr=$userErr=$passErr=$cpassErr=" ";
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $Fname=validation($_POST["fname"]);
        $Lname=validation($_POST["lname"]);
        $Mail=validation($_POST["mail"]);
        $Uname=validation($_POST["username"]);
        $Pass=validation($_POST["pass"]);
        $C_pass=validation($_POST["cpass"]);

        if (isset($_POST['submit'])){
            if (empty($Fname)) {
                $fnameErr = "First name Required";
                setcookie ("fnameErr",$fnameErr,time()+ 5,"/");
                header("Location:../View/signup.php");                
            }elseif (!preg_match("/^[a-zA-Z+]*$/",$Fname)) {
                $fnameErr = "Only letters and white space allowed";
                setcookie ("fnameErr",$fnameErr,time()+ 5,"/");
                header("Location:../View/signup.php");
            }elseif (empty($Lname)) {
                $lnameErr = "Last Name Required";
                setcookie ("lnameErr",$lnameErr,time()+ 5,"/");
                header("Location:../View/signup.php");
            }elseif (!preg_match("/^[a-zA-Z+]*$/",$Lname)) {
                $lnameErr = "Only letters and white space allowed";
                setcookie ("lnameErr",$lnameErr,time()+ 5,"/");
                header("Location:../View/signup.php");
            }elseif (empty($Mail)) {
                $mailErr = "Email Required";
                setcookie ("mailErr",$mailErr,time()+ 5,"/");
                header("Location:../View/signup.php");
            }elseif (!filter_var($Mail, FILTER_VALIDATE_EMAIL)) {
                $mailErr = "Please provide valid E-mail";
                setcookie ("mailErr",$mailErr,time()+ 5,"/");
                header("Location:../View/signup.php");
            }elseif (empty($Uname)) {
                $userErr = "User Name Required";
                setcookie ("userErr",$userErr,time()+ 5,"/");
                header("Location:../view/signup.php");
            }elseif (!preg_match("/^[a-zA-Z0-9+]*$/",$Uname)) {
                $userErr = "Only letters Number and white space allowed";
                setcookie ("userErr",$userErr,time()+ 5,"/");
                header("Location:../View/signup.php");
            }elseif (empty($Pass)) {
                $passErr="Password Required";
                setcookie ("passErr",$passErr,time()+ 5,"/");
                header("Location:../View/signup.php");
            }elseif (strlen($Pass) <4 ) {
                $passErr="Password minimum Length must be 4";           
                setcookie ("passErr",$passErr,time()+ 5,"/");
                header("Location:../View/signup.php");
            }elseif ($Pass != $C_pass) {
                $cpassErr="Password not match";
                setcookie ("cpassErr",$cpassErr,time()+ 5,"/");
                header("Location:../View/signup.php");
            }else{
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "INSERT INTO registration(First_Name,Last_Name,Email,User_Name,Password) VALUES (?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss",$First_Name,$Last_Name,$Email,$User_Name,$Password);
            
                $First_Name="$Fname ";
                $Last_Name="$Lname";            
                $Email="$Mail";
                $User_Name="$Uname";
                $Password="$Pass";

                $res = $stmt->execute();
                if ($res) {
                	$_SESSION['success']="Account Create SuccessFull";
                    header("Location:../View/output/output.php");
                }
                else {
                    $_SESSION['failed']="Account Create Failed";
                    header("Location:../View/output/output.php");
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