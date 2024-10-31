<?php

class Sale {
    public int $sale_id;
    public float $sale_pay;
    public float $sale_change;
    public float $sale_totalPrice;
    public string $sale_date;

    /** @var DetailSale[] */
    public array $detailSale = []; // Menggunakan array untuk menyimpan daftar DetailSale

    public function __construct(
        int $sale_id,
        float $sale_pay,
        float $sale_change,
        float $sale_totalPrice,
        string $sale_date,
        array $detailSale = [] // Menempatkan $detailSale sebagai parameter opsional terakhir
    ) {
        $this->sale_id = $sale_id;
        $this->sale_pay = $sale_pay;
        $this->sale_change = $sale_change;
        $this->sale_totalPrice = $sale_totalPrice;
        $this->sale_date = $sale_date;
        $this->detailSale = $detailSale;
    }
}