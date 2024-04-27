<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/select.css">
    <style>
  div{padding: 10px;font-size:16px;}
  td {border: 1px solid black; }
</style>
    <title>レシピ登録</title>
</head>

<body>

<header><p>管理者ページ - レシピ登録</p></header>

    <form method="POST" action="insert.php" enctype="multipart/form-data">
            <legend style="font-size: 30px;"><strong>登録フォーム</strong></legend>
            <table class="formTable">
          <tr>
          <tr></tr>
            <th>料理名</th>
            <td><input type="text" name="name" size="30"></td>
          </tr>
          <tr></tr><tr></tr>
          <th>画像登録</th>
            <td><input type="file" name="image"></td>
          </tr>
          <tr></tr><tr></tr>
          <tr>
            <th>材料<br /></th>
            <td><textarea name="zairyo" rows="5" cols="32"></textarea></td>
          </tr>
          <tr></tr><tr></tr>
          <tr>
            <th>作り方</th>
            <td><textarea name="recipe" rows="5" cols="32"></textarea></td>
          </tr>
          <tr></tr><tr></tr>
          <tr>
            <th>ポイント<br /></th>
            <td><textarea name="point" rows="5" cols="32"></textarea></td>
          </tr>
          <tr></tr><tr></tr>
        </table>
            <input type="submit" name="upload" class="register" value="　登 録　">
        </div>
    </form>

    <footer>
        <div class="mgmt">
            <a href="index.php">ユーザページ</a>
            <a href="select.php">レシピ一覧</a>
            <a class="navbar-brand" href="user.php">ユーザ登録</a>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
       </div>
    </footer>

</body>
</html>