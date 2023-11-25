<?php
declare(strict_types = 1);

namespace AdventCalendar\Views;

class View {
    public static function render(string $view, string $layout, array $parameters): string
    {
        $view   = self::renderOnlyView($view, $parameters);
        $layout = self::renderOnlyLayout($layout, $parameters);
    
        return str_replace("@[content]", $view, $layout);
    }

    public static function renderOnlyView(string $view, array $parameters): string
    {
        foreach ($parameters as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/Views/{$view}.phtml";
        return ob_get_clean();
    }

    public static function renderOnlyLayout(string $layout, array $parameters): string
    {
        foreach ($parameters as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/Layouts/{$layout}.phtml";
        return ob_get_clean();
    }
}