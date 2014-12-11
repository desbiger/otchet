<? foreach ($project_users as $user): ?>
	<? $in_project[] = $user->worker->id ?>
	<li>
		<a href="">
			<div class="ava">
				<img src="<?= Worker::GetAva($user->worker_id, 130, 200) ?>" alt=""/>
			</div>
			<?= $user->worker->name ?> <?= $user->worker->firstname ?>
		</a>
	</li>
<? endforeach ?>