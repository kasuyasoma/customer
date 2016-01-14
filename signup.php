<?php

// 設定ファイルと関数ファイルを読み込む
require_once('config.php');
require_once('functions.php');

// 登録ボタンを押下した時、methodがpostだった場合
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ // 管理しやすいように変数で管理
  // $id = $_POST['id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $telephone_number = $_POST['telephone_number'];
  $errors = array(); // バリデーションで引っかかったら$errorsに格納

  // if ($id == '')// IDが未入力の場合
  // {
  //   $errors['id'] = 'IDが未入力です';
  // }
  if ($first_name == '')// first_nameが未入力の場合
  {
    $errors['first_name'] = '名が未入力です';
  }
  if ($last_name == '')// last_nameが未入力の場合
  {
    $errors['last_name'] = '姓が未入力です';
  }
  if ($email == '')// emailが未入力の場合
  {
    $errors['email'] = 'メールアドレスが未入力です';
  }
  if ($telephone_number == '')// telephone_numberが未入力の場合
  {
    $errors['telephone_number'] = '電話番号が未入力です';
  }

  // バリデーション突破後
  if (empty($errors)) // $errorsがNULLの場合
  {
    $dbh = connectDatabase(); // データベース接続
    $sql = "insert into customer (first_name, last_name, email, telephone_number, created_at, updated_at) values
      (:first_name, :last_name, :email, :telephone_number, now(), now())";
    $stmt = $dbh->prepare($sql);
    // $stmt->bindParam(":id", $id);
    $stmt->bindParam(":first_name", $first_name);
    $stmt->bindParam(":last_name", $last_name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":telephone_number", $telephone_number);
    $stmt->execute();
  }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>新規登録画面</title>
</head>
<body>
  <h1>新規登録</h1>
  <form action="" method="post">
<!--<p>ユーザーネーム: <input type="text" name="name"></p> -->
<!-- <p>メールアドレス: <input type="text" name="email"></p> -->
<!--     <p>
    ID: <input type="text" name="id">
    <?php if ($errors['id']) : ?>
      <?php echo h($errors['id']) ?>
    <?php endif ?>
    </p> -->
    <p>
    姓: <input type="text" name="last_name">
    <?php if ($errors['last_name']) : ?>
      <?php echo h($errors['last_name']) ?>
    <?php endif ?>
    </p>
    <p>
    名: <input type="text" name="first_name">
    <?php if ($errors['first_name']) : ?>
      <?php echo h($errors['first_name']) ?>
    <?php endif ?>
    </p>
    <p>
    メールアドレス: <input type="text" name="email">
    <?php if ($errors['email']) : ?>
      <?php echo h($errors['email']) ?>
    <?php endif ?>
    </p>
    <p>
    電話番号: <input type="text" name="telephone_number">
    <?php if ($errors['telephone_number']) : ?>
      <?php echo h($errors['telephone_number']) ?>
    <?php endif ?>
    </p>
    <input type="submit" value="登録する">
  </form>
  <a href="login.php">ログインはこちら</a>
</body>
</html>