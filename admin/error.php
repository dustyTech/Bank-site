<?php

    include_once '../includes/dbh.inc.php';

    $error = $_GET['val'];
    
    $sql = "UPDATE reg_users SET trans_status='dormant' WHERE id=$error";
    
    mysqli_query($conn, $sql);
    
    header("Location: admin_cpanel.php");
