<?php
namespace App\Controllers;

use App\Views\ServicesTemplate;

class ServicesController {
    
    private function getServices(): array {
        return [
            1 => [
                'id' => 1,
                'name' => 'Доставка по городу',
                'description' => 'Быстрая доставка в любую точку Кемерово. Бесплатно при заказе от 3000₽.',
                'image' => '/asserts/img/service-delivery.jpg',
                'price' => 'от 150₽'
            ],
            2 => [
                'id' => 2,
                'name' => 'Примерка перед покупкой',
                'description' => 'Примерьте товар в нашем магазине или закажите выездного консультанта.',
                'image' => '/asserts/img/service-tryon.jpg',
                'price' => 'Бесплатно'
            ],
            3 => [
                'id' => 3,
                'name' => 'Гарантия качества',
                'description' => 'Возврат или обмен товара в течение 14 дней. Чек не обязателен.',
                'image' => '/asserts/img/service-guarantee.jpg',
                'price' => 'Включено'
            ],
            4 => [
                'id' => 4,
                'name' => 'Персональный стилист',
                'description' => 'Поможем подобрать образ под ваш стиль и бюджет. Запись по телефону.',
                'image' => '/asserts/img/service-stylist.jpg',
                'price' => 'от 500₽'
            ]
        ];
    }
    
    public function get(): string {
        return ServicesTemplate::getTemplate($this->getServices());
    }
}