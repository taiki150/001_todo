<?php
  require_once __DIR__ . '/../vendor/autoload.php';
  require_once __DIR__ . '/../database.php';
  db_conn();

    use Illuminate\Database\Capsule\Manager as Capsule;
    use Illuminate\Database\Capsule\Manager as DB; 
    use App\Models\Category;
    use App\Models\Task;

    // 登録内容の種類検出
    $action = $_POST['action_type'] ?? null;

    // 上記$actionによる使用関数の識別
    if($action === 'category_create'){
      category_create();
    }elseif($action === 'category_update'){
      category_update();
    }elseif($action === 'category_delete') {
      category_delete();
    }elseif($action === 'task_create'){
      task_create();
    }elseif($action === 'sub_task_edit'){
      sub_task_edit();
    }elseif($action === 'main_task_edit'){
      main_task_edit();
    }elseif($action === 'task_delete'){
      task_delete();
    }

    // カテゴリー登録の処理
    function category_create() {
      $name = $_POST['category_name'] ?? null;
      if(empty($name)){
        header("Location: ../index.php");
        exit;
      }
      try {
        DB::beginTransaction();

        $category = new Category();
        $category->category_name = $name;
        $category->save();

        DB::commit();

      } catch (\Exception $e) {
        header("Location: ../index.php");
        exit;
      }
      header("Location: ../index.php");
      exit;
    }

    // カテゴリーの編集
    function category_update(){
      $name = $_POST['category_name'] ?? null;
      $id = $_POST['category_id'] ?? null;
      if(empty($name) || empty($id)){
        header("Location: ../category_regist.php?success=1");
        exit;
      }
      try {
        $category = Category::find($id);

        DB::beginTransaction();

        if(empty($category)){
          header("Location: ../category_regist.php?success=1");
          exit;
        }

        $category->category_name = $name;
        $category->save();

        DB::commit();

      } catch (\Exception $e) {
        echo "登録中にエラーが発生しました: " . htmlspecialchars($e->getMessage());
      }
      
      header("Location: ../category_regist.php?success=2");
      exit;
    }

    // カテゴリー削除
    function category_delete() {
      $id = $_POST['category_id'] ?? null;
      if( empty($id) ){
        header("Location: ../category_regist.php");
        exit;
      }
      try {
        DB::beginTransaction();

        $category = Category::find($id);
        $category->delete();

        DB::commit();
      } catch (\Exception $e) {
        header("Location: ../category_regist.php");
        exit;
      }

      header("Location: ../index.php");
      exit;
    }

    // タスクの登録
    function task_create() {
      $name = $_POST['name'];
      $id = $_POST['category_id'];
      $start_time = $_POST['start_time'];
      $end_time = $_POST['end_time'];
      $description = $_POST['description'];

      if(empty($name) || empty($id) || empty($start_time) || empty($end_time) ){
        header("Location: ../create_task.php?success=1");
        exit;
      }

      try {
        DB::beginTransaction();

        $task = new Task();

        $task = new Task();
        $task->name = $name;
        $task->category_id = $id;
        $task->start_time = $start_time;
        $task->end_time = $end_time;
        $task->description = $description;
        $task->status_id = 1;

        $task->save();

        DB::commit();
        
      } catch (\Exception $e) {
        DB::rollBack();
        echo 'エラー内容: ' . htmlspecialchars($e->getMessage());
        exit;
        
        header("Location: ../create_task.php?success=1");
        exit;
      }

      header("Location: ../create_task.php?success=2");
      exit;
    }

    // タスク（メイン）の編集
    function main_task_edit() {
      $main_name = $_POST['main_name'];
      $main_status_id = $_POST['main_status_id'];
      $main_start_time = $_POST['main_start_time'];
      $main_end_time = $_POST['main_end_time'];
      $main_description = $_POST['main_description'];
      $task_id = $_POST['task_id'];
      
      $task = Task::find($task_id);

      if( empty($main_name) || !isset($main_start_time) || !isset($main_end_time) || empty($main_status_id) || empty($main_description) || empty($task_id) ){
        header("Location: ../task_show.php?id={$task_id}&success=1");
        exit;
      }
      try {
        $task->name = $main_name;
        $task->status_id = $main_status_id;
        $task->start_time = $main_start_time;
        $task->end_time = $main_end_time;
        $task->description = $main_description;
        
        $task->save();
        DB::commit();


      } catch (\Exception $e) {
        header("Location: ../task_show.php?id={$task_id}&success=1");
        exit;
      }
      header("Location: ../task_show.php?id={$task_id}");
      exit;
    }

    // タスク（サブ）の編集
    function sub_task_edit() {
      
      $sub_status_id = $_POST['sub_status_id'];
      $sub_start_time = $_POST['sub_start_time'];
      $sub_end_time = $_POST['sub_end_time'];
      $task_id = $_POST['task_id'];
      
      $task = Task::find($task_id);
      
      if( empty($sub_status_id) || !isset($sub_start_time) || !isset($sub_end_time) || empty($task_id) ){
        header("Location: ../task_show.php?id={$task_id}&success=1");
        exit;
      }
      try {
        DB::beginTransaction();

        $task->status_id = $sub_status_id;
        $task->start_time = $sub_start_time;
        $task->end_time = $sub_end_time;
        
        $task->save();
        DB::commit();
        
      } catch (\Exception $e) {
        header("Location: ../task_show.php?id={$task_id}&success=1");
        exit;
      }

      header("Location: ../task_show.php?id={$task_id}");
        exit;
    }

    // タスク削除
    function task_delete() {
      $id = $_POST['task_id'] ?? null;
      if( empty($id) ){
        header("Location: ../task_show.php?id={$id}");
        exit;
      }
      try {
        DB::beginTransaction();

        $task = Task::find($id);
        $task->delete();

        DB::commit();
      } catch (\Exception $e) {
        header("Location: ../task_show.php?id={$id}");
        exit;
      }

      header("Location: ../index.php");
      exit;
    }