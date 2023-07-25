<?php
class Database
{
  private $hostDb = "localhost";
  private $userDb = "root";
  private $passDb = "";
  private $nameDb = "db_lr";
  public $pdo;

  public function __construct()
  {
    if (!isset($this->pdo)) {
      try {
        $link = new PDO("mysql:host=" . $this->hostDb . ";dbname=" . $this->nameDb, $this->userDb, $this->passDb);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $link->exec("SET CHARACTER SET utf8");
        $this->pdo = $link;
      } catch (PDOException $e) {
        die("Failed to connect with Database" . $e->getMessage());
      }
    }
  }
}
