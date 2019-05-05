<?php
	$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);?>

	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header <?php if ($page === 'home_page') {echo 'active';}?>">
      			<a class="navbar-brand" href="home_page.php">Home</a>
    		</div>
		    	<ul class="nav navbar-nav">
		      		<li <?php if ($page === 'assignments') {
		      		echo 'class="active"';} ?>>
		      			<a href="assignments.php">Assignments</a></li>
		    </ul>
	  	</div>
	</nav>
