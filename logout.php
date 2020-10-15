<?php
  session_start();
  
  // sessionにからの配列を渡す
  $_SESSION = array();
  if(ini_set('session.use_cookies')){
    $params = session_get_cookie_params();
    setcookie(
      session_name().'', time() - 42000,
      $params['path'],
      $params['domain'],
      $params['secure'],
      $params['httponly']
    );
  }

  // cookieに保存したemailも消す
  session_destroy();
  setcookie('email', '', time() - 3600);

  header('Location: login.php');
  exit();
?>