<?php
/**
 * File Profiler.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Profiler;

use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Class Profiler
 *
 * @package PHPWeekly\Issue45\Profiler
 */
class Profiler
{
    /**
     * @var Stopwatch
     */
    private $stopwatch;

    /**
     * Profiler constructor
     *
     * @param Stopwatch $stopwatch
     */
    public function __construct(Stopwatch $stopwatch)
    {
        $this->stopwatch = $stopwatch;
    }

    /**
     * Start algorithm timer
     *
     * @param string $algorithm
     */
    public function start(string $algorithm)
    {
        $this->stopwatch->start($algorithm);
    }

    /**
     * Stop algorithm timer
     *
     * @param string $algorithm
     */
    public function stop(string $algorithm)
    {
        $this->stopwatch->stop($algorithm);
    }

    /**
     * Return algorithm duration
     *
     * @param string $algorithm
     * @return int
     */
    public function getDuration(string $algorithm)
    {
        return $this->stopwatch->getEvent($algorithm)->getDuration();
    }
}
