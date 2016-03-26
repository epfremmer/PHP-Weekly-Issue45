<?php
/**
 * File CocktailSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class CocktailSorter
 *
 * @codeCoverageIgnore
 * @see http://kukuruku.co/hub/php/benchmarks-14-sorting-algorithms-and-php-arrays
 * @package PHPWeekly\Issue45\Sorter
 */
class CocktailSorter implements SorterInterface
{
    const NAME = 'cocktail';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $a = str_split($string);
        $n = count($a);
        $left = 0;
        $right = $n - 1;

        do {
            for ($i = $left; $i < $right; $i++) {
                if ($a[$i] > $a[$i + 1]) {
                    list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
                }
            }
            $right -= 1;
            for ($i = $right; $i > $left; $i--) {
                if ($a[$i] < $a[$i - 1]) {
                    list($a[$i], $a[$i - 1]) = array($a[$i - 1], $a[$i]);
                }
            }
            $left += 1;
        } while ($left <= $right);

        return implode('', $a);
    }
}
