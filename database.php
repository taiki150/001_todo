<?php
use Illuminate\Database\Capsule\Manager;

require_once __DIR__ . '/vendor/autoload.php';

function db_conn2() {
    $db = new Manager;
    $db->addConnection([
        'driver'    => 'mysql',
        'host'      => 'mysql324.phy.lolipop.lan',
        'database'  => 'LAA1644563-001todo',
        'username'  => 'LAA1644563',
        'password'  => 'Taiki1544',
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        'prefix'    => '',
    ]);
    $db->setAsGlobal();
    $db->bootEloquent();

}

function db_conn() {
    $db = new Manager;
    $db->addConnection([
'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => '001todo',
        'username'  => 'root',
        'password'  => 'root',
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        'prefix'    => '',
    ]);
    $db->setAsGlobal();
    $db->bootEloquent();

}