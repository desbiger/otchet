<style type = "text/css">
	.user_table tr td {
		background-color: #fafafa;
	}

	.user_table {
		border: 1px solid #e6e6e6;
		width: 100%;
	}
</style>
<h2><?= $user->firstname ?> <?= $user->name ?> <?= $user->secondename ?> <?=
		$user->id == WORKER_ID ? "<a style='font-size: 12px'
			href = '/user/my_profile_edit'>(Редактировать)</a>" : '' ?></h2>
<table class = "user_table">
	<tr>
		<td style = "width: 128px">
			<img src = "<?= $user->avatar ? $user->avatar : '/include/empty_ava.png' ?>" alt = ""/>
		</td>
		<td>
			<div class = "user_about">
				<p>Должность: <span><?= $user->dolzhnost ?></span></p>

				<p>Дата рождения: <span><?= $user->berthday ?></span></p>

				<p>Электронная почта: <span><?= $user->user->email ?></span></p>

				<p>Телефон: <span><?= $user->phone ?></span></p>

				<p>Город: <span><?= $user->city ?></span></p>

				<p>Пол: <span><?= $user->sex ?></span></p>
			</div>
		</td>
	</tr>
</table>
<div class = "record"></div>
<? if (Auth::instance()
				->logged_in('Admin') || $user->user_id == Auth::instance()
				->get_user()->id
): ?>
	<div class = "tabs">
		<ul class = "tabNavigation">
			<li><a href = "#list"><h3>Задачи в работе</h3></a></li>
			<li><a href = "#by_date"><h3>Задачи по дате</h3></a></li>
			<!--		<li><a href = "#graph" data-trigger-event="init_charts" data-trigger-event-once="true" class="chartTab"><h3>График занятости по проекту</h3></a></li>-->
		</ul>
		<hr/>
		<br/>

		<div id = "list">
			<? $tasks = ORM::factory('Tasks')
					->join('task_workers')
					->on('task_workers.tasks_id', '=', 'tasks.id')
					->where('task_workers.worker_id', '=', $user->id)
					->where('tasks.status', 'in', array(
							0,
							2
					))
					->find_all() ?>
			<h2>Текущие задачи сотрудника</h2>
			<table class = "base_table">
				<tr>
					<td>Проект</td>
					<td style = "width: 600px">Задача</td>
					<td>Дата создания</td>
					<td>Дата завершения</td>
					<td>Поставил задачу</td>
					<td>Поручено</td>
					<td>Процент выполнения</td>
				</tr>
				<? foreach ($tasks as $task): ?>
					<? $proc = $task->finish; ?>
					<tr class = "<?= My::$status_color[$task->status] ?>">
						<td><?= $task->project->name ?></td>
						<td><a href = "/projects/taskdetail/<?= $task->project_id ?>/<?= $task->id ?>"><?= $task->name ?></a></td>
						<td><?= My::convertDate($task->date_begin) ?></td>
						<td><?= My::convertDate($task->dead_line) ?></td>
						<td>
							<?= $task->boss->firstname ?> <?= $task->boss->name ?> <?= $task->boss->secondename ?>
						</td>
						<td>
							<? $workers = $task->workers->find_all() ?>
							<? foreach ($workers as $worker): ?>
								<?= $worker->firstname ?> <?= $worker->name ?> <?= $worker->secondename ?>
							<? endforeach ?>
						</td>
						<td><?=
								View::factory('grafics/procent_line')
										->bind('vol', $proc)
										->bind('color', My::$status_color[$task->status])?>
							&nbsp<?= $task->finish ?> %
						</td>
					</tr>
				<? endforeach ?>
			</table>
		</div>
		<div<?= Arr::get($_POST, 'date') ? " class='custom-select'" : '' ?> id = "by_date">
			<h2>Выбирите интересующую дату</h2>

			<form action = "" method = "post">
				<?=
					Form::input('date', Arr::get($_POST, 'date'), array(
							'class' => 'date',
							'onChange' => 'this.form.submit'
					)) ?>
				<input type = "submit" value = "ok"/>
			</form>
			<? if ($date = Arr::get($_POST, 'date')): ?>
				<? $tasks = ORM::factory('Tasks')
						->join('work_times')
						->on('work_times.task_id', '=', 'tasks.id')
						->where('work_times.date', '=', $date)
						->where('work_times.worker_id', '=', $user->id)
						->group_by('tasks.id')
						->find_all() ?>
				<table class = "base_table">
					<tr>
						<td>Проект</td>
						<td style = "width: 600px">Задача</td>
						<td>Дата создания</td>
						<td>Дата завершения</td>
						<td>Поставил задачу</td>
						<td>Поручено</td>
						<td>Процент выполнения</td>
					</tr>
					<? foreach ($tasks as $task): ?>
						<? $proc = $task->finish; ?>
						<tr class = "<?= My::$status_color[$task->status] ?>">
							<td><?= $task->project->name ?></td>
							<td><a href = "/projects/taskdetail/<?= $task->project_id ?>/<?= $task->id ?>"><?= $task->name ?></a></td>
							<td><?= My::convertDate($task->date_begin) ?></td>
							<td><?= My::convertDate($task->dead_line) ?></td>
							<td>
								<?= $task->boss->firstname ?> <?= $task->boss->name ?> <?= $task->boss->secondename ?>
							</td>
							<td>
								<? $workers = $task->workers->find_all() ?>
								<? foreach ($workers as $worker): ?>
									<?= $worker->firstname ?> <?= $worker->name ?> <?= $worker->secondename ?>
								<? endforeach ?>
							</td>
							<td><?=
									View::factory('grafics/procent_line')
											->bind('vol', $proc)
											->bind('color', My::$status_color[$task->status])?>
								&nbsp<?= $task->finish ?> %
							</td>
						</tr>
					<? endforeach ?>
				</table>
			<? endif ?>
		</div>
	</div>

<? endif ?>