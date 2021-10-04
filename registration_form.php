<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
</head>
<body>
	<h1>Registration Form</h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST">
		<div>
			<fieldset>
				<legend>Basic Information</legend>
				<label for="fname"><b>First Name :</b></label>
				<input type="text" id="fname" name="fname"required autocomplete="off" ><br><br>
			    <label for ="lname"><b>Last Name :</b></label>
			    <input type="text" id="lname" name="lname"required  autocomplete="off" ><br><br> 
               <label for="gender"><b>Gender :</b></label>
			   <input type="radio" id="male" name="gender" value="Male" required  autocomplete="off" >
			 
			   <label for="male">Male</label>
			   <input type="radio" id="female" name="gender" value="Female">
			   <label for="female">Female</label>
			   <input type="radio" id="other" name="gender" value="Other">
			  <label for="other">Other</label><br><br>

			   <label for="birthday"><b>Date of Birth</b></label> : </label>
			  <input type="date" id="birthday" name="birDate"required  autocomplete="off" ><br><br>

			  <label for="religion"><b>Religion : </b  autocomplete="off"></label>
			  <select name="Relegion" required>
			  		<option value ="Muslim">Muslim</option>
				    <option value ="Hinduism ">Hinduism </option>
				    <option value ="Buddhism">Buddhism</option>
				    <option value ="Christianity">Christianity</option>
			  </select><br><br>	
		   </fieldset>
	</div><br>

	<div>
		<fieldset>
			<legend>Contact Information</legend>

			<label for="PresentAddress"><b>Present Address: </b></label>
			<textarea name="PresentAddress" placeholder="Write Present Address"  autocomplete="off" ></textarea><br><br>
			<label for="PermanentAddress"><b>Permanent Address: </b></label>
			<textarea name="PermanentAddress" placeholder="Write Permanent Address"  autocomplete="off" ></textarea><br><br>

			<label for="phone"><b>Phone number:</b></label>
			<input type="tel" id="phone" name="Phone" placeholder="xxx-xx-xxxxxx" pattern="0-9]{3}-[0-9]{2}-[0-9]{3}"  autocomplete="off" >
			<small>Format: xxx-xx-xxxxxx</small><br><br>

			<label for="email"><b>Email Address:</b></label>
			<input type="email" id="email" name="Email"required  autocomplete="off" ><br><br>

			<label for="website"><b>Personal Website:</b></label>
			<input type="url" id="website" name="website"  autocomplete="off" ><br><br>
		</fieldset>		
	</div><br>

	<div>
		<fieldset>
			<legend>Account Information</legend>
			<label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required  autocomplete="off" ><br><br>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required  autocomplete="off" ><br><br>

		</fieldset>		
	</div>
	</div><br><br>

	 <div>
      <input type="submit" name="Submit">
      <input type="reset">
    </div>
	</form>

	 <br>
	 <?php 
	 	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	 	{
	 		 $fname =validation( $_POST['fname']);
	 	     $lname =validation($_POST['lname']);
	 	     $gender=validation($_POST["gender"]);
	 	     $birDate=validation($_POST["birDate"]);
	 	     $Relegion=validation($_POST["Relegion"]);
	 	     $PresentAddress=validation($_POST["PresentAddress"]);
	 	     $PermanentAddress=validation($_POST["PermanentAddress"]);
	 	     $Phone=validation($_POST["Phone"]);
	 	     $Email=validation($_POST["Email"]);
	 	     $website=validation($_POST["website"]);
	 	     $uname=validation($_POST["uname"]);
	 	     $psw=validation($_POST["psw"]);

	 	       if (empty($PresentAddress)) 
	 	       {
	 	       	echo "Please fill up the form properly";
               }
                else 
                {
                	 echo "First Name: " .$fname;
                	 echo "<br><br>";
                	 echo "Last Name: " .$lname;
                	 echo "<br><br>";
                	 echo "Gender: ".$gender;
                	 echo "<br><br>";
                	 echo "Relegion : ".$Relegion;
                	 echo "<br><br>";
                	 echo "Present Address: ".$PresentAddress;
                	 echo "<br><br>";
                	 echo "Permanent Address: ".$PermanentAddress;
                	 echo "<br><br>";
                	 echo "Phone Number: ".$Phone;
                	 echo "<br><br>";
                	 echo "Email(valid): ".$Email;
                	 echo "<br><br>";
                	 echo "Website: ".$website;
                	 echo "<br><br>";
                	 echo "User Name: ".$uname;
                	 echo "<br><br>";
                	 echo "Password: ".$psw;
                	 echo "<br><br>";
                }	 	   
    }
 function validation($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
      }

  ?>	

</body>
</html>