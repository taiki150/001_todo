<?php
  require_once __DIR__ . '/vendor/autoload.php';
  require_once __DIR__ . '/database.php';
  db_conn();

  use App\Models\Task;
  use App\Models\Status;

  // URLからid番号を取得
  $id = $_GET["id"] ?? null;

  // 前画面でクリックしたタスクのid番号のタスク情報を取得
  $task = Task::find($id);
  $statuses = Status::all();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDoアプリ</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/task_show.css">
</head>
<body>
  <div class="container">
    <?php require('header.php') ?>
    <section class="main">
      <div class="todo_list">
        <h2>タイトル：<span><?php echo $task->name ?></span></h2>
        <div class="all_list">
          <a class="all_list_btn" href="index.php">一覧画面</a>
        </div>
        <div class="show_box">
          <div class="time">
            <?php
              $task_bg_flg = "";
              for($i=0; $i <= 24; $i++){
                if($i===0){$time_num = 0;}
                elseif($i===4){$time_num = 4;}
                elseif($i===8){$time_num = 8;}
                elseif($i===12){$time_num = 12;}
                elseif($i===16){$time_num = 16;}
                elseif($i===20){$time_num = 20;}
                elseif($i===24){$time_num = 24;}
                else{$time_num="";}

                // start_timeが始まったら色付き背景 => end_timeが来るまでは継続
                if($i === $task->start_time){
                  $task_bg_flg = true;
                }
                // end_timeが終わったら通常の背景
                if($i === $task->end_time + 1){
                  $task_bg_flg = false;
                }
                if($i === $task->start_time || $task_bg_flg ){
                  echo "<div class='time_box time_box_{$i} time_box_bg_{$task->status_id}' style='border: 0.5px solid #777;'><a class='time_btn' href='#'>{$time_num}</a></div>";
                }else{
                  echo "<div class='time_box time_box_{$i}' style='border: 0.5px solid #ddd;'>{$time_num}</div>";
                }
              }
            ?>
          </div>
          <div class="period_box">
            <?php
              $hours = $task->end_time - $task->start_time;
            ?>
            <dl>
              <dd>期限</dd>
              <dt><?php echo $task->start_time?>時　〜　<?php echo $task->end_time?>時 (必要時間 : <?php echo $hours; ?>時間)</dt>
            </dl>
          </div>
          <div class="description_box">
            <div class="border"></div>
            <dl>
              <dd>詳細</dd>
              <dt><?php echo $task->description?></dt>
            </dl>
          </div>
          <div class="status_box">
            <div class="border"></div>
            <dl>
              <dd>状態</dd>
              <dt><p class="status_color_<?php echo $task->status_id?>"><?php echo $task->status->name; ?></p></dt>
            </dl>
            <div class="border"></div>
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
          <div class="edit_btn_box">
            <button class="createBtn" id="main_edit_btn">編集</button>
            <form action="actions/create.php" method="post">
              <input type="hidden" name="action_type" value="task_delete">
              <input type="hidden" name="task_id" value="<?php echo $task->id; ?>">
              <button class="deleteBtn" id="task_delete_btn">削除</button>
            </form>
            <script>
              document.getElementById('task_delete_btn').addEventListener('click', function(e){
                e.preventDefault();
                const confirmed = confirm('本当にこのカテゴリを削除してもよろしいですか？');
                if(confirmed){
                  const form = this.closest('form');
                  form.submit();
                }
              });
            </script>
          </div>
        </div>
      </div>
    </section>

    <section id="edit">
      <div class="edit_box_1" id="edit_box_1">
        <h3>編集<span class="square_btn"></span></h3>
        <div class="border"></div>
        <form action="actions/create.php" method="post">
          <input type="hidden" name="action_type" value="sub_task_edit">
          <input type="hidden" name="task_id" value="<?php echo $task->id; ?>">
          <div class="status_edit_box_1">
            <p>状態</p>
            <select name="sub_status_id" id="">
              <?php foreach($statuses as $status): ?>
                <option value="<?php echo $status->id; ?>" 
                  <?php if ($status->id == $task->status_id) echo 'selected'; ?>>
                  <?php echo $status->name; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="time_edit_box_1">
            <p>時間</p>
            <input id="sub_start_time" type="number"  min="0" max="24" name="sub_start_time" value="<?php echo $task->start_time; ?>">
            <span>時　〜　</span>
            <input id="sub_end_time" type="number" min="0" max="24" name="sub_end_time" value="<?php echo $task->end_time; ?>">
            <span>時</span>
          </div>
          <button class="createBtn createBtn_1" type="submit">登録</button>
        </form>
      </div>

      <div class="edit_box_2" id="edit_box_2">
        <h3>編集<span class="square_btn"></span></h3>
        <div class="border"></div>
        <form action="actions/create.php" method="post">
          <input type="hidden" name="action_type" value="main_task_edit">
          <input type="hidden" name="task_id" value="<?php echo $task->id; ?>">
          
          <div class="name_edit_box">
            <p>名前</p>
            <input type="text" name="main_name" value="<?php echo $task->name;?>">
          </div>

          <div class="status_edit_box_1">
            <p>状態</p>
            <select name="main_status_id" id="">
              <?php foreach($statuses as $status): ?>
                <option value="<?php echo $status->id; ?>" 
                  <?php if ($status->id == $task->status_id) echo 'selected'; ?>>
                  <?php echo $status->name; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="time_edit_box_1">
            <p>時間</p>
            <input id="main_start_time" type="number" min="0" max="24" name="main_start_time" value="<?php echo $task->start_time; ?>">
            <span>時　〜　</span>
            <input id="main_end_time"  min="0" max="24" type="number" name="main_end_time" value="<?php echo $task->end_time; ?>">
            <span>時</span>
          </div>

          <div class="description_edit_box">
            <p>詳細</p>
            <textarea name="main_description"><?php echo $task->description; ?></textarea>
          </div>

          <button class="createBtn createBtn_2" type="submit">登録</button>
        </form>
      </div>
    </section>
  </div>
  <script src="js/create.js"></script>
</body>
</html>