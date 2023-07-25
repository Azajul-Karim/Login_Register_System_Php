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
    $chk_email = $this->emailCheck($email);

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

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>The email address is not valid!</div>";
      return $msg;
    }

    if ($chk_email == true) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>The email address already exist!</div>";
      return $msg;
    }

    $sql = "INSERT INTO tbl_user (name, username, email, password) VALUES (:name, :username, :email, :password)";
    $query = $this->db->pdo->prepare($sql);
    $query->bindValue(':name', $name);
    $query->bindValue(':username', $username);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $result = $query->execute();

    if ($result) {
      $msg = "<div class='alert alert-success'><strong>Success ! </strong>Thank you, you have been registered!</div>";
      return $msg;
    } else {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Sorry, there has been problem inserting your details!</div>";
      return $msg;
    }
  }

  public function emailCheck($email)
  {
    $sql = "SELECT email FROM tbl_user WHERE email = :email";
    $query = $this->db->pdo->prepare($sql);
    $query->bindValue(':email', $email);
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function getLoginUser($email, $password)
  {
  }

  public function userLogin($data)
  {
    $email    = $data['email'];
    $password = md5($data['password']);
    $chk_email = $this->emailCheck($email);

    if ($email == "" || $password == "") {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Field must not be empty</div>";
      return $msg;
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>The email address is not valid!</div>";
      return $msg;
    }

    if ($chk_email == false) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>The email address not exist!</div>";
      return $msg;
    }

    $result = $this->getLoginUser($email, $password);
  }
}
