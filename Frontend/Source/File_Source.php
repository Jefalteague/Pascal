<?php

namespace Frontend\Source;

use Frontend\Source\Source as Source;
use Frontend\My_Language\My_Language_Token_Type as My_Language_Token_Type;

class File_Source extends Source {

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

	public function __construct($program) {

		if(file_exists($program)) {

			$this->program = $program;

			$this->current_char_position = -2;

			$this->current_line_number = 0;

			$this->open_file = fopen($this->program, 'r');

		} else {

			echo "No such file";

			die;

		}
		
	}

	public function current_char():string { //should return the current char see p.21 of Mak's book

		if($this->current_char_position == -2) {

			$this->make_line();

			return $this->next_char();

		} else if($this->current_line == FALSE) {
		
			return 'EOF'; //EOF
		
		} else if($this->current_char_position == -1 || $this->current_char_position == strlen($this->current_line)) {
			//$this->next_char();
			return '\n'; // EOL

		} else if($this->current_char_position > strlen($this->current_line)) {

			$this->make_line();

			return $this->next_char();

		} else {

			$this->current_char = $this->current_line[$this->current_char_position];

			//var_dump($this->current_char);
			//die;

			return $this->current_char;

		}

	}

	public function make_line():void {

		// get the line associated with the current_line_number integer

		$this->current_line = fgets($this->open_file);

		$this->current_char_position = -1;

		if($this->current_line != FALSE) {

			++ $this->current_line_number;

		}

	}

	public function next_char() {

		++ $this->current_char_position;

		return $this->current_char();

	}

	public function peek_char():string {

		$this->current_char();

		if($this->current_line == FALSE) {

			return '0';

		}

		$next_pos = $this->current_char_position + 1;

		if($next_pos < strlen($this->current_line)) {

			return $this->current_line[$next_pos];

		} else {

			return '\n';

		}

	}

	public function get_program() {

		return $this->program;

	}

	public function get_current_position():int {

		return $this->current_char_position;

	}

	public function get_current_line() {

		return $this->current_line;

	}

	public function get_current_line_number() {

		return $this->current_line_number;

	}

}
