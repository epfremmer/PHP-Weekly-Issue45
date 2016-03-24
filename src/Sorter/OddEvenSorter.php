<?php
/**
 * File OddEvenSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class OddEvenSorter
 *
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class OddEvenSorter implements SorterInterface
{
    const NAME = 'odd-even';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);
        $n = count($a);
        $sorted = false;

        while (!$sorted) {
            $sorted = true;
            for ($i = 1; $i < ($n - 1); $i += 2) {
                if ($a[$i] > $a[$i + 1]) {
                    list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
                    if ($sorted) $sorted = false;
                }
            }

            for ($i = 0; $i < ($n - 1); $i += 2) {
                if ($a[$i] > $a[$i + 1]) {
                    list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
                    if ($sorted) $sorted = false;
                }
            }
        }

        return implode('', $a);
    }
}
