<?php
	ob_start();
?>

<div style="float: left;width: 80%;">
<?php 
echo '<h3>Переписка с пользователем: '.$from['username'].'</h3>';
?>

<?php
	foreach ($messages as $message){
//echo '<p>'.$message['username'].':</p>';
//echo '<p>'.$message['messageText'].'</p>';
	}

?>

<table style="width:100%;">
<thead></thead>
<tbody>
<tr>
	<?php
		foreach ($messages as $message){
echo '<tr>';
			echo '<th style="width:20%;"><p style="float:left; color:blue;">'.$message['fromUserId'].':</p></th>';
			echo '<th style="width:60%;"><p style="float:left;">'.$message['messageText'].'</p></th>';
			echo '<th style="width:20%;"><p style="float:left;">'.$message['date'].'</p></th>';
	}
echo '</tr>';
?>


</tbody>
</table>



<!-- <p style="float:left; color:blue;">Marina: </p>
<p style="float:left;">Hi!</p>
<p style="float:left;">20.09.2021</p> -->
</div>


<?php
	include "view/templates/userMenu.php";
	$content = ob_get_clean();
	include "view/templates/layout.php";
?>