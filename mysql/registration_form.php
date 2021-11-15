<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
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
	 	$pass=validation($_POST["psw"]);
    	if (isset($_POST['submit'])){
    			$servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "registration";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                	die("Connection failed: " . $conn->connect_error);
                }
                $sql = "INSERT INTO table1(First_Name,Last_Name,Gender,Dob,Religion,Present_Address,Permanent_Address,Phone,Email,Website,Username,Password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssdsssisssi",$First_Name,$Last_Name,$Gender,$Dob,$Religion,$Present_Address,$Permanent_Address,$Phone,$Email,$Website,$Username,$Password);
                
                $First_Name= "'$fname '";
                $Last_Name="'$lname'";
                $Gender="'$gender'";
                $Dob="'$birDate'";
                $Religion="'$Relegion'";
                $Present_Address="'$PresentAddress'";
                $Permanent_Address="'	$PermanentAddress'";
                $Phone="'$Phone'";
                $Email="'$Email'";
                $Website="'	$website'";
                $Username = "'$uname'";
                $Password = "'$pass'";
                $res = $stmt->execute();
                if ($res) {
                	header("Location:login_Form.php");
                }
                else {
                	echo "Failed to insert data";
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST">
		<fieldset style="width: 450px; height: 200px;">
			<legend><b>Basic Information</b></legend>

			First Name :
			<label><input type="text" id="fname" name="fname"placeholder="Enter a First Name" required></label><br><br>
			
			Last Name :
			<label><input type="text" id="lname" name="lname"placeholder="Enter a Last Name"required></label><br><br> 
			
		    Gender :
            <label><input type="radio" name="gender" value="male" required>Male</label>
            <label><input type="radio" name="gender" value="female">Female</label>
            <label><input type="radio" name="gender" value="other">Other</label><br><br> 

            Date of Birth :
			<label><input type="date" name="birDate"></label> <br><br> 

			Religion : 
			<select name="Relegion" required>
				<option value ="musli">Muslim</option>
				<option value ="hinduism ">Hinduism </option>
				<option value ="buddhism">Buddhism</option>
				<option value ="christianity">Christianity</option>
			</select>
	    </fieldset><br><br>

	    <fieldset  style="width: 450px; height:290px;">
			<legend>Contact Information</legend><br>
			Present Address:
			<label><textarea name="PresentAddress" placeholder="Write Present Address"></textarea> </label><br><br>

			Permanent Address:
			<label><textarea name="PermanentAddress" placeholder="Write Permanent Address"></textarea></label><br><br>

			Phone number :
			<label>	<input type="tel" id="phone" name="Phone"><br><br>

			Email Address:
			<label><input type="email" id="email" name="Email" required></label><br><br>

			Personal Website:
			<label><input type="url" id="website" name="website"></label>	
		</fieldset><br><br>	

		<fieldset style="width: 450px; height: 100px;">
	     	<legend><b>Account Information</b></legend><br>
	     	Username :
	     	<label> <input type="text" placeholder="Enter Username" name="uname" required  ></label><br><br>
	     	Password :
	     	<label><input type="password" placeholder="Enter Password" name="psw" required ></label>
		</fieldset><br><br>	

		<input type="submit" name="submit" value="Submit"><br><br>			
	</form>

</body>
</html>