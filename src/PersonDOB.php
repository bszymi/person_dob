<?php

namespace BartoszSzymichowski\PersonDOB;

class PersonDOB extends \DateTime
{
    /**
     * @var $testCurrentDate \DateTime used for testing only
     */
    private $testCurrentDate;

    public function getPlainTextAge(): string
    {
        $today = $this->testCurrentDate ?? new \DateTime();
        $age = $this->diff($today)->y;

        if ($age < 18) {
            return 'Young';
        } elseif ($age <= 60) {
            return 'Adult';
        } else {
            return 'Senior';
        }
    }

    public function countWeekDays(string $dayOfWeek): int
    {
        $dayOfWeek = strtolower($dayOfWeek);
        $weekdayIndex = ['monday' => 1, 'tuesday' => 2, 'wednesday' => 3, 'thursday' => 4, 'friday' => 5, 'saturday' => 6, 'sunday' => 7];

        if (!array_key_exists($dayOfWeek, $weekdayIndex)) {
            throw new \InvalidArgumentException("Invalid day of the week: $dayOfWeek");
        }

        $end = $this->testCurrentDate ?? new \DateTime();
        $interval = $this->diff($end);

        // Calculate total days
        $totalDays = $interval->days;
        $totalWeeks = floor($totalDays / 7);

        // Calculate complete weeks
        $completeWeekdays = $totalWeeks;

        // Calculate remaining days
        $startDay = (int)$this->format('N');
        $endDay = (int)$end->format('N');
        $targetDay = $weekdayIndex[$dayOfWeek];

        if ($startDay <= $endDay) {
            if ($targetDay >= $startDay && $targetDay <= $endDay) {
                $completeWeekdays++;
            }
        } else {
            if ($targetDay >= $startDay || $targetDay <= $endDay) {
                $completeWeekdays++;
            }
        }

        return $completeWeekdays;
    }

    public function setTestCurrentDate($date)
    {
        $this->testCurrentDate = new \DateTime($date);
    }
}