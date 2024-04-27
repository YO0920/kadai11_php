<?php

// DB接続
include("funcs.php"); 
$pdo = db_conn();

// フォームからのデータ取得
$name = $_POST["name"];
$zairyo = $_POST["zairyo"];
$recipe = $_POST["recipe"];
$point = $_POST["point"];

// 画像のアップロード処理
$uploadDir = 'images/'; // アップロード先ディレクトリ
$imagePath = $uploadDir . basename($_FILES['image']['name']); // 画像の保存パス
if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
    echo 'アップロード成功！';
} else {
    echo 'アップロード失敗！';
}

// データベースへの挿入処理
$sql = "INSERT INTO db_recipe (name, image, zairyo, recipe, point, indate) VALUES (:name, :image, :zairyo, :recipe, :point, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':image', $imagePath, PDO::PARAM_STR); // 画像のパスを保存
$stmt->bindValue(':zairyo', $zairyo, PDO::PARAM_STR);
$stmt->bindValue(':recipe', $recipe, PDO::PARAM_STR);
$stmt->bindValue(':point', $point, PDO::PARAM_STR);
$status = $stmt->execute();

// エラーチェック
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:" . $error[2]);
} else {
    header("Location: registered.php");
    exit();
}
?>
