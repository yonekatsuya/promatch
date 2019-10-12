<?php
session_start();
$id = $_GET['id'];
try {
$pdo = new pdo('mysql:host=localhost;charset=utf8;dbname=promatch', 'root', 'yone6476');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = 'select * from posts where user_id=?';
$stmt = $pdo->prepare($sql);
$data[] = $id;
$stmt->execute($data);
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

  <h1>自分の投稿一覧</h1>
  <div class="wrapper clearfix">
    <div class="left">
  <?php
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print '・';
    print $row['title'];
    print '<br>';
  }
   ?>
 </div>
 <div class="right">
 </div>
 </div>
   <a href="index.php">メインページへ</a>

<?php html_footer() ?>
<?php html_lower(); ?>
