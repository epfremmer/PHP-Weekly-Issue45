<?php
/**
 * File QuickSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class QuickSorter
 *
 * @codeCoverageIgnore
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class QuickSorter implements SorterInterface
{
    const NAME = 'quick';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);

        return implode('', $this->quickSort($a));
    }

    /**
     * @param array $a
     * @param int $l
     * @param int $r
     * @return array
     */
    private function quickSort(array $a, int$l = 0, int $r = 0) : array
    {
        if($r == 0) $r = count($a)-1;
        $i = $l;
        $j = $r;
        $x = $a[($l + $r) / 2];

        do {
            while ($a[$i] < $x) $i++;
            while ($a[$j] > $x) $j--;
            if ($i <= $j) {
                if ($a[$i] > $a[$j])
                    list($a[$i], $a[$j]) = array($a[$j], $a[$i]);
                $i++;
                $j--;
            }
        } while ($i <= $j);

        $function = __FUNCTION__;

        if ($i < $r) $this->$function($a, $i, $r);
        if ($j > $l) $this->$function($a, $l, $j);

        return $a;
    }
}
