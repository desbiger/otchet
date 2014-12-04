<style type="text/css">
	.base_table {
		margin-top: 10px;
	}
</style>
<? $project_statuses = ORM::factory('ObjectStatus')
		->find_all() ?>
<h2>Список проектов клиента
	<i class="project" style="float: right"></i>
</h2>
<a href="#add_project" class="fancy plus" title="Добавить проект"></a>
<div class="tabs">
	<ul class="tabNavigation">
		<? foreach ($project_statuses as $p_s): ?>
			<li>
				<a href="#project<?= $p_s->id ?>"><?= $p_s->name ?></a>
			</li>
		<? endforeach ?>
	</ul>
	<? foreach ($project_statuses as $p_s): ?>
		<div id="project<?= $p_s->id ?>">
			<table class="base_table">
				<tr>
					<td>Название объекта</td>
					<td>Статус проекта</td>
					<td>Описание объекта</td>
					<td>Ваших задач в работе</td>
					<td>Правка</td>
				</tr>
				<? $objects = ORM::factory('Objects')
						->where('status', '=', $p_s->id)
						->where('client_id', '=', $client_id)
						->order_by('name')
						->find_all()?>
				<? foreach ($objects as $vol): ?>
					<?$tasks = ORM::factory('Tasks')
							->join('task_workers')
							->on('task_workers.tasks_id', '=', 'tasks.id')
							->where('task_workers.worker_id', '=', WORKER_ID)
							->where('status', '=', 2)
							->where('project_id', '=', $vol->id)
							->find_all();?>
					<tr <?= $tasks->count() ? "class='blue'" : '' ?>>
						<td style="font-weight: bold; font-size: 14px"><a href="/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a>
						</td>
						<td><?= $vol->stat->name ?></td>
						<td><?= $vol->description ?></td>
						<td style="text-align: center"><?= $tasks->count() ?></td>
						<td><a href="/projects/edit/<?= $vol->id ?>" rel="edit"></a></td>
					</tr>
				<? endforeach ?>
			</table>
		</div>
	<? endforeach ?>
	<div id="pod">
		<table class="base_table">
			<tr>
				<td>Название объекта</td>
				<td>Статус проекта</td>
				<td>Описание объекта</td>
				<td>Ваших задач в работе</td>
				<td>Правка</td>
			</tr>
			<? $objects = ORM::factory('Objects')
					->where('status', '=', 4)
					->where('client_id', '=', $client_id)
					->order_by('name')
					->find_all()?>
			<? foreach ($objects as $vol): ?>
				<?$tasks = ORM::factory('Tasks')
						->join('task_workers')
						->on('task_workers.tasks_id', '=', 'tasks.id')
						->where('task_workers.worker_id', '=', WORKER_ID)
						->where('status', '=', 2)
						->where('project_id', '=', $vol->id)
						->find_all();
				?>
				<tr <?= $tasks->count() ? "class='blue'" : '' ?>>
					<td style="font-weight: bold; font-size: 14px"><a href="/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a>
					</td>
					<td><?= $vol->stat->name ?></td>
					<td><?= $vol->description ?></td>
					<td style="text-align: center"><?= $tasks->count() ?></td>
					<td><a href="/projects/edit/<?= $vol->id ?>" rel="edit"></a></td>
				</tr>
			<? endforeach ?>
		</table>
	</div>
	<div id="seo">
		<table class="base_table">
			<tr>
				<td>Название объекта</td>
				<td>Статус проекта</td>
				<td>Описание объекта</td>
				<td>Ваших задач в работе</td>
				<td>Правка</td>
			</tr>
			<? $objects = ORM::factory('Objects')
					->where('status', '=', 5)
					->order_by('name')
					->find_all()?>
			<? foreach ($objects as $vol): ?>
				<?$tasks = ORM::factory('Tasks')
						->join('task_workers')
						->on('task_workers.tasks_id', '=', 'tasks.id')
						->where('task_workers.worker_id', '=', WORKER_ID)
						->where('status', '=', 2)
						->where('project_id', '=', $vol->id)
						->find_all();
				?>
				<tr <?= $tasks->count() ? "class='blue'" : '' ?>>
					<td style="font-weight: bold; font-size: 14px"><a href="/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a>
					</td>
					<td><?= $vol->stat->name ?></td>
					<td><?= $vol->description ?></td>
					<td style="text-align: center"><?= $tasks->count() ?></td>
					<td><a href="/projects/edit/<?= $vol->id ?>" rel="edit"></a></td>
				</tr>
			<? endforeach ?>
		</table>
	</div>
	<div id="w">
		<table class="base_table">
			<tr>
				<td>Название объекта</td>
				<td>Статус проекта</td>
				<td>Описание объекта</td>
				<td>Ваших задач в работе</td>
				<td>Правка</td>
			</tr>
			<? $objects = ORM::factory('Objects')
					->where('status', '=', 2)
					->order_by('name')
					->find_all()?>
			<? foreach ($objects as $vol): ?>
				<?$tasks = ORM::factory('Tasks')
						->join('task_workers')
						->on('task_workers.tasks_id', '=', 'tasks.id')
						->where('task_workers.worker_id', '=', WORKER_ID)
						->where('status', '=', 2)
						->where('project_id', '=', $vol->id)
						->find_all();
				?>
				<tr <?= $tasks->count() ? "class='blue'" : '' ?>>
					<td style="font-weight: bold; font-size: 14px"><a href="/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a>
					</td>
					<td><?= $vol->stat->name ?></td>
					<td><?= $vol->description ?></td>
					<td style="text-align: center"><?= $tasks->count() ?></td>
					<td><a href="/projects/edit/<?= $vol->id ?>" rel="edit"></a></td>
				</tr>
			<? endforeach ?>
		</table>
	</div>
	<div id="archive">
		<table class="base_table">
			<tr>
				<td>Название объекта</td>
				<td>Статус проекта</td>
				<td>Описание объекта</td>
				<td>Ваших задач в работе</td>
				<td>Правка</td>
			</tr>
			<? $objects = ORM::factory('Objects')
					->where('status', '=', 3)
					->order_by('name')
					->find_all()?>
			<? foreach ($objects as $vol): ?>
				<?$tasks = ORM::factory('Tasks')
						->join('task_workers')
						->on('task_workers.tasks_id', '=', 'tasks.id')
						->where('task_workers.worker_id', '=', WORKER_ID)
						->where('status', '=', 2)
						->where('project_id', '=', $vol->id)
						->find_all();
				?>
				<tr <?= $tasks->count() ? "class='blue'" : '' ?>>
					<td style="font-weight: bold; font-size: 14px"><a href="/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a>
					</td>
					<td><?= $vol->stat->name ?></td>
					<td><?= $vol->description ?></td>
					<td style="text-align: center"><?= $tasks->count() ?></td>
					<td><a href="/projects/edit/<?= $vol->id ?>" rel="edit"></a></td>
				</tr>
			<? endforeach ?>
		</table>
	</div>
</div>
