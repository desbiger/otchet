<script type="text/javascript">
	$(function () {
		$(".tabNavigation li").eq(localStorage.getItem("tab")).find("a").click();

		$(".tabNavigation li a").click(function () {
			localStorage.setItem("tab", $(".tabNavigation li > a.selected").parent().index());
		});
	});
</script>
<h2>Настройки модуля чтения почты</h2>
<div class="tabs">
	<ul class="tabNavigation">
		<li>
			<a href="#base">Подключение</a>
		</li>
		<li>
			<a href="#do">Настройки действий</a>
		</li>
		<li>
			<a href="#email_base">База email адресов</a>
		</li>
	</ul>
	<br/>

	<div id="base">
		<form action="" method="post">
			<?= Form::hidden('module_id', 'imap') ?>
			<?= Form::hidden('action', 'SetSettings') ?>
			<table class="base_table padding_inputs">
				<tr>
					<td>Настройка</td>
					<td>Значение</td>
				</tr>
				<tr>
					<td>Сервер подключения</td>
					<td><?= Form::input('server', $settings->server) ?></td>
				</tr>
				<tr>
					<td>Порт</td>
					<td><?= Form::input('port', $settings->port) ?></td>
				</tr>
				<tr>
					<td>Адрес</td>
					<td><?= Form::input('user', $settings->user) ?></td>
				</tr>
				<tr>
					<td>Пароль</td>
					<td><?= Form::input('pass', $settings->pass) ?></td>
				</tr>
				<tr>
					<td colspan="2"><?= Form::submit('sub', 'Сохранить') ?></td>
				</tr>
			</table>
		</form>
	</div>
	<div id="do">
		<h3>Условия</h3>

		<? $rules = unserialize(Settings::factory('imap')
				->GetVar('rule'));
			$projects = ORM::factory('Objects')
					->find_all();
			$projects = My::Obj_fore_select($projects, 'id', 'name');
			$task_Status = array_merge(array(''), My::$ststuses);
			$users = ORM::factory('Workers')
					->find_all();
			$users = My::Obj_fore_select($users, 'id', 'name');
		?>

		<form action="" method="post">
			<?= Form::hidden('action', 'rule') ?>
			<table class="base_table padding_inputs">
				<tr>
					<td>
						Условие
					</td>
					<td>
						Действие
					</td>
				</tr>
				<? foreach ($rules['mail_field'] as $key => $vol): ?>
					<tr>
						<td>
							<?=
								Form::select('rule[mail_field][]', array(
										'',
										'От',
										'Тема',
										'Кому'
								), $vol) ?> = <?= Form::input('rule[email][]', $rules['email'][$key]) ?>
						</td>
						<td>
							<?=
								Form::select('rule[do_field][]', array(
										'',
										'Создать задачу',
										'Удалить',
								), $rules['do_field'][$key]) ?> в проекте <?=
								Form::select('rule[project][]', $projects, $rules['project'][$key]) ?>
							                                    назначить отвественного
							<?=
								Form::select('rule[for_user][]', $users, $rules['for_user'][$key]) ?>
							                                    установить статус задачи
							<?=
								Form::select('rule[status][]', $task_Status, $rules['status'][$key]) ?>
						</td>
					</tr>
				<? endforeach ?>
				<tr>
					<td>
						<?=
							Form::select('rule[mail_field][]', array(
									'',
									'От',
									'Тема',
									'Кому'
							)) ?> = <?= Form::input('rule[email][]') ?>
					</td>
					<td>
						<?=
							Form::select('rule[do_field][]', array(
									'',
									'Создать задачу',
									'Удалить',
							)) ?> в проекте <?=
							Form::select('rule[project][]', $projects) ?>
						          назначить отвественного
						<?=
							Form::select('rule[for_user][]', $users) ?>
						          установить статус задачи
						<?=
							Form::select('rule[status][]', $task_Status) ?>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<?= Form::submit('sub', 'Сохранить') ?>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="email_base"></div>
</div>