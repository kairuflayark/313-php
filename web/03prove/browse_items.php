<?php session_start(); ?>

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
	<script type="text/javascript" src=script.js></script>
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
			<form>
				<div class='col-sm-6'>
				<?php 
				$blenders = array("Binastone", "Ninja", "Electrolux", "Philips");
				$_SESSION['Blenders'] = $blenders;
				foreach ($_SESSION['Blenders'] as $value){
					echo "<div class='item row'>";
					echo "<div><img src='$value.jpg' class='img-fluid float-left'></div>";
					echo	"<div><h3>$value Blender</h3>";
					echo "<label>Quantity</label><select name='$value' id='$value' onchange= 'update_session_value(this.id, this.value)'>";
					echo	"<option value='0'>0</option>";
					echo	"<option value='1'>1</option>";
					echo	"<option value='2'>2</option>";
					echo	"<option value='3'>3</option>";
					echo	"<option value='4'>4</option>";
					echo	"<option value='5'>5</option></select></div></div>";
				}
				?>
					<div class='item'>
						<a href="view_cart.php">View Cart</a>
					</div>
				</div>
			</form>
		</div>
	</div>


</body>
</html>