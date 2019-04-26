<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JawabanTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JawabanTable Test Case
 */
class JawabanTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JawabanTable
     */
    public $Jawaban;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.jawaban'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Jawaban') ? [] : ['className' => JawabanTable::class];
        $this->Jawaban = TableRegistry::getTableLocator()->get('Jawaban', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Jawaban);

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
