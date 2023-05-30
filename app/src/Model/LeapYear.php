<?php
namespace Crimsoncircle\Model;

class LeapYear
{
    public function isLeapYear(int $year): int
    {
        //TODO: Logic must be implemented to calculate if a year is a leap year
        $leapYear = 0;
        $moduloYear = $year % 4;
        if($moduloYear == 0){
            $nextModulo = $year % 100;
            if($nextModulo == 0){
                $newModulo = $year % 400;
                if($newModulo == 0){
                    $leapYear = 1;
                }else{
                    $leapYear = 0;
                    }
            }else{
                $leapYear = 1;
            }            
        }
        

        return $leapYear;
    }
}