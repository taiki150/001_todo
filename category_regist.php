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
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/regist.css">
  <title>登録画面</title>
</head>
<body>
  <div class="conteiner">
    <?php require('header.php') ?>
    <section class="main">
      <div class="regist_main">
        <h2>カテゴリー名の変更</h2>
        <div class="list">
          <a href="index.php">一覧へ戻る</a>
        </div>
        <form action="actions/create.php" method="post">

          <div class="regist_form">
            <label id="beforeLabel">①カテゴリーの選択</label>
            <select name="category_id" id="beforeInput">
              <option value="">選択してください</option>
              <?php
                foreach($categories as $category){ ?>
                  <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="regist_form">
            <label id="afterLabel">②変更後の名前</label>
            <input id="afterInput" type="text" name="category_name">
            <input id="actionType" type="hidden" name="action_type" value="category_update">
          </div>

          <button class="" id="addBtn" type="submit">登録</button>
          <br>
          <button class="" id="deleteBtn" type="submit">削除する</button>
          <script>
            document.getElementById('deleteBtn').addEventListener('click', function(e){
              e.preventDefault(); // ← クリックによる通常の送信を防止
              const confirmed = confirm('本当にこのカテゴリを削除してもよろしいですか？');
              if(confirmed){
                const form = this.closest('form'); // 一番近い form を取得
                document.getElementById('actionType').value = 'category_delete';
                form.submit(); // 修正：ここで正しく submit 実行
              }
            });
          </script>

        </form>

        <?php /* if (isset($_GET['success']) && in_array($_GET['success'] == [1,2])){ ?>
        <div id="msg_box">
          <?php //登録が完了したら文言出現 ?>
          <?php if ($_GET['success'] == 1){ ?>
            <p id="success_message">カテゴリー登録に失敗しました。<br><span>※このメッセージは5秒後に自動消去されます</span></p>
          <?php }elseif($_GET['success'] == 2){ ?>
            <p id="success_message">カテゴリーが登録されました！<br><span>※このメッセージは5秒後に自動消去されます</span></p>
          <?php }elseif($_GET['success'] == 3){ ?>
            <p id="success_message">カテゴリを削除しました。<br><span>※このメッセージは5秒後に自動消去されます</span></p>
          <?php } ?>
        </div>
        <?php } */?>
      </div>
      

    </section>
  </div>
  <script src="js/regist.js"></script>
</body>
</html>