#!/bin/bash

#attempt to write a script to create prefilled class definition files
#lots of limitations and pitfalls to this current script, but it is a start

cat << EOF >> c:/xampp/htdocs/compint/$1/$2.php
<?php

namespace $1;

class $2 {

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

}
EOF