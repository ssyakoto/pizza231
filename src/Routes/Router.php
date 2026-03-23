<?php
namespace App\Routes;
use App\Controllers\AboutController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\ServicesController;
use App\Controllers\CartController;

class Router {
    public function route(string $url): string {
        $path = parse_url($url, PHP_URL_PATH);
        $pieces = array_values(array_filter(explode('/', $path)));
        $resource = $pieces[0] ?? '';
        $id = $pieces[1] ?? null;
        $action = $pieces[1] ?? null;
        $actionId = $pieces[2] ?? null;
        
        switch ($resource) {
            case 'about':
                $controller = new AboutController();
                return $controller->get();
            case 'services':
                $controller = new ServicesController();
                return $controller->get();
            case 'cart':
                $controller = new CartController();
                if ($action === 'add' && $actionId) {
                    return $controller->add((int)$actionId);
                }
                if ($action === 'remove' && $actionId) {
                    return $controller->remove((int)$actionId);
                }
                if ($action === 'clear') {
                    return $controller->clear();
                }
                return $controller->index();
            case 'product':
                $controller = new ProductController();
                if ($id !== null && is_numeric($id)) {
                    return $controller->show((int)$id);
                }
                return $controller->index();
            default:
                $controller = new HomeController();
                return $controller->get();
        }
    }
}