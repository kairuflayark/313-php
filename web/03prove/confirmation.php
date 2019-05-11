<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
		function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
		}
	?>

<div class="jumbotron text-center">
		<h1> Blender Heaven </h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<p>Checkout <br> Please Enter your Address</p>
			</div>
			<div class="col-sm-4">
			<h2>Shipped To</h2>
			<p>
			<?php
			foreach ($_SESSION['blenders'] as $value){
					if ($_SESSION["$value"] == true){
					echo 	"<div class='item row'>";
					echo 	"<a  href='view_cart.php?$value=false'><button type='button'><img src='$value.jpg' class='img-fluid float-left'>";
					echo	"<h3>$value Blender</h3>";
					echo	"Remove from Cart</button></a>";
					echo 	"</div>";
					}
				}
					?>
			<h2> Items to be shipped</h2>
			<?php
				foreach ($_SESSION['blenders'] as $value){
					if ($_SESSION["$value"] == true){
					echo 	"<div class='item row'>";
					echo 	"<img src='$value.jpg' class='img-fluid float-left'>";
					echo	"<h3>$value Blender</h3>";
					echo 	"</div>";
					}
				}

			?>


</body>
</html>