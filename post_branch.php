<?php
if (isset($_POST['edit'])) {
  header('Location:post_edit.php?id='.$_POST['id']);
  exit();
} else {
  header('Location:post_disp.php?id='.$_POST['id']);
  exit();
}
 ?>
