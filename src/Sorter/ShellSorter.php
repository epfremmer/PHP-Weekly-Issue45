<?php
/**
 * File ShellSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class ShellSorter
 *
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class ShellSorter implements SorterInterface
{
    const NAME = 'shell';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);
        $n = count($a);
        $d = floor($n / 2);

        while ($d > 0) {
            for ($i = 0; $i < ($n - $d); $i++) {
                $j = $i;
                while ($j >= 0 && $a[$j] > $a[$j + $d]) {
                    list($a[$j], $a[$j + $d]) = array($a[$j + $d], $a[$j]);
                    $j--;
                }
            }
            $d = floor($d / 2);
        }

        return implode('', $a);
    }
}
