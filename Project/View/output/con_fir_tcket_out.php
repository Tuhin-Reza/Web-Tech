<?php
    if (count($_SESSION) === 0) {
      header("Location: ../Controller/signoutAction.php");
    }
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body{
			background-image: url(../View/image/main.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			margin-left: 5px; 
			margin-right:5px ; 
		}
		.box{
			border-radius: 25px;
			z-index: 1;
			background: #ffffff;
			margin-left:420px;
			margin-right: 420px;
			padding: 3px;
			margin-top: 200px;
			padding-top: 35px;
			padding-left: 50px;
			padding-right: 50px;
			padding-bottom: 70px;
			background: rgba(0,0,0,0.6);
		}
		.letter{
			font-weight: bold;
			font-size:40px;
			padding-bottom: 20px;
			color: white;
		}
		.p2{
			text-align: center;
			padding-left: 50px;
			font-weight: bold;
			font-style: italic;
		}.letter2{
			color: white;
			padding-top: 30px;
			margin-left: 80px;
			font-size: 20px;
		}
		.link{
			color: red;
		}a:link {
			text-decoration: none;
		}a:hover {
			text-decoration: underline;
			font-weight: bold;
		}

	</style>
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
	    <label class="letter2">Back To <a class="link" href="../View/home.php">Home Page</a></label>
	</div>

</body>
</html>