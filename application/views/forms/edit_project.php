<? $statuses = ORM::factory('ObjectStatus')
		->find_all();
	$project = ORM::factory('Objects',$id);
?>
<div>
	<div id = "add_project">
		<h2>Редактирование проекта</h2>

		<form action = "" method = "post">
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
					<td><?= Form::input('name', $project->name) ?></td>
					<td><?= Form::textarea('description',$project->description) ?></td>
					<td><?= Form::select('status', My::Obj_fore_select($statuses, 'id', 'name'),$project->status) ?></td>
				</tr>
			</table>
			<?= Form::submit('sub', 'Обновить') ?>
		</form>
	</div>
</div>