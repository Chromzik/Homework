<?php
declare(strict_types=1);

namespace App;
use DateTime;

class DateFormatter
{
    protected $dateTime;

    public function __construct()
    {
        $this->dateTime    = new DateTime();
    }

    public function setHours(int $hours)
    {
        $this->dateTime->setTime($hours, 0);
    }

    /**
     * Get current part of the day
     *
     * @return string
     */
    public function getPartOfDay() : string
    {
        $currentHour = $this->dateTime->format('G');
        if ($currentHour >= 0 && $currentHour < 6)
        {
            return 'Night';
        }
        if ($currentHour >= 6 && $currentHour < 12)
        {
            return 'Morning';
        }
        if ($currentHour >= 12 && $currentHour < 18)
        {
            return 'Afternoon';
        }
        return 'Evening';
    }
}