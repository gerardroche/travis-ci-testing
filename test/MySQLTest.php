<?php

namespace GerardRoche\TravisCITesting;

use PDO;

class MySQLTest extends \PHPUnit_Framework_TestCase
{
    public function testMysql()
    {
        $pdo = new PDO('mysql:charset=utf8', 'root', '');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        var_dump($pdo->query('
            SELECT
                @@GLOBAL.time_zone,
                @@SESSION.time_zone,
                @@time_zone,
                @@GLOBAL.sql_mode,
                @@SESSION.sql_mode,
                @@sql_mode
        ')->fetchAll());

        $this->assertTrue(true);
    }
}
