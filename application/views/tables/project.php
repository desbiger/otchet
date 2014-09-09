<?=
	View::factory('blocks/projects_menu')
			->bind('project_id', $id) ?>
<br/>
<hr/>

<?
	$project = ORM::factory('Objects', $id);
	if ($_GET) {
		$noa_auto = array(
				'date_from',
				'date_to'
		);
		$tasks    = ORM::factory('Tasks');
		$col      = $tasks->table_columns();
		if (Arr::get($_GET, 'date_from') != ''  || Arr::get($_GET, 'date_to') !='') {
			$tasks->join('work_times')->on('work_times.task_id','=','tasks.id');
			if(Arr::get($_GET, 'date_from') != ''){
				$tasks->where('work_times.date','>',Arr::get($_GET, 'date_from'));
			}
			if(Arr::get($_GET, 'date_to') != ''){
				$tasks->where('work_times.date','<',Arr::get($_GET, 'date_to'));
			}
		}
		if($worker[] = Arr::get($_REQUEST,'worker')){
			$tasks->join('task_workers')->on('task_workers.tasks_id','=','tasks.id');
			$tasks->where('task_workers.worker_id','IN',$worker);
		}


		foreach ($col as $k => $v) {
			$vol = Arr::get($_GET, $k);
			if ($vol || ($vol == 0 && $k == 'status')) {
				$tasks->where('tasks.'.$k, '=', $vol);
			}
		}
		$tasks->where('tasks.project_id', '=', $id);

		$tasks = $tasks->find_all();
//		var_dump($tasks,true);

	}
	else {
		$tasks = ORM::factory('Tasks')
				->join(array(
						'work_times',
						'time'
				), 'LEFT')
				->on('time.task_id', '=', 'tasks.id')
				->where('tasks.project_id', '=', $id)
				->order_by(array(
						'tasks.id',
						'time.date'
				), 'DESC')
				->group_by('tasks.id')
				->find_all();
	}

?>
<h2>
	<i class = "project" style = "float: right"></i>
	Отчет по проекту <?= $project->name ?>
</h2>
<div class = "tabs">
	<ul class = "tabNavigation">
		<li><a href = "#list"><h3>Таблица</h3></a></li>
		<li><a href = "#diagramm"><h3>Диаграмма</h3></a></li>
		<li><a href = "#wiki"><h3>Wiki</h3></a></li>
<!--		<li><a href = "#graph" data-trigger-event="init_charts" data-trigger-event-once="true" class="chartTab"><h3>График занятости по проекту</h3></a></li>-->
	</ul>
	<hr/>
	<br/>

	<div id = "diagramm">
		В разработке
		<?=
			View::factory('grafics/ganta')
					->bind('tasks', $tasks)
		?>

	</div>
	<div id = "list">
     <?= View::factory('forms/filter_objects') ?>

		<? $i = 0; ?>
		<a class = "plus" href = "/index/newtask/<?= $id ?>" title = "Добавить задачу"></a>
		<table class = "base_table">
			<tr>
				<td>#</td>
				<td>Задача</td>
				<td>Комментарии</td>
				<td style = "width: 68px">Дата</td>
				<td>Готово %</td>
				<td>Поставил задачу</td>
				<td>Выполнил задачу</td>

				<!--				<td>Файлы</td>-->
				<td>Потрачено времени</td>
				<td>Редак.</td>
				<td>Удалить.</td>
			</tr>
			<? $Global_intervals = array(); ?>
			<? foreach ($tasks as $task): ?>
				<? $i++ ?>
				<?
				$interval  = '';
				$intervals = array();
				$times     = $task->date->find_all();

				foreach ($times as $t) {
					$interval           = My::TimeBetwin($t->time_begin, $t->time_end);
					$intervals[]        = $interval['timestamp'];
					$Global_intervals[] = $interval['timestamp'];
				}
				$summa_imtervals = My::SummOffTimes($intervals);
				$workers         = $task->workers->find_all();
				?>
				<tr class = "<?= My::$status_color[$task->status] ?>">
					<td><?= $i ?></td>
					<td>

							<a href = "/projects/taskdetail/<?= $project->id ?>/<?= $task->id ?>">
								<?= $task->name ?>
							</a>
						<?if($task->files->find_all()->count()):?>
							<span class="atach"></span>
						<?endif?>

					</td>
					<td><?= $task->comments->find_all()->count()?></td>
					<td><?= $task->date->find()->date ? date("d F Y", strtotime($task->date->find()->date)) : "" ?></td>

					<td style = "text-align: center"><? My::statusLine($task->finish, 'blue') ?> &nbsp<?= $task->finish ?>%</td>
					<!--					<td class = "--><?//= My::$status_color[$task->status] ?><!--">-->
					<?//= My::$ststuses[$task->status] ?><!--</td>-->

					<td><?= $task->boss->name ?> <?= $task->boss->secondename ?></td>
					<td>
						<? foreach ($workers as $worker): ?>
							<?= $worker->name ?> <?= $worker->secondename ?> <?= $worker->firstname ?>
							<hr/>
						<? endforeach ?>
					</td>

					<!--					<td>-->
					<!--						--><? // $files = ORM::factory('File')
						//								->where('task_id', '=', $task->id)
						//								->find_all()
					?>
					<!--						--><? // foreach ($files as $file): ?>
					<!--							<a target = "_new" href = "/upload/--><?//= $file->filename ?><!--">-->
					<?//= $file->filename ?><!--</a><br/>-->
					<!--						--><? // endforeach ?>
					<!--					</td>-->
					<td><?= $summa_imtervals[0] ?> час.<?= $summa_imtervals[1] ?> мин.</td>
					<td><a rel = "edit" href = "/projects/taskedit/<?= $id ?>/<?= $task->id ?>"></a></td>
					<td><a rel = "del" href = "/projects/project/<?= $id ?>/del_task_<?= $task->id ?>"></a></td>
				</tr>
			<? endforeach ?>
			<tr>
				<? $itogo = My::SummOffTimes($Global_intervals) ?>
				<td style = "text-align: right; font-weight: bold" colspan = "8">итого времени затрчено:</td>
				<td style = "font-weight: bold"><?= $itogo[0] ?> час. <?= $itogo[1] ?> мин.</td>
			</tr>
		</table>

	</div>
	<div id="wiki">
		<?$wiki = $project->wiki->find_all()?>
		<?$project_id = $project->id;?>
		<?=View::factory('blocks/wiki_list')->bind('wiki',$wiki)->bind('id',$project_id)?>
	</div>
<!--	<div id = "graph">-->
<!--		<script type = "text/javascript">-->
<!--			$(function () {-->
<!--				$('#graph').click(function () {-->
<!--					AmCharts.render();-->
<!--				})-->
<!--			})-->
<!--		</script>-->
<!--		--><?//
//
//			$title = 'График';
//			$name = $project->name;
//			$datas = My::GetDatasForGraphikProject($id);
//
//
//		?>
<!--		--><?//=
//			View::factory('grafics/line')
//					->bind('datas', $datas)
//					->bind('project', $name)
//					->bind('title', $title)
//					->bind('id', $id)
//		?>
<!--	</div>-->
</div>






 