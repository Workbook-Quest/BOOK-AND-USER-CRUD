<?php
  
  include("DBConn.php");

  $BookId = $_GET['param'];

  $sql = "DELETE FROM tblbooks WHERE BookId = $BookId";

  $result = mysqli_query($connectMyDB, $sql);

  if($result === FALSE){
      echo "There was an error: " . mysqli_connect_error();
      exit();
  }else{
      //The record has been successfully deleted
      session_start();
      $_SESSION['msg'] = "User has been successfully deleted.";
      $_SESSION['msg_type'] = "danger";
      header('location:bookListAdmin.php');
  }

  //closing the connection
  mysqli_close($connectMyDB);
  $connectMyDB = FALSE;

?>