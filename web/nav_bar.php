<?php
	$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);?>

	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="home_page.php">Home</a>
    		</div>
		    <ul class="nav navbar-nav">

		      <li <?php if ($page === 'assignments') {
		      	echo 'class="active"';} ?>><a href="Assignments.php">Assignments</a></li>
		    </ul>
	  </div>
</nav>
	</nav>
	<?php echo $page; ?>