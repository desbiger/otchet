<style type = "text/css">
	.user_table tr td {
		background-color: #fafafa;
	}

	.user_table {
		border: 1px solid #e6e6e6;
		width: 100%;
	}
</style>
<h2><?= $user->firstname ?> <?= $user->name ?> <?= $user->secondename ?></h2>
<script type = "text/javascript">
	$(function(){
		$('.replace_img').click(function(){
			$('#avatar').trigger('click');
		})
	})
</script>
<style type = "text/css">
	.replace_img{
		cursor: pointer;
	}
</style>
<table class = "user_table">
	<tr>
		<td style = "width: 128px">
			<form action = "" method = "post" enctype="multipart/form-data">
			<? if ($user->avatar && file_exists($user->avatar_file->filename)): ?>
				<?$src =  My::ResizeImage($user->avatar_file->filename, '123') ?>
				<img class="replace_img"   src = "<?= $src?>" alt = ""/>
			<? else: ?>
				<img class="replace_img"  src = "/include/empty_ava.png" alt = ""/>
			<?endif ?>
				<input type="file" name="avatar" id="avatar" style="display: none">
		</td>
		<td>

				<div class = "user_about">
					<p>Имя: <span><?= Form::input('name', $user->name) ?></span></p>

					<p>Фамилия: <span><?= Form::input('firstname', $user->firstname) ?></span></p>

					<p>Отчество: <span><?= Form::input('secondename', $user->secondename) ?></span></p>

					<p>Должность: <span><?= Form::input('dolzhnost', $user->dolzhnost) ?></span></p>

					<p>Дата рождения: <span><?= Form::input('berthday', $user->berthday, array('class' => 'date')) ?></span></p>

					<p>Электронная почта: <span><?= Form::input('email', $user->user->email) ?></span></p>

					<p>Телефон: <span><?= Form::input('phone', $user->phone) ?></span></p>

					<p>Город: <span><?= Form::input('city', $user->city) ?></span></p>

					<p>Пол: <span><?= Form::input('sex', $user->sex) ?></span></p>
				</div>
				<p><?= Form::submit('update', 'Обновить данные') ?></p>
			</form>
		</td>
		<td>
			<form action = "" method = "post">
				<div class = "user_about">
					<p>

					<h2>Смена пароля</h2></p>
					<i><?= Arr::get($errors, 'password') ?></i>

					<p>Новый пароль <span><?= Form::password('new_password') ?></span></p>
					<i><?= Arr::get($errors, 'password_confirm') ?></i>

					<p>Новый пароль еще раз<span><?= Form::password('new_password_confirm') ?></span></p>

					<p><?= Form::submit('change_pass', 'Сменить пароль') ?></p>
				</div>
			</form>
		</td>
	</tr>
</table>

<div class = "record"></div>
