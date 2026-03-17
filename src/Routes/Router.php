<?php
namespace App\Routes;

use App\Controllers\AboutController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\ServicesController;

class Router {
    public function route(string $url): string {
        // Убираем QUERY STRING (?param=value), оставляем только путь
        $path = parse_url($url, PHP_URL_PATH);
        
        // Разбиваем путь на части: ['', 'product', '1'] -> ['product', '1']
        $pieces = array_values(array_filter(explode('/', $path)));
        
        // Получаем ресурс (первая часть, например 'product')
        $resource = $pieces[0] ?? '';
        
        // Получаем ID (вторая часть, например '1'), если есть
        $id = $pieces[1] ?? null;

        switch ($resource) {
            case 'about':
                $controller = new AboutController();
                return $controller->get();

            case 'services':
                $controller = new ServicesController();
                return $controller->get();

            case 'product':
                $controller = new ProductController();
                
                // Если ID есть и это число - показываем товар
                if ($id !== null && is_numeric($id)) {
                    return $controller->show((int)$id);
                }
                
                // Если ID нет - показываем каталог
                return $controller->index();

            default:
                // Главная страница
                $controller = new HomeController();
                return $controller->get();
        }
    }
}