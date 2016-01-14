<?php

// セッションを使うので、session_start();
session_start();

// $_SESSIONのidに値がある場合
if (!empty($_SESSION['id']))
{ // index.phpへ飛ばす
  header('Location: index.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ログイン画面</title>
</head>
<body>
  <h1>ログイン</h1>
  <form action="" method="post">
    <!-- <p>ID: <input type="text" name="id"></p> -->
    <p>姓: <input type="text" name="last_name"></p>
    <p>名: <input type="text" name="first_name"></p>
    <p>メールアドレス: <input type="text" name="email"></p>
    <p>電話番号: <input type="text" name="telephone_number"></p>
    <input type="submit" value="ログイン">
  </form>
  <a href="signup.php">新規登録はこちら</a>
</body>
</html>