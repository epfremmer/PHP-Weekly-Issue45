<?php
/**
 * File FlippySorterTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Tests\Sorter;

use PHPWeekly\Issue45\Sorter\FlippySorter;

/**
 * Class FlippySorterTest
 *
 * @package PHPWeekly\Issue45\Tests\Sorter
 */
class FlippySorterTest extends SorterTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->sorter = new FlippySorter();

        parent::setUp();
    }
}
