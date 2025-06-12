document.addEventListener("DOMContentLoaded", () => {
  fetch("../JavaScript/products.json")
    .then(res => res.json())
    .then(products => {
      const table = document.getElementById("product-body");
      products.forEach(p => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td><img src="${p.image}" alt="${p.name}" style="width:40px; height:auto;"></td>
          <td>${p.id}</td>
          <td>${p.name}</td>
          <td>${p.volume}</td>
          <td>${p.priceEx.toFixed(2)} €</td>
          <td>${p.priceInc.toFixed(2)} €</td>
          <td>
            <button class="minus">-</button>
            <input type="number" value="0" min="0" readonly style="width:40px; text-align:center;">
            <button class="plus">+</button>
            <button class="add">LISA KORVI</button>
          </td>
        `;
        table.appendChild(row);
      });
    });
});