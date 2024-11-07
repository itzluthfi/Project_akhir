<?php

require_once "/laragon/www/project_akhir/model/modelSale.php";

class ControllerSale {
    private $modelSale;

    public function __construct() {
        $this->modelSale = new ModelSale();
    }

    public function handleAction($action) {
        switch ($action) {
            

            case 'add':
                // Cek apakah semua data ada
                if (
                    isset($_POST['sale_pay']) && 
                    isset($_POST['sale_change']) && 
                    isset($_POST['sale_totalPrice']) && 
                    isset($_POST['items']) && 
                    isset($_POST['id_user']) && 
                    isset($_POST['id_member'])
                ) {
                    $sale_date = date('Y-m-d');
                    $sale_pay = floatval($_POST['sale_pay']);
                    $sale_change = floatval($_POST['sale_change']);
                    $sale_totalPrice = floatval($_POST['sale_totalPrice']);
                    $id_user = intval($_POST['id_user']);
                    $id_member = intval($_POST['id_member']);
                    
                    $detailItems = [];
                    $itemsData = json_decode($_POST['items'], true); // Mengonversi string JSON ke array PHP
                    if (is_array($itemsData)) {
                        foreach ($itemsData as $itemData) {
                            $detailItems[] = new DetailSale(
                                $this->modelSale->nextId,
                                $itemData['item_id'],
                                $itemData['item_name'],
                                $itemData['item_price'],
                                $itemData['item_qty']
                            );
                        }
                    }
    
        
                        // Debugging untuk melihat array detailItems
                        echo "<pre>";
                        print_r($detailItems);
                        echo "</pre>";

                        $sale = $this->modelSale->addSale($detailItems, $sale_pay, $sale_change, $sale_totalPrice, $sale_date, $id_user, $id_member);
                        
                        // Debugging untuk melihat hasil $sale
                        echo "<pre>";
                        print_r($sale);
                        echo "</pre>";

                        echo "<script>
                            alert('Penjualan berhasil ditambahkan! Data: ' + JSON.stringify(" . json_encode($sale) . "));
                            window.location.href='/project_akhir/views/sale/sale_list.php';
                        </script>";
                    } else {
                        echo "<script>alert('Data yang dikirim tidak lengkap!'); window.history.back();</script>";
                    }
                break;
    

            case 'delete':
                // Menghapus penjualan berdasarkan ID
                $saleId = $_GET['id'];
                if ($this->modelSale->deleteSale($saleId)) {
                    echo "<script>alert('Penjualan berhasil dihapus!'); window.location.href='/project_akhir/views/sale/sale_list.php';</script>";
                } else {
                    echo "<script>alert('Gagal menghapus penjualan!'); window.location.href='/project_akhir/views/sale/sale_list.php';</script>";
                }
                break;

       

            default:
                echo "<script>alert('Aksi tidak dikenal!'); window.location.href='/project_akhir/views/sale/sale_list.php';</script>";
                break;
        }
    }
}
?>