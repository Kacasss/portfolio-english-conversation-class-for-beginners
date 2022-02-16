'use strict';

{
   // ホバー時の画像
    let imagesOn = [
      "images/hover_course_everyday_ conversation_image1.png",
      "images/hover_course_grammer_image2.png",
      "images/hover_course_toeic_image3.png",
      "images/hover_course_english_exam_image4.png"
    ];
    
    // ホバーしてない時の画像
    let imagesOff = [
      "images/course_everyday_ conversation_image1.png",
      "images/course_grammer_image2.png",
      "images/course_toeic_image3.png",
      "images/course_english_exam_image4.png"
    ];
  
    // ホバー時とホバーしてない時の画像の切り替え
    window.addEventListener('load', ()=>{
      for (let i = 0; i < imagesOn.length; i++) {
        const target = document.getElementsByClassName('mouseover');
    
        target[i].addEventListener('mouseover', () => {
        target[i].src = imagesOn[i];
          }, false);
    
        target[i].addEventListener('mouseleave', () => {
        target[i].src = imagesOff[i];
          }, false);
      }
    });
}