<?php
/**
 * File NullProfilerTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Tests\Profiler;

use PHPWeekly\Issue45\Profiler\NullProfiler;

/**
 * Class NullProfilerTest
 *
 * @package PHPWeekly\Issue45\Profiler
 */
class NullProfilerTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $profiler = new NullProfiler();

        $this->assertAttributeEmpty('stopwatch', $profiler);
    }

    public function testStart()
    {
        $profiler = new NullProfiler();

        $this->assertEmpty($profiler->start('test'));
    }

    public function testStop()
    {
        $profiler = new NullProfiler();

        $this->assertEmpty($profiler->stop('test'));
    }

    public function testGetDuration()
    {
        $profiler = new NullProfiler();

        $this->assertEmpty($profiler->getDuration('test'));
    }
}
