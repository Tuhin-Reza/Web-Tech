<?php
    //session_start();
    if (count($_SESSION) === 0) {
      header("Location:../Controller/signoutAction.php");
    }
    $uname=$_SESSION['uname'];
    $pass=$_SESSION['pass'];
    $First_Name=$Last_Name=$Email=$User_Name=$Password="";

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="project";

    $conn= new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    } 
    $sql="SELECT * FROM registration  WHERE User_Name = ? and Password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $User_Name, $Password);
    $User_Name="$uname";
    $Password="$pass";
    $res = $stmt->execute();
    if ($res) {
	    $data = $stmt->get_result();
	    if ($data->num_rows > 0) {
		    while ($row = $data->fetch_assoc()) {
			    $First_Name=$row["First_Name"];
			    $Last_Name=$row["Last_Name"];
			    $Email=$row["Email"];
			    $User_Name=$row["User_Name"];
			    $Password=$row["Password"];
		    }
	    }
	    else {
		    echo " ";
	    }
    }
    else {
	    echo "Error while executing the statement";
    }
    $conn->close();
?>