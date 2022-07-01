<?php
    include("DBConn.php");

    $errorCount = 0;
    $name_error = $surname_error = $email_error = $stdNum_error = $msg_error = $pwd_error = "";
    $name = $surname = $email = $msg = $stdNum = $pwd ="";

    $UsernameBuyer = $_GET['param'];

    $sql = "DELETE FROM tblbuyer WHERE UsernameBuyer = $UsernameBuyer";

    if($connectMyDB === FALSE)
    {
        echo "Error - " . mysqli_connect_error();
        exit();
    }

    $dbResult = mysqli_query($connectMyDB, $sql);

    $row = mysqli_fetch_assoc($dbResult);

    $name = $row['BuyerName'];
    $surname = $row['BuyerSurname'];
    $email = $row['BuyerEmail'];
    $pwd = $row['BuyerPassword'];
    $stdNum = $row['StudentNumber'];
  
    if(isset($_POST["addUser"]))
    {
        if(empty($_POST['userName']))
        {
            $name_error = "Please insert the user name.";
            $errorCount++;
        }
        else
        {

            $name = $_POST['userName'];
        }

        if(empty($_POST['userLstName']))
        {
            $surname_error = "Please insert the user surname.";
            $errorCount++;
        }
        else
        {
            $surname = $_POST['userLstName'];
        }

        if(empty($_POST['userEmail']))
        {
            $email_error = "Please insert the user's email.";
            $errorCount++;
        }
        else
        {
            $email = $_POST['userEmail'];
        }

        if(empty($_POST['userPwd']))
        {

            $pwd_error = "Please insert the user's password.";
            $errorCount++;
        }
        else
        {
            $pwd = $_POST['userPwd'];
        }

        if(empty($_POST['userStdNum']))
        {
            $stdNum_error = "Please insert student number.";
            $errorCount++;
        }
        else
        {
            $stdNum = $_POST['userStdNum'];
        }

        if($errorCount == 0)
        {
            //Update tblbooks.
            $sql = "UPDATE tblbuyer
                    SET BuyerName = '$name',
                    BuyerSurname = '$surname',
                    BuyerEmail = '$email',
                    BuyerPassword = '$pwd',
                    StudentNumber = '$stdNum'
                    WHERE UsernameBuyer = $UsernameBuyer";                        

        //executing the query
        $dbResult = mysqli_query($connectMyDB, $sql);

        if ($dbResult === FALSE) 
        {
            echo "Error updating details into the database: ". mysqli_connect_error();
        } 
        else 
        { 
            session_start();
            $_SESSION['msg'] = "User has been successfully updated.";
            $_SESSION['msg_type'] = "warning";
            header('location:booklistAdmin.php');
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
            <h1 style="color:white;">Update User</h1>
            <div class="reg">
                <label for="nameLb" class="formLabel">User Name</label>
                <input type="text" class="formtext" name="userName" value="<?php echo $name; ?>"/>
            </div>
            <div class="reg">
                <label for="surnameLb" class="formLabel">Buyer Surname</label>
                <input type="text" class="formtext" name="userLstName" value="<?php echo $surname; ?>"/>
            </div>
            <div class="reg">
                <label for="emailLb" class="formLabel">Buyer Email</label>
                <input type="email" class="formtext" name="userEmail" value="<?php echo $email; ?>"/>
            </div>
            <div class="reg">
                <label for="pwdLb" class="formLabel">Buyer Password</label>
                <input type="text" class="formtext" name="userPwd" value="<?php echo $pwd; ?>"/>
            </div>
            <div class="reg">
                <label for="stNumLb" class="formLabel">Student Number</label>
                <input type="text" class="formtext" name="userStdNum" value="<?php echo $stdNum; ?>"/>
            </div>
            <div class="reg">
            <button type="submit" name="update" class="btn" style="color:white; line-height:1.6; margin-left:420px;">Update</button>
            </div>
        </form>
</div>
</div>
</body>
</html>