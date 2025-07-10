<?php
  require_once __DIR__ . '/vendor/autoload.php';
  require_once __DIR__ . '/database.php';
  db_conn();

  use App\Models\Task;
  use App\Models\Category;

  $categories = Category::all();
  $categories_length = Category::count();
?>
<script>
  var categoryLength = <?php echo $categories_length; ?>
</script>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDoアプリ HOME</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/header.css">
</head>
<body>
  <div class="container">
    <?php require('header.php')?>
    
    <section class="main">
      <?php 
        foreach($categories as $category){ 
          $id = $category->id;
          $tasks = Task::where('category_id', $id)->get();
      ?>

      <div class="todo_list" id="<?php echo 'category_'.$category->id; ?>">
        <h2><?php echo $category->category_name; ?></h2>
        <div class="todo_contents">
          <?php foreach ($tasks as $task) { ?>
          <div class="todo_box">
            <a id="todo_box" href="task_show.php?id=<?php echo $task->id; ?>">
              <p class="task_status task_status_<?php echo $task->status_id?>"><?php echo $task->status->name; ?></p>
              <h3 class="task_title"><?php echo $task->name; ?></h3>
              <p class="task_time">
                <span>期間：</span><?php echo $task->start_time.'時〜'.$task->end_time.'時'; ?>
              </p>
            </a>
          </div>
          <?php } ?>
        </div>
      </div>

      <?php } ?>
      <div class="task_add_btn">
        <div id="task_add_btn">
          <a id="plus_btn"><span class="plus_btn"></span></a>
        </div>
      </div>
    </section>
    <section class="button">
      <div class="prev"><p id="prev">＜</p></div>
      <div id="page">
        <?php 
        for($i=0; $i<=$categories_length - 3; $i++){
          echo "<div></div>";
        }
        ?>
      </div>
      <div class="next"><p id="next">＞</p></div>
    </section>
    <section class="create_category">
      <h3>カテゴリー登録<span class="square_btn"></span></h3>
      <form action="actions/create.php" method="post">
        <div class="create_category_box">
          <input type="hidden" name="action_type" value="category_create">
          <p>カテゴリー名</p>
          <input type="text" name="category_name">
        </div>
        <button class="createBtn" type="submit">登録する</button>
      </form>
    </section>
    <?php if(count($categories) === 0) {?>
    <section class="message">
      <h3>
        カテゴリー登録がされていません。<br>
        利用するにはカテゴリーを登録する必要があります。<br>
        画面の左にある「＋」ボタンを押し、<br>
        カテゴリー登録に進んでください。
      </h3>
    </section>
    <?php } ?>
  </div>
  <script src="js/main.js"></script>
</body>
</html>

