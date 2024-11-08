<?php 
//require_once "/laragon/www/project_akhir/model/modelRole.php"; 
require_once "/laragon/www/project_akhir/init.php";   
include "/laragon/www/project_akhir/auth_check.php";    
$obj_role = $modelRole->getAllRole(); 
$obj_user = $modelUser->getAllUser(); 
$obj_item = $modelItem->getAllItem(); 
$obj_sale = $modelSale->getAllSales(); 


// Ambil tanggal dan total penjualan dari setiap objek penjualan
$sales_dates = [];
$sales_totals = [];
foreach ($obj_sale as $sale) {
    $sales_dates[] = $sale->sale_date; // Asumsi ada field sale_date
    $sales_totals[] = $sale->sale_totalPrice;
}

// Encode data untuk digunakan di JavaScript
$sales_dates_json = json_encode($sales_dates);
$sales_totals_json = json_encode($sales_totals);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<style>
.w-Search-Input {
    width: 400px;
}
</style>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include_once '/laragon/www/project_akhir/views/includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex h-screen">
        <!-- Sidebar -->

        <?php include $sidebar_file; ?>


        <!-- Main Content -->
        <div class="flex-1 p-8 overflow-y-auto h-[calc(100vh-4rem)]">
            <div class="container mx-auto">
                <h1 class="text-4xl font-bold mb-5 pb-2 text-gray-800 italic">Dashboard Page</h1>

                <!-- item start -->
                <div class="mx-6 mb-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2 xl:grid-cols-4">
                    <!-- User Card -->
                    <div class="card bg-blue-50 shadow-lg rounded-lg p-8">
                        <div class="card-body">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-2xl font-semibold text-gray-700">User</h4>
                                <div
                                    class="bg-indigo-600 bg-opacity-10 rounded-md w-10 h-10 flex items-center justify-center text-indigo-600">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                            <div class="mt-6 flex flex-col gap-0">
                                <h2 class="text-3xl font-bold text-gray-800"><?= count($obj_user) ?></h2>
                                <p><span class="text-gray-600">2</span> <span class="text-gray-500">Completed</span></p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Card -->
                    <div class="card bg-green-50 shadow-lg rounded-lg p-6">
                        <div class="card-body">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-2xl font-semibold text-gray-700">Item</h4>
                                <div
                                    class="bg-indigo-600 bg-opacity-10 rounded-md w-10 h-10 flex items-center justify-center text-indigo-600">
                                    <i class="fa-solid fa-cube"></i>
                                </div>
                            </div>
                            <div class="mt-6 flex flex-col gap-0">
                                <h2 class="text-3xl font-bold text-gray-800"><?= count($obj_item) ?></h2>
                                <p><span class="text-gray-600">28</span> <span class="text-gray-500">Completed</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Role Card -->
                    <div class="card bg-yellow-50 shadow-lg rounded-lg p-6">
                        <div class="card-body">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-2xl font-semibold text-gray-700">Role</h4>
                                <div
                                    class="bg-indigo-600 bg-opacity-10 rounded-md w-10 h-10 flex items-center justify-center text-indigo-600">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                            <div class="mt-6 flex flex-col gap-0">
                                <h2 class="text-3xl font-bold text-gray-800"><?= count($obj_role) ?></h2>
                                <p><span class="text-gray-600">1</span> <span class="text-gray-500">Completed</span></p>
                            </div>
                        </div>
                    </div>
                    <!-- Sale Card -->
                    <div class="card bg-red-50 shadow-lg rounded-lg p-6">
                        <div class="card-body">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-2xl font-semibold text-gray-700">Sale</h4>
                                <div
                                    class="bg-indigo-600 bg-opacity-10 rounded-md w-10 h-10 flex items-center justify-center text-indigo-600">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </div>
                            </div>
                            <div class="mt-6 flex flex-col gap-0">
                                <h2 class="text-3xl font-bold text-gray-800">
                                    <?= count($obj_sale) ?></h2>
                                <p><span class="text-green-600">5%</span> <span class="text-gray-500">Completed</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- item end -->

                <!-- Sales Chart and Table Section -->
                <div class="mx-6 mt-8">
                    <!-- Sales Chart -->
                    <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Sales Overview</h2>
                        <canvas id="salesChart" width="400" height="200"></canvas>
                    </div>

                    <!-- Sales Data Table -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Sales Data</h2>
                        <table class="min-w-full bg-white border">
                            <thead class="border-b-2 border-gray-300 text-gray-800">
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
                                <?php if (!empty($obj_sale)) {
                                // var_dump($obj_sale);
                                foreach ($obj_sale as $sale) { ?>
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
                                    <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($sale->sale_totalPrice); ?>
                                    </td>
                                    <td class="w-1/6 py-3 px-4"><?php echo htmlspecialchars($sale->sale_pay); ?></td>
                                    <td class="w-1/6 py-3 px-4"><?php echo htmlspecialchars($sale->sale_change); ?></td>
                                    <td class="w-1/6 py-3 px-4">
                                        <div class="flex items-center space-x-4">
                                            <button
                                                class="border-2 border-gray-700 bg-white hover:bg-gray-800 hover:text-white text-gray-800 font-bold py-1 px-2 rounded"
                                                onclick="openModal('modal-<?php echo $sale->sale_id; ?>')">
                                                Details
                                            </button>
                                            <!-- <button
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2"
                                                onclick="return confirmDelete(<?= $sale->sale_id ?>)">
                                                <i class="fa-solid fa-trash"></i>
                                            </button> -->
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
    </div>

    <script>
    // Ambil data dari PHP
    const salesDates = <?php echo $sales_dates_json; ?>;
    const salesTotals = <?php echo $sales_totals_json; ?>;

    // Konfigurasi data chart menggunakan data dari PHP
    const salesData = {
        labels: salesDates,
        datasets: [{
            label: 'Total Penjualan (USD)',
            data: salesTotals,
            backgroundColor: 'rgba(99, 102, 241, 0.2)', // Background warna Indigo
            borderColor: 'rgba(99, 102, 241, 1)', // Border warna Indigo
            borderWidth: 1
        }]
    };

    // Konfigurasi dan render chart
    const salesConfig = {
        type: 'line',
        data: salesData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const salesChart = new Chart(
        document.getElementById('salesChart'),
        salesConfig
    );
    </script>

</body>

</html>