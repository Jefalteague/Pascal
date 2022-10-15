<?php

namespace Message;

class Message_Handler {

    /*Properties
	**
	**
	**
	*/

    static $instance = NULL;

    public $listeners = [];

	/*Methods
	**
	**
	**
    */

    public static function get_instance():Message_Handler {

        if(self::$instance == NULL) {

            self::$instance = new Message_Handler();

        }

        return self::$instance;

    }

    public function add_listener($listener):void {

        $this->listeners[] = $listener;

    }

    public function remove_listener():void {

        //stubbed

    }

    public function send_message(Message $message):void {

        $this->notify_listeners($message);

    }

    public function notify_listeners(Message $message):void {

        foreach($this->listeners as $listener) {

            $listener->message_received($message);

        }

    }

}