<?php
  require_once __DIR__ . '/vendor/autoload.php';
  require_once __DIR__ . '/database.php';
  db_conn();
  
  use App\Models\Category;

  $categories = Category::all();

  ?>
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
          <label for="switch" class="switch_label">新規登録</label>
            <input type="checkbox" id="switch" />
            <div class="base"></div>
        </div>

        <div class="regist_form">
          <label id="beforeLabel">①変更前</label>
          <select name="" id="beforeInput">
            <option value="">選択してください</option>
            <?php
              foreach($categories as $category){ ?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="regist_form">
          <label id="afterLabel">②変更後</label>
          <input id="afterInput" class="noActiveInput" type="text">
        </div>

        <button class="" id="addBtn" type="submit">登録</button>
      </form>
    </div>
  </section>
  <script src="js/regist.js"></script>
</body>
</html>