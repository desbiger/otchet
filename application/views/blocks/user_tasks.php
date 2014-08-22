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
		<?if(Task::FindMyTasks(2)->count()):?>
				<li><a href = "#my_tasks">Задачи поставленные мною (<?=Task::FindMyTasks(2)->count()?>)</a></li>
		<?endif?>
		<?if(Task::MyTasksReady()->count()):?>
				<li><a href = "#my_ready_tasks">Готовы сдать (<?=Task::MyTasksReady()->count()?>)</a></li>
		<?endif?>
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
	<?if(Task::FindMyTasks(2)):?>
			<div id="my_tasks">
				<table class = "table_air">
					<tr class = "bold">
						<td>Проект</td>
						<td>Задача</td>
						<td>Готовность</td>
						<td>Реализаторы</td>
						<td>Дедлайн</td>
					</tr>
					<? foreach (Task::FindMyTasks(2) as $task): ?>
						<tr>
							<td><a href = "/projects/project/<?= $task->project->id ?>"><?= $task->project->name ?></a></td>
							<td><a href = "/projects/taskdetail/<?= $task->project->id ?>/<?= $task->id ?>"><?= $task->name ?></a></td>
							<td><? My::statusLine($task->finish, My::$status_color[$task->status]) ?>&nbsp<?= $task->finish ?>%</td>
							<td>
								<?foreach($task->workers->find_all() as $worker):?>
										<?=$worker->name?> <?=$worker->firstname?>
								<?endforeach?>

							</td>
							<td<?= $date == $task->dead_line ? " style='color:red;'" : '' ?>>
								<?= $date == $task->dead_line ? "<div class='fire'></div>" : '' ?>
								<?= My::convertDate($task->dead_line) ?>
							</td>
						</tr>
					<? endforeach ?>
				</table>
			</div>
	<?endif?>
	<?if(Task::MyTasksReady()->count()):?>
			<div id="my_ready_tasks">
				<table class = "table_air">
					<tr class = "bold">
						<td>Проект</td>
						<td>Задача</td>
						<td>Готовность</td>
						<td>Реализаторы</td>
						<td>Дедлайн</td>
					</tr>
					<? foreach (Task::MyTasksReady() as $task): ?>
						<tr>
							<td><a href = "/projects/project/<?= $task->project->id ?>"><?= $task->project->name ?></a></td>
							<td><a href = "/projects/taskdetail/<?= $task->project->id ?>/<?= $task->id ?>"><?= $task->name ?></a></td>
							<td><? My::statusLine($task->finish, My::$status_color[$task->status]) ?>&nbsp<?= $task->finish ?>%</td>
							<td>
								<?foreach($task->workers->find_all() as $worker):?>
										<?=$worker->name?> <?=$worker->firstname?>
								<?endforeach?>

							</td>
							<td<?= $date == $task->dead_line ? " style='color:red;'" : '' ?>>
								<?= $date == $task->dead_line ? "<div class='fire'></div>" : '' ?>
								<?= My::convertDate($task->dead_line) ?>
							</td>
						</tr>
					<? endforeach ?>
				</table>
			</div>
	<?endif?>
</div>

