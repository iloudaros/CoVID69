<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

<div>
  <?php

  ?>
</div>

<div>
  <form accept="register.php" method="post">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <h1>Sign Up</h1>
          <p>Fill in the form</p>
          <hr class="mb-3">
          <label for="username"><b>Username</b></label>
          <input class="form-control" id="username" type="text" name="username" required>

          <label for="email"><b>Email Addres</b></label>
          <input class="form_control" id="email" type="text" name="email" required>

          <label for="password"><b>Password</b></label>
          <input class="form_control" id="password" type="password" name="password" required>
          <hr class="mb-3">
          <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
        </div>
      </div>
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

        if(valid){

        	var username 	= $('#username').val();
        	var email 		= $('#email').val();
        	var password 	= $('#password').val();

          e.preventDefault();

          $.ajax({
          type: 'POST',
          url: 'insertion.php',
          data: {username: username, email: email, password: password},
          success: function(data){
          Swal.fire({
          'title': 'Successful',
          'text': data,
          'type': 'success'
          })

          },
          error: function(data){
          Swal.fire({
          'title': 'Errors',
          'text': 'There were errors while saving the data.',
          'type': 'error'
          })
          }
          });

          $uppercase = preg_match('@[A-Z]@', $password);
          $lowercase = preg_match('@[a-z]@', $password);
          $number    = preg_match('@[0-9]@', $password);
          $specialChars = preg_match('@[^\w]@', $password);

          if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
          }else{
            echo 'Strong password.';
          }

          }else{
        	}

          });

        	});

</script>
</body>
</html>
