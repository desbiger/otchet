<? $task = ORM::factory('Tasks', $task_id) ?>
<? $project = ORM::factory('Objects', $task->project_id) ?>
<? $intervals = $task->date->find_all(); ?>
<? $files = $task->files->find_all();

	//	echo $task_begin_work = preg_replace("|([0-9]{4}\-[0-9]{2}\-[0-9}{2}) (.*)|isU", "$1", $task->begin_work);
?>
<?$id = $task->project_id;
	echo View::factory('blocks/projects_menu')
			->bind('project_id', $id) ?>
<script type = "text/javascript">
	$(function () {
		$('.procent').click(function () {
			$('a.fancy').trigger('click');
		})
	})
</script>
<style type = "text/css">
	.procent {
		cursor: pointer;
	}
</style>
<div class = "breadcrumbs">
	<ul>
		<li><a href = "/">Главная</a> -></li>
		<li><a href = "/projects">Проекты</a> -></li>
		<li><a href = "/projects/project/<?= $task->project_id ?>"><?= $project->name ?></a> -></li>
		<li>Задача №<?= $task->id ?></li>
	</ul>
</div>
<style type = "text/css">
	.base_table tr td:first-child {
		font-weight: bold;
		text-align: left;
	}

	.base_table tr td:last-child {
		text-align: left;
	}
</style>

