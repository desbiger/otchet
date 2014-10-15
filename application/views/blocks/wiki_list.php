<h2>Wiki</h2>
<a href = "/projects/newwiki/<?= $id ?>" class = "plus"></a>

<? if (count($wiki)): ?>
	<? foreach ($wiki as $w): ?>
		<? $files = ORM::factory('File')
				->where('for', '=', 'wiki')
				->where('for_id', '=', $w->id)
				->find_all() ?>
		<div class = "wiki_block">
			<h3>
				<a title = "Редактировать" href = "/projects/wikiedit/<?= $w->id ?>"><?= $w->name ?></a>
				<a style = "font-size: 12px" href = "/user/profile/<?= $w->author ?>">(автор - <?= $w->worker->name ?>
					<?= $w->worker->firstname ?>)</a>
			</h3>

			<div class = "text">
				<? if ($files->count()): ?>
						Прикрепленные файлы:
					<div class="files">
						<?foreach($files as $file):?>
							<a  target="_new" href = "/upload/<?= $file->filename ?>"><?=$file->filename ?></a>
						<?endforeach?>
					</div>
				<? endif ?>
				<?= $w->text ?>
			</div>
		</div>
	<? endforeach ?>
<? endif ?>

