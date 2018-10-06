<!doctype html>

<html lang="en">
  <head>
    <title>Productos Terminados<?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
  <!--  <link rel="stylesheet" media="all" href="<?php //echo url_for('stylesheets/style.css'); ?>" />-->
    <script href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  </head>

  <body>
    <header><!--
      <ul>
         <?php if($session->is_logged_in()){ ?>
             User:<?php echo $session->username; ?></li></br>
             User id:<?php echo $session->id_user; ?></li></br>
             <a class="topright" href="<?php echo url_for('logout.php'); ?>">log out</a>
         <?php } ?>
      </ul>-->

      <h4>
        <a class="titlex" href="<?php echo url_for('/index.php'); ?>">
          <img class="logo_icon" src="<?php echo url_for('/images/logo_empresa.JPG') ?>" /><br />

        </a>
      </h4>
      <?php header("Content-Type: text/html;charset=utf-8"); ?>
    </header>

    <?php echo display_session_message(); ?>
