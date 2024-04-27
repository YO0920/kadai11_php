<?php

include("funcs.php");

// キーワードが送信されたかチェック
if(isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    
    // データベース接続
    $pdo = db_conn();
    
    // 検索クエリを準備
    $sql = "SELECT * FROM db_recipe WHERE name LIKE :keyword OR zairyo LIKE :keyword OR recipe LIKE :keyword OR point LIKE :keyword";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":keyword", "%{$keyword}%");
    $status = $stmt->execute();
    
    // 検索結果を取得
    if($status) {
        $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $error = $stmt->errorInfo();
        exit("SQL_ERROR:".$error[2]);
    }
} else {
    // キーワードが送信されていない場合は、通常の一覧表示を行う
    include("select.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピ検索結果</title>
    <link rel="stylesheet" href="css/select.css">
</head>
<body>

<header>
    <p>管理者ページ - レシピ検索結果</p>
</header>

<?php if(isset($values) && count($values) > 0): ?>
    <div class="card-container" style="margin: auto;">
        <?php foreach($values as $value): ?>
            <div class="card">
                <p><strong>♥Recipe ID-<?=$value["id"]?></strong></p>
                <p style="font-size: 20px;"><strong><?=$value["name"]?></strong></p>
                <p><img src="<?=$value["image"]?>"></p>
                <p>材料<br><?=$value["zairyo"]?></p>
                <p>作り方<br><?=$value["recipe"]?></br></p>
                <p>ポイント<br><?=$value["point"]?></br></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>該当するレシピは見つかりませんでした。</p>
<?php endif; ?>

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
