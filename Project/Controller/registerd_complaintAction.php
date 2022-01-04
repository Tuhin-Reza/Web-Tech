<?php  
    session_start();
    if (count($_SESSION) === 0) {
      header("Location:../Controller/signoutAction.php");
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    	$opinion=validation($_POST["opinion"]);   	
    		if (empty($opinion)) {
    			$error="Field Required";
    			setcookie ("error",$error,time()+ 5,"/");
    			//header("Location:../View/registerd_complaint.php ");
    		}
    		elseif(strlen($opinion)<10){
    			$error="Minimum Length 20 Letter";
    			setcookie ("error",$error,time()+ 5,"/");
    			//header("Location:../View/registerd_complaint.php ");
    		}
    		else{
    			$handle1 = fopen("../Model/opinion.json", "a");
	 	        $arr1 = array('opinion' => $opinion);
	 	         $encode = json_encode($arr1);
	 	         $res = fwrite($handle1, $encode . "\n");
	 	        if ($res) {
	 	            header("Location:../View/home.php ");
	 	        }else {
	 	         	echo "Complain  failed";
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