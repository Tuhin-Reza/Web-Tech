 <?php  
    session_start();
    $flag=false;
    $fnameErr=$lnameErr=$error="";
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    	if (isset($_POST['submit'])){
        $start=validation($_POST['start']);
        $end=validation( $_POST['end']);
        if (empty($start)) {
                $fnameErr="*Select Origin1";
            }
        elseif(empty($end)){
             $lnameErr="*Select Destination2";
        }
        else{
            $flag=true;
        }
      }
      elseif(isset($_POST['submit2'])){
        $Flight_No=validation($_POST['Flight_No']);
        $Flight_Name=validation($_POST['Flight_Name']);
        $Origin=validation($_POST['Origin']);
        $Destination=validation($_POST['Destination']);
        $Take_Off=validation($_POST['Take_Off']);
        $Landing=validation($_POST['Landing']);
        $Class=validation($_POST['Class']);
        $Rate=validation($_POST['Rate']);
        $Route=validation($_POST['Route']);
        if (empty($Flight_No)) {
            $error="First Select Your FLight";         
        }elseif(empty($Flight_Name)){
            $error="First Select Your FLight";
        }
        elseif(empty($Origin)){
            $error="First Select Your FLight";  
        }elseif(empty($Destination)){
           $error="First Select Your FLight";  
        }elseif(empty($Take_Off)){
           $error="First Select Your FLight";  
        }elseif(empty($Landing)){
           $error="First Select Your FLight";  
        }elseif(empty($Class)){
           $error="First Select Your FLight";  
        }elseif(empty($Rate)){
           $error="First Select Your FLight";  
        }elseif(empty($Route)){
           $error="First Select Your FLight"; 
        }
        else{
            $_SESSION['Flight_No']=$Flight_No;
            $_SESSION['Flight_Name']=$Flight_Name;
            $_SESSION['Origin']=$Origin;
            $_SESSION['Destination']=$Destination;
            $_SESSION['Take_Off']=$Take_Off;
            $_SESSION['Landing']=$Landing;
            $_SESSION['Class']=$Class;
            $_SESSION['Rate']=$Rate;
            $_SESSION['Route']=$Route;
            header("Location:confirm_ticket.php");
        }
      }
    }function validation($data) {
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
     <script src="js/search_Flight.js" defer></script>
    <script src="js/clickrow.js" defer></script>
    <script src="js/footer.js" defer></script>
    <link rel="stylesheet" type="text/css" href="css/search_flight.css">
	<title>Search Flight//<?php echo $_SESSION['uname'];?></title>
</head>
<body>
    <?php
        include('inc/header.php');
    ?>
    <div class="main">
	<form name="search" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" onsubmit="return formValidation(this);">      
		<div class="flex-container">
			<div>
		        <select name="start" id="start" class="drop">
			        <option value="">Select Origin</option>
                    <option value="DAC">Hazrat Shahjalal International Airport(DHAKA)</option>
                    <option value="CGD">Shah Amanat International Airport(Chittagong)</option>
                    <option value="ZYL">Osmany International Airport(Sylet)</option>
                    <option value="COX">Cox's Bazar Airport(Cox's Bazar)</option>
                    <option value="RAJ">Shah Mokhdum Airport(Rajshahi)</option>
                </select><br>
                <span class="error" id="fnameErr"></span>
				<span class="error2"><?php echo $fnameErr ?> </span>
            </div>

            <div>
            <select name="end" id="end" class="drop">
                <option value="">Select Destination</option>
                <option value="DAC">Hazrat Shahjalal International Airport(DHAKA)</option>
                <option value="CGD">Shah Amanat International Airport(Chittagong)</option>
                <option value="ZYL">Osmany International Airport(Sylet)</option>
                <option value="COX">Cox's Bazar Airport(Cox's Bazar)</option>
                <option value="RAJ">Shah Mokhdum Airport(Rajshahi)</option>
                </select><br><span class="error2" id="lnameErr"></span>
                <span class="error2"><?php echo $lnameErr ?> </span>
            </div>
             <input type="submit"class="search" name="submit" value="Search">
		</div>		
	</form>
 
    <form>
	   	<p class="table_heading"><b>Flight Shedule</b></p>      
	   	<div class="tablebacground">
            <table  id="table" border="1" class="timecard">
                <tr>
                    <th>Flight_No</th>        
                    <th>Flight_Name</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Take_Off</th>
                    <th>Landing</th>
                    <th>Class</th>
                    <th>Rate</th>
                    <th>Route</th>          
                </tr>              
                <?php
                    $flag_2=false;
                    if ($flag){
                        $servername="localhost";
                        $username="root";
                        $password="";
                        $dbname="project";

                        $conn= new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: ".$conn->connect_error);
                        } 
                        $sql="SELECT * FROM flight_info WHERE Origin = ? and Destination = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ss",  $Origin, $Destination);
                        $Origin = "$start";
                        $Destination = "$end";
                        $res = $stmt->execute();
                        if ($res) {
                            $data = $stmt->get_result();
                            if ($data->num_rows > 0) {
                                while ($row = $data->fetch_assoc()) {
                                    echo "<tr>
                                        <td>" . $row["Flight_No"]. "</td>
                                        <td>" . $row["Flight_Name"]. "</td>
                                        <td>" . $row["Origin"]. "</td>
                                        <td>" . $row["Destination"]. "</td>
                                        <td>" . $row["Take_Off"]. "</td>
                                        <td>" . $row["Landing"]. "</td>
                                        <td>" . $row["Class"]. "</td>
                                        <td>" . $row["Rate"]. "</td>
                                        <td>" . $row["Route"]."</td>           
                                    </tr>";
                                    $flag_2=true;
                                }
                                echo "</table>";
                            }
                            if (!$flag_2) {
                                $b="Sorry. The flight option you are trying to book is not available. This usually occurs in case of limited seats being available or temporary non connectivity with the airline reservation system.Please, try again using a different date combination OR after a little while.If the problem persists, then call us on +8809617111888 for further assistance. Please Click to make a new search";                  
                            }
                        }//res
                        else {
                            echo "Error while executing the statement";
                        }
                        $conn->close();
                    }         
                ?>
            </table>
            <span class="notfound"><?php if (isset($b)){echo $b;}?></span><br><br>
        </div>
    </form>

    <form name="bookticket" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" onsubmit="return Validation(this);">
          <p class="table_heading2"><b>Booking Flight Shedule</b></p>
      	<div class="flex-container2">
        <div >
           <table id="table">
                <tr>
                   <td >Flight_No:</td>
                    <td>
                       <input type="text"class="input-box"name="Flight_No"id="Flight_No" readonly>
                    </td>                    
                </tr>
                <tr>
                    <td>Flight_Name:</td>
                    <td>
                       <input type="text" class="input-box"name="Flight_Name" id="Flight_Name" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Origin:</td>
                    <td>
                        <input type="text"class="input-box"name="Origin" id="Origin">
                    </td>
                </tr>
                <tr>
                    <td>Destination:</td>
                    <td>
                        <input type="text"class="input-box"name="Destination"id="Destination" readonly>
                    </td>
                </tr>
                <tr>
                  <td>Take_Off:</td>
                    <td>
                        <input type="text"class="input-box"name="Take_Off"id="Take_Off" readonly>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <table id="table">
                <tr>
                    <td>Landing:</td>
                    <td>
                        <input type="text"class="input-box"name="Landing"id="Landing" readonly>
                    </td>
                </tr>
                <tr>
                  <td>Class:</td>
                    <td>
                        <input type="text"class="input-box"name="Class"id="Class" readonly>
                    </td>
                </tr>
                <tr>
                  <td>Rate:</td>
                    <td>
                        <input type="text"class="input-box"name="Rate"id="Rate" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Route:</td>
                    <td>
                        <input type="text"class="input-box"name="Route"id="Route" readonly>
                    </td>
                </tr>
                <tr>
                  <td></td>
                    <td>
                      <input type="submit"class="book"name="submit2"value="Book Ticket">
                    </td>
                </tr>
            </table>
            <span class="error2" id="error"></span>    
            <span class="error2"><?php echo $error ?> </span> 
        </div>
        </div>
    </form>
    <button class="back"onclick="window.location.href = 'home.php';">Back
    </button>
 </div>
 <?php
    include('inc/footer.php');
  ?>
</body>
</html>