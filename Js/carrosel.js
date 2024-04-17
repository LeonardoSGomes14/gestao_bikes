$(document).ready(function(){
    var slides = $('.slide');
    var currentSlide = 0;
  
    function nextSlide() {
      slides.removeClass('active');
      currentSlide = (currentSlide + 1) % slides.length;
      slides.eq(currentSlide).addClass('active');
    }
  
    setInterval(nextSlide, 3000); // Altera o slide a cada 3 segundos
  });
  