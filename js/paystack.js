const paymentForm = document.getElementById("paymentForm");
paymentForm.addEventListener("submit", payWithPaystack, false);
const payBtn = document.querySelector(".btn-paystack");

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: "pk_test_539749473e13678c224cabe3c424182bd7308ee4", // Replace with your public key
    email: document.getElementById("email").value,
    amount: document.getElementById("amount").value * 100,
    firstname: document.getElementById("first-name").value,
    lastname: document.getElementById("last-name").value,
    ref: "PE" + Math.floor(Math.random() * 1000000000 + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function () {
      window.location = "http://localhost/food%20delivery/index.php";
      alert("transaction cancelled.");
    },
    callback: function (response) {
      let message = `Payment complete! Reference: ${response.reference}`;
      console.log(message);
      alert(message);
      window.location = `http://localhost/food%20delivery/users/orders.php?reference=${response.reference}`;
    },
  });

  handler.openIframe();
}
payBtn.addEventListener("click", payWithPaystack);
