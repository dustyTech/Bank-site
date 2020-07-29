<?php
    include_once '../includes/dbh.inc.php';

    $complete = $_GET['val'];
    
    $sql = "UPDATE reg_users SET trans_status='active' WHERE id=$complete";
    
    mysqli_query($conn, $sql);
    
    header("Location: admin_cpanel.php");


