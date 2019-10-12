<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header() ?>

<?php
session_start();
if (empty($_SESSION['password'])) {
  header('Location:index.php');
}
  $title = htmlspecialchars($_POST['title'],ENT_QUOTES,'utf-8');
  $content = htmlspecialchars($_POST['content'],ENT_QUOTES,'utf-8');
  if ($title == '') {
    print 'タイトルが入力されていません。<br>';
  }
  if ($content == '') {
    print '内容が入力されていません。<br>';
  }
  if ($title == '' || $content == '') {
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  } else {
    try {
    $pdo = new pdo('mysql:dbname=promatch;charset=utf8;host=localhost', 'root', 'yone6476');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'insert into posts (title,content,user_id) values (?,?,?)';
    $stmt = $pdo->prepare($sql);
    $data[] = $title;
    $data[] = $content;
    $data[] = $_SESSION['id'];
    $stmt->execute($data);
    $sql = 'select * from posts where user_id='.$_SESSION['id'].' order by id desc';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $pdo = null;
} catch (PDOException $e) {
  print 'Error:'.$e->getMessage();
  exit();
}
}
 ?>

  <p>投稿が完了しました！</p>
  タイトル：<?php print $row['title']; ?><br>
  内容：<br><?php print $row['content']; ?><br><br>
  <a href="mypage.php?id=<?php print $_SESSION['id']; ?>">マイページ</a>

<?php html_footer() ?>
<?php html_lower(); ?>
