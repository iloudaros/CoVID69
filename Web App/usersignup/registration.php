<?php include('insertion.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div>
  <form action="registration.php" method="post">
    <?php include('errors.php'); ?>

        <h2>Sign-Up</h2>
        <p>Please fill out this form.</p>

        <div class="input-group">
          <label><b>Username</b></label>
          <input type="text" name="username" id="username" placeholder="username" required>
        </div>

        <div class="input-group">
          <label><b>Email Address</b></label>
          <input type="email" name="email" id="email" placeholder="someone@email.com" required>
        </div>

        <div class="input-group">
          <label><b>Password</b></label>
          <input type="password" name="password_m" id="password_m" placeholder="password" required>
        </div>

        <div class="input-group">
          <label><b>Confirm password</b></label>
          <input type="password" name="password_r" id="password_r" placeholder="password" required>
        </div>

        <div class="input-group">
          <input class="btn" type="submit" name="register" value="Sign-Up">
        </div>

        <p>
          Already signed-up? <a href="./userlogin/login.php">Login</a>
        </p>

  </form>
</div>


</body>
</html>
