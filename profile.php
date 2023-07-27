<?php
include "./inc/header.php";
Session::checkSession();


?>
<br>
<div class="panel panel-default ">
  <div class="panel-heading">
    <h2>User Profile <span style="float: right;"><a class="btn btn-primary" href="index.php"><strong>Back</strong></a></span></h2>
  </div>
  <br>
  <div class="panel-body">
    <form action="" method="post">
      <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" class="form-control" value="Azajul Karim" />
      </div>
      <br>
      <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" value="Topu" />
      </div>
      <br>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="text" id="email" name="email" class="form-control" value="azajulkarim@gmail.com" />
      </div>
      <br>
      <button type="submit" name="Update" class="btn btn-success">Update</button>
    </form>
  </div>
</div>
<?php include "./inc/footer.php"; ?>