<?

	class Kohana_EmailReader
	{

		public $conn;
		private $_inbox;
		private $_msgCnt;
		private $_server;
		private $_user;
		private $_pass;
		private $_port;
		private $_type = 'pop3';

		public function __construct($file = 'imap_email')
		{
			$this->LoadConfig($file);
			$this->_connect();
			//			$this->_inbox();
		}

		private function LoadConfig($file)
		{
			$config        = Kohana::$config->load($file);
			$this->_server = $config['host'];
			$this->_user   = $config['user'];
			$this->_pass   = $config['pass'];
			$this->_port   = $config['port'];
		}

		/** @param None
		 * @return Void
		 * Closes the connection
		 */
		private function _close()
		{
			$this->_inbox  = array();
			$this->_msgCnt = 0;
			imap_close($this->conn);
		}

		/** @param None
		 * @return Void
		 * Opens a connection
		 */
		private function _connect()
		{
			$this->conn = imap_open('{' . $this->_server . ':' . $this->_port . '/' . $this->_type . '}', $this->_user, $this->_pass);
		}

		/** @param int $msgIndex Index of a message
		 * @param string $folder The name of a folder
		 * @return Void
		 * Moves a message to a new folder
		 */
		public function move($msgIndex, $folder = 'INBOX.Processed')
		{
			// move on server
			imap_mail_move($this->conn, $msgIndex, $folder);
			imap_expunge($this->conn);
			// re-read the inbox
			$this->_inbox();
		}

		/** @param int $mgsIndex Index of a message
		 * @return array The associative array of a message
		 * Gets a specific message
		 */
		public function get($msgIndex = null)
		{
			$this->_inbox();
			if (count($this->_inbox) <= 0) {
				return array();
			}
			elseif (!is_null($msgIndex) && isset($this->_inbox[$msgIndex])) {
				return $this->_inbox[$msgIndex];
			}
			//			$this->addToBase($this->_inbox[0]);
			return $this->_inbox[0];
		}

		/** @param None
		 * @return array The associative array of each message
		 * Reads the inbox
		 */
		private function _inbox()
		{
			$this->_msgCnt = imap_num_msg($this->conn);

			$in = array();
			for ($i = 1; $i <= $this->_msgCnt; $i++) {
				$in[] = array(
						'index' => $i,
						'header' => imap_headerinfo($this->conn, $i),
						'body' => imap_body($this->conn, $i),
						'structure' => imap_fetchstructure($this->conn, $i)
				);
			}
			$this->_inbox = $in;
		}

		/**
		 * Возвращает массив непросмотренных писем
		 * @return array
		 */
		public function getUnseen()
		{
			$list = imap_search($this->conn, 'UNSEEN');
			//			return $list;

			return $this->getMessages($list);
		}

		public function getMessages($array)
		{
			$res = array();
			foreach ($array as $vol) {
				$header = imap_fetch_overview($this->conn, $vol);

				$value = array(
						'index' => $vol,
					//						'header' => imap_fetch_overview($this->conn, $vol),
						'subject' => $this->MimeDecode($header[0]->subject),
						'from' => $this->MimeDecode($header[0]->from),
						'body' => imap_qprint(imap_body($this->conn, $vol)),
				);
				//				$this->addToBase($value);
				$res[] = $value;
			}
			return $res;
		}

		/** @param None
		 * @return array The inbox associative array
		 * Gets the inbox associative array
		 */
		public function getInbox()
		{
			$this->_inbox();
			$inbox = $this->_inbox;
			return $inbox;
		}


		/**
		 * Декодируем Mime формат в одну строку
		 * @param $string
		 * @return string
		 */
		public function MimeDecode($string)
		{
			$s   = imap_mime_header_decode($string);
			$res = '';
			foreach ($s as $vol) {
				$res .= $vol->text;
			}
			return $res;
		}

		public function addToBase($date)
		{
			ORM::factory('Mail')
					->set('date', $date['header']->date)
					->set('subject', $date['header']->subject)
					->set('message_id', $date['header']->message_id)
					->set('to', $date['header']->toaddress)
					->set('from', $date['header']->fromaddress)
					->set('size', $date['header']->Size)
					->set('body', $date['body'])
					->set('type', $date['structure']->type)
					->set('udate', $date['header']->udate)
					->set('charset', $date['structure']->parameters[0]->value)
					->save();
			$this->delMessage($date['index']);
		}

		public function delMessage($i)
		{

		}

	}
 