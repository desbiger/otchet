<?

	class Kohana_My
	{
		static $month = array(
				'янв',
				'фев',
				'мар',
				'апр',
				'май',
				'июн',
				'июл',
				'авг',
				'сен',
				'окт',
				'ноя',
				'дек',
		);



		static function statusLine($procent, $color)
		{
			echo View::factory('grafics/procent_line')
					->bind('vol', $procent)
					->bind('color', $color);
		}

		static function convertDate($date)
		{

			$date = explode("-", $date);
			if (Arr::get($date, 1) != 0) {
				return $date[2] . " " . self::$month[(int)$date[1] - 1] . " " . $date[0] . " г.";
			}
			else {
				return false;
			}

		}

		static $status_color = array(
				'red',
				'green',
				'blue',
				'grey',
		);
		static $ststuses = array(
				'Не начато',
				"Завершено",
				"В работе",
				'Отменено'
		);

		static function UploadFile($file_array, $task_id, $title, $about)
		{
			$files = ORM::factory('File');
			if ($file_array['size'] > 0) {
				if ($file_name = Upload::save($file_array, $file_array['name'], $_SERVER['DOCUMENT_ROOT'] . '/upload/')) {
					$files->set('task_id', $task_id);
					$files->set('title', $title);
					$files->set('about', $about);
					$files->set('filename', str_replace($_SERVER['DOCUMENT_ROOT'] . "/upload/", "", $file_name));
					$files->set('type', $file_array['type']);
					$files->save();
					return true;
				}
				else {
					return false;
				};
			}
			else {
				return false;
			}

		}

		static function Obj_fore_select($object, $values, $names)
		{

			$res = array('');
			if (is_array($names)) {
				foreach ($object as $rec) {
					$string = '';
					foreach ($names as $coloumn_name) {
						$string .= $rec->$coloumn_name . " ";
					}
					$res[$rec->$values] = $string;
				}
			}
			else {
				foreach ($object as $vol) {
					$res[$vol->$values] = $vol->$names;
				}
			}
			return $res;
		}


		static function TimeBetwin($begin = 0, $end = 0)
		{

			$res = self::TimeToTimestamp($end) - self::TimeToTimestamp($begin);
			return self::TimestampToLightTime($res);
		}

		static function TimeToTimestamp($time)
		{
			$time = explode(':', $time);
			$res  = mktime((int)$time[0], (int)$time[1], (int)$time[2]);

			return $res;
		}

		static function TimestampToLightTime($timestamp = 0)
		{
			$hours   = floor($timestamp / 3600);
			$minutes = floor(($timestamp - ($hours * 3600)) / 60);
			return array(
					$hours,
					$minutes,
					'timestamp' => $timestamp
			);
		}

		static function SummOffTimes($intervals)
		{
			return self::TimestampToLightTime(array_sum($intervals));
		}

		static function TextFormat($string)
		{
//			$string = str_replace(array("\n","\r"," "), array("<br>","<br>","&nbsp"), $string);
			return $string;
		}
	}
 