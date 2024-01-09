
# PersonDOB

## Description
PersonDOB is a PHP library that extends the functionality of PHP's DateTime class. It provides methods to determine a person's age category and count the number of specific weekdays between their date of birth and the current date.

## Installation

To install PersonDOB, you need to have Composer, the PHP dependency manager. If you don't have Composer installed, follow the instructions at [getcomposer.org](https://getcomposer.org/).

1. Clone the repository:
   ```bash
   git clone https://github.com/bszymi/person_dob.git
   ```
2. Navigate to the project directory:
   ```bash
   cd PersonDOB
   ```
3. Install dependencies using Composer:
   ```bash
   composer install
   ```

## Usage

To use PersonDOB in your PHP script, follow these steps:

1. Include the Composer autoload file at the beginning of your PHP script.
   ```php
   require __DIR__ . '/vendor/autoload.php';
   ```

2. Use the `PersonDOB` class in your script.
   ```php
   use BartoszSzymichowski\PersonDOB\PersonDOB;

   $personDOB = new PersonDOB('1990-05-20');
   echo 'Age Category: ' . $personDOB->getPlainTextAge() . "";
   echo 'Mondays Lived: ' . $personDOB->countWeekDays('Monday') . "";
   ```

## Contributing

Contributions to the PersonDOB project are welcome! If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes.
4. Submit a pull request with a clear description of your changes.

## License

MIT License

Copyright (c) 2024 Bartosz Szymichowski

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
