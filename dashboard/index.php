<?php
include_once '../includes/dbh.inc.php';
session_start();
//     ob_start();
//         
if ($_SESSION['bank_id'] == "") {
    header("Location: ../login.php");
}

$client = $_SESSION['id'];

$sql = "SELECT * FROM reg_users where id='$client'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$sql2 = "SELECT * FROM pending_transaction where client_id='$client'";
$result2 = mysqli_query($conn, $sql2);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Dash Board | FirstPak Bank </title>
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
            <a href="../includes/logout.php" class="btn btn-primary" style="color: #fff; background: #346dbf">Log out</a>
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
                        <a class="dropdown-item" href="international_statement.php">International Transactions</a>
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
    <div class="container-fluid bg-light px-3" style="padding-top: 0;">
        <div class="row">
            <div class="col-md-4 mt-5">
                <div class="container">
                    <div class="row px-2 pb-0 mx-2 shadow-sm bg-light">
                        <div class="col-md-12 my-2 text-center">
                            <img style="width: 60%; height: 200px; border-radius:20px; margin: 0 auto !important;" src="<?php echo '../profile_pics/' . $row['photo'] ?>">
                        </div>
                        <div class="col-md-12">
                            <small class="py-2 px-3" style="text-transform: uppercase;">Welcome, <b><?php echo $row['first_name'] . " " . $row['last_name']; ?></b></small>
                            <br>
                            <small class="py-2 px-3" style="text-transform: capitalize;">Login ID: <b><?php echo $row['bank_id'] ?></b></small>
                            <br>
                            <small class="py-2 px-3" style="text-transform: capitalize;">Account Number: <b><?php echo $row['account_no'] ?></b></small>
                            <br>
                            <small class="py-2 px-3" style="color: #022151"><em style="font-weight: bold">Session Summary</em></small>
                            <br>
                            <small class="text-muted py-2 px-3"><em>Last Login: <?php echo $row['last_login'] ?></em></small>
                        </div>
                        <br>

                    </div>
                </div>
                <br>
                <div class="container" style="background: #fff; width: 100%; margin: 0; padding: 0">
                    <div class="row pb-0 shadow-sm bg-light">
                        <div class="col-md-4">
                            <img src="../images/cbo-relationship-manager-icon.png" alt="customer-care" />
                        </div>
                        <div class="col-md-8 mt-2">
                            <p>
                                <b> FirstPak Bank Customer's Service:</b>
                                <br>
                                (302) 439-0766
                            </p>
                            <p>
                                <b> Help Desk:</b>
                                <br>
                                contactus@firstpakbank.com

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 px-2">
                <div class='row px-2'>
                    <div class="col-4 mb-3">
                        <small class="float-left mt-1 mr-5"><b>ACCOUNT STATUS <span style='color: red;'>*</span></b></small>
                        <br>
                        <small><?php
                                if ($row['trans_status'] == 'dormant') {
                                    echo '<b style="background: red; color: white; border-radius: 20px; padding: 5px 10px; margin-top: 5px;"><i class="fa fa-minus-circle" aria-hidden="true"style="font-size: 14px; margin-right: 5px;"></i>DORMANT </b>';
                                } else if ($row['trans_status'] == 'active') {
                                    echo '<b style="background: green; color: white; border-radius: 20px; padding: 5px 10px; margin-top: 5px;"><i class="fa fa-check-circle" aria-hidden="true"style="font-size: 14px; margin-right: 5px;"></i>ACTIVE </b>';
                                } else if ($row['trans_status'] == 'error') {
                                    echo '<b style="background: red; color: white; border-radius: 20px; padding: 5px 10px; margin-top: 5px;"><i class="fa fa-times" aria-hidden="true"style="font-size: 14px; margin-right: 5px;"></i>ACCOUNT ERROR </b>';
                                } else if ($row['trans_status'] == 'pending') {
                                    echo '<b style="background: #23266D; color: white; border-radius: 20px; padding: 5px 10px; margin-top: 5px;"><i class="fa fa-hourglass" aria-hidden="true"style="font-size: 14px; margin-right: 5px;"></i>PENDING </b>';
                                } else if ($row['trans_status'] == 'transfer code') {
                                    echo '<b style="background: gold; color: white; border-radius: 20px; padding: 5px 10px; margin-top: 5px;"><i class="fa fa-sort" aria-hidden="true"style="font-size: 14px; margin-right: 5px;"></i>TRANSFER CODE</b>';
                                }
                                ?></small>
                    </div>
                    <div class="col-4 mb-3">
                        <small class="float-left mt-1 mr-5">FILTER BY</small>
                        <select class="form-control form-control-sm">
                            <option disabled selected>All Accounts</option>
                            <option><?php echo $row['account_type'] ?> Account</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3">
                        <small class="float-left mt-1 mr-5">SORT BY</small>
                        <select class="form-control form-control-sm">
                            <option><?php echo $row['account_type'] ?> Account</option>
                        </select>
                    </div>
                </div>
                <div class="row pt-2 pb-0 mx-2 shadow-sm bg-light">
                    <div class="container" style="background: #fff; width: 100%; margin: 0; padding: 0">
                        <p class="py-2 px-3" style="text-transform: uppercase;">Account type: <b><?php echo $row['account_type'] ?> Account</b></p>
                        <div class="table-responsive">
                            <table class="table table-sm" style="background: #fff; margin: 0">
                                <thead>
                                    <tr class="pl-2">
                                        <th class="pl-3" scope="col">My Accounts</th>
                                        <th class="pl-3" scope="col">Available Balance</th>
                                        <th class="pl-3" scope="col">Total Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="pl-3">
                                        <td class="pl-3"><?php echo $row['account_type']  ?> Accounts</td>
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
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="mx-auto" style="width: 200px;">
                            <button class="btn ext-center my-3" style="border: none; width: 200px; background: #336699; color: #fff" disabled>All accounts</button>
                        </div>
                    </div>
                </div>
                <div class="row pt-2 pb-0 mx-2 shadow-sm bg-light">
                    <div class="container" style="background: #fff; width: 100%; margin: 0; padding: 0">
                        <p class="py-2 px-3" style="text-transform: uppercase; color: red; font-weight: bold">All Pending Transactions</p>
                        <div class="table-responsive">
                            <table class="table table-sm" style="background: #fff; margin: 0">
                                <thead>
                                    <tr class="pl-2">
                                        <th class="pl-3" scope="col">Date</th>
                                        <th class="pl-3" scope="col">Transaction ID</th>
                                        <th class="pl-3" scope="col">Transfer Type</th>
                                        <th class="pl-3" scope="col">Account Name</th>
                                        <th class="pl-3" scope="col">Account Number</th>
                                        <th class="pl-3" scope="col">Amount</th>
                                        <th class="pl-3" scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                    ?>
                                        <tr class="pl-3">
                                            <td class="pl-3"> <?php echo $row2['trans_date'] ?></td>
                                            <td class="pl-3"> <?php echo $row2['trans_id'] ?> </td>
                                            <td class="pl-3"> <?php echo $row2['trans_type'] ?></td>
                                            <td class="pl-3"> <?php echo $row2['account_name'] ?></td>
                                            <td class="pl-3"> <?php echo $row2['account_number'] ?></td>
                                            <td class="pl-3">
                                                <?php
                                                if ($row['currency'] == 'EURO') {
                                                    $seperate = $row2['amount'];
                                                    $new_seperate = number_format($seperate, 2);
                                                    echo "&euro;" . $new_seperate;
                                                } else if ($row['currency'] == 'USD') {
                                                    $seperate = $row2['amount'];
                                                    $new_seperate = number_format($seperate, 2);
                                                    echo "$" . $new_seperate;
                                                } else if ($row['currency'] == 'GBP') {
                                                    $seperate = $row2['amount'];
                                                    $new_seperate = number_format($seperate, 2);
                                                    echo "&pound;" . $new_seperate;
                                                } else if ($row['currency'] == 'AUD') {
                                                    $seperate = $row2['amount'];
                                                    $new_seperate = number_format($seperate, 2);
                                                    echo "&#x41;&#x24;" . $new_seperate;
                                                } else if ($row['currency'] == 'CAD') {
                                                    $seperate = $row2['amount'];
                                                    $new_seperate = number_format($seperate, 2);
                                                    echo "$" . $new_seperate;
                                                } else if ($row['currency'] == 'CHF') {
                                                    $seperate = $row2['amount'];
                                                    $new_seperate = number_format($seperate, 2);
                                                    echo "&#x43;&#x48;&#x46;" . $new_seperate;
                                                } else if ($row['currency'] == 'JYP') {
                                                    $seperate = $row2['amount'];
                                                    $new_seperate = number_format($seperate, 2);
                                                    echo "&#xa5;" . $new_seperate;
                                                } else if ($row['currency'] == 'NZD') {
                                                    $seperate = $row2['amount'];
                                                    $new_seperate = number_format($seperate, 2);
                                                    echo "&#x24;" . $new_seperate;
                                                }
                                                ?>
                                            </td>
                                            <td class="pl-3"> <?php echo $row2['status'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="mx-auto" style="width: 200px;">
                            <button class="btn ext-center my-3" style="border: none; width: 200px; background: #336699; color: #fff" disabled>All Pending approvals</button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row pt-2 pb-0 mx-2 shadow-sm bg-light">
                    <div class="container px-2" style="background: #fff; width: 100%; margin: 0; padding: 0">
                        <p class="py-2 px-3" style="text-transform: uppercase; font-weight: bold">Upcoming transactions</p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="bills-tab" data-toggle="tab" href="#bills" role="tab" aria-controls="bills" aria-selected="true">Scheduled Bills Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="loans-tab" data-toggle="tab" href="#loans" role="tab" aria-controls="loans" aria-selected="false">Scheduled Local Transfers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="credit-tab" data-toggle="tab" href="#credit" role="tab" aria-controls="credit" aria-selected="false">Scheduled International Wire Transfers</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- Bills Payment Activities -->
                            <div class="tab-pane fade show active" id="bills" role="tabpanel" aria-labelledby="bills-tab">
                                <div class="p-2 pl-4">
                                    <small class="text-muted">No scheduled Bills Payment yet</small>
                                </div>
                            </div>
                            <!-- Local Transfer Activities -->
                            <div class="tab-pane fade" id="loans" role="tabpanel" aria-labelledby="loans-tab">
                                <div class="p-2 pl-4">
                                    <small class="text-muted">No scheduled Local Transfer Payments yet</small>
                                </div>
                            </div>
                            <!-- International Wire Transfer Activities -->
                            <div class="tab-pane fade" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                                <div class="p-2 pl-4">
                                    <small class="text-muted">No scheduled International Transfer Wires Payments yet</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 py-3 mx-auto" style="background: #336699; color: #fff; width: 100vw !important;">
        <P class="mt-3">Copyright ©2020 All rights reserved | FirstPak Bank.</p>
    </footer>

</body>

</html>