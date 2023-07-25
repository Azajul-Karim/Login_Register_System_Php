<?php
include "./inc/header.php";
include "./lib/user.php";

$user = new User();

?>

<br>
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>User List <span style="float: right;"><strong>Welcome!</strong> Md. Alamin</span></h2>
  </div>
  <br>
  <div class="panel-body">
    <table class="table table-striped">
      <th width="20%">Serial</th>
      <th width="20%">Name</th>
      <th width="20%">Username</th>
      <th width="20%">Email Address</th>
      <th width="20%">Action</th>
      <tr>
        <td>01</td>
        <td>Md. Alamin</td>
        <td>alamin</td>
        <td>alamin@gmail.com</td>
        <td>
          <a class="btn btn-primary" href="profile.php?id=1">View</a>
        </td>
      </tr>
      <tr>
        <td>01</td>
        <td>Md. Alamin</td>
        <td>alamin</td>
        <td>alamin@gmail.com</td>
        <td>
          <a class="btn btn-primary" href="profile.php?id=1">View</a>
        </td>
      </tr>
      <tr>
        <td>01</td>
        <td>Md. Alamin</td>
        <td>alamin</td>
        <td>alamin@gmail.com</td>
        <td>
          <a class="btn btn-primary" href="profile.php?id=1">View</a>
        </td>
      </tr>
    </table>
  </div>
</div>
<?php include "./inc/footer.php"; ?>