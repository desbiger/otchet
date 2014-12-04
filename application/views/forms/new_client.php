<? $statuses = ORM::factory('ObjectStatus')
		->find_all() ?>
<div style = "display: none">
	<div id = "add_project">
		<h2>Добавление нового проекта</h2>

		<form action = "/projects/" method = "post">
			<table>
				<tr>
					<td>Название проекта<?=
							Arr::get($errors, 'name') ? " <br><i>" . $errors['name'] . "</i>" : ''
						?></td>
					<td>Описание проекта<?=
							Arr::get($errors, 'description') ? " <br><i>" . $errors['description'] . "</i>" : '' ?></td>
					<td>
						Статус проекта<?= Arr::get($errors, 'status') ? " <br><i>" . $errors['status'] . "</i>" : '' ?>
					</td>
				</tr>
				<tr>
					<td><?= Form::input('name', Arr::get($_POST, 'name')) ?></td>
					<td><?= Form::textarea('description', Arr::get($_POST, 'description')) ?></td>
					<td><?=Form::select('status',My::Obj_fore_select($statuses,'id','name'))?></td>
				</tr>
			</table>
			<?= Form::submit('sub', 'Добавить') ?>
		</form>
	</div>
</div>