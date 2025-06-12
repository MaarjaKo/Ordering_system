// main.js

//Otsinguikooni funktsioon
document.addEventListener("DOMContentLoaded", () => {
  const searchIcon = document.getElementById("search-icon");
  const searchBox = document.getElementById("search-box");

  if (searchIcon && searchBox) {
    searchIcon.addEventListener("click", (e) => {
      e.stopPropagation();
      searchBox.style.display = (searchBox.style.display === "block") ? "none" : "block";
    });

    document.addEventListener("click", () => {
      searchBox.style.display = "none";
    });

    searchBox.addEventListener("click", (e) => {
      e.stopPropagation(); // et klikil vormi sees ei sulgeks
    });
  }
});


//mine tagasi ules rullik
document.addEventListener("DOMContentLoaded", () => {
  const scrollTopBtn = document.querySelector(".scroll-top");
  if (scrollTopBtn) {
    scrollTopBtn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }
});

//aadressiriba kordamine
document.addEventListener("DOMContentLoaded", () => {
  const checkbox = document.getElementById("copyAddress");
  const arve = document.querySelector('input[name="aadress_et"]');
  const tarne = document.getElementById("aadress_tarne");

  checkbox.addEventListener("change", () => {
    if (checkbox.checked) {
      tarne.value = arve.value;
      tarne.readOnly = true;
    } else {
      tarne.value = "";
      tarne.readOnly = false;
    }
  });
});

//ostukorvi dropdown
const cartIcon = document.getElementById("cart-icon");
const cartDropdown = document.getElementById("cart-dropdown");

if (cartIcon && cartDropdown) {
  cartIcon.addEventListener("click", (e) => {
    e.stopPropagation();
    cartDropdown.style.display = (cartDropdown.style.display === "block") ? "none" : "block";
  });

  document.addEventListener("click", () => {
    cartDropdown.style.display = "none";
  });

  cartDropdown.addEventListener("click", (e) => {
    e.stopPropagation();
  });
}


