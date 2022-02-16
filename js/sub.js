'use strict';

/* クリックしたら非表示のコンテンツが表示される関数 */
window.addEventListener('load', ()=>{
  const h2 = document.querySelectorAll('h2');

  h2.forEach(h2 => {
    h2.addEventListener('click', () => {
      h2.classList.toggle('appear');
    });
  });
});