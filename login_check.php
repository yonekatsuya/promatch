<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header() ?>

<?php
session_start();
  $name = htmlspecialchars($_POST['name'], ENT_QUOTES,'utf-8');
  $pass = htmlspecialchars($_POST['password'], ENT_QUOTES,'utf-8');
  if (empty($_POST['submit'])) {
    header('Location:login.php');
    exit();
  }
  if ($name == '') {
    print '名前が入力されていません。<br>';
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  }
  if ($pass == '') {
    print 'パスワードが入力されていません。<br>';
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  }
  if ($name != '' && $pass != '') {
    $pdo = new pdo('mysql:dbname=promatch;charset=utf8;host=localhost', 'root', 'yone6476');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'select id,name,password from users where name=?';
    $stmt = $pdo->prepare($sql);
    $data[] = $name;
    $stmt->execute($data);
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      if (password_verify($pass, $row['password'])) {
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['id'] = $row['id'];
        print 'ログインが完了しました！<br>';
        print '<a href="index.php">メインページへ</a>';
      } else {
        print 'パスワードに誤りがあります。<br>';
        print '<form>';
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '</form>';
      }
  } else {
    print '名前かパスワードが入力されていません。';
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  }
}

 ?>

<?php html_footer() ?>
<?php html_lower(); ?>
