<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$fname =$_POST['fname'];
	 	$lname =$_POST['lname'];
		if (empty($fname) or empty($lname)) {
			echo "Fill up the form properly";
		}
		else{
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

	 	    $handle1 = fopen("data.json", "a");
	 	        $arr1 = array('fname' => $fname, 'lname' => $lname ,'gender'=>$gender,'birDate'=>$birDate,'Relegion'=>$Relegion,
	 	        	'PresentAddress'=>$PresentAddress,'PermanentAddress'=>$PermanentAddress,'Phone'=>$Phone,'Email'=>$Email,'website'=>$website,'uname'=>$uname,'psw'=>$psw,);

	 	    $encode = json_encode($arr1);
	 	    $res = fwrite($handle1, $encode . "\n");
	        if ($res) {
	        	echo "Successfully saved";
	        }
	        else {
	        	echo "Error while saving";
	        }
	    }
		
	}
	function validation($data){
		$data = trim($data);
		$data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 	        
	?>

</body>
</html>