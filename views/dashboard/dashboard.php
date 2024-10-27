<?php 
//require_once "/laragon/www/project_akhir/model/modelRole.php"; 
require_once "/laragon/www/project_akhir/init.php";   
include "/laragon/www/project_akhir/auth_check.php";    
$obj_role = $modelRole->getAllRole(); 
$obj_user = $modelUser->getAllUser(); 
$obj_item = $modelItem->getAllItem(); 
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
        <?php include_once "/laragon/www/project_akhir/views/includes/sidebar.php"; ?>

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
                                <h2 class="text-3xl font-bold text-gray-800">0</h2>
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
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">Date</th>
                                    <th class="py-2 px-4 border-b">Item Sold</th>
                                    <th class="py-2 px-4 border-b">Quantity</th>
                                    <th class="py-2 px-4 border-b">Total Sale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b">2024-10-01</td>
                                    <td class="py-2 px-4 border-b">Item A</td>
                                    <td class="py-2 px-4 border-b">15</td>
                                    <td class="py-2 px-4 border-b">$450</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b">2024-10-02</td>
                                    <td class="py-2 px-4 border-b">Item B</td>
                                    <td class="py-2 px-4 border-b">10</td>
                                    <td class="py-2 px-4 border-b">$300</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Sales Chart Data
    const salesData = {
        labels: ['October 1', 'October 2', 'October 3', 'October 4', 'October 5'],
        datasets: [{
            label: 'Sales in USD',
            data: [450, 300, 500, 200, 350], // Sample data
            backgroundColor: 'rgba(99, 102, 241, 0.2)', // Indigo 500 background
            borderColor: 'rgba(99, 102, 241, 1)', // Indigo 500 border
            borderWidth: 1
        }]
    };

    // Sales Chart Configuration
    const salesConfig = {
        type: 'line', // Chart type
        data: salesData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Render Chart
    const salesChart = new Chart(
        document.getElementById('salesChart'),
        salesConfig
    );
    </script>

</body>

</html>