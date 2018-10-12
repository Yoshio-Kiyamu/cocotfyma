<?php

function require_login() { //para limitar acceso a paginas segun login
  global $session;
  if(!$session->is_logged_in()){
    redirect_to(url_for('../public/login.php'));
  }else{
    //Do nothing
  }
}

function require_Super_login() { //para limitar acceso a paginas segun perfil de login
  global $session;
  if(!$session->is_super_logged_in()){
    $session->message('Uds tiene que tener perfil administrador');
    redirect_to(url_for('../public/prueba_yoshio.php'));
  }else{
    //Do nothing
  }
}

function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function display_session_message() {
  global $session;
  $msg = $session->message();
  if(isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div id="message">' . h($msg) . '</div>';
  }
}



?>
