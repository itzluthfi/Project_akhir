<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include '../includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include '../includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Formulir Input barang -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Barang</h2>
                <form action="" method="POST">
                    <!-- Nama barang -->
                    <div class="mb-4">
                        <label for="barang_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang:</label>
                        <input type="text" id="barang_name" name="barang_name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan nama barang" required value="">
                    </div>

                    <!-- Harga Barang -->
                    <div class="mb-4">
                        <label for="barang_harga" class="block text-gray-700 text-sm font-bold mb-2">Harga
                            Barang:</label>
                        <input type="number" id="barang_harga" name="barang_harga"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan harga barang" required value="">
                    </div>

                    <!-- Stock Barang -->
                    <div class="mb-4 text-left">
                        <label for="barang_stock" class="block text-gray-700 text-sm font-bold mb-2">Stock
                            Barang:</label>
                        <input type="number" id="barang_stock" name="barang_stock"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan jumlah stock barang" required value="">
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex items-center justify-between">
                        <!-- Tombol Submit -->
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>

                        <!-- Tombol Cancel -->
                        <a href="javascript:history.back()"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>