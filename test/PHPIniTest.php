<?php

namespace GerardRoche\TravisCITesting;

class PHPIniTest extends \PHPUnit\Framework\TestCase
{
    public function testErrorReporting()
    {
        $this->assertSame('-1', ini_get('error_reporting'));
    }

    public function testDisplayErrors()
    {
        $this->assertSame('1', ini_get('display_errors'));
    }

    public function testDisplayStartupErrors()
    {
        $this->assertSame('1', ini_get('display_startup_errors'));
    }

    public function testTimezone()
    {
        $this->assertSame('UTC', ini_get('date.timezone'));
    }

    public function testMimeType()
    {
        $this->assertSame('text/html', ini_get('default_mimetype'));
    }

    public function testDefaultCharset()
    {
        $this->assertSame('UTF-8', ini_get('default_charset'));
    }

    public function testIconvInternalEncoding()
    {
        $this->assertSame('UTF-8', ini_get('iconv.internal_encoding'));
    }

    public function testIconvInputEncoding()
    {
        $this->assertSame('UTF-8', ini_get('iconv.input_encoding'));
    }

    public function testIconvOutputEncoding()
    {
        $this->assertSame('UTF-8', ini_get('iconv.output_encoding'));
    }
}
