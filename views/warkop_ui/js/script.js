// toggle class active utntuk hamburger menu
const navbarNav = document.querySelector(".navbar-nav");
// ketika hamburger menu di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// toggle class active untuk search form
const searchForm = document.querySelector(".search-form");
const searchbox = document.querySelector("#search-box");

document.querySelector("#search-button").onclick = (e) => {
  searchForm.classList.toggle("active");
  searchbox.focus();
  e.preventDefault();
};

// toggle class active untuk shopping cart//
const shoppingcart = document.querySelector(".shopping-cart");
document.querySelector("#shopping-cart-button").onclick = (e) => {
  shoppingcart.classList.toggle("active");
  e.preventDefault();
};

//klik diluar sidebar untuk menghilangkan sidebar
const hm = document.querySelector("#hamburger-menu");
const sb = document.querySelector("#search-button");
const sc = document.querySelector("#shopping-cart-button");

document.addEventListener("click", function (e) {
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove("active");
  }

  if (!sc.contains(e.target) && !shoppingcart.contains(e.target)) {
    shoppingcart.classList.remove("active");
  }
});

// detail eye click event
const itemdetailmodal = document.querySelector("#item-detail-modal");
const itemdetailbuttons = document.querySelectorAll(".item-detail-button");
const productStars = itemdetailmodal.querySelector(".product-stars");

itemdetailbuttons.forEach((btn) => {
  btn.onclick = (e) => {
    e.preventDefault();
    const starCount = parseInt(btn.getAttribute("data-star"));

    // Hapus bintang yang ada dan tambahkan bintang sesuai jumlah 'starCount'
    productStars.innerHTML = ""; // Kosongkan elemen

    for (let i = 1; i <= 5; i++) {
      const starIcon = document.createElement("i");
      starIcon.setAttribute("data-feather", "star");

      if (i <= starCount) {
        starIcon.classList.add("star-full"); // Tambahkan kelas star-full pada bintang terisi
      }

      productStars.appendChild(starIcon); // Tambahkan elemen bintang ke dalam productStars
    }

    feather.replace(); // Refresh Feather Icons agar ikon bintang tampil

    itemdetailmodal.style.display = "flex"; // Tampilkan modal
  };
});

//logika cart
// function decreaseQuantity(id) {
//   const quantityElement = document.getElementById(`quantity-${id}`);
//   let quantity = parseInt(quantityElement.textContent);
//   if (quantity > 1) {
//     quantityElement.textContent = quantity - 1;
//     updateTotalPrice();
//   }
// }

// function increaseQuantity(id) {
//   const quantityElement = document.getElementById(`quantity-${id}`);
//   let quantity = parseInt(quantityElement.textContent);
//   quantityElement.textContent = quantity + 1;
//   updateTotalPrice();
// }

// function updateQuantity(id, delta) {
//   const quantitySpan = document.getElementById(`quantity-${id}`);
//   let quantity = parseInt(quantitySpan.textContent) + delta;
//   if (quantity < 1) return; // Cegah jumlah negatif atau nol

//   fetch(`/project_akhir/response_input.php`, {
//     method: "POST",
//     headers: {
//       "Content-Type": "application/json",
//     },
//     body: JSON.stringify({
//       id,
//       quantity,
//     }),
//   })
//     .then((response) => response.json())
//     .then((data) => {
//       if (data.success) {
//         quantitySpan.textContent = quantity;
//         document.getElementById(`price-${id}`).textContent = data.newPrice;
//         document.getElementById(`totalPrice`).textContent = data.totalPrice;
//       }
//     });
// }

// function removeItem(id) {
//   fetch(`/project_akhir/response_input.php`, {
//     method: "POST",
//     headers: {
//       "Content-Type": "application/json",
//     },
//     body: JSON.stringify({
//       id,
//     }),
//   })
//     .then((response) => response.json())
//     .then((data) => {
//       if (data.success) {
//         document.getElementById(`cart-item-${id}`).remove();
//         document.getElementById(`totalPrice`).textContent = data.totalPrice;
//       }
//     });
// }

// function checkout() {
//   fetch(`/project_akhir/response_input.php`, {
//     method: "POST",
//     headers: {
//       "Content-Type": "application/json",
//     },
//   })
//     .then((response) => response.json())
//     .then((data) => {
//       if (data.success) {
//         alert("Checkout berhasil!");
//         document.getElementById("shopping-cart").innerHTML =
//           "<p>Your cart is empty.</p>";
//       }
//     });
// }

//logika contact form
// function submitToWhatsApp(event) {
//   event.preventDefault();

//   // Mengambil nilai dari input
//   const name = document.getElementById("name").value;
//   const email = document.getElementById("email").value;
//   const phone = document.getElementById("phone").value;

//   // ID nomor WhatsApp tujuan
//   const phoneNumber = "6289507370805"; // Ganti dengan nomor WhatsApp tujuan

//   // Format pesan yang akan dikirim
//   const message = `Halo, saya ${name}.%0AEmail: ${email}%0ANo HP: ${phone}%0ASaya ingin menghubungi Anda.`;

//   // Mengarahkan ke WhatsApp
//   const whatsappURL = `https://wa.me/${phoneNumber}?text=${message}`;
//   window.open(whatsappURL, "_blank");
// }