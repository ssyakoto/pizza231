<?php
namespace App\Views;

class BaseTemplate {
    public static function getTemplate(): string {
        // Обратите внимание: после LINE не должно быть пробелов, сразу перенос строки
        $html = <<<LINE
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>%s</title>
    <!-- Подключаем Bootstrap (проверьте путь к файлу) -->
    <link href="/asserts/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card:hover, .service-card:hover { transform: translateY(-5px); transition: 0.3s; }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/asserts/img/logo.jpg" alt="Logo" width="52" height="52" class="d-inline-block align-text-top">
                    Магазин "Свагенатор30000"
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Главная</a></li>
                        <li class="nav-item"><a class="nav-link" href="/product">Каталог</a></li>
                        <li class="nav-item"><a class="nav-link" href="/services">Услуги</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">О нас</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        %s
    </div>

    <footer class="bg-dark text-white text-center p-4 mt-5">
        © 2025 «Кузбасский кооперативный техникум»
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
LINE;

        return $html;
    }
}