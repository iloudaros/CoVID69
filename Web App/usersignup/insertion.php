<?php
session_start();

$username = "";
$email    = "";
$errors    = array();

$db = mysqli_connect('localhost', 'root', '', 'covid_69');

if(isset($_POST['register'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email    = mysqli_real_escape_string($db, $_POST['email']);
    $password_m = mysqli_real_escape_string($db, $_POST['password_m']);
    $password_r = mysqli_real_escape_string($db, $_POST['password_r']);

    if($password_m != $password_r) {
      array_push($errors, "The passwords do not match!");
    }

    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
      if ($user['username'] === $username) {
        array_push($errors, "Username already in use!");
      }
      if ($user['email'] === $email) {
        array_push($errors, "Email address already in use!");
      }
    }

    $number = preg_match('@[0-9]@', $password_m);
    $uppercase = preg_match('@[A-Z]@', $password_m);
    $lowercase = preg_match('@[a-z]@', $password_m);
    $specialChars = preg_match('@[^\w]@', $password_m);

    if(strlen($password_m) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
      array_push($errors, "Password must be at least 8 characters long and must contain at least one number, one uppercase letter, one lowercase letter and one special character.");
    }
    else {
      echo "Your password is strong!";
    }

    if (count($errors) == 0) {
      $password = md5($password_m);

      $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
      mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success']  = "Welcome!";
      header('location: index.php');
    }

}









?>
