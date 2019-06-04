<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Please sign in</h1>
<form onsubmit="sign_in(document.getElementById('username').value, document.getElementById('password1').value)">
    <label for="username">Username: </label><input type="text" name="username" id="username">
    <br>
    <label for="password1">Password: </label> <input type="password" name="password1" id="password1">
    <input type="submit" value="sign in" >
</form>
</body>
</html>