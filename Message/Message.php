<?php

namespace Message;

use Message\Message_Type as Message_Type;

class Message {

	/*Properties
	**
	**
	**
	*/

	public $type;

	public $token_array;

	public $elapsed_time;

	/*Methods
	**
	**
	**
	*/

	public function __construct(Message_Type $type, $token_array, $elapsed_time) {

		$this->type = $type;

		$this->token_array = $token_array;

		$this->elapsed_time =  $elapsed_time;

	}

	public function get_token_array() {

		return $this->token_array;

	}

	public function get_time() {

		return $this->elapsed_time;

	}

	public function get_type() {

		return $this->type;

	}

}
