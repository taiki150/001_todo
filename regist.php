<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/regist.css">
  <title>登録画面</title>
</head>
<body>
  <section class="main">
    <div class="regist_main">
      <h2>タスクの追加</h2>
      <div class="list">
        <a href="index.php">タスク一覧画面</a>
      </div>
      <form action="" method="post">
        <div class="regist_form">
          <label>タイトル</label>
          <input id="title" type="text" name="title">
        </div>
        <div class="regist_form">
          <label>色選択</label>
          <input id="" type="text" name="color">
        </div>
        <div class="regist_form">
          <label>締切日</label>
          <input id="" type="date" name="due_date">
        </div>
        <button type="submit">登録</button>
      </form>
    </div>
  </section>
</body>
</html>