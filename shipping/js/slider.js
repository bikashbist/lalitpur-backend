// Hero Slider
document.addEventListener("DOMContentLoaded", () => {
  initHeroSlider()
  initTestimonialSlider()
})

// Hero Slider
function initHeroSlider() {
  const heroSlides = document.querySelectorAll(".hero-slide")
  const dots = document.querySelectorAll(".slider-dots .dot")
  const prevButton = document.querySelector(".prev-slide")
  const nextButton = document.querySelector(".next-slide")

  if (heroSlides.length === 0) return

  let currentSlide = 0
  let slideInterval

  // Start automatic slideshow
  startSlideshow()

  // Previous slide button
  if (prevButton) {
    prevButton.addEventListener("click", () => {
      clearInterval(slideInterval)
      currentSlide = currentSlide === 0 ? heroSlides.length - 1 : currentSlide - 1
      updateSlide()
      startSlideshow()
    })
  }

  // Next slide button
  if (nextButton) {
    nextButton.addEventListener("click", () => {
      clearInterval(slideInterval)
      currentSlide = currentSlide === heroSlides.length - 1 ? 0 : currentSlide + 1
      updateSlide()
      startSlideshow()
    })
  }

  // Dot navigation
  if (dots.length > 0) {
    dots.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        clearInterval(slideInterval)
        currentSlide = index
        updateSlide()
        startSlideshow()
      })
    })
  }

  // Update slide display
  function updateSlide() {
    // Hide all slides
    heroSlides.forEach((slide) => {
      slide.classList.remove("active")
    })

    // Show current slide
    heroSlides[currentSlide].classList.add("active")

    // Update dots
    if (dots.length > 0) {
      dots.forEach((dot) => {
        dot.classList.remove("active")
      })
      dots[currentSlide].classList.add("active")
    }
  }

  // Start automatic slideshow
  function startSlideshow() {
    slideInterval = setInterval(() => {
      currentSlide = currentSlide === heroSlides.length - 1 ? 0 : currentSlide + 1
      updateSlide()
    }, 5000)
  }
}

// Testimonial Slider
function initTestimonialSlider() {
  const testimonialSlides = document.querySelectorAll(".testimonial-slide")
  const dots = document.querySelectorAll(".testimonial-dots .dot")
  const prevButton = document.querySelector(".prev-testimonial")
  const nextButton = document.querySelector(".next-testimonial")

  if (testimonialSlides.length === 0) return

  let currentSlide = 0
  let slideInterval

  // Start automatic slideshow
  startSlideshow()

  // Previous slide button
  if (prevButton) {
    prevButton.addEventListener("click", () => {
      clearInterval(slideInterval)
      currentSlide = currentSlide === 0 ? testimonialSlides.length - 1 : currentSlide - 1
      updateSlide()
      startSlideshow()
    })
  }

  // Next slide button
  if (nextButton) {
    nextButton.addEventListener("click", () => {
      clearInterval(slideInterval)
      currentSlide = currentSlide === testimonialSlides.length - 1 ? 0 : currentSlide + 1
      updateSlide()
      startSlideshow()
    })
  }

  // Dot navigation
  if (dots.length > 0) {
    dots.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        clearInterval(slideInterval)
        currentSlide = index
        updateSlide()
        startSlideshow()
      })
    })
  }

  // Update slide display
  function updateSlide() {
    // Hide all slides
    testimonialSlides.forEach((slide) => {
      slide.classList.remove("active")
    })

    // Show current slide
    testimonialSlides[currentSlide].classList.add("active")

    // Update dots
    if (dots.length > 0) {
      dots.forEach((dot) => {
        dot.classList.remove("active")
      })
      dots[currentSlide].classList.add("active")
    }
  }

  // Start automatic slideshow
  function startSlideshow() {
    slideInterval = setInterval(() => {
      currentSlide = currentSlide === testimonialSlides.length - 1 ? 0 : currentSlide + 1
      updateSlide()
    }, 6000)
  }
}
