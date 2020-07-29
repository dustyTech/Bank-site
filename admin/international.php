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
    
    $sql2 = "SELECT * FROM reg_users where id='$client'";
    $result2 = mysqli_query($conn, $sql2);  
    $row2 = mysqli_fetch_array($result2);

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
        <title>Delete International Transaction </title>

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
  
   <div class="container-fluid table-responsive">
             <table class="table table-bordered table-sm" style="font-size: 12px;">
                 <thead style="background: #336699; color: #fff">
                  <tr>
                    <th>TRANSACTION DATE</th>
                    <th>TRANSACTION TYPE</th>
                    <th>BANK NAME</th>
                    <th>COUNTRY</th>
                    <th>SWIFT CODE</th>
                    <th>ROUTINE NUMBER</th>
                    <th>ACCOUNT NAME</th>
                    <th>ACCOUNT NUMBER</th>
                    <th>AMOUNT</th>
                    <th>STATUS</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>
                      <?php
                        $sql = "SELECT * FROM international where client_id='$client' ORDER BY id DESC";
                        $result = mysqli_query($conn, $sql);  
                        while($row = mysqli_fetch_assoc($result)) {
                            if($row['trans_type']=="debit"){
                    ?>
                    <tr style="color: #cc0000; font-weight: bold">
                    <td style="text-transform: capitalize"><?php echo $row['trans_date'];  ?></td>
                    <td style="text-transform: capitalize"><?php echo $row['trans_type'];  ?></td>
                    <td style="text-transform: capitalize"><?php echo $row['bank_name'];  ?></td>
                    <td style="text-transform: capitalize"><?php echo $row['country'];  ?></td>
                    <td style="text-transform: capitalize"><?php echo $row['swift_code'];  ?></td>
                    <td style="text-transform: capitalize"><?php echo $row['routine_no'];  ?></td>
                    <td style="text-transform: capitalize"><?php echo $row['account_name'];  ?></td>
                    <td style="text-transform: capitalize"><?php echo $row['account_number'];  ?></td>
                    <td>
                        <?php 
                              if($row2['currency']=='EURO'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&euro;".$new_seperate; 
                            }
                            else if($row2['currency']=='USD'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "$".$new_seperate; 
                            }
                            else if($row2['currency']=='GBP'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&pound;".$new_seperate; 
                            }
                            else if($row2['currency']=='AUD'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&#x41;&#x24;".$new_seperate; 
                            }
                            else if($row2['currency']=='CAD'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "$".$new_seperate; 
                            }
                            else if($row2['currency']=='CHF'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&#x43;&#x48;&#x46;".$new_seperate; 
                            }
                            else if($row2['currency']=='JYP'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&#xa5;".$new_seperate; 
                            }
                            else if($row2['currency']=='NZD'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&#x24;".$new_seperate; 
                            }  
                        ?>
                    </td>
                    <td><?php echo $row['status'];  ?></td>
                         <td> <a href='../includes/delete_international.php?del=<?php echo $client; ?>&trans_id=<?php echo $row['id']?>' type='button' class='btn btn-danger' style='margin-right: 5px; background: red !important; font-size: 14px'><i class='fas fa-trash-alt'></i> Delete</a></td>
                  </tr>
                   <?php
                            }
                    else{
                        ?> 
                    <tr style="color: #346dbf; font-weight: bold">
                        <td style="text-transform: capitalize"><?php echo $row['trans_date'];  ?></td>
                        <td style="text-transform: capitalize"><?php echo $row['trans_type'];  ?></td>
                        <td style="text-transform: capitalize"><?php echo $row['bank_name'];  ?></td>
                        <td style="text-transform: capitalize"><?php echo $row['country'];  ?></td>
                        <td style="text-transform: capitalize"><?php echo $row['swift_code'];  ?></td>
                        <td><?php echo $row['routine_no'];  ?></td>
                        <td style="text-transform: capitalize"><?php echo $row['account_name'];  ?></td>
                        <td><?php echo $row['account_number'];  ?></td>
                        <td>
                        <?php 
                              if($row2['currency']=='EURO'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&euro;".$new_seperate; 
                            }
                            else if($row2['currency']=='USD'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "$".$new_seperate; 
                            }
                            else if($row2['currency']=='GBP'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&pound;".$new_seperate; 
                            }
                            else if($row2['currency']=='AUD'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&#x41;&#x24;".$new_seperate; 
                            }
                            else if($row2['currency']=='CAD'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "$".$new_seperate; 
                            }
                            else if($row2['currency']=='CHF'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&#x43;&#x48;&#x46;".$new_seperate; 
                            }
                            else if($row2['currency']=='JYP'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&#xa5;".$new_seperate; 
                            }
                            else if($row2['currency']=='NZD'){
                                $seperate = $row['amount'];
                                $new_seperate = number_format($seperate,2); 
                               echo "&#x24;".$new_seperate; 
                            }  
                        ?>
                    </td>
                        <td><?php echo $row['status'];  ?></td>
                        <td> <a href='../includes/delete_international.php?del=<?php echo $client; ?>&trans_id=<?php echo $row['id']?>' type='button' class='btn btn-danger' style='margin-right: 5px; background: red !important; font-size: 14px'><i class='fas fa-trash-alt'></i> Delete</a></td>
                  </tr>
                   <?php
                            }
                        }
                        ?>
                </tbody>
              </table>
         </div>
         
</body>
</html>