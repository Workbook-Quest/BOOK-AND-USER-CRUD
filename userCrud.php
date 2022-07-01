<?php

    include("DBConn.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Workbook Quest</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
    <div class = "bg-image">
    <div class = "nav" id="myNav">
            <ul>                
                <li><a href="home.php">How it works</a></li>
                <li><a href="bookList.php" class = "active">Book List</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
                <li><a href="register.php" style="color:white;">Register</a></li>
                <li><a href="login.php" style="color:white;">Login</a></li>
            </ul>
        </div>
        
       <div class="top" style="height: 100px; background-color: transparent"></div>
       <div class="main" style="background-color: transparent">
       <h1 style="font-size: 40px; color: white; text-align:left">Book List</h1>
          
        <div class = "textBox" style="color: black; text-align: left; border:none">
            <button type="submit" name="submit" class="btn" style="height: 50px; width: 80px;"><img alt src="images/search_icon.jpg" style="width: 40px; height: 40px;"></button>
        </div>
        <?php
    session_start();
    if(isset($_SESSION['message'])){
        echo '<div class="alert alert-'.$_SESSION['msg_type'].'">'.$_SESSION['message'].'</div>';
        unset($_SESSION['message']);
    }
?>

    <form action="" method="POST">
        <h1 class="text-info text-center my-5">User List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">UsernameBuyer</th>
                    <th scope="col">BuyerName</th>
                    <th scope="col">BuyerSurname</th>
                    <th scope="col">BuyerEmail</th>
                    <th scope="col">BuyerPassword</th>
                    <th scope="col">StudentNumber</th>
                </tr>
            </thead>
            <?php 
                    $sql = "SELECT * FROM tblbuyer ORDER BY UsernameBuyer";

                    if($connectMyDB === FALSE){
                        echo  "DB Error - " . mysqli_connect_error();
                        exit();
                    }

                    $result = mysqli_query($connectMyDB, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                    
                        $UsernameBuyer = $row['UsernameBuyer'];
                        $BuyerName = $row['BuyerName'];
                        $BuyerSurname = $row['BuyerSurname'];
                        $BuyerEmail = $row['BuyerEmail'];
                        $BuyerPassword = $row['BuyerPassword'];
                        $StudentNumber = $row['StudentNumber'];
                        
                        
                        echo '<tbody>
                                    <tr>
                                    <td>'.$UsernameBuyer.'</td>
                                        <td>'.$BuyerName.'</td>
                                        <td>'.$BuyerSurname.'</td>
                                        <td>'.$BuyerEmail.'</td>
                                        <td>'.$BuyerPassword.'</td>
                                        <td>'.$StudentNumber.'</td>
                                    </tr>
                                </tbody>';
                    }
                    ?>
                    </table>          
          </form>
        </div>
       </div>
    </body>
</html>


