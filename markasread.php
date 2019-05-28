<?php
$read=$_POST['read'];

require_once('Database Connection ObjectPool.php');
$conn = $dbConnectionPool->get();

if ($conn->connect_error){                                   // check whether the connection is correctly established or not
    die("Connection failed: " . $conn->connect_error);
}  
$sql ='UPDATE ContactForm SET readed=true WHERE id='.$read;
$conn->query($sql);

$dbConnectionPool->dispose($conn); // sent the connection object to unlocked list in the objectpool
$conn->close();
?>