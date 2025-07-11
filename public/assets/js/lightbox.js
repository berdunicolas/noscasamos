// Open the Modal
function openModal() {
  document.getElementById("myModal").style.display = "flex";
  document.body.style.overflow = 'hidden';
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
  document.body.style.overflow = 'auto';
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1;}
  if (n < 1) {slideIndex = slides.length;}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "flex";
}