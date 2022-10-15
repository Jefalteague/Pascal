<?php

namespace Frontend\Scanner;

use Frontend\Source\Source as Source;

abstract class Scanner {

	/*Properties
	**
	**
	**
	*/

	public $source;

	public $current_token;

	public $current_char;

	/*Methods
	**
	**
	**
	*/

	public function __construct(Source $source) {

		$this->source = $source;

	}

	public function current_token() {

		return $this->current_token;

	}

	public function next_token() {

		$this->current_token = $this->extract_token();

		return $this->current_token;

	}

	abstract protected function extract_token();

	public function current_char() {

		return $this->source->current_char();

	}

	public function next_char() {

		return $this->source->next_char();

	}

}