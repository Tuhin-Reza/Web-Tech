<?php
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/fail.css">
	<title>Output</title>
</head>
<body>
	<div class="main">
		<div class="b">
	<p class="p">
	    <?php 
	         if(isset($_SESSION['fail'])){
		    	echo $_SESSION['fail'];
		    }else{
		    	echo "";
		    }
	    ?>
	</p>
	<label class="p2">Back to <a class="link" href="../signin.php" target="_self">Signin Page</a> or <a class="link" href="../forget_pass.php" target="_self">Forget Password</a></label>
    </div>
    </div>
</body>
</html>