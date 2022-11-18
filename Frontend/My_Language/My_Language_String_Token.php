<?php

namespace Frontend\My_Language;

use Frontend\My_Language\My_Language_Token as My_Language_Token;

use Frontend\My_Language\My_Language_Token_Type as My_Language_Token_Type;

use Frontend\My_Language\Error\My_Language_Error_Code as MLEC;

class My_Language_String_Token extends My_Language_Token {

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

        $this->text = '';
        
        $this->value = '';

        $current_char = $this->next_char();

        $this->text = $this->text . '\'';

        do {

            if(ctype_space($current_char) || ($current_char == '\n')) {

                $current_char = ' ';

            }

            if(($current_char != '\'') && ($current_char != My_Language_Token_Type::tryFrom('EOF'))) {

                $this->text = $this->text . $current_char;

                $this->value = $this->value . $current_char;

                $current_char = $this->next_char();

            }

            if($current_char == '\'') {

                while(($current_char == '\'') && ($this->peek_char() == '\'')) {

                    $this->text = $this->text . "''";

                    $this->value = $this->value . $current_char;

                    $current_char = $this->next_char();

                    $current_char = $this->next_char();

                }

            }

        } while(($current_char != '\'') && ($current_char != 'EOF'));

        if($current_char == '\'') {

            $current_char = $this->next_char();

            $this->text = $this->text . '\'';

            $this->type = My_Language_Token_Type::tryFrom('STRING');

            $this->value = $this->value;

        } else {

            $this->type = My_Language_Token_Type::tryFrom('ERROR');

            $this->value = MLEC::tryFrom('UNEXPECTED_EOF')->name;

            var_dump($this->value);

        }

        $this->text = $this->text;

    }


}
