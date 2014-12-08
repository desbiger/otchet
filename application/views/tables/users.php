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
		<td style="width: 100px;">Фото</td>
		<td>Фамилия</td>
		<td>Имя</td>
		<td>Отчество</td>
		<td>Статус</td>
	</tr>
	<? foreach ($users as $user): ?>
		<tr rel = "<?= $user->id ?>">
			<td><img width="50" src = "<?= Worker::GetAva($user->id,50)?>" alt = ""/></td>
			<td rel = "<?= $user->id ?>"><?= $user->firstname ?></td>
			<td><?= $user->name ?></td>
			<td><?= $user->secondename ?> </td>
			<td><?= $user->status->name ?></td>
		</tr>
	<? endforeach ?>
</table>


 