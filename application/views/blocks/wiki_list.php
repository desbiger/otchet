<h2>Wiki</h2>
<a href = "#wiki_add" class="plus fancy"></a>
<table class = "base_table">
	<tr>
		<td>Название</td>
		<td>Текст</td>
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
<div style = "display: none">
	<div id = "wiki_add">
		<h3>Добавить запись</h3>
	</div>
</div>