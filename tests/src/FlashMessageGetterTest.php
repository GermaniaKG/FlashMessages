<?php
namespace tests;

use Germania\FlashMessages\FlashMessageGetter;
use Slim\Flash\Messages;

class FlashMessageGetterTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideKeysAndMessages
     */
    public function testUsage( $messages, $key, $expected_result)
    {

        $slim_messages = $this->prophesize( Messages::class);
        $slim_messages->getMessages()->willReturn( $messages );

        $sut = new FlashMessageGetter( $slim_messages->reveal() );

        $message = $sut( $key );
        $this->assertEquals( $message, $expected_result );
    }


    public function provideKeysAndMessages()
    {
        $messages = array("foo" => "bar");
        return array(
            [ $messages, null, $messages ],
            [ $messages, "foo", "bar" ],
            [ $messages, "XYZ", array() ],
        );
    }

}   

