<?php

    include_once '../includes/dbh.inc.php';

    $pending = $_GET['val'];
    
    $sql = "UPDATE reg_users SET trans_status='pending' WHERE id=$pending";
    
    mysqli_query($conn, $sql);
    
    header("Location: admin_cpanel.php");
