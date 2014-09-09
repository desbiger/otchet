<h3>Добавить запись</h3>

<form action = "" method = "post">
	<?=Form::hidden('author',WORKER_ID)?>
	<table>
		<tr>
			<td>Название записи</td>
		</tr>
		<tr>
			<td>
				<?= Form::input('wiki_name', null, array('style' => 'width:100%')) ?>
			</td>
		</tr>
		<tr>
			<td>Текст</td>
		</tr>
		<tr>
			<td>
				<?= Form::textarea('text', null, array('class' => 'tiny')) ?>
			</td>
		</tr>
		<tr>
			<td><?= Form::submit('wiki_add', 'Добавить') ?></td>
		</tr>
	</table>
</form>