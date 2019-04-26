<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PengerjaanTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PengerjaanTable Test Case
 */
class PengerjaanTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PengerjaanTable
     */
    public $Pengerjaan;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pengerjaan',
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
        $config = TableRegistry::getTableLocator()->exists('Pengerjaan') ? [] : ['className' => PengerjaanTable::class];
        $this->Pengerjaan = TableRegistry::getTableLocator()->get('Pengerjaan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pengerjaan);

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
