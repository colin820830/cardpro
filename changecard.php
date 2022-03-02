<?php
	require_once('startsession.php');
	require_once('header.php');

?>

<style type="text/css">

	ul li{
		list-style: none;
	}


	.center{
		margin-left: 40%;
	}

	.cardList{
	　display:inline;
      
	}


	.card-box{
		width: 640px;
		height: auto;
	}


	img{
		width: 100%;
		height: auto;
	}

</style>

<form action="uploadimage.php" method="post">
	<div >
	            
	    <h2 style="margin: 10px 10px 10px 50px">替換圖片-電子賀卡</h2>  

	            <h3 style="margin: 10px 10px 10px 50px">請選擇要替換的圖片</h3>
	            
	            <ul>
	            		<li>
                              <div class="radio-item">
                            <label for="card2_3">
                                   
                                <div class="card-box">
	                                <figure>
	                                     <img alt="圖片一 "
	                                src="images/Card_A.jpg<? echo '?ran='. rand();?>" />
	                                </figure>
								</div>

                                <div class="indicator">
                                	<input type="radio" id='card2_3' class="form-check-input center"
                                    name="card2" value="Card_A"   checked/>
                                 	圖片一
                             	</div>
                            </label>
                        </div>
                        </li>

                        <li>
                              <div class="radio-item">
                            <label for="card2_4">
                                   
                                <div class="card-box">
	                                <figure>
	                                     <img alt="圖片二 "
	                                src="images/Card_B.jpg<? echo '?ran='. rand();?>" />
	                                </figure>
								</div>

                                <div class="indicator">
                                	<input type="radio" id='card2_4' class="form-check-input center"
                                    name="card2" value="Card_B" />
                                 	圖片二
                             	</div>
                            </label>
                        </div>
                        </li>


                        <!-- <li>
                              <div class="radio-item">
                            <label for="card2_1">
                                   
                                <div class="card-box">
	                                <figure>
	                                     <img alt="圖片三 "
	                                src="images/Card_C.jpg<? echo '?ran='. rand();?>" />
	                                </figure>
                                </div>

                                <div >
                                	<input type="radio" id='card2_1' class="form-check-input center"
                                    name="card2" value="Card_C"/> 
                                	圖片三
                            	</div>
                            </label>
                        </div>
                        </li>
                    
                        <li>
                          <div class="radio-item">
                        	<label for="card2_2">

                        		<div class="card-box">
		                            <figure>
		                                 <img alt="圖片四 "
		                            src="images/Card_D.jpg<? echo '?ran='. rand();?>" />
		                            </figure>
								</div>

                                <div class="indicator">
                                	<input type="radio" id='card2_2' class="form-check-input center"
                                    name="card2" value="Card_D" />
                                 	圖片四
                             	</div>
                            </label>
                        	</div>
                        </li>                --> 
	            </ul>


	           
	            <div class="form-group center">
					<div class="col-sm-offset-3 col-sm-09">
						<button type="submit" class="btn btn btn-primary">下一步</button>
					</div>
				</div>

	</div>

</form>


<?php
	require_once('footer.php');
?>