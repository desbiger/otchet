
<div style="display: none">
	<div id="add_client">
		<h2>Добавление нового клиента</h2>

		<form action = "/clients/" method = "post">
			<table>
				<tr>
					<td>Компания / клиент<?=
							Arr::get($errors, 'name') ? " <br><i>" . $errors['name'] . "</i>" : ''
						?></td>
					<td>Описание<?=
							Arr::get($errors, 'description') ? " <br><i>" . $errors['description'] . "</i>" : '' ?></td>
				</tr>
				<tr>
					<td><?= Form::input('name', Arr::get($_POST, 'name')) ?></td>
					<td><?= Form::textarea('description', Arr::get($_POST, 'description')) ?></td>

				</tr>
			</table>
			<?= Form::submit('sub', 'Добавить') ?>
		</form>
	</div>
</div>