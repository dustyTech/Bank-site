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
  <title>Register | FirstPak Bank</title>
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
  <link href="dashboard/dash_style.css" rel="stylesheet" type="text/css" />
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
                <a href="#" style="color: white;">FirstPak Bankk</a>
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
          <h3 style=" color:white;">Registration</h3>
        </div>
      </div>
    </div>

    <!-- Image Content -->
    <div class="section-padding-top">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div>
              <h6 class="accordion-title">Internet Banking Sign-Up</h6>
              Kindly provide the required details below to receive your Internet Banking login details via Email.
              <br>
              <?php
              if (isset($_POST['register'])) {
                $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
                $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
                $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
                $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $address = mysqli_real_escape_string($conn, $_POST['address']);
                $city = mysqli_real_escape_string($conn, $_POST['city']);
                $state = mysqli_real_escape_string($conn, $_POST['state']);
                $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']);
                $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
                $dob = mysqli_real_escape_string($conn, $_POST['dob']);
                $gender = mysqli_real_escape_string($conn, $_POST['gender']);
                $psw = mysqli_real_escape_string($conn, $_POST['psw']);
                $marital_status = mysqli_real_escape_string($conn, $_POST['marital_status']);
                $account_type = mysqli_real_escape_string($conn, $_POST['account_type']);
                $currency = mysqli_real_escape_string($conn, $_POST['currency']);
                $kin_first_name = mysqli_real_escape_string($conn, $_POST['kin_first_name']);
                $kin_last_name = mysqli_real_escape_string($conn, $_POST['kin_last_name']);
                $kin_gender = mysqli_real_escape_string($conn, $_POST['kin_gender']);
                $kin_marital_status = mysqli_real_escape_string($conn, $_POST['kin_marital_status']);
                $kin_phone_no = mysqli_real_escape_string($conn, $_POST['kin_phone_no']);
                $kin_email = mysqli_real_escape_string($conn, $_POST['kin_email']);
                $kin_address = mysqli_real_escape_string($conn, $_POST['kin_address']);
                $kin_state = mysqli_real_escape_string($conn, $_POST['kin_state']);
                $kin_city = mysqli_real_escape_string($conn, $_POST['kin_city']);
                $kin_nationality = mysqli_real_escape_string($conn, $_POST['kin_nationality']);

                // This is the directory where images will be saved 
                $target = 'profile_pics/';
                $target = $target . basename($_FILES['photo']['name']);

                //This gets all the other information from the form 
                $pic = ($_FILES['photo']['name']);

                //Writes the photo to the server 
                move_uploaded_file($_FILES['photo']['tmp_name'], $target);

                $bank_id = time();
                $account_no = '1234567890';
                $account_no = str_shuffle($account_no);
                $account_balance = 0.00;
                $current_time = strtotime("now");
                $date_of_reg = date("jS M, Y h:ia", $current_time);
                $last_login = '';

                $checkEmail = "SELECT * FROM reg_users WHERE email='$email'";
                $result = mysqli_query($conn, $checkEmail);
                $result_checker = mysqli_num_rows($result);

                if ($result_checker > 0) {
                  echo '<div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Email Taken!</strong> This email has an existing account.
                                          </div>';
                } else {

                  $sql2 = "INSERT INTO reg_users(bank_id, account_no, account_balance, date_of_reg, last_login, first_name, last_name, nationality, occupation, email, address, city, state, zip_code, phone_no, dob, gender, psw, marital_status, account_type, currency, photo, kin_first_name, kin_last_name, kin_gender, kin_marital_status, kin_phone_no, kin_email, kin_address, kin_state, kin_city, kin_nationality)
               VALUES('$bank_id', '$account_no', '$account_balance', '$date_of_reg', '$last_login', '$first_name', '$last_name', '$nationality', '$occupation', '$email', '$address', '$city', '$state', '$zip_code', '$phone_no', '$dob', '$gender', '$psw', '$marital_status', '$account_type', '$currency', '$pic', '$kin_first_name', '$kin_last_name', '$kin_gender', '$kin_marital_status', '$kin_phone_no', '$kin_email', '$kin_address', '$kin_state', '$kin_city', '$kin_nationality')";

                  mysqli_query($conn, $sql2);

                  echo '<div class="alert alert-primary alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Your application has been submitted!</strong> Your information will be processed within 24 hours
  </div>';
                }
              }

              ?>
              <span style="color:#FF0000;"></span>
              <div class="col-xs-12 col-sm-12 col-lg-12" style="margin-top: 10px;">
                <form method="POST" enctype="multipart/form-data" onsubmit="return change_psw()">
                  <div class="col-xs-12 col-sm-12 col-lg-12" style="margin-top: 10px;"> </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">First Name</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-user" style="color:#2196F3;"></i> </span>
                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" required>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Last Name</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-user" style="color:#2196F3;"></i> </span>
                      <input type="text" value="" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" required>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Nationality</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-globe" style="color:#2196F3;"></i> </span>
                      <select name="nationality" id="nationality" style="border:#D3CACA solid 1px; border-radius:0px;" class="form-control">
                        <option value="" disabled selected>--Select Country--</option>
                        <option style="font-family: Montserrat, sans-serif;">Afghanistan</option>
                        <option style="font-family: Montserrat, sans-serif;">Albania</option>
                        <option style="font-family: Montserrat, sans-serif;">Algeria</option>
                        <option style="font-family: Montserrat, sans-serif;">American Samoa</option>
                        <option style="font-family: Montserrat, sans-serif;">Andorra</option>
                        <option style="font-family: Montserrat, sans-serif;">Angola</option>
                        <option style="font-family: Montserrat, sans-serif;">Anguilla</option>
                        <option style="font-family: Montserrat, sans-serif;">Antarctica</option>
                        <option style="font-family: Montserrat, sans-serif;">Antigua and Barbuda</option>
                        <option style="font-family: Montserrat, sans-serif;">Argentina</option>
                        <option style="font-family: Montserrat, sans-serif;">Armenia</option>
                        <option style="font-family: Montserrat, sans-serif;">Aruba</option>
                        <option style="font-family: Montserrat, sans-serif;">Australia</option>
                        <option style="font-family: Montserrat, sans-serif;">Austria</option>
                        <option style="font-family: Montserrat, sans-serif;">Azerbaijan</option>
                        <option style="font-family: Montserrat, sans-serif;">Bahamas</option>
                        <option style="font-family: Montserrat, sans-serif;">Bahrain</option>
                        <option style="font-family: Montserrat, sans-serif;">Bangladesh</option>
                        <option style="font-family: Montserrat, sans-serif;">Barbados</option>
                        <option style="font-family: Montserrat, sans-serif;">Belarus</option>
                        <option style="font-family: Montserrat, sans-serif;">Belgium</option>
                        <option style="font-family: Montserrat, sans-serif;">Belize</option>
                        <option style="font-family: Montserrat, sans-serif;">Benin</option>
                        <option style="font-family: Montserrat, sans-serif;">Bermuda</option>
                        <option style="font-family: Montserrat, sans-serif;">Bhutan</option>
                        <option style="font-family: Montserrat, sans-serif;">Bolivia</option>
                        <option style="font-family: Montserrat, sans-serif;">Bosnia and Herzegowina</option>
                        <option style="font-family: Montserrat, sans-serif;">Botswana</option>
                        <option style="font-family: Montserrat, sans-serif;">Bouvet Island</option>
                        <option style="font-family: Montserrat, sans-serif;">Brazil</option>
                        <option style="font-family: Montserrat, sans-serif;">British Indian Ocean Territory</option>
                        <option style="font-family: Montserrat, sans-serif;">Brunei Darussalam</option>
                        <option style="font-family: Montserrat, sans-serif;">Bulgaria</option>
                        <option style="font-family: Montserrat, sans-serif;">Burkina Faso</option>
                        <option style="font-family: Montserrat, sans-serif;">Burundi</option>
                        <option style="font-family: Montserrat, sans-serif;">Cambodia</option>
                        <option style="font-family: Montserrat, sans-serif;">Cameroon</option>
                        <option style="font-family: Montserrat, sans-serif;">Canada</option>
                        <option style="font-family: Montserrat, sans-serif;">Cape Verde</option>
                        <option style="font-family: Montserrat, sans-serif;">Cayman Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Central African Republic</option>
                        <option style="font-family: Montserrat, sans-serif;">Chad</option>
                        <option style="font-family: Montserrat, sans-serif;">Chile</option>
                        <option style="font-family: Montserrat, sans-serif;">China</option>
                        <option style="font-family: Montserrat, sans-serif;">Christmas Island</option>
                        <option style="font-family: Montserrat, sans-serif;">Cocos (Keeling) Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Colombia</option>
                        <option style="font-family: Montserrat, sans-serif;">Comoros</option>
                        <option style="font-family: Montserrat, sans-serif;">Congo</option>
                        <option style="font-family: Montserrat, sans-serif;">Congo, the Democratic Republic of the</option>
                        <option style="font-family: Montserrat, sans-serif;">Cook Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Costa Rica</option>
                        <option style="font-family: Montserrat, sans-serif;">Cote d'Ivoire</option>
                        <option style="font-family: Montserrat, sans-serif;">Croatia (Hrvatska)</option>
                        <option style="font-family: Montserrat, sans-serif;">Cuba</option>
                        <option style="font-family: Montserrat, sans-serif;">Cyprus</option>
                        <option style="font-family: Montserrat, sans-serif;">Czech Republic</option>
                        <option style="font-family: Montserrat, sans-serif;">Denmark</option>
                        <option style="font-family: Montserrat, sans-serif;">Djibouti</option>
                        <option style="font-family: Montserrat, sans-serif;">Dominica</option>
                        <option style="font-family: Montserrat, sans-serif;">Dominican Republic</option>
                        <option style="font-family: Montserrat, sans-serif;">East Timor</option>
                        <option style="font-family: Montserrat, sans-serif;">Ecuador</option>
                        <option style="font-family: Montserrat, sans-serif;">Egypt</option>
                        <option style="font-family: Montserrat, sans-serif;">El Salvador</option>
                        <option style="font-family: Montserrat, sans-serif;">Equatorial Guinea</option>
                        <option style="font-family: Montserrat, sans-serif;">Eritrea</option>
                        <option style="font-family: Montserrat, sans-serif;">Estonia</option>
                        <option style="font-family: Montserrat, sans-serif;">Ethiopia</option>
                        <option style="font-family: Montserrat, sans-serif;">Falkland Islands (Malvinas)</option>
                        <option style="font-family: Montserrat, sans-serif;">Faroe Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Fiji</option>
                        <option style="font-family: Montserrat, sans-serif;">Finland</option>
                        <option style="font-family: Montserrat, sans-serif;">France</option>
                        <option style="font-family: Montserrat, sans-serif;">France, Metropolitan</option>
                        <option style="font-family: Montserrat, sans-serif;">French Guiana</option>
                        <option style="font-family: Montserrat, sans-serif;">French Polynesia</option>
                        <option style="font-family: Montserrat, sans-serif;">French Southern Territories</option>
                        <option style="font-family: Montserrat, sans-serif;">Gabon</option>
                        <option style="font-family: Montserrat, sans-serif;">Gambia</option>
                        <option style="font-family: Montserrat, sans-serif;">Georgia</option>
                        <option style="font-family: Montserrat, sans-serif;">Germany</option>
                        <option style="font-family: Montserrat, sans-serif;">Ghana</option>
                        <option style="font-family: Montserrat, sans-serif;">Gibraltar</option>
                        <option style="font-family: Montserrat, sans-serif;">Greece</option>
                        <option style="font-family: Montserrat, sans-serif;">Greenland</option>
                        <option style="font-family: Montserrat, sans-serif;">Grenada</option>
                        <option style="font-family: Montserrat, sans-serif;">Guadeloupe</option>
                        <option style="font-family: Montserrat, sans-serif;">Guam</option>
                        <option style="font-family: Montserrat, sans-serif;">Guatemala</option>
                        <option style="font-family: Montserrat, sans-serif;">Guinea</option>
                        <option style="font-family: Montserrat, sans-serif;">Guinea-Bissau</option>
                        <option style="font-family: Montserrat, sans-serif;">Guyana</option>
                        <option style="font-family: Montserrat, sans-serif;">Haiti</option>
                        <option style="font-family: Montserrat, sans-serif;">Heard and Mc Donald Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Holy See (Vatican City State)</option>
                        <option style="font-family: Montserrat, sans-serif;">Honduras</option>
                        <option style="font-family: Montserrat, sans-serif;">Hong Kong</option>
                        <option style="font-family: Montserrat, sans-serif;">Hungary</option>
                        <option style="font-family: Montserrat, sans-serif;">Iceland</option>
                        <option style="font-family: Montserrat, sans-serif;">India</option>
                        <option style="font-family: Montserrat, sans-serif;">Indonesia</option>
                        <option style="font-family: Montserrat, sans-serif;">Iran (Islamic Republic of)</option>
                        <option style="font-family: Montserrat, sans-serif;">Iraq</option>
                        <option style="font-family: Montserrat, sans-serif;">Ireland</option>
                        <option style="font-family: Montserrat, sans-serif;">Israel</option>
                        <option style="font-family: Montserrat, sans-serif;">Italy</option>
                        <option style="font-family: Montserrat, sans-serif;">Jamaica</option>
                        <option style="font-family: Montserrat, sans-serif;">Japan</option>
                        <option style="font-family: Montserrat, sans-serif;">Jordan</option>
                        <option style="font-family: Montserrat, sans-serif;">Kazakhstan</option>
                        <option style="font-family: Montserrat, sans-serif;">Kenya</option>
                        <option style="font-family: Montserrat, sans-serif;">Kiribati</option>
                        <option style="font-family: Montserrat, sans-serif;">Korea, Democratic People's Republic of</option>
                        <option style="font-family: Montserrat, sans-serif;">Korea, Republic of</option>
                        <option style="font-family: Montserrat, sans-serif;">Kuwait</option>
                        <option style="font-family: Montserrat, sans-serif;">Kyrgyzstan</option>
                        <option style="font-family: Montserrat, sans-serif;">Lao People's Democratic Republic</option>
                        <option style="font-family: Montserrat, sans-serif;">Latvia</option>
                        <option style="font-family: Montserrat, sans-serif;">Lebanon</option>
                        <option style="font-family: Montserrat, sans-serif;">Lesotho</option>
                        <option style="font-family: Montserrat, sans-serif;">Liberia</option>
                        <option style="font-family: Montserrat, sans-serif;">Libyan Arab Jamahiriya</option>
                        <option style="font-family: Montserrat, sans-serif;">Liechtenstein</option>
                        <option style="font-family: Montserrat, sans-serif;">Lithuania</option>
                        <option style="font-family: Montserrat, sans-serif;">Luxembourg</option>
                        <option style="font-family: Montserrat, sans-serif;">Macau</option>
                        <option style="font-family: Montserrat, sans-serif;">Macedonia</option>
                        <option style="font-family: Montserrat, sans-serif;">Madagascar</option>
                        <option style="font-family: Montserrat, sans-serif;">Malawi</option>
                        <option style="font-family: Montserrat, sans-serif;">Malaysia</option>
                        <option style="font-family: Montserrat, sans-serif;">Maldives</option>
                        <option style="font-family: Montserrat, sans-serif;">Mali</option>
                        <option style="font-family: Montserrat, sans-serif;">Malta</option>
                        <option style="font-family: Montserrat, sans-serif;">Marshall Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Martinique</option>
                        <option style="font-family: Montserrat, sans-serif;">Mauritania</option>
                        <option style="font-family: Montserrat, sans-serif;">Mauritius</option>
                        <option style="font-family: Montserrat, sans-serif;">Mayotte</option>

                        <option style="font-family: Montserrat, sans-serif;">Micronesia, Federated States of</option>
                        <option style="font-family: Montserrat, sans-serif;">Moldova, Republic of</option>
                        <option style="font-family: Montserrat, sans-serif;">Mexico</option>
                        <option style="font-family: Montserrat, sans-serif;">Monaco</option>
                        <option style="font-family: Montserrat, sans-serif;">Mongolia</option>
                        <option style="font-family: Montserrat, sans-serif;">Montserrat</option>
                        <option style="font-family: Montserrat, sans-serif;">Morocco</option>
                        <option style="font-family: Montserrat, sans-serif;">Mozambique</option>
                        <option style="font-family: Montserrat, sans-serif;">Myanmar</option>
                        <option style="font-family: Montserrat, sans-serif;">Namibia</option>
                        <option style="font-family: Montserrat, sans-serif;">Nauru</option>
                        <option style="font-family: Montserrat, sans-serif;">Nepal</option>
                        <option style="font-family: Montserrat, sans-serif;">Netherlands</option>
                        <option style="font-family: Montserrat, sans-serif;">Netherlands Antilles</option>
                        <option style="font-family: Montserrat, sans-serif;">New Caledonia</option>
                        <option style="font-family: Montserrat, sans-serif;">New Zealand</option>
                        <option style="font-family: Montserrat, sans-serif;">Nicaragua</option>
                        <option style="font-family: Montserrat, sans-serif;">Niger</option>
                        <option style="font-family: Montserrat, sans-serif;">Nigeria</option>
                        <option style="font-family: Montserrat, sans-serif;">Niue</option>
                        <option style="font-family: Montserrat, sans-serif;">Norfolk Island</option>
                        <option style="font-family: Montserrat, sans-serif;">Northern Mariana Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Norway</option>
                        <option style="font-family: Montserrat, sans-serif;">Oman</option>
                        <option style="font-family: Montserrat, sans-serif;">Pakistan</option>
                        <option style="font-family: Montserrat, sans-serif;">Palau</option>
                        <option style="font-family: Montserrat, sans-serif;">Panama</option>
                        <option style="font-family: Montserrat, sans-serif;">Papua New Guinea</option>
                        <option style="font-family: Montserrat, sans-serif;">Paraguay</option>
                        <option style="font-family: Montserrat, sans-serif;">Peru</option>
                        <option style="font-family: Montserrat, sans-serif;">Philippines</option>
                        <option style="font-family: Montserrat, sans-serif;">Pitcairn</option>
                        <option style="font-family: Montserrat, sans-serif;">Poland</option>
                        <option style="font-family: Montserrat, sans-serif;">Portugal</option>
                        <option style="font-family: Montserrat, sans-serif;">Puerto Rico</option>
                        <option style="font-family: Montserrat, sans-serif;">Qatar</option>
                        <option style="font-family: Montserrat, sans-serif;">Reunion</option>
                        <option style="font-family: Montserrat, sans-serif;">Romania</option>
                        <option style="font-family: Montserrat, sans-serif;">Russian Federation</option>
                        <option style="font-family: Montserrat, sans-serif;">Rwanda</option>
                        <option style="font-family: Montserrat, sans-serif;">Saint Kitts and Nevis</option>
                        <option style="font-family: Montserrat, sans-serif;">Saint LUCIA</option>
                        <option style="font-family: Montserrat, sans-serif;">Saint Vincent and the Grenadines</option>
                        <option style="font-family: Montserrat, sans-serif;">Samoa</option>
                        <option style="font-family: Montserrat, sans-serif;">San Marino</option>
                        <option style="font-family: Montserrat, sans-serif;">Sao Tome and Principe</option>
                        <option style="font-family: Montserrat, sans-serif;">Saudi Arabia</option>
                        <option style="font-family: Montserrat, sans-serif;">Senegal</option>
                        <option style="font-family: Montserrat, sans-serif;">Seychelles</option>
                        <option style="font-family: Montserrat, sans-serif;">Sierra Leone</option>
                        <option style="font-family: Montserrat, sans-serif;">Singapore</option>
                        <option style="font-family: Montserrat, sans-serif;">Slovakia (Slovak Republic)</option>
                        <option style="font-family: Montserrat, sans-serif;">Slovenia</option>
                        <option style="font-family: Montserrat, sans-serif;">Solomon Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Somalia</option>
                        <option style="font-family: Montserrat, sans-serif;">South Africa</option>
                        <option style="font-family: Montserrat, sans-serif;">South Georgia and the South Sandwich Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Spain</option>
                        <option style="font-family: Montserrat, sans-serif;">Sri Lanka</option>
                        <option style="font-family: Montserrat, sans-serif;">St. Helena</option>
                        <option style="font-family: Montserrat, sans-serif;">St. Pierre and Miquelon</option>
                        <option style="font-family: Montserrat, sans-serif;">Sudan</option>
                        <option style="font-family: Montserrat, sans-serif;">Suriname</option>
                        <option style="font-family: Montserrat, sans-serif;">Svalbard and Jan Mayen Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Swaziland</option>
                        <option style="font-family: Montserrat, sans-serif;">Sweden</option>
                        <option style="font-family: Montserrat, sans-serif;">Switzerland</option>
                        <option style="font-family: Montserrat, sans-serif;">Syrian Arab Republic</option>
                        <option style="font-family: Montserrat, sans-serif;">Taiwan, Province of China</option>
                        <option style="font-family: Montserrat, sans-serif;">Tajikistan</option>
                        <option style="font-family: Montserrat, sans-serif;">Tanzania, United Republic of</option>
                        <option style="font-family: Montserrat, sans-serif;">Thailand</option>
                        <option style="font-family: Montserrat, sans-serif;">Togo</option>
                        <option style="font-family: Montserrat, sans-serif;">Tokelau</option>
                        <option style="font-family: Montserrat, sans-serif;">Tonga</option>
                        <option style="font-family: Montserrat, sans-serif;">Trinidad and Tobago</option>
                        <option style="font-family: Montserrat, sans-serif;">Tunisia</option>
                        <option style="font-family: Montserrat, sans-serif;">Turkey</option>
                        <option style="font-family: Montserrat, sans-serif;">Turkmenistan</option>
                        <option style="font-family: Montserrat, sans-serif;">Turks and Caicos Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Tuvalu</option>
                        <option style="font-family: Montserrat, sans-serif;">Uganda</option>
                        <option style="font-family: Montserrat, sans-serif;">Ukraine</option>
                        <option style="font-family: Montserrat, sans-serif;">United Arab Emirates</option>
                        <option style="font-family: Montserrat, sans-serif;">United Kingdom</option>
                        <option style="font-family: Montserrat, sans-serif;">United States</option>
                        <option style="font-family: Montserrat, sans-serif;">United States Minor Outlying Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Uruguay</option>
                        <option style="font-family: Montserrat, sans-serif;">Uzbekistan</option>
                        <option style="font-family: Montserrat, sans-serif;">Vanuatu</option>
                        <option style="font-family: Montserrat, sans-serif;">Venezuela</option>
                        <option style="font-family: Montserrat, sans-serif;">Viet Nam</option>
                        <option style="font-family: Montserrat, sans-serif;">Virgin Islands (British)</option>
                        <option style="font-family: Montserrat, sans-serif;">Virgin Islands (U.S.)</option>
                        <option style="font-family: Montserrat, sans-serif;">Wallis and Futuna Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Western Sahara</option>
                        <option style="font-family: Montserrat, sans-serif;">Yemen</option>
                        <option style="font-family: Montserrat, sans-serif;">Yugoslavia</option>
                        <option style="font-family: Montserrat, sans-serif;">Zambia</option>
                        <option style="font-family: Montserrat, sans-serif;">Zimbabwe</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Occupation</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-tags" style="color:#2196F3;"></i> </span>
                      <input type="text" required name="occupation" id="occupation" class="form-control" placeholder="Occupation">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Email</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-envelope" style="color:#2196F3;"></i> </span>
                      <input type="email" required id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Address</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-map-marker" style="color:#2196F3;"></i> </span>
                      <input type="text" required name="address" id="address" class="form-control" placeholder="Address">
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">City</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-map-marker" style="color:#2196F3;"></i> </span>
                      <input type="text" required name="city" class="form-control" placeholder="City">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">State</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-map-marker" style="color:#2196F3;"></i> </span>
                      <input type="text" required name="state" id="state" class="form-control" placeholder="state">
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Zipcode</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-map-marker" style="color:#2196F3;"></i> </span>
                      <input type="text" value="" required name="zip_code" class="form-control" placeholder="Zipcode">
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Phone</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-phone" style="color:#2196F3;"></i> </span>
                      <input type="text" value="" id="phone_no" required name="phone_no" class="form-control" placeholder="Telephone">
                    </div>

                    <div class="row" style=" position:absolute;  ">
                      <div hidden="hidden" style="color:red; background-color: white; z-index: 1000;" class="col-md-12 col-sm-12 col-lg-12" id="phone_error"> </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Date of Birth</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-calendar" style="color:#2196F3;"></i> </span>
                      <input type="date" required id="dob" name="dob" class="form-control" placeholder="Date of Birth" aria-describedby="basic-addon1">
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Gender</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-user" style="color:#2196F3;"></i>
                      </span>
                      <select name="gender" class="form-control" id="gender" required>
                        <option value="" selected disabled>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="psw">Password</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-key" style="color:#2196F3;"></i>
                      </span>
                      <input type="password" id="psw" required name="psw" class="form-control" placeholder="Enter Password">

                    </div>
                    <div id="msg" style="color: red;" class="mb-3"></div>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Confirm Password</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-key" style="color:#2196F3;"></i>
                      </span>
                      <input type="password" id="re_psw" required name="re_psw" class="form-control" placeholder="Comfirm Password">
                    </div>
                    <div id="msg2" style="color: red;" class="mb-3"></div>
                    <script>
                      var msg = document.getElementById('msg');
                      var msg2 = document.getElementById('msg2');
                      var psw = document.getElementById('psw');
                      var re_psw = document.getElementById('re_psw');

                      function change_psw() {
                        if (psw.value.length < 6) {
                          msg.innerHTML = "<div> password must be more than 6 characters </div>";
                          return false;
                        } else if (psw.value !== re_psw.value) {
                          msg2.innerHTML = "<div> password not matched </div>";
                          return false;
                        }

                      }
                    </script>
                  </div>


                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Marital Status</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-tags" style="color:#2196F3;"></i> </span>
                      <select name="marital_status" class="form-control" required>
                        <option value="" selected disabled>Marital Status</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Divorced</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Account Type</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-briefcase" style="color:#2196F3;"></i> </span>
                      <select name="account_type" class="form-control" id="account_type" required>

                        <option selected disabled>Account Type</option>
                        <option>Savings</option>
                        <option>Checking</option>
                        <option>Current</option>
                        <option>Offshore</option>
                        <option>Joint</option>
                        <option>Fixed</option>
                      </select>
                    </div>
                  </div>


                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Choose Prefered Currency</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-money" style="color:#2196F3;"></i> </span>
                      <select name="currency" required class="form-control currency_changer" id="currency">
                        <option value="" selecetd disabled>Prefered Currency</option>
                        <option value="USD">USD</option>
                        <option value="GBP">British pound (GBP)</option>
                        <option value="EURO">EURO (EUR)</option>
                        <option value="AUD">Australian Dollar (AUD)</option>
                        <option value="CAD">Canadian Dollars (CAD)</option>
                        <option value="CHF">Swiss Franc (fr)</option>
                        <option value="JPY">Japanese Yen (JPY)</option>
                        <option value="NZD">New Zealand Dollars (NZD)</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Passport photograph</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-user-circle" style="color:#2196F3;"></i> </span>
                      <input type="file" name="photo" id="photo" required class="form-control" />
                    </div>

                    <div class="row" style=" position:absolute;  ">
                      <div hidden="hidden" style="color:red; background-color: white; z-index: 1000;" class="col-xs-12 col-sm-12 col-lg-12" id="user_error"> </div>
                    </div>
                  </div>

                  <hr>
                  <br>
                  <div class="hazie-buut-text style1">Next of Kin </div>

                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">First Name</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-user" style="color:#2196F3;"></i> </span>
                      <input type="text" class="form-control" name="kin_first_name" placeholder="Enter First Name" value="" required id="kin_first_name">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Last Name</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-user" style="color:#2196F3;"></i> </span>
                      <input type="text" class="form-control" name="kin_last_name" placeholder="Enter last Name" value="" required id="kin_last_name">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Gender</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-user" style="color:#2196F3;"></i> </span>
                      <select name="kin_gender" class="form-control" id="kin_gender" required>
                        <option value="" selected disabled>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Marital Status</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-tags" style="color:#2196F3;"></i>
                      </span>
                      <select name="kin_marital_status" class="form-control" required>
                        <option value="" selected disabled>Marital Status</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Divorced</option>
                      </select>
                    </div>
                  </div>


                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Phone</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-user" style="color:#2196F3;"></i> </span>
                      <input type="text" class="form-control" name="kin_phone_no" placeholder="Enter Phone" value="" required aria-describedby="basic-addon1" id="kphone">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Email</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-envelope" style="color:#2196F3;"></i> </span>
                      <input type="email" class="form-control" name="kin_email" placeholder="Enter Email" value="" required aria-describedby="basic-addon1" id="kemail">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Address</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-address-book" style="color:#2196F3;"></i> </span>
                      <input type="text" class="form-control" name="kin_address" placeholder="Enter Address" required id="kin_address">
                    </div>
                  </div>

                  <!--                              
