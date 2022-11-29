# Laravel Helpers

Collection of (9) helper functions for laravel.

## Installation

You can install the package via composer:

```bash
composer require yudhatp/laravel-helpers
```

## Usage

```php
use Yudhatp\Helpers\Helpers;
Helpers::terbilang("2000"); //Dua Ribu
Helpers::indonesianMonthName("2022-11-28"); //28 November 2022
Helpers::indonesianShortMonthName("2022-11-28"); //28 Nov 22
Helpers::getAgeIndonesian("1945-08-17"); //77 Tahun, 3 Bulan, 12 Hari
Helpers::isWeekend("2022-11-29"); //false
Helpers::generatePassword(8); //EPp218kR
Helpers::indonesianFormatDecimal("2.100,00"); //2100.00
Helpers::addDays("2022-11-28",2); //2022-11-30
Helpers::indonesianPoliceNumberformat("B123XYZ"); //B 123 XYZ

//blade
{{ (new \Yudhatp\Helpers\Helpers)->indonesianMonthName("2022-11-28") }}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [@matriphe](https://https://gist.github.com/matriphe/3103ec578ec556bad5047b378520f070)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
