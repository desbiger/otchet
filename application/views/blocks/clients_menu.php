<? $clients = ORM::factory('Clients')
		->order_by('name')
		->find_all() ?>
<ul class = "projects">
	<? foreach ($clients as $p): ?>

		<li <?= $p->id == $id ? "class='curent_project'" : '' ?>>
			<a href = "/clients/client/<?= $p->id ?>" <?= $p->id == $id ? "style='font-weight:bold'" : '' ?>><?= $p->name ?></a>
		</li>
	<? endforeach ?>
</ul>