<?php
    session_start();
    ob_start();
        if($_SESSION['admin_name']=="" ||$_SESSION['admin_password']=="" ){
        header("Location: admin_login.php");
    }
    include_once '../includes/dbh.inc.php';
    
    $sql = 'SELECT * FROM admin';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
   
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
        <title> Setting </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="shortcut icon" type="image/png" href="../images/logo.png"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <style>
             .bg-light {
            background: #091b27 !important;
        }
        
        footer {
            background: #1b1b1b;
        }

        .footer p {
            font-size: 16px;
            letter-spacing: 1px;
            color: #ccc;
        }
        
        @media (max-width: 1200px) {
            footer {
                position:static !important;
            }
        }
        </style>
        <link href="../../Statics/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-md navbar-light fixed"  style="background: #2548af;">
            <a href="../index.php" class="navbar-brand"><img src="../../images/logo.png" style="width: 200px; height: 64px;" alt="logo"> </a>
            <a href="admin_cpanel.php" style="color:white; text-decoration: none;">
                <i class="fas fa-home"></i> 
                CPANEL
            </a>
        </nav>
        <!-- Start Dash Board -->
           <div class="container-fluid" style="background:#f4f4fd;">
            <br>
                <div class="col-md-12">
                    <h3 style="font-size: 1.75rem;">
                        ADMIN SETTING 
                        <small style="font-weight: normal!important; font-style: italic; font-family: arial; font-size: 15px!important">    -    Confidential section </small>
                    </h3>
                </div>
                <br>
                        <!-- Details -->
                <div class="col-md-12" style="height: auto;">
                        <div class="col-md-12" style="background: #007bff; border-radius: 10px;">
                            <div class="detail-sub1 font-effect-3d font-effect-embross" style="font-size: 40px; color: white !important">
                                <span class="fa fa-cog fa-spin fa-2x"></span>
                                <span class="fa fa-cog fa-spin fa-1x fa-fw"></span>
                                Update Admin Information
                            </div>    
                            <div class="col-md-12" style="background:white; height: auto; border-radius: 10px;">
                                <form  method="post">    
                                <br> 
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user" style="margin-right: 5px;"></i>
                                            Username:
                                        </span>
                                    </div>
                                    <input type="text" name="admin_name" value="<?php echo $row['admin_name'] ?>"class="form-control" required style="margin-top: 0em; padding: 5px; border: 2px solid #e2e2e2;">
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fab fa-slack-hash" style="margin-right: 5px;"></i>
                                            Password:
                                        </span>
                                    </div>
                                    <input type="text" name="admin_password" value="<?php echo $row['admin_password'] ?>" class="form-control" required style="margin-top: 0em; padding: 5px; border: 2px solid #e2e2e2;">
                                </div>
                                <br>
                                <br>
                                <div class="text-center">
                                   <input type="submit" name="submit_details" style="font-weight: bold; font-size: 24px; margin-top: 20px;" class="btn btn-primary" value="Update">    
                               </div>
                                <br>
                                </form>
                                <?php
                                    if(isset($_POST['submit_details'])) {
                                        $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
                                        $admin_password = mysqli_real_escape_string($conn, $_POST['admin_password']);
                                        
                                        $update = "UPDATE admin SET admin_name='$admin_name', admin_password='$admin_password' WHERE id=1";
                                        $show = mysqli_query($conn, $update);
                                        if($show) {
                                            echo "<center>
                                            <div class='alert alert-success alert-dismissible  fade show col-md-8'>
                                                    <button type='button' class='close' data-dismiss = 'alert' style='padding: 5px;'> &times</button>
                                                    <strong> Admin info Successfully updated</strong><a href ='admin_cpanel.php'> Click here to return to Cpanel</a>
                                             </div>
                                        </center>";
                                        //header("Location: setting.php?update=success");
                                        }
                                        else {
                                            echo "There is an error somewhere";
                                        }
                                    }
                                
                                ?>
                            </div>
                            <br>
                        </div>
                    <br>
                </div>
            </div>       
    </body>
</html>
