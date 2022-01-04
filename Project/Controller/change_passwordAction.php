<?php
    session_start();
    if (count($_SESSION) === 0) {
      header("Location:../Controller/signoutAction.php");
    }
    $userErr=$passErr=$cpassErr=" ";
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $uname=validation($_POST["username"]);
        $pass=validation($_POST["pass"]);
        $cpass=validation($_POST["cpass"]);
        if (isset($_POST['submit'])){
            if (empty($uname)) {
                echo $userErr = "User Name Required";
                setcookie ("userErr",$userErr,time()+ 5,"/");
                header("Location:../View/forget_pass.php");
            }elseif (!preg_match("/^[a-zA-Z0-9+]*$/",$uname)) {
                $userErr = "Only letters Number and white space allowed";
                setcookie ("userErr",$userErr,time()+ 5,"/");
                header("Location:../View/forget_pass.php");          
            }elseif (empty($pass) ) {
                $passErr="Password Required";
                setcookie ("passErr",$passErr,time()+ 5,"/");
                header("Location:../View/forget_pass.php");             
            }elseif (strlen($pass) <4 ) {
                $passErr="Password minimum Length must be 4";           
                setcookie ("passErr",$passErr,time()+ 5,"/");
                header("Location:../View/forget_pass.php");            
            }elseif ($pass != $cpass) {
                $cpassErr="Password not match";
                setcookie ("cpassErr",$cpassErr,time()+ 5,"/");
                header("Location:../View/forget_pass.php");                            
            }else{
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "UPDATE registration SET Password = ? WHERE User_Name= ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss",$Password,$User_Name);
                $User_Name="$uname";
                $Password="$pass";
                $res = $stmt->execute();
                if ($res>0) {
                    header("Location: ../Controller/signoutAction.php");
                    //$_SESSION['success']="Password Change SuccessFully ";
                    //header("Location:../View/output/chn_pass_out.php");
                }
                else {
                    header("Location: ../Controller/signoutAction.php");
                   /* $_SESSION['failed']="Password Change Failed";
                    header("Location:../View/output/chn_pass_out.php");*/
                }
                $conn->close();
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