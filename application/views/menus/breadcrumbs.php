<div class = "breadcrumbs">
	<ul>
		<? $i = 0; ?>
		<? foreach ($nodes as $k => $v): ?>
			<? $i++; ?>
			<li><a href = "<?=$k?>"><?=$v?></a></li>
			<?= $i < count($nodes) ? " ->" : '' ?>
		<? endforeach ?>
	</ul>
</div>