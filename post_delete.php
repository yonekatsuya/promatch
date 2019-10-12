<?php
  $id = $_GET['id'];
  $pdo = new pdo('mysql:dbname=promatch;charset=utf8;host=localhost', 'root', 'yone6476');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'delete from posts where id='.$id;
  $stmt = $pdo->prepare($sql);
  $data[] = $id;
  $stmt->execute($data);
  $pdo = null;
 ?>

 <?php require_once('html-upper.php') ?>
 <?php require_once('html-lower.php') ?>
 <?php require_once('html-header.php'); ?>
 <?php require_once('html-footer.php'); ?>
 <?php html_upper() ?>
<?php html_header() ?>

  <p>記事の削除が完了しました！</p>
  <br>
  <a href="post_index.php">記事一覧画面へ戻る</a>

<?php html_footer() ?>
<?php html_lower(); ?>
