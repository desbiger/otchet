<?

	class Kohana_Settings
	{
		public $module_id;

		static function factory($module_id)
		{
			return new Settings($module_id);
		}

		function __construct($module_id)
		{
			$this->module_id = $module_id;
		}

		public function GetVar($var)
		{
			$r = ORM::factory('Settings')
					->where('module_id', '=', $this->module_id)
					->where('variable', '=', $var)->find();
			if ($r->loaded()) {
				return $r->value;
			}
			else {
				return false;
			}
		}

		public function SetVar($var, $value)
		{
			$record = ORM::factory('Settings');

			if ($this->GetVar($var)) {
//				die($var);
				$record->where('module_id', '=', $this->module_id)
						->where('variable', '=', $var)->find();

			}
			$record->set('module_id', $this->module_id)
					->set('variable', $var)
					->set('value', $value)
					->save();
			return $this;
		}

		public function ClearAll()
		{

		}
	}
 