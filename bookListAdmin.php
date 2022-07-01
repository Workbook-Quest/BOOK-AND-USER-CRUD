<?php

    include("DBConn.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Workbook Quest</title>
        <link rel="styleSheet" type="text/css" href="styles.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
    <div class = "bg-image">
    <div class = "nav" id="myNav">
            <ul>                
                <li><a href="workbookQuest.php" >How it works</a></li>
                <li><a href="bookListAdmin.php"  class = "active">Book List</a></li>
                <li><a href="contactUsLoggedIn.php">Contact Us</a></li>
                <li><a href="wishlist.php">Wishlist</a></li>
                <li><a href="accountAdmin.php">Account</a></li>
                <li><a href="logOut.php" style = "color: white;">Log Out</a></li>
                <li><a href="cart.php" style="background:red;"><img alt src="images/cart.png" style="width: 40px; height: 40px;"></a></li>
            </ul>
        </div>
        
       <div class="top" style="height: 100px; background-color: transparent"></div>
       <div class="main" style="background-color: transparent">
       <h1 style="font-size: 40px; color: white; text-align:left">Book list</h1>

       <?php
        session_start();
        if(isset($_SESSION['msg']))
        {
            echo '<div style="color: white;'.$_SESSION['msg_type'].'">'.$_SESSION['msg'].'</div>';
            unset($_SESSION['msg']);
        }
    ?>

       <form action = "" method = "POST">
        <button type="submit" name="create" class="btn" style="margin-left:40px;"><a href="AddBook.php" class="text-light" style="color: white; ">Add a book</a></button>
        <table class = "table" style="color: white; border: none; margin-left:40px; margin-top:10px; line-height:1.6;">
            <thread>
                <tr style="color: white;">
                    <th scope = "col">BookId</th>
                    <th scope = "col">BookTitle</th>
                    <!--h scope = "col">Image</th-->
                    <th scope = "col">BookAuthor</th>
                    <th scope = "col">Quality</th>
                    <th scope = "col">Description</th>
                    <th scope = "col">Price</th>
                    <th scope = "col">Stock</th>
                    <th scope = "col">UsernameSeller</th>
                </tr>
            </thread>

            <?php

                $sql = "SELECT * FROM tblbooks ORDER BY BookId";

                if($connectMyDB === FALSE)
                {
                    echo "Database error - " . mysqli_connect_error();
                    exit();
                }

                $theResult = mysqli_query($connectMyDB, $sql);

                while($row = mysqli_fetch_assoc($theResult))
                {
                    $BookId= $row['BookId'];
                    $BookTitle = $row['BookTitle'];
                   // $Image = $row['Image'];
                    $BookAuthor= $row['BookAuthor'];
                    $Quality = $row['Quality'];
                    $Description= $row['Description'];
                    $Price= $row['Price'];
                    $Stock = $row['Stock'];
                    $UsernameSeller = $row['UsernameSeller'];
                        
                        echo '<tbody>
                                    <tr>
                                        <th scope="row">'.$BookId.'</th>
                                        <td>'.$BookTitle.'</td>
                                        <td>'.$BookAuthor.'</td>
                                        <td>'.$Quality.'</td>
                                        <td>'.$Description.'</td>
                                        <td>'.$Price.'</td>
                                        <td>'.$Stock.'</td>
                                        <td>'.$UsernameSeller.'</td>
                                        <td><button type="submit"name="submit" class="btn"><a href="updateBooks.php?param='.$BookId.'" class="text-light" style="color: white;">Update</a></button>&nbsp;&nbsp;<button type="submit" name="submit" class="btn"><a href="deleteBooks.php?param='.$BookId.'" class="text-light" style="color: white;">Delete</a></button></td>
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

