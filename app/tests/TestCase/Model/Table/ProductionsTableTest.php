<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductionsTable Test Case
 */
class ProductionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductionsTable
     */
    public $Productions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Productions',
        'app.Stocks',
        'app.Orders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Productions') ? [] : ['className' => ProductionsTable::class];
        $this->Productions = TableRegistry::getTableLocator()->get('Productions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Productions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
