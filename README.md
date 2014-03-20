libholiday
==========

Usage:

    // Find German holidays
    $g = new \Holiday\Germany();
    $holidays = $g->between(new DateTime('2014-12-01'), new DateTime('2014-12-31'));
    
    // Find Bavarian holidays
    $g = new \Holiday\Bavaria();
    $holidays = $g->between(new DateTime('2014-12-01'), new DateTime('2014-12-31'));
    
    // Find Target2 interbank system holidays (Used for SEPA banking business days)
    $g = new \Holiday\Target2();
    $holidays = $g->between(new DateTime('2014-12-01'), new DateTime('2014-12-31'));

