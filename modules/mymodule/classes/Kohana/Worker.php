<?

	class Kohana_Worker
	{
		static function UpdateAvatar($file_array, $worker_id)
		{
			$worker = ORM::factory('Workers', $worker_id);
			if ($worker->avatar) {
				unlink(DOCROOT . $worker->avatar_file->filename);
				ORM::factory('File', $worker->avatar)
						->delete();
			}
			$file_id = My::UploadFileCustomPath('avatars/worker_' . $worker_id, $file_array, 'worker', $worker_id);
			$worker->set('avatar', $file_id)
					->save();

		}

		static function GetAva($worker_id, $width, $height = null)
		{
			$worker = ORM::factory('Workers', $worker_id);
			$file_name = $worker->avatar_file->filename;
			$file_name = substr($file_name, 1, strlen($file_name));
			if ($worker->avatar && file_exists(DOCROOT . $file_name)) {
				if ($width != null || $height != null) {
					$src = My::ResizeImage('/' . $file_name, $width, $height);
				}
				else {
					$src = '/' . $file_name;
				}
			}
			else {
				$src = '/include/empty_ava.png';
			}
			return $src;
		}
	}
 