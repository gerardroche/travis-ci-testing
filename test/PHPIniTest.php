<?php

namespace GerardRoche\TravisCITesting;

class PHPIniTest extends \PHPUnit_Framework_TestCase
{
    public function testTimezone()
    {
        $this->assertSame('UTC', ini_get('date.timezone'));
    }

    public function testDisplayErrors()
    {
        $this->assertSame('1', ini_get('display_errors'));
    }

    public function testDisplayStartupErrors()
    {
        $this->assertSame('1', ini_get('display_startup_errors'));
    }

    public function testErrorReporting()
    {
        $this->assertSame('-1', ini_get('error_reporting'));
    }
}
