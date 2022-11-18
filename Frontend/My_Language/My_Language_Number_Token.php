<?php

namespace Frontend\My_Language;

use Frontend\My_Language\My_Language_Token as My_Language_Token;
use Frontend\My_Language\Error\My_Language_Error_Code;
use Frontend\My_Language\My_Language_Token_Type as My_Language_Token_Type;

class My_Language_Number_Token extends My_Language_Token {

    public function extract() {

        $text_buffer = '';

        $number = $this->extract_number($text_buffer);

        $this->text = $number;

    }

    public function extract_number(&$text_buffer) {

        $whole_number_part = NULL;
        $fraction_part = NULL;
        $exponent_part = NULL;
        $dot_dot = FALSE;
        $exponent_sign = '+';
        $current_char;

        $this->type =  My_Language_Token_Type::INTEGER;

        $whole_number_part = $this->unsigned_integer_digits($text_buffer);

        if($this->type == My_Language_Token_Type::ERROR) {

            return;

        }

        $current_char = $this->current_char();

        if($current_char == '.') {

            if($pc = $this->peek_char() == '.') {

                $dot_dot = TRUE;

            } else {

                $this->type = My_Language_Token_Type::REAL;

                $text_buffer = $text_buffer . $current_char;

                $current_char = $this->next_char();

                $fraction_part = $this->unsigned_integer_digits($text_buffer);

                if($this->type == My_Language_Token_Type::ERROR ) {

                    return;

                } 

            }

        }

        $current_char = $this->current_char();

        if($dot_dot == FALSE && (($current_char == 'e') || ($current_char == 'E'))) {

            $this->type = My_Language_Token_Type::REAL;

            $text_buffer = $text_buffer . $current_char;

            $current_char = $this->next_char();

            if($current_char == '+' || $current_char == "-") {

                $text_buffer = $text_buffer . $current_char;

                $exponent_sign = $current_char;

                $current_char = $this->next_char();

            }

            $exponent_part = $this->unsigned_integer_digits($text_buffer);

        }

        if($this->type ==  My_Language_Token_Type::INTEGER) {

            $integer_value = $this->compute_integer_value($whole_number_part);

            if($this->type != My_Language_Token_Type::ERROR) {

                $this->value = $integer_value;

            }

        } else if($this->type == My_Language_Token_Type::REAL) {

            $float_value =  $this->compute_float_value($whole_number_part, $fraction_part, $exponent_part, $exponent_sign);

            if($this->type != My_Language_Token_Type::ERROR) {

                $this->value = $float_value;

            }
        }
    }

    public function unsigned_integer_digits(&$text_buffer) {

        $current_char = $this->current_char();

        if(!ctype_digit($current_char)) {

            $text_buffer = $text_buffer . $current_char;

            $this->type = My_Language_Token_Type::ERROR;

            $this->value = My_Language_Error_Code::tryFrom('INVALID_NUMBER')->name;

            return NULL;

        }

        $digits = '';

        while(ctype_digit($current_char)) {

            $text_buffer = $text_buffer . $current_char;

            $digits = $digits . $current_char;

            $current_char = $this->next_char();

        }

        return $digits;

    }

    public function compute_integer_value($whole_number_part):int {

        if($whole_number_part == null) {

            return 0;

        }

        $integer_value = 0;
        $previous_value = -1;
        $index = 0;

        while(($index < strlen($whole_number_part)) && ($integer_value >= $previous_value)) {

            $previous_value = $integer_value;

            $integer_value = (10*$integer_value) + (int)($whole_number_part[$index++]);

        }

        if($integer_value >= $previous_value) {

            return $integer_value;

        } else {

            $this->type = My_Language_Token_Type::ERROR;

            $this->value =  My_Language_Error_Code::RANGE_INTEGER;

            return 0;

        }

    }

    public function compute_float_value($whole_number_part, $fraction_part, $exponent_part, $exponent_sign):float {

        $float_value = 0.0;

        $exponent_value = $this->compute_integer_value($exponent_part);

        $digits = $whole_number_part;

        if($exponent_sign == '-') {

            $exponent_value = -$exponent_value;

            //var_dump($exponent_value); die;

        }

        if($fraction_part != NULL) {
            //var_dump(strlen($fraction_part)); die;
            $exponent_value -= strlen($fraction_part);
            //var_dump($exponent_value); die;

        }

        if(abs($exponent_value + strlen($whole_number_part)) > PHP_INT_SIZE) {

            $this->type = My_Language_Token_Type::ERROR;

            $this->value = My_Language_Error_Code::RANGE_REAL;

            return (float)0.0;

        }

        $index = 0;

        while($index < strlen($digits)) {

            $float_value = 10*$float_value + $digits[$index++];

        }

        if($exponent_value != 0) {

            $float_value *= pow(10, $exponent_value);

        }

        return (float)$float_value;

    }


}