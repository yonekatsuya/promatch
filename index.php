<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header(); ?>

<?php
session_start();
if (isset($_SESSION['password'])) {
  print '<div style="text-align:right;color:red;">';
  print $_SESSION['user_name'].'がログイン中です！';
  print '</div>';
}
 ?>

  <h1 style="font-size:40px;margin-top:35px;margin-bottom:100px; text-align:center;font-family:serif;">ProMatch</h1>
  <h2 style="font-size:60px;font-weight:bold;text-align:center;margin-bottom:100px;font-family:Garamond;">プログラミング学習者<br>マッチングサイト</h2>
  <div style="text-align:center;">
  <a href="signup.php">新規登録</a>
  <a href="login.php">ログイン</a>
  <a href="logout.php">ログアウト</a>
  <a href="index_user.php">ユーザー一覧ページ</a>
  <a href="post.php">投稿作成</a>
  <a href="post_index.php">投稿一覧</a>
  <a href="mypage.php?id=<?php print $_SESSION['id']; ?>">マイページ</a>
  </div>

  <div style="height:500px;">
  </div>


<?php html_footer(); ?>
<?php html_lower(); ?>
