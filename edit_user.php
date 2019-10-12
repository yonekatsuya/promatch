<?php
  $id = $_POST['id'];
  $pdo = new pdo('mysql:host=localhost;charset=utf8;dbname=promatch', 'root', 'yone6476');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = 'select * from users where id=?';
  $stmt = $pdo->prepare($sql);
  $data[] = $id;
  $stmt->execute($data);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $pdo = null;
 ?>

 <?php require_once('html-upper.php') ?>
 <?php require_once('html-lower.php') ?>
 <?php require_once('html-header.php'); ?>
 <?php require_once('html-footer.php'); ?>
 <?php html_upper() ?>
<?php html_header() ?>

    <h1>ユーザー情報編集画面</h1>
    <form method="post" action="edit_user_check.php">
      <input type="hidden" name="id" value="<?php print $row['id']; ?>">
      名前：<br>
      <input type="text" name="name" style="width:250px"><br><br>
      メールアドレス：<br>
      <input type="text" name="email" style="width:200px"><br><br>
      年齢：<br>
      <select name="age">
      <?php
      for ($i=15;$i<=60;$i++) {
        print '<option value="'.$i.'">'.$i.'</option>';
      }
       ?>
     </select>
     <br><br>
     性別：<br>
     <input type="radio" name="gender" value="男性" checked>男性
     <input type="radio" name="gender" value="女性">女性
    <br><br>
    出身地：<br>
    <?php
    $origins = ['北海道','青森県','岩手県','秋田県','宮城県','山形県','福島県','新潟県','栃木県','茨城県','栃木県','群馬県','山形県','静岡県','愛知県','石川県','福井県',
  '富山県','滋賀県','東京都','千葉県','埼玉県','神奈川県','長野県','岐阜県','和歌山県','京都府','奈良県','大阪府','兵庫県','山口県','広島県','岡山県','鳥取県','島根県',
'愛媛県','高知県','徳島県','香川県','福島県','大分県','長崎県','佐賀県','大分県','宮崎県','鹿児島県','沖縄県'];
    print '<select name="origin">';
    foreach ($origins as $origin) {
      print '<option value="'.$origin.'">'.$origin.'</option>';
    }
    print '</select>';
     ?>
     <br><br>
     居住地：<br>
     <?php
     $origins = ['北海道','青森県','岩手県','秋田県','宮城県','山形県','福島県','新潟県','栃木県','茨城県','栃木県','群馬県','山形県','静岡県','愛知県','石川県','福井県',
   '富山県','滋賀県','東京都','千葉県','埼玉県','神奈川県','長野県','岐阜県','和歌山県','京都府','奈良県','大阪府','兵庫県','山口県','広島県','岡山県','鳥取県','島根県',
 '愛媛県','高知県','徳島県','香川県','福島県','大分県','長崎県','佐賀県','大分県','宮崎県','鹿児島県','沖縄県'];
     print '<select name="live">';
     foreach ($origins as $origin) {
       print '<option value="'.$origin.'">'.$origin.'</option>';
     }
     print '</select>';
      ?>
      <br><br>
      自己紹介：<br>
      <textarea type="text" name="introduce"><?php print $row['introduce']; ?></textarea>
      <br><br><br>
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" name="submit" value="編集">
    </form>

<?php html_footer() ?>
<?php html_lower(); ?>
