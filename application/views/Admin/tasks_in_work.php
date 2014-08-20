<? $objects = ORM::factory('Objects')
		->where('status', '!=', '2')
		->find_all() ?>
<h2>Задачи в работе</h2>
<style type = "text/css">
	h3 {
		background-color: rgba(245, 121, 55, 0.19);
		padding: 18px;
		margin-top: 23px;
		color: black;
		font-size: 18px;
	}
</style>
<div class = "tabs">
	<ul class = "tabNavigation">
		<? foreach ($objects as $project): ?>
			<? $tasks = ORM::factory('Tasks')
					->where('project_id', '=', $project->id)
					->where('status', 'IN', array(
							0,
							2
					))
					->find_all()
			?>
			<? if ($tasks->count()): ?>
				<li>
					<a href = "#project_<?= $project->id ?>">
						<?= $project->name ?> (<?=$tasks->count()?>)
					</a>
				</li>
			<? endif ?>
		<? endforeach ?>
	</ul>

	<? foreach ($objects as $project): ?>
		<? $tasks = ORM::factory('Tasks')
				->where('project_id', '=', $project->id)
				->where('status', 'IN', array(
						0,
						2
				))
				->find_all()
		?>

		<? if ($tasks->count()): ?>
			<div id = "project_<?= $project->id ?>">
				<h3><?= $project->name ?> (<?= $tasks->count() ?>)</h3>

				<table class = "base_table">
					<tr>
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
		<? endif ?>

	<? endforeach ?>

</div>