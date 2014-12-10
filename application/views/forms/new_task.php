<? $workers = ORM::factory('Workers') //		->where('whois', '=', '1')
		->find_all() ?>
<? $boses = ORM::factory('Workers') //		->where('whois', '=', '2')
		->find_all() ?>

<? $projects = ORM::factory('Objects')
		->find_all() ?>
<? $project = ORM::factory('Objects', $project_id) ?>
<? $client = ORM::factory('Clients', ORM::factory('Objects', $project_id)->client_id) ?>
<?$path = array(
		'/' => 'Главная',
		"/clients/client/$client->id" => $client->name,
		"/clients/client/$client->id/$project->id" => $project->name,
		'Новая задача'
)?>
<?=
	View::factory('menus/breadcrumbs')
			->bind('nodes', $path) ?>
<h2>Добавление новой задачи</h2>
<form action="" method="post" class="horizontal_scroll" enctype="multipart/form-data">
	<?= Form::hidden('project_id', $project_id) ?>
	<?= Form::hidden('status', 0) ?>
	<table class="base_table">
		<tr>
			<td colspan="2">Основные данные по задаче</td>
		</tr>
		<tr>
			<td>Задача<?= Arr::get($errors, 'name') ? " <i>" . $errors['name'] . "</i>" : '' ?></td>
			<td style="vertical-align: top"><?= Form::input('name', Arr::get($_REQUEST, 'name'), array('style' => 'width:100%')) ?><br/>
			</td>
		</tr>
		<tr>
			<td>Поручить<?= Arr::get($errors, 'worker_id') ? " <i>" . $errors['worker_id'] . "</i>" : '' ?></td>
			<td>

				<ul class="users_list">
					<? foreach ($workers as $worker): ?>
						<li><?= Form::checkbox("taskworker[{$worker->id}]", $worker->id) ?> <?= $worker->name ?>
							<?= $worker->secondename ?> <?= $worker->firstname ?></li>
					<? endforeach ?>
				</ul>
				<br/>
			</td>
		</tr>
		<tr>
			<td>Дата сдачи</td>
			<td><?= Form::input('dead_line', null, array('class' => 'date')) ?></td>
		</tr>
		<tr>
			<td>Поставил задачу<?= Arr::get($errors, 'boss_of_task') ? " <i>" . $errors['boss_of_task'] . "</i>" : '' ?></td>
			<td><?=
					Form::select('boss_of_task', My::Obj_fore_select($boses, 'id', array(
							'name',
							'firstname'
					)), WORKER_ID) ?><br/>
			</td>
		</tr>
		<tr>
			<td>Прикрепить</td>
			<td>
				<?= Form::file('file1') ?><br>
				<?= Form::file('file2') ?><br>
				<?= Form::file('file3') ?><br>
				<?= Form::file('file4') ?><br>
				<?= Form::file('file5') ?><br>
				<?= Form::file('file6') ?><br>
				<?= Form::file('file7') ?><br>
			</td>
		</tr>
	</table>
	<table class="base_table">
		<tr>
			<td>
				Примечание / подробно
			</td>
		</tr>
		<tr>
			<td><?= Form::textarea('description', Arr::get($_REQUEST, 'description'), array('class' => 'tiny')) ?><br/></td>
		</tr>

	</table>
	<?= Form::submit('sub', 'Добавить') ?>
</form>