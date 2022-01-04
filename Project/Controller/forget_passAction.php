<?php
    session_start();
    $userErr=$passErr=$cpassErr=" ";
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $uname=validation($_POST["username"]);
        $pass=validation($_POST["pass"]);
        $cpass=validation($_POST["cpass"]);
        if (isset($_POST['submit'])){
            if (empty($uname)) {
                $userErr = "User Name Required";
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
                $sql = "SELECT * FROM registration WHERE User_Name= ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s",$User_Name);
                $User_Name="$uname";             
                $res = $stmt->execute();

                if ($res) {
                   $data = $stmt->get_result();
                        if ($data->num_rows > 0) {
                            $sql = "UPDATE registration SET Password = ? WHERE User_Name= ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ss",$Password,$User_Name);
                            $User_Name="$uname";
                            $Password="$pass";
                            $res = $stmt->execute();
                                if ($res>0) {
                                    $_SESSION['success']="Password Recovery SuccessFully ";
                                    header("Location:../View/output/for_pass_out.php");
                                }
                                else {
                                    $_SESSION['failed']="Password Recovery Failed";
                                    header("Location:../View/output/for_pass_out.php");
                                }
                        }
                        else {
                            $userErr = "*User Name Not found";
                            setcookie ("userErr",$userErr,time()+ 5,"/");
                            header("Location:../View/forget_pass.php");
                        }
                }
                else {
                echo "Error while executing the statement";
                }
                /*$sql = "UPDATE registration SET Password = ? WHERE User_Name= ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss",$Password,$User_Name);
                $User_Name="$uname";
                $Password="$pass";
                $res = $stmt->execute();
                $result = $conn->query($sql);
                echo "Total Records ($result->num_rows)";*/
                /*if ($res) {
                    $data=$stmt->get_result();
                    if ($data->num_rows>0) {
                        while ($row=$data->fetch_assoc()) {
                            
                            echo " I ma working";
                        }
                    }
                   else {
                        echo "No records found";
                     }
                }
                 else {
                    echo "Error while executing the statement";
                }*/
               /* if ($res>0) {
                    $_SESSION['success']="Password Recovery SuccessFully ";
                    header("Location:../View/output/for_pass_out.php");
                }
                else {
                    $_SESSION['failed']="Password Recovery Failed";
                    header("Location:../View/output/for_pass_out.php");
                }*/
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