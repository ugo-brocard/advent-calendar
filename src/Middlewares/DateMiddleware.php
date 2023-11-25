<?php
declare(strict_types = 1);

namespace AdventCalendar\Middlewares;

use DateTime;

/**
 * Class DateMiddleware
 * 
 * @package AdventCalendar\Middlewares
 */
class DateMiddleware {
    /**
     * Method checkDate
     * 
     * @param array $parameters 
     * @return void 
     */
    public function checkDate(array $parameters): void
    {
        $currentDate = new DateTime( date("d-m-Y") );
        $dayDate     = new DateTime($parameters["id"] + 1 . "-12-2023");

        if ($dayDate > $currentDate) {
            header("Location: /");
        }
    }
}
