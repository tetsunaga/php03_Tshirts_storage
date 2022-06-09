<?php
PHP:コード記述/修正の流れ
0. 関数ファイルを利用する場合は、ファイルを読み込む
1. insert.phpの処理をマルっとコピー。
  POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
2. $id = POST["id"]を追加
3. SQL修正
  "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
  bindValueにも「id」の項目を追加
4. header関数"Location"を「select.php」に変更

require_once('funcs.php');

//1. POSTデータ取得
$name   = $_POST["name"];
$address  = $_POST["address"];
$color    = $_POST["color"];
$image = $_POST["image"]
$content = $_POST["content"];

2. DB接続します
*** function化する！  *****************
※returnを変数にちゃんと入れる！
$pdo = db_conn();

３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE
                            gs_bm_table
                        SET
                            name = :name,
                            address = :address,
                            color = :color,
                            image = :image,
                            content = :content,
                            indate = sysdate()
                        WHERE
                            id = :id;
                        ");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':address', $address, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':color ', $color , PDO::PARAM_INT);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':image ', $image , PDO::PARAM_mediumblob);  
$stmt->bindValue(':content', $content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
