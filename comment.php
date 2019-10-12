<?php
  $id = $_GET['id'];
 ?>

<?php require_once('html-upper.php'); ?>
<?php require_once('html-lower.php'); ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper(); ?>
<?php html_header(); ?>

  <h1>投稿コメントフォーム</h1>
  <form method="post" action="comment_done.php">
    <input type="hidden" name="id" value="<?php print $id; ?>">
    コメント内容：<br>
    <textarea type="text" name="content"></textarea>
    <br><br>
    <input type="submit" name="submit" value="コメントする">
  </form>

<?php html_footer() ?>
<?php html_lower(); ?>
