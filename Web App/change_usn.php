<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Change Your Username</title>
  </head>
  <body>
    <div><?php if(isset($message)) { echo $message; } ?></div>
    <form method="post" action="">
      <div class="input-group">
        <label><b>Current Username</b></label>
        <input type="text" name="username" id="username" placeholder="Current Username" required>
      </div>

      <div class="input-group">
        <label><b>New Password</b></label>
        <input type="text" name="nusername" id="nusername" placeholder="New Username" required>
      </div>

      <div class="input-group">
        <label><b>Confirm New Password</b></label>
        <input type="text" name="cusername" id="cusername" placeholder="New Username" required>
      </div>

      <div class="input-group">
        <input class="btn" type="submit" name="change" value="Submit">
      </div>

    </form>
  </body>
</html>
