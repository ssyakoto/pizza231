<?php
namespace App\Views;

class ProductTemplate extends BaseTemplate {

    public static function getCatalog($products) {
        $template = parent::getTemplate();
        $title = 'Каталог товаров';
        
        $cards = '';
        foreach ($products as $product) {
            $badgeClass = $product['in_stock'] ? 'bg-success' : 'bg-secondary';
            $badgeText = $product['in_stock'] ? 'В наличии' : 'Нет в наличии';
            
            $cards .= <<<CARD
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm product-card">
                    <a href="/product/{$product['id']}">
                        <img src="{$product['image']}" class="card-img-top" alt="{$product['name']}" style="height: 250px; object-fit: cover;">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{$product['name']}</h5>
                        <p class="card-text text-muted small flex-grow-1">{$product['description']}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="badge {$badgeClass}">{$badgeText}</span>
                            <span class="fw-bold text-primary fs-5">{$product['price']} ₽</span>
                        </div>
                        <a href="/product/{$product['id']}" class="btn btn-outline-primary w-100 mt-3">Подробнее</a>
                    </div>
                </div>
            </div>
            CARD;
        }

        $content = <<<HTML
        <div class="text-center mb-5">
            <h1>Наши товары</h1>
            <p class="lead">Лучшая одежда для крутых парней</p>
        </div>
        <div class="row">
            $cards
        </div>
        HTML;

        return sprintf($template, $title, $content);
    }

    public static function getProductCard($product) {
        $template = parent::getTemplate();
        $title = $product['name'];
        
        $stockBadge = $product['in_stock'] 
            ? '<span class="badge bg-success fs-6">В наличии</span>' 
            : '<span class="badge bg-danger fs-6">Нет в наличии</span>';
            
        $btn = $product['in_stock']
            ? '<button class="btn btn-primary btn-lg w-100">Купить</button>'
            : '<button class="btn btn-secondary btn-lg w-100" disabled>Нет в наличии</button>';

        $content = <<<HTML
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item"><a href="/product">Каталог</a></li>
                <li class="breadcrumb-item active">{$product['name']}</li>
            </ol>
        </nav>

        <div class="card shadow border-0">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="{$product['image']}" class="img-fluid rounded-start w-100 h-100" alt="{$product['name']}" style="object-fit: cover; min-height: 400px;">
                </div>
                <div class="col-md-6">
                    <div class="card-body p-5 d-flex flex-column justify-content-center">
                        <h2 class="display-6 fw-bold mb-3">{$product['name']}</h2>
                        <p class="text-muted">Артикул: #{$product['id']}</p>
                        <h3 class="text-primary fw-bold my-3">{$product['price']} ₽</h3>
                        <p class="card-text fs-5 mb-4">{$product['description']}</p>
                        <div class="mb-4">$stockBadge</div>
                        $btn
                        <a href="/product" class="btn btn-link mt-3 text-decoration-none">← Вернуться в каталог</a>
                    </div>
                </div>
            </div>
        </div>
        HTML;

        return sprintf($template, $title, $content);
    }

    // Заглушка, если товар не найден
    public static function getNotFound($id) {
        $template = parent::getTemplate();
        $content = <<<HTML
        <div class="text-center py-5">
            <h1 class="display-1 text-muted">404</h1>
            <h2>Товар #{$id} не найден</h2>
            <a href="/product" class="btn btn-primary mt-3">Вернуться в каталог</a>
        </div>
        HTML;
        return sprintf($template, 'Товар не найден', $content);
    }
}