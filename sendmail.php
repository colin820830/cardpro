<?php

    require_once 'adodb.inc.php';
    require_once 'adodb-exceptions.inc.php';
    require_once 'database.php';   //資料庫class
    require_once 'config_inc.php';
    require_once 'startsession.php';
    require_once 'log.php';
    require_once 'class.php';

    $log   = new Log();
    $send_email = $_POST['send_email'];
    $receive_email = $_POST['receive_email'];
    $name = $_POST['name'];
    $Receive_Name = $_POST['Receive_Name'];
    $contentTextarea = $_POST['contentTextarea'];
    $Send_Name = $_POST['Send_Name'];
    $No = $_POST['No'];
    $card = $_POST['card'];
	$post_Card = $_POST['post_Card'];

    //寫入資料庫
    $I = new Information();
    // // $I->Receive_Name = $Receive_Name;
    // $I->Receive_Name = iconv("UTF-8", "big5", $Receive_Name);
    // // $I->contentTextarea = $contentTextarea;
    // $I->contentTextarea = iconv("UTF-8", "big5", $contentTextarea);
    // // $I->Send_Name = $Send_Name;
    // $I->Send_Name = iconv("UTF-8", "big5", $Send_Name);
    $I->receive_email = $receive_email;
    $I->send_email = $send_email;

    $I->No = $No;
    $I->card = $card;
    $I->post_Card = $post_Card;

    //寫入資料庫log
    $log->writeCardDataBase(json_encode($I), $Receive_Name, $contentTextarea, $Send_Name);

    //寄信
    $headers = "MIME-Version: 1.0 \r\n";
	$headers .= "Content-type:text/html;charset=utf-8 \r\n";
	$headers .= "From: ".$send_email."\r\n";

	$to = $receive_email;

	$subject = "順益企業 電子卡";
	// $message = "<html><body>
	// 	 <META Content-type:text/html;charset=utf-8 >

	// 	<span>Hi $Receive_Name</span><br><br>
	// 	<span>賀卡來囉~~</span>
	// 	<br>";	
		
	// $message .= "<img src='".'http://'. $_SERVER['HTTP_HOST'] . "/card/makedcard/$name.jpg' width='1280px' height='580px'></body></html>";


    $message = "<html>
    <body>
        <META Content-type:text/html;charset=utf-8 >

		<h3>Hi~ $Receive_Name</h3>
		<h3>您的朋友$Send_Name 寄了賀年卡給你</h3>
        <h3>請點擊信封打開</h3>";

    $message .= 
    "<a href='".'http://'. $_SERVER['HTTP_HOST'] . "/".Folder."/readcard.php?No=$No'><img src='".'http://'. $_SERVER['HTTP_HOST'] . "/".Folder."/images/Mail.jpg' alt='信封'></a></body></html>";	


    if (mail($to,$subject,$message,$headers)) {
	    echo "信件已寄出，感謝您的填寫";
	} else {
	    echo "信件發送失敗!";
	}
?>