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
		->order_by('tasks.dead_line')
		->find_all();?>
<style type = "text/css">
	.procent {
		margin-top: 3px;
	}
</style>
<ul class = "dop_menu">
	<li>
		<?if($tasks_w->count()):?>
		<div class = "count"><?= $tasks_w->count() ?></div>
		<?endif?>
		<a href = "/">
			<img src = "/include/img/taskbar.png" alt = ""/><br/>
			Мои задачи
			<ul>
				<? foreach ($tasks_w as $t): ?>
					<li class = "<?= My::$status_color[$t->status] ?>">
						<a href = "/projects/taskdetail/<?= $t->project_id ?>/<?= $t->id ?>"><?=
								$t->name ?>(<?= $t->project->name ?>)<br/><?
								My::statusLine($t->finish, My::$status_color[$t->status])
							?> <?= $t->finish ?>%</a>
					</li>
				<? endforeach ?>
			</ul>
		</a>
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
		</a>
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
				<ul>
					<? foreach (Task::FindMyTasks(array(
							0,
							2
					)) as $task): ?>
						<li>
							<a href = "/projects/taskdetail/<?= $task->project_id ?>/<?= $task->id ?>"><?=
									$task->name
								?>
								<br/>
								<?My::statusLine($task->finish, My::$status_color[$task->status])
								?> <?= $task->finish ?>%
							</a>
						</li>
					<? endforeach ?>
				</ul>
			</a>
		</li>
	<? endif ?>
</ul>

