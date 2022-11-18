<?php

namespace Frontend\My_Language;

use Frontend\Token\Token;

use Frontend\Source\Source as Source;

use Frontend\Scanner\Scanner as Scanner;

use Frontend\Token\EOF_Token as EOF_Token;

use Frontend\My_Language\My_Language_Word_Token as My_Language_Word_Token;

use Frontend\My_Language\My_Language_Token_Type as My_Language_Token_Type;

use Frontend\My_Language\My_Language_Special_Symbol_Token as My_Language_Special_Symbol_Token;

use Frontend\My_Language\My_Language_Number_Token;

class My_Language_Scanner extends Scanner {

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

	public function __construct(Source $source) {

		parent::__construct($source);

	}

	public function extract_token() {

		$this->skip_white_space();

		$current_char = $this->current_char(); // this should return the same char as created by skip_white_space() see p.21 of Mak

		$token = null;

		if($current_char == 'EOF') {

			$token = new EOF_Token($this->source);

		} else if(ctype_alpha($current_char)) {
			
			$token = new My_Language_Word_Token($this->source);
			
		} else if(ctype_digit($current_char)) {

			$token = new My_Language_Number_Token($this->source);
		
		} else if($current_char == '\'') {

			$token = new My_Language_String_Token($this->source);
			
		} else if(My_Language_Token_Type::tryFrom($current_char)) {

			$token = new My_Language_Special_Symbol_Token($this->source);
		
		} else {

			$token = new Token($this->source);

		}

		return $token;

	}

	public function skip_white_space() {

		$current_char = $this->current_char();

		//var_dump($current_char);
		//die;

		while((ctype_space($current_char)) || ($current_char == '{')) {

			if($current_char == '{') {

				do {
					
					$current_char = $this->next_char();
					
					if($current_char == '{') { //better way to handle this? 10/09/22

						echo 'nested comments not allowed';
						die;

					}

				} while(($current_char != '}') && ($current_char != 'EOF'));

				if($current_char == '}') {
				
					$current_char = $this->next_char();

				}

			} else {

				$current_char = $this->next_char();

			}

		}

	}

	public function number() {

	}

	public function identifier() {

	}

	public function current_char() {

		return $this->source->current_char();

	}

	public function make_line() {

	}

	public function peek() {

	}

	public function get_program() {

	}

	public function get_current_position() {

	}

	public function get_current_char() {

	}

	public function get_current_line() {

	}

}
