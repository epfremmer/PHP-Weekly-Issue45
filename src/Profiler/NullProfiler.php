<?php
/**
 * File NullProfiler.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Profiler;

/**
 * Class NullProfiler
 *
 * @package PHPWeekly\Issue45\Profiler
 */
class NullProfiler extends Profiler
{
    /**
     * NullProfiler constructor
     *
     * Override default dependencies and methods
     */
    public function __construct() { }

    /** {@inheritdoc} */
    public function start(string $algorithm) { }

    /** {@inheritdoc} */
    public function stop(string $algorithm) { }

    /** {@inheritdoc} */
    public function getDuration(string $algorithm) { }
}
