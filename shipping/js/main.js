// Main JavaScript File

document.addEventListener("DOMContentLoaded", () => {
  // Initialize Back to Top Button
  initBackToTop()

  // Initialize Contact Form
  initContactForm()

  // Initialize Navbar Scroll Effect
  initNavbarScroll()
})

// Back to Top Button
function initBackToTop() {
  const backToTopButton = document.querySelector(".back-to-top")

  if (backToTopButton) {
    window.addEventListener("scroll", () => {
      if (window.pageYOffset > 300) {
        backToTopButton.classList.add("active")
      } else {
        backToTopButton.classList.remove("active")
      }
    })

    backToTopButton.addEventListener("click", (e) => {
      e.preventDefault()
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      })
    })
  }
}

// Contact Form
function initContactForm() {
  const contactForm = document.getElementById("contactForm")

  if (contactForm) {
    contactForm.addEventListener("submit", (e) => {
      e.preventDefault()

      // Get form values
      const name = document.getElementById("name").value
      const email = document.getElementById("email").value
      const phone = document.getElementById("phone").value
      const subject = document.getElementById("subject").value
      const message = document.getElementById("message").value

      // Simple validation
      if (!name || !email || !message) {
        alert("Please fill in all required fields.")
        return
      }

      // Here you would normally send the form data to a server
      // For demo purposes, we'll just show a success message
      alert("Thank you for your message. We will get back to you soon!")
      contactForm.reset()
    })
  }
}

// Navbar Scroll Effect
function initNavbarScroll() {
  const navbar = document.querySelector(".navbar")

  if (navbar) {
    window.addEventListener("scroll", () => {
      if (window.pageYOffset > 50) {
        navbar.classList.add("navbar-scrolled")
      } else {
        navbar.classList.remove("navbar-scrolled")
      }
    })
  }
}

// Mobile Menu Toggle
document.addEventListener("DOMContentLoaded", () => {
  const navbarToggler = document.querySelector(".navbar-toggler")
  const navbarCollapse = document.querySelector(".navbar-collapse")

  if (navbarToggler && navbarCollapse) {
    navbarToggler.addEventListener("click", () => {
      navbarCollapse.classList.toggle("show")
    })

    // Close mobile menu when clicking outside
    document.addEventListener("click", (e) => {
      if (
        !navbarToggler.contains(e.target) &&
        !navbarCollapse.contains(e.target) &&
        navbarCollapse.classList.contains("show")
      ) {
        navbarCollapse.classList.remove("show")
      }
    })
  }
})

// Newsletter Form
document.addEventListener("DOMContentLoaded", () => {
  const newsletterForm = document.querySelector(".newsletter-form")

  if (newsletterForm) {
    newsletterForm.addEventListener("submit", (e) => {
      e.preventDefault()

      const emailInput = newsletterForm.querySelector('input[type="email"]')

      if (!emailInput.value) {
        alert("Please enter your email address.")
        return
      }

      // Here you would normally send the email to a server
      // For demo purposes, we'll just show a success message
      alert("Thank you for subscribing to our newsletter!")
      newsletterForm.reset()
    })
  }
})
