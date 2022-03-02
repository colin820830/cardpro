<?php
    require_once 'startsession.php';
    require_once 'Id_chk.php';
    require_once 'header.php';
?>

<main>
    

    <form action="writecard.php" method="post">

    <h2>電子賀卡</h2>  

    <h3>步驟一：請選擇喜歡的圖片及郵票貼紙</h3>

    <h3>郵票:</h3>

    <section class="stamps">
        
        <div class="stamp">
            <label for="post_Card1">

                <img src="images/1.jpg" alt="郵票1" title="台灣藍鵲"/>

                <div class="indicator">
                <input type="radio" id="post_Card1" name="post_Card" value="1" checked />
                <h6>郵票1</h6>
                </div>
            </label>
        </div>

        <div class="stamp">
            <label for="post_Card2">

                <img src="images/2.jpg" alt="郵票2" title="水蜜桃"/>

                <div class="indicator">
                <input type="radio" id="post_Card2" name="post_Card" value="2" />
                <h6>郵票2</h6>
                </div>
            </label>
        </div>

        <div class="stamp">
            <label for="post_Card3">


                <img src="images/3.jpg" alt="郵票3" title="101煙火"/>

                <div class="indicator">
                <input type="radio" id="post_Card3" name="post_Card" value="3" />
                <h6>郵票3</h6>
                </div>
            </label>
        </div>

        <div class="stamp">
            <label for="post_Card4">


                <img src="images/4.jpg" alt="郵票4" title="繡眼畫眉"/>

                <div class="indicator">
                <input type="radio" id="post_Card4" name="post_Card" value="4" />
                <h6>郵票4</h6>
                </div>
            </label>
        </div>

        <div class="stamp">
            <label for="post_Card5">


                <img src="images/5.jpg" alt="郵票5" title="黑面琵鷺"/>

                <div class="indicator">
                <input type="radio" id="post_Card5" name="post_Card" value="5" />
                <h6>郵票5</h6>
                </div>
            </label>
        </div>

        <div class="stamp">
            <label for="post_Card6">


                <img src="images/6.jpg" alt="郵票6" title="甜柿" />

                <div class="indicator">
                <input type="radio" id="post_Card6" name="post_Card" value="6" />
                <h6>郵票6</h6>
                </div>
            </label>
        </div>

        <div class="stamp">
            <label for="post_Card7">


                <img src="images/7.jpg" alt="郵票7" title="芒果"/>

                <div class="indicator">
                <input type="radio" id="post_Card7" name="post_Card" value="7" />
                <h6>郵票7</h6>
                </div>
            </label>
        </div>

        <div class="stamp">
            <label for="post_Card8">


                <img src="images/8.jpg" alt="郵票8" title="八家將"/>

                <div class="indicator">
                <input type="radio" id="post_Card8" name="post_Card" value="8" />
                <h6>郵票8</h6>
                </div>
            </label>
        </div>
    </section>

    <h3>賀年卡片:</h3>

    <section class="cards">

        <div class="card">
            <label for="card1">
                                    
                <div class="card-box">
                    <img alt="圖片一 "
                        src="images/Card_A.jpg<? echo '?ran='. mt_rand(0,10000);?>" />
                </div>

                <div class="indicator">
                    <input type="radio" id='card1' class="form-check-input center"
                    name="card2" value="Card_A"   checked/>
                    圖片一
                </div>
            </label>
        </div>

        <div class="card">
            <label for="card2">
                                    
                <div class="card-box">
                    <img alt="圖片一 "
                        src="images/Card_B.jpg<? echo '?ran='. mt_rand(0,10000);?>" />
                </div>

                <div class="indicator">
                    <input type="radio" id='card2' class="form-check-input center"
                    name="card2" value="Card_B" />
                    圖片一
                </div>
            </label>
        </div>

    </section>

    <div>
        <button type="submit" class="btn btn btn-primary">下一步</button>
    </div>

    </form>

</main>


<?php
    require_once 'footer.php';
?>