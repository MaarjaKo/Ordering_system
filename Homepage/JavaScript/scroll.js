document.addEventListener("DOMContentLoaded", () => {
  const scrollTopBtn = document.querySelector(".scroll-top");
  if (scrollTopBtn) {
    scrollTopBtn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }
});