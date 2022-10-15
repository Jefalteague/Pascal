<?php

namespace Frontend\My_Language;

use Frontend\Token\Token_Type as Token_Type;

enum My_Language_Token_Type: string implements Token_Type {

	/*Properties
	**
	**
	**
	*/

	//Reserved words
	case AND = 'AND';
	case ARRAY = 'ARRAY';
	case BEGIN = 'BEGIN';
	case CASE = 'CASE';
	case CONST = 'CONST';
	case DIV = 'DIV';
	case DO = 'DO';
	case DOWNTO = 'DOWNTO';
	case ELSE = 'ELSE';
	case END = 'END';
	case FILE = 'FILE';
	case FOR = 'FOR';
	case FUNCTION = 'FUNCTION';
	case GOTO = 'GOTO';
	case IF = 'IF';
	case IN = 'IN';
	case LABEL = 'LABEL';
	case MOD = 'MOD';
	case NIL = 'NIL';
	case NOT = 'NOT';
	case OF = 'OF';
	case OR = 'OR';
	case PACKED = 'PACKED';
	case PROCEDURE = 'PROCEDURE';
	case PROGRAM = 'PROGRAM';
	case RECORD = 'RECORD';
	case REPEAT = 'REPEAT';
	case SET = 'SET';
	case THEN = 'THEN';
	case TO = 'TO';
	case TYPE = 'UNTIL';
	case VAR= 'VAR';
	case WHILE = 'WHILE';
	case WITH = 'WITH';

	// Special symbols
	case PLUS = '+';
	case MINUS = '-';
	case STAR = '*';
	case SLASH = '/';
	case COLON_EQUALS = ':=';
	case DOT = '.';
	case COMMA = ',';
	case SEMICOLON = ';';
	case COLON = ':';
	case QUOTE = '\'';
	case EQUALS = '=';
	case NOT_EQUALS = '<>';
	case LESS_THAN = '<';
	case LESS_EQUALS = '<=';
	case GREATER_EQUALS = '>=';
	case GREATER_THAN = '>';
	case LEFT_PAREN = '(';
	case RIGHT_PAREN = ')';
	case LEFT_BRACKET = '[';
	case RIGHT_BRACKET = ']';
	case LEFT_BRACE = '{';
	case RIGHT_BRACE = '}';
	case UP_ARROW = '^';
	case DOT_DOT = '..';

	// Other

	case END_OF_FILE = 'EOF';

	/*Methods
	**
	**
	**
	*/

	public function reserved_words() {

		return match($this) {

			My_Language_Token_Type::AND => 'AND',
			My_Language_Token_Type::ARRAY => 'ARRAY',
			My_Language_Token_Type::BEGIN => 'BEGIN',
			My_Language_Token_Type::CASE => 'CASE',
			My_Language_Token_Type::CONST => 'CONST',
			My_Language_Token_Type::DIV => 'DIV',
			My_Language_Token_Type::DO => 'DO',
			My_Language_Token_Type::DOWNTO => 'DOWNTO',
			My_Language_Token_Type::ELSE => 'ELSE',
			My_Language_Token_Type::END => 'END',
			My_Language_Token_Type::FILE => 'FILE',
			My_Language_Token_Type::FOR => 'FOR',
			My_Language_Token_Type::FUNCTION => 'FUNCTION',
			My_Language_Token_Type::GOTO => 'GOTO',
			My_Language_Token_Type::IF => 'IF',
			My_Language_Token_Type::IN => 'IN',
			My_Language_Token_Type::LABEL => 'LABEL',
			My_Language_Token_Type::MOD => 'MOD',
			My_Language_Token_Type::NIL => 'NIL',
			My_Language_Token_Type::NOT => 'NOT',
			My_Language_Token_Type::OF => 'OF',
			My_Language_Token_Type::OR => 'OR',
			My_Language_Token_Type::PACKED => 'PACKED',
			My_Language_Token_Type::PROCEDURE => 'PROCEDURE',
			My_Language_Token_Type::PROGRAM => 'PROGRAM',
			My_Language_Token_Type::RECORD => 'RECORD',
			My_Language_Token_Type::REPEAT => 'REPEAT',
			My_Language_Token_Type::SET => 'SET',
			My_Language_Token_Type::THEN => 'THEN',
			My_Language_Token_Type::TO => 'TO',
			My_Language_Token_Type::TYPE => 'UNTIL',
			My_Language_Token_Type::VAR => 'VAR',
			My_Language_Token_Type::WHILE => 'WHILE',
			My_Language_Token_Type::WITH => 'WITH',

		};

	}

	public function special_symbols() {

		return match($this) {

			My_Language_Token_Type::PLUS => '+',
			My_Language_Token_Type::MINUS => '-',
			My_Language_Token_Type::STAR => '*',
			My_Language_Token_Type::SLASH => '/',
			My_Language_Token_Type::COLON_EQUALS => ':=',
			My_Language_Token_Type::DOT => '.',
			My_Language_Token_Type::COMMA => ',',
			My_Language_Token_Type::SEMICOLON => ';',
			My_Language_Token_Type::COLON => ':',
			My_Language_Token_Type::QUOTE => '\'',
			My_Language_Token_Type::EQUALS => '=',
			My_Language_Token_Type::NOT_EQUALS => '<>',
			My_Language_Token_Type::LESS_THAN => '<',
			My_Language_Token_Type::LESS_EQUALS => '<=',
			My_Language_Token_Type::GREATER_EQUALS => '>=',
			My_Language_Token_Type::GREATER_THAN => '>',
			My_Language_Token_Type::LEFT_PAREN => '(',
			My_Language_Token_Type::RIGHT_PAREN => ')',
			My_Language_Token_Type::LEFT_BRACKET => '[',
			My_Language_Token_Type::RIGHT_BRACKET => ']',
			My_Language_Token_Type::LEFT_BRACE => '{',
			My_Language_Token_Type::RIGHT_BRACE => '}',
			My_Language_Token_Type::UP_ARROW => '^',
			My_Language_Token_Type::DOT_DOT => '..',

		};

	}

}
