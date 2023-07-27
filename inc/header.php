<?php
include_once './lib/session.php';
Session::init();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Login Register System Php</title>
</head>
<?php
if (isset($_GET['action']) && $_GET['action'] == "logout") {
  Session::destroy();
}
?>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <h3>Login Register System Php</h3>
        </a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
          $id = Session::get("id");
          $userlogin = Session::get("login");

          if ($userlogin == true) {
          ?>
            <li class="nav-item">
              <a class="nav-link active" href="index.php">
                <h5>Home</h5>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="profile.php?id=<?php echo $id; ?>">
                <h5>Profile</h5>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="?action=logout">
                <h5>LogOut</h5>
              </a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link active" href="login.php">
                <h5>LogIn</h5>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="register.php">
                <h5>Register</h5>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>