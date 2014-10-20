<ul class = "top_menu">
	<li>
		<a href = "/">
			<img src = "/include/img/folder_home_5639.png" alt = ""/>
			Главная страница
		</a>
	</li>
	<!--	<li><a href="/index/newtask">Новая задача</a></li>-->
	<li>
		<a href = "/projects">
			<img src = "/include/img/folder_html_8545.png" alt = ""/>
			Проекты
		</a>
	</li>
	<li>
		<a href = "/users">
			<img src = "/include/img/kdmconfig_4251.png" alt = ""/>
			Сотрудники
		</a>
	</li>
	<? if (Auth::instance()
			->logged_in('Admin')
	): ?>

		<li>
			<a href = "/otchet">
				<img src = "/include/img/pie_chart_48_8556.png" alt = ""/>
				Раздел Руководителя
			</a>
		</li>
	<? endif ?>
</ul>
<?$tasks_w = ORM::factory('Tasks')
		->join(array(
				'task_workers',
				'worker'
		))
		->on('worker.tasks_id', '=', 'tasks.id')
		->where('worker.worker_id', '=', WORKER_ID)
		->where('tasks.status', 'IN', array(
				2,
				0
		))
		->order_by('tasks.project_id')
		->find_all();?>
<style type = "text/css">
	.procent {
		margin-top: 3px;
	}
</style>
<ul class = "dop_menu">
	<li>
		<? if ($tasks_w->count()): ?>
			<div class = "count"><?= $tasks_w->count() ?></div>
		<? endif ?>
		<a href = "/">
			<img src = "/include/img/taskbar.png" alt = ""/><br/>
			Мои задачи
		</a>
		<ul>
			<? $cur_project = 0; ?>

			<? foreach ($tasks_w as $k => $t): ?>
				<? if ($k == 0 || $cur_project != $t->project->id): ?>
					<li class = "blue title"><?= $t->project->name ?></li>
					<li class = "<?= My::$status_color[$t->status] ?>">
						<table>
							<tr>
								<td>
									<a href = "/projects/taskdetail/<?= $t->project_id ?>/<?= $t->id ?>"><?=
											$t->name ?></a>
								</td>
								<td>
									<?
										My::statusLine($t->finish, My::$status_color[$t->status])
									?> <?= $t->finish ?>%
								</td>
							</tr>
						</table>
					</li>
					<? $cur_project = $t->project->id ?>
				<? else: ?>
					<li class = "<?= My::$status_color[$t->status] ?>">
						<table>
							<tr>
								<td>
									<a href = "/projects/taskdetail/<?= $t->project_id ?>/<?= $t->id ?>"><?=
											$t->name ?></a>
								</td>
								<td>
									<?
										My::statusLine($t->finish, My::$status_color[$t->status])
									?> <?= $t->finish ?>%
								</td>
							</tr>
						</table>
					</li>
				<?endif ?>

			<? endforeach ?>
		</ul>

	</li>
	<li>
		<?if ($count = Comments::Factory()
				->NewComments()
				->count()
		):?>
			<div class = "count">
				<?= $count ?>
			</div>
		<? endif ?>
		<a href = "">
			<img src = "/include/img/taskbar.png" alt = ""/><br/>
			Коментарии
		</a>
		<? if ($count): ?>
			<ul>
				<? foreach (Comments::Factory()
						            ->NewComments() as $comments): ?>
					<li>
						<a href = "/projects/taskdetail/<?= $comments->task->project_id ?>/<?= $comments->task->id ?>"><?=
								$comments->task->name
							?></a>
					</li>
				<? endforeach ?>
			</ul>
		<? endif ?>

	</li>
	<?if (Task::FindMyTasks(array(
			0,
			2
	))
			->count()
	):?>
		<li>
			<div class = "count">
				<?=
					Task::FindMyTasks(array(
							0,
							2
					))
							->count()
				?>
			</div>
			<a href = "">
				<img src = "/include/img/taskbar.png" alt = ""/><br/>
				Я поручил(а)
			</a>
			<ul>
				<? $cur_project = 0; ?>
				<? foreach (Task::FindMyTasks(array(
						0,
						2
				)) as $task): ?>
					<? if ($cur_project != $task->project->id): ?>
						<li class = "blue title"><?= $task->project->name ?></li>
						<li class = "<?= My::$status_color[$task->status] ?>">
							<table>
								<tr>
									<td>
										<a href = "/projects/taskdetail/<?= $task->project_id ?>/<?= $task->id ?>"><?=
												$task->name ?></a>
									</td>
									<td>
										<?
											My::statusLine($task->finish, My::$status_color[$task->status])
										?> <?= $task->finish ?>%
									</td>
								</tr>
							</table>
						</li>
						<? $cur_project = $task->project->id ?>
					<? else: ?>
						<li class = "<?= My::$status_color[$task->status] ?>">
							<table>
								<tr>
									<td>
										<a href = "/projects/taskdetail/<?= $task->project_id ?>/<?= $task->id ?>"><?=
												$task->name ?></a>
									</td>
									<td>
										<?
											My::statusLine($task->finish, My::$status_color[$task->status])
										?> <?= $task->finish ?>%
									</td>
								</tr>
							</table>
						</li>
					<?endif ?>
				<? endforeach ?>
			</ul>

		</li>
	<? endif ?>
</ul>

