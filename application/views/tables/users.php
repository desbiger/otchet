<? $users = ORM::factory('Workers')
		->find_all() ?>
<h2>Пользователи</h2>
<style type = "text/css">
	.base_table tr:hover td {
		background-color: #fff2cb;
		cursor: pointer;
	}

</style>
<script type = "text/javascript">
	$(function () {
		$('.base_table tr td').click(function () {
			var id = $(this).parent('tr').attr('rel');
			document.location.href = '/user/profile/' + id;
		});
	});
</script>
<table class = "base_table">
	<tr>
<!--		<td>Фото</td>-->
		<td>Фамилия</td>
		<td>Имя</td>
		<td>Отчество</td>
		<td>Статус</td>
	</tr>
	<? foreach ($users as $task): ?>
		<tr rel = "<?= $task->id ?>">
<!--			<td><img src = "--><?//=My::ResizeImage($)?><!--" alt = ""/></td>-->
			<td rel = "<?= $task->id ?>"><?= $task->firstname ?></td>
			<td><?= $task->name ?></td>
			<td><?= $task->secondename ?> </td>
			<td><?= $task->status->name ?></td>
		</tr>
	<? endforeach ?>
</table>


 