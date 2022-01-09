<?php
include 'config.php';

session_start();

if(isset($_SESSION["username"])){
    header("Location: dashboard.php");
}

if(isset($_POST['submit'])){
    $University_name = $_POST['University_name'];
    $Login_user_name = $_POST['Login_user_name'];
    $University_type = $_POST['University_type'];
    $University_mobile = $_POST['University_mobile'];
    $University_email = $_POST['University_email'];
    $University_physical_location = $_POST['University_physical_location'];
    $University_desc = $_POST['University_desc'];
    $Login_password = md5($_POST['Login_password']);
    $cpassword = md5($_POST['cpassword']);

    if($Login_password == $cpassword){
        $sql = "SELECT * FROM login WHERE Login_user_name = '$Login_user_name'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows > 0){
            echo "<p>Username already exists</p>";
        }

        else {
            $sql = "SELECT * FROM university WHERE University_email = '$University_email'";
            $result = mysqli_query($conn, $sql);
            if ($result -> num_rows > 0){
                echo "<p>Email already exists</p>";
            }

            else{
                //login table
                $sql = "INSERT INTO login (Login_user_name, Login_password, Login_rank) 
                VALUES ('$Login_user_name', '$Login_password', '2')";
                $result = mysqli_query($conn, $sql);

                //login id
                $sql = "SELECT * FROM login WHERE Login_user_name = '$Login_user_name'";
                $login_id = mysqli_query($conn, $sql);
                $arra = mysqli_fetch_array($login_id);
                if(is_array($arra)){
                    $login_id = $arra['Login_id'];
                }
                echo $login_id;


                //owner table
                $sql = "INSERT INTO university (University_name, University_type, University_mobile, University_email, University_physical_location, University_desc, University_login_id) 
                VALUES ('$University_name', '$University_type', '$University_mobile', '$University_email', '$University_physical_location', '$University_desc', '$login_id')";
                $result = mysqli_query($conn, $sql);
                
                if(! $result){
                    echo "<p>Registration not succesful</p>";
                }
                else {
                    header ("Location: login.php?status=success");
                }

            }
        }
        
    } 
    else{
        echo "Passwords do not match!";
    }
}
?>



<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.dashboardpack.com/finance-html/resister.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Nov 2021 11:01:01 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Finance</title>
    
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

    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <!-- sign_in  -->
                                <div class="modal-content cs_modal">
                                <div class="modal-header">
                                        <div class="row">
                                            <a href="signupemployer.php">
                                                <button class="btn btn-warning">Sign Up as Employer</button>
                                            </a>
                                            <a href="signup.php">
                                                <button class="btn btn-warning">Sign Up as Applicant</button>
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="modal-header">
                                        <h5 class="modal-title">University Registration</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form" method="POST" action="#">
                                            <div class="header">                                                
                                            </div>
                                            <div class="content">                                                
                                                
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Name" name="University_name" required="required">
                                                    <span class="input-group-addon">
                                                        <i class="zmdi zmdi-account-circle"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="User Name" name="Login_user_name" required="required">
                                                    <span class="input-group-addon">
                                                        <i class="zmdi zmdi-account-circle"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="University Type" name="University_type" required="required">
                                                    <span class="input-group-addon">
                                                        <i class="zmdi zmdi-account-circle"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="University Mobile Number" name="University_mobile" required="required">
                                                    <span class="input-group-addon">
                                                        <i class="zmdi zmdi-email"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" placeholder="University Email" name="University_email" required="required">
                                                    <span class="input-group-addon">
                                                        <i class="zmdi zmdi-account-circle"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="University Physical Location" name="University_physical_location" required="required">
                                                    <span class="input-group-addon">
                                                        <i class="zmdi zmdi-account-circle"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="University Description" name="University_desc" required="required">
                                                    <span class="input-group-addon">
                                                        <i class="zmdi zmdi-account-circle"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="password" placeholder="Password" class="form-control" name="Login_password" required="required">
                                                    <span class="input-group-addon">
                                                        <i class="zmdi zmdi-lock"></i>
                                                    </span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="password" placeholder="Confirm Password" class="form-control" name="cpassword" required="required">
                                                    <span class="input-group-addon">
                                                        <i class="zmdi zmdi-lock"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="footer text-center">
                                                <button class="btn btn-primary btn-round btn-lg btn-block " name="submit">SIGN IN</button>
                                                <small>Already have an account?   <a href="login.php" class="link">      Sign In</a></small>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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


</body>

<!-- Mirrored from demo.dashboardpack.com/finance-html/resister.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Nov 2021 11:01:01 GMT -->
</html>