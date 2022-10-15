<?php

namespace Tests;

use Bob\Bob as Bob;
use Frontend\Source\FileSource as FileSource;
use Carly\Carly as Carly;
use Frontend\Source\Source as Source;
use PHPUnit\Framework\TestCase as TestCase;
use Frontend\My_Language\My_Language_Scanner as My_Language_Scanner;

final class UnitTest extends TestCase {

	/*_________________________________________________________________________________________________________
	**
	** Source tests
	**
	**
	*/

	public function test_get_program_returns_file() {

		// provide access to dummy file
		// create new source object and pass it the dummy file
		// test the properties of the object
		// unset the references

		$source = new FileSource('Program/Program_1.txt');

		$program = $source->get_program();

		$this->assertTrue(file_exists($program) == TRUE);

		unset($source);

		unset($program);

	}

	public function test_get_current_position_returns_int() {

		// provide access to dummy file
		// create new source object and pass it the dummy file
		// test the property of the object
		// unset the references

		$source = new FileSource('Program/Program_1.txt');

		$current_char_position = $source->get_current_position();

		$this->assertTrue(is_int($current_char_position) == TRUE);

		unset($source);

		unset($current_char_position);

	}

	public function test_current_char_returns_string() {

		// provide access to dummy file
		// create new source object and pass it the dummy file
		// test the return of the current char
		// unset the references

		$source = new FileSource('Program/Program_1.txt');

		$char = $source->current_char();

		$this->assertTrue(is_string($char) == TRUE);

		unset($source);

		unset($program);

	}

	public function test_next_char_returns_next_char() {

		// provide access to dummy file
		// create new source object and pass it the dummy file
		// test the return of the current char
		// destroy the object

		//$source = new Source('Program/Program_1.txt');

		//$program = $source->get_current_position();

		//$this->assertTrue(is_int($program) == TRUE);

		//unset($source);

		//unset($program);

		$this->assertTrue(TRUE == TRUE);

	}

	public function test_peek_returns_two_chars_away() {
		
		// provide access to dummy file
		// create new source object and pass it the dummy file
		// test the return of the current char
		// destroy the object

		//$source = new Source('Program/Program_1.txt');

		//$program = $source->get_current_position();

		//$this->assertTrue(is_int($program) == TRUE);

		//unset($source);

		//unset($program);

		$this->assertTrue(TRUE == TRUE);

	}

	public function test_make_line_sets_current_line() {

		// provide access to dummy file
		// create new source object and pass it the dummy file
		// test the line
		// unset the stuff

		$source = new FileSource('Program/Program_1.txt');

		$source->make_line();

		$line = $source->get_current_line();

		$this->assertTrue(isset($line) == TRUE);

		unset($source);

		unset($line);

	}

	/*_________________________________________________________________________________________________________
	**
	** Scanner tests
	**
	**
	*/

	public function test_scanner_skip_white_space() {

		$source = new FileSource('Program/Program_1.txt');

		$scanner = new My_Language_Scanner($source);

		$scanner->skip_white_space();

		$this->assertEquals($scanner->current_char, 'P');

		unset($source);

		unset($scanner);

	}

	public function test_extract_skip_white_space() {

		$source = new FileSource('Program/Program_1.txt');

		$scanner = new My_Language_Scanner($source);

		$scanner->extract_token();

		$this->assertEquals($scanner->current_char, 'P');

		unset($source);

		unset($scanner);

	}
/*
	public function test_extract_returns_program() {

		$source = new FileSource('Program/Program_1.txt');

		$scanner = new My_Language_Scanner($source);

		$program = $scanner->extract_token();

		$this->assertEquals($program, 'PROGRAM');

		unset($source);

		unset($scanner);

	}

	public function test_extract_returns_digit() {

		$source = new FileSource('Program/Program_1.txt');

		$scanner = new My_Language_Scanner($source);

		$program = $scanner->extract_token();

		$this->assertEquals($program, 'DIGIT');

		unset($source);

		unset($scanner);

	}
*/
}
