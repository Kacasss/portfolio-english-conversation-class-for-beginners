'use strict';
{
  const textMove = document.getElementById('text-move');
  let textList = [];

  /* 1文字ずつ文字を<span>タグで囲む関数
  *  (例)<span>た</span>
  */
  function textMaker() {
    let moji = "たのしい英会話へようこそ！";
    textList = [...moji];
    
    textList.forEach(textStr => {
      const span = document.createElement('span');
      span.textContent = textStr;
      span.classList.add('disabled');
      textMove.appendChild(span);
    });
  }
  textMaker();

  const texts = document.querySelectorAll('span');
  let startTime;
  let timeoutId;
  let count = 0;

  /* 300ミリ秒ずつ文字が見えるようにする関数
  *  css:opacity:0 → 1
  */
  function check () {
    const date = new Date();
    const elapsedTime = date - startTime;
    texts[count].classList.remove('disabled');
    count++;

    timeoutId = setTimeout(check, 300);
    if (count >= texts.length) {
      clearTimeout(timeoutId);
    }
  }

  window.addEventListener('load', () => {
    startTime = new Date();
    check();
  });
}