<?php
namespace App\Controllers;
use App\Views\ProductTemplate;

class ProductController {
    // Измените private на public
    public function getProducts(): array {
        return [
            1 => [
                'id' => 1,
                'name' => 'Баланса "Жёсткий Рак"',
                'price' => 3500,
                'image' => '/asserts/img/product1.jpg',
                'description' => 'Крутая баланса для настоящих пацанов. Материал: премиум-пластик.',
                'in_stock' => true
            ],
            2 => [
                'id' => 2,
                'name' => 'Кроссовки "Свагенатор"',
                'price' => 4599,
                'image' => '/asserts/img/product2.jpg',
                'description' => 'Удобные, стильные, неубиваемые. Идеальны для прогулок и тусовок.',
                'in_stock' => true
            ],
            3 => [
                'id' => 3,
                'name' => 'Худи "Кузбасс Стиль"',
                'price' => 142,
                'image' => '/asserts/img/product3.jpg',
                'description' => 'Тёплое худи с принтом. 100% хлопок, размерная сетка S-XXL.',
                'in_stock' => false
            ],
            4 => [
                'id' => 4,
                'name' => 'Кепка "Братва"',
                'price' => 0,
                'image' => '/asserts/img/product4.jpg',
                'description' => 'Стильная кепка с вышивкой. Регулируемый размер.',
                'in_stock' => true
            ],
            5 => [
                'id' => 5,
                'name' => 'Рюкзак "Гоп-стоп"',
                'price' => 228,
                'image' => '/asserts/img/product5.jpg',
                'description' => 'Вместительный рюкзак с защитой от карманников. Водонепроницаемый.',
                'in_stock' => true
            ]
        ];
    }

    public function index(): string {
        return ProductTemplate::getCatalog($this->getProducts());
    }

    public function show(int $id): string {
        $products = $this->getProducts();
        if (!isset($products[$id])) {
            return ProductTemplate::getNotFound($id);
        }
        return ProductTemplate::getProductCard($products[$id]);
    }
}