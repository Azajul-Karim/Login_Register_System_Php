<?php
include "./inc/header.php";
include "./lib/user.php";
Session::checkSession();
$user = new User();
?>
<?php
$loginmsg = Session::get("loginmsg");

if (isset($loginmsg)) {
  echo $loginmsg;
}
Session::set("loginmsg", NULL);
?>
<br>
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>User List <span style="float: right;">Welcome
        <?php
        $username = Session::get("username");
        if (isset($username)) {
          echo ucfirst($username);
        }
        ?>
      </span></h2>
  </div>
  <br>
  <div class="panel-body">
    <table class="table table-striped">
      <th width="20%">Serial</th>
      <th width="20%">Name</th>
      <th width="20%">Username</th>
      <th width="20%">Email Address</th>
      <th width="20%">Action</th>
      <?php
      $userData = $user->getUserData();
      if ($userData) {
        $i = 0;
        foreach ($userData as $sdata) {
          $i++;
      ?>
          <tr>
            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <?php echo $sdata['name']; ?>
            </td>
            <td>
              <?php echo $sdata['username']; ?>
            </td>
            <td>
              <?php echo $sdata['email']; ?>
            </td>
            <td>
              <a class="btn btn-primary" href="profile.php?id=<?php echo $sdata['id']; ?>">View</a>
            </td>
          </tr>
        <?php }
      } else { ?>
        <tr>
          <td colspan="5">
            <h2>No User Data Found</h2>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
</div>
<?php include "./inc/footer.php"; ?>