<?php
	ob_start();
?>
	<h4 class="box-title">Page control</h4>
	<p class="text-primary">Welcome to admin panel</p>
<?php
	$content=ob_get_clean();
	include 'viewAdmin/templates/layout.php';
	