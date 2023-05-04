<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    input[type=text],input[type=password]{
        border-radius:50px;
    }
    td{
        font-size:20px;
    }
    input[type=submit]{
        width: 80%;
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
    <form action="login_info.php" method="post" id="login_form">
        <h2>Login Form</h2>
        <table>
            <tr>
                <td><span class="error">*</span> Username :</td>
                <td> <input type="text" name="loguser" id="logUser" required></td>
            </tr>
            <tr>
                <td><span class="error">*</span> Password :</td>
                <td><input type="password" name="logpass" id="logPass" required></td>
            <tr>
                <td colspan="2"><input type="submit" value="Log in" ></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>