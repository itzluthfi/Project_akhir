<?php 
require_once "/laragon/www/project_akhir/init.php";
$allMenu = $modelItem->getAllItem();
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


    <!-- my style -->
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
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
                <a href="#" id="shopping-cart-button"><i data-feather="shopping-cart"></i>
                    <a href="#" id="hamburger-menu"><i data-feather="menu"></i>
                    </a>
        </div>
        <!-- search form start -->
        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box"><i data-feather="search"></i></label>
        </div>

        <!-- search form end -->

        <!-- shopping cart start -->
        <div class="shopping-cart">
            <div class="cart-item">
                <img src="img/products/1.jpg" alt="product 1">
                <div class="item-detail">
                    <h3>product 1</h3>
                    <div class="item-price">IDR 25K</div>
                </div>
                <I data-feather="trash-2" class="remove-item"></I>
            </div>
            <div class="cart-item">
                <img src="img/products/1.jpg" alt="product 1">
                <div class="item-detail">
                    <h3>product 1</h3>
                    <div class="item-price">IDR 25K</div>
                </div>
                <I data-feather="trash-2" class="remove-item"></I>
            </div>
            <div class="cart-item">
                <img src="img/products/1.jpg" alt="product 1">
                <div class="item-detail">
                    <h3>product 1</h3>
                    <div class="item-price">IDR 25K</div>
                </div>
                <I data-feather="trash-2" class="remove-item"></I>
            </div>
            <div class="cart-item">
                <img src="img/products/1.jpg" alt="product 1">
                <div class="item-detail">
                    <h3>product 1</h3>
                    <div class="item-price">IDR 25K</div>
                </div>
                <I data-feather="trash-2" class="remove-item"></I>
            </div>
        </div>
        <!-- shopping cart end -->



    </nav>
    <!-- navbar end -->

    <!-- hero section start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Ada Masalah? Ya <span>Ngopi</span> Aja</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos, doloribus.</p>
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




    <!-- menu section end -->



    <!-- products section start -->
    <section class="products" id="products">
        <h2><span>produk unggulan</span> kami</h2>
        <p>Jelajahi koleksi produk unggulan kami yang dirancang untuk memberikan pengalaman terbaik.
            Temukan pilihan favorit
            Anda di sini!</p>

        <div class="row">
            <div class="product-card">
                <div class="product-icons">
                    <a href="#"><i data-feather="shopping-cart"></i></a>
                    <a href="#" class="item-detail-button"><i data-feather="eye"></i></a>
                </div>
                <div class="product-image">
                    <img src="img/products/1.jpg" alt="product 1">
                </div>
                <div class="product-content">
                    <h3>coffe beans 1</h3>
                    <div class="product-stars">
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                    </div>

                    <div class="product-price">IDR 25K <span>IDR 50K</span></div>
                </div>

            </div>
            <div class="product-card">
                <div class="product-icons">
                    <a href="#"><i data-feather="shopping-cart"></i></a>
                    <a href="#" class="item-detail-button"><i data-feather="eye"></i></a>
                </div>
                <div class="product-image">
                    <img src="img/products/1.jpg" alt="product 1">
                </div>
                <div class="product-content">
                    <h3>coffe beans 1</h3>
                    <div class="product-stars">
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star"></i>
                    </div>

                    <div class="product-price">IDR 25K <span>IDR 50K</span></div>
                </div>

            </div>
            <div class="product-card">
                <div class="product-icons">
                    <a href="#"><i data-feather="shopping-cart"></i></a>
                    <a href="#" class="item-detail-button"><i data-feather="eye"></i></a>
                </div>
                <div class="product-image">
                    <img src="img/products/1.jpg" alt="product 1">
                </div>
                <div class="product-content">
                    <h3>coffe beans 2</h3>
                    <div class="product-stars">
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                    </div>

                    <div class="product-price">IDR 25K <span>IDR 50K</span></div>
                </div>

            </div>
            <div class="product-card">
                <div class="product-icons">
                    <a href="#"><i data-feather="shopping-cart"></i></a>
                    <a href="#" class="item-detail-button"><i data-feather="eye"></i></a>
                </div>
                <div class="product-image">
                    <img src="img/products/1.jpg" alt="product 1">
                </div>
                <div class="product-content">
                    <h3>coffe beans 3</h3>
                    <div class="product-stars">
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                        <i data-feather="star"></i>
                    </div>

                    <div class="product-price">IDR 25K <span>IDR 50K</span></div>
                </div>

            </div>



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
                <img src="img/products/1.jpg" alt="product 1">
                <div class="product-content">
                    <h3>product 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt maiores, qui explicabo atque
                        aut accusantium suscipit ullam ut ducimus vero a, impedit reprehenderit unde debitis!</p>
                    <div class="product-stars">
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star"></i>
                    </div>

                    <div class="product-price">IDR 25K <span>IDR 50K</span></div>
                    <a href="#"><i data-feather="shopping-cart"></i> <span>add to cart</span></a>
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

    <!-- feather icon -->
    <script>
    feather.replace();
    </script>
    <!-- my javascript -->
    <script src="js/script.js"></script>
</body>

</html>