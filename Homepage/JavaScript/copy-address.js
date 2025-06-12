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
