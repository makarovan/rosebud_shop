<aside class="col-sm-3 hidden-xs" id="column-right" style="float: left; width: 20%;">
	<h3 class="subtitle">Личный кабинет</h3>
	<div class="list-group">
		<ul class="list-item">
			<li><a href="my_account">Личный кабинет</a></li>
			<li><a href="editUser">Изменить данные</a></li>
			<li><a href="changeRole">Изменить роль</a>
			<li><a href="changePass">Изменить пароль</a>
			<li><a href="messages">Личные сообщения</a></li>
			<!-- <li><a href="wishlist.html">Wish List</a></li>-->
			<li><a href="myOrders">Мои покупки</a></li>
			<br><hr>
			<h3>Кабинет продавца</h3>
			<?php
				if ($_SESSION['role'] == 3){
					echo '<li><a href="my_products">Мои товары</a></li>
					<li><a href="add_product">Добавить товар</a></li>
					<li><a href="orders">Мои продажи</a></li>';
				}
				else{}
			?>
		</ul>
	</div>
</aside>