<?php
  require_once('startsession.php');
  require_once('header.php');

  $card = isset($_REQUEST["card2"])? $_REQUEST["card2"] : "";

  $today = date("YmdHis");
?>

<style type="text/css">
  
  .mgtp-10{
    margin-top: 10px;
  }

  .mglt-10{
    margin-left: 10px;
  }

</style>

<div class="mgtp-10 mglt-10">
  <?php

  if($_FILES['my_file']['type']=='image/png' || $_FILES['my_file']['type']=='image/jpeg')
  {
     # 檢查檔案是否上傳成功
    if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK){
      echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
      echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
      echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
      //echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';
      echo '上傳成功! <br/>';


      $file = $_FILES['my_file']['tmp_name'];
      $dest = 'images/' . $_FILES['my_file']['name'];

      $newName = $card . '.jpg';

      //更改被替換掉的圖片名稱
      rename('images/' . $newName, 'images/' . $today . '.jpg');

      # 將檔案移至指定位置
      move_uploaded_file($file, iconv("UTF-8", "big5", $dest));


      if($_FILES['my_file']['name'] != $newName)
      {
        //幫新圖片重新命名替換掉舊圖片
        rename('images/' . iconv("UTF-8", "big5", $_FILES['my_file']['name']), 'images/' . $newName);
      }


      
     } else {
      echo '錯誤代碼：' . $_FILES['my_file']['error'] . '<br/>';
    }
  }
  else{//如果不為圖檔的話
      echo '此副檔名需為jpg.jpge.png';
  }

 
  ?>
</div>

<?php
  require_once('footer.php');
?>