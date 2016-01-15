<?php

// セッションを使うので、session_start();
session_start();

// $_SESSIONのidに値がない場合
if (empty($_SESSION['id']))
{ // login.phpへ飛ばす
  header('Location: login.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>検索・一覧画面</title>
</head>
<body>
  <h1>検索・一覧画面</h1>
  <form action="" method="post">
    <textarea name="message" cols="30" rows="5"></textarea>
    <input type="submit" value="投稿する">
  </form>
  <!--<hr>-->
  <!--<h1>投稿されたメッセージ</h1>-->
</body>
</html>
