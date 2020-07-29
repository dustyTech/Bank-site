<?php
include_once '../includes/dbh.inc.php';
session_start();
ob_start();

if ($_SESSION['bank_id'] == "") {
  header("Location: ../login.php");
}

$client = $_SESSION['id'];

$sql2 = "SELECT * FROM reg_users WHERE id='$client'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);

//    $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Local Transactions | Account Statement | FirstPak Bank </title>
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
            <a class="dropdown-item" href="local_statment.php">Local Transactions</a>
            <a class="dropdown-item" href="international_statement.php">International Wire Transactions</a>
            <a class="dropdown-item" onclick="pay()" href="#">Bills Transactions</a>
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
  <div class="container">
    <br>
    <h3 style="text-transform: uppercase; color: #336699">Account Statements for Local Transactions</h3>
  </div>
  <hr>
  <div class="container-fluid table-responsive mb-5">
    <table class="table table-bordered table-sm" style="font-size: 12px;">
      <thead style="background: #336699; color: #fff">
        <tr>
          <th> TRANSACTION DATE</th>
          <th>TRANSACTION TYPE</th>
          <th>BANK NAME</th>
          <th>ACCOUNT NAME</th>
          <th>ACCOUNT NUMBER</th>
          <th>AMOUNT</th>
          <th>DESCRIPTION</th>
          <th>ROUTINE NUMBER</th>
          <th>STATUS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM local where client_id='$client' ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          if ($row['trans_type'] == "debit") {
        ?>

            <tr style="color: #cc0000; font-weight: bold">
              <td><?php echo $row['trans_date'];  ?></td>
              <td><?php echo $row['trans_type'];  ?></td>
              <td><?php echo $row['bank_name'];  ?></td>
              <td><?php echo $row['account_name'];  ?></td>
              <td><?php echo $row['account_number'];  ?></td>
              <td>-
                <?php
                if ($row2['currency'] == 'EURO') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&euro;" . $new_seperate;
                } else if ($row2['currency'] == 'USD') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "$" . $new_seperate;
                } else if ($row2['currency'] == 'GBP') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&pound;" . $new_seperate;
                } else if ($row2['currency'] == 'AUD') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&#x41;&#x24;" . $new_seperate;
                } else if ($row2['currency'] == 'CAD') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "$" . $new_seperate;
                } else if ($row2['currency'] == 'CHF') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&#x43;&#x48;&#x46;" . $new_seperate;
                } else if ($row2['currency'] == 'JYP') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&#xa5;" . $new_seperate;
                } else if ($row2['currency'] == 'NZD') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&#x24;" . $new_seperate;
                }
                ?>
              </td>
              <td style="text-transform: capitalize"><?php echo $row['description'];  ?></td>
              <td style="text-transform: capitalize"><?php echo $row['routine_no'];  ?></td>
              <td><?php echo $row['status'];  ?></td>
            </tr>
          <?php
          } else {
          ?>
            <tr style="color: #346dbf; font-weight: bold">
              <td><?php echo $row['trans_date'];  ?></td>
              <td><?php echo $row['trans_type'];  ?></td>
              <td><?php echo $row['bank_name'];  ?></td>
              <td><?php echo $row['account_name'];  ?></td>
              <td><?php echo $row['account_number'];  ?></td>
              <td>
                <?php
                if ($row2['currency'] == 'EURO') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&euro;" . $new_seperate;
                } else if ($row2['currency'] == 'USD') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "$" . $new_seperate;
                } else if ($row2['currency'] == 'GBP') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&pound;" . $new_seperate;
                } else if ($row2['currency'] == 'AUD') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&#x41;&#x24;" . $new_seperate;
                } else if ($row2['currency'] == 'CAD') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "$" . $new_seperate;
                } else if ($row2['currency'] == 'CHF') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&#x43;&#x48;&#x46;" . $new_seperate;
                } else if ($row2['currency'] == 'JYP') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&#xa5;" . $new_seperate;
                } else if ($row2['currency'] == 'NZD') {
                  $seperate = $row['amount'];
                  $new_seperate = number_format($seperate, 2);
                  echo "&#x24;" . $new_seperate;
                }
                ?>
              </td>
              <td style="text-transform: capitalize"><?php echo $row['description'];  ?></td>
              <td style="text-transform: capitalize"><?php echo $row['routine_no'];  ?></td>
              <td><?php echo $row['status'];  ?></td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <footer class="text-center mt-5 mx-auto fixed-bottom" style="background: #336699; color: #fff; width: 100vw !important;">
    <p class="py-1">Copyright ©2020 All rights reserved | FirstPak Bank</p>
  </footer>

</body>

</html>