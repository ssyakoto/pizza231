<?php
namespace App\Controllers;
use App\Views\CartTemplate;

class CartController {
    public function index() {
        $cart = $_SESSION['cart'] ?? [];
        $products = [];
        $total = 0;
        
        $prodCtrl = new ProductController();
        $allProducts = $prodCtrl->getProducts();

        foreach ($cart as $id => $qty) {
            if (isset($allProducts[$id])) {
                $item = $allProducts[$id];
                $item['quantity'] = $qty;
                $item['total_price'] = $item['price'] * $qty;
                $products[] = $item;
                $total += $item['total_price'];
            }
        }
        
        return CartTemplate::getCartTemplate($products, $total);
    }

    public function add(int $id) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
        header('Location: /cart');
        exit;
    }

    public function remove(int $id) {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: /cart');
        exit;
    }
    
    public function clear() {
        unset($_SESSION['cart']);
        header('Location: /cart');
        exit;
    }
}