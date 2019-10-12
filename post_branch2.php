<?php
if (isset($_POST['delete'])) {
  header('Location:post_delete.php?id='.$_POST['id']);
  exit();
} else {
  header('Location:post_disp.php?id='.$_POST['id']);
  exit();
}
 ?>
