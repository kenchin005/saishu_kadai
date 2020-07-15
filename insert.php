<?php
//1. POSTデータ取得

//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）


$text = $_POST["text"];
$fname = $_FILES["fname"]["name"];

// ファイル移動
$upload = "upload/";
if(move_uploaded_file($_FILES["fname"]["tmp_name"],$upload.$fname)){

}else{
  echo "アップロードera-";
  echo $_FILES["fname"]["error"];
}



//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
try {
  $pdo = new PDO('mysql:dbname=c_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$stmt = $pdo->prepare("INSERT INTO c_table(id, text, fname
 )VALUES(NULL,  :text,:fname )");

$stmt->bindValue(':text', $text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);

$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
  header("Location: index.php");
  exit;

}


?>



<!-- 
if (is_uploaded_file ( $_FILES ['file'] ['tmp_name'] )) {
    if (! file_exists ( 'upload' )) {
        mkdir ( 'upload' );
    }
    $file = 'upload/' . basename ( $_FILES ['file'] ['name'] );
    if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $file )) {
        echo $file, 'のアップロードに成功しました。';
        echo '<p><img src="', $file, '"></p>';
    } else {
        echo 'アップロードに失敗しました。';
    }
} else {
    echo 'ファイルを選択してください。';
}
?>
<p>
    <a href="main.php">一覧へ戻る</a>
</p>


var_dump($_FILES['file']['tmp_name']);
 -->

