<?php
    include("DBConn.php");

    $errorCount = 0;
    $name_error = $auth_error = $descrip_error = $stNum_error = $msg_error = $qual_error = $stock_error = $price_error = "";
    $name= $auth = $descrip = $msg = $stNum = $qual = $price = $stock ="";

    /*$BookId = $_GET['param'];//Only used in update book.

    $sql = "SELECT * FROM tblbooks WHERE BookId =  $BookId";

    if($connectMyDB === FALSE)
    {
        echo "Error - " . mysqli_connect_error();
        exit();
    }

    $dbResult = mysqli_query($connectMyDB, $sql);

    $row = mysqli_fetch_assoc($dbResult);

    $name = $row['BookTitle'];
    $auth = $row['BookAuthor'];
    $descrip = $row['Description'];
    $stNum = $row['UsernameSeller'];
    $qual = $row['Quality'];
    $price= $row['Price'];
    $stock = $row['Stock'];*/
  
    if(isset($_POST["add"])){
        if(empty($_POST['bookName'])){
            $name_error = "Please insert the book title.";
            $errorCount++;
        }else{

            $name = $_POST['bookName'];
        }

        if(empty($_POST['bookAuthor'])){
            $auth_error = "Please insert the book author.";
            $errorCount++;
        }else{
            $auth = $_POST['bookAuthor'];
        }

        if(empty($_POST['quality'])){
            $qual_error = "Please insert book quality.";
            $errorCount++;
        }else{
            $qual = $_POST['quality'];
        }

        if(empty($_POST['description'])){

            $descrip_error = "Please insert book description.";
            $errorCount++;
        }else{
            $descrip = $_POST['description'];
        }
        if(empty($_POST['Price'])){
            $price_error = "Please insert email address";
            $errorCount++;
        }else{
            $price = $_POST['Price'];
        }

        if(empty($_POST['stock'])){

            $stock_error = "Please insert book stock.";
            $errorCount++;
        }else{
            $stock = $_POST['stock'];
        }

        if(empty($_POST['num'])){

            $stNum_error = "Please insert student number who is selling.";
            $errorCount++;
        }else{
            $stNum = $_POST['num'];
        }


        if($errorCount == 0)
        {

            $img = "jpg";

            $sql = "INSERT INTO tblbooks(BookId,BookTitle,Image,BookAuthor,Quality,Description,Price,Stock,UsernameSeller)
                    VALUES('$stNum','$name','$img','$auth','$qual','$descrip','$price','$stock','$stNum')";

                    /* $BookId= $row['BookId']; //Just to see what table columns are called.
                    $BookTitle = $row['BookTitle'];
                   // $Image = $row['Image'];
                    $BookAuthor= $row['BookAuthor'];
                    $Quality = $row['Quality'];
                    $Description= $row['Description'];
                    $Price= $row['Price'];
                    $Stock = $row['Stock'];
                    $UsernameSeller = $row['UsernameSeller'];*/                        

        //executing the query
        $dbResult = mysqli_query($connectMyDB, $sql);

        if ($dbResult === FALSE) 
        {
            echo "Error inserting details into the database: ". mysqli_connect_error();
        } 
        else 
        { 
            session_start();
            $_SESSION['msg'] = "User has been successfully updated.";
            $_SESSION['msg_type'] = "warning";
            header('location:bookListAdmin.php');
        }

            //closing the connection
            mysqli_close($connectMyDB);
            $connectMyDB = FALSE;
        }
        unset($_POST["submit"]);
    }


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
    <div class="container">  
        <form action="" method="POST">
            <h1 style="color:white;">Add Book</h1>
            <div class="reg">
                <label for="Name" class="formLabel">Book Name</label>
                <input type="text" class="formtext" name="bookName" value="<?php echo $name; ?>"/>
            </div>
            <div class="reg">
                <label for="author" class="formLabel">Book Author</label>
                <input type="text" class="formtext" name="bookAuthor" value="<?php echo $auth; ?>"/>
            </div>
            <div class="reg">
                <label for="bkQual" class="formLabel">Book Quality</label>
                <input type="text" class="formtext" name="quality" value="<?php echo $qual; ?>"/>
            </div>
            <div class="reg">
                <label for="descrip" class="formLabel">Book Description</label>
                <input type="text" class="formtext" name="description" value="<?php echo $descrip; ?>"/>
            </div>
            <div class="reg">
                <label for="pri" class="formLabel">Book Price</label>
                <input type="text" class="formtext" name="Price" value="<?php echo $price; ?>"/>
            </div>
            <div class="reg">
                <label for="stck" class="formLabel">Book Stock</label>
                <input type="text" class="formtext" name="stock" value="<?php echo $stock; ?>"/>
            </div>
            <div class="reg">
                <label for="sell" class="formLabel">Book Seller</label>
                <label for="stNum" class="formLabel">(Student number)</label>
                <input type="text" class="formtext" name="num" value="<?php echo $stNum; ?>"/>
            </div>
            <div class="reg">
            <button type="submit" name="add" class="btn" style="color:white; line-height:1.6; margin-left:420px;">Add</button>
            </div>
        </form>
</div>
</div>
</body>
</html>