<?php

//require_once('Autoload/Autoload.php');
//use Autoload\Autoload as Autoload;


require_once('Boot\Boot.php');

use Boot\Boot as Boot;

use Frontend\Source\File_Source as File_Source;

use Frontend\Parser_Factory as Parser_Factory;

use Message\Parser_Listener as Parser_Listener;



//$config = require_once('Config.php');
//$dirs = $config['dirs']['dirs'];
//$init = Autoload::init($dirs);


// use Boot to get started
$config = Boot::boot();

// get the language type
$language = $config['language'];

// get the parser factory
$parser_factory = new Parser_Factory();

// create the parser based on the language type
$parser = $parser_factory->create_parser($language, "Program/Program_1.txt", $config);



//$source = new File_Source("Program/Program_1.txt");
//$scanner = new My_Language_Scanner($source);
//$parser = new My_Language_Parser($scanner);

// get a parser listener
$parser_listener = new Parser_Listener();

// add a listener to the parser
$parser->add_listener($parser_listener);

// parse the program
$result = $parser->parse();
