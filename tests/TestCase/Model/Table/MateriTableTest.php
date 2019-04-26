<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MateriTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MateriTable Test Case
 */
class MateriTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MateriTable
     */
    public $Materi;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.materi'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Materi') ? [] : ['className' => MateriTable::class];
        $this->Materi = TableRegistry::getTableLocator()->get('Materi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Materi);

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
