
function myFunction(e){

	window.open("https://www.google.com/maps/dir/Sidon/Beirut/@33.7277697,35.2984342,11z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x151ef03ff51e8597:0x181e41e3b9ff1086!2m2!1d35.372948!2d33.5570691!1m5!1m1!1s0x151f17215880a78f:0x729182bae99836b4!2m2!1d35.5017767!2d33.8937913");
}


var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  slides[slideIndex-1].style.textAlign = "center";  
  slides[slideIndex-1].style.padding = "30px";   
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

