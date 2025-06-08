<?php
  require_once __DIR__ . '/vendor/autoload.php';
  require_once __DIR__ . '/database.php';
  db_conn();

  use App\Models\Task;
  use App\Models\Category;

  $categories = Category::all();
  $categories_length = Category::count();

  $animation_category_array = array();
?>
<script>
  var categoryLength = <?php echo $categories_length; ?>
</script>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDoアプリ</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <section class="header">
    <div class="header-box">
      <ul>
        <li><a href="index.php">ホーム</a></li>
        <li><a href="category_regist.php">カテゴリーの変更・追加</a></li>
        <li><a href="">タスクの追加</a></li>
      </ul>
    </div>
  </section>
  
  <section class="main">
    <div class="button">
      <div class="prev"><p id="prev">＜</p></div>
      <div id="page">
        <?php 
        for($i=0; $i<=$categories_length - 3; $i++){
          echo "<div></div>";
        }
        ?>
      </div>
      <div class="next"><p id="next">＞</p></div>
    </div>
    <?php 
      for($i=1; $i<=$categories_length; $i++){ 
        $tasks = Task::where('category_id', $i)->get();
        $category = Category::find($i);
    ?>

    <div class="todo_list" id="<?php echo 'category_'.$category->id; ?>">
      <h2><?php echo $category->category_name; ?></h2>
      <div class="add_list">
        <a id="add_list" href="regist.php">タスクの追加</a>
      </div>
      <div class="todo_contents">
        <?php foreach ($tasks as $task) { ?>
        <div class="todo_box">
          <a id="todo_box" href="task_show.php?id=<?php echo $task->id; ?>">
            <p class="task_id"><?php echo $task->id; ?></p>
            <h3 class="task_title"><?php echo $task->name; ?></h3>
            <p class="task_date"><span>締切：</span><?php echo $task->due_date; ?></p>
          </a>
        </div>
        <?php } ?>
      </div>
    </div>

    <?php } ?>
  </section>
  <script src="js/main.js"></script>
</body>
</html>

