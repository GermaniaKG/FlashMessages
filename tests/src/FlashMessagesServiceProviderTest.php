<?php
namespace tests;

use Germania\FlashMessages\FlashMessageSetter;
use Germania\FlashMessages\FlashMessageGetter;
use Germania\FlashMessages\FlashMessagesServiceProvider;
use Slim\Flash\Messages;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class FlashMessagesServiceProviderTest extends \PHPUnit\Framework\TestCase
{

    public function testUsage()
    {
        $slim_messages = $this->prophesize( Messages::class);
        $slim_messages_mock = $slim_messages->reveal();

    	$sut = new FlashMessagesServiceProvider( $slim_messages_mock );
    	$this->assertInstanceOf( ServiceProviderInterface::class, $sut);

    	$dic = new Container;
    	$dic->register( $sut );

    	$fm = $dic['FlashMessages'];
    	$this->assertEquals( $fm, $slim_messages_mock );
    }


    public function testSetter()
    {
        $slim_messages = $this->prophesize( Messages::class);
        $slim_messages_mock = $slim_messages->reveal();

    	$sut = new FlashMessagesServiceProvider( $slim_messages_mock );
    	$this->assertInstanceOf( ServiceProviderInterface::class, $sut);

    	$dic = new Container;
    	$dic->register( $sut );

    	$fms = $dic['FlashMessages.Setter'];
    	$this->assertInstanceOf( FlashMessageSetter::class, $fms );
    	$this->assertTrue( is_callable($fms) );
    }


    public function testGetter()
    {
        $slim_messages = $this->prophesize( Messages::class);
        $slim_messages_mock = $slim_messages->reveal();

    	$sut = new FlashMessagesServiceProvider( $slim_messages_mock );
    	$this->assertInstanceOf( ServiceProviderInterface::class, $sut);

    	$dic = new Container;
    	$dic->register( $sut );

    	$fms = $dic['FlashMessages.Getter'];
    	$this->assertInstanceOf( FlashMessageGetter::class, $fms );
    	$this->assertTrue( is_callable($fms) );
    }



}   

