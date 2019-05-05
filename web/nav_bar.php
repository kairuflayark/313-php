<?php
	$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);?>

	<nav class="navbar navbar_expand-sm bg-dark navbar-dark">
		<a href="home_page.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibeNavbar">
			<span class="navbar-toggler-icon"></span>
		</button> 
		<div class="collapse navbar-collapse" id="collapsibeNavbar">
			<ul class="navbar_nav">
				<li class="nav-item <?php if ($page === 'assignments') {echo 'active';} ?>">
					<a class="nav-link" href="assignments.php"> assignments</a>
				</li>
			</ul>
	</nav>
