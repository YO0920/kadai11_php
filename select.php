<?php

//1.  DB接続します
include("funcs.php"); //DB接続

//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM db_recipe";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //true or false

//３．データ表示
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード] このまま覚える
//JSONに値を渡す場合に使う
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>レシピ一覧</title>
<link rel="stylesheet" href="css/select.css">
<style>
div{padding: 10px;font-size:16px;}
td {border: 1px solid black; }
</style>
</head>

<header><p>管理者ページ - レシピ一覧</p></header>
<?=$_SESSION["name"]?>さん、こんにちは！
<body id="main">
<!-- Head[Start] -->

<!-- Head[End] -->


<!-- Main[Start] -->
<form method="GET" action="search.php">
    <input type="text" name="keyword" placeholder="キーワードを入力">
    <input type="submit" value="検索" class="register">
</form>


<div class="card-container" style="margin: auto;">
  <?php foreach($values as $value){ ?>
      <div class="card">
          <p><strong>♥Recipe ID-<?=$value["id"]?></strong></p>
          <p style="font-size: 20px;"><strong><?=$value["name"]?></strong></p>
          <p><img src="<?=$value["image"]?>"></p>
          <p>材料<br><?=$value["zairyo"]?></p>
          <p>作り方<br><?=$value["recipe"]?></br></p>
          <p>ポイント<br><?=$value["point"]?></br></p>
      </div>
  <?php } ?>
  </div>

  <footer>
        <div class="mgmt">
            <a href="index.php">ユーザページ</a>
            <a href="index.php">レシピ登録</a>
            <a href="select.php">レシピ一覧</a>
            <a class="navbar-brand" href="user.php">ユーザ登録</a>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
       </div>
    </footer>

<!-- Main[End] -->


<script>


</script>
</body>
</html>
