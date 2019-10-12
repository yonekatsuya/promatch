<?php
function html_header() {
  print '<header style="height:70px;width:100%;background-color:#9933ff;">';
  print '<div style="float:left;margin:15px">';
  print '<a href="index.php" style="text-decoration:none;
  color:pink;font-size:40px;">ProMatch</a>';
  print '</div>';
  print '<div style="float:right;margin:25px;">';
  print '<ul>';
    print '<li style="float:left;"><a href="signup.php" style="text-decoration:none;
    color:pink;font-size:20px;margin-right:30px;">新規登録</a></li>';
    print '<li style="float:left;"><a href="login.php" style="text-decoration:none;
    color:pink;font-size:20px;">ログイン</a></li>';
  print '</ul>';
  print '</div>';
  print '</header>';
}
 ?>
