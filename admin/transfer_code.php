<?php
    include_once '../includes/dbh.inc.php';

    $transfer_code = $_GET['val'];
    
    $sql = "UPDATE reg_users SET trans_status='transfer code' WHERE id=$transfer_code";
    
    mysqli_query($conn, $sql);
    
    header("Location: admin_cpanel.php");


