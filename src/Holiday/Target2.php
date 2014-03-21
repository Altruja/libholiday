<?php
/**
 * This software is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License version 3 as published by the Free Software Foundation
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * @copyright  Copyright (c) 2012 Altruja GmbH (http://www.altruja.de)
 * @license    LGPL v3 (See LICENSE file)
 * @autor      Carlo Capocasa <carlo.capocasa@altruja.de>
 */
namespace Holiday;

/**
 * TARGET2 interbank payment system official holidays
 * These are the holidays used for calculating SEPA direct debit
 * due dates, and other SEPA related calculations involving
 * business days
 *
 * Authoritative Source
 *
 *   Bundesbank
 *   Information Guide for Target2
 *   Section 2.3 Business Days
 * 
 *   http://www.bundesbank.de/Redaktion/EN/Downloads/Tasks/Payment_systems/Target2/information_guide_for_target2_users.pdf
 *
 * Further Information
 *
 *   Wikipedia Entry
 *   http://en.wikipedia.org/wiki/TARGET2#TARGET2_holidays
 */

class Target2 extends Calculator
{
    protected function getHolidays($year)
    {
        $timezone = $this->timezone;

        $data   = array();
        $easter = $this->getEaster($year);
        $data[0] = new Holiday($easter, "Good Friday", $timezone);
        $data[0]->modify("-2 days");
        $data[1] = new Holiday($easter, "Easter Monday", $timezone);
        $data[1]->modify("+1 day");

        $data[] = new Holiday("01.01." . $year, "New Year", $timezone);
        $data[] = new Holiday("01.05." . $year, "Labor Day", $timezone);
        $data[] = new Holiday("25.12." . $year, "Christmas Day", $timezone);
        $data[] = new Holiday("26.12." . $year, "Boxing Day", $timezone);

        return array_merge($data, $this->getSpecial($year, $timezone));
    }

    private function getSpecial($year)
    {
      return array();
    }
}
