<?php
/**
 * File SortCommandTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Tests\Command;

use PHPWeekly\Issue45\Application;
use PHPWeekly\Issue45\Command\SortCommand;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class SortCommandTest
 *
 * @package PHPWeekly\Issue45\Tests\Command
 */
class SortCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CommandTester
     */
    private $commandTester;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $application = new Application();
        $command = $application->find(SortCommand::COMMAND_NAME);

        $this->commandTester = new CommandTester($command);
    }

    public function testExecute()
    {
        $this->commandTester->execute([
            'command' => SortCommand::COMMAND_NAME,
            SortCommand::INPUT_ARGUMENT => 'test',
        ]);

        $this->assertRegExp('/\| Algorithm \| Working \| Duration \| Result \|/i', $this->commandTester->getDisplay());
        $this->assertRegExp('/\| flippy /i', $this->commandTester->getDisplay());
    }

    /** @expectedException \Symfony\Component\Console\Exception\RuntimeException */
    public function testExecuteMissingArgumentException()
    {
        $this->commandTester->execute(['command' => SortCommand::COMMAND_NAME]);
    }

    public function testExecuteWithResultsOption()
    {
        $this->commandTester->execute([
            'command' => SortCommand::COMMAND_NAME,
            SortCommand::INPUT_ARGUMENT => 'test',
            '--' . SortCommand::RESULTS_OPTION => true,
        ]);

        $this->assertRegExp('/\| flippy    \| yes     \| -        \| ttse   \|/i', $this->commandTester->getDisplay());
    }

    public function testExecuteWithProfilingOption()
    {
        $this->commandTester->execute([
            'command' => SortCommand::COMMAND_NAME,
            SortCommand::INPUT_ARGUMENT => 'test',
            '--' . SortCommand::PROFILING_OPTION => true,
        ]);

        $this->assertRegExp('/\| flippy    \| yes     \| 0 ms     \| -      \|/i', $this->commandTester->getDisplay());
    }
}
