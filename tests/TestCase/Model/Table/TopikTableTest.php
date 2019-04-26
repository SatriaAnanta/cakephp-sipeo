<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TopikTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TopikTable Test Case
 */
class TopikTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TopikTable
     */
    public $Topik;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.topik'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Topik') ? [] : ['className' => TopikTable::class];
        $this->Topik = TableRegistry::getTableLocator()->get('Topik', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Topik);

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
