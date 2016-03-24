<?php
/**
 * File InsertSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class InsertSorter
 *
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class InsertSorter implements SorterInterface
{
    const NAME = 'insert';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);
        $n = count($a);

        for ($i = 0; $i < ($n - 1); $i++) {
            $key = $i + 1;
            $tmp = $a[$key];
            for ($j = ($i + 1); $j > 0; $j--) {
                if ($tmp < $a[$j - 1]) {
                    $a[$j] = $a[$j - 1];
                    $key = $j - 1;
                }
            }
            $a[$key] = $tmp;
        }

        return implode('', $a);
    }
}
