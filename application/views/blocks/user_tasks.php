<h2>
	Ваши задачи
	<i class = "edit" style = "float: right"></i>
</h2>
<? $date = date('Y-m-d') ?>
<?$tasks_w = ORM::factory('Tasks')
		->join(array(
				'task_workers',
				'worker'
		))
		->on('worker.tasks_id', '=', 'tasks.id')
		->where('worker.worker_id', '=', WORKER_ID)
		->where('tasks.status', 'IN', array(2))
		->order_by('tasks.dead_line')
		->find_all();?>
<?$tasks_s = ORM::factory('Tasks')
		->join(array(
				'task_workers',
				'worker'
		))
		->on('worker.tasks_id', '=', 'tasks.id')
		->where('worker.worker_id', '=', WORKER_ID)
		->where('tasks.status', 'IN', array(0))
		->order_by('tasks.dead_line')
		->find_all();?>
<div class = "tabs">
	<ul class = "tabNavigation">
		<li><a href = "#in_work">В работе(<?= $tasks_w->count() ?>)</a></li>
		<li><a href = "#standby">В ожидании(<?= $tasks_s->count() ?>)</a></li>
	</ul>
	<div id = "in_work">

		<table class = "table_air">
			<tr class = "bold">
				<td>Проект</td>
				<td>Задача</td>
				<td>Готовность</td>
				<td>Поставил задачу</td>
				<td>Дедлайн</td>
			</tr>
			<? foreach ($tasks_w as $task): ?>
				<tr>
					<td><a href = "/projects/project/<?= $task->project->id ?>"><?= $task->project->name ?></a></td>
					<td><a href = "/projects/taskdetail/<?= $task->project->id ?>/<?= $task->id ?>"><?= $task->name ?></a></td>
					<td><? My::statusLine($task->finish, My::$status_color[$task->status]) ?>&nbsp<?= $task->finish ?>%</td>
					<td><?=$task->boss->name?> <?=$task->boss->firstname?></td>
					<td<?= $date == $task->dead_line ? " style='color:red;'" : '' ?>>
						<?= $date == $task->dead_line ? "<div class='fire'></div>" : '' ?>
						<?= My::convertDate($task->dead_line) ?>
					</td>
				</tr>
			<? endforeach ?>
		</table>
	</div>
	<div id = "standby">

		<table class = "table_air">
			<tr class = "bold">
				<td>Проект</td>
				<td>Задача</td>
				<td>Готовность</td>
				<td>Поставил задачу</td>
				<td>Дедлайн</td>
			</tr>
			<? foreach ($tasks_s as $task): ?>
				<tr>
					<td><a href = "/projects/project/<?= $task->project->id ?>"><?= $task->project->name ?></a></td>
					<td><a href = "/projects/taskdetail/<?= $task->project->id ?>/<?= $task->id ?>"><?= $task->name ?></a></td>
					<td><? My::statusLine($task->finish, My::$status_color[$task->status]) ?>&nbsp<?= $task->finish ?>%</td>
					<td><?=$task->boss->name?> <?=$task->boss->firstname?></td>
					<td<?= $date == $task->dead_line ? " style='color:red;'" : '' ?>>
						<?= $date == $task->dead_line ? "<div class='fire'></div>" : '' ?>
						<?= My::convertDate($task->dead_line) ?>
					</td>
				</tr>
			<? endforeach ?>
		</table>
	</div>
</div>

