document.addEventListener("DOMContentLoaded", function(){

let slides = document.querySelectorAll(".slide");

let index = 0;

function showSlide(){

slides.forEach(slide => slide.style.display="none");

slides[index].style.display="block";

index++;

if(index >= slides.length){
index = 0;
}

}

showSlide();

setInterval(showSlide,3000);

});