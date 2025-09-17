let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}







let lightboxIndex = 1;

// Add click handlers to all .mySlides images
document.querySelectorAll('.mySlides img').forEach((img, index) => {
  img.addEventListener('click', () => {
    openLightbox(index + 1);
  });
});

function openLightbox(index) {
  lightboxIndex = index;
  const modal = document.getElementById("lightboxModal");
  const img = document.getElementById("lightboxImage");
  const caption = document.getElementById("lightboxCaption");
  const numberText = document.getElementById("lightboxNumberText");
  const slides = document.getElementsByClassName("mySlides");
  const alt = document.getElementsByClassName("demo")[index - 1].alt;

  img.src = slides[index - 1].querySelector("img").src;
  caption.textContent = alt;
  numberText.textContent = `${index} / ${slides.length}`;
  modal.style.display = "flex";

}

function closeLightbox() {
  document.getElementById("lightboxModal").style.display = "none";
}

function navigateLightbox(direction) {
  lightboxIndex += direction;
  let total = document.getElementsByClassName("mySlides").length;
  if (lightboxIndex > total) lightboxIndex = 1;
  if (lightboxIndex < 1) lightboxIndex = total;
  openLightbox(lightboxIndex);
}