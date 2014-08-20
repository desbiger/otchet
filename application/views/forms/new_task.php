<? $workers = ORM::factory('Workers')
//		->where('whois', '=', '1')
		->find_all() ?>
<? $boses = ORM::factory('Workers')
//		->where('whois', '=', '2')
		->find_all() ?>

<? $projects = ORM::factory('Objects')
		->find_all() ?>
<? $project = ORM::factory('Objects', $project_id) ?>
<div class = "breadcrumbs">
	<ul>
		<li><a href = "/projects/">Проекты</a> -></li>
		<li><a href = "/projects/project/<?= $project_id ?>"><?= $project->name ?></a> -></li>
		<li>Новая задача</li>
	</ul>
</div>
<h2>Добавление новой задачи</h2>
<form action = "" method = "post" class = "horizontal_scroll" enctype = "multipart/form-data">
	<?= Form::hidden('project_id', $project_id) ?>
	<?= Form::hidden('status', 0) ?>
	<table class = "base_table">
		<tr>
			<td>Задача<?= Arr::get($errors, 'name') ? " <i>" . $errors['name'] . "</i>" : '' ?></td>
			<td>Поручить<?= Arr::get($errors, 'worker_id') ? " <i>" . $errors['worker_id'] . "</i>" : '' ?></td>
			<td>Срок</td>
			<td>Поставил задачу<?= Arr::get($errors, 'boss_of_task') ? " <i>" . $errors['boss_of_task'] . "</i>" : '' ?></td>
			<!--			<td>Примечание</td>-->
		</tr>
		<tr>
			<td><?= Form::textarea('name', Arr::get($_REQUEST, 'name')) ?><br/></td>

						<td>
				<ul class = "users_list">
					<? foreach ($workers as $worker): ?>
						<li><?= Form::checkbox("taskworker[{$worker->id}]", $worker->id) ?> <?= $worker->name ?>
							<?= $worker->secondename ?> <?= $worker->firstname ?></li>
					<? endforeach ?>
				</ul>
				<br/></td>
			<td><?= Form::input('dead_line', null, array('class' => 'date')) ?></td>
			<td><?=
					Form::select('boss_of_task', My::Obj_fore_select($boses, 'id', array(
							'name',
							'firstname'
					)), WORKER_ID) ?><br/>
			</td>

		</tr>
	</table>
	<table class = "base_table">
		<tr>
			<td>
				Примечание / подробно
			</td>
		</tr>
		<tr>
			<td><?= Form::textarea('description', Arr::get($_REQUEST, 'description'),array('class' => 'tiny')) ?><br/></td>
		</tr>

	</table>
	<?= Form::submit('sub', 'Добавить') ?>
</form>