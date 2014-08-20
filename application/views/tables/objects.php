<? $objects = ORM::factory('Objects')
		->order_by('name')
		->find_all()?>
<h2>Список проектов
	<i class = "project" style = "float: right"></i>
</h2>
<a href = "#add_project" class = "fancy plus" title = "Добавить проект"></a>
<table class = "base_table">
	<tr>
		<td>Название объекта</td>
		<td>Статус проекта</td>
		<td>Описание объекта</td>
		<td>Ваших задач в работе</td>
	</tr>
	<? foreach ($objects as $vol): ?>
		<?$tasks = ORM::factory('Tasks')
				->join('task_workers')
				->on('task_workers.tasks_id', '=', 'tasks.id')
				->where('task_workers.worker_id', '=', WORKER_ID)
				->where('status', '=', 2)
				->where('project_id', '=', $vol->id)
				->find_all();?>
		<tr <?= $tasks->count() ? "class='blue'" : '' ?>>
			<td style = "font-weight: bold; font-size: 14px"><a href = "/projects/project/<?= $vol->id ?>"><?= $vol->name ?></a></td>
			<td><?=$vol->stat->name?></td>
			<td><?= $vol->description ?></td>
			<td style = "text-align: center"><?= $tasks->count() ?></td>
		</tr>
	<? endforeach ?>
</table>