<?php
$id = $_POST['id'];
try {
$pdo = new pdo('mysql:host=localhost;charset=utf8;dbname=promatch', 'root', 'yone6476');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = 'select * from users where id=?';
$stmt = $pdo->prepare($sql);
$data[] = $id;
$stmt->execute($data);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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

   <h1>ユーザ詳細ページ</h1>
   <?php
   if (isset($row['name'])) {
   print '名前：';
   print $row['name'];
   print '<br><br>';
 }
  if (isset($row['email'])) {
    print 'メールアドレス：';
    print $row['email'];
    print '<br><br>';
  }
  if (isset($row['age'])) {
    print '年齢：';
    print $row['age'];
    print '<br><br>';
  }
  if (isset($row['gender'])) {
    print '性別：';
    print $row['gender'];
    print '<br><br>';
  }
  if (isset($row['origin'])) {
    print '出身地：';
    print $row['origin'];
    print '<br><br>';
  }
  if (isset($row['live'])) {
    print '居住地：';
    print $row['live'];
    print '<br><br>';
  }
  if (isset($row['introduce'])) {
    print '自己紹介：';
    print $row['introduce'];
    print '<br><br>';
  }
  if (isset($row['created'])) {
    print 'ユーザー登録日：';
    print $row['created'];
    print '<br><br>';
  }
    ?>
    <form method="post" action="edit_user.php">
      <input type="hidden" name="id" value="<?php print $row['id']; ?>">
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" name="submit" value="編集">
    </form>

<?php html_footer() ?>
 <?php html_lower(); ?>
