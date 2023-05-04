<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
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