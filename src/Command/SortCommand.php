<?php
/**
 * File SortCommand.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Command;

use PHPWeekly\Issue45\Profiler;
use PHPWeekly\Issue45\Sorter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Class SortCommand
 *
 * @package PHPWeekly\Issue45\Command
 */
class SortCommand extends Command
{
    // command constants
    const COMMAND_NAME = 'app:sort';
    const INPUT_ARGUMENT = 'string';
    const ALGORITHM_OPTION = 'algorithm';
    const PROFILING_OPTION = 'with-profiling';
    const RESULTS_OPTION = 'with-results';

    const ALL_ALGORITHMS = 'all';
    const WORKING = '<info>yes</info>';
    const NOT_WORKING = '<error>no</error>';
    const EMPTY_RESULT = '-';

    // optional array input option mask
    const OPTIONAL_ARRAY = InputOption::VALUE_OPTIONAL|InputOption::VALUE_IS_ARRAY;

    /**
     * @var Profiler\Profiler
     */
    private $profiler;

    /**
     * @var InputInterface
     */
    private $input;

    /**
     * Algorithms/Sorters
     *
     * @var array
     */
    protected static $algorithms = [
        Sorter\BubbleSorter::NAME => Sorter\BubbleSorter::class,
        Sorter\CocktailSorter::NAME => Sorter\CocktailSorter::class,
        Sorter\CombSorter::NAME => Sorter\CombSorter::class,
        Sorter\CountingSorter::NAME => Sorter\CountingSorter::class,
        Sorter\FlippySorter::NAME => Sorter\FlippySorter::class,
        Sorter\FlippyPregSorter::NAME => Sorter\FlippyPregSorter::class,
        Sorter\GnomeSorter::NAME => Sorter\GnomeSorter::class,
        Sorter\GroupCountSorter::NAME => Sorter\GroupCountSorter::class,
        Sorter\HeapSorter::NAME => Sorter\HeapSorter::class,
        Sorter\InsertSorter::NAME => Sorter\InsertSorter::class,
        Sorter\MergeSorter::NAME => Sorter\MergeSorter::class,
        Sorter\NativeSorter::NAME => Sorter\NativeSorter::class,
        Sorter\OddEvenSorter::NAME => Sorter\OddEvenSorter::class,
        Sorter\QuickSorter::NAME => Sorter\QuickSorter::class,
        Sorter\SelectionSorter::NAME => Sorter\SelectionSorter::class,
        Sorter\ShellSorter::NAME => Sorter\ShellSorter::class,
    ];

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        parent::configure();

        $this->setName(self::COMMAND_NAME)
            ->setDescription('Group/Sort alnum input string by character')
            ->addArgument(self::INPUT_ARGUMENT, InputArgument::REQUIRED, 'String to sort')
            ->addOption(self::RESULTS_OPTION, 'r', InputOption::VALUE_NONE, 'Display results')
            ->addOption(self::PROFILING_OPTION, 'p', InputOption::VALUE_NONE, 'Record profiling results')
            ->addOption(self::ALGORITHM_OPTION, 'a', self::OPTIONAL_ARRAY, 'Sort algorithm(s) to use', [
                Sorter\FlippySorter::NAME
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output);

        $this->input = $input;
        $this->profiler = $input->getOption(self::PROFILING_OPTION)
            ? new Profiler\Profiler(new Stopwatch())
            : new Profiler\NullProfiler()
        ;

        if (in_array(self::ALL_ALGORITHMS, $input->getOption(self::ALGORITHM_OPTION))) {
            $input->setOption(self::ALGORITHM_OPTION, array_keys(self::$algorithms));
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $string = $input->getArgument(self::INPUT_ARGUMENT);
        $algorithms = $input->getOption(self::ALGORITHM_OPTION);

        $table = new Table($output);
        $table->setHeaders(['Algorithm', 'Working', 'Duration', 'Result']);

        foreach ($algorithms as $algorithm) {
            if (!array_key_exists($algorithm, self::$algorithms)) {
                $table->addRow([$algorithm, 'Not Supported', null, null]);
                continue;
            }

            /** @var Sorter\SorterInterface $sorter */
            $sorterClass = self::$algorithms[$algorithm];
            $sorter = new $sorterClass;

            $this->profiler->start($algorithm);
            $result = @$sorter->sort($string);
            $this->profiler->stop($algorithm);

            $duration = $this->profiler->getDuration($algorithm);

            $table->addRow($this->getTableRow($algorithm, $duration, $result));
        }

        $table->render();
    }

    /**
     * Return a formatted table row array
     *
     * @param string $algorithm
     * @param int|null $duration
     * @param string|null $result
     * @return array
     */
    private function getTableRow(string $algorithm, int $duration = null, string $result = null) : array
    {
        $string = $this->input->getArgument(self::INPUT_ARGUMENT);
        $display = $this->input->getOption(self::RESULTS_OPTION);

        $isValid = $string !== $result && strlen($string) === strlen($result);

        return [
            $algorithm,
            $isValid ? self::WORKING : self::NOT_WORKING,
            $duration !== null ? sprintf('%s ms', $duration) : self::EMPTY_RESULT,
            $display ? $result : self::EMPTY_RESULT
        ];
    }
}
