<!-- new view for contact-------------------------- -->
<?php ob_start() ?>

	<div class="main-container container" style="margin-top:0;">
		<ul class="header-main ">
			<li class="home"><a href="index">Home</a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
			<li>Контакт</li>
		</ul>
			
		<div class="row">
			<div id="content" class="col-sm-12" style="width:85%;">
				<div class="page-title">
					<h2>Контакт</h2>
				</div>
				<iframe src="https://maps.google.com/maps?q=johvi%20kutseh&t=&z=14&ie=UTF8&iwloc=&output=embed" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
				<div class="info-contact clearfix">
					<div class="col-lg-4 col-sm-4 col-xs-12 info-store" id="adress">
						<div class="row">
							<div class="name-store">
								<h3>Rosebud Shop</h3>
							</div>
							<address>
								<div class="address clearfix form-group">
									<div class="icon">
										<i class="fa fa-home"></i>
									</div>
									<div class="text">Jõhvi, Kutseharidusekeskus, Kutse 13</div>
								</div>
								<div class="phone form-group">
									<div class="icon">
										<i class="fa fa-phone"></i>
									</div>
									<div class="text">Phone: 0123456789</div>
								</div>
							</address>
						</div>
					</div>

					<?php
						if (!isset($message)) {
					?>
					<div class="col-lg-8 col-sm-8 col-xs-12 contact-form" id="contactForm">
						<form action="contactSend" method="post" class="form-horizontal">
							<fieldset>
								<h3>Контактная форма</h3>
								<div class="form-group required">
									<label class="col-sm-2 control-label" id="labelContact" for="input-email">Тема сообщения</label>
									<div class="col-sm-10" id="inputContact">
										<input type="text" name="subject"  id="input-subject" class="form-control" placeholder="Тема" autofocus required>
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-2 control-label" id="labelContact" for="input-name">Ваше имя</label>
									<div class="col-sm-10" id="inputContact">
										<input type="text" name="name"  id="input-name" class="form-control" placeholder="Ваше имя" autofocus required>
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-2 control-label" id="labelContact" for="input-email">Электронная почта</label>
									<div class="col-sm-10" id="inputContact">
										<input type="email" name="email"  id="input-email" class="form-control" placeholder="Электронная почта" autofocus required>
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-2 control-label" id="labelContact" for="input-enquiry">Сообщение</label>
									<div class="col-sm-10" id="inputContact">
										<textarea name="message" rows="10" id="input-enquiry" class="form-control" placeholder="Сообщение" autofocus required></textarea>
									</div>
								</div>
							</fieldset>
							<div class="buttons">
								<div class="pull-right">
									<input class="btn btn-default buttonGray" type="submit" name="send" id="submit" value="Отправить">
									</input>
								</div>
							</div>
						</form>
					</div>
					<?php
					}elseif(isset($message) && $message[0]==true) {
						echo '
							<div style="display:block; float:left;"><h3>Отправка сообщения.</h3>
							<p>Ваше сообщение отправлено. Спасибо.</p>';
						echo $message[1];
						echo '<hr><p><a href="contact">Написать сообщение</a></p></div>';
					}else{
						echo '<div style="display:block; float:left;"><h3>Сообщение об ошибке</h3>
							<p><b>Пожалуйста, исправьте следующие ошибки:</b><br>'.$message[1].'</p>
							<hr><p><a href="contact">Написать сообщение</a></p></div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>

<?php
$content = ob_get_clean();
include 'view/templates/layout.php';
?>