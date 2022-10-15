<?php

namespace Frontend\My_Language;

use Frontend\My_Language\My_Language_Token as My_Language_Token;

use Frontend\My_Language\My_Language_Token_Type as My_Language_Token_Type;

class My_Language_Special_Symbol_Token extends My_Language_Token {

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

	public function extract() {

		$current_char = $this->current_char();

		$this->text = $current_char;

		switch($this->text) {

			case '+'; case '-'; case '*'; case '/'; case ','; case ';'; case '\\';
			case '='; case '('; case ')'; case '['; case ']'; case '{'; case '}';
			case '^':

				$this->next_char();

				break;

			case ':':

				$current_char = $this->next_char();

				if($current_char == '=') {

					$this->text = $this->text . $current_char;

					$this->next_char();

				}

				break;

				case '<':

					$current_char = $this->next_char();
	
					if($current_char == '=') {
	
						$this->text = $this->text . $current_char;
	
						$this->next_char();
	
					} else if ($current_char == '>') {

						$this->text = $this->text . $current_char;
	
						$this->next_char();

					}
	
					break;

				case '>':

					$current_char = $this->next_char();
	
					if($current_char == '=') {
	
						$this->text = $this->text . $current_char;
	
						$this->next_char();
	
					}
	
					break;

				case '.':

					$current_char = $this->next_char();
	
					if($current_char == '.') {
	
						$this->text = $this->text . $current_char;
	
						$this->next_char();
	
					}
	
					break;
				
		}

		$enum = My_Language_Token_Type::tryFrom($this->text);

		if($enum != NULL && $enum->special_symbols()) {

			$this->type = My_Language_Token_Type::tryFrom($this->text);

		}

	}

}
