<?$work = ORM::factory('Workers')->find_all()?>
<?$boses = ORM::factory('Workers')->find_all()?>
<h3>Отбор по свойствам</h3>
<div class = "panel">
	<form action = "" method = "get">
		<table>
			<tr>
				<td>Выполнил задачу</td>
				<td>Поставил задачу</td>
				<td>Статус задачи</td>
				<td>В период с</td>
				<td>В период до</td>
			</tr>
			<tr>
				<td><?= Form::select('worker',My::Obj_fore_select($work,'id',array('name','firstname')),Arr::get($_GET,'worker')) ?></td>
				<td><?= Form::select('boss_of_task',My::Obj_fore_select($boses,'id',array('name','firstname')),Arr::get($_GET,'boss_of_task')) ?></td>
				<td><?= Form::select('status',My::$ststuses,Arr::get($_GET,'status')) ?></td>
				<td><?= Form::input('date_from',Arr::get($_GET,'date_from'),array('class'=>'date')) ?></td>
				<td><?= Form::input('date_to',Arr::get($_GET,'date_to'),array('class'=>'date')) ?></td>
			</tr>
		</table>
		<?=Form::submit('sub','Подобрать')?>
	</form>
</div>
<br/>
 