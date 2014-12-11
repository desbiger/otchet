<script type="text/javascript">
	$(function () {
		$('a.user_add').click(function () {

			var worker_id = $(this).attr('id');
			var project_id = $(this).attr('project');
			$('.conteyner').html('<img src="/include/img/ajax_loading.gif" />');
			$.get('/ajax/shareProject/?worker_id=' + worker_id + '&project_id=' + project_id, function (data) {
				$.fancybox.close();
				$('.conteyner').html(data);
			});
		});
	})
</script>
<h2>Настройки доступа к проекту</h2>
<a class="plus fancy" href="#users"></a>
<ul class="project_worker conteyner">
	<?$in_project = array(0);?>
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
</ul>
<div style="display: none" class="not_in_access">
	<? $users = ORM::factory('Workers')
			->where('id', 'NOT IN', $in_project)
			->find_all() ?>
	<div id="users">
		<ul class="project_worker">
			<? foreach ($users as $vol): ?>
				<li>
					<a href="#" class="user_add" id="<?= $vol->id ?>" project="<?= $project_id ?>">
						<div class="ava">
							<img src="<?= Worker::GetAva($vol->id, 130, 200) ?>" alt=""/>
						</div>
						<?= $vol->name ?> <?= $vol->firstname ?>
					</a>
				</li>
			<? endforeach ?>
		</ul>
	</div>
</div>