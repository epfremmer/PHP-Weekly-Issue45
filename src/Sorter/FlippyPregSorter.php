<?php
/**
 * File FlippyPregSorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class FlippyPregSorter
 *
 * @package PHPWeekly\Issue45\Sorter
 */
class FlippyPregSorter extends FlippySorter implements SorterInterface
{
    const NAME = 'flippy-preg';
    const SORT_PATTERN = '/(?<char>.)(.+)(\k<char>)/i';

    /**
     * Return string after single flip sort pass
     *
     * @param string $string
     * @return string|false
     */
    protected function flip(string $string)
    {
        $result = preg_replace_callback(self::SORT_PATTERN, function($match) {
            return $match[1] . $match[3] . $match[2];
        }, $string);

        if ($string === $result) {
            return false;
        }

        return $result;
    }
}
