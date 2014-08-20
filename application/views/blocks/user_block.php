<div class = "user_block">
	<a href = "/user/profile/<?=WORKER_ID?>"><?=
			ORM::factory('Workers')
					->where('user_id', '=', Auth::instance()
							->get_user()->id)
					->find()->name ?></a>, добро пожаловать <br/>
	<a href = "/login/logout/">Выход</a>
</div>



 