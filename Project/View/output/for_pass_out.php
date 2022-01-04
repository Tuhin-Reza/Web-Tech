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
	<link rel="stylesheet" type="text/css" href="../css/message.css">
	<title>Output</title>
</head>
<body>
	<div class="box">
		<p class="letter">
			<?php 
				if(isset($_SESSION['success'])){
		    	    echo $_SESSION['success'];
		        }else{
		    	    if(isset($_SESSION['failed'])){
		    		      echo $_SESSION['failed'];
		    		}
		        }
		    ?>	
	    </p>
	    <label class="letter2">Back To <a class="link" href="../signin.php">Home Page</a></label>
	</div>

</body>
</html>