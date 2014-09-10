<?

	class Kohana_Comments //моудль работы с коментариями
	{
		public $task; //объект ORM задача
		public $task_id; //id задачи
		public $tasks; //объект ORM задач где текущий пользователь принимал участие
		public $worker_id; //id ткущего пользователя
		public $comments; //объект ORM коментариев задачи или Все коментарии где пользователь принимал участие
		public $workers = array(); //Массив id учатсников задачи
		public $date; //текущая дата
		public $time; //текущее время

		/**
		 * @param null $task_id
		 * @return Comments
		 * завод метод
		 */
		static function Factory($task_id = null)
		{
			if ($task_id) {

				$task        = ORM::factory('Tasks', $task_id);
				$task_object = new Comments($task);
			}
			else {
				$task_object = new Comments();
			}


			return $task_object;

		}

		function __construct($task = null)
		{
			$this->worker_id = WORKER_ID;
			$this->date      = date('Y-m-d');
			$this->time      = date('H:i:s');

			if ($task) {
				$this->task_id  = $task->id;
				$this->task     = $task;
				$this->comments = $task->comments->find_all();
				$this->workers  = $this->GetTaskWorkers();
			}
			else {

				$this->comments = $this->TasksWithWorker();
				$this->tasks    = $this->TasksWithWorker();
			}

			return $this;
		}

		function GetAllComments()
		{

		}

		/**
		 * @return $this
		 * Находит все коментарии задач, в которых текущий пользователь принимает участие
		 */
		function CommentsWithWorker()
		{
			$tasks = ORM::factory('Tasks')
					->join('task_workers')
					->on('tasks.id', '=', 'task_workers.tasks_id')
					->where('task_workers.worker_id', '=', $this->worker_id)
					->or_where('tasks.boss_of_task', '=', $this->worker_id)
					->group_by('tasks.id')
					->find_all();

			foreach ($tasks as $task) {
				$array[] = $task->id;
			}
			$comments = ORM::factory('TaskComments')
					->where('task_id', 'IN', $array)
					->find_all();

			return $comments;
		}

		/**
		 * @return Database_Result
		 * Задачи с участием текущего пользователя
		 */
		function TasksWithWorker()
		{
			$tasks = ORM::factory('Tasks')
					->join('task_workers')
					->on('tasks.id', '=', 'task_workers.tasks_id')
					->where('task_workers.worker_id', '=', $this->worker_id)
					->or_where('tasks.boss_of_task', '=', $this->worker_id)
					->group_by('tasks.id')
					->find_all();
			return $tasks;
		}

		/**
		 * получаем айди всех участников задачи
		 */
		function GetTaskWorkers()
		{
			$workers = array();
			if ($this->task) {
				if ($this->task->worker_id) {
					$workers[] = $this->task->worker_id;
				}
				if ($this->task->boss_of_task) {
					$workers[] = $this->task->boss_of_task;
				}
			}
			foreach ($this->task->workers->find_all() as $worker) {
				if (!in_array($worker->id, $workers)) {
					$workers[] = $worker->id;
				}
			}
			return $workers;
		}

		/**
		 * @return Database_Result
		 * получаем все новые коментарии для текущего пользователя
		 */
		function NewComments()
		{
			return ORM::factory('NewComment')
					->where('worker_id', '=', WORKER_ID)
					->find_all();

		}

		/**
		 * @param $text
		 * @return ORM
		 * Добавляет коментарий к задаче
		 */
		function add($text) //добавляем запись коментария
		{
			$comment_id = ORM::factory('TaskComments')
					->set('text', $text)
					->set('task_id', $this->task_id)
					->set('ovner', $this->worker_id)
					->set('date', $this->date)
					->set('time', $this->time)
					->save();
			foreach ($this->workers as $worker_id) {
				if ($worker_id != $this->worker_id) {
					ORM::factory('NewComment')
							->set('task_id', $this->task_id)
							->set('comment_id', $comment_id)
							->set('worker_id', $worker_id)
							->save();
				}
			}
			return $comment_id;
		}

		/**
		 * Удалаяет запись в базе о непрочитанных коментариях
		 */
		function CommentRead()
		{
			if ($this->task_id) {
				$records = ORM::factory('NewComment')
						->where('task_id', '=', $this->task_id)
						->and_where('worker_id', '=', $this->worker_id)
						->find_all();
				foreach($records as $r){
					ORM::factory('NewComment',$r->id)->delete();
				}
			}
		}
	}
 