<?

	class Kohana_Acl
	{

		protected $project_access;

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
					->logged_in('Admin')
			) {
				return true;
			}
			else {
				$obj = ORM::factory('ProjectAccess')
						->where('worker_id', '=', $worker_id)
						->where('project_id', '=', $project_id);
				return $obj->loaded();
			}
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
					$res[] = $vol['worker_id'];
				}
				return $res;
			}
			else {
				return $list;
			}
		}
	}
 