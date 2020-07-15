<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>twitter</title>
    <link rel="stylesheet" href="css/twistyle.css">
</head>
<body>


<!-- php以下 -->
<?php

try {
  $pdo = new PDO('mysql:dbname=d_db;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }
  
  //２．データ登録SQL作成
  //作ったテーブル名を書く場所  xxxにテーブル名を入れます
  $stmt = $pdo->prepare("SELECT * FROM d_table ORDER BY id DESC;");
  $status = $stmt->execute();


$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // $view .= "<p>";
    // $view .= $result["id"].":".$result["naiyou"].":".$result["email"];
    // $view .= "</p>";

    // $view .= '<div class="pic">
    //             <img src="upload/'.$result["fname"].'" width="300" >
    //           <div class="inst_hidden">
    //             <div class="pic_hidden">
    //               <p><img src="upload/'.$result["fname"].'" width="300" ></p>
    //             </div>
    //             <div class="account">
    //               <div class="user">
    //                 <p class ="nam">kenshiro_ootsuka</p>
    //                 <p class="follow">フォローする</p>
    //               </div>
    //               <div class="text_hidden">
    //               <p>'.$result["text"].'</p>
    //             </div>
    //            </div>
    //            </div>
    //        </div>';

    $view .= '<div class="twi_con">
                <div class="kao_name">
                    <p class="kotei_icon"><img src="img/顔アイコン.jpg" alt=""></p>
                    <div class="name_text">
                        <p><span style="font-weight: bold">けんけん</span><span style="color:gray">@kenken005</span></p>
                        <p class="naiyou">'.$result["text"].'</p>
                    </div>
                </div>
                <div class="pic">
                    <p><img src="twi_upload/'.$result["fname"].'" ></p>
                </div>
            </div>';


  }

}
?>

<!-- ｐｈｐ -->

<div class="twitter">

    <div class="navi">
        <div class="navi_pic_con">
            <div class="same">
                <p><img src="img/人食いザメ.png" alt=""></p>
                
            </div>
            <div class="ie">
                <p><img src="img/家の無料アイコン.png" alt=""></p>
                <h1><a href="twitter.php">ホーム</a></h1>
            </div>
            <div class="mail">
                <p><img src="img/メールの無料アイコン.png" alt=""></p>
                <h1>メッセージ</h1>
            </div>
            <div class="list">
                <p><img src="img/アンケート用紙のアイコン素材.png" alt=""></p>
                <h1>リスト</h1>
            </div>
            
            <div class="hane" id="openModal">
                <p><img src="img/羽根のペンの無料アイコン素材.png" alt=""></p>
                <h1>ツイートする</h1>
                </a>
            </div>
        </div>



    </div>

    <div class="tweet_box">
        <h1>ホーム</h1>

        <div class="tweet">
            <p><img src="img/顔アイコン.jpg" alt=""></p>
            <form action="twi_insert.php" method="post" enctype="multipart/form-data">
                <div class="twi_area">
                <input type="text" name="text" placeholder="いま何してる？" class="twi_text">
                <!-- <label for="file"> -->
                </div>
                
                <!-- jsから書くhttps://zxcvbnmnbvcxz.com/input-typefile-%E3%82%92%E7%94%BB%E5%83%8F%E3%83%9C%E3%82%BF%E3%83%B3%E3%81%AB%E5%A4%89%E6%9B%B4%E3%81%99%E3%82%8B%E6%96%B9%E6%B3%95/ -->
                <div class="sousin">
                <input type="file" value="" accept="image/*" class="file_button" name="fname">
                <label for="" class="file_mask">
                    <span></span>
                    <!-- <input type="text"  class="file_mask_bg"> -->
                    <img src="img/写真アイコン4.png" alt="" style="cursor: pointer;" class="file_mask_bg">
                </label>
                    <input type="submit" value="ツイートする" class="submit">
                </div>
            </form>
        </div>


        <!-- <div class="twi_con">
            <div class="kao_name">
                <p class="kotei_icon"><img src="img/顔アイコン.jpg" alt=""></p>
                <div class="name_text">
                    <p><span style="font-weight: bold">けんけん</span><span style="color:gray">@kenken005</span></p>
                    <p class="naiyou">この風景はきれいだったなあ</p>
                </div>
            </div>
            <div class="pic">
                <img src="img/huukei.jpg" alt="">
            </div>
        </div>
        <div class="twi_con">
            <div class="kao_name">
                <p class="kotei_icon"><img src="img/顔アイコン.jpg" alt=""></p>
                <div class="name_text">
                    <p><span style="font-weight: bold">けんけん</span><span style="color:gray">@kenken005</span></p>
                    <p class="naiyou">この風景はきれいだったなあ</p>
                </div>
            </div>
            <div class="pic">
                <img src="img/huukei.jpg" alt="">
            </div>
        </div>
        <div class="twi_con">
            <div class="kao_name">
                <p class="kotei_icon"><img src="img/顔アイコン.jpg" alt=""></p>
                <div class="name_text">
                    <p><span style="font-weight: bold">けんけん</span><span style="color:gray">@kenken005</span></p>
                    <p class="naiyou">この風景はきれいだったなあ</p>
                </div>
            </div>
            <div class="pic">
                <img src="img/huukei.jpg" alt="">
            </div>
        </div> -->

        <?php
           echo $view;
        ?>

    </div>

    <div class="output">

    </div>

    <div class="trend">
        <input type="text" name="" placeholder="キーワードを検索" id="kensaku">

        <div class="osusume">
            <h1>おすすめトレンド</h1>
                <div class="osusume-word">
                    <p><span style="color: gray">日本のトレンド</span></p>
                    <p>#新型肺炎</p>
                    <p><span style="color: gray">2500件のツイート</span></p>
                </div>
                <div class="osusume-word">
                    <p><span style="color: gray">日本のトレンド</span></p>
                    <p>#臨時休校</p>
                    <p><span style="color: gray">1700件のツイート</span></p>
                </div>
                <div class="osusume-word">
                    <p><span style="color: gray">日本のトレンド</span></p>
                    <p>#マスク品切れ</p>
                    <p><span style="color: gray">28000件のツイート</span></p>
                </div>
                <p>さらに表示</p>
        </div>

        <div class="osusume2">
            <h1>おすすめユーザー</h1>
                <div class="osusume_user">
                    <p class="icon"><img src="img/hibaji.png" alt=""></p>
                        <div class="user">
                            <p>ラーメン二郎 ひばりが丘店</p>
                            <span style="color: gray">@hibarijirou</span>
                        </div>
                    <p class="follow">
                        フォロー
                    </p>


                </div>
                <div class="osusume_user">
                    <p class="icon"><img src="img/tibakara.png" alt=""></p>
                        <div class="user">
                            <p>ちばから 渋谷道元坂店</p>
                            <span style="color: gray">@chibakara</span>
                        </div>
                    <p class="follow">
                        フォロー
                    </p>


                </div>
                <div class="osusume_user">
                    <p class="icon"><img src="img/shin.png" alt=""></p>
                        <div class="user">
                            <p>劇団☆新感線　公式</p>
                            <span style="color: gray">@shinkansen</span>
                        </div>
                    <p class="follow">
                        フォロー
                    </p>


                </div>
                さらに表示
        </div>

        




    </div>

    </div>

