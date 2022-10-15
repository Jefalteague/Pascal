<?php

require_once('Boot/Boot.php');

use Boot\Boot as Boot;

use Frontend\Source\FileSource as FileSource;

use Frontend\My_Language\My_Language_Scanner as My_Language_Scanner;

use Frontend\My_Language\My_Language_Parser as My_Language_Parser;

use Message\Parser_Listener as Parser_Listener;

$boot = new Boot();

$boot->boot();

$source = new FileSource("Program/Program_1.txt");

$scanner = new My_Language_Scanner($source);

$parser = new My_Language_Parser($scanner);

$parser_listener = new Parser_Listener();

$parser->add_listener($parser_listener);

$result = $parser->parse();
