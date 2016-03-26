<?php
/**
 * File NativeSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class NativeSorter
 *
 * @codeCoverageIgnore
 * @see http://php.net/manual/en/function.sort.php
 * @package PHPWeekly\Issue45\Sorter
 */
class NativeSorter implements SorterInterface
{
    const NAME = 'native';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $chars = str_split($string);
        sort($chars);

        return implode('', $chars);
    }
}
