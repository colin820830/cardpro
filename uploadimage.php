<?php
	require_once('startsession.php');
	require_once('header.php');

	$card = isset($_REQUEST["card2"])? $_REQUEST["card2"] : "";
?>

<style type="text/css">
	
	.mgtp-10{
		margin-top: 10px;
	}

	.mglt-10{
		margin-left: 10px;
	}

</style>

<h3 class="mgtp-10 mglt-10">上傳圖片</h3>


<form method="post" enctype="multipart/form-data" action="upload.php">

	<input type="hidden" name="card2" value="<? echo $card ?>">

	<div class="mgtp-10 mglt-10 form-group row">
		<div class="col-sm-6">
	  		<input type="file" name="my_file" class="form-control">
	    </div>
    </div>

	<div class="mgtp-10 mglt-10">
   		<input type="submit" class="btn btn btn-primary" value="確認上傳">
    </div>
</form>

<?php
	require_once('footer.php');
?>