<?php
  session_start();
  require('dbconnect.php');

  if(isset($_SESSION['id'])) {
    // urlのid
    $id = $_REQUEST['id'];

    $posts = $db->prepare('SELECT * FROM posts WHERE id=?');
    $posts->execute(array($id));
    $post = $posts->fetch();

    if($_SESSION['id'] === $post['member_id'] ){
      $delete = $db->prepare('DELETE FROM posts WHERE id=?');
      $delete->execute(array($id));
    }

    header('Location: index.php');
    exit();
  }
?>