<?php

include 'config.php';


require('fpdf/fpdf.php');


session_start();

$Document_id  = $_GET["id"];

if(isset($_POST['submit'])){
    $Verification_Response_comment = $_POST['Verification_Response_comment'];

    $sql = "SELECT * FROM applicant_documents WHERE Document_id = '$Document_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $Document_name = $row['Document_name'];
    $Document_ref = $row['Document_ref'];    

    $sql = "INSERT INTO verification_response (Verification_Response_comment, Verification_Response_Document_id) 
                VALUES ('$Verification_Response_comment', '$Document_id')";

    $result = mysqli_query($conn, $sql);
    if ($result){
        $sql = "UPDATE applicant_documents SET Document_verification_status='VERIFIED' WHERE Document_id='$Document_id'";
        $result = mysqli_query($conn, $sql);

        $Document_University_id = $row['Document_University_id'];

        $sql = "SELECT * FROM university WHERE University_id = '$Document_University_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $email_address = $row['University_email'];
        $school = $row['University_name'];

        if ($result){
            class PDF extends FPDF
            {
            // Page header
            function Header()
            {
                // Logo
                $this->Image('watch.png',3,3,15);
                // Arial bold 15
                $this->SetFont('Arial','B',15);
                // Move to the right
                $this->Cell(40);
                // Title
                $this->Cell(0.05,10,'VERIFICATION REPORT',1,0,);
                // Line break
                $this->Ln(20);
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Page number
                $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            }
            }

            // Instanciation of inherited class
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            ;
            
            $pdf->SetFont('Arial','I',15);
            $pdf->Cell(0,10, "Document Name: $Document_name",0,1);
 
            $pdf->SetFont('Arial','I',15);
            $pdf->Cell(0, 30, "Document Reference number: $Document_ref",0,0.25);

            $pdf->SetFont('Arial','I',15);
            $pdf->Cell(0, 50, "Verification comment: $Verification_Response_comment",0.5,1);

            $pdf->Output();


                 

            // if (mysqli_query($conn, $sql)) {

            //     //gmail details
            //     $gmail_address = "";
            //     $gmail_password = "";
            //     //gmail details

            //     $mail = new PHPMailer; 
            //     $mail->isSMTP();     
            //     $mail->Mailer = "smtp";
            //     $mail->SMTPAuth = true;                         
            //     $mail->Host = 'smtp.gmail.com';        
            //     $mail->SMTPAuth = true;               
            //     $mail->Username = $gmail_address;    
            //     $mail->Password = $gmail_password;    
            //     $mail->SMTPSecure = 'tls';             
            //     $mail->Port = 587;                                
            //     $mail->setFrom($gmail_address, $school); 
            //     $mail->addReplyTo($gmail_address, $school); 
            //     $mail->addAddress($email_address); 
            //     $mail->isHTML(true); 
            //     $mail->Subject = 'DOCUMENT APPROVAL STATUS'; 
            //     $mail->AddAttachment("./uploads/doc_report.pdf", '', $encoding = 'base64', $type = 'application/pdf');
            //     $bodyContent = "status"; 
            //     $mail->Body = $bodyContent; 
                
            //     // Send email 
            //     if(!$mail->send()) { 
            //         echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
            //     } else { 
            //         echo 'Message has been sent.'; 
            //     } 

			// 	echo json_encode(["status"=> "success"]);
			// } 

            header ("Location: viewapplications.php");
			
        }
    }
}

?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.dashboardpack.com/finance-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Nov 2021 10:59:43 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Job Applicant Portal</title>

    <!-- <link rel="icon" href="img/favicon.png" type="image/png"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
    <!-- swiper slider CSS -->
    <link rel="stylesheet" href="vendors/swiper_slider/css/swiper.min.css" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="vendors/select2/css/select2.min.css" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />
    <!-- text editor css -->
    <link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />
    <!-- morris css -->
    <link rel="stylesheet" href="vendors/morris/morris.css">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="vendors/material_icon/material-icons.css" />

    <!-- menu css  -->
    <link rel="stylesheet" href="css/metisMenu.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
