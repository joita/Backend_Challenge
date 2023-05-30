<?php

namespace Crimsoncircle\Controller;

use Crimsoncircle\Model\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function index(Request $request, $year = 0): string
    {
        echo $request->query->get('filter');
        $year = $year == 0 ? date('o') : $year;
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            return 'Yep, this is a leap year!';
        }

        return 'Nope, this is not a leap year.';
    }
}