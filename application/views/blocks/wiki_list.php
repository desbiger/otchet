<h2>Wiki</h2>
<a href = "/projects/newwiki/<?=$id?>" class = "plus"></a>
<table class = "base_table">
	<tr>
		<td>Название</td>
		<td>Текст</td>
<!--		<td>Удалить</td>-->
	</tr>

	<? if (count($wiki)): ?>
		<? foreach ($wiki as $w): ?>
			<tr>
				<td><?= $w->name ?></td>
				<td><?= $w->text ?></td>
			</tr>
		<? endforeach ?>
	<? endif ?>
</table>
