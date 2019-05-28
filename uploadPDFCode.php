<?php

//to get a database connection object from objectpool
require_once("Database Connection ObjectPool.php");
$conn = $dbConnectionPool->get();


// Uploads files
if (isset($_POST['submit'])) { // if submit button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['fileToUpload']['name'];
    // destination of the file on the server
    $destination = 'completedProjects/uploads/' . basename($_FILES["fileToUpload"]["name"]);

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['fileToUpload']['tmp_name'];
    $size = $_FILES['fileToUpload']['size'];

    if (!in_array($extension, ['pdf', 'docx'])) {
        echo "You file extension must be  .pdf or .docx";
    } elseif ($_FILES['fileToUpload']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $project_id = $_POST['project_id'];
            echo $project_id;
            $sql = "UPDATE projects SET report_link='$filename' WHERE project_id=$project_id";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
                header("Location: edit projects admin.php");
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
$dbConnectionPool->dispose($conn); // sent the connection object to unlocked list in the objectpool
$conn->close();    //close the connection with databasev
?>