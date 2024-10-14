<?php
require_once "/laragon/www/project_akhir/model/modelItem.php";

class ControllerItem {
    private $modelItem;

    public function __construct() {
        $this->modelItem = new modelItem();
    }

    public function handleAction($action) {
        switch ($action) {
            case 'add':
                $item_name = $_POST['item_name'];
                $item_price = $_POST['item_price'];
                $item_stock = $_POST['item_stock'];
                $this->modelItem->addItem($item_name, $item_price, $item_stock);
                $message = "Item added successfully!";
                break;

            case 'update':
                $item_id = $_POST['item_id'];
                $item_name = $_POST['item_name'];
                $item_price = $_POST['item_price'];
                $item_stock = $_POST['item_stock'];
                if ($this->modelItem->updateItem($item_id, $item_name,$item_price, $item_stock)) {
                    $message = "Item updated successfully!";
                } else {
                    $message = "Failed to update item.";
                }
                break;

            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    if ($this->modelItem->deleteItem($id)) {
                        $message = "Item deleted successfully!";
                    } else {
                        $message = "Failed to delete item." . $id;
                    }
                } else {
                    $message = "Item ID not provided.";
                }
                break;

            default:
                $message = "Action not recognized for item.";
                break;
        }

        // Redirect after action
        echo "<script>alert('$message'); window.location.href='/project_akhir/views/item/item_list.php';</script>";
    }
}