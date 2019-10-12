<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header() ?>

<?php
  $name = htmlspecialchars($_POST['name'],ENT_QUOTES,'utf-8');
  $pass = htmlspecialchars($_POST['pass'],ENT_QUOTES,'utf-8');
  $pass2 = htmlspecialchars($_POST['pass2'],ENT_QUOTES,'utf-8');
  if ($name == '') {
    print '名前が入力されていません。<br>';
  }
  if ($pass == '') {
    print 'パスワードが入力されていません。<br>';
  }
  if ($pass != $pass2) {
    print 'パスワードが一致しません。';
  }
  if ($name != '' && $pass != '' && $pass == $pass2) {
    try {
    $dsn = 'mysql:host=localhost;charset=utf8;dbname=promatch';
    $user = 'root';
    $password = 'yone6476';
    $pdo = new pdo($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $sql = 'insert into users (name, password) values (?,?)';
    $stmt = $pdo->prepare($sql);
    $data[] = $name;
    $data[] = $pass;
    $stmt->execute($data);
    $pdo = null;
    print '新規登録が完了しました！<br>';
    print '<a href="index.php">メインページへ戻る</a>';
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

<?php html_footer() ?>
<?php html_lower(); ?>
