<?$projects = ORM::factory('Objects')->where('client_id','=',$client_id)->find_all()?>
<h2>Список проектов</h2>
<div class="projects_left_menu">
	<ul>
		<?foreach($projects as $vol):?>
			<li<?=$curent_id == $vol->id? ' class="selected"':''?>>
				<a href="/clients/client/<?=$client_id?>/<?=$vol->id?>"><?=$vol->name?></a>
			</li>
		<?endforeach?>
	</ul>
</div>