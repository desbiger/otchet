<? $projects = ORM::factory('Objects')
		->find_all() ?>
<h2>Список проектов</h2>
<table class = "base_table">
	<tr>
		<td>Назване проекта / подбробно</td>
		<td>Описание проекта</td>
		<td>Задач выполнено</td>
		<td>Задач в работе</td>
		<td>Итого часов потрачено</td>
		<td>Стоимость работ</td>
	</tr>

	<? foreach ($projects as $project): ?>
		<? $tasks_all = ORM::factory('Tasks')
				->where('project_id', '=', $project->id)
				->where('status', '=', 1)
				->find_all()
				->count() ?>
		<? $tasks_in_work = ORM::factory('Tasks')
				->where('project_id', '=', $project->id)
				->where('status', '=', 2)
				->find_all()
				->count() ?>
		<?$time = ORM::factory('WorkTimes')
				->where('project_id', '=', $project->id)
				->find_all();
		$diff   = array();
		foreach ($time as $t) {
			$interval = My::TimeBetwin($t->time_begin, $t->time_end);
			$diff[]   = $interval['timestamp'];
		}
		$itogo = My::SummOffTimes($diff);
		?>
		<tr>
			<td><a href = "/otchet/project/<?= $project->id ?>"><?= $project->name ?></a></td>
			<td><?= $project->description ?></td>
			<td><?= $tasks_all ?></td>
			<td <?= $tasks_in_work ? "class='blue'" : '' ?>><?= $tasks_in_work ?></td>
			<td><?= $itogo[0] . ' час.' . $itogo[1] . " мин." ?></td>
		</tr>

	<? endforeach ?>
</table>