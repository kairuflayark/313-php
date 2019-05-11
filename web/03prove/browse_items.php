<!DOCTYPE html>
<html>
<head>
	<title>Blender Heaven</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="jumbotron text-center">
		<h1> Blender Heaven </h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<p>sidebar <br> Find your stuff here</p>
			</div>
			<form action="checkout.php" method="get">
				<div class='col-sm-6'>
				<?php 
				$blenders = array("Binastone", "Ninja", "Electrolux", "Philips");
				foreach ($blenders as $value){
					echo "<div class='item'>";
					echo "<img src='$value.jpg' class='img-fluid float-left'>";
					echo	"<h3>$value Blender</h3>";
					echo "<label>Quantity</label><select name='$value'>";
					echo	"<option value='0'>0</option>";
					echo	"<option value='1'>1</option>";
					echo	"<option value='2'>2</option>";
					echo	"<option value='3'>3</option>";
					echo	"<option value='4'>4</option>";
					echo	"<option value='5'>5</option></select></div>";
				}
				?>
					<div class='item'>
						<button type="submit">Submit Order</button>
					</div>
				</div>
			</form>
		</div>
	</div>


</body>
</html>