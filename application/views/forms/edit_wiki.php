<?$wiki = ORM::factory('ProjectWiki',$id)?>
<?$files = ORM::factory('File')->where('for','=','wiki')->where('for_id','=',$id)->find_all()?>
<div class="breadcrumbs">
	<ul>
		<li><a href = "/">Главная</a></li> ->
		<li><a href = "/projects/project/<?=$wiki->project->id?>"><?=$wiki->project->name?></a></li> ->
		<li><a href = "/projects/wikiedit/<?=$id?>"><?=$wiki->name?></a></li>
	</ul>
</div>
<h2>Редактирование записи <?=$wiki->name?> (автор <?=$wiki->worker->name?> <?=$wiki->worker->firstname?>)</h2>

<form action = "" method = "post" enctype="multipart/form-data">
	<?=Form::hidden('author',$wiki->author)?>
	<table>
		<tr>
			<td>Название записи</td>
		</tr>
		<tr>
			<td>
				<?= Form::input('name', $wiki->name, array('style' => 'width:100%')) ?>
			</td>
		</tr>
		<tr>
			<td>Текст</td>
		</tr>
		<tr>
			<td>
				<?= Form::textarea('text', $wiki->text, array('class' => 'tiny')) ?>
			</td>
		</tr>
		<?if($files->count()):?>
				<tr>
					<td>Прикрепленные файлы</td>
				</tr>
			<tr>
				<td>
					<?foreach($files as $file):?>
						<a href = "/upload/<?=$file->filename?>"><?=$file->filename?></a>
						<a href = "/projects/wikifiledelete/<?= $file->id ?>">Удалить файл</a> <br/>
					<?endforeach?>
				</td>
			</tr>
		<?endif?>
		<tr>
			<td>
				Прикрепить файл(ы)
			</td>
		</tr>
		<tr>
			<td>
				<?=Form::file('file1')?><br>
				<?=Form::file('file2')?><br>
				<?=Form::file('file3')?><br>
				<?=Form::file('file4')?><br>
				<?=Form::file('file5')?><br>
				<?=Form::file('file6')?><br>
			</td>
		</tr>
		<tr>
			<td><?= Form::submit('wiki_add', 'Обновить') ?></td>
		</tr>
	</table>
</form>