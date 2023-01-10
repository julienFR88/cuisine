<?php
  $postData = $_POST;

  if (isset($postData['email']) && isset($postData['password'])){
    foreach ($users as $user) {
      if (
        $user['email'] === $postData['email'] &&
        $user['password'] === $postData['password']
      ) {
      $loggedUser = [
        'email' => $user['email']
      ];
      setcookie(
        'LOGGED_USER', 
        $loggedUser['email'],
        [
          'expires' => time() + 365*24*3600,
          'secure' => true,
          'httponly' => true 
        ]
      );
      $_SESSION['LOGGED_USER'] = $loggedUser['email'];
      // cookie avec une date d'expiration à 365 jours
      } else {
        $errorMessage = sprintf('Les information envoyées ne permettent pas de vous indentifier: (%s/%s)',
                        $postData['email'],
                        $postData['password']
                        );
      }
    }
  }

  if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
  $loggedUser = [
                  'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER']
                ];
  }
?>
<?php if(!isset($loggedUser)) : ?>

<form action="home.php" method="post">
  <?php if(isset($errorMessage)) : ?>
    <div class="alert alert-danger">
      <?php echo($errorMessage) ?>
    </div>
  <?php endif; ?>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="email-help" placeholder="You@exemple.com">
    <div id="email-help">L'Email utilisé lors de la création du compte.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Your password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
<?php else :  ?>
  <div class="alert-success">
    Bonjour, <?php echo($loggedUser['email']) ?>
  </div>
<?php endif; ?>