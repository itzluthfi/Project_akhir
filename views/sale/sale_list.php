<?php
require_once "/laragon/www/project_akhir/init.php";
require_once "/laragon/www/project_akhir/auth_check.php";
$sales = $modelSale->getAllSales();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar sale</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Script untuk mengaktifkan modal -->
    <script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    function confirmDelete(saleId) {
        if (confirm('Apakah Anda yakin ingin menghapus role ini?')) {
            // Redirect ke halaman delete dengan fitur=delete
            window.location.href = "/project_akhir/response_input.php?modul=sale&fitur=delete&id=" + saleId;
        } else {
            // Batalkan penghapusan
            alert("gagal menghapus data");
            return false;
        }
    }
    </script>
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

            <h1 class="text-4xl font-bold mb-5 pb-2 text-gray-800 italic">Manage Sales</h1>


            <!-- Main Container for Transactions -->
            <div class="container mx-auto">
                <!-- sale Table -->
                <div class="bg-white shadow-md  my-6">
                    <table class="min-w-full bg-white grid-cols-1 rounded-xl">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">ID sale</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">User</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Member</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Total Harga</th>
                                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Dibayar</th>
                                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kembalian</th>
                                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php if (!empty($sales)) {
                                // var_dump($sales);
                                foreach ($sales as $sale) { ?>
                            <tr class="text-center">
                                <td class="py-3 px-4 text-blue-600">
                                    <?php echo htmlspecialchars($sale->sale_id); ?></td>
                                <!-- <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($sale->sale_date); ?></td> -->
                                <td class="w-1/4 py-3 px-4">
                                    <?php $user = $modelUser->getUserById($sale->id_user);$role = $modelRole->getRoleById($sale->id_user); echo htmlspecialchars("{$user->user_username} - [{$role->role_name}]"); ?>
                                </td>
                                <td class="w-1/4 py-3 px-4">
                                    <?php $member = $modelMember->getMemberById($sale->id_member); echo htmlspecialchars($member->name); ?>
                                </td>
                                <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($sale->sale_totalPrice); ?></td>
                                <td class="w-1/6 py-3 px-4"><?php echo htmlspecialchars($sale->sale_pay); ?></td>
                                <td class="w-1/6 py-3 px-4"><?php echo htmlspecialchars($sale->sale_change); ?></td>
                                <td class="w-1/6 py-3 px-4">
                                    <div class="flex items-center space-x-4">
                                        <button onclick="openModal('modal-<?php echo $sale->sale_id; ?>')" class="group relative inline-flex h-10 w-10 items-center justify-center
                                            overflow-hidden rounded-full bg-neutral-950 font-medium text-neutral-200
                                            transition-all duration-300 hover:w-28">
                                            <div
                                                class="inline-flex whitespace-nowrap opacity-0 transition-all duration-200 group-hover:-translate-x-3 group-hover:opacity-100">
                                                Details</div>
                                            <div class="absolute right-3">
                                                <svg width="13" height="13" viewBox="0 0 15 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="h-4 w-4">
                                                    <path
                                                        d="M8.14645 3.14645C8.34171 2.95118 8.65829 2.95118 8.85355 3.14645L12.8536 7.14645C13.0488 7.34171 13.0488 7.65829 12.8536 7.85355L8.85355 11.8536C8.65829 12.0488 8.34171 12.0488 8.14645 11.8536C7.95118 11.6583 7.95118 11.3417 8.14645 11.1464L11.2929 8H2.5C2.22386 8 2 7.77614 2 7.5C2 7.22386 2.22386 7 2.5 7H11.2929L8.14645 3.85355C7.95118 3.65829 7.95118 3.34171 8.14645 3.14645Z"
                                                        fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                                                    </path>
                                                </svg>
                                            </div>
                                        </button>

                                        <!-- <button
                                            class="border-2 border-gray-700 bg-white hover:bg-gray-800 hover:text-white text-gray-800 font-bold py-1 px-2 rounded"
                                            onclick="openModal('modal-<?php echo $sale->sale_id; ?>')">
                                            Details
                                        </button> -->
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2"
                                            onclick="return confirmDelete(<?= $sale->sale_id ?>)">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>

                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk detail sale -->
    <?php if (!empty($sales)) {
        foreach ($sales as $sale) { ?>
    <div id="modal-<?php echo $sale->sale_id; ?>"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Detail sale:
                    <?php echo htmlspecialchars($sale->sale_id); ?></h3>
                <div class="mt-2">
                    <table class="min-w-full bg-white overflow-y-auto overflow-x-auto">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/8 py-3 px-4 uppercase font-semibold text-sm">Id</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Barang</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Harga</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Jumlah</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php foreach ($sale->detailSale as $detail) { ?>
                            <tr class="text-center">
                                <td class="py-3 px-2"><?php echo htmlspecialchars($detail->item_id); ?></td>
                                <td class="py-3 px-3"><?php echo htmlspecialchars($detail->item_name); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($detail->item_price); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($detail->item_qty); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($detail->subtotal); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="items-center px-4 py-3">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        onclick="closeModal('modal-<?php echo $sale->sale_id; ?>')">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php } } ?>

    <script>
    // delete sale
    function deleteSale(saleId) {
        if (confirm('Apakah Anda yakin ingin menghapus penjualan ini?')) {
            // Redirect to delete page with fitur=delete
            window.location.href = `/project_akhir/response_input.php?modul=sale&fitur=delete&id=${saleId}`;
        } else {
            alert("Penghapusan data dibatalkan");
        }
    }

    // function addSale(saleId) {
    //     const newSale = {
    //         details: [{
    //                 id_sale: 4,
    //                 item_id: 1,
    //                 item_name: "New Item",
    //                 item_price: 20000,
    //                 item_qty: 10
    //             },
    //             {
    //                 id_sale: 4,
    //                 item_id: 2,
    //                 item_name: "Another Item",
    //                 item_price: 30000,
    //                 item_qty: 5
    //             }
    //         ],
    //         pay: 100000,
    //         change: 20000,
    //         total: 80000,
    //         date: "01-11-2024"
    //     };

    //     fetch('/project_akhir/response_input.php?modul=sale&fitur=add', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json'
    //             },
    //             body: JSON.stringify(newSale)
    //         })
    //         .then(response => response.json())
    //         .then(data => console.log(data));
    // }
    </script>

</body>

</html>