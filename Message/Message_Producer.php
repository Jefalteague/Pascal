<?php

namespace Message;

use Message\Message_Listener;
use Message\Message;

interface Message_Producer {

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

    public function add_listener(Message_Listener $message_listener);

    public function remove_listener(Message_Listener $message_listener);

    public function send_message(Message $message);

}