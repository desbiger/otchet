<? $project = ORM::factory('Objects', $project_id) ?>
<? $task = ORM::factory('Tasks', $task_id); ?>
<? $boses = ORM::factory('Workers')
//		->where('whois', '=', 2)
		->find_all() ?>
<? $workers = ORM::factory('Workers')
//		->where('whois', '=', 1)
		->find_all() ?>
<? $times = ORM::factory('WorkTimes')
		->where('task_id', '=', $task_id)
		->order_by('date')
		->find_all()
?>

<?
	$task_work_ids = array();
	$taskWorkers = $task->workers->find_all();
	foreach ($taskWorkers as $tw) {
		$task_work_ids[] = $tw->id;
	}
?>

<div class = "breadcrumbs">
	<ul>
		<li><a href = "/projects/">Проекты</a> -></li>
		<li><a href = "/projects/project/<?= $project_id ?>"><?= $project->name ?></a> -></li>
		<li>Редактирование задачи</li>
	</ul>
</div>

<br/>
<br/>
<h2>Редактирование задачи по проекту <?= $project->name ?></h2>
<!--<pre>--><?//print_r($_POST)?><!--</pre>-->
<form id = "form" action = "" method = "post" enctype = "multipart/form-data">


	<table class = "base_table">
		<tr>
			<td>Задача</td>
			<td>Статус</td>
			<td>Готово на %</td>
			<td>Крайний срок</td>
			<td>Поставил задачу</td>
			<td>Поручено</td>
<!--			<td>Комментарии</td>-->
		</tr>

		<tr>
			<td><?= Form::textarea('name', $task->name) ?>

			</td>
			<td><?= Form::select('status', My::$ststuses, $task->status) ?></td>
			<td><?= Form::input('finish',  $task->finish) ?></td>
			<td><?=Form::input('dead_line',$task->dead_line,array('class'=>'date'))?></td>
			<td><?=
					Form::select('boss_of_task', My::Obj_fore_select($boses, 'id', array(
							'name',
							'firstname'
					)), $task->boss->id) ?></td>
			<td>
				<ul class = "users_list">
					<? foreach ($workers as $worker): ?>
						<li><?= Form::checkbox("taskworker[{$worker->id}]", $worker->id, in_array($worker->id, $task_work_ids)) ?><?= $worker->name ?> <?=
								$worker->secondename
							?>    <?=
								$worker->firstname ?></li>
					<? endforeach ?>
				</ul>
			</td>
<!--			<td>--><?//= Form::textarea('description', $task->description) ?><!--</td>-->
		</tr>
	</table>
	<br/>

	<div class = "tabs">
		<ul class = "tabNavigation">
			<li><a href = "#description"><h3>Примечение</h3></a></li>
			<li><a href = "#times"><h3>Временные интервалы</h3></a></li>
			<li><a href = "#files"><h3>Файлы</h3></a></li>
		</ul>
		<hr/>
		<br/>
	<div id="description">
		<?= Form::textarea('description', $task->description,array('class' => 'tiny')) ?>
	</div>
		<div id = "times">

			<h3>Затраченное время
				<a title = "Добавить временной интервал" href = "#clock" class = "clock fancy"></a>
			</h3>
			<hr/>
			<table>
				<tr>
					<td>Дата работ</td>
					<td>Время начала</td>
					<td>Время окончания</td>
					<td>Итого затрачено</td>
					<td>Описание работ</td>
					<td>Удалить</td>
				</tr>
				<? $itog = array(); ?>
				<? foreach ($times as $time): ?>
					<? $interval = $time->time_end - $time->time_begin ?>
					<? $diff = My::TimeBetwin($time->time_begin, $time->time_end) ?>
					<? $itog[] = $diff['timestamp'] ?>
					<tr>
						<td><?= $time->date ?></td>
						<td><?= $time->time_begin ?></td>
						<td><?= $time->time_end ?></td>
						<td><?= $diff[0] ?> час. <?= $diff[1] ?> мин.</td>
						<td><?= $time->text ?></td>
						<td><a rel = "del_interval" href = "/projects/taskedit/<?= $project_id ?>/<?=
								$task_id
							?>/del_interval_<?= $time->id ?>">X</a></td>
					</tr>
				<? endforeach ?>
				<tr>
					<td></td>
					<td></td>
					<td>итого потрачено на задачу:</td>
					<td>
						<? $summa = My::SummOffTimes($itog) ?>
						<?= $summa[0] ?> час. <?= $summa[1] ?> мин.
					</td>

				</tr>
			</table>
		</div>
		<div id = "files">
			<h3>
				Прикрепленные файлы
				<a title = "Добавить файл" href = "#atache" class = "atach fancy"></a>
			</h3>

			<? $files = ORM::factory('File')
					->where('task_id', '=', $task->id)
					->find_all() ?>
			<? if ($files->count()): ?>

				<script type = "text/javascript">
					$(function () {
						$('a[rel=filedel]').click(function () {
							if (!confirm('Вы уверены что хотите удалить этот файл?')) {
								return false;
							}
						});
					});

				</script>
				<ul>
					<? foreach ($files as $file): ?>
						<li>
							<a target = "_new" href = "/upload/<?= $file->filename ?>"><?= $file->filename ?></a>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<a rel = "filedel" href = "/projects/taskedit/<?= $project->id ?>/<?= $task->id ?>?file_del=<?= $file->id ?>">Удалить</a>
						</li>
					<? endforeach ?>
				</ul>
				<br/>
			<? endif ?>

		</div>
	</div>


	<br/>    <?= Form::submit('sub', 'Обновить', array("rel" => 'final')) ?>
</form>


<div style = "display: none">
	<div id = "clock">
		<form action = "" method = "post">
			<h4>Добавить временной интервал</h4> <br/>
			<table>
				<tr>
					<td>Дата Работ по задачи</td>
					<td>Начал</td>
					<td>Законичил</td>
					<td>Описание работ</td>
				</tr>
				<tr>
					<td><?= Form::input('date', null, array('class' => 'date')) ?></td>
					<td><?= Form::input('time_begin', null, array('class' => 'timepicker')) ?></td>
					<td><?= Form::input('time_end', null, array('class' => 'timepicker')) ?></td>
					<td><?= Form::textarea('text') ?></td>
				</tr>
			</table>
			<?= Form::submit('dob', 'Добавить') ?>
		</form>
	</div>
</div>

<div style = "display: none">

	<div id = "atache">
		<form action = "" method = "post" enctype = "multipart/form-data">
			<h3>Прикрепить файл к задаче</h3>
			<lable>Название файла</lable>
			<br/>
			<?= Form::input('file_title', Arr::get($_POST, 'file_title')) ?><br/>

			<?= Form::file('file_file', Arr::get($_POST, 'file_file')) ?>
			<br/>
			<br/>
			<lable>Описание файла</lable>
			<br/>
			<?= Form::textarea('file_text', Arr::get($_POST, 'file_text')) ?>
			<br/>
			<?= Form::submit('dob', 'Загрузить') ?>
		</form>
	</div>

</div>