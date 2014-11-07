<?

	class Kohana_ParseMail
	{
		protected $source;
		public $from;
		public $to;
		public $subject;
		public $body;
		public $size;
		public $type;
		public $date;
		public $message_id;
		public $id;

		static function factory($id)
		{
			return new ParseMail($id);
		}

		function __construct($id)
		{
			$this->source = ORM::factory('Mail', $id);

			$this->from = $this->source->from;
			$this->to = $this->source->to;
			$this->subject = $this->source->subject;
			$this->body = $this->source->body;
			$this->size = $this->source->size;
			$this->type = $this->source->type;
			$this->date = $this->source->date;
			$this->message_id = $this->source->message_id;
			$this->id = $this->source->id;

			$this->source = '';
		}

		function getMessage()
		{
			return $this->source;
		}
	}
 