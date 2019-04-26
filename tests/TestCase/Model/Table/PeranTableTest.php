<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeranTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeranTable Test Case
 */
class PeranTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PeranTable
     */
    public $Peran;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.peran'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Peran') ? [] : ['className' => PeranTable::class];
        $this->Peran = TableRegistry::getTableLocator()->get('Peran', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Peran);

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
