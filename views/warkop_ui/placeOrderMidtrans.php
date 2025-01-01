<?php
require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-XUlNaB_fYw_KXZBTyDQmayCx';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

// Baca data JSON
$data = json_decode(file_get_contents('php://input'), true);

// Validasi data JSON
if (!isset($data["member_id"]) || !isset($data["total_price"]) || !isset($data["cart_data"]) || 
    !isset($data["nama_depan"]) || !isset($data["nama_belakang"]) || 
    !isset($data["email"]) || !isset($data["phone"])) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Data tidak lengkap."]);
    exit;
}

// Konversi cart_data ke item_details
$item_details = [];
foreach ($data["cart_data"] as $item) {
    $item_details[] = [
        'id' => $item['item_id'], // ID produk
        'name' => $item['item_name'], // Nama produk
        'price' => (int) $item['item_price'], // Harga satuan
        'quantity' => isset($item['quantity']) ? (int) $item['quantity'] : 1, // Jumlah produk
    ];
}

// Persiapkan parameter transaksi
$params = [
    'transaction_details' => [
        'order_id' => uniqid(),
        'gross_amount' => (int) $data["total_price"],
    ],
    'item_details' => $item_details,
    'customer_details' => [
        'first_name' => htmlspecialchars($data["nama_depan"]),
        'last_name' => htmlspecialchars($data["nama_belakang"]),
        'email' => htmlspecialchars($data["email"]),
        'phone' => htmlspecialchars($data["phone"]),
    ],
];

// Dapatkan Snap Token
try {
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    echo $snapToken;
} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(["error" => $e->getMessage()]);
}