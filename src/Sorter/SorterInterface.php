<?php
/**
 * File SorterInterface.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Interface SorterInterface
 *
 * @package PHPWeekly\Issue45\Sorter
 */
interface SorterInterface
{
    /**
     * Return sorted string
     *
     * @param string $string
     * @return string
     */
    public function sort(string $string) : string;
}
