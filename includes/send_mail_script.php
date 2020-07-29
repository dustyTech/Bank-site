 <?php
    include_once 'dbh.inc.php';
    
    
    /*     delete record    */
    if (isset($_GET['delContact'])) {
        $id = $_GET['delContact'];
        mysqli_query($conn, "DELETE FROM contact_us WHERE id=$id");
        header("Location: ../admin/contact_mail.php");
    }
     
      
     /*  retrieve client details from data base  */
     $sqlRetrieve = 'SELECT * FROM contact_us';
     $result = mysqli_query($conn, $sqlRetrieve);
     $resultChecker = mysqli_num_rows($result);
   
    
    
    
  ?>