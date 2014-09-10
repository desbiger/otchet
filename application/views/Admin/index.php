<?$nodes = array(
		'/' => 'Главная',
		'/otchet' => 'Раздел руководителя',
)?>
<?=
	View::factory('/menus/breadcrumbs')
			->bind('nodes', $nodes) ?>

<h2>Раздел руководителя</h2>
<form action = "" method="post" enctype="multipart/form-data">
<input type = "file" name="avatar"/>
	<input type = "submit" value="Загрузить"/>
</form>
<div class = "tabs">
	<ul class = "tabNavigation">
		<li><a href = "#projects">Проекты</a></li>
		<li><a href = "#users">Пользователи</a></li>
		<li><a href = "#gen">Генератор отчетов</a></li>
	</ul>
	<div id = "projects">
		<?= View::factory('Admin/Projects_list') ?>
	</div>
	<div id = "users">
		<?= View::factory('Admin/users') ?>
	</div>
	<div id = "gen"></div>

</div>