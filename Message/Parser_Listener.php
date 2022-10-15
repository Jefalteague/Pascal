<?php

namespace Message;

use Message\Message_Listener as Message_Listener;

class Parser_Listener implements Message_Listener{

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

	public function message_received(Message $message) {

		$token_array = $message->get_token_array();

		$elapsed_time = $message->get_time();

		$type = $message->get_type()->name;

		echo '<i> Message Type: </i>' . $type;

		echo '<br />';

		echo 'Elapsed Time: ' . $elapsed_time;

		echo "<hr style='width:50%;text-align:left;margin-left:0'>"; // echo styled line

		echo '<br />';

		foreach($token_array as $token) {

			echo '<b>TOKEN</b>';

			echo '<br />';

			echo '<i>Text: </i>' . $token->get_text();

			echo '<br />';

			echo '<i>Token Type: </i>' . $token->get_type();

			echo '<br />';
			
			echo '<i> Line Number: </i>' . $token->get_current_line_number();

			echo '<br />';
			
			echo '<i> Character Position: </i>' . $token->get_position();

			echo '<br />';
			echo '<br />';

		}


	}

}
