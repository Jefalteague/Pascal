<?php

$config = [
    
    'dirs' => [
		
        'dirs' => [

            __DIR__,
        
        ],

    ],

];

$dirs = $config['dirs']['dirs'];

require_once('.\Autoload\Autoload.php');

use Autoload\Autoload as Autoload;

Autoload::init($dirs);