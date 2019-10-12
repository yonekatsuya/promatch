<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header(); ?>

<?php
session_start();
  $id = $_POST['id'];
  $content = $_POST['content'];
  $content = htmlspecialchars($content,ENT_QUOTES,'utf-8');
  try {
    $pdo = new pdo('mysql:dbname=promatch;charset=utf8;host=localhost', 'root', 'yone6476');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'insert into comments (post_id,content,user_id) values (?,?,?)';
    $stmt = $pdo->prepare($sql);
    $data[] = $id;
    $data[] = $content;
    $data[] = $_SESSION['id'];
    $stmt->execute($data);
    print 'コメントを投稿できました！';
    print '<br><br>';
    print '<form method="get" action="post_disp.php">';
    print '<input type="hidden" name="id" value="'.$id.'">';
    print '<input type="submit" value="記事詳細に戻る">';
    print '</form>';
  } catch (PDOException $e) {
    print 'Error:'.$e->getMessage();
    exit();
  }
 ?>

<?php html_footer() ?>
<?php html_lower() ?>
