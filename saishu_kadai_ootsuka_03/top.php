<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Instagram</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
  
<div class="insta">
<!-- Head[Start] -->
<header>
  <!-- <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav> -->
  <div class="navi">
    <div class="naviga">
    <p><img src="img/カメラのアイコン素材.png" alt=""></p>
    </div>
    <div class="tex">
    <input type="text" placeholder="検索">
    </div>
    <div class="rightnavi">
    <p><img src="img/方位磁針のアイコン素材2.png" alt=""></p>
    <p><img src="img/ハートのマーク5.png" alt=""></p>
    <p><img src="img/人物アイコン.png" alt=""></p>
    </div>
  
  </div>



</header>
<!-- Head[End] -->


<div class="prof">
  <div class="kao">
  <img src="img/顔アイコン.jpg" alt="">
  </div>
  <div class="account">
    <div class="user">
      <p class ="nam">kenshiro_ootsuka</p>
      <p class="follow">フォローする</p>
    </div>
    <div class="comment">
      <p>PHP勉強中です！</p>
    </div>  
    
  </div>
</div>




<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->

<!-- Main[End] -->


<!-- ?php
$file = 'upload/'. basename($_FILES['apple']['name']);
move_uploaded_file($_FILES['apple']['tmp_name'], $file);
echo '<p><img src="',$file,'"></p>';
? -->

<!-- <div class="pic_con">
  <div class="pic">
  <img src="img/風景.jpg" >
  </div>
  <div class="pic">
  <img src="img/風景.jpg" >
  </div>
  <div class="pic">
  <img src="img/風景.jpg" >
  </div>
  <div class="pic">
  <img src="img/風景.jpg" >
  </div>
</div>
 -->













<?php

try {
  $pdo = new PDO('mysql:dbname=c_db;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }
  
  //２．データ登録SQL作成
  //作ったテーブル名を書く場所  xxxにテーブル名を入れます
  $stmt = $pdo->prepare("SELECT * FROM c_table ORDER BY id DESC;");
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

    $view .= '<div class="pic">
                <p class="gazou"><img src="upload/'.$result["fname"].'" width="300" ></p>
                  <div class="inst_hidden">
                    <div class="pic_hidden">
                      <p><img src="upload/'.$result["fname"].'" width="300" ></p>
                    </div>
                    <div class="account">
                      <div class="user">
                        <p class ="nam">kenshiro_ootsuka</p>
                        <p class="follow">フォロー</p>
                      </div>
                      <div class="text_hidden">
                      <p>'.$result["text"].'</p>
                      </div>
                      <p class="batu1"><img src="img/やや太いバツのアイコン.png" alt=""></p>
                
                    </div>
                  </div>
              </div>';
  }

}
?>

<!-- $view -->

<div class="pic_con">
  <?php echo $view;   ?>
</div>

</div>

<form method="post" action="insert.php" enctype="multipart/form-data">
  <div class="inst">
   <fieldset>
    
     <label><textArea name="text" rows="4" cols="40"></textArea></label><br>
     <label>画像<input type="file" name="fname" id="file" accept="image/*"></label><br>
     <input type="submit" name="submit" value="投稿" id="submit">
     <label><p class="batu"><img src="img/やや太いバツのアイコン.png" alt=""></p></label>
    </fieldset>
  </div>
</form>





<!-- <div class="inst_hidden">
  <div class="pic_hidden">
  <p><img src="img/asosan.jpg" alt=""></p>
  </div>
  <div class="account">
    <div class="user">
      <p class ="nam">kenshiro_ootsuka</p>
      <p class="follow">フォローする</p>
    </div>
    <div class="text_hidden">
      あああああああ
    </div>
  </div>



</div> -->





 <!-- echo $view;   ?> -->





<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<script>

$(".inst").css("display", "none");

$(".naviga p").on("click", function(){
    $(".inst").fadeIn("1000")
    $(".insta").css("opacity","0.5")
});

$(".batu").on("click", function(){
  
  $(".inst").css("display", "none")
  $(".insta").css("opacity","1.0")
});

$(".inst_hidden").css("display", "none");


$(".pic").on("click", function(){
  $(this).find('.inst_hidden').fadeIn();
  // $(".kakusi").addClass("over")
  // $('body').addClass('on');
  // $(".insta").addClass("over")
  // $(".inst_hidden").addClass("ov")
});


// $(".pic").on("click", function(){
//  $(this).find('.inst_hidden').addClass("show")
//  $(".show").fadeIn()

// });

$(".batu1").on("click", function(e){
  e.stopPropagation();
  $('.inst_hidden').css("display", "none");
  // $(".inst_hidden").removeClass("show")
  // $(".insta").removeClass("over")

});





// $(".pic").click(
// 	function(){
//     [id:modal-open]をクリックしたら起こる処理
//     $("body").append('<div id="modal-overlay"></div>');
//     $("#modal-overlay").fadeIn("slow");
//     $(".inst_hidden").fadeIn("1000");
//     if($("#modal-overlay")[0]) return false ;
    
    


// 	}
// );

// $("#modal-overlay").click(function(){
//   //[#modal-overlay]、または[#modal-close]をクリックしたら起こる処理
//   $("#modal-overlay").fadeOut("slow",function(){
// 	//フェードアウト後、[#modal-overlay]をHTML(DOM)上から削除
// 	$("#modal-overlay").remove();
// });

// });


</script>
</div>
<!-- <div class="top">
<a href="top.php">
  <h3>Top</h3>
</a> -->
</div>
</body>
</html>
