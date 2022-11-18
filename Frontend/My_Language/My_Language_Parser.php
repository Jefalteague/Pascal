<?php

namespace Frontend\My_Language;

use Frontend\Scanner\Scanner as Scanner;

use Frontend\Parser\Parser as Parser;

use Message\Message as Message;

use Message\Message_Type as Message_Type;

class My_Language_Parser extends Parser {

	/*Properties
	**
	**
	**
	*/

	/*Methods
	**
	**
	**
	*/

	public function __construct(Scanner $scanner, $config) {

		parent::__construct($scanner, $config);

	}

	public function parse():void {

		$token_class = NULL;

		$message_array = [];

		$start_time = (float)microtime();

		while(!($token_class == 'Frontend\Token\EOF_Token')) {

			$token = $this->next_token();

			array_push($message_array, $token);

			$token_class = get_class($token);

		}

		$end_time = (float)microtime();

		$elapsed_time = $end_time - $start_time;

		if($this->config['messaging'] == TRUE) {

			$type = Message_Type::PARSER_SUMMARY;

			$message = new Message($type, $message_array, $elapsed_time);
	
			$this->send_message($message);

		}

	}

}
