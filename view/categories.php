<?php
	foreach ($categories as $value){
		
			echo '<li class="">
			<p class="close-menu"></p>';
			echo "<a href='category?id=".$value['idCategory']."' class='clearfix menu1'>";
				echo "<strong>".$value['categoryName']."</strong>
				<span class='label'></span>
				</a></li>";
	}
?>