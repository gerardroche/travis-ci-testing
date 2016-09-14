<?php

namespace GerardRoche\TravisCITesting;

use PDO;

class MySQLTest extends \PHPUnit_Framework_TestCase
{
    protected static $pdo;

    protected function setUp()
    {
        if (self::$pdo === null) {
            self::$pdo = new PDO(
                'mysql:charset=utf8',
                DBUNIT_USERNAME,
                DBUNIT_PASSWORD
            );

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            self::$pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
    }

    public function testTimeZone()
    {
        $this->assertSame('SYSTEM', self::$pdo->query('SELECT @@time_zone')->fetchColumn());
    }

    public function testGlobalTimeZone()
    {
        $this->assertSame('SYSTEM', self::$pdo->query('SELECT @@GLOBAL.time_zone')->fetchColumn());
    }

    public function testSessionTimeZone()
    {
        $this->assertSame('SYSTEM', self::$pdo->query('SELECT @@SESSION.time_zone')->fetchColumn());
    }

    public function testSQLMode()
    {
        $this->assertSame('', self::$pdo->query('SELECT @@sql_mode')->fetchColumn());
    }

    public function testGlobalSQLMode()
    {
        $this->assertSame('', self::$pdo->query('SELECT @@GLOBAL.sql_mode')->fetchColumn());
    }

    public function testSessionSQLMode()
    {
        $this->assertSame('', self::$pdo->query('SELECT @@SESSION.sql_mode')->fetchColumn());
    }
}
