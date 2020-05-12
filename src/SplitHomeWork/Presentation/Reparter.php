<?php

declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

final class Reparter 
{
    public static function getResults(int $totalItems) : int {
        $counter = 0;

        for ($i = $totalItems; $i > 0; $i--) 
        {
            if (self::isCousin($i)) 
            {
                $counter++;
            }           
        }

        return $counter;
    }

    private function isCousin(int $num) : bool {
        return boolval($num % 2);
    }
}