<h1><?= $project->name ?></h1>
<table class = "clear_table">
	<tr>
		<td style = "width: 20%; vertical-align: top">
			<h2>Задачи проекта</h2>
			<? $tasks = ORM::factory('Tasks')
					->where('project_id', '=', $task->project_id)
					->order_by('id', 'DESC')
					->order_by('finish')
					->find_all() ?>
			<ul class = "nolist menu">
				<? foreach ($tasks as $t): ?>
					<li<?= $t->id == $task_id ? " class='selected'" : '' ?>>
						<i style = "width: 10px;height: 10px;display: inline-block; " class = "<?= My::$status_color[$t->status] ?>"></i>
						<a href = "/projects/taskdetail/<?= $t->project_id ?>/<?= $t->id ?>">
							<?= $t->name ?>
						</a>
					</li>
				<? endforeach ?>
			</ul>
		</td>
		<td style = "padding-left: 10px; vertical-align: top">
			<h2>
				<a title = "редактировать" style = "display: inline-block;float: right" href = "/projects/taskedit/<?= $project->id ?>/<?= $task->id ?>"
				   class =
				   "edit"></a>
				Задача #<?= $task->id ?>
				<i style = "width: 10px;height: 10px;display: inline-block" class = "<?= My::$status_color[$task->status] ?>"></i>
				<? My::statusLine($task->finish, My::$status_color[$task->status]) ?> <?= $task->finish ?>%
				| Выполнить к <span class = "date_static" date-begin = "<?= $task->date_begin ?>" date-end = "<?= $task->dead_line ?>"><?=
						My::convertDate($task->dead_line)
					?></span>

			</h2>

			<br/>

			<div>
				<div>
					<div class = "fix_box">
						<h3>Поставил задачу</h3>

						<p><?= $task->boss->firstname ?> <?= $task->boss->name ?></p>
					</div>
					<div class = "fix_box">
						<h3>Реализаторы:</h3>
						<? $workers = $task->workers->find_all() ?>
						<ul>
							<? foreach ($workers as $worker): ?>
								<li class = "nolist">    <?= $worker->name ?> <?= $worker->secondename ?> <?= $worker->firstname ?></li>
							<? endforeach ?>
						</ul>
					</div>
					<div class = "fix_box">
						<h3>Статус</h3>

						<p>
							<i style = "width: 10px;height: 10px;display: inline-block" class = "<?= My::$status_color[$task->status] ?>"></i>
							<?= My::$ststuses[$task->status] ?>
						</p>
					</div>
					<? if ($task->status == 0): ?>
						<div class = "fix_box">
							<form action = "" method = "post">
								<?= Form::hidden('task_id', $task->id) ?>
								<?= Form::hidden('project_id', $project->id) ?>
								<?= Form::submit('do', 'В работу') ?>
							</form>
						</div>
					<? elseif ($task->status == 2): ?>
						<div class = "fix_box">
							<form action = "" method = "post">
								<?= Form::hidden('task_id', $task->id) ?>
								<?= Form::hidden('project_id', $project->id) ?>
								<?= Form::submit('do', 'Завершить задачу') ?>
							</form>
						</div>
					<? endif ?>
				</div>

				<h3>Суть задачи</h3>

				<p class = "task_text"><?= $task->name ?></p>


				<div class = "tabs">
					<ul class = "tabNavigation">

						<li><a href = "#prim"><h3>Примечание</h3></a></li>
						<li>
							<a href = "#times"><h3>Временные интервалы (<?=$intervals->count()?>)</h3></a>
						</li>
						<li><a href = "#files"><h3>Файлы (<?=$task->files->find_all()->count()?>)</h3></a></li>
					</ul>
					<hr/>
					<br/>

					<div id = "times">
						<a title = "Добавить временной интервал" href = "#clock" class = "clock fancy"></a>
						<table class = "table_air">
							<tr class = "bold">
								<td>Дата работ</td>
								<td>Время начала</td>
								<td>Время окончания</td>
								<td>Итого затрачено</td>
								<td>Описание работ</td>
							</tr>
							<? $itog = array(); ?>
							<? foreach ($intervals as $time): ?>
								<? $interval = $time->time_end - $time->time_begin ?>
								<? $diff = My::TimeBetwin($time->time_begin, $time->time_end) ?>
								<? $itog[] = $diff['timestamp'] ?>
								<tr>
									<td><?= My::convertDate($time->date) ?></td>
									<td><?= $time->time_begin ?></td>
									<td><?= $time->time_end ?></td>
									<td><?= $diff[0] ?> час. <?= $diff[1] ?> мин.</td>
									<td><?= $time->text ?></td>

								</tr>
							<? endforeach ?>
							<tr class = "bold black">
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
							<ul class = "nolist otstup_left">
								<? foreach ($files as $file): ?>
									<li>
										<a target = "_new" href = "/upload/<?= $file->filename ?>"><?= $file->filename ?></a>
									</li>
								<? endforeach ?>
							</ul>
							<br/>
						<? endif ?>

					</div>
					<div id = "prim">
						<p><?= My::TextFormat($task->description) ?></p>
					</div>
				</div>
			</div>
			<div class = "comments">
				<h2>Коментарии(<?=$task->comments->find_all()->count()?>)</h2>
				<? foreach ($task->comments->find_all() as $comment): ?>
						<?$date = My::convertDate($comment->date)?>

					<div class = "comment">
						<div class = "info">
							<span class = "user"><a href = "/user/profile/<?=$comment->worker->id?>"><?=$comment->worker->name?></a></span>
							<span class = "date_create"><?=$date?> в <?=$comment->time?></span>
						</div>
						<p>
							<?=$comment->text?>
						</p>
					</div>
				<? endforeach ?>

				<div class = "add_comment">
					<h3>Добавить коментарий</h3>

					<form action = "" method = "post">
						<?= Form::textarea('text', '', array('style' => 'width:100%')) ?><br/><br/>
						<?= Form::submit('comment', 'Добавить') ?>
					</form>
				</div>
			</div>
		</td>
	</tr>
</table>


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
	<a href = "#procent" class = "fancy"></a>
</div>
<div style = "display: none">
	<div id = "procent">
		<form action = "" method = "post">
			<?= Form::input('finish', $task->finish, array('style' => "width:40px; font-size:20px")) ?> %
			<br/>
			<br/>
			<?= Form::submit('do', 'Обновить') ?>
		</form>
	</div>
</div>
