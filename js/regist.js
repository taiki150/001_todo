'use strict';

{
  const switchBtn = document.getElementById('switch');
  const afterInput = document.getElementById('afterInput');
  const beforeInput = document.getElementById('beforeInput');
  const afterLabel = document.getElementById('afterLabel');
  const beforeLabel = document.getElementById('beforeLabel');
  const addBtn = document.getElementById('addBtn');
  const options = beforeInput.options;
  
  switchBtn.addEventListener('change', function(){
    if(switchBtn.checked){
      beforeInput.classList.add('noActiveInput');
      afterInput.classList.remove('noActiveInput');
      beforeLabel.textContent = "";
      afterLabel.textContent = "カテゴリー登録";
    }else{
      beforeInput.classList.remove('noActiveInput');
      afterInput.classList.add('noActiveInput');
      beforeLabel.textContent = "①変更前";
      afterLabel.textContent = "②変更後";
    }
    options.velue = options[0];
  });

  beforeInput.addEventListener('change', function() {
    const selectedIndex = beforeInput.selectedIndex;
    if(selectedIndex !== 0){
      afterInput.classList.remove('noActiveInput');
    }else{
      afterInput.classList.add('noActiveInput');
    }
  });

  afterInput.addEventListener('input', function() {
    if(afterInput.value !== ''){
      addBtn.classList.add('activeBtn');
    }else{
      addBtn.classList.remove('activeBtn');
    }
  });
}