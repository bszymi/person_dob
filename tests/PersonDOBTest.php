<?php


use BartoszSzymichowski\PersonDOB\PersonDOB;
use PHPUnit\Framework\TestCase;

class PersonDOBTest extends TestCase
{
    private $fixedCurrentDate;

    protected function setUp(): void
    {
        $this->fixedCurrentDate = '2024-01-08';
    }

    public function testGetPlainTextAge()
    {
        $youngPerson = new PersonDOB('2010-01-01');
        $youngPerson->setTestCurrentDate($this->fixedCurrentDate);
        $this->assertEquals('Young', $youngPerson->getPlainTextAge());

        $adultPerson = new PersonDOB('1980-01-01');
        $youngPerson->setTestCurrentDate($this->fixedCurrentDate);
        $this->assertEquals('Adult', $adultPerson->getPlainTextAge());

        $seniorPerson = new PersonDOB('1950-01-01');
        $youngPerson->setTestCurrentDate($this->fixedCurrentDate);
        $this->assertEquals('Senior', $seniorPerson->getPlainTextAge());
    }

    public function testCountWeekDays()
    {
        // Test case 1: Person born on a Tuesday and lived through one Monday
        $personBornTuesday = new PersonDOB('2024-01-02'); // Tuesday
        $personBornTuesday->setTestCurrentDate($this->fixedCurrentDate);
        $mondaysLived = $personBornTuesday->countWeekDays('Monday');
        $this->assertEquals(1, $mondaysLived);

        // Test case 2: Person born on a Wednesday and has not lived through any Tuesday yet
        $personBornWednesday = new PersonDOB('2024-01-03'); // Wednesday
        $personBornWednesday->setTestCurrentDate($this->fixedCurrentDate);
        $tuesdaysLived = $personBornWednesday->countWeekDays('Tuesday');
        $this->assertEquals(0, $tuesdaysLived);

        // Test case 3: Person born on a Friday and lived through one Friday
        $personBornFriday = new PersonDOB('2024-01-05'); // Friday
        $personBornFriday->setTestCurrentDate($this->fixedCurrentDate);
        $fridaysLived = $personBornFriday->countWeekDays('Friday');
        $this->assertEquals(1, $fridaysLived);

        // Test case 4: Person born a year ago from the fixed current date
        $personBornYearAgo = new PersonDOB('2023-01-08'); // Sunday
        $personBornYearAgo->setTestCurrentDate($this->fixedCurrentDate);
        $fridaysLived = $personBornYearAgo->countWeekDays('Friday');
        $this->assertEquals(52, $fridaysLived);
    }
}
