<?php

 include_once 'dbh.inc.php';
session_start();
 

      //delete record
        if (isset($_GET['del'] )&& isset($_GET['trans_id'])) {
         $id = $_GET['del'];
        $trans_id = $_GET['trans_id'];
     
    mysqli_query($conn, "DELETE FROM pending_transaction WHERE client_id='$id' AND id='$trans_id'");
    header("Location: ../admin/pending_transaction.php?client=".$id);
    }
