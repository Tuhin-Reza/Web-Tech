<?php  
    session_start();
    if (count($_SESSION) === 0) {
      header("Location:../Controller/signoutAction.php");
    }
    $uname=$_SESSION['uname'];
    $error="";
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $date=validation($_POST['date']);
        $fullname=validation($_POST['fullname']);
        $idnumber=validation($_POST['idnumber']);
        $passno=validation($_POST['passno']);
        $passserial=validation($_POST['passserial']);  
        $age=validation($_POST['age']);
        $Phone=validation($_POST['Phone']);
        $person=validation($_POST['person']);
        $gender=validation($_POST['gender']);
            if (isset($_POST['submit'])){
        		if(empty($date)){
                    $error="*Select Date php";
                    setcookie ("error1",$error,time()+ 5,"/");
                    header("Location:../View/confirm_Ticket.php");
        		}
        		elseif(empty($fullname)) {
        			$error="*Enter Fullname";
                    setcookie ("error2",$error,time()+ 5,"/");
                    header("Location:../View/confirm_Ticket.php");
        		}
        		elseif(strlen($idnumber)<5){
        			$error="*Enter National Id (min5) ";
                    setcookie ("error3",$error,time()+ 5,"/");
                    header("Location:../View/confirm_Ticket.php");
        		}
        		elseif(strlen($passno)<5) {
                    $error="*Enter Passport Number(M5)";
                    setcookie ("error4",$error,time()+ 5,"/");
                    header("Location:../View/confirm_Ticket.php");   			       			
        		}elseif(strlen($passserial)<5) {
        			$error="*Enter Passport Serial(M5)";
                    setcookie ("error5",$error,time()+ 5,"/");
                    header("Location:../View/confirm_Ticket.php");
        		}elseif(empty($age)) {
        			$error="*Enter Age ";
                    setcookie ("error6",$error,time()+ 5,"/");
                    header("Location:../View/confirm_Ticket.php");
        		}elseif(empty($Phone)) {
        			$error="*Enter Phone Number";
                    setcookie ("error7",$error,time()+ 5,"/");
                    header("Location:../View/confirm_Ticket.php");
        		}elseif(empty($person)) {
        			$error="*Select Person";
                    setcookie ("error8",$error,time()+ 5,"/");
                    header("Location:../View/confirm_Ticket.php");
        		}elseif(empty($gender)) {
        			$error="*Select Gender ";
                    setcookie ("error9",$error,time()+ 5,"/");
                    header("Location:../View/confirm_Ticket.php");
        		}else{
                    $Flight_No=$_SESSION['Flight_No'];
                    $Flight_Name=$_SESSION['Flight_Name'];
                    $Origin=$_SESSION['Origin'];
                    $Destination=$_SESSION['Destination'];
                    $Take_Off=$_SESSION['Take_Off'];
                    $Landing=$_SESSION['Landing'];
                    $Class=$_SESSION['Class'];
                    $Rate=$_SESSION['Rate'];
                    $Route=$_SESSION['Route'];

        	        $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "INSERT INTO ticket_info(Journey_Date,User_Name,Full_Name,National_ID,Passport_Number,Passport_Serial,Phone_Number,Age,Person,Gender,Flight_No,Flight_Name,Origin,Destination,Take_Off,Landing,Class,Rate,Route) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssssssssssssssssss",$Journey_Date, $User_Name,$Full_Name,$National_ID,$Passport_Number,$Passport_Serial,$Phone_Number,$Age,$Person,$Gender,$Flight_No,$Flight_Name,$Origin,$Destination,$Take_Off,$Landing,$Class,$Rate,$Route);
                        
                    $Journey_Date="$date";
                    $User_Name="$uname";
                    $Full_Name="$fullname"; 
                    $National_ID="$idnumber";
                    $Passport_Number="$passno";
                    $Passport_Serial="$passserial";
                    $Phone_Number="$Phone";
                    $Age="$age";
                    $Person="$person";
                    $Gender="$gender";    
                    $Flight_No="$Flight_No";
                    $Flight_Name="$Flight_Name";
                    $Origin="$Origin";
                    $Destination="$Destination";
                    $Take_Off="$Take_Off";
                    $Landing="$Landing";
                    $Class="$Class";
                    $Rate="$Rate";
                    $Route="$Route";

                    $res = $stmt->execute();
                    if ($res) {                       
                        $_SESSION['success']="Ticket Reservation Successfull";
                         include('../View/output/con_fir_tcket_out.php');
                        //header("Location:../View/output/con_fir_tcket_out.php");
                    }
                    else { 
                        $_SESSION['failed']="Ticket Reservation Failed";
                         include('../View/output/con_fir_tcket_out.php');
                        //header("Location:../View/output/con_fir_tcket_out.php");
                       
                    }       			
    		    }    
     	    }
        }function validation($data) {
    	   $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
      }     
 ?>
