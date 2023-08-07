const slides = document.querySelectorAll('.slide');
let currentSlide = 0;

function showSlide() {
    slides.forEach(slide => slide.style.display = 'none');
    slides[currentSlide].style.display = 'block';
    currentSlide = (currentSlide + 1) % slides.length;
}

showSlide();

setInterval(showSlide, 5000);
