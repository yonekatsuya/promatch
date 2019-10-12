<?php require_once('html-upper.php') ?>
<?php require_once('html-lower.php') ?>
<?php require_once('html-header.php'); ?>
<?php require_once('html-footer.php'); ?>
<?php html_upper() ?>
<?php html_header() ?>

<?php
session_start();
$_SESSION[] = array();
session_destroy();
print 'ログアウトしました！<br>';
print '<a href="index.php">メインページに戻る</a>';
 ?>

<?php html_footer() ?>
<?php html_lower(); ?>
