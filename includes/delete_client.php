<?php
 include_once 'dbh.inc.php';

      //delete record
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM reg_users WHERE id=$id");
        header("Location: ../admin/admin_cpanel.php");
    }
//