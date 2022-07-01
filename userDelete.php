<?php
  
  include("DBConn.php");

  $UsernameBuyer = $_GET['param'];

  $sql = "DELETE FROM tblbuyer WHERE UsernameBuyer = $UsernameBuyer";

  $result = mysqli_query($connectMyDB, $sql);

  if($result === FALSE){
      echo "There was an error: " . mysqli_connect_error();
      exit();
  }else{
      //The record has been successfully deleted
      session_start();
      $_SESSION['msg'] = "User has been successfully deleted.";
      $_SESSION['msg_type'] = "danger";
      header('location:booklistAdmin.php');
  }

  //closing the connection
  mysqli_close($connectMyDB);
  $connectMyDB = FALSE;

?>