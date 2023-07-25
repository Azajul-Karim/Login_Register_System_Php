<?php
require_once 'session.php';
require_once 'dataBase.php';
class User
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function userRegistration($data)
  {
    $name     = $data['name'];
    $username = $data['username'];
    $email    = $data['email'];
    $password = md5($data['password']);

    if ($name == "" || $username == "" || $email == "" || $password == "") {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Field must not be empty</div>";
      return $msg;
    }

    if (strlen($username) < 3) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Username is too short</div>";
      return $msg;
    } elseif (preg_match('/[^a-z0-9_-]+/i', $username)) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Username must only contain alphanumerical, dashes and underscores!</div>";
      return $msg;
    }
  }
}
