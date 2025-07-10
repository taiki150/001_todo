'use strict';
{
  const editBox_1 = document.getElementById('edit_box_1');
  const editBox_2 = document.getElementById('edit_box_2');
  const timeBtns = document.querySelectorAll('.time_btn');
  const square_btn = document.querySelectorAll('.square_btn');
  const todoList = document.querySelector('.todo_list');
  const editBtn = document.getElementById('main_edit_btn');

  const msg = document.getElementById('msg_box');
  // 登録後メッセージを5秒後に非表示
  if (msg) {
    setTimeout( function() {
      msg.classList.add('fadeout');
      // msg.style.display = "none";
      history.replaceState(null, null, location.pathname);
    }, 5000); 
  }

  timeBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      editBox_1.classList.add('active_box');
      todoList.classList.add('dimmed');
    });
  });
  editBtn.addEventListener('click', function(){
    editBox_2.classList.add('active_box');
    todoList.classList.add('dimmed');
  });
  square_btn.forEach(function(btn) {
    btn.addEventListener('click', function() {
      editBox_1.classList.remove('active_box');
      editBox_2.classList.remove('active_box');
      todoList.classList.remove('dimmed');
      console.log('111');
      
    });
  });

const main_start_time = document.getElementById('main_start_time');
const main_end_time = document.getElementById('main_end_time');
const sub_start_time = document.getElementById('sub_start_time');
const sub_end_time = document.getElementById('sub_end_time');
const createBtn_1 = document.querySelector('.createBtn_1');
const createBtn_2 = document.querySelector('.createBtn_2');

function validateTime(startInput, endInput, button) {
  const start = Number(startInput.value);
  const end = Number(endInput.value);

  if (start >= end) {
    button.classList.add('no_active_btn');
  } else {
    button.classList.remove('no_active_btn');
  }
}

if (main_start_time && main_end_time && createBtn_2) {
  main_start_time.addEventListener('change', () => validateTime(main_start_time, main_end_time, createBtn_2));
  main_end_time.addEventListener('change', () => validateTime(main_start_time, main_end_time, createBtn_2));
}

if (sub_start_time && sub_end_time && createBtn_1) {
  sub_start_time.addEventListener('change', () => validateTime(sub_start_time, sub_end_time, createBtn_1));
  sub_end_time.addEventListener('change', () => validateTime(sub_start_time, sub_end_time, createBtn_1));
}

  





}