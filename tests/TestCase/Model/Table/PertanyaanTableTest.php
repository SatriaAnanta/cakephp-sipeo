<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PertanyaanTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PertanyaanTable Test Case
 */
class PertanyaanTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PertanyaanTable
     */
    public $Pertanyaan;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pertanyaan'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pertanyaan') ? [] : ['className' => PertanyaanTable::class];
        $this->Pertanyaan = TableRegistry::getTableLocator()->get('Pertanyaan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pertanyaan);

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
