<?php
/**
 * File HeapSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class HeapSorter
 *
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class HeapSorter implements SorterInterface
{
    const NAME = 'heap';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);
        $n = count($a);
        $this->heapMake($a);

        while ($n > 0) {
            list($a[0], $a[$n - 1]) = array($a[$n - 1], $a[0]);
            $n--;
            $this->heapify($a, 0, $n);
        }

        return implode('', $a);
    }

    /**
     * @param array $a
     */
    private function heapMake(array &$a)
    {
        $n = count($a);

        for ($i = ($n - 1); $i >= 0; $i--) {
            $this->heapify($a, $i, $n);
        }
    }

    /**
     * @param array $a
     * @param int $pos
     * @param int $n
     */
    private function heapify(array &$a, int $pos, int $n)
    {
        while (2 * $pos + 1 < $n) {
            $t = 2 * $pos +1;
            if (2 * $pos + 2 < $n && $a[2 * $pos + 2] >= $a[$t]) {
                $t = 2 * $pos + 2;
            }
            if ($a[$pos] < $a[$t]) {
                list($a[$pos], $a[$t]) = array($a[$t], $a[$pos]);
                $pos = $t;
            }
            else break;
        }
    }
}
