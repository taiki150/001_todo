<?php

  use Illuminate\Database\Capsule\Manager;

  require_once __DIR__ . '/vendor/autoload.php';

function db_conn() {
    $db = new Manager;
    $db->addConnection([
        'driver'    => 'mysql',
        'host'      => 'mysql324.phy.lolipop.lan', // ロリポップのホスト
        'database'  => 'LAA1644563-001todo',       // あなたのDB名
        'username'  => 'LAA1644563',               // あなたのユーザー名
        'password'  => 'Taiki1544', // ※要記入
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        'prefix'    => '',
    ]);
    $db->setAsGlobal();
    $db->bootEloquent();
}

  /*
  $host = 'localhost';

  $charset = 'utf8';
  $dbname = '001_todo';
  $username = 'root';
  $password = 'root';

  $dsn ='mysql:dbname='.$dbname.';host='.$host.';charset='.$charset;
  // $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

  try {
    $dbh = new PDO($dsn,$username,$password);
    echo "接続できています";

  } catch (PDOException $e) {
      echo "DB接続エラー: " . $e->getMessage();
      exit;
  }

  */
?>