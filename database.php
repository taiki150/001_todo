<?php

  use Illuminate\Database\Capsule\Manager;

  require_once __DIR__ . '/vendor/autoload.php';

  function db_conn() {
      $db = new Manager;
      $db->addConnection([
          'driver'    => 'mysql',
          'host'      => 'localhost',
          'database'  => '001_todo',
          'username'  => 'root',
          'password'  => 'root',
          'charset'   => 'utf8',
          'collation' => 'utf8_general_ci',
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