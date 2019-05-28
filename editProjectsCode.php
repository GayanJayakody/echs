<?php
// including the database connection file
include_once("Database Connection ObjectPool.php");
$conn = $dbConnectionPool->get();

if(isset($_POST['update']))
{	

	$project_id = mysqli_real_escape_string($conn, $_POST['project_id']);
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$progress = mysqli_real_escape_string($conn, $_POST['progress']);
	$estimated_cost = mysqli_real_escape_string($conn, $_POST['estimated_cost']);
	$raised = mysqli_real_escape_string($conn, $_POST['raised']);	
	
	// checking empty fields
	if(empty($name) || empty($description) || empty($progress)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
			exit("");
		}
		
		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
			exit("");
		}	
		
		if(empty($progress)) {
			echo "<font color='red'>Progress field is empty.</font><br/>";
			exit("");
		}		
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE projects SET name='$name',state='$state',description='$description',progress='$progress',estimated_cost='$estimated_cost',raised='$raised' WHERE project_id=$project_id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: edit projects admin.php");
	}
}
//getting id from url
$project_id = $_GET['project_id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM projects WHERE project_id=$project_id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$state = $res['state'];
	$description = $res['description'];
	$progress = $res['progress'];
	$estimated_cost = $res['estimated_cost'];
	$raised = $res['raised'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	
	<form name="form1" method="post" action="editProjectsCode.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>State</td>
				<td><input type="int" name="state" value="<?php echo $state;?>"></td>
			</tr>			
			<tr> 
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $description;?>"></td>
			</tr>
			<tr> 
				<td>Progress</td>
				<td><input type="text" name="progress" value="<?php echo $progress;?>"></td>
			</tr>
			<tr> 
				<td>Estimated_cost</td>
				<td><input type="text" name="estimated_cost" value="<?php echo $estimated_cost;?>"></td>
			</tr>						
			<tr> 
				<td>Raised</td>
				<td><input type="text" name="raised" value="<?php echo $raised;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="project_id" value=<?php echo $_GET['project_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	<?php	$dbConnectionPool->dispose($conn); // sent the connection object to unlocked list in the objectpool
$conn->close();    //close the connection with databasev
?>
</body>
</html>