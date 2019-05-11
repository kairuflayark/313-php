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
<?php 
		$_SESSION['blenders'] = array("Binastone", "Ninja", "Electrolux", "Philips");
		foreach ($_SESSION['blenders'] as $value){
			if (isset($_GET["$value"])){
				$_SESSION["$value"] = false;

			}
		}
	?>
	<div class="jumbotron text-center">
		<h1> Blender Heaven </h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h1>View Your Cart</h1>
			</div>
			<div class='col-sm-4'>
				<?php 				
				foreach ($_SESSION['blenders'] as $value){
					if ($_SESSION["$value"] == true){
					echo "<div class='item row'>";
					echo "<button type='button'><img src='$value.jpg' class='img-fluid float-left'>";
					echo	"<h3>$value Blender</h3>";
					echo	"<a  href='view_cart.php?$value=false'>Remove from Cart</a></button>";
					echo "</div>";
					}
				?>
				<div class='item'>
					<button type="button" href="browse_items.php">Return to Shopping</button>
					<button type="button" hred="checkout.php">Continue to Checkout</button>
				</div>
					
			</div>
			
		</div>
	</div>
</body>
</html>