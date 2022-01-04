<?php 
   session_start();
    if (count($_SESSION) === 0) {
      header("Location: ../Controller/signoutAction.php");
    }
    $error="";
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $Ticket_no=validation($_POST['Ticket_no']);
        $date=validation($_POST['date']);
        if (empty($Ticket_no)) {
            $error1="*Select Ticket Number";
            setcookie ("error1",$error1,time()+ 5,"/");
            header("Location:../View/booking_cancel.php");

        }if (empty($date)) {
            $error2="*Select Date";
            setcookie ("error2",$error2,time()+ 5,"/");
            header("Location:../View/booking_cancel.php");
        }else{ 
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="project";
            $conn= new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error);
            } 
            $sql = "DELETE FROM ticket_info WHERE Ticket_No = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s",$Ticket_No);
            $Ticket_No="$Ticket_no";
            /*$Journey_Date="$date";*/
            $res=$stmt->execute();
           if ($res> 0) {               
                $_SESSION['success']="Booking Cancel SuccesFull";
                //header("Location:../View/output/cancel_booking_out.php");
                include('../View/output/cancel_booking_out.php');                                        
            }
            else {
                $_SESSION['failed']="Booking Cancel Failed";
                include('../View/output/cancel_booking_out.php');
            }
            $conn->close();
        }
    }function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?> 
