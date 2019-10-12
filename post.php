<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header() ?>

  <h1>新規投稿作成画面</h1>
  <form method="post" action="post_check.php">
    <label>タイトル</label><br>
    <input type="text" name="title" style="width:230px">
    <br><br>
    <label>内容</label><br>
    <textarea type="text" name="content"></textarea>
    <br><br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" name="submit" value="投稿">
  </form>

<?php html_footer() ?>
<?php html_lower(); ?>
