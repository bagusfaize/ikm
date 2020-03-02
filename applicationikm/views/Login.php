<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo ASSET_PATH; ?>frontend/frontendSyle/signin.css" />
  </head>
  <body class="text-center">
    <?php echo form_open('Login/Validation', 'class="form-signin"'); ?>
      <img class="mb-4" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Coat_of_arms_of_Riau_Islands.png/180px-Coat_of_arms_of_Riau_Islands.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" name="ikmUser" class="form-control" placeholder="User" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="ikmPassword" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 20120 - 2021</p>
    <?php echo form_close(); ?>
  </body>
</html>
