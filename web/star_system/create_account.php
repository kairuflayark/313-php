<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>
</head>
<body>
    <h1>Sign up for new account</h1>


    <form action="handle_new.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password">
    <label for="permissions"><br>Permissions</label>
    <select name="permissions">
        <option value="c">Create & Delete</option>
        <option value="u">Update</option>
        </select>
        <br>
    <input type="submit" value="Submit">
    </form>




</body>
</html>