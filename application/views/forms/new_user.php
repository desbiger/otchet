<? $statuses = ORM::factory('WorkerWhois')
		->find_all() ?>
<h2>Добавление нового пользователя</h2>
<form action = "" method = "post">
	<table>
		<tr>
			<td>Фамилия</td>
			<td>Имя<?=
					Arr::get($errors, 'name') ? " <i>" . $errors['name'] . "</i>" : '' ?></td>
			<td>Отчество</td>
			<td>Email<?=
								Arr::get($errors, 'email') ? " <i>" . $errors['email'] . "</i>" : '' ?></td>
			<td>Пароль<?=
								Arr::get($errors, 'password') ? " <i>" . $errors['password'] . "</i>" : '' ?></td>
			<td>Статус</td>
		</tr>
		<tr>
			<td><?= Form::input('firstname', Arr::get($_POST, 'firstname')) ?></td>
			<td><?= Form::input('name', Arr::get($_POST, 'name')) ?> </td>
			<td><?= Form::input('secondename', Arr::get($_POST, 'secondename')) ?></td>
			<td><?= Form::input('email', Arr::get($_POST, 'email')) ?></td>
			<td><?= Form::input('password', Arr::get($_POST, 'password')) ?></td>
			<td><?= Form::select('status', My::Obj_fore_select($statuses, 'id', 'name'), Arr::get($_POST, 'status')) ?></td>
		</tr>
	</table>
	<?= Form::submit('sub', 'Добавить') ?>
</form>
