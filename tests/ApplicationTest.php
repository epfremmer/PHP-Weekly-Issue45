<?php
/**
 * File ApplicationTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue45\Tests;

use PHPWeekly\Issue45\Application;
use PHPWeekly\Issue45\Command\SortCommand;

/**
 * Class ApplicationTest
 *
 * @package PHPWeekly\Tests
 */
class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $application = new Application();

        $this->assertInstanceOf(SortCommand::class, $application->find(SortCommand::COMMAND_NAME));
    }
}
