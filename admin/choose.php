<?php
    session_start();
    ob_start();
    
    $client = $_GET['client'];
    
     if($_SESSION['admin_name']=="" ||$_SESSION['admin_password']=="" ){
        header("Location: admin_login.php");
    }
  
    include_once '../includes/dbh.inc.php';


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
        <title>Pick an Option </title>

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <!-- Favicon -->
    <link rel="icon" type="image/png" href="../../img/icon.png" />
        
        <style>
           /*
             @media (max-width: 992px) {
                .padding {
                    font-size: 14px !important;
                    padding: 10px;
                }
            }
            
            */
           
        </style>
    </head>
    <body>
          <nav class="navbar navbar-expand-md navbar-light fixed">
            <a href="../index.php" class="navbar-brand"><img src="../images/logo.png" style="width: 200px; height: 64px;" alt="logo"> </a>
             <a href="admin_cpanel.php" style="color:#2548af; text-decoration: none;">
                <i class="fas fa-home"></i> 
                <span  style="text-decoration: underline;">ADMIN SECTION</span>
            </a>
        </nav>
        <div class="container text-center" style="margin-top: 15em; magin: auto;">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <a href="<?php echo"local.php?client=".$client?>" class="btn-primary p-3 padding" style="border-radius: 20px; font-size: 1em; box-sizing: border-box">Edit Local Transaction</a>
                </div>
                 <div class="col-md-4 mb-5">
                 <a href="<?php echo"pending_transaction.php?client=".$client?>" class="btn-danger p-3 padding" style="border-radius: 20px; font-size: 1em; box-sizing: border-box">Edit Pending Transaction</a>
                </div>
               <div class="col-md-4">
                    <a href="<?php echo"international.php?client=".$client?>" class="btn-success p-3 padding" style="border-radius: 20px; font-size: 1em; box-sizing: border-box">Edit International Transaction</a>
                </div>
            </div>
        </div>
        
                  <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