-->
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">State</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-user" style="color:#2196F3;"></i>
                      </span>
                      <input type="text" class="form-control" name="kin_state" placeholder="Enter State" value="" required aria-describedby="basic-addon1" id="kstate">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">City</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-user" style="color:#2196F3;"></i>
                      </span>
                      <input type="text" class="form-control" name="kin_city" placeholder="Enter City" value="" required aria-describedby="basic-addon1" id="kstate">
                    </div>
                  </div>
                  <!--
                           
-->
                  <div class="col-xs-12 col-sm-6 col-lg-6" style="margin-top: 10px;">
                    <label for="">Nationality</label>
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-globe" style="color:#2196F3;"></i> </span>
                      <select name="kin_nationality" id="kin_nationality" style="border:#D3CACA solid 1px; border-radius:0px;" required class="form-control">
                        <option value="" disabled selected>--Select Country--</option>
                        <option style="font-family: Montserrat, sans-serif;">Afghanistan</option>
                        <option style="font-family: Montserrat, sans-serif;">Albania</option>
                        <option style="font-family: Montserrat, sans-serif;">Algeria</option>
                        <option style="font-family: Montserrat, sans-serif;">American Samoa</option>
                        <option style="font-family: Montserrat, sans-serif;">Andorra</option>
                        <option style="font-family: Montserrat, sans-serif;">Angola</option>
                        <option style="font-family: Montserrat, sans-serif;">Anguilla</option>
                        <option style="font-family: Montserrat, sans-serif;">Antarctica</option>
                        <option style="font-family: Montserrat, sans-serif;">Antigua and Barbuda</option>
                        <option style="font-family: Montserrat, sans-serif;">Argentina</option>
                        <option style="font-family: Montserrat, sans-serif;">Armenia</option>
                        <option style="font-family: Montserrat, sans-serif;">Aruba</option>
                        <option style="font-family: Montserrat, sans-serif;">Australia</option>
                        <option style="font-family: Montserrat, sans-serif;">Austria</option>
                        <option style="font-family: Montserrat, sans-serif;">Azerbaijan</option>
                        <option style="font-family: Montserrat, sans-serif;">Bahamas</option>
                        <option style="font-family: Montserrat, sans-serif;">Bahrain</option>
                        <option style="font-family: Montserrat, sans-serif;">Bangladesh</option>
                        <option style="font-family: Montserrat, sans-serif;">Barbados</option>
                        <option style="font-family: Montserrat, sans-serif;">Belarus</option>
                        <option style="font-family: Montserrat, sans-serif;">Belgium</option>
                        <option style="font-family: Montserrat, sans-serif;">Belize</option>
                        <option style="font-family: Montserrat, sans-serif;">Benin</option>
                        <option style="font-family: Montserrat, sans-serif;">Bermuda</option>
                        <option style="font-family: Montserrat, sans-serif;">Bhutan</option>
                        <option style="font-family: Montserrat, sans-serif;">Bolivia</option>
                        <option style="font-family: Montserrat, sans-serif;">Bosnia and Herzegowina</option>
                        <option style="font-family: Montserrat, sans-serif;">Botswana</option>
                        <option style="font-family: Montserrat, sans-serif;">Bouvet Island</option>
                        <option style="font-family: Montserrat, sans-serif;">Brazil</option>
                        <option style="font-family: Montserrat, sans-serif;">British Indian Ocean Territory</option>
                        <option style="font-family: Montserrat, sans-serif;">Brunei Darussalam</option>
                        <option style="font-family: Montserrat, sans-serif;">Bulgaria</option>
                        <option style="font-family: Montserrat, sans-serif;">Burkina Faso</option>
                        <option style="font-family: Montserrat, sans-serif;">Burundi</option>
                        <option style="font-family: Montserrat, sans-serif;">Cambodia</option>
                        <option style="font-family: Montserrat, sans-serif;">Cameroon</option>
                        <option style="font-family: Montserrat, sans-serif;">Canada</option>
                        <option style="font-family: Montserrat, sans-serif;">Cape Verde</option>
                        <option style="font-family: Montserrat, sans-serif;">Cayman Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Central African Republic</option>
                        <option style="font-family: Montserrat, sans-serif;">Chad</option>
                        <option style="font-family: Montserrat, sans-serif;">Chile</option>
                        <option style="font-family: Montserrat, sans-serif;">China</option>
                        <option style="font-family: Montserrat, sans-serif;">Christmas Island</option>
                        <option style="font-family: Montserrat, sans-serif;">Cocos (Keeling) Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Colombia</option>
                        <option style="font-family: Montserrat, sans-serif;">Comoros</option>
                        <option style="font-family: Montserrat, sans-serif;">Congo</option>
                        <option style="font-family: Montserrat, sans-serif;">Congo, the Democratic Republic of the</option>
                        <option style="font-family: Montserrat, sans-serif;">Cook Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Costa Rica</option>
                        <option style="font-family: Montserrat, sans-serif;">Cote d'Ivoire</option>
                        <option style="font-family: Montserrat, sans-serif;">Croatia (Hrvatska)</option>
                        <option style="font-family: Montserrat, sans-serif;">Cuba</option>
                        <option style="font-family: Montserrat, sans-serif;">Cyprus</option>
                        <option style="font-family: Montserrat, sans-serif;">Czech Republic</option>
                        <option style="font-family: Montserrat, sans-serif;">Denmark</option>
                        <option style="font-family: Montserrat, sans-serif;">Djibouti</option>
                        <option style="font-family: Montserrat, sans-serif;">Dominica</option>
                        <option style="font-family: Montserrat, sans-serif;">Dominican Republic</option>
                        <option style="font-family: Montserrat, sans-serif;">East Timor</option>
                        <option style="font-family: Montserrat, sans-serif;">Ecuador</option>
                        <option style="font-family: Montserrat, sans-serif;">Egypt</option>
                        <option style="font-family: Montserrat, sans-serif;">El Salvador</option>
                        <option style="font-family: Montserrat, sans-serif;">Equatorial Guinea</option>
                        <option style="font-family: Montserrat, sans-serif;">Eritrea</option>
                        <option style="font-family: Montserrat, sans-serif;">Estonia</option>
                        <option style="font-family: Montserrat, sans-serif;">Ethiopia</option>
                        <option style="font-family: Montserrat, sans-serif;">Falkland Islands (Malvinas)</option>
                        <option style="font-family: Montserrat, sans-serif;">Faroe Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Fiji</option>
                        <option style="font-family: Montserrat, sans-serif;">Finland</option>
                        <option style="font-family: Montserrat, sans-serif;">France</option>
                        <option style="font-family: Montserrat, sans-serif;">France, Metropolitan</option>
                        <option style="font-family: Montserrat, sans-serif;">French Guiana</option>
                        <option style="font-family: Montserrat, sans-serif;">French Polynesia</option>
                        <option style="font-family: Montserrat, sans-serif;">French Southern Territories</option>
                        <option style="font-family: Montserrat, sans-serif;">Gabon</option>
                        <option style="font-family: Montserrat, sans-serif;">Gambia</option>
                        <option style="font-family: Montserrat, sans-serif;">Georgia</option>
                        <option style="font-family: Montserrat, sans-serif;">Germany</option>
                        <option style="font-family: Montserrat, sans-serif;">Ghana</option>
                        <option style="font-family: Montserrat, sans-serif;">Gibraltar</option>
                        <option style="font-family: Montserrat, sans-serif;">Greece</option>
                        <option style="font-family: Montserrat, sans-serif;">Greenland</option>
                        <option style="font-family: Montserrat, sans-serif;">Grenada</option>
                        <option style="font-family: Montserrat, sans-serif;">Guadeloupe</option>
                        <option style="font-family: Montserrat, sans-serif;">Guam</option>
                        <option style="font-family: Montserrat, sans-serif;">Guatemala</option>
                        <option style="font-family: Montserrat, sans-serif;">Guinea</option>
                        <option style="font-family: Montserrat, sans-serif;">Guinea-Bissau</option>
                        <option style="font-family: Montserrat, sans-serif;">Guyana</option>
                        <option style="font-family: Montserrat, sans-serif;">Haiti</option>
                        <option style="font-family: Montserrat, sans-serif;">Heard and Mc Donald Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Holy See (Vatican City State)</option>
                        <option style="font-family: Montserrat, sans-serif;">Honduras</option>
                        <option style="font-family: Montserrat, sans-serif;">Hong Kong</option>
                        <option style="font-family: Montserrat, sans-serif;">Hungary</option>
                        <option style="font-family: Montserrat, sans-serif;">Iceland</option>
                        <option style="font-family: Montserrat, sans-serif;">India</option>
                        <option style="font-family: Montserrat, sans-serif;">Indonesia</option>
                        <option style="font-family: Montserrat, sans-serif;">Iran (Islamic Republic of)</option>
                        <option style="font-family: Montserrat, sans-serif;">Iraq</option>
                        <option style="font-family: Montserrat, sans-serif;">Ireland</option>
                        <option style="font-family: Montserrat, sans-serif;">Israel</option>
                        <option style="font-family: Montserrat, sans-serif;">Italy</option>
                        <option style="font-family: Montserrat, sans-serif;">Jamaica</option>
                        <option style="font-family: Montserrat, sans-serif;">Japan</option>
                        <option style="font-family: Montserrat, sans-serif;">Jordan</option>
                        <option style="font-family: Montserrat, sans-serif;">Kazakhstan</option>
                        <option style="font-family: Montserrat, sans-serif;">Kenya</option>
                        <option style="font-family: Montserrat, sans-serif;">Kiribati</option>
                        <option style="font-family: Montserrat, sans-serif;">Korea, Democratic People's Republic of</option>
                        <option style="font-family: Montserrat, sans-serif;">Korea, Republic of</option>
                        <option style="font-family: Montserrat, sans-serif;">Kuwait</option>
                        <option style="font-family: Montserrat, sans-serif;">Kyrgyzstan</option>
                        <option style="font-family: Montserrat, sans-serif;">Lao People's Democratic Republic</option>
                        <option style="font-family: Montserrat, sans-serif;">Latvia</option>
                        <option style="font-family: Montserrat, sans-serif;">Lebanon</option>
                        <option style="font-family: Montserrat, sans-serif;">Lesotho</option>
                        <option style="font-family: Montserrat, sans-serif;">Liberia</option>
                        <option style="font-family: Montserrat, sans-serif;">Libyan Arab Jamahiriya</option>
                        <option style="font-family: Montserrat, sans-serif;">Liechtenstein</option>
                        <option style="font-family: Montserrat, sans-serif;">Lithuania</option>
                        <option style="font-family: Montserrat, sans-serif;">Luxembourg</option>
                        <option style="font-family: Montserrat, sans-serif;">Macau</option>
                        <option style="font-family: Montserrat, sans-serif;">Macedonia</option>
                        <option style="font-family: Montserrat, sans-serif;">Madagascar</option>
                        <option style="font-family: Montserrat, sans-serif;">Malawi</option>
                        <option style="font-family: Montserrat, sans-serif;">Malaysia</option>
                        <option style="font-family: Montserrat, sans-serif;">Maldives</option>
                        <option style="font-family: Montserrat, sans-serif;">Mali</option>
                        <option style="font-family: Montserrat, sans-serif;">Malta</option>
                        <option style="font-family: Montserrat, sans-serif;">Marshall Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Martinique</option>
                        <option style="font-family: Montserrat, sans-serif;">Mauritania</option>
                        <option style="font-family: Montserrat, sans-serif;">Mauritius</option>
                        <option style="font-family: Montserrat, sans-serif;">Mayotte</option>

                        <option style="font-family: Montserrat, sans-serif;">Micronesia, Federated States of</option>
                        <option style="font-family: Montserrat, sans-serif;">Moldova, Republic of</option>
                        <option style="font-family: Montserrat, sans-serif;">Mexico</option>
                        <option style="font-family: Montserrat, sans-serif;">Monaco</option>
                        <option style="font-family: Montserrat, sans-serif;">Mongolia</option>
                        <option style="font-family: Montserrat, sans-serif;">Montserrat</option>
                        <option style="font-family: Montserrat, sans-serif;">Morocco</option>
                        <option style="font-family: Montserrat, sans-serif;">Mozambique</option>
                        <option style="font-family: Montserrat, sans-serif;">Myanmar</option>
                        <option style="font-family: Montserrat, sans-serif;">Namibia</option>
                        <option style="font-family: Montserrat, sans-serif;">Nauru</option>
                        <option style="font-family: Montserrat, sans-serif;">Nepal</option>
                        <option style="font-family: Montserrat, sans-serif;">Netherlands</option>
                        <option style="font-family: Montserrat, sans-serif;">Netherlands Antilles</option>
                        <option style="font-family: Montserrat, sans-serif;">New Caledonia</option>
                        <option style="font-family: Montserrat, sans-serif;">New Zealand</option>
                        <option style="font-family: Montserrat, sans-serif;">Nicaragua</option>
                        <option style="font-family: Montserrat, sans-serif;">Niger</option>
                        <option style="font-family: Montserrat, sans-serif;">Nigeria</option>
                        <option style="font-family: Montserrat, sans-serif;">Niue</option>
                        <option style="font-family: Montserrat, sans-serif;">Norfolk Island</option>
                        <option style="font-family: Montserrat, sans-serif;">Northern Mariana Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Norway</option>
                        <option style="font-family: Montserrat, sans-serif;">Oman</option>
                        <option style="font-family: Montserrat, sans-serif;">Pakistan</option>
                        <option style="font-family: Montserrat, sans-serif;">Palau</option>
                        <option style="font-family: Montserrat, sans-serif;">Panama</option>
                        <option style="font-family: Montserrat, sans-serif;">Papua New Guinea</option>
                        <option style="font-family: Montserrat, sans-serif;">Paraguay</option>
                        <option style="font-family: Montserrat, sans-serif;">Peru</option>
                        <option style="font-family: Montserrat, sans-serif;">Philippines</option>
                        <option style="font-family: Montserrat, sans-serif;">Pitcairn</option>
                        <option style="font-family: Montserrat, sans-serif;">Poland</option>
                        <option style="font-family: Montserrat, sans-serif;">Portugal</option>
                        <option style="font-family: Montserrat, sans-serif;">Puerto Rico</option>
                        <option style="font-family: Montserrat, sans-serif;">Qatar</option>
                        <option style="font-family: Montserrat, sans-serif;">Reunion</option>
                        <option style="font-family: Montserrat, sans-serif;">Romania</option>
                        <option style="font-family: Montserrat, sans-serif;">Russian Federation</option>
                        <option style="font-family: Montserrat, sans-serif;">Rwanda</option>
                        <option style="font-family: Montserrat, sans-serif;">Saint Kitts and Nevis</option>
                        <option style="font-family: Montserrat, sans-serif;">Saint LUCIA</option>
                        <option style="font-family: Montserrat, sans-serif;">Saint Vincent and the Grenadines</option>
                        <option style="font-family: Montserrat, sans-serif;">Samoa</option>
                        <option style="font-family: Montserrat, sans-serif;">San Marino</option>
                        <option style="font-family: Montserrat, sans-serif;">Sao Tome and Principe</option>
                        <option style="font-family: Montserrat, sans-serif;">Saudi Arabia</option>
                        <option style="font-family: Montserrat, sans-serif;">Senegal</option>
                        <option style="font-family: Montserrat, sans-serif;">Seychelles</option>
                        <option style="font-family: Montserrat, sans-serif;">Sierra Leone</option>
                        <option style="font-family: Montserrat, sans-serif;">Singapore</option>
                        <option style="font-family: Montserrat, sans-serif;">Slovakia (Slovak Republic)</option>
                        <option style="font-family: Montserrat, sans-serif;">Slovenia</option>
                        <option style="font-family: Montserrat, sans-serif;">Solomon Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Somalia</option>
                        <option style="font-family: Montserrat, sans-serif;">South Africa</option>
                        <option style="font-family: Montserrat, sans-serif;">South Georgia and the South Sandwich Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Spain</option>
                        <option style="font-family: Montserrat, sans-serif;">Sri Lanka</option>
                        <option style="font-family: Montserrat, sans-serif;">St. Helena</option>
                        <option style="font-family: Montserrat, sans-serif;">St. Pierre and Miquelon</option>
                        <option style="font-family: Montserrat, sans-serif;">Sudan</option>
                        <option style="font-family: Montserrat, sans-serif;">Suriname</option>
                        <option style="font-family: Montserrat, sans-serif;">Svalbard and Jan Mayen Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Swaziland</option>
                        <option style="font-family: Montserrat, sans-serif;">Sweden</option>
                        <option style="font-family: Montserrat, sans-serif;">Switzerland</option>
                        <option style="font-family: Montserrat, sans-serif;">Syrian Arab Republic</option>
                        <option style="font-family: Montserrat, sans-serif;">Taiwan, Province of China</option>
                        <option style="font-family: Montserrat, sans-serif;">Tajikistan</option>
                        <option style="font-family: Montserrat, sans-serif;">Tanzania, United Republic of</option>
                        <option style="font-family: Montserrat, sans-serif;">Thailand</option>
                        <option style="font-family: Montserrat, sans-serif;">Togo</option>
                        <option style="font-family: Montserrat, sans-serif;">Tokelau</option>
                        <option style="font-family: Montserrat, sans-serif;">Tonga</option>
                        <option style="font-family: Montserrat, sans-serif;">Trinidad and Tobago</option>
                        <option style="font-family: Montserrat, sans-serif;">Tunisia</option>
                        <option style="font-family: Montserrat, sans-serif;">Turkey</option>
                        <option style="font-family: Montserrat, sans-serif;">Turkmenistan</option>
                        <option style="font-family: Montserrat, sans-serif;">Turks and Caicos Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Tuvalu</option>
                        <option style="font-family: Montserrat, sans-serif;">Uganda</option>
                        <option style="font-family: Montserrat, sans-serif;">Ukraine</option>
                        <option style="font-family: Montserrat, sans-serif;">United Arab Emirates</option>
                        <option style="font-family: Montserrat, sans-serif;">United Kingdom</option>
                        <option style="font-family: Montserrat, sans-serif;">United States</option>
                        <option style="font-family: Montserrat, sans-serif;">United States Minor Outlying Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Uruguay</option>
                        <option style="font-family: Montserrat, sans-serif;">Uzbekistan</option>
                        <option style="font-family: Montserrat, sans-serif;">Vanuatu</option>
                        <option style="font-family: Montserrat, sans-serif;">Venezuela</option>
                        <option style="font-family: Montserrat, sans-serif;">Viet Nam</option>
                        <option style="font-family: Montserrat, sans-serif;">Virgin Islands (British)</option>
                        <option style="font-family: Montserrat, sans-serif;">Virgin Islands (U.S.)</option>
                        <option style="font-family: Montserrat, sans-serif;">Wallis and Futuna Islands</option>
                        <option style="font-family: Montserrat, sans-serif;">Western Sahara</option>
                        <option style="font-family: Montserrat, sans-serif;">Yemen</option>
                        <option style="font-family: Montserrat, sans-serif;">Yugoslavia</option>
                        <option style="font-family: Montserrat, sans-serif;">Zambia</option>
                        <option style="font-family: Montserrat, sans-serif;">Zimbabwe</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 text-center" style="margin-top: 20px;">
                    <button type="submit" name="register" id="register" class="button button-4x covered_but text_white" style="background-color:#336699;">Submit</button>
                  </div>

                </form>

                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 text-center" style="margin-top: 5px;">
                  <a href="login.php">Have an account already? Sign in</a> </div>
                <br>
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