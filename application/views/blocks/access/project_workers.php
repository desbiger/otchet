<h2>Настройки доступа к проекту</h2>
<a class="plus" href="#"></a>
<ul class="project_worker">
	<? foreach ($project_users as $user): ?>
		<li>
			<a href="">
				<div class="ava">
					<img src="<?= Worker::GetAva($user->worker_id, 130, 200) ?>" alt=""/>
				</div>
				<?= $user->worker->name ?> <?= $user->worker->firstname ?>
			</a>
		</li>
	<? endforeach ?>
</ul>