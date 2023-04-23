<?php

namespace App\Traits;

use Carbon\Carbon;

trait NepaliDateTrait
{
    static $monthInfo = [
        'Baisakh' => [ '2022-04-14', '2022-05-14', ],
        'Jestha' => [ '2022-05-15', '2022-06-14', ],
        'Asadh' => [ '2022-06-15', '2022-07-16', ],
        'Shrawan' => [ '2022-07-17', '2022-08-16', ],
        'Bhadra' => [ '2022-08-17', '2022-09-16', ],
        'Ashwin' => [ '2022-09-17', '2022-10-17', ],
        'Kartik' => [ '2022-10-18', '2022-11-16', ],
        'Mangsir' => [ '2022-11-17', '2022-12-15', ],
        'Poush' => [ '2022-12-16', '2023-01-14', ],
        'Magh' => [ '2023-01-15', '2023-02-12', ],
        'Falgun' => [ '2023-02-13', '2023-03-14', ],
        'Chaitra' => [ '2023-03-15', '2023-04-13', ],
    ];

    static $monthInfo2080 = [
        'Baisakh' => [ '2023-04-14', '2023-05-14', ],
        'Jestha' => [ '2023-05-15', '2023-06-15', ],
        'Asadh' => [ '2023-06-16', '2023-07-16', ],
        'Shrawan' => [ '2023-07-17', '2023-08-17', ],
        'Bhadra' => [ '2023-08-18', '2023-09-17', ],
        'Ashwin' => [ '2023-09-18', '2023-10-17', ],
        'Kartik' => [ '2023-10-18', '2023-11-16', ],
        'Mangsir' => [ '2023-11-17', '2023-12-16', ],
        'Poush' => [ '2023-12-17', '2024-01-14', ],
        'Magh' => [ '2024-01-15', '2024-02-12', ],
        'Falgun' => [ '2024-02-13', '2024-03-13', ],
        'Chaitra' => [ '2024-03-14', '2024-04-12', ],
    ];

    public static function convertEnglishToNepaliDate($englishDate, $font)
    {
        $nepaliYear = '';
        $nepaliMonth = '';
        $nepaliDate = '';

        $ii = false;

        foreach (self::$monthInfo as $key => $val) {
            if ($englishDate >= $val[0] && $englishDate <= $val[1]) {
                if ($font == 'nepali') {
                    $nepaliMonthInNepaliFont = $nepaliMonth . self::getMonthNameInNepaliFont($key);   
                }

                $nepaliMonth = $nepaliMonth . $key;   

                $ii = true;
                break;
            }
        }

        if ($ii == false) {
            foreach (self::$monthInfo2080 as $key => $val) {
                if ($englishDate >= $val[0] && $englishDate <= $val[1]) {
                    if ($font == 'nepali') {
                        $nepaliMonthInNepaliFont = $nepaliMonth . self::getMonthNameInNepaliFont($key);   
                    }

                    $nepaliMonth = $nepaliMonth . $key;   

                    break;
                }
            }
        }

        $checkDay = Carbon::parse($englishDate);

        /* If $ii is true it means the date is in 2079 BS else it will be in 2080 BS (for now) */
        if ($ii == true) {
            $day = Carbon::parse(self::$monthInfo[$nepaliMonth][0]);
        } else {
            $day = Carbon::parse(self::$monthInfo2080[$nepaliMonth][0]);
        }


        /* Looping through 100 times, because month has only 30-ish days */
        for ($i=0; $i < 100; $i++) {
            if ($checkDay->toDateString() == $day->toDateString()) {
                $nepaliDate = $i + 1;
                break;
            }

            $day = $day->addDay();
        }

        if ($font == 'nepali') {
            return $nepaliMonthInNepaliFont . ' ' . $nepaliDate;
        } else {
            return $nepaliMonth . ' ' . $nepaliDate;
        }
    }

    public static function getMonthNameInNepaliFont($key)
    {
        if ($key == 'Baisakh') {
            return 'बैशाख; ';
        } else if ($key == 'Jestha') {
        } else if ($key == 'Asadh') {
        } else if ($key == 'Shrawan') {
        } else if ($key == 'Bhadra') {
        } else if ($key == 'AShwin') {
        } else if ($key == 'Kartik') {
        } else if ($key == 'Mangsir') {
        } else if ($key == 'Poush') {
        } else if ($key == 'Magh') {
        } else if ($key == 'Falgun') {
            return 'फाल्गुन';
        } else if ($key == 'Chaitra') {
        }
    }
}
