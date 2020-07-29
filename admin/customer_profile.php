<?php
session_start();
ob_start();

$client = $_GET['client'];

if ($_SESSION['admin_name'] == "" || $_SESSION['admin_password'] == "") {
  header("Location: admin_login.php");
}

include_once '../includes/dbh.inc.php';
$sql = "SELECT * FROM reg_users where id='$client'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

//    $sql2="select * from history where id='$client' order by history_id desc";
//    $result2 = mysqli_query($conn, $sql2);

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="keywords" content="" />
  <meta name="description" content="Cater Allen awarded Best Financial Service Provider 2018. We have over 200 years of experience working with financial advisers and intermediaries in the UK." />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#022151">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">


  <title>Account Information </title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="../../img/icon.png" />
  <link href="../dashboard/dash_style.css" rel="stylesheet" type="text/css" />

</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light fixed">
    <a href="../index.php" class="navbar-brand"><img src="../images/logo.png" style="width: 200px; height: 64px;" alt="logo"> </a>
    <a href="admin_cpanel.php" style="color:#2548af; text-decoration: none;">
      <i class="fas fa-home"></i>
      <span style="text-decoration: underline;">ADMIN SECTION</span>
    </a>
  </nav>
  <div class="container-fluid mt-5">
    <a href="setting.php" class="btn btn-primary" style="float:right !important; margin-left: 10px;">
      <i class="fas fa-cogs"></i>
      Setting
    </a>
    <a href="log_out.php" class="btn btn-danger" style="float:right !important;">
      Log out
      <i class="fas fa-sign-out-alt"></i>
    </a>
  </div>
  <br>
  <br>
  <div class="container-fluid mx-auto mt-5">
    <h3 class="text-center" style="color: #336699">CREATE ACCOUNT HISTORY VIA CREDIT AND DEBIT</h3>
    <div class="col-md-8 mx-auto">
      <h1 class='text-center' style='color: #23266d'>Available Balance</h1>
      <table class="table table-striped">
        <tr>
          <td>Currency Type</td>
          <td><?php echo  $row['currency'] ?> </td>
        </tr>
        <tr>
          <td>Account Balance</td>
          <td class="pl-3">
            <?php
            if ($row['currency'] == 'EURO') {
              $seperate = $row['account_balance'];
              $new_seperate = number_format($seperate, 2);
              echo "&euro;" . $new_seperate;
            } else if ($row['currency'] == 'USD') {
              $seperate = $row['account_balance'];
              $new_seperate = number_format($seperate, 2);
              echo "$" . $new_seperate;
            } else if ($row['currency'] == 'GBP') {
              $seperate = $row['account_balance'];
              $new_seperate = number_format($seperate, 2);
              echo "&pound;" . $new_seperate;
            } else if ($row['currency'] == 'AUD') {
              $seperate = $row['account_balance'];
              $new_seperate = number_format($seperate, 2);
              echo "&#x41;&#x24;" . $new_seperate;
            } else if ($row['currency'] == 'CAD') {
              $seperate = $row['account_balance'];
              $new_seperate = number_format($seperate, 2);
              echo "$" . $new_seperate;
            } else if ($row['currency'] == 'CHF') {
              $seperate = $row['account_balance'];
              $new_seperate = number_format($seperate, 2);
              echo "&#x43;&#x48;&#x46;" . $new_seperate;
            } else if ($row['currency'] == 'JYP') {
              $seperate = $row['account_balance'];
              $new_seperate = number_format($seperate, 2);
              echo "&#xa5;" . $new_seperate;
            } else if ($row['currency'] == 'NZD') {
              $seperate = $row['account_balance'];
              $new_seperate = number_format($seperate, 2);
              echo "&#x24;" . $new_seperate;
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>Account Type</td>
          <td><?php echo  $row['account_type'] ?> </td>
        </tr>

      </table>
    </div>
  </div>
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center">
        <hr>
        <h3 class="text-uppercase" style="color: #336699">Credit User Account</h3>
        <hr>
      </div>
      <?php
      if (isset($_POST['credit_local'])) {
        $trans_date = mysqli_real_escape_string($conn, $_POST['trans_date']);
        $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
        $account_name = mysqli_real_escape_string($conn, $_POST['account_name']);
        $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $routine_no = mysqli_real_escape_string($conn, $_POST['routine_no']);
        $trans_type = 'credit';
        $status = 'received';
        $local_total = $amount + $row['account_balance'];

        $local_sql = "INSERT INTO local(id, client_id, trans_date, trans_type, bank_name, account_name, account_number, amount, description, routine_no, status)
                            VALUES(NULL,'$client', '$trans_date', '$trans_type', '$bank_name', '$account_name', '$account_number', '$amount', '$description', '$routine_no', '$status')";

        $credit_local = mysqli_query($conn, $local_sql);

        if ($credit_local) {

          $deposit_local = "UPDATE reg_users SET account_balance='$local_total' WHERE id='$client'";
          $result =  mysqli_query($conn, $deposit_local);

          if ($result) {
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
              #sym = "&#x43;&#x48;&#x46"; 
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
                    <p style='color: black'> Account Name: $account_name </p>
                    <p style='color: black'> Account Number: $account_number </p>
                    <p style='color: black'> Amount: $amount </p>
                    <p style='color: black'> Routing Number: $routine_no </p>
                    <p style='color: black'> Transaction Type: $trans_type </p>
                    <p style='color: black'> Status: $status </p>
                    <p style='color: black'> Available Balance: $sym$show_format </p>
                     <hr style='font-weight: bold; color: #23266d'>
                     <h3 style='color: #23266d'>Please do not respond to email requesting for your Card/PIN details</h3>
                     <h3 style='color: #23266d'>FirstPak Bank will never ask for such through this medium. Thanks.</h3>
                     
                     <h3 style='color: #23266d'>For Enquires Please call Customer Care on (302) 439-0766 or  contactus@firstpakbank.com</h3>
                       <hr style='font-weight: bold; color: #23266d'>
                       <p style='text-align: justify; color: black'><b style='color: #23266d'>DISCLAIMER:</b> Any view of tis e-mail are those of the sender except where the sender specifically states them to be that FirstPak Bank. This message is for the desgined recipient only and may contain privileged, proprietary, or otherwise private information. If you have received it in error, please notify the sender immmediately and delete the original. Any other use of the email by you is prohibited. FirstPak Bank accepts no liability for any loss or damage resulting directly or indirectly from the transmission of this e-mail message.</p>
                    
                    </body>
                ";

            $to = "$email";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <$from>' . "\r\n";

            if (mail($to, $subject, $message, $headers)) {
              header("Location: customer_profile.php?client=" . $client);
            }
          }




          //                                 echo "
          //                                <div class='alert alert-primary alert-dismissible  fade show col-md-8'>
          //                                        <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
          //                                        <strong> You have successfully deposited money to this User's Account via Local Transfer! </strong>
          //                                 </div>";
        } else {
          echo "
                        <div class='alert alert-danger alert-dismissible  fade show col-md-8'>
                                <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
                                <strong> An error occured! </strong>
                         </div>";

          //header("Location: customer_profile.php?client=".$client);
        }
      }

      if (isset($_POST['credit_international'])) {
        $trans_date = mysqli_real_escape_string($conn, $_POST['trans_date']);
        $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
        $bank_address = mysqli_real_escape_string($conn, $_POST['bank_address']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $swift_code = mysqli_real_escape_string($conn, $_POST['swift_code']);
        $routine_no = mysqli_real_escape_string($conn, $_POST['routine_no']);
        $account_name = mysqli_real_escape_string($conn, $_POST['account_name']);
        $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $trans_type = 'credit';
        $status = 'received';
        $international_total = $amount + $row['account_balance'];

        $international_sql = "INSERT INTO international(id, client_id, trans_date, trans_type, bank_name, bank_address, country, swift_code, routine_no, account_name, account_number, amount, status)
                                    VALUES(NULL,'$client', '$trans_date', '$trans_type', '$bank_name', '$bank_address', '$country', '$swift_code', '$routine_no', '$account_name', '$account_number', '$amount', '$status')";

        $credit_international = mysqli_query($conn, $international_sql);

        if ($credit_international) {

          $deposit_international = "UPDATE reg_users SET account_balance='$international_total' WHERE id='$client'";

          $result = mysqli_query($conn, $deposit_international);

          if ($result) {
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
                     <h3 style='color: #23266d'> will never ask for such through this medium. Thanks.</h3>
                     
                     <h3 style='color: #23266d'>For Enquires Please call Customer Care on (302) 439-0766 or  contactus@firstpakbank.com</h3>
                       <hr style='font-weight: bold; color: #23266d'>
                       <p style='text-align: justify; color: black'><b style='color: #23266d'>DISCLAIMER:</b> Any view of tis e-mail are those of the sender except where the sender specifically states them to be that FirstPak Bank. This message is for the desgined recipient only and may contain privileged, proprietary, or otherwise private information. If you have received it in error, please notify the sender immmediately and delete the original. Any other use of the email by you is prohibited. FirstPak Bank accepts no liability for any loss or damage resulting directly or indirectly from the transmission of this e-mail message.</p>
                    
                    </body>
                ";

            $to = "$email";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <$from>' . "\r\n";

            if (mail($to, $subject, $message, $headers)) {
              header("Location: customer_profile.php?client=" . $client);
            }
          }
        } else {
          echo "
                                <div class='alert alert-danger alert-dismissible  fade show col-md-8'>
                                        <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
                                        <strong> An error occured! </strong>
                                 </div>";

          //header("Location: customer_profile.php?client=".$client);
        }
      }

      ?>

      <!-- Credit Local Transaction -->
      <div class="col-md-6">
        <h3 style="color: #336699">Credit User Banking Account via Local Transaction</h3>
        <form class="needs-validation" novalidate method="POST" style="font-size: 12px">
          <div class="form-row">
            <label for="validationCustomx0" class="col-sm-2 col-form-label col-form-label-md">Date of Transaction</label>
            <div class="col-sm-10 mb-3">
              <input type="date" class="form-control form-control-sm" id="validationCustomx0" name="trans_date" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx14" class="col-sm-2 col-form-label col-form-label-md">Sender's Bank Name</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustomx14" placeholder="Enter Sender Bank Name" name="bank_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx1" class="col-sm-2 col-form-label col-form-label-md">Sender's Account Name</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustomx1" placeholder="Enter Sender Account Name" name="account_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx2" class="col-sm-2 col-form-label col-form-label-md">Sender's Account Number</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustomx2" placeholder="Enter Sender Account Number" name="account_number" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx3" class="col-sm-2 col-form-label col-form-label-md">Amount</label>
            <div class="col-sm-10 mb-3">
              <div class="input-group">
                <input type="number" class="form-control form-control-md" id="validationCustomx3" placeholder="Amount" name="amount" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx4" class="col-sm-2 col-form-label col-form-label-md">Description</label>
            <div class="col-sm-10 mb-3">
              <textarea class="form-control form-control-md" id="validationCustomx4" placeholder="Description" required rows="3" name="description"></textarea>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx40" class="col-sm-2 col-form-label col-form-label-md">Routing Number</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-md" id="validationCustomx40" placeholder="Routing Number" required rows="3" name="routine_no">
              <div class="valid-feedback">
                Looks good!
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
          <button class="btn btn-primary mb-5 float-right p-2 px-3" type="submit" name="credit_local" style="background: #2548af; border-radius: 20px;"><i class="fa fa-exchange mr-1"></i>Transfer Funds</button>
        </form>
      </div>

      <!-- Credit International Transaction -->
      <div class="col-md-6">
        <h3 style="color: #336699">Credit User Banking Account via International Transaction</h3>
        <form class="needs-validation" novalidate method="POST" style="font-size: 12px">
          <div class="form-row">
            <label for="validationCustom00" class="col-sm-2 col-form-label col-form-label-md">Date of Transaction</label>
            <div class="col-sm-10 mb-3">
              <input type="date" class="form-control form-control-sm" id="validationCustom00" name="trans_date" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom01" class="col-sm-2 col-form-label col-form-label-md">Bank Name</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustom01" placeholder="Bank name" name="bank_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom01" class="col-sm-2 col-form-label col-form-label-md">Bank Address</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustom01" placeholder="Bank Address" name="bank_address" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom01" class="col-sm-2 col-form-label col-form-label-md">Country</label>
            <div class="col-sm-10 mb-3">
              <select name="country" class="form-control form-control-md" id="validationCustom04" style="border:#D3CACA solid 1px; border-radius:0px;" class="form-control" required>
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
            <label for="validationCustom06" class="col-sm-2 col-form-label col-form-label-md">Swift Code</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustom06" placeholder="Swift Code" name="swift_code" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom05" class="col-sm-2 col-form-label col-form-label-md">Routing Number </label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustom05" placeholder="Routing Number" name="routine_no" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom02" class="col-sm-2 col-form-label col-form-label-md">Sender's Account Name</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustom02" placeholder="Sender's Account name" name="account_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom04" class="col-sm-2 col-form-label col-form-label-md">Sender's Account Number</label>
            <div class="col-sm-10 mb-3">
              <input type="number" class="form-control form-control-sm" id="validationCustom04" placeholder="Sender's Account Number" name="account_number" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom08" class="col-sm-2 col-form-label col-form-label-md">Amount</label>
            <div class="col-sm-10 mb-3">
              <div class="input-group">
                <input type="number" class="form-control form-control-sm" id="validationCustom08" placeholder="Amount" name="amount" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
              <label class="form-check-label" for="invalidCheck2">
                Please Comfirm the informations above before submitting this application
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <button class="btn btn-primary mb-5 float-right p-2 px-3" type="submit" name="credit_international" style="background: #2548af; border-radius: 20px;"><i class="fa fa-exchange mr-1"></i>Transfer Funds</button>
        </form>
      </div>
    </div>
  </div>
  <br>
  <!-- Debit User Account via local -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center">
        <hr>
        <h3 class="text-uppercase" style="color: #336699">Debit User Account</h3>
        <hr>
      </div>
      <?php
      if (isset($_POST['debit_local'])) {
        $trans_date = mysqli_real_escape_string($conn, $_POST['trans_date']);
        $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
        $account_name = mysqli_real_escape_string($conn, $_POST['account_name']);
        $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $routine_no = mysqli_real_escape_string($conn, $_POST['routine_no']);
        $trans_type = 'debit';
        $status = 'completed';
        $local_total = $row['account_balance'] - $amount;

        $local_sql = "INSERT INTO local(id, client_id, trans_date, trans_type, bank_name, account_name, account_number, amount, description, routine_no, status)
                            VALUES(NULL,'$client', '$trans_date', '$trans_type', '$bank_name', '$account_name', '$account_number', '$amount', '$description', '$routine_no', '$status')";

        $debit_local = mysqli_query($conn, $local_sql);

        if ($debit_local) {
          $deposit_local = "UPDATE reg_users SET account_balance='$local_total' WHERE id='$client'";
          $result  =   mysqli_query($conn, $deposit_local);

          if ($result) {
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
              #sym = "&#x43;&#x48;&#x46"; 
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
                    <p style='color: black'> Account Name: $account_name </p>
                    <p style='color: black'> Account Number: $account_number </p>
                    <p style='color: black'> Amount: $amount </p>
                    <p style='color: black'> Routing Number: $routine_no </p>
                    <p style='color: black'> Transaction Type: $trans_type </p>
                    <p style='color: black'> Status: $status </p>
                    <p style='color: black'> Available Balance: $sym$show_format </p>
                     <hr style='font-weight: bold; color: #23266d'>
                     <h3 style='color: #23266d'>Please do not respond to email requesting for your Card/PIN details</h3>
                     <h3 style='color: #23266d'>FirstPak Bank will never ask for such through this medium. Thanks.</h3>
                     
                     <h3 style='color: #23266d'>For Enquires Please call Customer Care on (302) 439-0766 or  contactus@firstpakbank.com</h3>
                       <hr style='font-weight: bold; color: #23266d'>
                       <p style='text-align: justify; color: black'><b style='color: #23266d'>DISCLAIMER:</b> Any view of tis e-mail are those of the sender except where the sender specifically states them to be that FirstPak Bank. This message is for the desgined recipient only and may contain privileged, proprietary, or otherwise private information. If you have received it in error, please notify the sender immmediately and delete the original. Any other use of the email by you is prohibited. FirstPak Bank accepts no liability for any loss or damage resulting directly or indirectly from the transmission of this e-mail message.</p>
                    
                    </body>
                ";

            $to = "$email";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <$from>' . "\r\n";

            if (mail($to, $subject, $message, $headers)) {
              header("Location: customer_profile.php?client=" . $client);
            }
          }
        } else {
          echo "
                        <div class='alert alert-danger alert-dismissible  fade show col-md-8'>
                                <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
                                <strong> An error occured! </strong>
                         </div>";

          header("Location: customer_profile.php?client=" . $client);
        }
      }

      if (isset($_POST['debit_international'])) {
        $trans_date = mysqli_real_escape_string($conn, $_POST['trans_date']);
        $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
        $bank_address = mysqli_real_escape_string($conn, $_POST['bank_address']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $swift_code = mysqli_real_escape_string($conn, $_POST['swift_code']);
        $routine_no = mysqli_real_escape_string($conn, $_POST['routine_no']);
        $account_name = mysqli_real_escape_string($conn, $_POST['account_name']);
        $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $trans_type = 'debit';
        $status = 'completed';
        $international_total = $row['account_balance'] - $amount;

        $international_sql = "INSERT INTO international(id, client_id, trans_date, trans_type, bank_name, bank_address, country, swift_code, routine_no, account_name, account_number, amount, status)
                                    VALUES(NULL,'$client', '$trans_date', '$trans_type', '$bank_name', '$bank_address', '$country', '$swift_code', '$routine_no', '$account_name', '$account_number', '$amount', '$status')";

        $debit_international = mysqli_query($conn, $international_sql);

        if ($debit_international) {
          //                                        $status = 'completed';
          //                                        $update_status = "UPDATE credit_transaction SET status='$status' WHERE id='$client'";
          //                                        mysqli_query($conn, $update_status);

          $deposit_international = "UPDATE reg_users SET account_balance='$international_total' WHERE id='$client'";


          $result = mysqli_query($conn, $deposit_international);

          if ($result) {
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
                     
                     <h3 style='color: #23266d'>For Enquires Please call Customer Care on (302) 439-0766 or  contactus@firstpakbank.com</h3>
                       <hr style='font-weight: bold; color: #23266d'>
                       <p style='text-align: justify; color: black'><b style='color: #23266d'>DISCLAIMER:</b> Any view of tis e-mail are those of the sender except where the sender specifically states them to be that FirstPak Bank. This message is for the desgined recipient only and may contain privileged, proprietary, or otherwise private information. If you have received it in error, please notify the sender immmediately and delete the original. Any other use of the email by you is prohibited. FirstPak Bank accepts no liability for any loss or damage resulting directly or indirectly from the transmission of this e-mail message.</p>
                    
                    </body>
                ";

            $to = "$email";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <$from>' . "\r\n";

            if (mail($to, $subject, $message, $headers)) {
              header("Location: customer_profile.php?client=" . $client);
            }
          }
        } else {
          echo "
                                <div class='alert alert-danger alert-dismissible  fade show col-md-8'>
                                        <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
                                        <strong> An error occured! </strong>
                                 </div>";

          header("Location: customer_profile.php?client=" . $client);
        }
      }

      ?>

      <!-- Local Debit Transaction -->
      <div class="col-md-6">
        <h3 style="color: #336699">Debit User Banking Account via Local Transaction</h3>
        <form class="needs-validation" novalidate method="POST" style="font-size: 12px">
          <div class="form-row">
            <label for="validationCustomx0y" class="col-sm-2 col-form-label col-form-label-md">Date of Transaction</label>
            <div class="col-sm-10 mb-3">
              <input type="date" class="form-control form-control-sm" id="validationCustomx0y" name="trans_date" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx1y2" class="col-sm-2 col-form-label col-form-label-md">Sender's Bank Name</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustomx1y2" placeholder="Enter Sender Bank Name" name="bank_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx1y" class="col-sm-2 col-form-label col-form-label-md">Sender's Account Name</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustomx1y" placeholder="Enter Sender Account Name" name="account_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx2y" class="col-sm-2 col-form-label col-form-label-md">Sender's Account Number</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustomx2y" placeholder="Enter Sender Account Number" name="account_number" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx3y" class="col-sm-2 col-form-label col-form-label-md">Amount</label>
            <div class="col-sm-10 mb-3">
              <div class="input-group">
                <input type="number" class="form-control form-control-md" id="validationCustomx3y" placeholder="Amount" name="amount" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx3y" class="col-sm-2 col-form-label col-form-label-md">Routing Number</label>
            <div class="col-sm-10 mb-3">
              <div class="input-group">
                <input type="number" class="form-control form-control-md" id="validationCustomx3y" placeholder="Routine Number" name="routine_no" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustomx4y" class="col-sm-2 col-form-label col-form-label-md">Description</label>
            <div class="col-sm-10 mb-3">
              <textarea class="form-control form-control-md" id="validationCustomx4y" placeholder="Description" required rows="3" name="description"></textarea>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidChecky" required>
              <label class="form-check-label" for="invalidChecky">
                Please Comfirm the informations above before submitting this application
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <button class="btn btn-primary mb-5 float-right p-2 px-3" type="submit" name="debit_local" style="background: #2548af; border-radius: 20px;"><i class="fa fa-exchange mr-1"></i>Debit User Account</button>
        </form>
      </div>

      <!-- International Debit Transaction -->
      <div class="col-md-6">
        <h3 style="color: #336699">Debit User Banking Account via International Transaction</h3>
        <form class="needs-validation" novalidate method="POST" style="font-size: 12px">
          <div class="form-row">
            <label for="validationCustom00z" class="col-sm-2 col-form-label col-form-label-md">Date of Transaction</label>
            <div class="col-sm-10 mb-3">
              <input type="date" class="form-control form-control-sm" id="validationCustom00z" name="trans_date" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom01z" class="col-sm-2 col-form-label col-form-label-md">Bank Name</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustom01z" placeholder="Bank name" name="bank_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom01z" class="col-sm-2 col-form-label col-form-label-md">Bank Address</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustom01z" placeholder="Bank Address" name="bank_address" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom01z" class="col-sm-2 col-form-label col-form-label-md">Country</label>
            <div class="col-sm-10 mb-3">
              <select name="country" class="form-control form-control-sm" id="validationCustom01z" style="border:#D3CACA solid 1px; border-radius:0px;" class="form-control" required>
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
            <label for="validationCustom06z" class="col-sm-2 col-form-label col-form-label-md">Swift Code</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustom06z" placeholder="Swift Code" name="swift_code" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom05z" class="col-sm-2 col-form-label col-form-label-md">Routing Number </label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustom05z" placeholder="Routing Number" name="routine_no" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom02z" class="col-sm-2 col-form-label col-form-label-md">Sender's Account Name</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control form-control-sm" id="validationCustom02z" placeholder="Sender's Account name" name="account_name" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom04z" class="col-sm-2 col-form-label col-form-label-md">Sender's Account Number</label>
            <div class="col-sm-10 mb-3">
              <input type="number" class="form-control form-control-sm" id="validationCustom04z" placeholder="Sender's Account Number" name="account_number" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="validationCustom08z" class="col-sm-2 col-form-label col-form-label-md">Amount</label>
            <div class="col-sm-10 mb-3">
              <div class="input-group">
                <input type="number" class="form-control form-control-sm" id="validationCustom08z" placeholder="Amount" name="amount" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck2z" required>
              <label class="form-check-label" for="invalidCheck2z">
                Please Comfirm the informations above before submitting this application
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <button class="btn btn-primary mb-5 float-right p-2 px-3" type="submit" name="debit_international" style="background: #2548af; border-radius: 20px;"><i class="fa fa-exchange mr-1"></i>Debit User Account</button>
        </form>
      </div>
    </div>
  </div>
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
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>