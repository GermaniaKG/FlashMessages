<?php
namespace Germania\FlashMessages;

use Slim\Flash\Messages;

class FlashMessageGetter
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
     * @param  string|null $keyword Keyword
     * @return string|string[]
     */
    public function __invoke( $keyword = null )
    {
        $messages = $this->messages->getMessages();

        if (is_null($keyword )) {
            return $messages;
        }

        return (array_key_exists($keyword, $messages))
        ? $messages[ $keyword ]
        : array();
    }

}