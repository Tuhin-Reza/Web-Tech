<?php 
   session_start();
    if (count($_SESSION) === 0) {
        header("Location: ../Controller/signout.php");
    }
    $User_Name=$_SESSION['uname'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/footer.js" defer></script>
    <link rel="stylesheet" type="text/css" href="css/view_book_ticket1.css">
	<title></title>
</head>
<body>
	<form>
        <div class="tablebacground">
	   	    <p class="table_heading"><b>Airline Information</b></p>      
            <table>
                <tr>
                    <th>Ticket_No</th>
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
                        $servername="localhost";
                        $username="root";
                        $password="";
                        $dbname="project";

                        $conn= new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: ".$conn->connect_error);
                        } 
                        $sql="SELECT * FROM ticket_info WHERE User_Name = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s",$User_Name);
                        $User_Name="$User_Name";
                       
                        $res = $stmt->execute();
                        if ($res) {
                            $data = $stmt->get_result();
                            if ($data->num_rows > 0) {
                                while ($row = $data->fetch_assoc()) {
                                    echo "<tr>
                                         <td>" . $row["Ticket_No"]."</td>
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
                                $b="Your Histroy Empty";                  
                            }
                        }//res
                        else {
                            echo "Error while executing the statement";
                        }
                        $conn->close();        
                ?>
            </table>
            <span class="error"><?php if (isset($b)){echo $b;}?></span>

            <p class="table_heading2"><b>Customer Information</b></p>      
            <table  id="table">
                <tr>
                    <th>Ticket_No</th>
                    <th>Journey_Date</th>
                    <th>User_Name</th>        
                    <th>Full_Name</th>
                    <th>National_ID</th>
                    <th>Passport_Number</th>
                    <th>Passport_Serial</th>
                    <th>Phone_Number</th>
                    <th>Age</th>
                    <th>Person</th> 
                    <th>Gender</th>        
                </tr>              
                <?php
                    $flag_2=false;
                        $servername="localhost";
                        $username="root";
                        $password="";
                        $dbname="project";

                        $conn= new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: ".$conn->connect_error);
                        } 
                        $sql="SELECT * FROM ticket_info WHERE User_Name = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s",$User_Name);
                        $User_Name="$User_Name";
                       
                        $res = $stmt->execute();
                        if ($res) {
                            $data = $stmt->get_result();
                            if ($data->num_rows > 0) {
                                while ($row = $data->fetch_assoc()) {
                                    echo "<tr>
                                        <td>" . $row["Ticket_No"]."</td>
                                        <td>" . $row["Journey_Date"]."</td>
                                        <td>" . $row["User_Name"]."</td>
                                        <td>" . $row["Full_Name"]."</td>
                                        <td>" . $row["National_ID"]."</td>
                                        <td>" . $row["Passport_Number"]."</td>
                                        <td>" . $row["Passport_Serial"]."</td>
                                        <td>" . $row["Phone_Number"]."</td>
                                        <td>" . $row["Age"]."</td> 
                                        <td>" . $row["Person"]."</td> 
                                        <td>" . $row["Gender"]."</td>         
                                    </tr>";
                                    $flag_2=true;
                                }
                                echo "</table>";
                            }
                            if (!$flag_2) {
                                $b="Your Histroy Empty";                  
                            }
                        }//res
                        else {
                            echo "Error while executing the statement";
                        }
                        $conn->close();        
                ?>
            </table>
            <span class="error"><?php if (isset($b)){echo $b;}?></span><br><br>
        </div>
    </form>
        <button class="back"onclick="window.location.href = 'view_book_ticket.php';">OK
</body>
</html>