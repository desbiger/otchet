<?$projects = ORM::factory('Objects')->where('client_id','=',$client_id)->find_all()?>
<h2>Список проектов</h2>
<a class="plus fancy" href="#add_project"></a>
<div class="projects_left_menu">
	<ul>
		<?foreach($projects as $vol):?>
			<li<?=$curent_id == $vol->id? ' class="selected"':''?>>
				<a href="/clients/client/<?=$client_id?>/<?=$vol->id?>"><?=$vol->name?></a>
			</li>
		<?endforeach?>
	</ul>
</div>
<?=View::factory('forms/new_project')->bind('client_id',$client_id)?>