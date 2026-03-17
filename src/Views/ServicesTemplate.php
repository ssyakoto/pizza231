<?php
namespace App\Views;


class ServicesTemplate {
    
    public static function getTemplate($services) {
      
        $html = "<h1>Услуги работают!</h1>";
        $html .= "<p>Количество услуг: " . count($services) . "</p>";
        
        if (!empty($services)) {
            foreach ($services as $s) {
                $html .= "<div><b>" . $s['name'] . "</b>: " . $s['price'] . "</div>";
            }
        }
        
        return $html;
    }
}