<?php
    session_start();
        if($_SESSION['admin_name']=="" ||$_SESSION['admin_password']=="" ){
        header("Location: admin_login.php");
    }
    include_once '../includes/dbh.inc.php';
    include_once '../includes/send_mail_script.php';
    
    $sql = "SELECT * FROM contact_us";
    $result = mysqli_query($conn, $sql);
    $resultChecker = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Mail | Osten Bank </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/smoothScroll.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="css/magnific-popup.css" rel="stylesheet" type="text/css"/>
        <script src="readMore/js.js" type="text/javascript"></script>
        <link href="readMore/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/owl.theme.default.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        
        <style>
        footer {
            background: #1b1b1b;
        }

        .footer p {
            font-size: 16px;
            letter-spacing: 1px;
            color: #ccc;
        }
        </style>
    </head>
    <body>
         <!-- Header -->
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed">
            <a href="../index.php" class="navbar-brand"><img src="../images/logo.png" style="width: 200px; height: 64px;" alt="logo"> </a>
              <a href="admin_cpanel.php" style="color: #640c23 !important; font-weight: bold !important; text-decoration: none;">
                <i class="fas fa-home"></i> 
                CPANEL
            </a>
        </nav>
         <br>
      
        <br>
         <div class="container-fluid">
                <a href="" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                     STATS: <?php echo $resultChecker ?>
                </a>
                <a href="setting.php" class="btn btn-primary" style="float:right !important; margin-left: 10px;">
                    <i class="fas fa-cogs"></i>
                    Setting
                </a>
                <a href="admin_login.php" class="btn btn-danger" style="float:right !important;">
                    Log out
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <center>
                    <center>
                        <h3 class="btn btn-primary">
                            <i class="fas fa-envelope"></i>
                             CLIENT'S MESSAGES
                        </h3>  
                     </center>
                </center>
                <table class="table table-stripped table-bordered">
                     <thead>
                        <tr>
                            <th>S/N</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>SUBJECT</th>
                            <th>MESSAGE</th>
                            <th>DATE</th>
                            <th style="background: red!important; color: white!important">
                            <center>
                                ACTION
                            </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($resultChecker > 0) {
                                $count=1;
                                while($rows = mysqli_fetch_assoc($result)) {
                                
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $rows['contact_name']; ?></td>
                            <td><?php echo $rows['contact_email']; ?></td>
                            <td><?php echo $rows['contact_subject']; ?></td>
                            <td><?php echo $rows['contact_message'] ?></td>
                            <td><?php echo $rows['date_send'] ?></td>
                            <td>  
                            <center>  
                                <a href='../includes/send_mail_script.php?delContact=<?php echo $rows['id']; ?>' type='button' class='btn btn-danger' style='margin-right: 5px;'><i class='fas fa-trash-alt'></i></a>
                                <a href='send_mail.php' target='_self' type='button' class='btn btn-warning' style='margin-right: 5px;'><i class='fas fa-envelope'></i></a>
                            </center>
                            </td>   
                        </tr>
                  <?php
                        $count++;
                        }
                   }
                  ?>
                    </tbody>
                </table>
            </div>
        </div>
         
        
    </body>
</html>
