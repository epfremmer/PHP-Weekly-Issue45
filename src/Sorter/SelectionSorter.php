<?php
/**
 * File SelectionSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class SelectionSorter
 *
 * @codeCoverageIgnore
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class SelectionSorter implements SorterInterface
{
    const NAME = 'selection';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);
        $n = count($a);

        for ($i = 0; $i < ($n - 1); $i++) {
            $key = $i;
            for ($j = ($i + 1); $j < $n; $j++) {
                if ($a[$j] < $a[$key]) $key = $j;
            }
            if ($key != $i) {
                list($a[$key], $a[$i]) = array($a[$i], $a[$key]);
            }
        }

        return implode('', $a);
    }
}
