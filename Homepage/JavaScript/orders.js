document.addEventListener("DOMContentLoaded", () => {
  const submitBtn = document.getElementById("submit-order");

  submitBtn.addEventListener("click", () => {
    // Simuleerime ostukorvi
    const cartItems = [
      { product_id: 1, quantity: 2, price: 5.99 },
      { product_id: 3, quantity: 1, price: 9.99 }
    ];

    fetch("../PHP/process/submit_order.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ items: cartItems })
    })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          alert("Tellimus edukalt esitatud!");
        } else {
          alert("Viga: " + data.message);
        }
      })
      .catch(err => {
        console.error("Võrguviga:", err);
      });
  });
});
