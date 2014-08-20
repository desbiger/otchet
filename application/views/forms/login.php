<div class="auth">
	<h2>Авторизация</h2>

	<form action = "/login/login">
		Логин <br/>
		<?= Form::input('login', Arr::get($_REQUEST,'login')) ?> <br/><br/>
		Пароль <br/>
		<?= Form::password('pass', Arr::get($_REQUEST,'pass')) ?> <br/><br/>
		<?=Form::submit('sub','Войти')?>
	</form>
	<p>Если у вас нет логин/пароль, обратитесь к администратору ресурса.</p>
</div>