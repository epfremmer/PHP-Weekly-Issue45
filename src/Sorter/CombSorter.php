<?php
/**
 * File CombSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class CombSorter
 *
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class CombSorter implements SorterInterface
{
    const NAME = 'comb';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);
        $gap = $n = count($a);
        $swapped = true;

        while ($gap > 1 || $swapped) {
            if ($gap > 1) $gap = floor($gap / 1.24733);
            $i = 0;
            $swapped = false;
            while ($i + $gap < $n) {
                if ($a[$i] > $a[$i + $gap]) {
                    list($a[$i], $a[$i + $gap]) = array($a[$i + $gap], $a[$i]);
                    if (!$swapped) $swapped = true;
                }
                $i++;
            }
        }

        return implode('', $a);
    }
}
