<?php

// Mengambil data dari request POST yang dikirim oleh Midtrans
$orderId = $_POST['order_id'];
$statusCode = $_POST['status_code'];
$grossAmount = $_POST['gross_amount'];
$signatureKey = $_POST['signature_key'];
$transactionStatus = $_POST['transaction_status'];

// Server Key Midtrans yang disimpan di konfigurasi
$serverKey = 'SB-Mid-server-XUlNaB_fYw_KXZBTyDQmayCx';

// Verifikasi signature dengan membuat hash
$hashed = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

if ($hashed == $signatureKey) {
    // Verifikasi status transaksi
    if ($transactionStatus == 'capture') {
        // Jika status transaksi adalah 'capture', maka perbarui status menjadi 'settlement'
        try {
            // Update status transaksi di database
            $pdo = new PDO("mysql:host=localhost;dbname=poswarkop", 'root', '');
            $sql = "UPDATE sales_midtrans SET status = 'settlement' WHERE order_id = :order_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':order_id', $orderId);
            $stmt->execute();

            echo "Transaksi berhasil, status diperbarui menjadi 'settlement'.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Status transaksi tidak sesuai.";
    }
} else {
    echo "Signature tidak valid.";
}
?>