<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Please sign up!</h1>

<form onsubmit="sign_in(document.getElementById('username').value, document.getElementById('password1').value, document.getElementById('password2').value )">
    <label for="username">Username: </label><input type="text" name="username">
    <br>
    <label for="password1">Password: </label> <input type="password" name="password1">
    <br>
    <label for="password2">Confirm Password: </label> <input type="password" name="password3">
    <input type="submit" value="sign up">
</form>


</body>
</html>