<?php
namespace tests;

use Germania\FlashMessages\FlashMessageSetter;
use Slim\Flash\Messages;
use Prophecy\Argument;

class FlashMessageSetterTest extends \PHPUnit\Framework\TestCase
{

    public function testUsage()
    {

        $slim_messages = $this->prophesize( Messages::class);
        $slim_messages->addMessage(Argument::type('string'), Argument::type('string'))->shouldBeCalled();

        $sut = new FlashMessageSetter( $slim_messages->reveal() );

        $message = $sut( "foo", "bar" );
    }



}   

