<?php
require_once('../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    $user = User::find_by_username($username);
    // test if admin found and password is correct
    if($user != false && $user->verify_password($password)) {
      // Mark admin as logged in
      $session->login($user);
      redirect_to(url_for('index.php'));
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }

  }

}

?>


<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div class="content_login">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    &nbsp;</br>
    <input type="submit" name="submit" value="Submit"  />
  </form>
  <!-- cuando el user no esta logeado-->

  <div class="actions">
    <a class="action" href="<?php echo url_for('/users/new.php'); ?>">Crear cuenta</a>
  </div>
&nbsp;
&nbsp;
</div>
<p>Hint!</br>Username: sasa </br> Password: Usersasa12qw!!</p>
<?php include(SHARED_PATH . '/footer.php'); ?>
