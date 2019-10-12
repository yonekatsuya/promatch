<?php
try {
  $id = $_GET['id'];
  $pdo = new pdo('mysql:dbname=promatch;charset=utf8;host=localhost', 'root', 'yone6476');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'select * from posts where id=?';
  $stmt = $pdo->prepare($sql);
  $data[] = $id;
  $stmt->execute($data);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $pdo = null;
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

  <h1>記事編集画面</h1>
  <form method="post" action="post_edit_check.php">
    <input type="hidden" name="id" value="<?php print $row['id'] ?>">
    タイトル：<br>
    <input type="text" name="title" style="width:230px" value="<?php print $row['title']; ?>">
    <br><br>
    内容：<br>
    <textarea type="text" name="content"><?php print $row['content']; ?></textarea>
    <br><br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="編集">
  </form>

<?php html_footer() ?>
<?php html_lower(); ?>
