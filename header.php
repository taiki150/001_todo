<?php
  require_once __DIR__ . '/vendor/autoload.php';
  require_once __DIR__ . '/database.php';
  db_conn();

  use App\Models\Category;

  $categories = Category::all();
?>

<section class="header">
  <div class="header_box">
    <ul>
      <li><a href="index.php">ホーム</a></li>
      <?php if(count($categories) != 0 ){?>
      <li><a href="create_task.php">タスク追加</a></li>
      <li><a href="category_regist.php">カテゴリー変更</a></li>
      <?php } ?>
    </ul>
  </div>
</section>