<?php
/**
 * File CountingSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class CountingSorter
 *
 * @codeCoverageIgnore
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class CountingSorter implements SorterInterface
{
    const NAME = 'counting';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);
        $k = max($a);
        $c = array();
        $n = count($a);

        for ($i = 0; $i <= $k; $i++)
            $c[$i] = 0;
        for ($i = 0;$i < $n; $i++) {
            $c[$a[$i]]++;
        }
        $b = 0;
        for ($j = 0;$j <= $k; $j++) {
            for ($i = 0; $i < $c[$j]; $i++) {
                $a[$b] = $j;
                $b++;
            }
        }

        return implode('', $a);
    }
}
