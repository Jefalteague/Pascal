<?php

namespace Frontend\Token;

use Frontend\Token\Token as Token;

use Frontend\Source\Source as Source;

use Frontend\My_Language\My_Language_Token_Type as My_Language_Token_Type;

class EOF_Token extends Token {

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

	public function extract():void {

		$current_char = $this->current_char();

		$this->text = $current_char;

		$this->type = My_Language_Token_Type::tryFrom($current_char);

		//var_dump($this->type);
		//die;

		//$this->type = 'EOF';

	}

}
