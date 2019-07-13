<?php
												
//to get a database connection object from objectpool
require_once("Database Connection ObjectPool.php");
$conn = $dbConnectionPool->get();


//fetching data in descending order (lastest entry first)
$result = mysqli_query($conn, "SELECT * FROM accountdetails WHERE approved='False'"); // using mysqli_query instead



echo "<table width='100%' border=0 style='color:White;'>";

	echo "<tr bgcolor='#CCCCCC'>";
	echo "<td>Name</td>";
	echo "<td>Email</td>";
	echo "<td>Contact No</td>";
	echo "<td>Address</td>";
	echo "<td>DOB</td>";
	echo "<td>Gender</td>";
	echo "</tr>";

 // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 

	$cnt=1;
	while($res = mysqli_fetch_array($result)) { 
		$mail=$res['Email'];	
		echo "<tr>";
		echo "<td>".$res['FullName']."</td>";
		echo "<td>".$res['Email']."</td>";
		echo "<td>".$res['ContactNo']."</td>";
		echo "<td>".$res['Address']."</td>";
		echo "<td>".$res['dob']."</td>";
		echo "<td>".$res['gender']."</td>";	


		echo"<td><form action='approveMember.php' method='post'>";
		echo"<input type='hidden' name='mail' value=".$mail." />";
		echo "<select id='authenticity' name='authenticity'>";
        echo "<option value='Admin'>Admin</option>";
        echo  "<option value='Member'>Member</option>";
        echo "</select>";
    	echo"<input type='submit' value='Approve' name='submit' style='margin-left:20px'>";
		echo"</form></td>";




//to get a database connection object from objectpool
require_once('Database Connection ObjectPool.php');
$conn = $dbConnectionPool->get();

if ($conn->connect_error){                                   // check whether the connection is correctly established or not
    die("Connection failed: " . $conn->connect_error);
} 
	}



$dbConnectionPool->dispose($conn); // sent the connection object to unlocked list in the objectpool
$conn->close();    //close the connection with databasev



?>