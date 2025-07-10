'use strict';

{
  const afterInput = document.getElementById('afterInput');
  const addBtn = document.getElementById('addBtn');
  const deleteBtn = document.getElementById('deleteBtn');
  const beforeInput = document.getElementById('beforeInput');


  const category_name = document.getElementById('category_name');
  const start_time = document.getElementById('start_time');
  const end_time = document.getElementById('end_time');
  const name = document.getElementById('name');

  if(category_name || start_time || end_time || name){
  category_name.addEventListener('change', function() {
    createTaskValidation();
  });
  start_time.addEventListener('input', function() {
    createTaskValidation();
  });
  end_time.addEventListener('input', function() {
    createTaskValidation();
  });
  name.addEventListener('input', function() {
    createTaskValidation();
  });
  }
  const msg = document.getElementById('msg_box');
  // 登録後メッセージを5秒後に非表示
  if (msg) {
    setTimeout( function() {
      msg.classList.add('fadeout');
      // msg.style.display = "none";
      history.replaceState(null, null, location.pathname);
    }, 5000); 
  }


    // input2の入力後の発動イベント
  afterInput.addEventListener('input', function() {
    if(afterInput.value !== ''){
      addBtn.classList.add('activeBtn');
    }else{
      addBtn.classList.remove('activeBtn');
    }
  });

  beforeInput.addEventListener('change', function() {
    if(beforeInput.selectedIndex !== 0){
      deleteBtn.classList.add('activeBtn');
    }else{
      deleteBtn.classList.remove('activeBtn');
    }
  });


  if(category_name){
    const option = category_name.options[category_name.selectedIndex].text;
  }

  function createTaskValidation() {
  const category_name = document.getElementById('category_name');
  const option = category_name.options[category_name.selectedIndex].text;

  const start_time_value = document.getElementById('start_time').value;
  const end_time_value = document.getElementById('end_time').value;
  const name_value = document.getElementById('name').value;
  const create_btn = document.getElementById('create_btn');

  if(option !== '選択してください' && start_time_value !== "" && end_time_value !== "" && name_value !== "" && start_time.value < end_time.value){
    create_btn.classList.add('activeBtn');
  } else {
    create_btn.classList.remove('activeBtn');
  }
}


}