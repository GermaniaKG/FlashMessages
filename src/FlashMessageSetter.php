<?php
namespace Germania\FlashMessages;

use Slim\Flash\Messages;

class FlashMessageSetter
{

    /**
     * @var Messages
     */
    public $messages;


    /**
     * @param Messages $messages
     */
    public function __construct( Messages $messages )
    {
    	$this->messages = $messages;
    }


    /**
     * @param  string $keyword Keyword
     * @param  string $message Message text
     */
    public function __invoke( $keyword, $message )
    {
    	$this->messages->addMessage( $keyword, $message );
    }
}