<style type = "text/css">
	.base_table{
		margin-top: 10px;
	}
</style>
<h2>Список проектов
	<i class = "project" style = "float: right"></i>
</h2>
<a href = "#add_project" class = "fancy plus" title = "Добавить проект"></a>
<div class = "tabs">
	<ul class = "tabNavigation">
		<li>
			<a href = "#work">В разработке</a>
		</li>
		<li>
			<a href = "#pod">На поддержке</a>
		</li>
		<li>
			<a href = "#seo">На продвижении</a>
		</li>
		<li>
			<a href = "#w">В ожидании</a>
		</li>
		<li>
			<a href = "#archive">Архив</a>
		</li>
	</ul>
	<div id = "work">
		<table class = "base_table">
			<tr>
				<td>Название объекта</td>
				<td>Статус проекта</td>
				<td>Описание объекта</td>
				<td>Ваших задач в работе</td>
			</tr>
			<? $objects = ORM::factory('Objects')
					->where('status', '=', 1)
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
					<td style = "font-weight: bold; font-size: 14px"><a href = "/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a>
					</td>
					<td><?= $vol->stat->name ?></td>
					<td><?= $vol->description ?></td>
					<td style = "text-align: center"><?= $tasks->count() ?></td>
				</tr>
			<? endforeach ?>
		</table>
	</div>
	<div id = "pod">
		<table class = "base_table">
					<tr>
						<td>Название объекта</td>
						<td>Статус проекта</td>
						<td>Описание объекта</td>
						<td>Ваших задач в работе</td>
					</tr>
					<? $objects = ORM::factory('Objects')
							->where('status', '=', 4)
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
							<td style = "font-weight: bold; font-size: 14px"><a href = "/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a>
							</td>
							<td><?= $vol->stat->name ?></td>
							<td><?= $vol->description ?></td>
							<td style = "text-align: center"><?= $tasks->count() ?></td>
						</tr>
					<? endforeach ?>
				</table>
	</div>
	<div id = "seo">
		<table class = "base_table">
					<tr>
						<td>Название объекта</td>
						<td>Статус проекта</td>
						<td>Описание объекта</td>
						<td>Ваших задач в работе</td>
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
								->find_all();?>
						<tr <?= $tasks->count() ? "class='blue'" : '' ?>>
							<td style = "font-weight: bold; font-size: 14px"><a href = "/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a>
							</td>
							<td><?= $vol->stat->name ?></td>
							<td><?= $vol->description ?></td>
							<td style = "text-align: center"><?= $tasks->count() ?></td>
						</tr>
					<? endforeach ?>
				</table>
	</div>
	<div id = "w">
		<table class = "base_table">
					<tr>
						<td>Название объекта</td>
						<td>Статус проекта</td>
						<td>Описание объекта</td>
						<td>Ваших задач в работе</td>
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
								->find_all();?>
						<tr <?= $tasks->count() ? "class='blue'" : '' ?>>
							<td style = "font-weight: bold; font-size: 14px"><a href = "/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a>
							</td>
							<td><?= $vol->stat->name ?></td>
							<td><?= $vol->description ?></td>
							<td style = "text-align: center"><?= $tasks->count() ?></td>
						</tr>
					<? endforeach ?>
				</table>
	</div>
	<div id = "archive">
		<table class = "base_table">
					<tr>
						<td>Название объекта</td>
						<td>Статус проекта</td>
						<td>Описание объекта</td>
						<td>Ваших задач в работе</td>
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
								->find_all();?>
						<tr <?= $tasks->count() ? "class='blue'" : '' ?>>
							<td style = "font-weight: bold; font-size: 14px"><a href = "/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a>
							</td>
							<td><?= $vol->stat->name ?></td>
							<td><?= $vol->description ?></td>
							<td style = "text-align: center"><?= $tasks->count() ?></td>
						</tr>
					<? endforeach ?>
				</table>
	</div>
</div>
