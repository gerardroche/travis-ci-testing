<?php

namespace GerardRoche\TravisCITesting;

use PDO;

class MySQLTest extends \PHPUnit\Framework\TestCase
{
    protected static $pdo;

    protected function setUp(): void
    {
        if (self::$pdo === null) {
            $pdo = new PDO(
                'mysql:charset=utf8',
                DBUNIT_USERNAME,
                DBUNIT_PASSWORD
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            self::$pdo = $pdo;
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

    public function testCharacterSets()
    {
        $results = self::$pdo->query('SHOW VARIABLES WHERE Variable_name LIKE \'character\_set\_%\' OR Variable_name LIKE \'collation%\';')->fetchAll();
        var_dump($results);
        $this->assertTrue(true);
    }

    public function testVariables()
    {
        $results = self::$pdo->query('SHOW VARIABLES;')->fetchAll();
        var_dump($results);

        $this->assertTrue(true);
    }
}
