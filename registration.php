<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        *{
            text-align: center;
        }
        #regis_form,#login_form{
            text-align :center; 
        margin-top: 10%;
        margin-left: 35%;
        margin-right: 35%;
        padding: 20px;
    }
    h2{
        background-color: skyblue;
        padding: 10px;
        margin: 0;
        border-radius: 10px 10px 0 0;
    }
    table{
        width: 100%;
        height: 300px;
        padding: 20px;
        border: 1px solid skyblue;
        border-radius: 0 0 10px 10px;
    }
    input[type=text],input[type=number],input[type=password]{
        border-radius:50px;
    }
    td{
        font-size:20px;
    }
    input[type=submit]{
        width: 80%;
        height: 70%;
        border: none;
        background-color: skyblue;
        font-weight: bolder;
        font-size:15px;
        border-radius: 50px;
        padding:10px;
        cursor: pointer;
    }
    .error{
       color: red;
    }
    input[type=submit]:hover{
        background-color: rgb(76, 150, 179);
    }
    </style>
</head>
<body>
<?php
    
    $nameErr = $emailErr = $phoneErr = $passErr = "";
    $name = $email = $pass = $phone = "";

    // if method is POST then check a condition....
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $valid = true;
        
        // For Name validation....
        if (empty($_POST["name"])) {
            $valid = false;
            $nameErr = "Name is required..!";
        }
        else{
            $name = $_POST["name"];
        }

        // Email validation...
        if (empty($_POST["email"])) {
            $valid = false;
            $emailErr = "Email is required..!";
        } 
        else {
            $email = $_POST["email"];
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $valid = false;
                $emailErr = "Invalid Emial format..";
            } 
        }

        // For password validate
        if (empty($_POST["pass"])) {
            $valid = false;
            $passErr = "Password is required..!";
        }
        else {
            // password validation..
            $pass = $_POST["pass"];
            if (!preg_match('@[A-Za-z0-9]@', $pass)) {
                $valid = false;
                $passErr = "Please Enter Valid Password.";
            } 
            if (strlen($pass) < 6) {
                $valid = false;
                $passErr = "Please Enter 6 character Password.";
            }
        }

        // For Phone number validation
        if (empty($_POST["phone"])) {
            $valid = false;
             $phoneErr = "Phone number is required..!";
        }
        else {
            $phone = $_POST["phone"];
            if (strlen($phone) > 10 || strlen($phone) < 10 ) {
                $valid = false;
                $phoneErr = "Enter valid Phone number.";
            }
        }

        // check a form is valid than store data into database....
        if ($valid) {
            $unm = $_REQUEST['name'];
            $uEmail = $_REQUEST['email'];
            $uPhone = $_REQUEST['phone'];
            $uPass = $_REQUEST['pass'];

            $server = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "User";

            $conn = mysqli_connect($server,$username,$password,$dbname);

            // $sql = "CREATE DATABASE User";

            // create table.....
            // $sql = "CREATE TABLE User_data(
            //     id INT(6)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            //     username VARCHAR(30) NOT NULL,
            //     userpassword VARCHAR(10) NOT NULL,
            //     email VARCHAR(50) ,
            //     phone INT(10)
            // )";

            // if (mysqli_query($conn,$sql)) {
            //     echo "Cretaed..";
            // }else{
            //     echo mysqli_error($conn);
            // } 

            // Insert a input data into a datbase.....
            $sql = "INSERT INTO User_data(username,userpassword,email,phone)
                    VALUES('$unm','$uPass','$uEmail','$uPhone')";

                if (mysqli_query($conn,$sql)) {
                    echo "<h3>You are Registered.</h3>";
                }
                else{
                    echo "Error: " . "<br>" . $conn->error;
                }   
                header('location:login.php');
        }
    }  
?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="regis_form">
        <h2>Registration Form</h2>
        <table>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" id="uNm" value="<?php echo $name; ?>"></td>
                <td><span class="error">*</span></td>
            </tr>
            <tr>
                <td colspan="3" class="error"><?php echo $nameErr ?></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="text" name="email" id="uEmail" value="<?php echo $email; ?>"></td>
                <td><span class="error">*</span></td>
            </tr>
            <tr>
                <td colspan="3" class="error"><?php echo $emailErr ?></td>
            </tr>
            <tr>
                <td>Phone No. :</td>
                <td><input type="number" name="phone" id="uPhone" value="<?php echo $phone; ?>"></td>
                <td><span class="error">*</span></td>
            </tr>
            <tr>
                <td colspan="3" class="error"><?php echo $phoneErr?></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" name="pass" id="uPass" value="<?php echo $pass; ?>"></td>
                <td><span class="error">*</span></td>
            </tr>
            <tr>
                <td colspan="3" class="error"><?php echo $passErr ?></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Registar" name="regi_btn" ></td>
            </tr>
        </table>
    </form>
</body>
</html>