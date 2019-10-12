<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header() ?>

<?php
print '<h1>ユーザー一覧ページ</h1>';
try {
$pdo = new pdo('mysql:host=localhost;charset=utf8;dbname=promatch', 'root', 'yone6476');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = 'select id,name from users order by id desc';
$stmt = $pdo->prepare($sql);
$stmt->execute();
print '<form method="post" action="disp_user.php">';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  if (empty($row)) {
    break;
  }
  print '<input type="radio" name="id" value="'.$row['id'].'">';
  print $row['name'];
  print '<br>';
}
print '<br>';
print '<input type="submit" value="詳細ページへ" name="submit">';
print '</form>';
} catch (PDOException $e) {
  print 'Error:'.$e->getMessage();
  exit();
}
 ?>


   <a href="index.php">メインページへ</a>

<?php html_footer() ?>
 <?php html_lower(); ?>
