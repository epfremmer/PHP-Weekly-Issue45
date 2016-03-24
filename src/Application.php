<?php
/**
 * File Application.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue45;

use PHPWeekly\Issue45\Command\SortCommand;
use Symfony\Component\Console\Application as BaseApplication;

/**
 * Class Application
 *
 * @package PHPWeekly\Issue45
 */
class Application extends BaseApplication
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct('console', '1.0.0');

        $this->add(new SortCommand());
    }
}
