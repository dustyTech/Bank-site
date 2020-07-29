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
    <h3 style="text-transform: uppercase; color: #336699">International Wire Transfer</h3>
    <hr>
    <div class="row">
      <div class="col-12 mx-auto">
        <h3 class="text-center" style="color: #336699">Enter's Recipient's Information</h3>
        <form class="needs-validation" novalidate method="POST">
          <div class="form-row">
            <label for="validationCustom01" class="col-sm-2 col-form-label col-form-label-md">Bank Name</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-md" id="validationCustom01" placeholder="Bank name" name="create_bank_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom03" class="col-sm-2 col-form-label col-form-label-md">Bank Address</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-md" id="validationCustom03" placeholder="Bank Address" name="create_bank_address" required>
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
            <label for="validationCustom04" class="col-sm-2 col-form-label col-form-label-md">Country</label>
            <div class="col-sm-10 mb-3">
              <select name="create_country" class="form-control form-control-md" id="validationCustom04" style="border:#D3CACA solid 1px; border-radius:0px;" class="form-control" required>
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
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom05" class="col-sm-2 col-form-label col-form-label-md">Routing Number </label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-md" id="validationCustom05" placeholder="Routing Number" name="create_routine_no" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom06" class="col-sm-2 col-form-label col-form-label-md">Swift Code</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-md" id="validationCustom06" placeholder="Swift Code" name="create_swift_code" required>
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
          <a href="../index.php" class="btn btn-danger mb-5 float-left" type="submit" name="submit"><i class="fa fa-close mr-1"></i>Cancel</a>
          <button class="btn btn-primary mb-5 float-right p-2 px-3" type="submit" name="submit" style="background: #336699; border-radius: 20px;"><i class="fa fa-exchange mr-1"></i>Transfer Funds</button>
        </form>
      </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
      $_SESSION['create_bank_name'] = mysqli_real_escape_string($conn, $_POST['create_bank_name']);
      $_SESSION['create_bank_address'] = mysqli_real_escape_string($conn, $_POST['create_bank_address']);
      $_SESSION['create_account_name'] = mysqli_real_escape_string($conn, $_POST['create_account_name']);
      $_SESSION['create_account_number'] = mysqli_real_escape_string($conn, $_POST['create_account_number']);
      $_SESSION['create_country'] = mysqli_real_escape_string($conn, $_POST['create_country']);
      $_SESSION['create_routine_no'] = mysqli_real_escape_string($conn, $_POST['create_routine_no']);
      $_SESSION['create_swift_code'] = mysqli_real_escape_string($conn, $_POST['create_swift_code']);
      $_SESSION['create_amount'] = mysqli_real_escape_string($conn, $_POST['create_amount']);

      header("Location: international_transfer.php");
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

</html>