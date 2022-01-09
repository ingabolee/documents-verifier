<?php 
include 'config.php';
session_start();

$Job_Appliction_id  = $_GET["id"];

$sql = "DELETE FROM job_applications WHERE Job_Appliction_id = '$Job_Appliction_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: myapplications.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>