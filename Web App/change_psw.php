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
  </body>
</html>
