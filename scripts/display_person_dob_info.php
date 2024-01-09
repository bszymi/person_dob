#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use \BartoszSzymichowski\PersonDOB\PersonDOB;

$personDOB = new PersonDOB('1990-05-20');

echo 'Age Category: ' . $personDOB->getPlainTextAge() . "\n";
echo 'Mondays Lived: ' . $personDOB->countWeekDays('Monday') . "\n";