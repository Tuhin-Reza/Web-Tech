<?php
   session_start();
    if (count($_SESSION) === 0) {
    	header("Location: ../Controller/signout.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
    <script src="js/confirm_ticket.js" defer></script>
    <script src="js/footer.js" defer></script>
    <link rel="stylesheet" type="text/css" href="css/confirm_ticket.css">
	<title>Confirm Ticket</title>
</head>
<body>
	<?php
        include('inc/header.php');
    ?>
	<div class="main">
		<form name="confirm_ticket" class="background" action="../Controller/confirm_ticketAction.php" method="POST" onsubmit="return formValidation(this);">
		<h5 class="heading">Booking Information</h5>
		<div class="flex-container">		
			<div>
			<table>			
     			<tr>
                    <td class="ab">Flight_No:</td>
                    <td>
                    	<input type="text"class="td2"name="Flight_No"id="Flight_No" value="<?php echo $_SESSION['Flight_No'];?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td class="ab">Flight_Name:</td>
                    <td><input type="text" class="td2" name="Flight_Name" id="Flight_Name" value="<?php echo $_SESSION['Flight_Name'];?>" readonly></td>
                </tr>
                <tr>
                    <td class="ab">Origin:</td>
                    <td><input type="text" class="td2" name="Origin" id="Origin" value="<?php echo $_SESSION['Origin'];?>"></td>
                </tr>
                <tr>
                    <td class="ab">Destination:</td>
                    <td><input type="text"class="td2" name="Destination"id="Destination" value="<?php echo $_SESSION['Destination'];?>" readonly></td>
                </tr>
                <tr>
                    <td class="ab">Take_Off:</td>
                    <td><input type="text" class="td2" name="Take_Off"id="Take_Off" value="<?php echo $_SESSION['Take_Off'];?>" readonly></td>
                </tr>
                <tr>
                    <td class="ab">Landing:</td>
                    <td><input type="text"class="td2" name="Landing"id="Landing" value="<?php echo $_SESSION['Landing'];?>" readonly></td>
                </tr>
                <tr> 
                    <td class="ab">Class:</td>
                    <td><input type="text"class="td2" name="Class"id="Class" value="<?php echo $_SESSION['Class'];?>" readonly></td>
                </tr>
                <tr>
                    <td class="ab">Rate:</td>
                    <td><input type="text"class="td2" name="Rate"id="Rate" value="<?php echo $_SESSION['Rate'];?>" readonly></td>
                </tr>
                <tr>
                    <td class="ab">Route:</td>
                    <td><input type="text"class="td2" name="Route"id="Route" value="<?php echo $_SESSION['Route'];?>" readonly></td>
                </tr>
                <tr>
                    <td class="ab">User Name:</td>
                    <td><input type="text"class="td2" name="username"id="username" value="<?php echo  $_SESSION['uname'];?>" readonly></td>
                </tr>
            </table>
            </div>
            <div>
            	<table>
                  <tr >
				    <td class="ab">Select Journey Date</td>
				    <td>
				    	<input type="date"class="td2" name="date"id="date"><br>
				    	<span class="error" id="error1"></span>
				    	<span class="error"><?php if(isset($_COOKIE["error1"])) { 	
						    echo $_COOKIE["error1"]; 
					       }
					    ?>
					    </span>

				    </td>
			    </tr>
			    <tr>
		        	<td class="ab">Full Name:</td>
			        <td>
			        	<input type="text"class="td2" name="fullname" id="fullname"><br>
			        	<span class="error" id="error2"></span>
			        	<span class="error"><?php if(isset($_COOKIE["error2"])) { 	
						    echo $_COOKIE["error2"]; 
					       }
					    ?>
					    </span>

			        </td>
		        </tr>
		        <tr>
		        	<td class="ab">National_Id_Number</td>
			        <td>
			        	<input type="number"class="td2" name="idnumber" id="idnumber" min="0"><br>
			        	<span class="error" id="error3"></span>
			            <span class="error"><?php if(isset($_COOKIE["error3"])) { 	
						    echo $_COOKIE["error3"]; 
					       }
					    ?>
					    </span>
			        </td>
			      
		        </tr>
		        <tr>
		        	<td class="ab">Passport_NO: </td>
		        	<td>
		        		<input type="number"class="td2"name="passno" id="passno" min="0"><br>
		        		<span class="error" id="error4"></span>
		        		<span class="error"><?php if(isset($_COOKIE["error4"])) { 	
						    echo $_COOKIE["error4"]; 
					       }
					    ?>
					    </span>
		        	</td>
		        	
		        </tr>
		        <tr>
		            <td class="ab">Passport_Serial</td>
			       <td>
			       	<input type="number"class="td2" name="passserial" id="passserial" min="0"><br>
			       	<span class="error" id="error5"></span>
			        <span class="error"><?php if(isset($_COOKIE["error5"])) { 	
						    echo $_COOKIE["error5"]; 
					       }
					    ?>
					    </span>
			       </td>
		        </tr>
		        <tr>
		         	<td class="ab">Age:</td>
			        <td>
			        	<input type="number"class="td2" name="age" id="age" min="0"><br>
			        	<span class="error" id="error6"></span>
			        	<span class="error"><?php if(isset($_COOKIE["error6"])) { 	
						    echo $_COOKIE["error6"]; 
					       }
					    ?>
					    </span>
			        </td>
			        
		        </tr>
		        <tr>
		        	<td class="ab">Phone_Number</td>
		        	<td>
		        		<input type="tel"class="td2" name="Phone" id="Phone" placeholder="xxx-xx-xxxxxx" pattern="[0-9]{3}-[0-9]{2}-[0-9]{6}"><br>
		        		<span class="error" id="error7"></span>
		        		<span class="error"><?php if(isset($_COOKIE["error7"])) { 	
						    echo $_COOKIE["error7"]; 
					       }
					    ?>
					    </span>
		        	</td>
		        	

		        </tr>
		        <tr>
			        <td class="ab">Person :</td>
		     	    <td><br>
				        <input type="radio"  name="person" id="person"value="adult">Adult(<12)
	                    <input type="radio" name="person"id="person"value="children" >Children(2-11)
	                    <input type="radio" name="person" id="person"value="infant">Infant(<2)<br>
	                    <span class="error" id="error8"></span>
	                    <span class="error"><?php if(isset($_COOKIE["error8"])) { 	
						    echo $_COOKIE["error8"]; 
					       }
					    ?>
					    </span>
	                 </td>
	                
		       </tr>
		       <tr>
			        <td class="ab">Gender :</td>
			        <td><br>
			        	<input type="radio"name="gender"id="gender"value="Male">Male
	                    <input type="radio"name="gender"id="gender"value="Female">Female
	                    <input type="radio"name="gender"id="gender"value="Other">Other<br>
	                    <span class="error" id="error9"></span>
	                    <span class="error"><?php if(isset($_COOKIE["error9"])) { 	
						    echo $_COOKIE["error9"]; 
					       }
					    ?>
					    </span>
			        </td>			       
		        </tr>		 
            </table>
            </div>
        </div>
            <a href="search_Flight.php"class="bak">Cancel</a>
            <input type="submit" class="book" name="submit" value="Book Ticket">
		</form>	
	</div>


	<?php
        include('inc/footer.php');
    ?>

</body>
</html>