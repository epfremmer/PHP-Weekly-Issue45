<?php
/**
 * File FlippySorterTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Tests\Sorter;

use PHPWeekly\Issue45\Sorter\FlippyPregSorter;

/**
 * Class FlippySorterTest
 *
 * @package PHPWeekly\Issue45\Tests\Sorter
 */
class FlippyPregSorterTest extends SorterTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->sorter = new FlippyPregSorter();

        parent::setUp();
    }
}
