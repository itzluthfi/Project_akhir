<?php 
require_once "/laragon/www/project_akhir/init.php";
$allMenu = $modelItem->getAllItem();

$carts = $modelCart->getCartsByMemberId(1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>warkop MJ</title>

    <!-- fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;1,700&display=swap"
        rel="stylesheet">
    <!-- feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- tailwind -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <!-- my style -->
    <link rel="stylesheet" href="css/style.css" />

    <style>
    /* Shopping Cart Styling */
    .shopping-cart {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        background-color: #fff;
    }

    .shopping-cart h2 {
        font-size: 24px;
        margin-bottom: 10px;
        margin-left: 120px;
    }

    /* Cart Items */
    .cart-items {
        display: flex;
        flex-direction: column;
        gap: 5px;
        /* Mengurangi jarak antar item */
        max-height: 410px;
        max-width: 420px;
        /* Tentukan tinggi maksimum area keranjang */
        overflow-y: auto;
        overflow-x: auto;
        /* Menambahkan scroll vertikal jika diperlukan */
        padding-right: 10px;
        /* Memberikan jarak jika scrollbar muncul */
    }

    .shopping-cart .cart-item {
        margin: 4px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;

        /* Menyelaraskan item secara vertikal */
        padding: 10px;
        /* Mengurangi padding antar item */
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;

    }

    .cart-item img {
        max-width: 80px;
        /* Mengurangi ukuran gambar */
        height: auto;
        object-fit: cover;
        border-radius: 8px;
    }

    .item-detail {
        flex-grow: 1;
        margin-left: 10px;
    }

    .item-detail h3 {
        font-size: 16px;
        font-weight: 600;
        margin: 0;
        word-wrap: break-word;
    }

    .item-price {
        font-size: 14px;
        color: #777;
        margin-top: 5px;
    }

    .item-quantity {
        display: flex;
        gap: 5px;
        /* Mengurangi jarak antar tombol kuantitas */
        margin-top: 5px;
    }

    .item-quantity button {
        padding: 5px 8px;
        /* Menyesuaikan ukuran tombol */
        font-size: 14px;
        cursor: pointer;
    }

    .remove-item {
        font-size: 18px;
        cursor: pointer;
        color: #d9534f;
        margin-left: -40px;
    }

    /* Total Price Section */
    .total-price {
        margin-top: 15px;
        font-size: 18px;
        font-weight: bold;
        text-align: left;
    }

    /* Checkout Button */
    .checkout-button {
        width: 75%;
        padding: 10px;
        background-color: #b6895b;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 15px;
    }

    .checkout-button:hover {
        background-color: #c3792f;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .cart-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .cart-item img {
            max-width: 80px;
        }

        .item-detail h3 {
            font-size: 14px;
        }

        .item-quantity {
            flex-direction: column;
        }

        .remove-item {
            align-self: flex-start;
            margin-top: 10px;
        }

        .total-price {
            font-size: 16px;
        }
    }

    #login-button {
        display: inline-block;
        padding: 8px 20px;
        background-color: #b6895b;
        border-radius: 5px;
        border-color: #fff;
        text-align: center;
        font-weight: bold;
    }

    #login-button:hover {
        background-color: #c3792f;
        color: black;

    }
    </style>

</head>

