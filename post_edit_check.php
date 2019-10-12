<?php
  $title = htmlspecialchars($_POST['title'],ENT_QUOTES,'utf-8');
  $content = htmlspecialchars($_POST['content'],ENT_QUOTES,'utf-8');
  $id = $_POST['id'];
    $pdo = new pdo('mysql:dbname=promatch;charset=utf8;host=localhost', 'root', 'yone6476');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'update posts set title=?,content=? where id=?';
    $stmt = $pdo->prepare($sql);
    $data[] = $title;
    $data[] = $content;
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

  <p>記事編集が完了しました！</p><br>
  <a href="post_index.php?id=<?php print $id; ?>">記事詳細画面へ</a>

<?php html_footer() ?>
<?php html_lower(); ?>
