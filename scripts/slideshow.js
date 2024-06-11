let slideIndex = 0;
showSlides();

function showSlides() {
  const slides = document.querySelectorAll(".slides img");

  // Hide all slides
  slides.forEach((slide) => {
    slide.style.display = "none";
  });

  // Increment slideIndex and reset to 0 if it exceeds the number of slides
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }

  // Display the current slide
  slides[slideIndex - 1].style.display = "block";

  // Call the function again after 2 seconds (2000 milliseconds)
  setTimeout(showSlides, 2000);
}
