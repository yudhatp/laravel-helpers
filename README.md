# Laravel Helpers

Collection of (12) helper functions for laravel.

## Installation

You can install the package via composer:

```bash
composer require yudhatp/laravel-helpers
```

## Usage

```php
use Yudhatp\Helpers\Helpers;

//date helpers
Helpers::indonesianDate("2022-11-28"); //28 November 2022
Helpers::indonesianShortDate("2022-11-28"); //28 Nov 22
Helpers::indonesianDayName("2022-11-29"); //Selasa
Helpers::indonesianMonthName("2022-11-29"); //November
Helpers::getAgeIndonesian("1945-08-17"); //77 Tahun, 3 Bulan, 12 Hari
Helpers::isWeekend("2022-11-29"); //false
Helpers::addDays("2022-11-28",2); //2022-11-30

//number helpers
Helpers::terbilang("2000"); //Dua Ribu
Helpers::indonesianFormatDecimal("2,000.50"); //2.000,50

//other helpers
Helpers::indonesianPoliceNumberformat("B123XYZ"); //B 123 XYZ
Helpers::generatePassword(8); //EPp218kR
Helpers::filenameWithTimestamp("test","jpg"); //1669704266_test.jpg
Helpers::randomHexColor(); //#D15AF0

//blade
{{ (new \Yudhatp\Helpers\Helpers)->indonesianMonthName("2022-11-28") }}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- indonesianPoliceNumberformat - [@matriphe](https://https://gist.github.com/matriphe/3103ec578ec556bad5047b378520f070) 


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
