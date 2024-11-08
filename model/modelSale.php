<?php

require_once "/laragon/www/project_akhir/domain_object/node_sale.php";
require_once "/laragon/www/project_akhir/domain_object/node_detailSale.php";

class ModelSale {
    public int $nextId = 1;
    /** @var Sale[] */
    private array $sales = [];

    public function __construct() {
        if (isset($_SESSION['sales'])) {
            $this->sales = unserialize($_SESSION['sales']);
            $this->nextId = isset($_SESSION['lastSaleId']) ? $_SESSION['lastSaleId'] + 1 : 1;
        } else {
            $this->initializeDefaultSales();
            $this->nextId = 4; // Mengatur ID berikutnya jika ada 3 penjualan default
        }
    }

    private function initializeDefaultSales(){
        $items1 = [
            //new DetailSale($id_sale, $item_id, $item_name, $item_price, $item_qty);
            new DetailSale(1, 1, "Item 1", 10000, 50),
            new DetailSale(1, 2, "Item 2", 15000, 30),
        ];
        $this->addSale($items1, 30000, 5000, 25000, "27-10-2024",1,1);

        $items2 = [
            new DetailSale(2, 3, "Item 3", 12000, 20),
            new DetailSale(2, 1, "Item 1", 10000, 50),
        ];
        $this->addSale($items2, 25000, 2000, 23000, "22-08-2022",2,2);

        $items3 = [
            new DetailSale(3, 2, "Item 2", 15000, 30),
            new DetailSale(3, 1, "Item 1", 10000, 50),
        ];
        $this->addSale($items3, 20000, 0, 20000, "21-08-2022",3,3);
        //$this->deleteSale(2);
        // $items3 = [
        //     new DetailSale(3, 2, "Item 2", 15000, 30),
        //     new DetailSale(1, 2, "Item 3", 20000, 20),
        //     new DetailSale(3, 1, "Item 1", 10000, 50),
        // ];
        // $this->addSale($items3, 20000, 4000, 16000, "22-08-2022",1,0);

    }

    public function addSale(array $detailSale, float $salePay, float $saleChange, float $saleTotalPrice, string $saleDate,int $id_user , int $id_member) {
        echo "<script>console.log('Menambahkan penjualan: Date={$saleDate}, Items=" . implode(",", array_map(fn($item) => $item->item_name, $detailSale)) . "');</script>";

        // Memperbaiki urutan parameter
        $sale = new Sale($this->nextId, $salePay, $saleChange, $saleTotalPrice, $saleDate, $id_user, $id_member, $detailSale);
        
        $this->sales[] = $sale;

        $_SESSION['lastSaleId'] = $this->nextId;
        $this->nextId++;
        $this->saveToSession();
        return $sale;
    }

    private function saveToSession() {
        $_SESSION['sales'] = serialize($this->sales);
    }

    public function getAllSales(): array {
        return $this->sales;
    }

    public function getSaleById(int $saleId): ?Sale {
        foreach ($this->sales as $sale) {
            if ($sale->sale_id === $saleId) {
                return $sale;
            }
        }
        return null;
    }



    public function deleteSale(int $saleId): bool {
        foreach ($this->sales as $index => $sale) {
            if ($sale->sale_id === $saleId) {
                // Hapus penjualan dari array
                unset($this->sales[$index]);
                // Re-index array setelah penghapusan
                $this->sales = array_values($this->sales);
    
                // Update sesi untuk mencerminkan perubahan
                $this->saveToSession();
                return true;
            }
        }
        return false; // Jika penjualan dengan ID yang diberikan tidak ditemukan
    }
    
}


?>