<?php
declare(strict_types = 1);

namespace AdventCalendar\Controllers;

use Router\Attributes\Get;
use AdventCalendar\Models\Day;
use AdventCalendar\Views\View;

/**
 * Class Days
 * 
 * @package AdventCalendar\Controllers
 */
class Days {
    #[Get("/")]
    public function renderDays(): string
    {
        $days = self::resolveDays();
        return View::render("calendar", "main", ["days" => $days]);
    }

    #[Get("/day/@[id: int]")] // TODO: , middlewares: [[DateMiddleware::class, "checkDate"]])]
    public function renderDay(array $parameters): string
    {
        $day = self::resolveDay($parameters["id"] - 1);
        return View::render("day", "main", ["day" => $day]);
    }

    #[Get("/test")]
    public function test(): string
    {
        return View::render("test", "main", []);
    }

    /**
     * Method resolveDays
     * 
     * @return Day[]
     */
    public static function resolveDays(): array
    {
        $path = dirname(__DIR__) . "/Data/days.json";
        $json = file_get_contents($path);

        $days = [];
        foreach (json_decode($json, true) as $key => $value) {
            $path = dirname(__DIR__) . "/Data/Contents/{$value["content"]}";
            $content = file_get_contents( $path );

            $day = new Day(
                $key,
                $value["title"],
                $content,
                $value["hints"],
            );

            $days[] = $day;
        } 

        return $days;
    }

    /**
     * Method resolveDay
     * 
     * @param int $id 
     * @return Day 
     */
    public static function resolveDay(int $id): Day
    {
        $days = self::resolveDays();

        if (!isset($days[$id])) {
            return self::resolveDay(0);
        }

        return $days[$id];
    }
}
