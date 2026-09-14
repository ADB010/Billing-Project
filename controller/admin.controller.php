<?php 
    require_once '../model/item.database.admin.php';
    require_once '../model/customer.database.con.php';

    $name = $_POST['name'];
    $submit = $_POST['submit'];

    $customercon = new DbConnection("root", "", "Data");
    $itemcon = new Items();
    $itemcon->dbCreate();
    $itemcon->createItemTable();

    switch($submit){
        case 'ADD':
            $price = (float)$_POST['price'];
            $offerPrice = (float)$_POST['offer'];
            $quantity = $_POST['quantity'];
            $catagorie = $_POST['catagorie'];
            $itemcon->insertItem($name, $price, $offerPrice, $quantity, $catagorie); 
            header("Location: ../view/productSelect.view.php");           
            break;

        case 'REMOVE':
            $itemcon->deleteItemData($name);
            header("Location: ../view/productSelect.view.php");
            break;
           
        case 'UPDATE':
            $bool = isset($_POST['bool']) ? (int)$_POST['bool'] : 0;
            if (isset($_POST['offer']) && trim($_POST['offer']) !== '') {
                $newOffer = (float)$_POST['offer'];
                $itemcon->updateOffer($name, $bool, $newOffer);
                header("Location: ../view/productSelect.view.php");
            }
            else{
                $itemcon->updateOffer($name, $bool);
            }
            break;

        case 'REMOVE CUSTOMER':
            $customercon->deleteCustomerData($name);
            header("Location: ../view/customerList.view.php");
            break;
 
        default:
            echo "No Tasks";
    }

    // $itemcon->dbCreate();
    // $itemcon->createItemTable();
    // $itemcon->insertItem($item_name, $price, $quantity, $catagorie);
    // $itemcon->deleteItemData($item_name);
    // echo "<br>Complete";