<?php

namespace Frontend\Token;

use Frontend\Source\Source as Source;

class Token {

	/*Properties
	**
	**
	**
	*/

	public $source;

	public $type;

	public $text;

	public $value;

	public $line;

	public $position;

	public $current_line_number;

	/*Methods
	**
	**
	**
	*/

	public function __construct(Source $source) {

		$this->source = $source;

		$this->line = $this->source->get_current_line();

		$this->position = $this->source->get_current_position();

		$this->current_line_number = $this->source->get_current_line_number();

		$this->extract();

	}

	// getters for the class properties

	public function get_source() {

		return $this->source;

	}

	public function get_type() {

		if($this->type != NULL) {

			return $this->type->name;

		}

	}

	public function get_text() {

		return $this->text;

	}

	public function get_value() {

		if($this->value != NULL) {

			return $this->value;
			
		}

	}

	public function get_line() {

		return $this->line;

	}

	public function get_position() {

		return $this->position;

	}

	public function get_current_line_number() {

		return $this->current_line_number;

	}

	// the main/default extract method, overridden by specific tokens

	public function extract() {

		$this->text = $this->current_char();

		$this->value = NULL;

		$this->next_char();

	}

	// the source convenience methods (for accessing source methods, which access the scanner methods)

	public function current_char() {

		return $this->source->current_char();

	}

	public function next_char() {

		return $this->source->next_char();

	}

	public function peek_char() {

		return $this->source->peek_char();

	}

}
