<?php
/**
 * File BubbleSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class BubbleSorter
 *
 * @codeCoverageIgnore
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class BubbleSorter implements SorterInterface
{
    const NAME = 'bubble';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);
        $n = count($a);

        for ($j = 0; $j < ($n - 1); $j++) {
            $flag = false;
            for ($i = 0; $i < ($n - $j - 1); $i++) {
                if ($a[$i] > $a[$i + 1]) {
                    list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
                    if (!$flag) $flag = true;
                }
            }
            if (!$flag) break;
        }

        return implode('', $a);
    }
}
