<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header() ?>

  <h1>ログイン画面</h1>
  <form method="post" action="login_check.php">
    <label>名前</label>
    <input type="text" name="name" style="width:200px">
    <br><br>
    <label>パスワード</label>
    <input type="password" name="password" style="width:130px">
    <br><br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="ログイン" name="submit">
  </form>

<?php html_footer() ?>
<?php html_lower(); ?>
