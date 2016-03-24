<?php
/**
 * File GroupCountSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class GroupCountSorter
 *
 * @package PHPWeekly\Issue45\Sorter
 */
class GroupCountSorter implements SorterInterface
{
    const NAME = 'group-count';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $chars = str_split($string);

        return implode('', array_reduce($chars, function(array $groups, string $char) {
            $groups[$char] .= $char;
            return $groups;
        }, []));
    }
}
