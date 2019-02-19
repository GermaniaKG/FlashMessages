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
         * @return callable|FlashMessageSetter
         */
        $dic['FlashMessages.Setter'] = function ($dic) {
            $messages = $dic['FlashMessages'];
            return new FlashMessageSetter( $messages );
        };


        /**
         * @return callable|FlashMessageGetter
         */
        $dic['FlashMessages.Getter'] = function ($dic) {
            $messages = $dic['FlashMessages'];
            return new FlashMessageGetter( $messages );
        };

    }
}
