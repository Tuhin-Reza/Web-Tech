<?php
    /*This file  For drop down */
    $User_Name=$_SESSION['uname'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $connect = new mysqli($servername, $username, $password, $dbname);
    $query = "SELECT * FROM `ticket_info`WHERE User_Name='$User_Name'";
    $result1 = mysqli_query($connect, $query);
?> 