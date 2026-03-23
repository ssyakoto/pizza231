<?php
namespace App\Views;

class CartTemplate extends BaseTemplate {
    public static function getCartTemplate($products, $total): string {
        $template = parent::getTemplate();
        $title = 'Корзина';
        
        $rows = '';
        
        if (!empty($products) && is_array($products)) {
            foreach ($products as $item) {
                $name = $item['name'] ?? 'Товар';
                $price = $item['price'] ?? 0;
                $qty = $item['quantity'] ?? 1;
                $sum = $item['total_price'] ?? 0;
                $id = $item['id'] ?? 0;

                $rows .= <<<TR
                <tr>
                    <td>{$name}</td>
                    <td>{$price} ₽</td>
                    <td>{$qty} шт.</td>
                    <td>{$sum} ₽</td>
                    <td><a href="/cart/remove/{$id}" class="btn btn-sm btn-danger">Удалить</a></td>
                </tr>
TR;
            }
        } else {
            $rows = '<tr><td colspan="5" class="text-center">Корзина пуста</td></tr>';
        }

        $content = <<<HTML
        <h1 class="mb-4">Ваша корзина</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Товар</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Сумма</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                $rows
                </tbody>
            </table>
        </div>
        <div class="text-end mt-4">
            <h3>Итого: <span class="text-primary">$total ₽</span></h3>
            <a href="/cart/clear" class="btn btn-outline-secondary me-2">Очистить</a>
            <button class="btn btn-success">Оформить заказ</button>
        </div>
        <a href="/product" class="btn btn-link mt-3">← Вернуться в каталог</a>
HTML;
        return sprintf($template, $title, $content);
    }
}