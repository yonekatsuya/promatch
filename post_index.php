<?php
$pdo = new pdo('mysql:dbname=promatch;charset=utf8;host=localhost', 'root', 'yone6476');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = 'select * from posts order by id desc';
$stmt = $pdo->prepare($sql);
$stmt->execute();
 ?>


 <?php require_once('html-upper.php') ?>
 <?php require_once('html-lower.php') ?>
 <?php require_once('html-header.php'); ?>
 <?php require_once('html-footer.php'); ?>
 <?php html_upper() ?>
<?php html_header() ?>

  <h1>投稿一覧</h1>
  <?php
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (empty($row)) {
      break;
    }
    print '・';
    print '<a href="post_disp.php?id='.$row['id'].'">'.$row['title'].'</a>';
    print '<form method="post" action="favorite.php">';
    print '<input type="hidden" name="id" value="'.$row['id'].'">';
    print '<input type="submit" value="いいね！">';
    if (isset($_GET['id'])) {
      if ($_GET['id'] == $row['id']) {
      print '<strong style="color:red;">'.' ←いいね済み！！'.'</strong>';
    }
    }
    print '</form>';
  }
   ?>
   <br>
   <a href="index.php" style="background-color:skyblue;border:1px solid $red;border-radius:5px;">トップページへ</a>

<?php html_footer() ?>
<?php html_lower(); ?>
