<?php
/**
 * File ProfilerTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Tests\Profiler;

use Mockery as m;
use PHPWeekly\Issue45\Profiler\Profiler;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Class ProfilerTest
 *
 * @package PHPWeekly\Issue45\Profiler
 */
class ProfilerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var m\MockInterface|Stopwatch
     */
    private $stopwatch;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->stopwatch = m::mock(Stopwatch::class);
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        parent::tearDown();

        m::close();
    }

    public function testConstruct()
    {
        $profiler = new Profiler($this->stopwatch);

        $this->assertAttributeInstanceOf(Stopwatch::class, 'stopwatch', $profiler);
    }

    public function testStart()
    {
        $profiler = new Profiler($this->stopwatch);

        $this->stopwatch->shouldReceive('start')->once()->with('test')->andReturnUndefined();

        $profiler->start('test');
    }

    public function testStop()
    {
        $profiler = new Profiler($this->stopwatch);

        $this->stopwatch->shouldReceive('stop')->once()->with('test')->andReturnUndefined();

        $profiler->stop('test');
    }

    public function testGetDuration()
    {
        $profiler = new Profiler($this->stopwatch);

        $this->stopwatch->shouldReceive('getEvent')->once()->with('test')->andReturn(m::self())
            ->getMock()->shouldReceive('getDuration')->once()->andReturn(10);

        $this->assertEquals(10, $profiler->getDuration('test'));
    }
}
