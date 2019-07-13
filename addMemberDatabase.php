<?php
$fullname=$_POST['fname'];
$email=$_POST['email'];
$pnumber=$_POST['pnumber'];
$address=$_POST['address'];
$PW=$_POST['password'];
$HPW=password_hash($PW,PASSWORD_DEFAULT);
$admin=$_POST['authenticity'];
$birthday=$_POST['birthday'];
$gender=$_POST['gender'];
$servername = "localhost";                                    // host which has established our computer.If the database is on a sever, then this should change accordinly
$username = "root";                                           // username and the password of the mysql sever
$password = "";
$dbname = "echs_database";
$conn = new mysqli($servername,$username,$password,$dbname); // making the connection with mysql
if ($conn->connect_error){                                   // check whether the connection is correctly established or not
    die("Connection failed: " . $conn->connect_error);
}                                                            // upto here ,connection is established
$sql = "INSERT INTO accountdetails VALUES ('$fullname','$email','$pnumber','$address','$HPW','Member','$birthday','$gender ','False')"; // insert data to the created table
if ($conn->query($sql)===TRUE){
}else{
    echo "Error: ". $sql ."<br>" . $conn->error;
}
$conn->close();    //close the connection with database
?>


