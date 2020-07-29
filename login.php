<?php
include_once 'includes/dbh.inc.php';
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | FirstPak Bank</title>
  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- External Css -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css" />
  <link rel="stylesheet" href="assets/css/magnific-popup.css" />
  <link rel="stylesheet" href="assets/css/owl.carousel.css" />

  <!-- Custom Css -->
  <link rel="stylesheet" type="text/css" href="css/main.css">

  <!--My Custom Css -->
  <link rel="stylesheet" type="text/css" href="css/mine.css">

  <!--My Custom Css -->
  <link rel="stylesheet" type="text/css" href="css/animate.min.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700%7COpen+Sans" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Expletus+Sans" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="images/logo.png">
  <link rel="stylesheet" href="css/animations.css">
  <link href="sweetalert-js/sweetalert.php" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="sweetalert-js/sweetalert.min.php"></script>
  <script type="text/javascript" src="sweetalert-js/sweetalert-2.php"></script>

  <style type="text/css">
    .navbar-flexo .navbar-collapse {
      background: white !important;
    }

    .navbar-flexo .navbar-collapse .navbar-nav li.dropdown::before {
      color: #336699 !important;
    }
  </style>
</head>

<body style=" overflow-x: hidden;">


  <div class="container-fluid" style=" padding-right:0px; padding-left:0px;">

    <header style=" background:white; width: 100%; z-index: 1000;">

      <div style="background: #264c67;" class="nav-top hidden-xs">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="nav-top-social">
                <ul>

                  <li style="color:white"><i class="fa fa-phone" style="color:white"></i>(302) 439-0766</li>
                  <li style="color:white"><a style="color:white !important" href="contact-us.php"><i style="color:white" class="fa fa-envelope" aria-hidden="true"></i> Contact</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6 ">
              <div class="nav-top-access">
                <ul>
                  <li><a target="_blank" href="login.php" style="color:white"><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
                  <li><a target="_blank" href="register.php" style="color:white"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Open Account</a></li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <nav class="navbar navbar-flexo ">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="width:130px;">
              <img src="images/logo.png" class="img-responsive" alt="Brand Logo">
            </a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown" style="color: white;">
                <a href="#" style="color: white;">Banking & Loans</a>
                <ul class="dropdown-menu">
                  <li><a href="Online-Banking.php">Online Banking</a></li>
                  <li><a href="Mobile-Banking.php">Mobile Banking</a></li>
                  <li><a href="Cards.php">Cards</a></li>
                  <li><a href="ATM.php">ATM</a></li>
                  <li><a href="Student_Loan_Refinance.php">Student Loan Refinance</a></li>
                  <li><a href="internet-banking.php">Internet Banking</a></li>
                  <li><a href="branch-banking.php">Branch Banking</a></li>
                  <li><a href="debit-card.php">Debit Card</a></li>
                  <li><a href="FCTeNS.php">FCTeNS</a></li>
                  <li><a href="e-statements.php">e-Statement</a></li>

                </ul>
              </li>
              <li>
                <a href="wealth-management.php" style="color: white;">Wealth Management</a></li>
              <li class="dropdown">
                <a href="#" style="color: white;">FirstPak Bank</a>
                <ul class="dropdown-menu">
                  <li><a href="about.php">About Us</a></li>
                  <li><a href="contact-us.php">Contact Us</a></li>
                  <li><a href="careers.php">Careers</a></li>
                </ul>
              </li>
              <li class="nav-search hidden-sm hidden-xs"><i class="fa fa-search" style="color: white;"></i></li>
              <li><a class="hidden-lg hidden-md" href="register.php" style="color: white;">Register</a></li>
              <li>
                <a class="hidden-lg hidden-md" href="login.php" style="color: white;">Login</a></li>
              <li style="padding: 0 !important">
                <style>
                  .goog-te-menu-value {
                    padding: 3px !important;
                  }

                  .goog-te-gadget-simple {
                    background-color: #fff;
                    border-left: 1px solid #d5d5d5;
                    border-top: 1px solid #9b9b9b;
                    border-bottom: 1px solid #e8e8e8;
                    border-right: 1px solid #d5d5d5;
                    font-size: 10pt;
                    display: inline-block;
                    padding-top: 1px;
                    padding-bottom: 2px;
                    border-radius: 10px;
                    cursor: pointer;
                    zoom: 1;
                  }
                </style>
                <a id="" href="#">
                  <span id="google_translate_element"></span>

                  <script type="text/javascript">
                    function googleTranslateElementInit() {
                      new google.translate.TranslateElement({
                        pageLanguage: 'en',
                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                      }, 'google_translate_element');
                    }
                  </script>
                  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                </a>
              </li>
            </ul>
          </div>

        </div>
        <div class="header-search">
          <div class="container">
            <h3 class="search-title">Just type and press enter</h3>
            <form id="searchForm" class="searchform" action="#" method="post">
              <div class="form-group">
                <input type="search" name="searchinput" placeholder="Search..." class="form-control" required>
              </div>
            </form>
          </div>
        </div>
      </nav>

    </header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center my_heading">
          <h3 style=" color:white;">Sign In</h3>
        </div>
      </div>
    </div>

    <!-- Image Content -->
    <div class="section-padding-top">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div>
              <h6 class="accordion-title">Online Realtime Balances and Transactions</h6>
              <p>Please type your email and enter your password. </p>

              <?php
              if (isset($_POST['submit'])) {
                $login_id = mysqli_real_escape_string($conn, $_POST['login_id']);
                $login_psw = mysqli_real_escape_string($conn, $_POST['login_psw']);

                $sql = "SELECT * FROM reg_users WHERE bank_id='$login_id' AND psw='$login_psw'";
                $result = mysqli_query($conn, $sql);
                $resultChecker = mysqli_num_rows($result);
                $row = mysqli_fetch_array($result);

                if ($resultChecker < 1) {
                  echo '<div class="alert alert-danger alert-dismissible fade in text-center">
                                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                                <strong>Invalid Login Details!</strong> Wrong Login Id or Password
                                                                              </div>';
                } else {
                  //login user here
                  $_SESSION['id'] = $row['id'];
                  $_SESSION['bank_id'] = $row['bank_id'];
                  $_SESSION['account_no'] = $row['account_no'];
                  $_SESSION['account_balance'] = $row['account_balance'];
                  $_SESSION['date_of_reg'] = $row['date_of_reg'];
                  $_SESSION['last_login'] = $row['last_login'];
                  $_SESSION['first_name'] = $row['first_name'];
                  $_SESSION['last_name'] = $row['last_name'];
                  $_SESSION['nationality'] = $row['nationality'];
                  $_SESSION['occupation'] = $row['occupation'];
                  $_SESSION['email'] = $row['email'];
                  $_SESSION['address'] = $row['address'];
                  $_SESSION['city'] = $row['city'];
                  $_SESSION['state'] = $row['state'];
                  $_SESSION['zip_code'] = $row['zip_code'];
                  $_SESSION['phone_no'] = $row['phone_no'];
                  $_SESSION['dob'] = $row['dob'];
                  $_SESSION['gender'] = $row['gender'];
                  $_SESSION['psw'] = $row['psw'];
                  $_SESSION['marital_status'] = $row['marital_status'];
                  $_SESSION['account_type'] = $row['account_type'];
                  $_SESSION['currency'] = $row['currency'];
                  $_SESSION['photo'] = $row['photo'];
                  $_SESSION['kin_first_name'] = $row['kin_first_name'];
                  $_SESSION['kin_last_name'] = $row['kin_last_name'];
                  $_SESSION['kin_gender'] = $row['kin_gender'];
                  $_SESSION['kin_marital_status'] = $row['kin_marital_status'];
                  $_SESSION['kin_phone_no'] = $row['kin_phone_no'];
                  $_SESSION['kin_email'] = $row['kin_email'];
                  $_SESSION['kin_address'] = $row['kin_address'];
                  $_SESSION['kin_state'] = $row['kin_state'];
                  $_SESSION['kin_city'] = $row['kin_city'];
                  $_SESSION['kin_nationality'] = $row['kin_nationality'];

                  $current_time = strtotime("now");
                  $date = date("jS M, Y h:ia", $current_time);

                  echo      $last_enter = "UPDATE reg_users SET last_login='$date' WHERE id='" . $_SESSION['id'] . "'";
                  if (mysqli_query($conn, $last_enter)) {
                    header("Location: dashboard/index.php");
                    //exit();
                  }
                }
              }

              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2" style="margin-top: 10px;">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                      <i class="glyphicon glyphicon-user" style="color:#336699;"></i> </span>
                    <input type="text" name="login_id" class="form-control" placeholder="Enter Login ID" required aria-describedby="basic-addon1" id="ouser">
                  </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2" style="margin-top: 20px;">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                      <i class="glyphicon glyphicon-asterisk" style="color:#336699;"></i> </span>
                    <input type="password" name="login_psw" class="form-control" placeholder="Enter Password" required aria-describedby="basic-addon1" id="opass">
                  </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2" style="margin-top: 20px;">
                  <button type="submit" name="submit" class="button button-4x covered_but text_white" style="background-color:#336699;">Login</button>
                </div>
              </form>


              <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2" style="margin-top: 5px;">
                <a href="register.php">New Here? Enroll</a> </div>

              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color:#336699;">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel" style="color:white;">Reset Password</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12 col-sm-12" id="showData">
                          Please enter your email below to reset password </div>
                        <div style="color:#336699; " class="col-md-12 col-sm-12" id="result"> </div>
                        <div class="col-md-12 col-sm-12" id="showData">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                              <i class="glyphicon glyphicon-envelope" style="color:#336699;"></i> </span>
                            <input type="email" id="re_email" required name="email" class="form-control" placeholder="Enter Email Address" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onClick="sendMail()">Send Mail</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>

    <!-- Footer -->
    <div class="footer-copyright">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="copyright">
              <p> <a href="#">FirstPak Bank</a> © 2020. All rights reserved.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="privacy text-right">
              <ul>

                <li><a href="risk-disclosure.php">Risk Disclosure </a> | <a href="terms-and-conditions.php">Terms & Conditions </a> | <a href="privacy-policy.php">Privacy Policy</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="assets/js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/imagesloaded.pkgd.min.js"></script>
  <script src="assets/js/isotope.pkgd.min.js"></script>
  <script src="assets/js/jquery.countdown.min.js"></script>
  <script src="assets/js/jquery.countTo.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/visible.js"></script>
  <script src="assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/main.js"></script>
  <!--<script src="js/mine.js"></script>-->
  <script src="js/wow.min.js"></script>

</body>

</html>