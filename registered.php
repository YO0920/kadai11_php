<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>レシピ登録完了</title>
<link rel="stylesheet" href="css/select.css">
<style>
div{padding: 10px;font-size:16px;}
td {border: 1px solid black; }
</style>
</head>
<header><p>管理者ページ - レシピ登録</p></header>

<footer>
        <div class="mgmt">
            <a href="index.php">ユーザページ</a>
            <a class="navbar-brand" href="user.php">データ登録</a>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
       </div>
    </footer>

<!-- Main[End] -->


<script>


</script>
</body>
</html>



<?php
//1.  DB接続します
include("funcs.php"); 

//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM db_recipe ORDER BY indate DESC LIMIT 1";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //true or false

//３．データ表示
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>auction</title>
<link rel="stylesheet" href="stylesheet.css">

</head>

<body>
<div class="recipe_con">
  <h2>登録が完了しました</h2>
  <div class="card-container" style="margin: auto;">
  <?php foreach($values as $value){ ?>
      <div class="card">
          <p><strong><?=$value["name"]?></strong></p>
          <p><img src="<?=$value["image"]?>"></p>
          <p>材料<br><?=$value["zairyo"]?></p>
          <p>作り方<br><?=$value["recipe"]?></br></p>
          <p>ポイント<br><?=$value["point"]?></br></p>
      </div>
  <?php } ?>
  </div>
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
</body>
</html>
