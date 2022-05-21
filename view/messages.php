<?php
	ob_start();
?>

<div style="float: left;width: 80%;">
<h1>Личные сообщения: </h1>
<ul style="list-style-type: none;">
<?php
	foreach ($conversations as $conversation){

		echo '<a href="privateMessages?id='.$conversation['idUser'].'" style="float: left; margin-left: 10px;"><li>'.$conversation['username'].'</li></a>';
	}

?>
</ul>
</div>

<?php
	include "view/templates/userMenu.php";
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>