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
  <title> International Transfer | FirstPak Bank </title>
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

    /*
            
            .navbar-dark .navbar-toggler-icon {
                background-image: url('../images/hamburger.png') !important;
            }*/


    .custom-input {
      outline: none !important;
      border: none;
      background: none;
    }
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
      <a href="includes/logout.inc.php" class="btn btn-primary" style="color: #fff; background: #346dbf">Log out</a>
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
            <a class="dropdown-item" href="international_statement.php">International Wire Transactions</a>
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
            <a class="dropdown-item" href="profile&setting.php">Support</a>
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
  <div class="container">
    <br>
    <h3 style="text-transform: uppercase; color: #336699">Comfirm Details</h3>
    <hr>
    <div class="row">
      <div class="col-12 mx-auto text-center">
        <h3 class="text-center" style="color: #336699"> Recipient's Information Overview</h3>
        <form class="needs-validation" novalidate method="POST">
          <div class="bg-light p-3" style="border-radius: 10px;">
            <span style="color: #336699"><b>Bank Name:</b></span>
            <input class="ml-3 text-capitalize custom-input" readonly style="color: #336699" type="text" style="" value="<?php echo  $_SESSION['create_bank_name'] ?>" name="bank_name" required>
          </div>
          <br>
          <div class="bg-light p-3" style="border-radius: 10px;">
            <span style="color: #336699"><b>Bank Address:</b></span>
            <input class="ml-3 text-capitalize custom-input" readonly style="color: #336699" type="text" style="" value="<?php echo  $_SESSION['create_bank_address'] ?>" name="bank_address" required>
          </div>
          <br>
          <div class="bg-light p-3" style="border-radius: 10px;">
            <span style="color: #336699"><b>Account Name:</b></span>
            <input class="ml-3 text-capitalize custom-input" readonly style="color: #336699" type="text" style="" value="<?php echo  $_SESSION['create_account_name'] ?>" name="account_name" required>
          </div>
          <br>
          <div class="bg-light p-3" style="border-radius: 10px;">
            <span style="color: #336699"><b>Account Number:</b></span>
            <input class="ml-3 text-capitalize custom-input" readonly style="color: #336699" type="text" style="" value="<?php echo  $_SESSION['create_account_number'] ?>" name="account_number" required>
          </div>
          <br>
          <div class="bg-light p-3" style="border-radius: 10px;">
            <span style="color: #336699"><b>Country:</b></span>
            <input class="ml-3 text-capitalize custom-input" readonly style="color: #336699" type="text" style="" value="<?php echo  $_SESSION['create_country'] ?>" name="country" required>
          </div>
          <br>
          <div class="bg-light p-3" style="border-radius: 10px;">
            <span style="color: #336699"><b>Routing Number:</b></span>
            <input class="ml-3 text-capitalize custom-input" readonly style="color: #336699" type="text" style="" value="<?php echo  $_SESSION['create_routine_no'] ?>" name="routine_no" required>
          </div>
          <br>
          <div class="bg-light p-3" style="border-radius: 10px;">
            <span style="color: #336699"><b>Swift Code:</b></span>
            <input class="ml-3 text-capitalize custom-input" readonly style="color: #336699" type="text" style="" value="<?php echo  $_SESSION['create_swift_code'] ?>" name="swift_code" required>
          </div>
          <br>
          <div class="bg-light p-3" style="border-radius: 10px;">
            <span style="color: #336699" for="" class=""><b>Amount:</b></span>
            <input class="ml-3 text-capitalize custom-input" readonly style="color: #336699" type="number" value="<?php echo  $_SESSION['create_amount'] ?>" name="amount" required>
          </div>

          <div id="msg" class='alert alert-success alert-dismissible  fade show col-md-8' style="display:none">
            <button type='button' class='close' data-dismiss='alert' style='padding: 5px;'> &times</button>
            <strong> Your transaction was successful! </strong>
          </div>
          <div id="msg2" class='alert alert-danger alert-dismissible  fade show col-md-8' style="display:none">
            <button type='button' class='close' data-dismiss='alert' style='padding: 5px;'> &times</button>
            <strong> Unable to complete transaction! Please contact customer care on: contactus@firstpakbank.com or call: (302) 439-0766</strong>
          </div>
          <div class="progress" id="myProgress" style="height: 50px;display: none">
            <div class="progress-bar progress-bar-striped" id="myBar" role="progressbar" style="" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <br>
          <button onclick="goBack()" class="btn btn-danger mb-5 float-left" type="button"><i class="fa fa-angle-left mr-1"></i>Go Back</button>
          <script>
            function goBack() {
              window.history.back();
            }
          </script>
          <button class="btn btn-primary mb-5 float-right p-2 px-3" type="submit" name="debit_international" style="background: #336699; border-radius: 20px;"><i class="fa fa-exchange mr-1"></i>Transfer Funds</button>
        </form>

        <!-- Modal Step 1-->
        <div id="Modal1" style="width:100%;display:none;position:fixed;top:0px;left:0px;background:rgba(0,0,0,0.6);height:100%;">
          <h1 onclick="close1()" style="cursor:pointer;float:right;display:inline-block;margin:5% 10%;color:white;text-align:right;">&times;</h1>
          <div style="color:red; background: white;margin:15% 20%;padding:1em">
            <form method="POST" id="modalform">
              <div class="form-group">
                <label for="step_1">Please Enter your Activation Code to proceed with your transaction</label>
                <input type="text" class="form-control" name="transfer_code1" id="step1" placeholder="xxxxxx" required>
              </div>
              <button type="submit" class="btn btn-primary" name="step1" id="step_1">Submit</button>
            </form>
            <?php
            if (isset($_POST['step1'])) {
              $transfer_code = mysqli_real_escape_string($conn, $_POST['transfer_code1']);

              $step1 = 'ACTYEW622474211';

              if ($transfer_code != $step1) {
                echo "
                                                           <script>
                                                               document.getElementById('Modal1').style.display='block'
                                                            </script>   
                                                        <div class='alert alert-danger alert-dismissible  fade show col-md-8'>
                                                                <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
                                                                <strong> Invalid Transfer Code! Please Insert the correct code to continue with this transaction </strong>
                                                         </div>";
              } else {
                echo '<script>
                                                             document.getElementById("Modal1").style.display="none"
                                            document.getElementById("myProgress").style.display="block"; 
                                            document.getElementById("myBar").style.height="50px";
                                            function move() {
                                            var elem = document.getElementById("myBar");   

                                            var width = 20;
                                            var id = setInterval(frame, 2000);
                                            function frame() {
                                              if (width >= 40) {
                                                clearInterval(id);
                                                document.getElementById("Modal2").style.display="block"
                                                } else {
                                                width++; 
                                                elem.style.width = width + "%"; 
                                                elem.innerHTML = " Processing the transaction " + width * 1  + "%";
                                          }

                                        }

                                      }  

                                      move()
                                 

                                                            </script>';
              }
            }

            ?>
          </div>
        </div>
        <!-- Modal Step 2-->
        <div id="Modal2" style="width:100%;display:none;position:fixed;top:0px;left:0px;background:rgba(0,0,0,0.6);height:100%;">
          <h1 onclick="close2()" style="cursor:pointer;float:right;display:inline-block;margin:5% 10%;color:white;text-align:right;">&times;</h1>
          <div style="color:red; background: white;margin:15% 20%;padding:1em">
            <form method="POST" id="modalform">
              <div class="form-group">
                <label for="step_2">Please Enter your Cost of Transfer Code to proceed with your transaction</label>
                <input type="text" class="form-control" name="transfer_code2" id="step1" placeholder="xxxxxx" required>
              </div>
              <button type="submit" class="btn btn-primary" name="step2" id="step_1">Submit</button>
            </form>
            <?php
            if (isset($_POST['step2'])) {
              $transfer_code = mysqli_real_escape_string($conn, $_POST['transfer_code2']);

              $step2 = 'COT736iYq44589';

              if ($transfer_code != $step2) {
                echo "
                                                           <script>
                                                               document.getElementById('Modal2').style.display='block'
                                                            </script>   
                                                        <div class='alert alert-danger alert-dismissible  fade show col-md-8'>
                                                                <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
                                                                <strong> Invalid Transfer Code! Please Insert the correct code to continue with this transaction </strong>
                                                         </div>";
              } else {
                echo '<script>
                                                             document.getElementById("Modal2").style.display="none"
                                            document.getElementById("myProgress").style.display="block"; 
                                            document.getElementById("myBar").style.height="50px";
                                            function move() {
                                            var elem = document.getElementById("myBar");   

                                            var width = 40;
                                            var id = setInterval(frame, 2000);
                                            function frame() {
                                              if (width >= 60) {
                                                clearInterval(id);
                                                document.getElementById("Modal3").style.display="block"
                                                } else {
                                                width++; 
                                                elem.style.width = width + "%"; 
                                                elem.innerHTML = " Processing the transaction " + width * 1  + "%";
                                          }

                                        }

                                      }  

                                      move()

                                                            </script>';
              }
            }

            ?>
          </div>
        </div>
        <!-- Modal Step 3-->
        <div id="Modal3" style="width:100%;display:none;position:fixed;top:0px;left:0px;background:rgba(0,0,0,0.6);height:100%;">
          <h1 onclick="close3()" style="cursor:pointer;float:right;display:inline-block;margin:5% 10%;color:white;text-align:right;">&times;</h1>
          <div style="color:red; background: white;margin:15% 20%;padding:1em">
            <form method="POST" id="modalform">
              <div class="form-group">
                <label for="step_3">Please Enter your Anti-Terrorism Ref Code to proceed with your transaction</label>
                <input type="text" class="form-control" name="transfer_code3" id="step1" placeholder="xxxxxx" required>
              </div>
              <button type="submit" class="btn btn-primary" name="step3" id="step_1">Submit</button>
            </form>
            <?php
            if (isset($_POST['step3'])) {
              $transfer_code = mysqli_real_escape_string($conn, $_POST['transfer_code3']);

              $step3 = 'ATFCX6223bwq89';

              if ($transfer_code != $step3) {
                echo "
                                                           <script>
                                                               document.getElementById('Modal3').style.display='block'
                                                            </script>   
                                                        <div class='alert alert-danger alert-dismissible  fade show col-md-8'>
                                                                <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
                                                                <strong> Invalid Transfer Code! Please Insert the correct code to continue with this transaction </strong>
                                                         </div>";
              } else {
                echo '<script>
                                                             document.getElementById("Modal3").style.display="none"
                                            document.getElementById("myProgress").style.display="block"; 
                                            document.getElementById("myBar").style.height="50px";
                                            function move() {
                                            var elem = document.getElementById("myBar");   

                                            var width = 60;
                                            var id = setInterval(frame, 2000);
                                            function frame() {
                                              if (width >= 80) {
                                                clearInterval(id);
                                                document.getElementById("Modal4").style.display="block"
                                                } else {
                                                width++; 
                                                elem.style.width = width + "%"; 
                                                elem.innerHTML = " Processing the transaction " + width * 1  + "%";
                                          }

                                        }

                                      }  

                                      move()

                                                            </script>';
              }
            }

            ?>
          </div>
        </div>
        <!-- Modal Step 4-->
        <div id="Modal4" style="width:100%;display:none;position:fixed;top:0px;left:0px;background:rgba(0,0,0,0.6);height:100%;">
          <h1 onclick="close4()" style="cursor:pointer;float:right;display:inline-block;margin:5% 10%;color:white;text-align:right;">&times;</h1>
          <div style="color:red; background: white;margin:15% 20%;padding:1em">
            <form method="POST" id="modalform">
              <div class="form-group">
                <label for="step_4">Please Enter your Tax Code to proceed with your transaction</label>
                <input type="text" class="form-control" name="transfer_code4" id="step3" placeholder="xxxxxx" required>
              </div>
              <button type="submit" class="btn btn-primary" name="step4" id="step_4">Submit</button>
            </form>
            <?php
            if (isset($_POST['step4'])) {
              $transfer_code = mysqli_real_escape_string($conn, $_POST['transfer_code4']);

              $step4 = 'TC78832wq445';

              if ($transfer_code != $step4) {
                echo "
                                                           <script>
                                                               document.getElementById('Modal4').style.display='block'
                                                            </script>   
                                                        <div class='alert alert-danger alert-dismissible  fade show col-md-8'>
                                                                <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
                                                                <strong> Invalid Transfer Code! Please Insert the correct code to continue with this transaction </strong>
                                                         </div>";
              } else {
                $bank_name = $_SESSION['create_bank_name'];
                $bank_address = $_SESSION['create_bank_address'];
                $account_name = $_SESSION['create_account_name'];;
                $account_number = $_SESSION['create_account_number'];
                $country = $_SESSION['create_country'];
                $routine_no = $_SESSION['create_routine_no'];
                $swift_code = $_SESSION['create_swift_code'];
                $amount = $_SESSION['create_amount'];
                $trans_date = date('Y-m-d');
                $client_id = $client;
                $trans_type = 'debit';
                $status = 'completed';
                $total = $row['account_balance'] - $amount;

                $sql3 = "INSERT INTO international(id, client_id, trans_date, trans_type, bank_name, bank_address, account_name, account_number, country, routine_no, swift_code, amount, status)
                                                        VALUES(NULL,'$client', '$trans_date', '$trans_type', '$bank_name', '$bank_address', '$account_name', '$account_number', '$country', '$routine_no', '$swift_code', '$amount', '$status')";

                mysqli_query($conn, $sql3);
                $subtract_local = "UPDATE reg_users SET account_balance='$total' WHERE id='$client'";
                $result = mysqli_query($conn, $subtract_local);

                if ($result) {
                  echo '<script>
                                                             document.getElementById("Modal3").style.display="none"
                                            document.getElementById("myProgress").style.display="block"; 
                                            document.getElementById("myBar").style.height="50px";
                                            function move() {
                                            var elem = document.getElementById("myBar");   

                                            var width = 75;
                                            var id = setInterval(frame, 2000);
                                            function frame() {
                                              if (width >= 100) {
                                                clearInterval(id);
                                                document.getElementById("msg").style.display="block"
                                                } else {
                                                width++; 
                                                elem.style.width = width + "%"; 
                                                elem.innerHTML = " Processing the transaction " + width * 1  + "%";
                                          }

                                        }

                                      }  

                                      move()

                                                            </script>';
                  $bal = "SELECT * FROM reg_users WHERE id='$client'";
                  $current_balance = mysqli_query($conn, $bal);
                  $row_balance = mysqli_fetch_array($current_balance);

                  if ($row_balance['currency'] == 'EURO') {

                    $sym = "&euro";
                  } else if ($row_balance['currency'] == 'USD') {

                    $sym = "$";
                  } else if ($row_balance['currency'] == 'GBP') {

                    $sym = "&pound";
                  } else if ($row_balance['currency'] == 'AUD') {

                    $sym = "&#x41;&#x24;";
                  } else if ($row_balance['currency'] == 'CAD') {

                    $sym = "$";
                  } else if ($row_balance['currency'] == 'CHF') {
                    $sym = "&#x43;&#x48;&#x46";
                  } else if ($row_balance['currency'] == 'JYP') {

                    $sym = "&#xa5;";
                  } else if ($row_balance['currency'] == 'NZD') {
                    $sym = "&#x24;";
                  }


                  $account_balance = $row_balance['account_balance'];
                  $show_format = number_format($account_balance, 2);

                  $email = $row['email'];
                  $from = "contactus@firstpakbank.com";


                  $subject = "A transaction has occurred in your account with FirstPak Bank";
                  $message = "
                        <body>
                    <h3 style='color: #23266d'>Dear Customer,</h3>
                   <h4 style='color: #23266d'>We wish to inform you that a transaction has occurred on your account with us.</h4>
                   <h4 style='color: #23266d'>Below are the details of the transaction:</h4>
                   <hr style='font-weight: bold; color: #23266d'>
                    <p style='color: black'>Transaction Date:     $trans_date </p>
                    <p style='color: black'> Bank Name: $bank_name </p>
                     <p style='color: black'> Bank Address: $bank_address </p>
                      <p style='color: black'> Country: $country </p>
                       <p style='color: black'> Swift Code:  $swift_code </p>
                    <p style='color: black'> Routing Number: $routine_no </p>
                    <p style='color: black'> Account Name: $account_name </p>
                <p style='color: black'> Account Number: $account_number </p>
                    <p style='color: black'> Amount: $amount </p>
                    <p style='color: black'> Transaction Type: $trans_type </p>
                    <p style='color: black'> Status: $status </p>
                    <p style='color: black'> Available Balance: $sym$show_format </p>
                     <hr style='font-weight: bold; color: #23266d'>
                     <h3 style='color: #23266d'>Please do not respond to email requesting for your Card/PIN details</h3>
                     <h3 style='color: #23266d'>FirstPak Bank will never ask for such through this medium. Thanks.</h3>
                     
                     <h3 style='color: #23266d'>For Enquires Please call Customer Care on contactus@firstpakbank.com or call: (302) 439-0766</h3>
                       <hr style='font-weight: bold; color: #23266d'>
                       <p style='text-align: justify; color: black'><b style='color: #23266d'>DISCLAIMER:</b> Any view of tis e-mail are those of the sender except where the sender specifically states them to be that FirstPak Bank. This message is for the desgined recipient only and may contain privileged, proprietary, or otherwise private information. If you have received it in error, please notify the sender immmediately and delete the original. Any other use of the email by you is prohibited. FirstPak Bank accepts no liability for any loss or damage resulting directly or indirectly from the transmission of this e-mail message.</p>
                    
                    </body>
                ";

                  $to = "$email";
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                  $headers .= 'From: <$from>' . "\r\n";

                  mail($to, $subject, $message, $headers);
                }
              }
            }

            ?>
          </div>
        </div>

        <?php
        if (isset($_POST['debit_international'])) {
          $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
          $bank_address = mysqli_real_escape_string($conn, $_POST['bank_address']);
          $account_name = mysqli_real_escape_string($conn, $_POST['account_name']);
          $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
          $country = mysqli_real_escape_string($conn, $_POST['country']);
          $routine_no = mysqli_real_escape_string($conn, $_POST['routine_no']);
          $swift_code = mysqli_real_escape_string($conn, $_POST['swift_code']);
          $amount = mysqli_real_escape_string($conn, $_POST['amount']);
          $trans_date = date('Y-m-d');
          $client_id = $client;
          $trans_type = 'debit';
          $status = 'completed';

          $sql = "INSERT INTO international(id, client_id, trans_date, trans_type, bank_name, bank_address, account_name, account_number, country, routine_no, swift_code, amount, status)
                                    VALUES(NULL,'$client', '$trans_date', '$trans_type', '$bank_name', '$bank_address', '$account_name', '$account_number', '$country', '$routine_no', '$swift_code', '$amount', '$status')";

          if ($row['account_balance'] < $amount) {
            echo "
                        <div class='alert alert-danger alert-dismissible  fade show col-md-8'>
                                <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
                                <strong> Insufficient Funds! </strong>
                         </div>";
          } else {
            $local_status = "SELECT trans_status FROM reg_users WHERE id='$client'";
            $local_result = mysqli_query($conn, $local_status);
            $local_row = mysqli_fetch_array($local_result);
            //echo $transaction_row[0];
            if ($local_row['trans_status'] == 'active') {
              mysqli_query($conn, $sql);
              $total = $row['account_balance'] - $amount;

              $subtract_local = "UPDATE reg_users SET account_balance='$total' WHERE id='$client'";
              $result = mysqli_query($conn, $subtract_local);
              //                                    $status = 'complete';
              //                                    
              if ($result) {
                echo '<script>
                                                    document.getElementById("myProgress").style.display="block"; 
                                                    document.getElementById("myBar").style.height="50px";
                                                    function move() {
                                                    var elem = document.getElementById("myBar");   

                                                    var width = 0;
                                                    var id = setInterval(frame, 2000);
                                                    function frame() {
                                                      if (width >= 100) {
                                                        clearInterval(id);
                                                        document.getElementById("msg").style.display="block"
                                                        } else {
                                                        width++; 
                                                        elem.style.width = width + "%"; 
                                                        elem.innerHTML = " Processing the transaction " + width * 1  + "%";
                                                  }

                                                }

                                              }  

                                              move()

                                                                    </script>';

                $bal = "SELECT * FROM reg_users WHERE id='$client'";
                $current_balance = mysqli_query($conn, $bal);
                $row_balance = mysqli_fetch_array($current_balance);

                if ($row_balance['currency'] == 'EURO') {

                  $sym = "&euro";
                } else if ($row_balance['currency'] == 'USD') {

                  $sym = "$";
                } else if ($row_balance['currency'] == 'GBP') {

                  $sym = "&pound";
                } else if ($row_balance['currency'] == 'AUD') {

                  $sym = "&#x41;&#x24;";
                } else if ($row_balance['currency'] == 'CAD') {

                  $sym = "$";
                } else if ($row_balance['currency'] == 'CHF') {
                  $sym = "&#x43;&#x48;&#x46";
                } else if ($row_balance['currency'] == 'JYP') {

                  $sym = "&#xa5;";
                } else if ($row_balance['currency'] == 'NZD') {
                  $sym = "&#x24;";
                }


                $account_balance = $row_balance['account_balance'];
                $show_format = number_format($account_balance, 2);

                $email = $row['email'];
                $from = "contactus@firstpakbank.com ";


                $subject = "A transaction has occurred in your account with FirstPak Bank";
                $message = "
                        <body>
                    <h3 style='color: #23266d'>Dear Customer,</h3>
                   <h4 style='color: #23266d'>We wish to inform you that a transaction has occurred on your account with us.</h4>
                   <h4 style='color: #23266d'>Below are the details of the transaction:</h4>
                   <hr style='font-weight: bold; color: #23266d'>
                    <p style='color: black'>Transaction Date:     $trans_date </p>
                    <p style='color: black'> Bank Name: $bank_name </p>
                     <p style='color: black'> Bank Address: $bank_address </p>
                      <p style='color: black'> Country: $country </p>
                       <p style='color: black'> Swift Code:  $swift_code </p>
                    <p style='color: black'> Routing Number: $routine_no </p>
                    <p style='color: black'> Account Name: $account_name </p>
                <p style='color: black'> Account Number: $account_number </p>
                    <p style='color: black'> Amount: $amount </p>
                    <p style='color: black'> Transaction Type: $trans_type </p>
                    <p style='color: black'> Status: $status </p>
                    <p style='color: black'> Available Balance: $sym$show_format </p>
                     <hr style='font-weight: bold; color: #23266d'>
                     <h3 style='color: #23266d'>Please do not respond to email requesting for your Card/PIN details</h3>
                     <h3 style='color: #23266d'>FirstPak Bank will never ask for such through this medium. Thanks.</h3>
                     
                     <h3 style='color: #23266d'>For Enquires Please call Customer Care on contactus@firstpakbank.com or call:  (302) 439-0766</h3>
                       <hr style='font-weight: bold; color: #23266d'>
                       <p style='text-align: justify; color: black'><b style='color: #23266d'>DISCLAIMER:</b> Any view of tis e-mail are those of the sender except where the sender specifically states them to be that FirstPak Bank. This message is for the desgined recipient only and may contain privileged, proprietary, or otherwise private information. If you have received it in error, please notify the sender immmediately and delete the original. Any other use of the email by you is prohibited. FirstPak Bank accepts no liability for any loss or damage resulting directly or indirectly from the transmission of this e-mail message.</p>
                    
                    </body>
                ";

                $to = "$email";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <$from>' . "\r\n";

                mail($to, $subject, $message, $headers);
              }
            } else if ($local_row['trans_status'] == 'pending') {
              $status = 'pending';
              $trans_type = 'International Transfer';
              $trans_id = 'asdfghjklzxcvbnmqwertyuiop';
              $trans_id = str_shuffle($trans_id);

              $sql2 = "INSERT INTO pending_transaction(id, client_id, trans_date, trans_id, trans_type, account_name, account_number, amount, status)
                                    VALUES(NULL, '$client','$trans_date', '$trans_id', '$trans_type', '$account_name', '$account_number', '$amount', '$status')";

              //$deposit = "UPDATE reg_users SET acc_balance='$total' WHERE id='$client'";
              $update_pending = mysqli_query($conn, $sql2);

              if ($update_pending) {
                echo '<script>
                                            document.getElementById("myProgress").style.display="block"; 
                                            document.getElementById("myBar").style.height="50px";
                                            function move() {
                                            var elem = document.getElementById("myBar");   

                                            var width = 0;
                                            var id = setInterval(frame, 2000);
                                            function frame() {
                                              if (width >= 48) {
                                                clearInterval(id);
                                                document.getElementById("msg2").style.display="block"
                                                } else {
                                                width++; 
                                                elem.style.width = width + "%"; 
                                                elem.innerHTML = " Processing the transaction " + width * 1  + "%";
                                          }

                                        }

                                      }  

                                      move()

                                                            </script>';
              }
            } else if ($local_row['trans_status'] == 'dormant') {

              echo '<div class="alert alert-light alert-dismissible mx-auto px-5" style="width: 50%; border: 1px solid black; border-radius: 10px">
                                        <div class="text-center">
                                            <br>
                                            <i class="fa fa-times-circle" style="font-size:100px;color:red"></i>
                                            <br>
                                            <h1 class="alert-heading">Your Account is Dormant</h1> 
                                            <br>
                                            <h6>Your Account is Dormant! Please Contact Bank Customer Care on (302) 439-0766 or contactus@firstpakbank.com/</h6>
                                            <br>
                                        </div>
                                    <button class="btn-lg btn-primary" data-dismiss="alert" aria-label="close" style="background: #336699;">Exit</button>
                                  </div>';
            } else if ($local_row['trans_status'] == 'error') {

              echo '<div class="alert alert-light alert-dismissible mx-auto px-5" style="width: 50%; border: 1px solid black; border-radius: 10px">
                                        <div class="text-center">
                                            <br>
                                            <i class="fa fa-times-circle" style="font-size:100px;color:red"></i>
                                            <br>
                                            <h1 class="alert-heading">Error</h1> 
                                            <br>
                                            <br>
                                            <h6>An Error occurred on your Account!  Please Contact Bank Customer Care on (302) 439-0766 or contactus@firstpakbank.com/</h6>
                                            <br>
                                        </div>
                                    <button class="btn-lg btn-primary" data-dismiss="alert" aria-label="close" style="background: #336699;">Exit</button>
                                  </div>';
            } else if ($local_row['trans_status'] == 'transfer code') {
              echo '<script>
                                            document.getElementById("myProgress").style.display="block"; 
                                            document.getElementById("myBar").style.height="50px";
                                            function move() {
                                            var elem = document.getElementById("myBar");   

                                            var width = 0;
                                            var id = setInterval(frame, 2000);
                                            function frame() {
                                              if (width >= 20) {
                                                clearInterval(id);
                                                document.getElementById("Modal1").style.display="block"
                                                } else {
                                                width++; 
                                                elem.style.width = width + "%"; 
                                                elem.innerHTML = " Processing the transaction " + width * 1  + "%";
                                          }

                                        }

                                      }  

                                      move()
                                        

                                                            </script>';
            }
          }
        }


        //                        
        ?>
        <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function() {
            'use strict';
            window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();

          function move() {
            alert()
            var elem = document.getElementById("myBar");

            var width = 0;
            var id = setInterval(frame, 500);

            function frame() {
              if (width >= 100) {
                clearInterval(id);
              } else {
                width++;
                elem.style.width = width + '%';
                elem.innerHTML = width * 1 + '%';
              }
            }
          }
        </script>
      </div>
    </div>
  </div>

  <footer class="text-center mt-5 py-3 mx-auto" style="background: #336699; color: #fff; width: 100vw !important;">
    <P class="mt-3">Copyright ©2020 All rights reserved | FirstPak Bank</p>
  </footer>

</body>

<script>
  function close1() {
    document.getElementById("Modal1").style.display = "none";
    document.getElementById("myProgress").style.display = "none";

  }

  function close2() {
    document.getElementById("Modal2").style.display = "none";
    document.getElementById("myProgress").style.display = "none";

  }

  function close3() {
    document.getElementById("Modal3").style.display = "none";
    document.getElementById("myProgress").style.display = "none";

  }

  function close4() {
    document.getElementById("Modal4").style.display = "none";
    document.getElementById("myProgress").style.display = "none";

  }
</script>

</html>