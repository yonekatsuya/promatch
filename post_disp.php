<?php
  $id = $_GET['id'];
  try {
    $pdo = new pdo('mysql:dbname=promatch;charset=utf8;host=localhost', 'root', 'yone6476');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'select * from posts where id=?';
    $stmt = $pdo->prepare($sql);
    $data[] = $id;
    $stmt->execute($data);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    print 'Error:'.$e->getmessage();
    exit();
  }
 ?>

 <?php require_once('html-upper.php') ?>
 <?php require_once('html-lower.php') ?>
 <?php require_once('html-header.php'); ?>
 <?php require_once('html-footer.php'); ?>
 <?php html_upper() ?>
<?php html_header() ?>

   <h1>記事詳細画面</h1>
   タイトル：<?Php print $row['title']; ?><br><br>
   内容：<?php print $row['content']; ?><br><br>
   <form>
     <input type="button" onclick="history.back()" value="戻る">
   </form>
   <form method="post" action="post_branch.php">
     <input type="hidden" name="id" value="<?php print $row['id'] ?>">
     <input type="submit" value="編集" name="edit">
   </form>
   <form method="post" action="post_branch2.php">
     <input type="hidden" name="id" value="<?php print $row['id'] ?>">
     <input type="submit" value="削除" name="delete">
   </form>
   <br><br>
   <a href="comment.php?id=<?php print $row['id']; ?>">この投稿にコメントする</a><br><br><br>
   <h2>コメント一覧</h2>
   <?php
   try {
   $sql = 'select * from comments where post_id=?';
   $stmt_comments = $pdo->prepare($sql);
   $stmt_comments->execute($data);
   $data[] = $row['id'];
   while ($row = $stmt_comments->fetch(PDO::FETCH_ASSOC)) {
     print '・';
     print $row['content'];
     print '<br>';
   }
 } catch (PDOException $e) {
   print 'Error:'.$e->getMessage();
   exit();
 }
    ?>

<?php html_footer() ?>
 <?php html_lower(); ?>
