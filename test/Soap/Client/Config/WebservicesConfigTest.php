<?php

namespace WebservicesNl\Test\Soap\Client\Config;

use WebservicesNl\Soap\Client\Config\WebservicesConfig;

/**
 * Class WebservicesConfigTest.
 *
 */
class WebservicesConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \WebservicesNl\Common\Exception\Client\InputException
     * @expectedExceptionMessage Settings is not a SoapSettings object or array
     *
     * @throws \WebservicesNl\Common\Exception\Client\InputException
     */
    public function testConfigCreationWithInvalidArgument()
    {
        WebservicesConfig::configure(null);
    }

    /**
     * @expectedException \WebservicesNl\Common\Exception\Client\InputException
     * @expectedExceptionMessage Not all mandatory config credentials are set
     *
     * @throws \WebservicesNl\Common\Exception\Client\InputException
     */
    public function testConfigCreationWithEmptyArray()
    {
        WebservicesConfig::configure([]);
    }
}
