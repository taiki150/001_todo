'use strict';

{
  const prev = document.getElementById('prev');
  const page = document.querySelectorAll('#page div');
  const next = document.getElementById('next');

  page[0].style.backgroundColor = "#333";


  const listBoxs = document.querySelectorAll('.todo_list');

  let counter = 0;

  const itemWidth = listBoxs[0].offsetWidth + 20;

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

  next.addEventListener('click', function(){
    if(counter < listBoxs.length - 3){
      for(let i = 0; i < listBoxs.length; i++){
        listBoxs[i].style.transform = `translateX(-${(counter + 1) * itemWidth}px)`;
      }
      counter = counter + 1;

      for(let i = 0; i < counter; i++){
        page[i].style.backgroundColor = "#FFF"
      }
      page[counter].style.backgroundColor = "#333"
    }
    resetBtn();
    
  });

  prev.addEventListener('click', function(){
    if(counter > 0){
      counter = counter - 1;
      for(let i = 0; i < listBoxs.length; i++){
        listBoxs[i].style.transform = `translateX(calc(-${counter} * (100% + 20px)))`;
      }

      for(let i = 0; i < page.length; i++){
        page[i].style.backgroundColor = "#FFF"
      }
      page[counter].style.backgroundColor = "#333"
    }
    resetBtn();
  });


}

