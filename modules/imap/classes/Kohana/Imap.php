<?

	class Kohana_Imap
	{
		public $config;
		public $_connect;

		static function factory()
		{
			return new Kohana_Imap();
		}

		function connect()
		{
			$conf           = (object)$this->config;
			echo $string = '{' . $conf->host . ':' . $conf->port . '/imap/ssl}' . $conf->folder;
			$this->_connect = imap_open($string, $conf->user, $conf->pass);
			var_dump($this->_connect);
		}

		function Kohana_Imap()
		{
			$this->config = Kohana::$config->load('imap_email');
		    $this->connect();
		}

		function GetNewMail()
		{
			$mails = imap_search($this->_connect, 'UNSEEN');

			$structure = imap_fetchstructure($this->_connect, $mails);
			$boundary  = '';

			if ($structure->ifparameters) {
				foreach ($structure->parameters as $param) {
					if (strtolower($param->attribute) == 'boundary') {
						$boundary = $param->value;
					}
				}
			}

			$parts = array();
			// Get allparts to $parts
			return $this->getParts($structure, $parts);


		}

		function getParts($object, & $parts)
		{

			// Object is multipart
			if ($object->type == 1) {

				foreach ($object->parts as $part) {
					getParts($part, $parts);
				}
			}
			else {
				$p['type']    = $object->type;
				$p['encode']  = $object->encoding;
				$p['subtype'] = $object->subtype;
				$p['bytes']   = $object->bytes;
				if ($object->ifparameters == 1) {
					foreach ($object->parameters as $param) {
						$p['params'][] = array(
								'attr' => $param->attribute,
								'val' => $param->value
						);
					}
				}
				if ($object->ifdparameters == 1) {
					foreach ($object->dparameters as $param) {
						$p['dparams'][] = array(
								'attr' => $param->attribute,
								'val' => $param->value
						);
					}
				}
				$p['disp'] = null;
				if ($object->ifdisposition == 1) {
					$p['disp'] = $object->disposition;
				}
				$parts[] = $p;
			}
		}
	}
 