<?php
  require_once __DIR__ . '/vendor/autoload.php';
  require_once __DIR__ . '/database.php';
  db_conn();

  use App\Models\Task;

  // URLからid番号を取得
  $id = $_GET["id"] ?? null;

  // 前画面でクリックしたタスクのid番号のタスク情報を取得
  $task = Task::find($id);

  // カレンダーボックス24個作成
  function creaate_caledar_box(){
    for($i=1; $i<=24; $i++){
      echo  <<< EOT
        <div class="calendar_1day_box"><p class="situation_box"></p></div>
EOT;
    }
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDoアプリ</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/task_show.css">
</head>
<body>
  <section class="main">
    <div class="todo_list">
      <h2><span><?php echo $task->name ?></span>の詳細画面</h2>
      <div class="all_list">
        <a class="all_list_btn" href="index.php">一覧画面</a>
      </div>

      <div class="task_calendar">

        <?php // 作業前?>
        <h3>a</h3>
        <div class="Before_work calendarBox">
          <?php echo creaate_caledar_box(); ?>
        </div>

        <h3>a</h3>  
        <?php // 作業中?>
        <div class="Work_now calendarBox">

        </div>

        <h3>a</h3>
        <?php // 作業済?>
        <div class="Work_done calendarBox">

        </div>

        <h3>a</h3>
        <?php // 完了?>
        <div class="completion calendarBox">

        </div>

      </div>

    </div>
  </section>
  <script src="js/main.js"></script>
</body>
</html>