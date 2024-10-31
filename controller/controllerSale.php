<?php

require_once "/laragon/www/project_akhir/model/modelSale.php";

class controllerSale {
    private $modelSale;

    public function __construct() {
        $this->modelSale = new modelSale();
    }

    public function handleAction($action) {
        switch ($action) {
            case 'add':
                $id_item = $_POST['items'];
                $sale_name = $_POST['sale_date'];
                $this->modelSale->addSale($sale_name, $id_item);
                break;
            }
    }
}