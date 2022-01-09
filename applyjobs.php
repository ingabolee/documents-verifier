<?php

include 'config.php';

session_start();

$Job_id = $_GET["id"];
$sql = "SELECT * FROM job WHERE Job_id = $Job_id";
$rows = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rows)

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
                <img src="img/menu-icon/1.svg" alt="">
                <span>Menu</span>
            </a>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="viewpostedjobs.php">View Posted Jobs</a></li>
                <li><a href="myapplications.php">View My Job Applications</a></li>
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
                    <h2><strong>APPLICANT DASHBOARD</strong></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="main_content_iner">
        <form method="post" action="uploadfile.php" enctype="multipart/form-data" id="post">
            <div class="container-fluid plr_30 body_white_bg pt_30">
                <div class="content">
                    <h3><strong>Apply Job</strong></h3>
                    <hr>
                    <?php
                        $Job_Employer_id = $row["Job_Employer_id"];
                        $sql = "SELECT * FROM employer WHERE Employer_id = '$Job_Employer_id'";

                        $rows1 = mysqli_query($conn, $sql);
                        $row1 = mysqli_fetch_assoc($rows1);
                        
                        ?>
                    
                    <h6><small>Job Description: </small>
                        <?php
                        echo $row['Job_Description'];
                        ?>
                    </h6>                           
                    <h6><small>Posted by: </small>
                        <?php
                        echo $row1["Employer_name"];
                        ?>
                    </h6>
                    <hr>
                    <h4><strong>Add Academic Documents</strong></h4>
                    <hr>
                    <hr>

                    <?php
                    $sql = "SELECT * FROM university";

                    $rows = mysqli_query($conn, $sql);
                    ?>
                
                    <div class="input-group">
                        <label for="Certificate"><h7><strong>Certificate</strong></h7></label> 
                        <input type="file" class="input-group" placeholder="Job File" name="Certificate" id="Certificate">
                        <?php
                        $sql = "SELECT * FROM university";

                        $rows = mysqli_query($conn, $sql);
                        ?>
                        <div class="input-group">
                            <ul class="list-group">
                                <li><h5><strong>Affiliated University</strong></h5></li>
                                    <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                        <li class="list-group-item">
                                            <input class="form-check-input" type="radio" id="<?php echo $row['University_id']; ?>" name="Certificate_school" value="<?php echo $row['University_id']; ?>">
                                            <label class="form-check-label" for="<?php echo $row['University_id']; ?>"><?php echo $row['University_name']; ?></label>
                                        </li>
                                    <?php  endwhile; ?>
                            </ul>    
                        </div>
                    </div>
                        <hr>
                    <div class="input-group">
                        <label for="Diploma"><h7><strong>Diploma</strong></h7></label> 
                        <input type="file" class="input-group" placeholder="Job File" name="Diploma" id="Diploma">
                        <?php
                        $sql = "SELECT * FROM university";

                        $rows = mysqli_query($conn, $sql);
                        ?>
                        <div class="input-group">
                            <ul class="list-group">
                                <li><h5><strong>Affiliated University</strong></h5></li>
                                    <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                        <li class="list-group-item">
                                            <input class="form-check-input" type="radio" id="<?php echo $row['University_id']; ?>" name="Diploma_school" value="<?php echo $row['University_id']; ?>">
                                            <label class="form-check-label" for="<?php echo $row['University_id']; ?>"><?php echo $row['University_name']; ?></label>
                                        </li>
                                    <?php  endwhile; ?>
                            </ul>    
                        </div>                        
                    </div>
                        <hr>
                    <div class="input-group">
                        <label for="Degree"><h7><strong>Degree</strong></h7></label> 
                        <input type="file" class="input-group" placeholder="Job File" name="Degree" id="Degree">
                        <?php
                        $sql = "SELECT * FROM university";

                        $rows = mysqli_query($conn, $sql);
                        ?>
                        <div class="input-group">
                            <ul class="list-group">
                                <li><h5><strong>Affiliated University</strong></h5></li>
                                    <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                        <li class="list-group-item">
                                            <input class="form-check-input" type="radio" id="<?php echo $row['University_id']; ?>" name="Degree_school" value="<?php echo $row['University_id']; ?>">
                                            <label class="form-check-label" for="<?php echo $row['University_id']; ?>"><?php echo $row['University_name']; ?></label>
                                        </li>
                                    <?php  endwhile; ?>
                            </ul>    
                        </div>                        
                    </div>
                        <hr>
                    <div class="input-group">
                        <label for="Masters"><h7><strong>Masters</strong></h7></label> 
                        <input type="file" class="input-group" placeholder="Job File" name="Masters" id="Masters">
                        <?php
                        $sql = "SELECT * FROM university";

                        $rows = mysqli_query($conn, $sql);
                        ?>
                        <div class="input-group">
                            <ul class="list-group">
                                <li><h5><strong>Affiliated University</strong></h5></li>
                                    <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                        <li class="list-group-item">
                                            <input class="form-check-input" type="radio" id="<?php echo $row['University_id']; ?>" name="Masters_school" value="<?php echo $row['University_id']; ?>">
                                            <label class="form-check-label" for="<?php echo $row['University_id']; ?>"><?php echo $row['University_name']; ?></label>
                                        </li>
                                    <?php  endwhile; ?>
                            </ul>    
                        </div>                        
                    </div>
                        <hr>
                    <div class="input-group">
                        <label for="PHD"><h7><strong>PHD</strong></h7></label> 
                        <input type="file" class="input-group" placeholder="Job File" name="PHD" id="PHD">
                        <?php
                        $sql = "SELECT * FROM university";

                        $rows = mysqli_query($conn, $sql);
                        ?>
                        <div class="input-group">
                            <ul class="list-group">
                                <li><h5><strong>Affiliated University</strong></h5></li>
                                    <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                        <li class="list-group-item">
                                            <input class="form-check-input" type="radio" id="<?php echo $row['University_id']; ?>" name="PHD_school" value="<?php echo $row['University_id']; ?>">
                                            <label class="form-check-label" for="<?php echo $row['University_id']; ?>"><?php echo $row['University_name']; ?></label>
                                        </li>
                                    <?php  endwhile; ?>
                            </ul>    
                        </div>
                    </div>                        
                        <hr>
                        <h4><strong>Other Documents</strong></h4>
                        <hr>
                    <div class="input-group">
                        <label for="good_conduct"><h7><strong>Certificate of Good Conduct</strong></h7></label> 
                        <input type="file" class="input-group" placeholder="Job File" name="good_conduct" id="good_conduct">
                    </div>
                        <hr>
                    <div class="input-group">
                        <label for="resume"><h7><strong>Resume/Cover Letter</strong></h7></label> 
                        <input type="file" class="input-group" placeholder="Job File" name="resume" id="resume">
                    </div>
                        <hr>
                    <div class="input-group">
                        <label for="cv"><h7><strong>Curriculum Vitae (CV)</strong></h7></label> 
                        <input type="file" class="input-group" placeholder="Job File" name="cv" id="cv">
                    </div>
                        <hr>
                    <div class="input-group">
                        <label for="Specialization"><h7><strong>Certification Document </strong></h7><small>(eg. CCNA, CPA)</small></label> 
                        <input type="file" class="input-group" placeholder="Job File" name="Specialization" id="Specialization">
                    </div>
                        <hr>
                        <input type="hidden" name="Job_id" value="<?php echo $Job_id; ?>">
                </div>
                <br>
                <input type="submit" name="submit" class="btn btn-primary btn-round" value="Submit Application">
                <a href="dashboard.php" class="btn btn-warning btn-round ">Cancel</a>
            </div>
        </form>

    </div>
    
<!-- footer part -->
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