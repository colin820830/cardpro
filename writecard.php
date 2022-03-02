<?php
    require_once 'startsession.php';
    require_once 'header.php';

    $card = isset($_REQUEST["card2"])? $_REQUEST["card2"] : "";
	$post_Card = isset($_REQUEST["post_Card"])? $_REQUEST["post_Card"] : "";

	$today = date("YmdHis");
?>

<script>

        function send_mail() {

                var No = '<?php echo $today ?>';
                var card = '<?php echo $card ?>';
                var post_Card = '<?php echo $post_Card ?>';
		        var send_email = document.getElementById("send_email").value;
		        var receive_email = document.getElementById("receive_email").value;

		        if(send_email == "" | receive_email == "")
		        {
		        	alert("請輸入完整信件地址");
		        	return false;
		        }

		        var Receive_Name = document.getElementById("Receive_Name").value;

		        var contentTextarea = document.getElementById("contentTextarea").value;
		        var Send_Name = document.getElementById("Send_Name").value;

		        var Parameters_mail = "send_email=" + send_email + "&receive_email=" + receive_email + 
                "&name=" + name + "&Receive_Name=" + Receive_Name + "&contentTextarea=" + contentTextarea + 
                "&Send_Name=" + Send_Name + "&No=" + No + "&card=" + card + "&post_Card=" + post_Card;

	            $.ajax({
		                type: "POST",
		                url: "sendmail.php",
		                data: Parameters_mail,
		                success : function(data)
		                {
		                    //alert(data);
		                    window.location.href ="successPage.php"
		                }
		            }).done(function() {
		                //$('body').html(data);
	            });

        }

        $(function() {
                $('#receive_email').autocomplete({
                    source: "search.php",
                    minLength: 1
                });
            });

        $(function() {
            $('#send_email').autocomplete({
                source: "search.php",
                minLength: 1
            });
        });

</script>

<main class="writecard">

    <h2>電子賀卡</h2>  

    <h3>步驟二：留言與寄送</h3>

    <section class="makecard">
        <div class="cardbox-left">
            <img alt="賀卡-左"
                src="images/<?php echo $card?>.jpg<? echo '?ran='. rand();?>" />
        </div>

        <div class="cardbox-right">
            <div class="Receive_Name_Input">
        		<input name="Receive_Name" type="text" id="Receive_Name" PlaceHolder="收件人姓名" class="input-in-card" />
        	</div>

			<img class="shung_ye_content" src="images/shung_ye.png" alt="shung_ye" />

            <img class="post_Card_content" alt="郵票 " 
                src="images/<?php echo $post_Card?>.jpg" />

            <div class="card_content">      
                <textarea class="form-control content" id="contentTextarea" PlaceHolder="想要說的話"></textarea>
            </div>

            <div class="Send_Name_Input">
    			<input name="Send_Name" type="text" id="Send_Name" PlaceHolder="寄件人姓名" class="input-in-card" />
    		</div>
        </div>
    </section>

    <div class="mail_message">

    	<div class="form-group mail">
	      <label for="receive_email" class="col-form-label">收件人電子信箱</label>
	      <div class="col-sm-4">
	        <input type="email" class="form-control" id="receive_email" placeholder="Enter email (要寄多人請用,區隔) 範例:A@syc.com.tw,B@syc.com.tw">
	      </div>
	    </div>

	    <div class="form-group mail">
	      <label for="send_email" class="col-form-label">寄件人電子信箱</label>
	      <div class="col-sm-4">
	        <input type="email" class="form-control" id="send_email" placeholder="Enter email">
	      </div>
	    </div>

	    <div class="form-group mail">
			<div class="col-sm-offset-3">
				<button type="submit" class="btn btn btn-primary" onclick="send_mail()">寄出</button>
			</div>
		</div>

    </div>	
</main>

<?php
    require_once 'footer.php';

?>