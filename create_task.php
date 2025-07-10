<?php
  require_once __DIR__ . '/vendor/autoload.php';
  require_once __DIR__ . '/database.php';
  db_conn();

  use App\Models\Task;
  use App\Models\Category;

  $categories = Category::all();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/create_task.css">
  <title>ToDoアプリ カテゴリ追加画面</title>
</head>
<body>
  <div class="container">
    <?php require('header.php');?>
    <section class="main">
      <div class="create_main">
        <h2>タスクの登録</h2>
        <div class="list">
          <a href="index.php">一覧へ戻る</a>
        </div>

        <form action="actions/create.php" method="post" class="">

          <div class="border"></div>

          <div class="create_form">
            <label>タイトル</label>
            <input type="text" name="name" id="name">
          </div>

          <div class="border"></div>

          <div class="create_form">
            <label>カテゴリー</label>
            <select name="category_id" id="category_name">
              <option value="">選択してください</option>
              <?php
                foreach($categories as $category){ ?>
                  <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="border"></div>

          <div class="create_form">
            <label>開始時間</label>
            <input type="number" min="0" max="24" placeholder="例）9時 は「9」と入力" name="start_time" id="start_time">
          </div>

          <div class="border"></div>

          <div class="create_form">
            <label>終了時間</label>
            <input type="number" min="0" max="24" placeholder="例）18時 は「18」と入力" name="end_time" id="end_time">
          </div>

          <div class="border"></div>

          <div class="create_form">
            <label>説明</label>
            <textarea name="description"></textarea>
          </div>
          <input type="hidden" name="action_type" value="task_create">

          <button type="submit" id="create_btn">登録</button>
        </form>
        
        <?php if (isset($_GET['success']) && in_array($_GET['success'] , [1,2])){ ?>
        <div id="msg_box">
          <?php //登録が完了したら文言出現 ?>
          <?php if ($_GET['success'] == 1){ ?>
            <p id="success_message">タスク登録に失敗しました。<br><span>※このメッセージは5秒後に自動消去されます</span></p>
          <?php }elseif($_GET['success'] == 2){ ?>
            <p id="success_message">タスクが登録されました！<br><span>※このメッセージは5秒後に自動消去されます</span></p>
          <?php } ?>

        </div>
        <?php } ?>

      </div>
    </section>
  </div>
  <script src="js/regist.js"></script>
</body>
</html>