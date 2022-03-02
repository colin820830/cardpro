<?php
	require_once('startsession.php');
	require_once('header.php');

	require_once 'adodb.inc.php';
	require_once 'adodb-exceptions.inc.php';
	require_once 'database.php';   //資料庫class
	require_once 'config_inc.php';


	//建立資料庫連線取得 管理者資料
	$db = new Database('oracle', DB_HT_3, '1521',DB_SD_3);
    $db->initDB(DB_UR_3, DB_PD_3);
    $result_User = $db->selStmt('GreetingCardUser', '*', 'where IS_DELETE <> \'Y\'', '');
?>

<style type="text/css">

	.mt-10{
		margin: 10px;
	}

	.wd-80{
		width: 80%;
	}

</style>

<script>

	$(function() {
	        $('#user_id').autocomplete({
	            source: "searchSycUser.php",
	            minLength: 1
	        });
	    });
	
</script>

<h3 class="mt-10">權限設定</h3>

<form action="manageUser_prs.php" method="post">

<div class="mt-10">
	<div class="form-group row mt-10">
	      <label for="user_id" class="col-sm-2 col-form-label">帳號</label>
	      <div class="col-sm-4">
	        <input type="text" class="form-control col-sm-6" id="user_id" name="user_id" placeholder="">
	      </div>
    </div>

    <div class="form-group row mt-10">
	      <label for="user_right" class="col-sm-2 col-form-label">權限</label>
	      <div class="col-sm-4">
	        
			<select class="form-control" id="user_right" name="user_right">
			<?		
				//建立yyc3資料庫連線
		        $db = new Database('oracle', DB_HT_3, '1521',DB_SD_3);
		        $db->initDB(DB_UR_3, DB_PD_3);
		        $result = $db->selStmt('GreetingCardUserRight', '*', 'where IS_DELETE <> \'Y\'', '');

    			for ($i=0; $i<count($result); $i++) 
				{
				    $id = $result[$i][0];
				    //$name = $result[$i][2];

				    $name = mb_convert_encoding($result[$i][1], "UTF-8", "BIG5");

				    echo '<option value="'.$id.'">'.$name.'</option>';
				}

			?>
			</select>

	      </div>
    </div>

    <div class="form-group mt-10">
		<div class="col-sm-offset-3 col-sm-09">
			<button type="submit" class="btn btn btn-primary" onclick="block_capture()">確認送出</button>
		</div>
	</div>


</div>

</form>

<br>

<h3 class="mt-10">管理人員</h3>

<div class="mt-10 wd-80">

	<table class="table table-hover">
		<thead>
	    <tr>
	      <th scope="col">使用者帳號</th>
	      <th scope="col">使用者名稱</th>
	    </tr>
	  </thead>

	  <?
		if (!empty($result_User))  
		{	
			echo "<tbody>";	

		  	for ($i=0; $i<count($result_User); $i++) 
		  	{
				$res01 = trim($result_User[$i][0]);
				$res02 = mb_convert_encoding($result_User[$i][1], "UTF-8", "BIG5");

		  		echo "<tr>";
		  		echo "<td>" . $res01 ."</td>"; //帳號
		  		echo "<td>" . $res02 ."</td>"; //名稱
				echo "</tr>";
		  	}

		  	echo "</tbody>";
	    }
	  ?>

	</table>

</div>



<?php
	require_once('footer.php');
?>