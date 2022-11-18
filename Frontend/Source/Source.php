<?php

namespace Frontend\Source;

abstract class Source {

	/*Properties
	**
	**
	**
	*/

	public $program;

	public $open_file;

	public int $current_line_number;

	public string $current_line;

	public int $current_char_position;

	public string $current_char;

	public $peek;
	
	/*Methods
	**
	**
	**
	*/

	public function __construct() {}

	abstract public function current_char();

	abstract public function make_line();

	abstract public function next_char();

	abstract public function peek_char();

	abstract public function get_program();

	abstract public function get_current_position();

	abstract public function get_current_line();

	abstract public function get_current_line_number();

}
