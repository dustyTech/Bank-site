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
  <title>Local Transfer | FirstPak Bank </title>
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
            <a class="dropdown-item" href="local_statment.php">Local Transfers</a>
            <a class="dropdown-item" href="international_statement.php">International Wire Transfers</a>
            <a class="dropdown-item" onclick="pay()" href="#">Bills Payment</a>
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
      <li style="padding: 0 !important; list-style: none">
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
  <div class="container">
    <br>
    <h3 style="text-transform: uppercase; color: #336699">Local Transfer</h3>
    <hr>
    <div class="row">
      <div class="col-12 mx-auto">
        <h3 class="text-center" style="color: #336699">Enter's Recipient's Information</h3>
        <form class="needs-validation" novalidate method="POST">
          <div class="form-row">
            <label for="validationCustom032" class="col-sm-2 col-form-label col-form-label-md">Bank Name
            </label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-md" id="validationCustom032" placeholder="Bank name" name="create_bank_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom02" class="col-sm-2 col-form-label col-form-label-md">Account Name</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-md" id="validationCustom02" placeholder="Account name" name="create_account_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom04" class="col-sm-2 col-form-label col-form-label-md">Account Number</label>
            <div class="col-sm-10 mb-3">
              <input type="number" class="form-control form-control-md" id="validationCustom04" placeholder="Account Number" name="create_account_number" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom06" class="col-sm-2 col-form-label col-form-label-md">Description</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-md" id="validationCustom06" placeholder="Description" name="create_description" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom006" class="col-sm-2 col-form-label col-form-label-md">Routing Number</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-md" id="validationCustom006" placeholder="Routing Number" name="create_routine" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom08" class="col-sm-2 col-form-label col-form-label-md">Amount</label>
            <div class="col-sm-10 mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2">
                    <?php
                    if ($row['currency'] == 'EURO') {
                      echo "&euro;";
                    } else if ($row['currency'] == 'USD') {
                      echo "$";
                    } else if ($row['currency'] == 'GBP') {
                      echo "&pound;";
                    } else if ($row['currency'] == 'AUD') {
                      echo "&#x41;&#x24;";
                    } else if ($row['currency'] == 'CAD') {
                      echo "$";
                    } else if ($row['currency'] == 'CHF') {
                      echo "&#x43;&#x48;&#x46;";
                    } else if ($row['currency'] == 'JYP') {
                      echo "&#xa5;";
                    } else if ($row['currency'] == 'NZD') {
                      echo "&#x24;";
                    }
                    ?>
                  </span>
                </div>
                <input type="number" class="form-control form-control-md" id="validationCustom08" placeholder="Amount" name="create_amount" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <label class="form-check-label" for="invalidCheck">
                Please Comfirm the informations above before submitting this application
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <a href="index.php" class="btn btn-danger mb-5 float-left" type="submit" name="submit"><i class="fa fa-close mr-1"></i>Cancel</a>
          <button class="btn btn-primary mb-5 float-right p-2 px-3" type="submit" name="create_local" style="background: #336699; border-radius: 20px;"><i class="fa fa-exchange mr-1"></i>Proceed</button>
        </form>

      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['create_local'])) {
    $_SESSION['create_bank_name'] = mysqli_real_escape_string($conn, $_POST['create_bank_name']);
    $_SESSION['create_account_name'] = mysqli_real_escape_string($conn, $_POST['create_account_name']);
    $_SESSION['create_account_number'] = mysqli_real_escape_string($conn, $_POST['create_account_number']);
    $_SESSION['create_description'] = mysqli_real_escape_string($conn, $_POST['create_description']);
    $_SESSION['create_routine'] = mysqli_real_escape_string($conn, $_POST['create_routine']);
    $_SESSION['create_amount'] = mysqli_real_escape_string($conn, $_POST['create_amount']);

    header("Location: local_transfers.php");
  }
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


  <footer class="text-center mt-5 py-3 mx-auto" style="background: #336699; color: #fff; width: 100vw !important;">
    <P class="mt-3">Copyright ©2020 All rights reserved | FirstPak Bank</p>
  </footer>

</body>

</html>