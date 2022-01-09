<?php

include 'config.php';

session_start();

$login_id = $_SESSION['login_id'];
$sql = "SELECT * FROM job_applicant WHERE Applicant_login_id = '$login_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$Applicant_id = $row["Applicant_id"];

if(isset($_POST['submit'])){
    $Job_id = $_POST['Job_id'];
    $sql = "INSERT INTO job_applications (Job_Appliction_Applicant_id, Job_Appliction_Job_id) 
                VALUES ('$Applicant_id', '$Job_id')";
    $result = mysqli_query($conn, $sql);

    if ($result){
        $sql = "SELECT * FROM job_applications WHERE Job_Appliction_Applicant_id = '$Applicant_id' AND Job_Appliction_Job_id = '$Job_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $Document_Job_Application_id = $row['Job_Appliction_id'];

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["Certificate"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $Certificate_school = $_POST['Certificate_school'];

            // Check file size
            if ($_FILES["Certificate"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
             else {
            if (move_uploaded_file($_FILES["Certificate"]["tmp_name"], $target_file)) {    
                echo "The file ". htmlspecialchars( basename( $_FILES["Certificate"]["name"])). " has been uploaded.";    
                $name = $_FILES["Certificate"]["name"];
                $file = "uploads/$name";
                $sql = "INSERT INTO applicant_documents (Document_name, Document_Job_file, Document_Job_Application_id, Document_University_id) 
                            VALUES ('$name', '$file', '$Document_Job_Application_id', '$Certificate_school' )";    
                            $result = mysqli_query($conn, $sql);
                if ($result){ 
                           echo "Document(s) uploaded succesfully";                    
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
            }
        }

        if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["Diploma"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $Diploma_school = $_POST['Diploma_school'];

            // Check file size
            if ($_FILES["Diploma"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
             
            else {
            if (move_uploaded_file($_FILES["Diploma"]["tmp_name"], $target_file)) {    
                echo "The file ". htmlspecialchars( basename( $_FILES["Diploma"]["name"])). " has been uploaded.";    $name = $_FILES["Diploma"]["name"];
                $file = "uploads/$name";
                $sql = "INSERT INTO applicant_documents (Document_name, Document_Job_file, Document_Job_Application_id, Document_University_id) 
                            VALUES ('$name', '$file', '$Document_Job_Application_id', '$Diploma_school' )";    
                            $result = mysqli_query($conn, $sql);
                if ($result){        
                    echo "Document(s) uploaded succesfully";
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
            }
        }
        if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["Degree"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $Degree_school = $_POST['Degree_school'];

            // Check file size
            if ($_FILES["Degree"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
             else {
            if (move_uploaded_file($_FILES["Degree"]["tmp_name"], $target_file)) {    
                echo "The file ". htmlspecialchars( basename( $_FILES["Degree"]["name"])). " has been uploaded.";    
                $name = $_FILES["Degree"]["name"];
                $file = "uploads/$name";
                $sql = "INSERT INTO applicant_documents (Document_name, Document_Job_file, Document_Job_Application_id, Document_University_id) 
                            VALUES ('$name', '$file', '$Document_Job_Application_id', '$Degree_school' )";

                $result = mysqli_query($conn, $sql);
                if ($result){  
                          echo "Document(s) uploaded succesfully";                    
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
            }
        }
        if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["Masters"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $Masters_school = $_POST['Masters_school'];

            // Check file size
            if ($_FILES["Masters"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
             else {
            if (move_uploaded_file($_FILES["Masters"]["tmp_name"], $target_file)) {    
                echo "The file ". htmlspecialchars( basename( $_FILES["Masters"]["name"])). " has been uploaded.";    $name = $_FILES["Masters"]["name"];
                $file = "uploads/$name";
                $sql = "INSERT INTO applicant_documents (Document_name, Document_Job_file, Document_Job_Application_id, Document_University_id) 
                            VALUES ('$name', '$file', '$Document_Job_Application_id', '$Masters_school' )";    
                            $result = mysqli_query($conn, $sql);
                if ($result){        
                    echo "Document(s) uploaded succesfully";                    
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
            }
        }
        if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["PHD"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $PHD_school = $_POST['PHD_school'];

            // Check file size
            if ($_FILES["PHD"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
             else {
            if (move_uploaded_file($_FILES["PHD"]["tmp_name"], $target_file)) {    
                echo "The file ". htmlspecialchars( basename( $_FILES["PHD"]["name"])). " has been uploaded.";    $name = $_FILES["PHD"]["name"];
                $file = "uploads/$name";
                $sql = "INSERT INTO applicant_documents (Document_name, Document_Job_file, Document_Job_Application_id, Document_University_id) 
                            VALUES ('$name', '$file', '$Document_Job_Application_id', '$PHD_school' )";    
                            $result = mysqli_query($conn, $sql);
                if ($result){        
                    echo "Document(s) uploaded succesfully";                    
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
            }
        }
        if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["good_conduct"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check file size
            if ($_FILES["good_conduct"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
             else {
            if (move_uploaded_file($_FILES["good_conduct"]["tmp_name"], $target_file)) {    
                echo "The file ". htmlspecialchars( basename( $_FILES["good_conduct"]["name"])). " has been uploaded.";    $name = $_FILES["good_conduct"]["name"];
                $file = "uploads/$name";
                $sql = "INSERT INTO applicant_documents (Document_name, Document_Job_file, Document_Job_Application_id, Document_verification_status) 
                            VALUES ('$name', '$file', '$Document_Job_Application_id', 'N/A')";    
                            $result = mysqli_query($conn, $sql);
                if ($result){        
                    echo "Document(s) uploaded succesfully";                    
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
            }
        }
        if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["resume"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check file size
            if ($_FILES["resume"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
             else {
            if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {    
                echo "The file ". htmlspecialchars( basename( $_FILES["resume"]["name"])). " has been uploaded.";    
                $name = $_FILES["resume"]["name"];
                $file = "uploads/$name";
                $sql = "INSERT INTO applicant_documents (Document_name, Document_Job_file, Document_Job_Application_id, Document_verification_status) 
                            VALUES ('$name', '$file', '$Document_Job_Application_id', 'N/A')";    
                            $result = mysqli_query($conn, $sql);
                if ($result){        
                    echo "Document(s) uploaded succesfully";                    
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
            }
        }
        if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["cv"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check file size
            if ($_FILES["cv"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
             else {
            if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {    
                echo "The file ". htmlspecialchars( basename( $_FILES["cv"]["name"])). " has been uploaded.";    
                $name = $_FILES["cv"]["name"];
                $file = "uploads/$name";
                $sql = "INSERT INTO applicant_documents (Document_name, Document_Job_file, Document_Job_Application_id, Document_verification_status) 
                            VALUES ('$name', '$file', '$Document_Job_Application_id', 'N/A')";    
                            $result = mysqli_query($conn, $sql);
                if ($result){       
                    echo "Document(s) uploaded succesfully";                    
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
            }
        }
        if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["Specialization"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check file size
            if ($_FILES["Specialization"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
             else {
            if (move_uploaded_file($_FILES["Specialization"]["tmp_name"], $target_file)) {    
                echo "The file ". htmlspecialchars( basename( $_FILES["Specialization"]["name"])). " has been uploaded.";    $name = $_FILES["Specialization"]["name"];
                $file = "uploads/$name";
                $sql = "INSERT INTO applicant_documents (Document_name, Document_Job_file, Document_Job_Application_id, Document_verification_status) 
                            VALUES ('$name', '$file', '$Document_Job_Application_id', 'N/A')";    
                            $result = mysqli_query($conn, $sql);
                if ($result){        
                    echo "Document(s) uploaded succesfully";   

                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
                               

            }
        }

        header ("Location: dashboard.php?status=success"); 
    }
}
