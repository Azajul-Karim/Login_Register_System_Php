<?php
include "./inc/header.php";
include "./lib/user.php";

Session::checkSession();
?>

<?php
if (isset($_GET['id'])) {
  $userid = (int)$_GET['id'];
  $sesId = Session::get("id");
  if ($userid != $sesId) {
    header("Location: index.php");
  }
}

$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['UpdatePass'])) {
  $updatePass = $user->updatePassword($userid, $_POST);
}

?>
<br>
<div class="panel panel-default ">
  <div class="panel-heading">
    <h2>Change Password <span style="float: right;"><a class="btn btn-primary" href="profile.php?id=<?php echo $userid ?>"><strong>Back</strong></a></span></h2>
  </div>
  <br>

  <div class="panel-body">
    <?php
    if (isset($updatePass)) {
      echo $updatePass;
    }
    ?>

    <form action="" method="post">
      <div class="form-group">
        <label for="old_pass">Old Password</label>
        <input type="password" id="old_pass" name="old_pass" class="form-control" />
      </div>
      <br>
      <div class="form-group">
        <label for="password">New Password</label>
        <input type="text" id="password" name="password" class="form-control" />
      </div>
      <br>
      <button type="submit" name="UpdatePass" class="btn btn-success">Update</button>
    </form>
  </div>
</div>
<?php include "./inc/footer.php"; ?>