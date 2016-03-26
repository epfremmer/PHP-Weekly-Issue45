<?php
/**
 * File SorterTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

namespace PHPWeekly\Issue45\Tests\Sorter;

use PHPWeekly\Issue45\Sorter\SorterInterface;

/**
 * Class SorterTest
 *
 * @package PHPWeekly\Issue45\Tests\Sorter
 */
abstract class SorterTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SorterInterface
     */
    protected $sorter;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        if (!$this->sorter instanceof SorterInterface) {
            throw new \LogicException('Sorter interface is required for test');
        }

        parent::setUp();
    }

    /**
     * @return void
     */
    public function testConstruct()
    {
        $class = get_class($this->sorter);

        $this->assertInstanceOf(SorterInterface::class, $this->sorter);
        $this->assertTrue(defined("$class::NAME"), sprintf('%s is missing NAME constant', $class));
        $this->assertInternalType('string', "$class::NAME", sprintf('%s NAME must be of type string', $class));
    }

    /**
     * @dataProvider sortDataProvider
     * @param string $string
     */
    public function testSort(string $string)
    {
        $sorted = $this->sorter->sort($string);

        $this->assertNotEquals($string, $sorted);
        $this->assertEquals(strlen($string), strlen($sorted));
    }

    /**
     * Sortable sample data sets
     *
     * @return array
     */
    public function sortDataProvider()
    {
        return [
            // challenge samples
            'sample 1' => ['OYOYY'],
            'sample 2' => ['OYOYYBBGG'],
            'sample 3' => ['bgbgoppyoy'],

            // challenge test cases
            'test case 1' => ['pyobrggggbpoopbr'],
            'test case 2' => ['pyyppbggrboprbyybyporygybyrbygbr'],
            'test case 3' => ['bwrpygyrrowrpogpogggwwbrogrrwbwogwgboprwprrwbgbobbpprgrprrrbyporyryoprywpywopbpbrorwwbwpwbrpgbgprogwbybbobwpppgrbypgyyopbypywopb'],
            'test case 4' => ['brwpbbybwmympyrorgporbwrrpwoywyrobbbpwpbrbmybpgrogwgbgoproobooybpgbprrwmgobgbrwwrbgrbwyyyrbpwrymoybwpbrggybogpymboomwpobygwwoygbpobwrrpomogmrwrrpybwgbggoogoyrwyyrgrrrmogwgbryrwyygyrrgbywrgbobwmbwwmpopwopgobrybgpyooobpompgprrrppyprgggrppoorwomwwmrowrprgpwo'],
        ];
    }
}
