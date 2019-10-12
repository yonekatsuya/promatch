<?php
  public function db_connect() {
    define('DB_DATABASE', 'promatch');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'yone6476');
    define('DB_CONNECT', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);
    try (
      $pdo = new pdo(DB_CONNECT, DB_USERNAME, DB_PASSWORD);
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $pdo;
      ) catch (PDOException $e) {
        print 'Error:'.$e->getMessage();
        exit();
      }
  }
 ?>
