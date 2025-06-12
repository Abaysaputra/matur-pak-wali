// Loader Script
window.addEventListener('load', function () {
  const loader = document.querySelector('.loader-overlay')
  setTimeout(() => {
    loader.classList.add('hidden') // Smooth fade-out loader
    document.body.classList.remove('loading') // Enable scrolling after loading
  }, 1000) // Loader duration set to 2 seconds
})
