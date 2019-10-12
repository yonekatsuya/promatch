<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header() ?>

  <h1>ユーザー新規登録フォーム</h2>
  <form method="post" action="signup_check_done.php">
    <label>名前</label>
    <input type="text" name="name" style="width:200px">
    <br><br>
    <label>パスワード</label>
    <input type="password" name="pass" style="width:100px">
    <br><br>
    <label>パスワード（再確認）</label>
    <input type="password" name="pass2" style="width:100px">
    <br><br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="作成" name="submit">
  </form>

<?php html_footer() ?>
<?php html_lower(); ?>
