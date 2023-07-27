<?php
include "./inc/header.php";
include "./lib/user.php";

Session::checkSession();
?>

<?php
if (isset($_GET['id'])) {
  $userid = (int)$_GET['id'];
}

$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Update'])) {
  $updateUser = $user->updateUserData($userid, $_POST);
}

?>
<br>
<div class="panel panel-default ">
  <div class="panel-heading">
    <h2>User Profile <span style="float: right;"><a class="btn btn-primary" href="index.php"><strong>Back</strong></a></span></h2>
  </div>
  <br>

  <div class="panel-body">
    <?php
    if (isset($updateUser)) {
      echo $updateUser;
    }
    ?>
    <?php
    $userdata = $user->getUserById($userid);

    if ($userdata) {


    ?>
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" class="form-control" value="<?php echo $userdata->name; ?>" />
        </div>
        <br>
        <div>
          <label for="username">Username</label>
          <input type="text" id="username" name="username" class="form-control" value="<?php echo $userdata->username; ?>" />
        </div>
        <br>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="text" id="email" name="email" class="form-control" value="<?php echo $userdata->email; ?>" />
        </div>
        <?php
        $sesId = Session::get("id");
        if ($userid == $sesId) { ?>
          <br>
          <button type="submit" name="Update" class="btn btn-success">Update</button>
          &nbsp
          <a class="btn btn-info" href="changePass.php?id=<?php echo $userid; ?>">Password Cahnge</a>
        <?php } ?>
      </form>
    <?php } ?>
  </div>
</div>
<?php include "./inc/footer.php"; ?>