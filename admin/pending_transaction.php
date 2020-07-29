   <?php
    session_start();
    ob_start();
    
    $client = $_GET['client'];
    
     if($_SESSION['admin_name']=="" ||$_SESSION['admin_password']=="" ){
        header("Location: admin_login.php");
    }
  
    include_once '../includes/dbh.inc.php';
    
    $sql = "SELECT * FROM reg_users where id='$client'";
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result);
    
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
        <title>Delete Pending Transaction </title>

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <!-- Favicon -->
    <link rel="icon" type="image/png" href="../../img/icon.png" />
        
        <style>
            @media (max-width: 992px) {
                .padding {
                    font-size: 14px !important;
                }
            }
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
                                               <th class="pl-3" scope="col">Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            
                                              <?php
                                            
                                 $sql = "SELECT * FROM pending_transaction where client_id='$client' ORDER BY id DESC";
                        $result2 = mysqli_query($conn, $sql);  
                                         
                                                    while($row2 = mysqli_fetch_array($result2)) {
                                             ?>
                                              <tr class="pl-3">
                                                  <td class="pl-3"> <?php echo $row2['trans_date'] ?></td>
                                                  <td class="pl-3"> <?php echo $row2['trans_id'] ?> </td>
                                                  <td class="pl-3"> <?php echo $row2['trans_type'] ?></td>
                                                  <td class="pl-3"> <?php echo $row2['account_name'] ?></td>
                                                  <td class="pl-3"> <?php echo $row2['account_number'] ?></td>
                                                  <td class="pl-3"> 
                                                      <?php 
                                                         if($row['currency']=='EURO'){
                                                            $seperate = $row2['amount'];
                                                            $new_seperate = number_format($seperate,2); 
                                                           echo "&euro;".$new_seperate; 
                                                        }
                                                        else if($row['currency']=='USD'){
                                                            $seperate = $row2['amount'];
                                                            $new_seperate = number_format($seperate,2); 
                                                           echo "$".$new_seperate; 
                                                        }
                                                        else if($row['currency']=='GBP'){
                                                            $seperate = $row2['amount'];
                                                            $new_seperate = number_format($seperate,2); 
                                                           echo "&pound;".$new_seperate; 
                                                        }
                                                        else if($row['currency']=='AUD'){
                                                            $seperate = $row2['amount'];
                                                            $new_seperate = number_format($seperate,2); 
                                                           echo "&#x41;&#x24;".$new_seperate; 
                                                        }
                                                        else if($row['currency']=='CAD'){
                                                            $seperate = $row2['amount'];
                                                            $new_seperate = number_format($seperate,2); 
                                                           echo "$".$new_seperate; 
                                                        }
                                                        else if($row['currency']=='CHF'){
                                                            $seperate = $row2['amount'];
                                                            $new_seperate = number_format($seperate,2); 
                                                           echo "&#x43;&#x48;&#x46;".$new_seperate; 
                                                        }
                                                        else if($row['currency']=='JYP'){
                                                            $seperate = $row2['amount'];
                                                            $new_seperate = number_format($seperate,2); 
                                                           echo "&#xa5;".$new_seperate; 
                                                        }
                                                        else if($row['currency']=='NZD'){
                                                            $seperate = $row2['amount'];
                                                            $new_seperate = number_format($seperate,2); 
                                                           echo "&#x24;".$new_seperate; 
                                                        }
                                                          ?>
                                                  </td>
                                                  <td class="pl-3"> <?php echo $row2['status']?></td>
                                                   <td> <a href='../includes/delete_pending.php?del=<?php echo $client; ?>&trans_id=<?php echo $row2['id']?>' type='button' class='btn btn-danger' style='margin-right: 5px; background: red !important; font-size: 14px'><i class='fas fa-trash-alt'></i> Delete</a></td>
                                              </tr>
                                               <?php
                                                    }
                                              ?>
                                            
                                        </tbody>
                                      </table>
                                        </div>
                                        
         
</body>
</html>