<?php
     session_start();
     if(isset($_POST['username'])){
        $name=$_POST['username'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM `registration`WHERE User_Name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$User_Name);
        $User_Name="$name";
        $res = $stmt->execute();
        if ($res) {
             $data = $stmt->get_result();
             if ($data->num_rows > 0){
                echo "Enter Unique User Name";
             }
             else{
                echo "";
             }
        }
      }
      if(isset($_POST['pass'])){
        $pass=$_POST['pass'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM `registration`WHERE Password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$Password);
        $Password="$pass";
        $res = $stmt->execute();
        if ($res) {
             $data = $stmt->get_result();
             if ($data->num_rows > 0){
                echo "Enter Unique Password";
             }
             else{
                echo "";
             }
        }
      }
?>