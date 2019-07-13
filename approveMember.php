<?php

$email=$_POST['mail'];
$admin=$_POST['authenticity'];

$servername = "localhost";                                    // host which has established our computer.If the database is on a sever, then this should change accordinly
$username = "root";                                           // username and the password of the mysql sever
$password = "";
$dbname = "echs_database";
$conn = new mysqli($servername,$username,$password,$dbname); // making the connection with mysql
if ($conn->connect_error){                                   // check whether the connection is correctly established or not
    die("Connection failed: " . $conn->connect_error);
}                                                            // upto here ,connection is established


$sql = "UPDATE accountdetails SET approved='True',Admin='$admin' WHERE Email='$email' ";

 // insert data to the created table



if ($conn->query($sql)===TRUE){
	echo "<script>alert('Account Created');</script>";
	header('Location: indexAdmin.php');
}else{
    echo "Error: ". $sql ."<br>" . $conn->error;
}