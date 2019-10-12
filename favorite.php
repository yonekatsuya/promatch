<?php
session_start();
  $id = $_POST['id'];
  try {
  $pdo = new pdo('mysql:dbname=promatch;charset=utf8;host=localhost', 'root', 'yone6476');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'insert into favorites (post_id,user_id) values (?,?)';
  $stmt = $pdo->prepare($sql);
  $data[] = $id;
  $data[] = $_SESSION['id'];
  $stmt->execute($data);
  $pdo = null;
  header('Location:post_index.php?id='.$id);
  exit();
} catch (PDOException $e) {
  print 'Error:'.$e->getMessage();
  exit();
}
 ?>

 <?php require_once('html-upper.php') ?>
 <?php require_once('html-lower.php') ?>
 <?php require_once('html-header.php'); ?>
 <?php require_once('html-footer.php'); ?>
 <?php html_upper() ?>
<?php html_header() ?>

<?php html_footer() ?>
<?php html_lower(); ?>
