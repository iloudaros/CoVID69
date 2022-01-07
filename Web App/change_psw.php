<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Change Your Password</title>
  </head>
  <body>
    <div><?php if(isset($message)) { echo $message; } ?></div>
    <form method="post" action="">
      <div class="input-group">
        <label><b>Current Password</b></label>
        <input type="password" name="password" id="password" placeholder="Current Password" required>
      </div>

      <div class="input-group">
        <label><b>New Password</b></label>
        <input type="password" name="npassword" id="npassword" placeholder="New Password" required>
      </div>

      <div class="input-group">
        <label><b>Confirm New Password</b></label>
        <input type="password" name="cpassword" id="cpassword" placeholder="New Password" required>
      </div>

      <div class="input-group">
        <input class="btn" type="submit" name="change" value="Submit">
      </div>

    </form>

    <script type="text/javascript">
        function validatePassword() {

        var password  = true;
        var npassword = true;
        var cpassword = true;
        var output    = true;

        password  = document.frmChange.password;
        npassword = document.frmChange.npassword;
        cpassword = document.frmChange.cpassword;

        if(!password.value) {
          password.focus();
          document.getElementById("password").innerHTML = "required";
          output = false;
        }

        else if(!npassword.value) {
          npassword.focus();
          document.getElementById("npassword").innerHTML = "required";
          output = false;
        }

        else if(!cpassword.value) {
          cpassword.focus();
          document.getElementById("cpassword").innerHTML = "required";
          output = false;
        }

        if(npassword.value != cpassword.value) {
          npassword.value="";
          cpassword.value="";
          npassword.focus();
          document.getElementById("cpassword").innerHTML = "not same";
          output = false;
        }

        return output;
        }
      </script>





  </body>
</html>
