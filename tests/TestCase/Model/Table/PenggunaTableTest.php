<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PenggunaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PenggunaTable Test Case
 */
class PenggunaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PenggunaTable
     */
    public $Pengguna;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pengguna'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pengguna') ? [] : ['className' => PenggunaTable::class];
        $this->Pengguna = TableRegistry::getTableLocator()->get('Pengguna', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pengguna);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
