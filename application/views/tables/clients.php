<? $clients = ORM::factory('Clients')
		->find_all(); ?>
<h2><?= $name ?></h2>
<a href="#add_client" class="fancy plus" title="Добавить клиента"></a>
<table class="base_table">
	<tr>
		<td>
			Компания / клиент
		</td>
		<td>
			Описание
		</td>
		<td>
			Правка
		</td>
	</tr>
	<? foreach ($clients as $vol): ?>
		<? if (Acl::CheckClientAccess($vol->id)): ?>
			<tr>
				<td>
					<a href="/clients/client/<?= $vol->id ?>"><?= $vol->name ?></a></td>
				<td><?= $vol->description ?></td>
				<td><a href="/clients/edit/<?= $vol->id ?>">Редактировать</a></td>
			</tr>
		<? endif ?>
	<? endforeach ?>
</table>

<?= View::factory('forms/new_client') ?>
