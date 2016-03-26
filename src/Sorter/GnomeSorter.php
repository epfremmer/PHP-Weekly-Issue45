<?php
/**
 * File GnomeSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class GnomeSorter
 *
 * @codeCoverageIgnore
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class GnomeSorter implements SorterInterface
{
    const NAME = 'gnome';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);
        $n = count($a);
        $i = 1;
        $j = 2;

        while ($i < $n) {
            if ($a[$i - 1] < $a[$i]) {
                $i = $j;
                $j++;
            } else {
                list($a[$i], $a[$i - 1]) = array($a[$i - 1], $a[$i]);
                $i--;
                if ($i == 0) {
                    $i = $j;
                    $j++;
                }
            }
        }

        return implode('', $a);
    }
}
