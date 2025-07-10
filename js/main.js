'use strict';

{
  const prev = document.getElementById('prev');
  const page = document.querySelectorAll('#page div');
  const next = document.getElementById('next');
  const taskAddBtn = document.querySelector('.task_add_btn');
  const plusBtn = document.getElementById('plus_btn');
  const todoList = document.querySelectorAll('.todo_list');
  const createCategory = document.querySelector('.create_category');
  const squareBtn = document.querySelector('.square_btn');
  
    plusBtn.addEventListener('click', function() {
    todoList.forEach(function(btn){
      btn.classList.add('dimmed');
    });
    createCategory.classList.add('active_box');
  });

  squareBtn.addEventListener('click', function() {
    todoList.forEach(function(btn){
      btn.classList.remove('dimmed');
    });
    createCategory.classList.remove('active_box');
  });

  page[0].style.backgroundColor = "#333";


  const listBoxs = document.querySelectorAll('.todo_list');

  let counter = 0;

  const itemWidth = listBoxs[0].offsetWidth + 20;

  // next prevボタンの背景色の処理
  function resetBtn(){
    if(counter !== 0){
      prev.style.backgroundColor = "#EEE";
    }else if(counter == 0){
      prev.style.backgroundColor = "gray";
    };
    
    if(counter === listBoxs.length - 3){
      next.style.backgroundColor = "gray";
    }else{
      next.style.backgroundColor = "#EEE";
    };
  }

  // ここより下はカルーセル処理
  // nextボタンを押した時の処理
  next.addEventListener('click', function(){
    if(counter < listBoxs.length - 3){
      for(let i = 0; i < listBoxs.length; i++){
        listBoxs[i].style.transform = `translateX(-${(counter + 1) * itemWidth}px)`;
        taskAddBtn.style.transform = `translateX(-${(counter + 1) * itemWidth}px)`;
      }
      counter = counter + 1;

      for(let i = 0; i < counter; i++){
        page[i].style.backgroundColor = "#FFF"
      }
      page[counter].style.backgroundColor = "#333"
      
    }
    resetBtn();
    
  });

  // prevボタンを押した時の処理
  prev.addEventListener('click', function(){
    if(counter > 0){
      counter = counter - 1;
      for(let i = 0; i < listBoxs.length; i++){
        listBoxs[i].style.transform = `translateX(calc(-${counter} * (100% + 20px)))`;
        taskAddBtn.style.transform = `translateX(calc(-${counter} * (100% + 20px)))`;
      }

      for(let i = 0; i < page.length; i++){
        page[i].style.backgroundColor = "#FFF"
      }
      page[counter].style.backgroundColor = "#333"


    }
    resetBtn();
  });

}

