<?php /* Smarty version 2.6.26, created on 2013-01-17 10:13:10
         compiled from login.html */ ?>
<div id="container">	
	<div id="error" class="hide"></div>
	<br />
	<div id="login">
		<h1>爱皮电商后台管理系统</h1>
		<form action="#" id="login_form" method="post">
			<div class="field">
				<label for="email">邮件地址:</label>
				<input type="text" id="email" name="email" class="input email_field" value="" />
			</div>

			<div class="field">
				<label for="passwd">密&nbsp;&nbsp;&nbsp;&nbsp;码:</label>
				<input id="passwd" type="password" name="passwd" class="input password_field" value=""/>
			</div>

			<div class="field">
				<input type="submit" name="submitLogin" value="登 &nbsp;&nbsp;录" class="button fl margin-right-5" />

				<p class="fl no-margin hide ajax-loader">
					<img src="/resources/images/loader.gif" alt="" />
				</p>

				<!-- <p class="fr no-margin">
					<a href="#" class="show-forgot-password">忘记密码?</a>
				</p> -->
				<div class="clear"></div>
			</div>
			<input type="hidden" name="redirect" id="redirect" value="node"/>
		</form>

		<form action="#" id="forgot_password_form" method="post" class="hide">
			<h2 class="no-margin">你忘记密码了吗?</h2>
			<p class="bold">请输入你的电子邮件地址获得访问访问密码。</p>

			<div class="field">
				<label>邮件地址：</label>
				<input type="text" name="email_forgot" id="email_forgot" class="input email_field" />
			</div>

			<div class="field">
				<input type="submit" name="submit" value="发&nbsp;&nbsp;送" class="button fl margin-right-5" />

				<p class="fl no-margin hide ajax-loader">
					<img src="/resources/images/loader.gif" alt=""  />
				</p>

				<p class="fr no-margin">
					<a href="#" class="show-login-form">返回登录</a>
				</p>
				<div class="clear"></div>
			</div>
		</form>
	</div>
</div>