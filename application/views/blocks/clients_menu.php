<? $projects = ORM::factory('Objects')
		->where('status', 'NOT IN', array(
				3
		))
		->order_by('name')
		->find_all() ?>
<ul class = "projects">
	<? foreach ($projects as $p): ?>
		<?$count_my_tasks = ORM::factory('Tasks')
				->join('task_workers')
				->on('task_workers.tasks_id', '=', 'tasks.id')
				->where('task_workers.worker_id', '=', WORKER_ID)
				->where('status', '=', 2)
				->where('project_id', '=', $p->id)
				->find_all();?>
		<li <?= $p->id == $project_id ? "class='curent_project'" : '' ?>>
			<a href = "/projects/project/<?= $p->id ?>" <?= $p->id == $project_id ? "style='font-weight:bold'" : '' ?>><?= $p->name ?></a>
		</li>
	<? endforeach ?>
</ul>