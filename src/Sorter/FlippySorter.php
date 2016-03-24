<?php
/**
 * File FlippySorter.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Sorter;

/**
 * Class FlippySorter
 *
 * @package PHPWeekly\Issue45\Sorter
 */
class FlippySorter implements SorterInterface
{
    const NAME = 'flippy';

    /**
     * {@inheritdoc}
     */
    public function sort(string $string) : string
    {
        $result = strrev($string);

        while ($flipped = $this->flip($result)) {
            $result = $flipped;
        }

        return strrev($result);
    }

    /**
     * Return string after single flip sort pass
     *
     * @param string $string
     * @return string|false
     */
    protected function flip(string $string)
    {
        for ($i = 0; $i < strlen($string); $i++) {
            $char = $string[$i];
            $next = strpos($string, $char, $i+1);

            if ($next === false) {
                continue;
            }

            if ($i + 1 === $next) {
                continue;
            }

            $length = $char === $string[0] ? $next : $i + 1;

            $replacement = strrev(substr($string, 0, $length));
            $string = substr_replace($string, $replacement, 0, $length);

            return $string;
        }

        return false;
    }






    /// SAVE ///

//    const SORT_PATTERN = '/(?<char>.)(.+)(\k<char>)/i';
//
//    /**
//     * {@inheritdoc}
//     */
//    public function sort(string $string) : string
//    {
//        $result = $string;
//
//        while (true) {
//            $flipped = $this->flip($result);
//
//            // nothing to sort
//            if ($flipped === $result) {
//                break;
//            }
//
//            $result = $flipped;
//        }
//
//        return $result;
//    }
//
//    /**
//     * Return string after single flip sort pass
//     *
//     * @param string $string
//     * @return string
//     */
//    private function flip(string $string) : string
//    {
//        $result = preg_replace_callback(self::SORT_PATTERN, function($match) {
//            return $match[1] . $match[3] . $match[2];
//        }, strrev($string));
//
//        return strrev($result);
//    }
}