</head>
<body class="crm_body_bg">
    


<!-- main content part here -->
 
 <!-- sidebar  -->
 <!-- sidebar part here -->

 <nav class="sidebar">
    
    <ul id="sidebar_menu">
        <li class="">
            <a class="has-arrow"  href="#"  aria-expanded="false">
          <!-- <i class="fas fa-th"></i> -->
                <img src="img/menu-icon/1.svg" alt="">
                <span>Menu</span>
            </a>
            <ul>
                <li><a href="schooldashboard.php">Dashboard</a></li>
                <li><a href="viewapplications.php">Verify Documents</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </li>
    </ul>
</nav>
<!-- sidebar part end -->
 <!--/ sidebar  -->


 <section class="main_content dashboard_part">
        <!-- menu  -->
    <div class="container-fluid no-gutters">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <h2><strong>UNIVERSITY DASHBOARD</strong></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="main_content_iner">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="">
                <form class="form" method="POST" action="#">
                <h4><strong>VERIFY DOCUMENT</strong></h4>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="body">
                                    <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for=""><strong>Comment</strong></label>
                                                    <textarea type="text" class="form-control" name='Verification_Response_comment'></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            
                                            
                                            <div class="col-sm-12">
                                                <button name="submit" class="btn btn-primary btn-round">Verify Document</button>
                                                <a href="viewapplications.php" class="btn btn-default btn-round btn-simple">Cancel</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
        
<div class="footer_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- main content part end -->

<!-- footer  -->
<!-- jquery slim -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="js/popper.min.js"></script>
<!-- bootstarp js -->
<script src="js/bootstrap.min.js"></script>
<!-- sidebar menu  -->
<script src="js/metisMenu.js"></script>
<!-- waypoints js -->
<script src="vendors/count_up/jquery.waypoints.min.js"></script>
<!-- waypoints js -->
<script src="vendors/chartlist/Chart.min.js"></script>
<!-- counterup js -->
<script src="vendors/count_up/jquery.counterup.min.js"></script>
<!-- swiper slider js -->
<script src="vendors/swiper_slider/js/swiper.min.js"></script>
<!-- nice select -->
<script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>
<!-- owl carousel -->
<script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>
<!-- gijgo css -->
<script src="vendors/gijgo/gijgo.min.js"></script>
<!-- responsive table -->
<script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatable/js/buttons.flash.min.js"></script>
<script src="vendors/datatable/js/jszip.min.js"></script>
<script src="vendors/datatable/js/pdfmake.min.js"></script>
<script src="vendors/datatable/js/vfs_fonts.js"></script>
<script src="vendors/datatable/js/buttons.html5.min.js"></script>
<script src="vendors/datatable/js/buttons.print.min.js"></script>

<script src="js/chart.min.js"></script>
<!-- progressbar js -->
<script src="vendors/progressbar/jquery.barfiller.js"></script>
<!-- tag input -->
<script src="vendors/tagsinput/tagsinput.js"></script>
<!-- text editor js -->
<script src="vendors/text_editor/summernote-bs4.js"></script>

<script src="vendors/apex_chart/apexcharts.js"></script>

<!-- custom js -->
<script src="js/custom.js"></script>

<!-- active_chart js -->
<script src="js/active_chart.js"></script>
<script src="vendors/apex_chart/radial_active.js"></script>
<script src="vendors/apex_chart/stackbar.js"></script>
<script src="vendors/apex_chart/area_chart.js"></script>
<!-- <script src="vendors/apex_chart/pie.js"></script> -->
<script src="vendors/apex_chart/bar_active_1.js"></script>
<script src="vendors/chartjs/chartjs_active.js"></script>

</body>

<!-- Mirrored from demo.dashboardpack.com/finance-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Nov 2021 11:00:33 GMT -->
</html>