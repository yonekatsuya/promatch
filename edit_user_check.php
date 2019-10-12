<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header(); ?>

<?php
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $origin = $_POST['origin'];
  $live = $_POST['live'];
  $introduce = $_POST['introduce'];
  $id = htmlspecialchars($id,ENT_QUOTES,'utf-8');
  $name = htmlspecialchars($name,ENT_QUOTES,'utf-8');
  $email = htmlspecialchars($email,ENT_QUOTES,'utf-8');
  $age = htmlspecialchars($age,ENT_QUOTES,'utf-8');
  $gender = htmlspecialchars($gender,ENT_QUOTES,'utf-8');
  $origin = htmlspecialchars($origin,ENT_QUOTES,'utf-8');
  $live = htmlspecialchars($live,ENT_QUOTES,'utf-8');
  $introduce = htmlspecialchars($introduce,ENT_QUOTES,'utf-8');
  if ($name == '') {
    print '名前が入力されていません。<br>';
  }
  if ($email == '') {
    print 'メールアドレスが入力されていません。<br>';
  }
  if ($age == '') {
    print '年齢が入力されていません。<br>';
  }
  if ($gender == '') {
    print '性別が入力されていません。<br>';
  }
  if ($origin == '') {
    print '出身地が入力されていません。<br>';
  }
  if ($live == '') {
    print '居住地が入力されていません。<br>';
  }
  if ($introduce == '') {
    print '自己紹介文が入力されていません。<br>';
  }
  if ($name != '' && $email != '' && $age != '' && $gender != '' && $origin != '' && $live != '' && $introduce != '') {
    try {
      $pdo = new pdo('mysql:host=localhost;charset=utf8;dbname=promatch', 'root', 'yone6476');
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql = 'update users set name=?,email=?,age=?,gender=?,origin=?,live=?,introduce=? where id=?';
      $stmt = $pdo->prepare($sql);
      $data[] = $name;
      $data[] = $email;
      $data[] = $age;
      $data[] = $gender;
      $data[] = $origin;
      $data[] = $live;
      $data[] = $introduce;
      $data[] = $id;
      $stmt->execute($data);
      $pdo = null;
    } catch (PDOException $e) {
      print 'Error:'.$e->getMessage();
      exit();
    }
  } else {
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  }
 ?>

  <p>編集が完了しました！</p>
  <br>
  <form method="post" action="disp_user.php">
    <input type="hidden" name="id" value="<?php print $id; ?>">
    <input type="submit" value="ユーザー詳細ページへ">
  </form>

<?php html_footer() ?>
<?php html_lower(); ?>