<section id="modalArea" class="modalArea">
  <div id="modalBg" class="modalBg"></div>
  <div class="modalWrapper">
    <div class="modalContents">
    

    <div class="tweet_hidden">
            <p><img src="img/顔アイコン.jpg" alt=""></p>
            <form action="twi_insert.php" method="post" enctype="multipart/form-data">
                <div class="twi_area">
                <input type="text" name="text" placeholder="いま何してる？" class="twi_text">
                <!-- <label for="file"> -->
                </div>
                
                <!-- jsから書くhttps://zxcvbnmnbvcxz.com/input-typefile-%E3%82%92%E7%94%BB%E5%83%8F%E3%83%9C%E3%82%BF%E3%83%B3%E3%81%AB%E5%A4%89%E6%9B%B4%E3%81%99%E3%82%8B%E6%96%B9%E6%B3%95/ -->
                <div class="sousin">
                <input type="file" value="" accept="image/*" class="file_button1" name="fname">
                <label for="" class="file_mask">
                    <span></span>
                    <!-- <input type="text"  class="file_mask_bg"> -->
                    <img src="img/写真アイコン4.png" alt="" style="cursor: pointer;" class="file_mask_bg1">
                </label>
                    <input type="submit" value="ツイートする" class="submit">
                </div>
            </form>
    </div>


    </div>
    <div id="closeModal" class="closeModal">
      
    </div>
  </div>
</section>




</div>




    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script >
        
    // $(function(){
    //     $('.file_button').change(function(){
    //         $('.file_mask_bg').val($('.file_button').val());
    //     });
    //     $('.file_mask_bg').click(function(){
    //         var $elm = $('.file_button');
    //         if(document.createEvent){
    //             var e = document.createEvent('MouseEvents');
    //             e.initEvent('click',true,true);
    //             $elm.get(0).dispatchEvent(e);
    //         }else{
    //             $elm.trigger('click');
    //         }
    //         return false;

           
    //     });
        
    // });

    $(function(){
        $(".file_button").change(function(){
		$(".file_mask_bg").val($(".file_button").val());
	});
	$(".file_mask_bg").click(function(){
		$(".file_button").click();
	});
});

$(function(){
        $(".file_button1").change(function(){
		$(".file_mask_bg1").val($(".file_button1").val());
	});
	$(".file_mask_bg1").click(function(){
		$(".file_button1").click();
	});
});



$(function () {
  $('#openModal').click(function(){
      $('#modalArea').fadeIn();
  });
  $('#closeModal , #modalBg').click(function(){
    $('#modalArea').fadeOut();
  });
});


// $(function(){
//     $(window).scroll(function() {
//     if($(this).scrollTop() > 300) {
//         $('.trend').addClass("fixed")
//     }else{
//         $('.trend').removeClass("fixed")
//     }        
//     });
// });

</script>
<!-- $(function($) {
    var sidebar = $(".trend")
    var sticked = $(".osusume2")
    var content = $(".tweet_box")

    // サイドバーのポジション
    var sidebar_top = sidebar.offset().top;
    // 固定もともとの位置
    var sticked_og_top = sticked.offset().top;
    // 固定するコンテンツの高さ
    var sticked_height = sticked.height();

    $(window).on('scroll resize',function() {
        //現在の位置
        var scrollTop = $(document).scrollTop 
        // メインコンテンツ最後尾
        var content_bottom = content.offset().top + content.height();

        if((scrollTop > sticked_og_top) //&& (scrollTop < content_bottom - sticked_height)
        ){
            //もし現在位置が、初期位置より↓で、メインコンテンツ最後尾より上なら画面上部にサイドバーを固定
            sticked.css({'position': 'fixed',
            'top': 0,
            // 'width': sidebar.width()
            }); 
        }else if(scrollTop >= content_bottom - sticked_height){
            //現在位置がメインコンテンツ最後尾より下なら、メインコンテンツ最後尾にサイドバーを位置させる
            sticked.css({'position': 'absolute',
                        'top': content_bottom - sticked_height - sidebar_top,
                        'width': sidebar.width()
                        });
        }else{
            //現在位置が初期位置より上なら何もしない
            sticked.css({'position': 'static'});
        }
    });

}); -->









</body>
</html>