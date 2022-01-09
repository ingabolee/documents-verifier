<?php

include 'config.php';

 session_start();

 $Login_id  = $_SESSION["login_id"];
 $sql = "SELECT * FROM job_applicant WHERE Applicant_login_id = '$Login_id'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);

 $Applicant_id = $row['Applicant_id'];

$sql = "SELECT * FROM job_applications WHERE Job_Appliction_Applicant_id = '$Applicant_id'";

$rows = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.dashboardpack.com/finance-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Nov 2021 10:59:43 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Applicant Portal</title>

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
    
<nav class="sidebar">
    
    <ul id="sidebar_menu">
        <li class="">
            <a class="has-arrow"  href="#"  aria-expanded="false">
          <!-- <i class="fas fa-th"></i> -->
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

<!-- main content part here -->
 
 <!-- sidebar  -->
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
    <!--/ menu  -->
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>My Job Applications</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form Active="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here...">
                                            </div>
                                            <button type="submit"> <i class="ti-search"></i> </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="add_button ml-10">
                                    <a href="#" data-toggle="modal" data-target="#addcategory" class="btn_1">Search</a>
                                </div>
                            </div>
                        </div>

                        <div class="QA_table ">
                    <table class="table lms_table_active">
                    <thead>
                            <tr>
                                <th>Job Description</th>
                                <th>Company</th>
                                <th>Date of Application</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Job Description</th>
                                <th>Company</th>
                                <th>Date of Application</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <?php while($row = mysqli_fetch_assoc($rows)):?>
                                    <td>
                                        <?php 
                                        $job_id = $row["Job_Appliction_Job_id"];
                                        $sql = "SELECT * FROM job WHERE Job_id = '$job_id'";

                                        $rows1 = mysqli_query($conn, $sql);
                                        $row1 = mysqli_fetch_assoc($rows1);
                                        echo $row1["Job_Description"];
                                        ?>
                                    </td>
                                    <td>
                                    <?php 
                                        $Job_Employer_id = $row1["Job_Employer_id"];
                                        $sql = "SELECT * FROM employer WHERE Employer_id  = '$Job_Employer_id'";

                                        $rows2 = mysqli_query($conn, $sql);
                                        $row2 = mysqli_fetch_assoc($rows2);
                                        echo $row2["Employer_name"];
                                        ?>
                                    </td>
                                    <td><?php echo $row["Job_Appliction_date"]?></td>                                    
                                    <td><button onclick="window.location.href='deleteapplication.php?id=<?php echo $row['Job_Appliction_id']; ?>'" name="submit" class="btn btn-danger btn-round">Delete</button></td>
                                </tr>
                            <?php  endwhile; ?>
                        </tbody>
                    </table>
                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- footer part -->
<footer style="color:blue;">
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
</footer>

</section>

        <!-- menu  -->
    
    <!--/ menu  -->
    
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


