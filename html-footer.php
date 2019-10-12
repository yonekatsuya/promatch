<?php
function html_footer() {
  print '<footer style="width:100%;height:150px;position:absolute;bottom:0;
  background-color:#9933ff;">';
  print '<div style="font-size:40px;float:left;">';
  print '<a href="index.php" style="text-decoration:none;color:pink;">ProMatch</a>';
  print '</div>';
  print '<div style="float:right;font-size:13px;margin:20px;
  list-style:none;">';
  print '<ul>';
    print '<li style="margin-bottom:10px;"><a href="signup.php" style="text-decoration:none;
    color:pink;">利用規約</a></li>';
    print '<li style="margin-bottom:10px;"><a href="login.php" style="text-decoration:none;
    color:pink;">特定商取引法に基づく表示</a></li>';
    print '<li style="margin-bottom:10px;"><a href="logout.php" style="text-decoration:none;
    color:pink;">ログアウト</a></li>';
    print '<li style="margin-bottom:10px;"><a href="post.php" style="text-decoration:none;
    color:pink;">Facebook</a></li>';
    print '<li style="margin-bottom:10px;"><a href="post.php" style="text-decoration:none;
    color:pink;">Twitter</a></li>';
  print '</ul>';
  print '</div>';
  print '</footer>';
}
 ?>
