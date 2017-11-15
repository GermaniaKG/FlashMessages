<?php
namespace Germania\FlashMessages;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\Flash\Messages;

class FlashMessagesServiceProvider implements ServiceProviderInterface
{


    /**
     * @var Messages
     */
    public $messages;


    /**
     * @param Messages|null $messages
     */
    public function __construct( Messages $messages = null )
    {
        $this->messages = $messages ?: new Messages;
    }


    /**
     * @implements ServiceProviderInterface
     */
    public function register(Container $dic)
    {

        /**
         * @return Messages Slim Flash Messages instance
         */
        $dic['FlashMessages'] = function($dic) {
            return $this->messages;
        };


        /**
         * @return callable
         */
        $dic['FlashMessages.Setter'] = $dic->protect(function( $keyword, $message ) use ($dic) {
             $dic['FlashMessages']->addMessage($keyword, $message );
        });


        /**
         * @return callable
         */
        $dic['FlashMessages.Getter'] = $dic->protect(function( $keyword = null ) use ($dic) {
            $messages = $dic['FlashMessages']->getMessages();

            if (is_null($keyword )) {
                return $messages;
            }

            return (array_key_exists($keyword, $messages))
            ? $messages[ $keyword ]
            : array();
        });

    }
}
