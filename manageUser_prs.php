<?
	require_once 'adodb.inc.php';
	require_once 'adodb-exceptions.inc.php';
	require_once 'database.php';   //資料庫class
	require_once 'config_inc.php';
	require_once 'startsession.php';
	require_once('header.php');

	$user_id = $_POST['user_id'];

	$user_right = $_POST['user_right'];

	//echo($user_id);

	$db_s = new Database('oracle', DB_HT_S, '1521',DB_SD_S);
	$db_s->initDB(DB_UR_S, DB_PD_S);
	$result_syc_user = $db_s->selStmt('syc_user', '*', 'where userid like \'%'.$user_id.'%\'', '');

	$user_name = $result_syc_user[0][2];

	if(empty($user_name))
	{
		$message = "資料輸入有誤請再次確認" ;
		?>
		<script>
			alert("<?php echo $message;?>");
			location.href = "manageUser.php";
		</script>
	<?	
	}

	//建立yyc3資料庫連線
    $db = new Database('oracle', DB_HT_3, '1521',DB_SD_3);
    $db->initDB(DB_UR_3, DB_PD_3);


    $fields = "user_id, user_name, IS_DELETE, Create_DT, GREETINGCARDUSERRIGHT_ID";

    $values = "'$user_id', '$user_name', 'N', sysdate, $user_right";
        
    $db->insStmt("GreetingCardUser", $fields, $values);

    $message = "已新增一筆資料" ;
?>

<script>
	alert("<?php echo $message;?>");
	location.href = "manageUser.php";
</script>