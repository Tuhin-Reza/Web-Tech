<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form_Submission</title>
</head>
<body>
	<h1>Registration Form</h1>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST">
		<div>
			<fieldset style="width: 450px; height: 200px;">
				<legend><b>Basic Information</b></legend>
				<label for="fname">First Name :</label>
				<input type="text" id="fname" name="fname"placeholder="Enter a First Name" required autocomplete="off" ><br><br>
			     <label for ="lname">Last Name :</label>
			     <input type="text" id="lname" name="lname"placeholder="Enter a Last Name"required  autocomplete="off" ><br><br> 
                    <label for="gender">Gender :</label>
			     <input type="radio" id="male" name="gender" value="Male" required  autocomplete="off" >

                    <label for="male">Male</label>
			     <input type="radio" id="female" name="gender" value="Female">
			     <label for="female">Female</label>
			     <input type="radio" id="other" name="gender" value="Other">
			     <label for="other">Other</label><br><br>

			     <label for="birthday">Date of Birth</label> : </label>
			     <input type="date" id="birthday" name="birDate"required  autocomplete="off" ><br><br>

			     <label for="religion">Religion :</label>
			     <select name="Relegion" autocomplete="off" required>
			  		<option value ="Muslim">Muslim</option>
				     <option value ="Hinduism ">Hinduism </option>
				     <option value ="Buddhism">Buddhism</option>
				     <option value ="Christianity">Christianity</option>
			     </select><br><br>	
		   </fieldset>
	     </div><br>

	     <div>
	     	<fieldset style="width: 450px; height:290px;">
	     		<legend><b>Contact Information</b></legend>
			     <label for="PresentAddress">Present Address: </label><br>
			     <textarea name="PresentAddress" placeholder="Write Present Address"  autocomplete="off" ></textarea><br><br>

			     <label for="PermanentAddress">Permanent Address: </label><br>
			     <textarea name="PermanentAddress" placeholder="Write Permanent Address"  autocomplete="off" ></textarea><br><br>
			     <label for="phone">Phone number:</label>
			     <input type="tel" id="phone" name="Phone" placeholder="xxx-xx-xxxxxx" pattern="0-9]{3}-[0-9]{2}-[0-9]{3}"  autocomplete="off" ><small>Format: xxx-xx-xxxxxx</small><br><br>

			     <label for="email">Email Address:</label>
			     <input type="email" id="email" name="Email"placeholder="Enter a Email Address"required  autocomplete="off" ><br><br>

			     <label for="website">Personal Website:</label>
			     <input type="url" id="website" name="website"  placeholder="Full Web Address" autocomplete="off" ><br><br>

		    </fieldset>
	     </div><br>

	     <div>
	     	<fieldset style="width: 450px; height: 100px;">
	     		<legend><b>Account Information</b></legend>
			     <label for="uname">Username</label>
                    <input type="text" placeholder="Enter Username" name="uname" required  autocomplete="off" ><br><br>

                    <label for="psw">Password</label>
                    <input type="password" placeholder="Enter Password" name="psw" required  autocomplete="off" ><br><br>
		     </fieldset>		
	     </div><br>

	     </div><br>

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

	 	     $File_name= fopen("data.json", "a" );
			$arr1 = array('First_Name : ' => $fname, ' Last_Name : ' => $lname ,'Gender : '=>$gender,'Birth_Date'=>$birDate,'Relegion'=>$Relegion,'Present_Address'=>$PresentAddress ,'Permanent_Address'=> $PermanentAddress
				,'Phone'=>$Phone,'Email'=>$Email ,'website'=>$website,'User_Name'=> $uname,'Password'=>$psw,);
			echo $encode = json_encode($arr1);
			$write= fwrite($File_name, $encode. "\n");
			echo json_encode($arr1, JSON_FORCE_OBJECT);
			var_dump(json_decode($arr1));
			var_dump(json_decode($arr1,true));
			$arr = json_decode($arr1);
			foreach($arr as $key=>$value){
    echo $key . "=>" . $value . "<br>";
}





		
          }	 	    
         
 function validation($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
      }
  ?>	
  	<table>
		<thead>
			<tr>
				<th>User Name</th>
				<th>Password Name</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<?php 
				for($i=0;$i<count($arr1);$i++)
				{
					echo"<tr>";
					echo"<td>".$arr1[$i]->uname ."</td>";
					echo"<td>".$arr1[$i]->psw ."</td>";
					echo"</tr>";
				}

				?>
			</tr>
			
		</tbody>
	</table>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="GET">
		<input type="text" name="name">
		<input type="submit" name="search" value="search">
	</form>

  <?php 
  if($_SERVER['REQUEST_METHOD']=="GET"and count($_REQUEST)>0)
  {
  	$flag=false;
  	for($i=0;$i<count($arr1);$i++)

	     {
	     	if($_GET['name']==$arr1[$i]->uname)
	     	{
	     		$flag=true;
	     		break;
	     	}

		}
  }
  ?>



</body>
</html>