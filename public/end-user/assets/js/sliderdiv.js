// let slideIndex = 0;
// showSlides();

// // Next-previous control
// function nextSlide() {
//   slideIndex++;
//   showSlides();
//   timer = _timer; // reset timer
// }

// function prevSlide() {
//   slideIndex--;
//   showSlides();
//   timer = _timer;
// }

// // Thumbnail image controlls
// function currentSlide(n) {
//   slideIndex = n - 1;
//   showSlides();
//   timer = _timer;
// }

// function showSlides() {
//   let slides = document.querySelectorAll(".mySlides");
//   let dots = document.querySelectorAll(".dots");

//   if (slideIndex > slides.length - 1) slideIndex = 0;
//   if (slideIndex < 0) slideIndex = slides.length - 1;

//   // hide all slides
//   slides.forEach((slide) => {
//     slide.style.display = "none";
//   });

//   // show one slide base on index number
//   slides[slideIndex].style.display = "block";

//   dots.forEach((dot) => {
//     dot.classList.remove("active");
//   });

//   dots[slideIndex].classList.add("active");
// }

// // autoplay slides --------
// let timer = 7; // sec
// const _timer = timer;

// // this function runs every 1 second
// setInterval(() => {
//   timer--;

//   if (timer < 1) {
//     nextSlide();
//     timer = _timer; // reset timer
//   }
// }, 1000); // 1sec

var index = 0;
var slides = document.querySelectorAll(".slides");
var dot = document.querySelectorAll(".dot");

function changeSlide(){

  if(index<0){
    index = slides.length-1;
  }

  if(index>slides.length-1){
    index = 0;
  }

  for(let i=0;i<slides.length;i++){
    slides[i].style.display = "none";
    // dot[i].classList.remove("active");
  }

  slides[index].style.display= "block";
//   dot[index].classList.add("active");

  index++;

  setTimeout(changeSlide,6000);

}

changeSlide();
