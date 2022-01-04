<?php
    session_start();
    if (count($_SESSION) === 0) {
      header("Location:../Controller/signoutAction.php");
    }
    $userErr=$passErr="";
    if ($_SERVER['REQUEST_METHOD']==="POST") {
       $uname=validation($_POST["username"]);
       $pass=validation($_POST["pass"]);

        if (isset($_POST['submit'])){
           
            if (empty($uname)) {
                echo $userErr = "User Name Required";
                setcookie ("userErr",$userErr,time()+ 5,"/");
                header("Location:../View/signin.php");
            }elseif (empty($pass)) {
                $passErr="Password Required";
                setcookie ("passErr",$passErr,time()+ 5,"/");
                header("Location:../View/signin.php");
            }else{

                $servername="localhost";
                $username="root";
                $password="";
                $dbname="project";
                $conn= new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: ".$conn->connect_error);
                }
                $sql="SELECT  * FROM registration  WHERE User_Name = ? and Password = ?";
                $stmt=$conn->prepare($sql);
                $stmt->bind_param("ss",$User_Name,$Password,);

                $User_Name="$uname";
                $Password="$pass";
                $res=$stmt->execute();
                if ($res) {
                    $flag=false;
                    $data = $stmt->get_result();
                    if ($data->num_rows > 0) {
                        while ($row = $data->fetch_assoc()) {
                            if (!empty($_POST["remember"])) {
                                setcookie ("username",$uname,time()+ 60,"/");
                                header("Location:../View/signin.php");
                                $flag=true;
                                break;   
                            }else{
                                setcookie("username","");
                                $flag=true;
                                break;      
                            } 
                        }
                        if ($flag) {
                            $_SESSION['uname']=$row["User_Name"];
                            $_SESSION['pass']=$row["Password"];
                            header("Location:../View/home.php");
                        }else{
                            $_SESSION['success']="Login Failed";
                            header("Location:../View/output/fail.php");
                        }
                    }
                    else {
                        $_SESSION['fail']="Login Failed";
                        header("Location:../View/output/fail.php");
                    }
                }
                else {
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