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

		/**
		 * Загрузка конфига
		 * @param $file
		 */
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
			return $this->getMessages($list);
		}

		/**
		 * Чистый текст сообщения
		 * @param $id_message
		 * @return string
		 */
		public function GetClearBody($id_message)
		{
			return imap_fetchbody($this->conn, $id_message, 1);
		}

		/**
		 * Получение массива писем из списка в виде массива идентификаторов
		 * @param $array
		 * @return array
		 */
		public function getMessages($array)
		{
			$res = array();
			foreach ($array as $vol) {
				$header = imap_fetch_overview($this->conn, $vol);

				$value = array(
						'message_id' => $vol,
						'subject' => $this->MimeDecode($header[0]->subject),
						'from' => $this->MimeDecode($header[0]->from),
						'body' => $this->GetClearBody($vol),
				);

				//				Добавляем таск
				Task::Add(array(
						'name' => 'Обращение от ' . strip_tags($value['from']) . '\/ тема: ' . $value['subject'],
						'description' => $value['body'],
						'project_id' => 8,
						'status' => 0,
				));

				imap_delete($this->conn, $vol);
				$this->GetAttachments($vol);
				$this->addToBase($value);
				$res[] = $value;
			}
			imap_expunge($this->conn);
			$this->_close();
			return $res;
		}

		public function ParsAddress($string)
		{

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

		/**
		 * Записываем письмо в базу
		 * @param $date
		 */
		public function addToBase($date)
		{
			ORM::factory('Mail') //					->set('date', $date['header']->date)
					->set('subject', $date['subject'])
					->set('message_id', $date['message_id'])//					->set('to', $date['header']->toaddress)
					->set('from', $date['from'])//					->set('size', $date['header']->Size)
					->set('body', $date['body'])
					//					->set('type', $date['structure']->type)
					//					->set('udate', $date['header']->udate)
					//					->set('charset', $date['structure']->parameters[0]->value)
					->save();
		}


		/**
		 * Сохраняем вложения
		 * @param $email_number
		 * @param string $folder
		 */
		public function GetAttachments($email_number, $folder = 'upload/email')
		{
			/* get information specific to this email */
			$overview = imap_fetch_overview($this->conn, $email_number, 0);

			/* get mail message */
			$message = imap_fetchbody($this->conn, $email_number, 2);

			/* get mail structure */
			$structure = imap_fetchstructure($this->conn, $email_number);

			$attachments = array();

			/* if any attachments found... */
			if (isset($structure->parts) && count($structure->parts)) {
				for ($i = 0; $i < count($structure->parts); $i++) {
					$attachments[$i] = array(
							'is_attachment' => false,
							'filename' => '',
							'name' => '',
							'attachment' => ''
					);

					if ($structure->parts[$i]->ifdparameters) {
						foreach ($structure->parts[$i]->dparameters as $object) {
							if (strtolower($object->attribute) == 'filename') {
								$attachments[$i]['is_attachment'] = true;
								$attachments[$i]['filename']      = $object->value;
							}
						}
					}

					if ($structure->parts[$i]->ifparameters) {
						foreach ($structure->parts[$i]->parameters as $object) {
							if (strtolower($object->attribute) == 'name') {
								$attachments[$i]['is_attachment'] = true;
								$attachments[$i]['name']          = $object->value;
							}
						}
					}

					if ($attachments[$i]['is_attachment']) {
						$attachments[$i]['attachment'] = imap_fetchbody($this->conn, $email_number, $i + 1);

						/* 4 = QUOTED-PRINTABLE encoding */
						if ($structure->parts[$i]->encoding == 3) {
							$attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
						}
						/* 3 = BASE64 encoding */
						elseif ($structure->parts[$i]->encoding == 4) {
							$attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
						}
					}
				}
			}

			/* iterate through each attachment and save it */
			foreach ($attachments as $attachment) {
				if ($attachment['is_attachment'] == 1) {
					$filename = $attachment['name'];
					if (empty($filename)) {
						$filename = $attachment['filename'];
					}

					if (empty($filename)) {
						$filename = time() . ".dat";
					}

					/* prefix the email number to the filename in case two emails
					 * have the attachment with the same file name.
					 */
					echo DOCROOT . $folder . '/' . $email_number . "-" . $filename;
					if (file_put_contents(DOCROOT . $folder . '/' . $email_number . "-" . $filename, $attachment['attachment'])) {
						ORM::factory('MailAttach')
								->set('file_name', $filename)
								->set('new_file_name', $email_number . "-" . $filename)
								->set('dir', $folder)
								->set('message_id', $email_number)
								->save();
					};
				}

			}

		}

	}
 