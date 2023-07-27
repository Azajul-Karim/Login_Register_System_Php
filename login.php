<?php
include "./inc/header.php";
include "./lib/user.php";
Session::checkLogin();
?>
<?php
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $userLogin = $user->userLogin($_POST);
}
?>
<br>
<div class="panel panel-default ">
  <div class="panel-heading">
    <h2>User List </h2>
  </div>
  <br>
  <div class="panel-body">
    <?php
    if (isset($userLogin)) {
      echo $userLogin;
    }
    ?>
    <form action="" method="post">
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="text" id="email" name="email" class="form-control" require />
      </div>
      <br>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" require />
      </div>
      <br>
      <button type="submit" name="login" class="btn btn-success">Login</button>
    </form>
  </div>
</div>
<?php include "./inc/footer.php"; ?>