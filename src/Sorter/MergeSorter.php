<?php
/**
 * File MergeSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class MergeSorter
 *
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class MergeSorter implements SorterInterface
{
    const NAME = 'merge';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);

        return implode('', $this->mergeSort($a));
    }

    /**
     * @param array $a
     * @param int $first
     * @param int|null $last
     * @return array
     */
    private function mergeSort(array $a, int $first = 0, int $last = null) : array
    {
        if (is_null($last)) $last = count($a) - 1;

        $function = __FUNCTION__;

        if ($first < $last) {
            $this->$function($a, $first, floor(($first + $last) / 2));
            $this->$function($a, floor(($first + $last) / 2) + 1, $last);

            $tmp = array();

            $middle = floor(($first + $last) / 2);
            $start = $first;
            $final = $middle + 1;

            for ($i = $first; $i <= $last; $i++) {
                if (($start <= $middle) && (($final > $last) || ($a[$start] < $a[$final]))) {
                    $tmp[$i] = $a[$start];
                    $start++;
                } else {
                    $tmp[$i] = $a[$final];
                    $final++;
                }
            }

            for ($i = $first; $i <= $last; $i++) {
                $a[$i] = $tmp[$i];
            }
        }

        return $a;
    }
}
