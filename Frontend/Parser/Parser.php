<?php

namespace Frontend\Parser;

use Intermediate\AST as AST;
use Intermediate\Sym_Tab as Sym_Tab;
use Frontend\Scanner\Scanner as Scanner;
use Intermediate\Symbol_Table\Symbol_Table_Factory as Symbol_Table_Factory;
use Message\Message_Handler as Message_Handler;
use Message\Message_Producer as Message_Producer;
use Message\Message_Listener as Message_Listener;
use Message\Message as Message;

class Parser implements Message_Producer {

	/*Properties
	**
	**
	**
	*/

	public $scanner;
	public $config;
	public $ast;
	public $symbol_table_stack; // there will be only one symbol table, must be set as single.
	public $message_handler; // the container for the message listeners

	/*Methods
	**
	**
	**
	*/

	public function __construct(Scanner $scanner, $config) {

		$this->scanner = $scanner;

		$this->config = $config;

		$this->ast = null;

		$this->symbol_table_stack = Symbol_Table_Factory::create_stack();

		$this->message_handler = Message_Handler::get_instance();

	}

	public function add_listener(Message_Listener $message_listener):void {

		$this->message_handler->add_listener($message_listener);

	}

	public function remove_listener(Message_Listener $message_listener):void {

		//stubbed

	}

	public function send_message(Message $message):void {

		$this->message_handler->send_message($message);

	}

	public function parse() {


	}

	public function current_token() {

		return $this->scanner->current_token();

	}

	public function next_token() {

		return $this->scanner->next_token();

	}

}
