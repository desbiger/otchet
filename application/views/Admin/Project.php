<? $project = ORM::factory('Objects', $id) ?>
<? $global_itogo = array(); ?>
<? $global_price = 0; ?>
<h2>Отчет по проекту <?= $project->name ?></h2>

<? $tasks = ORM::factory('Tasks')
		->where('project_id', '=', $project->id)
		->order_by('worker_id')
		->find_all() ?>
<div class = "tabs">

	<h3>Список задач</h3>
	<ul class = "tabNavigation">
		<li><a href = "#project">по проекту</a></li>
		<li><a href = "#user">по пользователям</a></li>
	</ul>
	<div id = "project">
		<table class = "base_table">
			<tr>
				<td>Задача</td>
				<td>Статус</td>
				<td>Реализаторы</td>
				<td>Поставил задачу</td>
				<td>Комментарий</td>
				<td>Потрачено часов</td>
				<td>Стоимость работ</td>
			</tr>

			<? foreach ($tasks as $task): ?>
				<? $time = ORM::factory('WorkTimes')
						->where('project_id', '=', $project->id)
						->where('task_id', '=', $task->id)
						->find_all();
				$diff    = array();
				$price   = 0;
				foreach ($time as $t) {
					$interval = My::TimeBetwin($t->time_begin, $t->time_end);
					$diff[]   = $interval['timestamp'];
					$price += round(($interval['timestamp'] / (3600 * 8)) * $t->worker->work_price);
				}
				$global_price += $price;
				$itogo = My::SummOffTimes($diff);

				$global_itogo[] = $itogo['timestamp'];

				?>
				<? $realiz = $task->workers->find_all(); ?>


				<tr <?= $task->status == 2 ? "class='blue'" : '' ?>>
					<td><?= $task->name ?></td>
					<td><?= My::$ststuses[$task->status] ?></td>
					<td>
						<? foreach ($realiz as $r): ?>
							<?= $r->name ?> <?= $r->secondename ?> <?= $r->firstname ?>
						<? endforeach ?>
					</td>
					<td><?= $task->boss->name ?> <?= $task->boss->secondename ?> <?= $task->boss->firstname ?></td>
					<td><?= $task->description ?></td>
					<td><?= $itogo[0] . ' час.' . $itogo[1] . ' мин.' ?></td>
					<td><?= preg_replace("|([0-9]*)([0-9]{3})|is", "$1 $2", $price) ?> руб.</td>
				</tr>
			<? endforeach ?>
			<? $global_itogo = My::SummOffTimes($global_itogo) ?>
			<tr>
				<td colspan = "5" style = "text-align: right;font-weight: bold">Итого времени потрачено на проект</td>
				<td><?= $global_itogo[0] . " час." . $global_itogo[1] . " мин." ?></td>
				<td><?= preg_replace("|([0-9]*)([0-9]{3})|is", "$1 $2", $global_price) . " руб." ?></td>
			</tr>
		</table>
	</div>
	<div id="user">
		<?=View::factory('forms/filter_objects')?>
	</div>
</div>