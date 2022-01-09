<?php 
include 'config.php';
session_start();

$Job_id = $_GET["id"];

$sql = "DELETE FROM job WHERE Job_id = '$Job_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: jobs.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>