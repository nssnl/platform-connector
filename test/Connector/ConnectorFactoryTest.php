<?php

namespace Webservicesnl\Test\Connector;

use League\FactoryMuffin\Facade as FactoryMuffin;
use Webservicesnl\Connector\ConnectorFactory;

class ConnectorFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public static function setupBeforeClass()
    {
        FactoryMuffin::setCustomSaver(function () {
            return true;
        });
        FactoryMuffin::setCustomSetter(function ($object, $name, $value) {
            $name = 'set' . ucfirst(strtolower($name));
            if (method_exists($object, $name)) {
                $object->{$name}($value);
            }
        });
        FactoryMuffin::loadFactories(dirname(__DIR__) . '/Factories');
    }

    public function testInstance()
    {
        $client = ConnectorFactory::create('webservices', 'soap', ['username' => 'lala', 'password' => 'hihi']);

        $this->assertInstanceOf('Webservicesnl\Connector\WebservicesConnector', $client);
        $this->assertInstanceOf('Webservicesnl\Connector\Adapter\SoapAdapter', $client->getAdapter());

    }
}