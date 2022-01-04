<?php
   session_start();
    if (count($_SESSION) === 0) {
        header("Location: ../Controller/signout.php");
    }
    include('../Controller/profileAction.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/flights_details.css">
	  <script src="js/footer.js" defer></script>
	<title>Flights Details//<?php echo $_SESSION['uname'];?></title> 
</head>
<body>
	 <div class="header">
        <h1 >Airline Reservition Website</h1><br>
        <p class="abc"> <?php  echo $_SESSION['uname'];?> , Welcome World Best Airline Ticket reservitin website</p>
    </div>
     <ul>
      <li><a href="home.php"class="btn btn-1">Home</a></li>
      <li><a href="profile.php"class="btn btn-1">Profile</a></li>
      <li><a href="change_password.php"class="btn btn-1">Change Password</a></li>
      <li><a href="update_profile.php"class="btn btn-1">Update Profile</a></li>
      <li  style="float:right"><a href="../Controller/signoutAction.php"  class="btn btn-1">SignOut</a></li> 
    </ul>
	<div class="tablebacground">	
	<table>
		<tr>
		   <th>Flight_No</th>		  
		   <th>Flight_Name</th>
		   <th>Origion</th>
		   <th>Destination</th>
	    	<th>Take_Off</th>
		   <th>Landing</th>
		   <th>Class</th>
		   <th>Rate</th>
		   <th>Route</th>			
		</tr>
		<?php
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="project";
            $conn= new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                 die("Connection failed: ".$conn->connect_error);
            } 
            $sql="SELECT * FROM flight_info";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute();
            if ($res) {
	            $data = $stmt->get_result();
                $num=$data->num_rows;
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
		    	            <td>" . $row["Route"]. "</td>		    	   
		    	            </tr>";
		                } 
		                echo "</table>";
	                }
	                else {//$data
		                echo "No records found";
	                }
                }//res
                else {
	                echo "Error while executing the statement";
                }
                $conn->close();
        ?>					
	</table>
	 <button class="back"onclick="window.location.href = 'home.php';">Back
    </button>
    </div>
    <?php
        include('inc/footer.php');
    ?>
</body>
</html>