<body>
    <!-- navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">warkop<span> MJ</span>.</a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">tentang kami</a>
            <a href="#menu">Menu</a>
            <a href="#products">produk</a>
            <a href="#contact">kontak</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search-button"><i data-feather="search"></i>
                <a href="#" id="shopping-cart-button">
                    <i data-feather="shopping-cart"></i>
                    <span class="quanty-badge" style="color: #f7b80a;">
                        <?= count($carts) ?> </a>
                <a href="#" id="hamburger-menu"><i data-feather="menu"></i>
                </a>
                <a id="login-button" href="/project_akhir/views/warkop_ui/login_member.php">Login</a>
        </div>
        <!-- search form start -->
        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box"><i data-feather="search"></i></label>
        </div>
        <!-- search form end -->

        <!-- Shopping Cart Start -->
        <div class="shopping-cart" id="shopping-cart">
            <h2>Shopping Cart</h2>
            <div class="cart-items">
                <?php if (!empty($carts)) {
                foreach ($carts as $cartItem) { ?>
                <div class="cart-item">
                    <div class="cart-item-img">
                        <img src="img/menu/<?= $cartItem->item_name ?>.jpg"
                            alt="<?= htmlspecialchars($cartItem->item_name) ?>" />
                    </div>
                    <div class="item-detail">
                        <h3><?= htmlspecialchars($cartItem->item_name) ?></h3>
                        <div class="item-price">IDR <?= number_format($cartItem->item_price, 0, ',', '.') ?></div>
                        <div class="item-quantity">
                            <button onclick="decreaseQuantity(<?= $cartItem->id ?>)">-</button>
                            <span id="quantity-<?= $cartItem->id ?>"><?= htmlspecialchars($cartItem->quantity) ?></span>
                            <button onclick="increaseQuantity(<?= $cartItem->id ?>)">+</button>
                        </div>
                    </div>
                    <!-- Ikon Trash-2 menggunakan SVG -->
                    <button class="remove-item" onclick="removeItem(<?= $cartItem->id ?>)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" stroke-width="2" class="feather feather-trash-2">
                            <path d="M3 6h18M19 6l-1 14H6L5 6m2 0h12M10 11v6m4-6v6"></path>
                        </svg>
                    </button>
                </div>
                <?php } 
            } else { ?>
                <p>Your cart is empty.</p>
                <?php } ?>
            </div>

            <!-- Total Harga -->
            <div class="total-price">
                <strong>Total Harga:</strong>
                <span id="totalPrice">
                    Rp <?= number_format(array_sum(array_map(function($item) {
                    return $item->item_price * $item->quantity;
                }, $carts)), 0, ',', '.') ?>
                </span>
            </div>

            <!-- Tombol Checkout -->
            <button onclick="checkout()" class="checkout-button" id="checkout-button">Checkout</button>
        </div>
        <!-- Shopping Cart End -->






    </nav>
    <!-- navbar end -->

    <!-- hero section start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Ada Masalah? Ya <span>Ngopi</span> Aja</h1>
            <p>Jangan biarkan stres menguasai, mari kita
                ngobrol sambil ngopi!</p>
            <a href="#" class="cta">beli sekarang</a>
        </main>
    </section>
    <!-- hero section end -->



    <!-- about section start -->
    <section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="img/tentang-kami.jpg" alt="Tentang Kami">
            </div>
            <div class="content">

                <p>Warkop Kopi kami lahir dari semangat kebersamaan dan cita rasa khas yang sederhana namun mendalam.
                    Bagi kami, <span class="italic">warkop bukan sekadar tempat minum kopi</span>, tetapi ruang
                    berkumpul
                    yang penuh
                    kehangatan,
                    tempat di mana obrolan sederhana menjadi kenangan indah.</p>
                <p>Setiap cangkir kopi yang kami sajikan bukan hanya tentang rasa, tetapi juga tentang nilai dan
                    tradisi. Kami berkomitmen menjaga suasana warkop yang ramah, bersahaja, dan terbuka bagi siapa saja
                    yang mencari tempat istirahat atau inspirasi. Di sini, kopi dan pertemanan disajikan dengan porsi
                    yang pas untuk semua.</p>
            </div>
        </div>
    </section>
    <!-- about section end -->




    <!-- menu section start -->
    <section id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <p>Nikmati berbagai pilihan kopi dan camilan favorit yang kami sajikan dengan cita rasa khas.</p>

        <!-- Row Wrapper Outside the PHP Loop -->
        <div class="row">
            <?php foreach ($allMenu as $menu) {  ?>
            <div class="menu-card">
                <img src="img/menu/<?= $menu->item_name ?>.jpg" alt="<?= $menu->item_name ?>" class="menu-card-img">
                <h3 class="menu-card-title"><?= $menu->item_name ?></h3>
                <p class="menu-card-price">RP. <?= $menu->item_price ?></p>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- menu section end -->








    <!-- products section start -->
    <section class="products" id="products">
        <h2><span>produk unggulan</span> kami</h2>
        <p>Jelajahi koleksi produk unggulan kami yang dirancang untuk memberikan pengalaman terbaik.
            Temukan pilihan favorit
            Anda di sini!</p>

        <div class="row">

            <?php foreach ($allMenu as $menu) {  ?>
            <div class="product-card">
                <div class="product-icons">
                    <a href="#"><i data-feather="shopping-cart"></i></a>
                    <a href="#" class="item-detail-button" data-star="<?= $menu->item_star ?>"><i
                            data-feather="eye"></i></a>

                </div>
                <div class="product-image">
                    <img src="img/menu/<?= $menu->item_name ?>.jpg" alt="product 1">
                </div>
                <div class="product-content">
                    <h3>coffe <?= $menu->item_name ?></h3>
                    <div class="product-stars">
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <i data-feather="star" <?= ($i <= $menu->item_star) ? 'class="star-full"' : ''; ?>></i>
                        <?php } ?>
                    </div>


                    <div class="product-price">
                        RP. <?= ceil($menu->item_price * 0.8) ?>
                        <span>RP. <?= $menu->item_price ?></span>
                    </div>


                </div>
            </div>
            <?php } ?>

        </div>

    </section>

    <!-- products section end -->






    <!-- contact section start -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Jangan ragu untuk menghubungi kami melalui form di bawah ini atau datang langsung ke warkop
            kami~</p>

        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.958140793931!2d112.57559401469219!3d-7.3585891946899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7808809a2ed0c3%3A0xed8cd2d758019d59!2sWarkop%20MJ!5e0!3m2!1sid!2sid!4v1675781074414!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

            <form onsubmit="submitToWhatsApp(event)">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" id="name" placeholder="nama" required>
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="email" id="email" placeholder="email" required>
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" id="phone" placeholder="no hp" required>
                </div>
                <button type="submit" class="btn">kirim pesan</button>
            </form>
        </div>
    </section>
    <!-- contact section end -->



    <!-- footer start -->
    <footer>
        <div class="socials">
            <a href="https://instagram.com/itzluthfi"><i data-feather="instagram"></i></a>
            <a href="https://twitter.com/itzluthfi"><i data-feather="twitter"></i></a>
            <a href="https://facebook.com/itzluthfi"><i data-feather="facebook"></i></a>
            <script>
            // Aktifkan semua ikon Feather Icons pada halaman
            feather.replace();
            </script>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">tentang kami</a>
            <a href="#menu">Menu</a>

            <a href="#contact">kontak</a>
        </div>

        <div class="credit">
            <p>created by <a href="">luthfi shidqi habibulloh</a>. | &copy;2023.</p>
        </div>
    </footer>
    <!-- footer end -->


    <!-- modal box item details start -->
    <div class="modal" id="item-detail-modal">
        <div class="modal-container">
            <a href="#" class="close-icon"><i data-feather="x"></i></a>
            <div class="modal-content">
                <img src="img/products/1.jpg" alt="<?= htmlspecialchars($menu->item_name) ?>">
                <div class="product-content">
                    <h3><?= htmlspecialchars($menu->item_name) ?></h3>
                    <!-- Deskripsi manual -->
                    <p>Ini adalah deskripsi produk manual yang bisa diubah sesuai keinginan. Misalnya, deskripsi kopi
                        yang sangat enak dan nikmat.</p>
                    <div class="product-stars">
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <i data-feather="star" <?= ($i <= $menu->item_star) ? 'class="star-full"' : '' ?>></i>
                        <?php } ?>
                    </div>

                    <div class="product-price" style="font-size: 1.3rem;font-weight: bold;">
                        RP. <?= ceil($menu->item_price * 0.8) ?>
                        <span style="text-decoration: line-through;
                        font-weight: lighter;font-size: 1rem;">RP. <?= $menu->item_price ?></span>
                    </div>

                    <a href="#"><i data-feather="shopping-cart rounded"></i> <span>add to cart</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal box item details end -->


    <!-- contact form-->
    <script>
    function submitToWhatsApp(event) {
        event.preventDefault();

        // Mengambil nilai dari input
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;

        // ID nomor WhatsApp tujuan
        const phoneNumber = '6289507370805'; // Ganti dengan nomor WhatsApp tujuan

        // Format pesan yang akan dikirim
        const message = `Halo, saya ${name}.%0AEmail: ${email}%0ANo HP: ${phone}%0ASaya ingin menghubungi Anda.`;

        // Mengarahkan ke WhatsApp
        const whatsappURL = `https://wa.me/${phoneNumber}?text=${message}`;
        window.open(whatsappURL, '_blank');
    }
    </script>
    <script>
    function decreaseQuantity(id) {
        const quantityElement = document.getElementById(`quantity-${id}`);
        let quantity = parseInt(quantityElement.textContent);
        if (quantity > 1) {
            quantityElement.textContent = quantity - 1;
            updateTotalPrice();
        }
    }

    function increaseQuantity(id) {
        const quantityElement = document.getElementById(`quantity-${id}`);
        let quantity = parseInt(quantityElement.textContent);
        quantityElement.textContent = quantity + 1;
        updateTotalPrice();
    }

    function updateQuantity(id, delta) {
        const quantitySpan = document.getElementById(`quantity-${id}`);
        let quantity = parseInt(quantitySpan.textContent) + delta;
        if (quantity < 1) return; // Cegah jumlah negatif atau nol

        fetch(`/project_akhir/response_input.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id,
                    quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    quantitySpan.textContent = quantity;
                    document.getElementById(`price-${id}`).textContent = data.newPrice;
                    document.getElementById(`totalPrice`).textContent = data.totalPrice;
                }
            });
    }

    function removeItem(id) {
        fetch(`/project_akhir/response_input.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`cart-item-${id}`).remove();
                    document.getElementById(`totalPrice`).textContent = data.totalPrice;
                }
            });
    }

    function checkout() {
        fetch(`/project_akhir/response_input.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Checkout berhasil!");
                    document.getElementById("shopping-cart").innerHTML = "<p>Your cart is empty.</p>";
                }
            });
    }
    </script>

    <!-- feather icon -->
    <script>
    feather.replace();
    </script>

    <!-- my javascript -->
    <script src="js/script.js"></script>
</body>

</html>