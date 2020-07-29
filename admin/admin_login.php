<?php
    include_once '../includes/dbh.inc.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <head>
       <meta charset="UTF-8">
        <title> Admin Log in</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="shortcut icon" type="image/png" href="../images/favico.png"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="../dashboard/dash_style.css" rel="stylesheet" type="text/css"/>
        <style>
        
        footer {
            background: #1b1b1b;
        }

        .footer p {
            font-size: 16px;
            letter-spacing: 1px;
            color: #ccc;
        }
        
        .container {
            padding: 16px;
            width: 70%;
            height: auto;
            margin: 0px auto;
        }
        
        h2 {
            text-transform: uppercase;
            margin-top: 0;
            font-size: 2rem;
            margin-bottom: .5rem;
            font-family: inherit;
            font-weight: 500;
            line-height: 1.2;
            color: inherit;
        }
        
        .imgContainer {
           text-align: center;
           margin: 10px auto;
           width: 20%;
           height: 30%
        }
        
        form {
            border: 3px solid #f1f1f1;
        }
        
        label {
            margin: 0;
            display: inline-block;
            margin-bottom: .5rem;
        }
        img {
            min-width: 100%;
            max-height: 100%;
        }
        
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }       
        
        button {
            //background-color: #007bff;
            //color: white;
            //padding: 14px 20px;
            margin: 8px 0;
            //border: none;
            //cursor: pointer;
            width: 100%;
            //text-transform: none;
            //overflow: visible;
        }
        </style>
    </head>
    
    <body>
        <!-- Header -->
        <nav class="navbar navbar-expand-md navbar-light fixed bg-light">
            <a href="../../index.php" class="navbar-brand"><img src="../images/logo.png" style="width: 200px; height: 64px;" alt="logo"> </a>
        </nav>
        
        <section class="container">
                <h2 class="text-center">Admin Log in</h2>
                <form method="POST"  enctype="multipart/form-data">
                    <div class="imgContainer">
                        <img class="img-responsive img-fluid" src="../images/login_key.png" alt="admin login" class="avatar">
                    </div>
                    <div class="container">
                        <label for="user_name">
                            <b>Username</b>
                        </label>
                        <input id="user_name" name="admin_name" type="text" placeholder="Enter Username" name="admin_user" required>
                        <label for="psw">
                            <b>Password</b>
                        </label>
                        <input id="psw" type="password" name="admin_password" placeholder="Enter Password" name="password" required>
                        <button type="submit" class="btn btn-primary" name="admin_submit">Login</button>
                    </div>
                </form>
               <?php
                if(isset($_POST['admin_submit'])) {
                    $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
                    $admin_password = mysqli_real_escape_string($conn, $_POST['admin_password']);
                    
                    //INSERT INTO DATABASE
                    //$sql = "INSERT INTO admin (admin_name, admin_password)
                   // VALUES ('$admin_name', $admin_password)";
                    $sql="select * from admin where admin_name='$admin_name' && admin_password= '$admin_password'";
                   $result= mysqli_query($conn, $sql);
                   $resultChecker = mysqli_num_rows($result);
                   $row=mysqli_fetch_array($result);
                    if($resultChecker ==1){
                        $_SESSION['admin_name']=$row['admin_name'];
                        $_SESSION['admin_password']=$row['admin_password'];
                            header("Location: admin_cpanel.php");     
                    }
                    else {
                        echo "<center>
                                    <div class='alert alert-primary alert-dismissible  fade show col-md-8'>  
                                        <strong> Invalid login Details </strong>
                                     </div>
                            </center>";
                    }
                }
               
               ?>
              
        </section>
        
        
    </body>
</html>
