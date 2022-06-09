<?php
// echo('hello');
// require_once('funcs.php');

// 1. POSTデータ取得
$name   = $_POST["name"];
$address  = $_POST["address"];
$color  = $_POST["color"];
$image = $_FILES["image"];
$content = $_POST["content"];

echo "<pre>";
var_dump($_POST) ;
var_dump($_FILES);
echo "</pre>";



// //2. DB接続します
// //*** function化する！  *****************
// // ※returnを変数にちゃんと入れる！
require_once('funcs.php');
$pdo = db_conn();

// //３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table2(name,address,color,image,content,date)VALUES(:name,:address,:color,:image,:content,sysdate())");
// // 数値の場合 PDO::PARAM_INT
// // 数値の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':color', $color, PDO::PARAM_INT);
$stmt->bindValue(':image', $image, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$status = $stmt->execute(); //実行
// //４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
