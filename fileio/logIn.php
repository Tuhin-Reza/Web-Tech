<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LogIN_Page</title>
</head>
<body>
	<?php 

	$handle1 = fopen("data.json", "r");
	$data=fread($handle1, filesize("data.json"));
	?>

	<?php
	echo "<br>";
	$decode=json_decode($data);
	?>

	<?php 
	echo "<br>";
	$explode=explode("\n", $data);
	array_pop($explode);
	?>

	<?php
	echo "<br>";
	$arr1=array();
	for ($i=0; $i <count($explode) ; $i++) { 
		$json=json_decode($explode[$i]);
		array_push($arr1,$json);
	}
	?>

	<table border="1">
		<thead>
			<tr>
				<th>First_Name</th>
				<th>Last_Name</th>
				<th>Gender</th>
				<th>DOB</th>
				<th>Religion</th>
				<th>PR_A</th>
				<th>PE_A</th>
				<th>Phone</th>
				<th>Email</th>
				<th>P_W_L</th>
				<th>U_Name</th>
				<th>Password</th>
			</tr>
		</thead>
		<tbody>
			<?php
			for ($k=0; $k <count($arr1) ; $k++) { 
			 	echo"<tr>";
			 	echo"<td>" .$arr1[$k]->fname ."</td>";
			 	echo"<td>" .$arr1[$k]->lname ."</td>";
			 	echo"<td>" .$arr1[$k]->gender ."</td>";
			 	echo"<td>" .$arr1[$k]->birDate ."</td>";
			 	echo"<td>" .$arr1[$k]->Relegion ."</td>";
			 	echo"<td>" .$arr1[$k]->PresentAddress ."</td>";
			 	echo"<td>" .$arr1[$k]->PermanentAddress."</td>";
			 	echo"<td>" .$arr1[$k]->Phone ."</td>";
			 	echo"<td>" .$arr1[$k]->Email ."</td>";
			 	echo"<td>" .$arr1[$k]->website ."</td>";
			 	echo"<td>" .$arr1[$k]->uname ."</td>";
			 	echo"<td>" .$arr1[$k]->psw ."</td>";
			 	echo"</tr>";
			 } 

			?>
			
		</tbody>
		
	</table>
	<hr>

	<form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF'])?>"methd="GET">
		
		    <center>
		  	<fieldset style="width:250px; height: 150px;">
			<legend>Login</legend>
			 <br> 
			<label for='username' >UserName:</label>
			<input type='text' name='uname' id='uname'  required ><br><br>
			<label for='password' >Password:</label>
			<input type='password' name='psw' id='psw' required ><br><br>
			<input type='submit' name='submit' value='LogIn' >
		</fieldset>
    </form>
		
	</form>
	<?php
	if($_SERVER['REQUEST_METHOD']=="GET"and count($_REQUEST)>0){

		$flag=false;
		for ($i=0; $i <count($arr1) ; $i++) { 
			if($_GET['uname']==$arr1[$i]->uname ){
				if($_GET['psw']==$arr1[$i]->psw){
					$flag=true;
				    break;
				}
			}
		}
		if($flag)
		{
			header("Location:welcome.php?uname=" .$_GET['uname']);
		}
		else{
			echo "LogIn Failed";
		}		
	}
	?>

</body>
</html>