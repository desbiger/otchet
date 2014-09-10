<?

	class Kohana_Worker
	{
		static function UpdateAvatar($file_array, $worker_id)
		{
			$worker = ORM::factory('Workers', $worker_id);
			if ($worker->avatar) {
				unlink(DOCROOT . $worker->avatar_file->filename);
				ORM::factory('File',$worker->avatar)->delete();
			}
			$file_id = My::UploadFileCustomPath('avatars/worker_' . $worker_id, $file_array, 'worker', $worker_id);
			$worker->set('avatar', $file_id)
					->save();

		}
	}
 