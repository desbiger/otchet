<?

	class Kohana_Wiki
	{

		static function Add($name, $text, $project_id)
		{
			$wiki = ORM::factory('ProjectWiki');
			return $wiki->set('name', $name)
					->set('text', $text)
					->set('project_id', $project_id)
					->save();
		}

	}
 