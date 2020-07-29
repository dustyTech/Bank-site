<?php
include_once '../includes/dbh.inc.php';
session_start();
ob_start();

if ($_SESSION['bank_id'] == "") {
    header("Location: ../login.php");
}

$client = $_SESSION['id'];

$sql = "SELECT * FROM reg_users where id='$client'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> International Transactions | Account Statement | FirstPak Bank </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- js -->
    <script src="js/script.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/png" href="../images/logo.png">
    <style>
        .bg-primary {
            background: #336699 !important;
        }

        .nav-link {
            font-size: 14px;
        }

        body {
            overflow-x: hidden;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #336699;
        }

        .tab-content>.active {
            display: block;
            background: #336699;
            color: #fff;
            /*                    padding-left: 10px; 
                    padding-right: 10px; */
        }

        /*
            
            .navbar-dark .navbar-toggler-icon {
                background-image: url('../images/hamburger.png') !important;
            }*/
    </style>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <link rel="stylesheet" type="text/css" media="screen" href="https://www.ifcmarkets.com/css/widget/live_quotes_ifc_widget_scroll.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="https://www.ifcmarkets.com/css/front/quotesline.css" />
            <script type="text/javascript">
                var lang_lqs = 'en';
                var hname_lqs = "www.ifcmarkets.com";
                var vi = document.createElement('script');
                vi.type = 'text/javascript';
                vi.async = true;
                vi.src = 'https://www.ifcmarkets.com/js/live_quotes_ifc_widget_scroll.js';
                var instrument_list = "EURUSD,GBPUSD,USDJPY,AUDUSD,USDCHF,USDCAD,XAUUSD,XAGUSD";
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(vi, s);
            </script>
            <div id="ifc_widgetlivequotes_scrl" class="ifc_widgetlivequotes_scrl">
                <div class="live_quotations" id="scroller_container">
                    <div id="scroller"></div>
                </div>
            </div>
            <div id="ifc_nedlivequotes_scrl" class="ifc_nedlivequotes_scrl" style=""><a href="https://www.ifcmarkets.com/en/informers" target="_blank" rel="nofollow"><img src="https://www.ifcmarkets.com/uploads/informers/lq_provided_by.png" /></a></div>
        </div>
    </div>
    <div class="d-flex header-top">
        <div class="mr-auto p-2">
            <a href="../index.php" class="float-left"><img src="../images/logo.png" alt="logo" style="width: 100px; height: 34px;" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" /></a>
        </div>
        <div class="p-2">
            <a href="../includes/logout.php" class="btn btn-primary" style="color: #fff; background: #346dbf">Log out</a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-1">
        <button class="navbar-toggler ml-auto" style="background: none; border: none; " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color: #fff;">My Accounts</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: #fff;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Transfer Money
                        <i class="fa fa-exchange"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="create_local.php">Local Transfer</a>
                        <a class="dropdown-item" href="create_international.php">International Wire Transfer</a>
                        <a class="dropdown-item" onclick="pay()" href="#">ACH transfers</a>
                    </div>
                    <script>
                        function pay() {
                            alert("Visit our bank branch or call customer care for activation");
                        }
                    </script>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: #fff;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pay Bills
                        <i class="fa fa-credit-card"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" onclick="pay()" href="#">Credit Card Payments</a>
                        <a class="dropdown-item" onclick="pay()" href="#">QuickPay with ZelleSM</a>
                        <a class="dropdown-item" onclick="pay()" href="#">Loan Payment</a>
                        <a class="dropdown-item" onclick="pay()" href="#">Tax Payment</a>
                    </div>
                    <script>
                        function pay() {
                            alert("Visit our bank branch or call customer care for activation");
                        }
                    </script>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: #fff;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account Statement
                        <i class="fa fa-newspaper-o"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="local_statment.php">Local Transactions</a>
                        <a class="dropdown-item" href="international_statement.php">International Transactions</a>
                        <a class="dropdown-item" onclick="pay()" href="#">Bills Payment Transactions</a>
                    </div>
                    <script>
                        function pay() {
                            alert("Bill Payment not yet activated on this Account. Visit our bank branch or call customer care for activation");
                        }
                    </script>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: #fff;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account Management
                        <i class="fa fa-gear"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile&setting.php">Profile & Setting</a>
                        <a class="dropdown-item" href="support.php">Support</a>
                    </div>
                </li>
            </ul>
            <ul style="float: right; list-style: none">
                <li style="padding-top: 12px">
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
    </nav>
    </div>
    <div class="container mt-3">
        <h3 style="text-transform: uppercase; color: #336699">Profile and Settings</h3>
    </div>
    <hr>
    </div>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Personal Information</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Account Information</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Contact Information</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-kin" role="tab" aria-controls="v-pills-kin" aria-selected="false">Next of Kin</a>
                    <a class="nav-link mb-3" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false">Change Password</a>
                    <a class="nav-link mb-3" id="v-pills-photo-tab" data-toggle="pill" href="#v-pills-photo" role="tab" aria-controls="v-pills-photo" aria-selected="false">Change Profile Photo</a>
                </div>
            </div>
            <div class="col-md-7 mx-3" style="border-radius: 10px;">
                <!--style="background: #23266d; color: #fff; border-radius: 10px;" -->
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Personal Information -->
                    <div class="tab-pane fade show active py-3 px-2" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <p style="text-transform: capitalize">First Name: <b><?php echo $row['first_name'] ?></b></p>
                        <p style="text-transform: capitalize">Last Name: <b><?php echo $row['last_name'] ?></b></p>
                        <p style="text-transform: capitalize">Gender: <b><?php echo $row['gender'] ?></b></p>
                        <p style="text-transform: capitalize">Nationality: <b><?php echo $row['nationality'] ?></b></p>
                        <p style="text-transform: capitalize">Date of Birth: <b><?php echo $row['dob'] ?></b></p>
                        <p style="text-transform: capitalize">Marital Status: <b><?php echo $row['marital_status'] ?></b></p>
                        <p style="text-transform: capitalize">Occupation: <b><?php echo $row['occupation'] ?></b></p>
                    </div>
                    <!-- Account Information -->
                    <div class="tab-pane fade py-3 pl-2" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <p style="text-transform: capitalize;">Account Type: <b><?php echo $row['account_type'] ?></b></p>
                        <p style="text-transform: capitalize">Preferred Currency: <b><?php echo $row['currency'] ?></b></p>
                        <p style="text-transform: capitalize">Account Number: <b><?php echo $row['account_no'] ?></b>
                    </div>
                    <!-- Contact Information -->
                    <div class="tab-pane fade py-3 px-2" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <p>Email: <b><?php echo $row['email'] ?></b></p>
                        <p style="text-transform: capitalize">State: <b><?php echo $row['state'] ?></b></p>
                        <p style="text-transform: capitalize">City: <b><?php echo $row['city'] ?></b></p>
                        <p style="text-transform: capitalize">Address: <b><?php echo $row['address'] ?></b></p>
                        <p style="text-transform: capitalize">Zip Code: <b><?php echo $row['zip_code'] ?></b></p>
                        <p style="text-transform: capitalize">Phone Number: <b><?php echo $row['phone_no'] ?></b></p>
                    </div>
                    <!-- Kin Information -->
                    <div class="tab-pane fade py-3 px-2" id="v-pills-kin" role="tabpanel" aria-labelledby="v-pills-messages-kin">
                        <p style="text-transform: capitalize">FIRST NAME: <b><?php echo $row['kin_first_name'] ?></b></p>
                        <p style="text-transform: capitalize">LAST NAME: <b><?php echo $row['kin_last_name'] ?></b></p>
                        <p style="text-transform: capitalize">gender: <b><?php echo $row['kin_gender'] ?></b></p>
                        <p style="text-transform: capitalize">Marital Status: <b><?php echo $row['kin_marital_status'] ?></b></p>
                        <p style="text-transform: capitalize">Phone Number: <b><?php echo $row['kin_phone_no'] ?></b></p>
                        <p>Email: <b><?php echo $row['kin_email'] ?></b></p>
                        <p style="text-transform: capitalize">Nationality: <b><?php echo $row['kin_nationality'] ?></b></p>
                        <p style="text-transform: capitalize">State: <b><?php echo $row['kin_state'] ?></b></p>
                        <p style="text-transform: capitalize">City: <b><?php echo $row['kin_city'] ?></b></p>
                        <p style="text-transform: capitalize">Address: <b><?php echo $row['kin_address'] ?></b></p>
                    </div>
                    <div class="tab-pane fade py-3 px-2" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                        <form method="POST">
                            <div class="form-group">
                                <label for="pwd">Enter Current Password:</label>
                                <input type="password" name="current_psw" class="form-control" id="pwd" placeholder="current pasword" required>
                            </div>
                            <button type="submit" class="btn btn-danger" name="update">Submit</button>
                        </form>
                        <?php
                        if (isset($_POST['update'])) {
                            $current_psw = mysqli_real_escape_string($conn, $_POST['current_psw']);

                            $sel = "SELECT psw from reg_users where psw='$current_psw' and bank_id='" . $_SESSION['bank_id'] . "'";
                            $result = mysqli_query($conn, $sel);
                            $resultChecker = mysqli_num_rows($result);
                            if ($resultChecker < 1) {

                                echo "<script>alert('incorrect password')</script>";
                            } else {
                                header("Location: change_psw.php");
                            }
                        }
                        ?>
                    </div>
                    <div class="tab-pane fade py-3 px-2" id="v-pills-photo" role="tabpanel" aria-labelledby="v-pills-photo-tab">
                        <form method="POST" enctype="multipart/form-data">
                            <b>(Not More than 1MB) Profile Photo</b>
                            <h5>Select image to upload </h5>
                            <br />
                            <input type="file" name="file" class="form-control" required="required" style="margin-top: 0em; padding: 5px">
                            <br />
                            <button type="submit" name="submit" class="btn btn-danger" style="border-radius:10px; "> UPLOAD PHOTO</button>
                            <br />
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $dir = '../profile_pics/';
                            $filename = basename($_FILES['file']['name']);
                            $filesize = $_FILES['file']['size'];
                            $tmp = $_FILES['file']['tmp_name'];

                            if (!empty($filename) && !empty($filesize) && !empty($tmp)) {
                                //   if($filesize<=1048576){
                                if (move_uploaded_file($tmp, $dir . $filename)) {
                                    $query = "update reg_users set photo='$filename' where id='" . $_SESSION['id'] . "'";
                                    mysqli_query($conn, $query);
                                    echo "<script>alert('Profile photo changed successfully')</script>";
                                } else {
                                    echo 'There was an error in upload';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer class="text-center mt-5 py-3 mx-auto" style="background: #336699; color: #fff; width: 100vw !important;">
        <P class="mt-3">Copyright ©2020 All rights reserved | FirstPak Bank.</p>
    </footer>

</body>

</html>