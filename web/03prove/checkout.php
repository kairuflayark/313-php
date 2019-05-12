<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src=script.js></script>
</head>
<body>
<div class="jumbotron text-center">
		<h1> Blender Heaven </h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<p>Checkout <br> Please Enter your Address</p>
			</div>
			<form>
				<div class='col-sm-4'>
					<form action="confirmation.php" method="post">
						<label>First Name:</label>
							<input type="text" name="fName" onchange="update_session_value(this.name, this.value)"><br>
						<label>Last Name:</label>
							<input type="text" name='lName' onchange="update_session_value(this.name, this.value)"><br>
						<label>Street Address:</label>
							<input type="text" name='street' onchange="update_session_value(this.name, this.value)"><br>
						<label>City:</label>
							<input type="text" name="city" onchange="update_session_value(this.name, this.value)"><br>
						<label>State:</label>
							<input type="text" name='state' maxlength="2" onchange="update_session_value(this.name, this.value)"><br>
						<label>Zip Code:</label>
							<input type="text" name='zCode' onchange="update_session_value(this.name, this.value)"><br>
						<button type="submit" name="submit" value = "true" onchange="update_session_value(this.name, this.value)">Finalize your Order</button>
					</form>
					<a href="view_cart.php"><button type="button">Return to Cart</button></a>
</body>
</html>