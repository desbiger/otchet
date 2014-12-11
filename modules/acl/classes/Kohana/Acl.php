<?

	class Kohana_Acl
	{

		protected $project_access;

		static public $admin_role = 'Admin'; //Роль админа

		static function factory()
		{
			return new Acl();
		}

		function __construct()
		{
			$this->project_access = ORM::factory('ProjectAccess');
		}

		static function CheckAccess($worker_id, $project_id)
		{
			if (Auth::instance()
					->logged_in(self::$admin_role)
			) {
				return true;
			}
			else {
				$obj = ORM::factory('ProjectAccess')
						->where('worker_id', '=', $worker_id)
						->where('project_id', '=', $project_id)
						->find();
				return $obj->loaded();
			}
		}

		static function CheckClientAccess($client_id)
		{
			$client = ORM::factory('Clients', $client_id);
			$res    = false;
			foreach ($client->projects->find_all() as $project) {

				if (self::CheckAccess(WORKER_ID, (int)$project->id)) {
					return true;
					exit;
				}
			}
			return $res;
		}

		public function GreateGroup($users)
		{

		}

		public function ShareProjectToUser($project_id, $worker_id)
		{

			if ($this->project_access->where('project_id', '=', $project_id)
					->where('worker_id', '=', $worker_id)
					->loaded()
			) {
				return true;
			}
			else {
				return $this->project_access->set('project_id', $project_id)
						->set('worker_id', $worker_id)
						->save();
			}
		}

		protected function UnshareProjectToUser($project_id, $worker_id)
		{
			$access = $this->project_access->where('project_id', '=', $project_id)
					->where('worker_id', '=', $worker_id)
					->delete();
			return $access;
		}

		public function GetProjectUsers($project_id, $as_array = true)
		{
			$list = $this->project_access->where('project_id', '=', $project_id)
					->group_by('worker_id')
					->find_all();
			if ($as_array) {
				$res = array();
				foreach ($list as $vol) {
					$res[] = $vol->worker_id;
				}
				return $res;
			}
			else {
				return $list;
			}
		}

		/**
		 * Возвращает массив ID проектов к котороым текущий пользователь имеет доступ
		 * @return array
		 */
		public function GetMyProjects()
		{
			if (Auth::instance()
					->logged_in(self::$admin_role)
			) {
				$projects = ORM::factory('Objects')
						->find_all(true);
				$res      = array(0);
				foreach ($projects as $p) {
					$res[] = $p->id;
				}
				return $res;
			}
			else {
				$projects = $this->project_access->where('worker_id', '=', WORKER_ID);
				foreach ($projects->find_all() as $project) {
					$res[] = $project->project_id;
				}
				return count($res) > 0 ? $res : array(0);
			}

		}


		public function GetMyClients()
		{

			if (Auth::instance()
					->logged_in(self::$admin_role)
			) {
				$clients = ORM::factory('Clients')
						->find_all(true);
				$res     = array(0);
				foreach ($clients as $vol) {
					$res[] = $vol->id;
				}
				return $res;
			}
			else {
				$res                        = array(0);
				$projects                   = $this->GetMyProjects();
				$result = '';
				Profiler::start('Model','Objects');
				$clients = ORM::factory('Objects')
						->where('id', 'in', $projects)
						->group_by('client_id')
//						->client->where('create_by','=',WORKER_ID)
						;
				Profiler::stop($result);
//				echo View::factory('profiler/stats');
				foreach ($clients->find_all() as $client) {
					$res[] = $client->client_id;
				}
				return count($res) > 0 ? $res : array(0);
			}
		}

		public function GetProjectOwner($project_id)
		{
			$project = ORM::factory('Objects')
					->where('id', '=', $project_id)
					->find();
			if ($project->loaded()) {
				return $project->client->create_by;
			}
			else {
				return false;
			}
		}
	}
 