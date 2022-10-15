<?php

namespace Frontend\My_Language;

use Frontend\My_Language\My_Language_Token as My_Language_Token;

use Frontend\My_Language\My_Language_Token_Type as My_Language_Token_Type;

class My_Language_Word_Token extends My_Language_Token {

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

		$text = '';

		while(ctype_alnum($current_char)) {

			$text = $text . $current_char;

			$current_char = $this->next_char();

		}

		$this->text = $text;
/*
		$enum = My_Language_Token_Type::tryFrom($text);

		if(($enum != NULL) && ($enum->reserved_words())) {

			$type = $enum->name;

			$this->type = $type;

		} else {

			$this->type = 'IDENTIFIER';

		}
*/

		$enum = My_Language_Token_Type::tryFrom($text);

		if(($enum != NULL) && ($enum->reserved_words())) {

		//	$type = $enum->name;

			$this->type = My_Language_Token_Type::tryFrom($text);

		} else {

			$this->type = 'IDENTIFIER';

		}

	}

}
