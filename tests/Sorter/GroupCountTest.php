<?php
/**
 * File FlippySorterTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Tests\Sorter;

use PHPWeekly\Issue45\Sorter\GroupCountSorter;

/**
 * Class FlippySorterTest
 *
 * @package PHPWeekly\Issue45\Tests\Sorter
 */
class GroupCountSorterTest extends SorterTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->sorter = new GroupCountSorter();

        parent::setUp();
    }
}
