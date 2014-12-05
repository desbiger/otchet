<?$modules = (object)array(
		'imap' => (object)array(
						'name' => 'Модуль чтения почты'
				)
)?>
<h2>Модули</h2>
<div class="projects_left_menu">
	<ul>
		<? foreach ($modules as $key => $vol): ?>
			<li<?= $current_id == $key ? ' class="selected"' : '' ?>>
				<a href="/settings/module/<?= $key ?>"><?= $vol->name ?></a>
			</li>
		<? endforeach ?>
	</ul>
</div>